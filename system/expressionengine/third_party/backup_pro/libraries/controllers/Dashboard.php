<?php
/**
 * mithra62 - Backup Pro
 *
 * @copyright	Copyright (c) 2015, mithra62, Eric Lamb.
 * @link		http://mithra62.com/
 * @version		3.0
 * @filesource 	./mithra62/BackupPro/Controllers/Eecms/Dashboard.php
 */

/**
 * Backup Pro - Eecms Dashboard Controller
 *
 * Contains the Dashboard Controller Actions for ExpressionEngine
 *
 * @package 	BackupPro\Eecms\Controllers
 * @author		Eric Lamb <eric@mithra62.com>
 */
trait BackupProDashboardController
{
    /**
     * The Dashboard view
     */
    public function index()
    {
        $backup = $this->services['backups'];
        $backups = $backup->setBackupPath($this->settings['working_directory'])->getAllBackups($this->settings['storage_details']);
    
        $backup_meta = $backup->getBackupMeta($backups);
        $available_space = $backup->getAvailableSpace($this->settings['auto_threshold'], $backups);
    
        $backups = $backups['database'] + $backups['files'];
        krsort($backups, SORT_NUMERIC);
    
        if(count($backups) > $this->settings['dashboard_recent_total'])
        {
            //we have to remove a few
            $filtered_backups = array();
            $count = 1;
            foreach($backups AS $time => $backup)
            {
                $filtered_backups[$time] = $backup;
                if($count >= $this->settings['dashboard_recent_total'])
                {
                    break;
                }
                $count++;
            }
            $backups = $filtered_backups;
        }
    
        ee()->jquery->tablesorter('#backups table', '{headers: {8: {sorter: false}, 0: {sorter: false}, 1: {sorter: false}, 2: {sorter: false}}, widgets: ["zebra"], sortList: [[3,1]]}');
        ee()->javascript->compile();
    
        $variables = array(
            'settings' => $this->settings,
            'backup_meta' => $backup_meta,
            'backups' => $backups,
            'available_space' => $available_space,
            'errors' => $this->errors,
            'menu_data' => ee()->backup_pro->get_dashboard_view_menu(),
            'method' => ee()->input->get_post('method')
        );
    
        ee()->view->cp_page_title = $this->services['lang']->__('dashboard');
        return ee()->load->view('dashboard', $variables, true);
    }
    
    /**
     * The view database backups view
     */
    public function db_backups()
    {
        $backup = $this->services['backups'];
        $backups = $backup->setBackupPath($this->settings['working_directory'])->getAllBackups($this->settings['storage_details']);
        $backup_meta = $backup->getBackupMeta($backups);
         
        $variables = array(
            'settings' => $this->settings,
            'backup_meta' => $backup_meta,
            'backups' => $backups,
            'errors' => $this->errors,
            'menu_data' => ee()->backup_pro->get_dashboard_view_menu(),
            'method' => ee()->input->get_post('method')
        );
         
        ee()->view->cp_page_title = ee()->lang->line('database_backups');
        ee()->jquery->tablesorter('#database_backups table', '{headers: {8: {sorter: false}, 0: {sorter: false}, 1: {sorter: false}, 2: {sorter: false}, 3: {sorter: false}}, widgets: ["zebra"], sortList: [[4,1]]}');
        ee()->javascript->compile();
    
        ee()->view->cp_page_title = $this->services['lang']->__('database_backups');
        return ee()->load->view('database_backups', $variables, true);
    }
    
    /**
     * The view file backups view
     */
    public function file_backups()
    {
         
        $backup = $this->services['backups'];
        $backups = $backup->setBackupPath($this->settings['working_directory'])->getAllBackups($this->settings['storage_details']);
        $backup_meta = $backup->getBackupMeta($backups);
         
        $variables = array(
            'settings' => $this->settings,
            'backup_meta' => $backup_meta,
            'backups' => $backups,
            'errors' => $this->errors,
            'menu_data' => ee()->backup_pro->get_dashboard_view_menu(),
            'method' => ee()->input->get_post('method')
        );

        ee()->jquery->tablesorter('#file_backups table', '{headers: {8: {sorter: false}, 0: {sorter: false}, 1: {sorter: false}, 2: {sorter: false}, 3: {sorter: false}}, widgets: ["zebra"], sortList: [[4,1]]}');
        ee()->javascript->compile();
    
        ee()->view->cp_page_title = $this->services['lang']->__('file_backups');
        return ee()->load->view('file_backups', $variables, true);
    }
}