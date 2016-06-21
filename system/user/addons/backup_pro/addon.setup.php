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
 
require_once PATH_THIRD.'backup_pro/mithra62/BackupPro/BackupPro.php';

class EE3BackupPro implements \mithra62\BackupPro\BackupPro { }
$class = new EE3BackupPro();

return array(
    'author'      => 'mithra62',
    'author_url'  => $class::base_url,
    'name'        => 'Backup Pro',
    'description' => 'Interface to create database and file backups of your site.',
    'version'     => $class::version,
    'namespace'   => 'mithra62\BackupPro',
	'settings_exist' => TRUE,
	'docs_url' => $class::docs_url
);