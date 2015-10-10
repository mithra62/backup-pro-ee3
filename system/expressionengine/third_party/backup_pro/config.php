<?php  
/**
 * mithra62 - Backup Pro
 *
 * @package		BackupPro
 * @author		Eric Lamb
 * @copyright	Copyright (c) 2015, mithra62, Eric Lamb.
 * @link		http://mithra62.com/projects/view/backup-pro/
 * @version		3.0
 * @filesource 	./system/expressionengine/third_party/backup_pro/
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('ee'))
{
	/**
	 * Stub for missing ee() function 
	 * @return CI_Controller
	 */
	function ee()
	{
		static $EE;
		if ( ! $EE) $EE = get_instance();
		return $EE;
	}
}

$config['class_name'] = 'Backup_pro';
$config['settings_table'] = 'backup_pro_settings';

$config['mod_url_name'] = strtolower($config['class_name']);
$config['ext_class_name'] = $config['class_name'].'_ext';
$config['docs_url'] = 'https://mithra62.com/docs/detail/backup-pro-2-installation';

$config['name'] = 'Backup Pro';
$config['version'] = '3.0.1';
//$config['nsm_addon_updater']['versions_xml'] = 'http://mithra62.com/backup-pro.xml';