<?php  
/**
 * mithra62 - Backup Pro
 *
 * @author		Eric Lamb <eric@mithra62.com>
 * @copyright	Copyright (c) 2015, mithra62, Eric Lamb.
 * @link		http://mithra62.com/projects/view/backup-pro/
 * @version		3.0
 * @filesource 	./system/expressionengine/third_party/backup_pro/
 */

require_once PATH_THIRD.'backup_pro/vendor/autoload.php';
require_once PATH_THIRD.'backup_pro/libraries/controllers/Settings.php';
require_once PATH_THIRD.'backup_pro/libraries/controllers/Dashboard.php';
require_once PATH_THIRD.'backup_pro/libraries/controllers/Manage.php';
require_once PATH_THIRD.'backup_pro/libraries/controllers/Storage.php';
require_once PATH_THIRD.'backup_pro/libraries/controllers/Restore.php';
require_once PATH_THIRD.'backup_pro/libraries/controllers/Backup.php';

use mithra62\BackupPro\Platforms\Controllers\Ee3;


if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include PATH_THIRD.'backup_pro/config.php';

/**
 * Backup Pro - CP
 *
 * Control Panel class
 *
 * @package 	mithra62\BackupPro
 * @author		Eric Lamb <eric@mithra62.com>
 * @filesource 	./system/expressionengine/third_party/backup_pro/mcp.backup_pro.php
 */
class Backup_pro_mcp extends Ee3
{   
    use BackupProSettingsController, 
        BackupProDashboardController, 
        BackupProManageController, 
        BackupProStorageController, 
        BackupProRestoreController,
        BackupProBackupController;
        
	/**
	 * The URL to access the module
	 * @var string
	 */
	public $url_base = '';
	
	/**
	 * The amount of pagination items per page
	 * @var int
	 */
	public $perpage = 10;
	
	/**
	 * The delimiter for the datatables jquery
	 * @var stirng
	 */
	public $pipe_length = 1;
	
	/**
	 * The name of the module; used for links and whatnots
	 * @var string
	 */
	private $mod_name = 'backup_pro';
	
	/**
	 * The name of the class for the module references
	 * @var string
	 */
	public $class = 'Backup_pro';
	
	/**
	 * The breadcrumb override
	 * @var array
	 */
	protected static $_breadcrumbs = array();	
	
	/**
	 * @ignore
	 */
	public function __construct()
	{
	    parent::__construct();

	    ee()->load->library('javascript');
	    ee()->load->library('table');
	    ee()->load->library('encrypt');
	    ee()->load->helper('form');
	    ee()->load->library('logger');
	    ee()->load->helper('file');
		ee()->load->helper('utilities');
		ee()->load->library('backup_pro_lib', null, 'backup_pro');
		
		$this->query_base = 'C=addons_modules'.AMP.'M=show_module_cp'.AMP.'module='.$this->mod_name.AMP.'method=';
		$this->url_base = BASE.AMP.$this->query_base;
		ee()->backup_pro->set_url_base($this->url_base);

		//grab the backup details
		$backup = $this->services['backups'];
		$backups = $backup->setBackupPath($this->settings['working_directory'])->getAllBackups($this->settings['storage_details']);
		$backup_meta = $backup->getBackupMeta($backups);
		
		$nav_links = ee()->backup_pro->get_backup_menu($this->settings);
		ee()->load->vars(
		    array(
		        'url_base' => $this->url_base,
		        'query_base' => $this->query_base,
		        'settings' => $this->settings,
		        'nav_links' => $nav_links,
		        'theme_folder_url' => m62_theme_url(),
		        'lang' => $this->services['lang'],
		        'view_helper' => $this->view_helper,
		        'note_url' => ee('CP/URL', 'addons/settings/backup_pro/update_backup_note'),
		        'backup_meta' => $backup_meta,
		        'backups' => $backups
		    )
		);
		
		ee()->cp->add_to_foot('<link type="text/css" rel="stylesheet" href="'.m62_theme_url().'backup_pro/css/backup_pro.css" />');
		ee()->cp->add_to_foot('<link type="text/css" rel="stylesheet" href="'.m62_theme_url().'backup_pro/css/chosen.css" />');
		
		ee()->cp->add_to_foot('<script type="text/javascript" src="'.m62_theme_url().'backup_pro/js/chosen.jquery.js"></script>');
		ee()->cp->add_to_foot('<script type="text/javascript" src="'.m62_theme_url().'backup_pro/js/jquery.ddslick.min.js"></script>');
		ee()->cp->add_to_foot('<script type="text/javascript" src="'.m62_theme_url().'backup_pro/js/global.js"></script>');
		ee()->cp->add_to_foot('<script type="text/javascript" src="'.m62_theme_url().'backup_pro/js/dashboard.js"></script>');
		ee()->cp->add_to_foot('<script type="text/javascript" src="'.m62_theme_url().'backup_pro/js/backup.js"></script>');
		ee()->cp->add_to_foot('<script type="text/javascript" src="'.m62_theme_url().'backup_pro/js/settings.js"></script>');
		ee()->cp->add_to_foot('<script type="text/javascript" src="'.m62_theme_url().'backup_pro/js/ee3/backup_pro.js"></script>');
		

		$sidebar = ee('CP/Sidebar')->make();
		$manage = $sidebar->addHeader($this->services['lang']->__('manage_backups'));
		$manage_list = $manage->addBasicList();
		$menu = ee()->backup_pro->get_dashboard_view_menu();
		foreach($menu AS $key => $value)
		{
		    $manage_list->addItem($this->services['lang']->__($key), $value);
		}
		
		$take_backup = $sidebar->addHeader($this->services['lang']->__('backup'));
		$take_backup_list = $take_backup->addBasicList();
		$menu = ee()->backup_pro->get_backup_menu();
		foreach($menu AS $key => $value)
		{
		    $take_backup_list->addItem($this->services['lang']->__($key), $value);
		}
		
		$settings = $sidebar->addHeader($this->services['lang']->__('nav_backup_pro_settings'));
		$settings_list = $settings->addBasicList();
		$menu = ee()->backup_pro->get_settings_view_menu();
		foreach($menu AS $key => $value)
		{
		    $settings_list->addItem($this->services['lang']->__($key), $value);
		}		
		
	}
	
	private function add_breadcrumb($link, $title)
	{
		ee()->cp->set_breadcrumb($link, $title);
	}
}