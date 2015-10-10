<?php 
/**
 * mithra62 - Backup Pro
 *
 * @author		Eric Lamb
 * @copyright	Copyright (c) 2015, mithra62, Eric Lamb.
 * @link		http://mithra62.com/projects/view/backup-pro/
 * @version		2.0
 * @filesource 	./system/expressionengine/third_party/backup_pro/
 */

 /**
 * Backup Pro - EE Base Library
 *
 * Base Library class
 *
 * @package 	mithra62\BackupPro
 * @author		Eric Lamb
 * @filesource 	./system/expressionengine/third_party/backup_pro/libraries/Backup_pro_lib.php
 */
class Backup_pro_lib
{
	/**
	 * Sets up the right menu options
	 * @return multitype:string
	 */
	public function get_right_menu(array $settings)
	{
	   $menu = array(
			'dashboard'		=> $this->url_base.'index',
		    'backup_db'		=> $this->url_base.'backup&type=database',
		    'backup_files'	=> $this->url_base.'backup&type=file'
		);
		
		if(ee()->session->userdata('group_id') == '1' || (isset($this->settings['allowed_access_levels']) && is_array($this->settings['allowed_access_levels'])))
		{
			if(ee()->session->userdata('group_id') == '1' || in_array(ee()->session->userdata('group_id'), $this->settings['allowed_access_levels']))
			{
				$menu['settings'] = $this->url_base.'settings'.AMP.'section=general';
			}
		}
	
		if (ee()->extensions->active_hook('backup_pro_modify_right_menu') === TRUE)
		{
			$menu = ee()->extensions->call('backup_pro_modify_right_menu', $menu);
			if (ee()->extensions->end_script === TRUE) return $menu;
		}
		
		return $menu;
	}
	
	/**
	 * Creates the Settings menu for the view script
	 * @return multitype:multitype:string  multitype:string unknown
	 */
	public function get_settings_view_menu()
	{
		$menu = array(
			'general' => array('url' => 'general', 'target' => '', 'div_class' => ''),
			'db' => array('url' => 'db', 'target' => '', 'div_class' => ''),
			'files' => array('url' => 'files', 'target' => '_self', 'div_class' => ''),
			'cron' => array('url' => 'cron', 'target' => '', 'div_class' => ''),
			'storage' => array('url' => 'storage', 'target' => '', 'div_class' => ''),
			'integrity_agent' => array('url' => 'integrity_agent', 'target' => '', 'div_class' => ''),
			'license' => array('url' => 'license', 'target' => '', 'div_class' => ''),
		);
	
		if (ee()->extensions->active_hook('backup_pro_modify_settings_menu') === TRUE)
		{
			$menu = ee()->extensions->call('backup_pro_modify_settings_menu', $menu);
			if (ee()->extensions->end_script === TRUE) return $menu;
		}
	
		return $menu;
	}
	
	/**
	 * Creates the Dashboard menu for the view script
	 * @return multitype:multitype:string  multitype:string unknown
	 */
	public function get_dashboard_view_menu()
	{
		$menu = array(
			'home' => array('url' => 'index', 'target' => '', 'div_class' => ''),
			'db' => array('url' => 'db_backups', 'target' => '', 'div_class' => ''),
			'files' => array('url' => 'file_backups', 'target' => '_self', 'div_class' => '')
		);
	
		if (ee()->extensions->active_hook('backup_pro_modify_settings_menu') === TRUE)
		{
			$menu = ee()->extensions->call('backup_pro_modify_settings_menu', $menu);
			if (ee()->extensions->end_script === TRUE) return $menu;
		}
	
		return $menu;
	}		
	
	/**
	 * Returns the Cron output array
	 * @return array
	 */
	public function get_cron_commands(array $settings)
	{
		$action_id = $this->get_cron_action();
		$url = ee()->config->config['site_url'].'?backup_pro='.$settings['cron_query_key'].AMP.'ACT='.$action_id;
		return array(
			 'file_backup' => array('url' => $url.AMP.'type=file', 'cmd' => 'curl "'.$url.AMP.'type=files"'),
			 'db_backup' => array('url' => $url.AMP.'type=db', 'cmd' => 'curl "'.$url.AMP.'type=db"')
		);
	}
	
	/**
	 * Returns the Action ID for the Cron action
	 */
	public function get_cron_action()
	{
		ee()->load->dbforge();
		ee()->db->select('action_id');
		$query = ee()->db->get_where('actions', array('class' => 'Backup_pro', 'method' => 'cron'));		
		return $query->row('action_id');
	}
	
	/**
	 * Returns the Cron output array
	 * @return array
	 */
	public function get_ia_cron_commands(array $settings)
	{
		$action_id = $this->get_ia_cron_action();
		$url = ee()->config->config['site_url'].'?backup_pro='.$settings['cron_query_key'].AMP.'ACT='.$action_id;
		return array(
			'verify_backup_stability' => array('url' => $url, 'cmd' => '0 * * * * * curl "'.$url.'"')
		);
	}
	
	/**
	 * Returns the Action ID for the Integrity Agent Cron action
	 */
	public function get_ia_cron_action()
	{
		ee()->load->dbforge();
		ee()->db->select('action_id');
		$query = ee()->db->get_where('actions', array('class' => 'Backup_pro', 'method' => 'integrity'));		
		return $query->row('action_id');
	}
	
	/**
	 * Wrapper to handle CP URL creation
	 * @param string $method
	 */
	public function _create_url($method)
	{
		return $this->url_base.$method;
	}

	/**
	 * Creates the value for $url_base
	 * @param string $url_base
	 */
	public function set_url_base($url_base)
	{
		$this->url_base = $url_base;
	}
}