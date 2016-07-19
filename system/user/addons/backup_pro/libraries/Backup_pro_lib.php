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
 * Backup Pro - EE3 Base Library
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
	public function get_backup_menu()
	{
	   $menu = array(
		    'nav_backup_db'		=> ee('CP/URL', 'addons/settings/backup_pro/backup/database'),
		    'nav_backup_files'	=> ee('CP/URL', 'addons/settings/backup_pro/backup/files')
		);
	
		if (ee()->extensions->active_hook('backup_pro_modify_backup_menu') === TRUE)
		{
			$menu = ee()->extensions->call('backup_pro_modify_backup_menu', $menu);
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
			'general_bp_settings_menu'   => ee('CP/URL', 'addons/settings/backup_pro/settings/general'),
			'db_bp_settings_menu'		=> ee('CP/URL', 'addons/settings/backup_pro/settings/db'),
			'files_bp_settings_menu'		=> ee('CP/URL', 'addons/settings/backup_pro/settings/files'),
			'cron_bp_settings_menu'		=> ee('CP/URL', 'addons/settings/backup_pro/settings/cron'),
			'storage_bp_settings_menu'		=> ee('CP/URL', 'addons/settings/backup_pro/view_storage'),
			'integrity_agent_bp_settings_menu'		=> ee('CP/URL', 'addons/settings/backup_pro/settings/integrity_agent'),
			'api_bp_settings_menu'		=> ee('CP/URL', 'addons/settings/backup_pro/settings/api'),
			'license_bp_settings_menu'		=> ee('CP/URL', 'addons/settings/backup_pro/settings/license'),
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
			'home_bp_dashboard_menu'   => ee('CP/URL', 'addons/settings/backup_pro'),
			'db_bp_dashboard_menu'   => ee('CP/URL', 'addons/settings/backup_pro/db_backups'),
			'files_bp_dashboard_menu'   => ee('CP/URL', 'addons/settings/backup_pro/file_backups'),
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
			 'file_backup' => array('url' => $url.AMP.'type=file', 'cmd' => 'curl "'.$url.AMP.'type=file"'),
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
	
	public function get_api_route_entry(array $settings)
	{
	    ee()->load->dbforge();
	    ee()->db->select('action_id');
	    $query = ee()->db->get_where('actions', array('class' => 'Backup_pro', 'method' => 'api'));
	    $action_id = $query->row('action_id');
	    return ee()->config->config['site_url'].'?ACT='.$action_id.AMP.'bp_method=';
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