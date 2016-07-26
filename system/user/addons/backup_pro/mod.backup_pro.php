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

use mithra62\BackupPro\Platforms\Controllers\Ee3;
use mithra62\BackupPro\Rest;

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include PATH_THIRD.'backup_pro/config.php';
require_once PATH_THIRD.'backup_pro/libraries/controllers/Cron.php';


/**
 * Backup Pro - Mod
 *
 * Module class
 *
 * @package 	mithra62\BackupPro
 * @author		Eric Lamb
 * @filesource 	./system/expressionengine/third_party/backup_pro/mod.backup_pro.php
 */
class Backup_pro extends Ee3
{
    use BackupProCronController;
    
	public $return_data	= '';
	
	public function api()
	{
        $_SERVER['REQUEST_URI'] = '/backup_pro/api'.$this->platform->getPost('api_method');
	    $this->services['rest']->setPlatform($this->platform)->getServer()->run();
	    exit;
	}
	
	public function test_api()
	{
	    $creds = array(
	        'api_key' => '3fd6f390-827e-c64e-bdba-ab5f34302725',
	        'api_secret' => '2283c279-8453-d0d3-b849-a18df75edf41',
	        //'site_url' => 'http://eric.scga.org/?ACT=90&api_method=',
	        'site_url' => 'http://eric.ee3.mithra62.com/?ACT=52&api_method=',
	    );
	    
	    $client = new \mithra62\BpApiClient\Client($creds);
	    $payload = array('type' => 'files');
	    $backups = $client->post('/backups', $payload);
	     
	    print_R($backups);
	    exit;
	}
}