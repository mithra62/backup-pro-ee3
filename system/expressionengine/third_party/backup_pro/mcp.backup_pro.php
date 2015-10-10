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
require_once PATH_THIRD.'backup_pro/libraries/controllers/Settings'.EXT;
require_once PATH_THIRD.'backup_pro/libraries/controllers/Dashboard'.EXT;
require_once PATH_THIRD.'backup_pro/libraries/controllers/Manage'.EXT;
require_once PATH_THIRD.'backup_pro/libraries/controllers/Storage'.EXT;
require_once PATH_THIRD.'backup_pro/libraries/controllers/Restore'.EXT;
require_once PATH_THIRD.'backup_pro/libraries/controllers/Backup'.EXT;

use mithra62\BackupPro\Platforms\Controllers\Eecms;


if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include PATH_THIRD.'backup_pro/config'.EXT;

/**
 * Backup Pro - CP
 *
 * Control Panel class
 *
 * @package 	mithra62\BackupPro
 * @author		Eric Lamb <eric@mithra62.com>
 * @filesource 	./system/expressionengine/third_party/backup_pro/mcp.backup_pro.php
 */
class Backup_pro_mcp extends Eecms
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

		$nav_links = ee()->backup_pro->get_right_menu($this->settings);
		ee()->load->vars(
		    array(
		        'url_base' => $this->url_base,
		        'query_base' => $this->query_base,
		        'settings' => $this->settings,
		        'nav_links' => $nav_links,
		        'theme_folder_url' => m62_theme_url(),
		        'lang' => $this->services['lang'],
		        'view_helper' => $this->view_helper
		    )
		);


		ee()->cp->set_breadcrumb(BASE.AMP.'C=addons_modules'.AMP.'M=show_module_cp'.AMP.'module='.$this->mod_name, ee()->lang->line('backup_pro_module_name'));
		ee()->cp->set_right_nav($nav_links);
		
		ee()->cp->add_to_foot('<link type="text/css" rel="stylesheet" href="'.m62_theme_url().'backup_pro/css/backup_pro.css" />');
		ee()->cp->add_to_foot('<link type="text/css" rel="stylesheet" href="'.m62_theme_url().'backup_pro/css/chosen.css" />');
		
		ee()->cp->add_to_foot('<script type="text/javascript" src="'.m62_theme_url().'backup_pro/js/chosen.jquery.js"></script>');
		ee()->cp->add_to_foot('<script type="text/javascript" src="'.m62_theme_url().'backup_pro/js/jquery.ddslick.min.js"></script>');
		ee()->cp->add_to_foot('<script type="text/javascript" src="'.m62_theme_url().'backup_pro/js/global.js"></script>');
		ee()->cp->add_to_foot('<script type="text/javascript" src="'.m62_theme_url().'backup_pro/js/dashboard.js"></script>');
		ee()->cp->add_to_foot('<script type="text/javascript" src="'.m62_theme_url().'backup_pro/js/backup.js"></script>');
		ee()->cp->add_to_foot('<script type="text/javascript" src="'.m62_theme_url().'backup_pro/js/settings.js"></script>');
		ee()->cp->add_to_foot('<script type="text/javascript" src="'.m62_theme_url().'backup_pro/js/eecms/backup_pro.js"></script>');
	}
	
	private function add_breadcrumb($link, $title)
	{
		ee()->cp->set_breadcrumb($link, $title);
	}
}