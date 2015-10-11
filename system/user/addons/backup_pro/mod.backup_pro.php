<?php 
/**
 * mithra62 - Backup Pro
 *
 * @author		Eric Lamb
 * @copyright	Copyright (c) 2015, mithra62, Eric Lamb.
 * @link		http://mithra62.com/projects/view/backup-pro/
 * @version		3.0
 * @filesource 	./system/expressionengine/third_party/backup_pro/
 */

require_once PATH_THIRD.'backup_pro/vendor/autoload.php';

use mithra62\BackupPro\Platforms\Controllers\Eecms;

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include PATH_THIRD.'backup_pro/config'.EXT;
require_once PATH_THIRD.'backup_pro/libraries/controllers/Cron'.EXT;


/**
 * Backup Pro - Mod
 *
 * Module class
 *
 * @package 	mithra62\BackupPro
 * @author		Eric Lamb
 * @filesource 	./system/expressionengine/third_party/backup_pro/mod.backup_pro.php
 */
class Backup_pro extends Eecms
{
    use BackupProCronController;
    
	public $return_data	= '';
}