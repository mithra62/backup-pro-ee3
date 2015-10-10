<?php 
/**
 * mithra62 - Backup Pro
 *
 * @copyright	Copyright (c) 2015, mithra62, Eric Lamb.
 * @link		http://mithra62.com/projects/view/backup-pro/
 * @version		2.0
 * @filesource 	./system/expressionengine/third_party/backup_pro/
 */

require_once PATH_THIRD.'backup_pro/vendor/autoload.php';

use mithra62\BackupPro\Platforms\Controllers\Eecms;
use mithra62\BackupPro\BackupPro;

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include PATH_THIRD.'backup_pro/config'.EXT;

/**
 * Backup Pro - Extension
 *
 * Extension class
 *
 * @package 	mithra62\BackupPro
 * @author		Eric Lamb
 * @filesource 	./system/expressionengine/third_party/backup_pro/ext.backup_pro.php
 */
class Backup_pro_ext extends Eecms implements BackupPro
{
	/**
	 * The Backup Pro settings array
	 * @var array
	 */
	public $settings = array();
	
	/**
	 * The name of the add-on
	 * @var string
	 */
	public $name = 'Backup Pro';
	
	/**
	 * Version number (overriden)
	 * @var float
	 */
	public $version = self::version;
	
	/**
	 * Description of the add-on
	 * @var string
	 */
	public $description	= 'Extensions for Backup Pro';
	
	/**
	 * Flag to enable the extension settings
	 * @var string
	 */
	public $settings_exist	= 'y';
	
	/**
	 * URL to the documentation
	 * @var string
	 */
	public $docs_url = ''; 
	
	/**
	 * Weird ass EE flag to lock the extension to module installation
	 * @var array
	 */
	public $required_by = array('module');	
		
	/**
	 * @ignore
	 */
	public function __construct()
	{
	    if( ee()->input->get_post('package') != 'backup_pro' && ee()->input->get_post('package') != 'addons_module' )
	    {
	       parent::__construct(); //don't do this on install extension
	    }
	    
		$path = dirname(realpath(__FILE__));
		include $path.'/config'.EXT;
		$this->docs_url = $config['docs_url'];
		$this->class = $this->name = $config['class_name'];
		$this->settings_table = $config['settings_table'];
		$this->mod_name = $config['mod_url_name'];
		$this->ext_class_name = $config['ext_class_name'];
		
		ee()->lang->loadfile('backup_pro');

		$this->db_conf = array(
    		'user' => ee()->db->username,
    		'pass' => ee()->db->password,
    		'db_name' => ee()->db->database,
    		'host' => ee()->db->hostname
		);			
		
		$this->query_base = 'C=addons_modules'.AMP.'M=show_module_cp'.AMP.'module=backup_pro'.AMP.'method=';	
		
		$this->url_base = BASE.AMP.$this->query_base;
	}
	
	/**
	 * Redirects to the module settings form ONLY
	 */
	public function settings_form()
	{
		ee()->functions->redirect(BASE.AMP.'C=addons_modules'.AMP.'M=show_module_cp'.AMP.'module=backup_pro'.AMP.'method=settings');
	}
	
	/**
	 * Sets the Backup Pro links into the CP menu system
	 * @param array $menu
	 * @return Ambigous <multitype:, unknown>
	 */
	public function cp_menu_array(array $menu = array())
	{
		$menu = (ee()->extensions->last_call != '' ? ee()->extensions->last_call : $menu);
		
		$this->url_base = BASE.AMP.$this->query_base;
		if(ee()->session->userdata('can_access_tools') == 'y')
		{
			$new_menu = array();
			if(!empty($menu['tools']['tools_communicate']))
			{
				$new_menu['tools_communicate'] = $menu['tools']['tools_communicate'];
				unset($menu['tools']['tools_communicate']);
			}
				
			if(!empty($menu['tools']['0']))
			{
				$new_menu['0'] = $menu['tools']['0'];
				unset($menu['tools']['0']);
			}
				
			if(!empty($menu['tools']['tools_utilities']))
			{
				$new_menu['tools_utilities'] = $menu['tools']['tools_utilities'];
				unset($menu['tools']['tools_utilities']);
			}
				
			if(!empty($menu['tools']['tools_data']))
			{
				$new_menu['tools_data'] = $menu['tools']['tools_data'];
				unset($menu['tools']['tools_data']);
			}
				
			if(ee()->session->userdata('can_access_modules') == 'y')
			{
				$new_menu['backup_pro'] = array(
						'view_backups' => $this->url_base.'index',
						'backup_db' => $this->url_base.'backup'.AMP.'type=database',
						'backup_files' => $this->url_base.'backup'.AMP.'type=files'
				);
		
				$new_menu['backup_pro']['0'] = '----';
				$new_menu['backup_pro']['backup_pro_settings'] = $this->url_base.'settings';
			}
				
			if(!empty($menu['tools']['tools_data']))
			{
				$new_menu['tools_logs'] = $menu['tools']['tools_logs'];
				unset($menu['tools']['tools_logs']);
			}
			
			$new_menu = array_merge($new_menu, $menu['tools']);
				
			if(!empty($menu['tools']['1']))
			{
				$new_menu['1'] = $menu['tools']['1'];
				unset($menu['tools']['1']);
			}
				
			if(!empty($menu['tools']['overview']))
			{
				$new_menu['overview'] = $menu['tools']['overview'];
				unset($menu['tools']['overview']);
			}
				
			$menu['tools'] = $new_menu;
		
		}
				
		return $menu;
	}
	
	/**
	 * Checks the backups available on the system and notifies the configured users if needed
	 */
	public function check_backup_state()
	{
	    $this->settings = $this->services['settings']->get();
		if($this->settings['check_backup_state_cp_login'] != '1')
		{
			return;
		}
		
        $backup = $this->services['backups']->setBackupPath($this->settings['working_directory']);
        $backups = $backup->getAllBackups($this->settings['storage_details']);
        $backup_meta = $backup->getBackupMeta($backups);
        $errors = $backup->getIntegrity()->monitorBackupState($backup_meta, $this->settings);
        
        if(isset($errors['backup_state_db_backups']) || isset($errors['backup_state_files_backups']))
        {
            $notify = $this->services['notify'];
            $notify->getMail()->setConfig($this->platform->getEmailConfig());
            
            //we have a winner! start the notification process
            $last_notified = $this->settings['backup_missed_schedule_notify_email_last_sent'];
            $next_notified = mktime(date('G', $last_notified)+$this->settings['backup_missed_schedule_notify_email_interval'], date('i', $last_notified), 0, date('n', $last_notified), date('j', $last_notified), date('Y', $last_notified));
            
            if(time() > $next_notified && (is_array($this->settings['backup_missed_schedule_notify_emails']) &&  count($this->settings['backup_missed_schedule_notify_emails']) >= 1 ))
            {
                $backup = $this->services['backup']->setStoragePath($this->settings['working_directory']);
                $notify->setBackup($backup)->sendBackupState($this->settings['backup_missed_schedule_notify_emails'], $backup_meta, $errors);
                
                $data = array('backup_missed_schedule_notify_email_last_sent' => time());
                $this->services['settings']->update($data);
            }
        }        
	}

	/**
	 * We do this in the module install
	 * @ignore
	 * @return boolean
	 */
	public function activate_extension() 
	{
		return TRUE;
	}
	
	/**
	 * We do this in the module install
	 * @ignore
	 * @param string $current
	 * @return boolean
	 */	
	public function update_extension($current = '')
	{
		return TRUE;
	}

	/**
	 * We do this in the module install
	 * @ignore
	 * @return boolean
	 */	
	public function disable_extension()
	{
		return TRUE;
	}
}