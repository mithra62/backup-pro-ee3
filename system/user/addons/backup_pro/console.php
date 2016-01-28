<?php
/**
 * mithra62 - Backup Pro
 *
 * @copyright	Copyright (c) 2015, mithra62, Eric Lamb.
 * @link		http://mithra62.com/
 * @version		3.0
 * @filesource 	./console.php
 */

if( php_sapi_name() !== 'cli' ){
    exit;
}

$old_wd = getcwd();
chdir(__DIR__);

if( !file_exists( './cli.config.php') ){
    echo "Config file not set...";
    exit;
}

//error_reporting(E_ALL | E_STRICT);
//ini_set('display_errors', 1);
ini_set('log_errors', 0);
ini_set('html_errors', 0);

require_once dirname(__FILE__).'/vendor/autoload.php';

use mithra62\BackupPro\Platforms\Controllers\Console;

$config = include './cli.config.php';

$controller = new Console($config);
$controller->run();
chdir($old_wd);