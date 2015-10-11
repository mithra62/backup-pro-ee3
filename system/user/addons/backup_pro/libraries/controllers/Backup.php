<?php
/**
 * mithra62 - Backup Pro
 *
 * @copyright	Copyright (c) 2015, mithra62, Eric Lamb.
 * @link		http://mithra62.com/
 * @version		3.0
 * @filesource 	./mithra62/BackupPro/Controllers/Eecms/Backup.php
 */

use mithra62\Traits\Log;

/**
 * Backup Pro - Eecms Backup Controller
 *
 * Contains the Backup Controller Actions for ExpressionEngine
 *
 * @package 	BackupPro\Eecms\Controllers
 * @author		Eric Lamb <eric@mithra62.com>
 */
trait BackupProBackupController
{
    use Log;
    
    /**
     * Manually execute a database backup
     */
    public function backup_database()
    {
        @session_write_close();
        $error = $this->services['errors'];
        $backup = $this->services['backup']->setStoragePath($this->settings['working_directory']);
        $error->clearErrors()->checkStorageLocations($this->settings['storage_details'])
              ->checkWorkingDirectory($this->settings['working_directory'])
              ->checkBackupDirs($backup->getStorage());
        if( $error->totalErrors() == '0' )
        {
            ini_set('memory_limit', -1);
            set_time_limit(0);
    
            $db_info = $this->platform->getDbCredentials();
            if( $backup->setDbInfo($db_info)->database($db_info['database'], $this->settings, $this->services['shell']) )
            {
                $backups = $this->services['backups']->setBackupPath($this->settings['working_directory'])
                                                     ->getAllBackups($this->settings['storage_details']);
    
                $backup->getStorage()->getCleanup()->setStorageDetails($this->settings['storage_details'])
                                     ->setBackups($backups)
                                     ->setDetails($this->services['backups']->getDetails())
                                     ->autoThreshold($this->settings['auto_threshold'])
                                     ->counts($this->settings['max_db_backups'])
                                     ->duplicates($this->settings['allow_duplicates']);
                
                ee()->session->set_flashdata('message_success', $this->services['lang']->__('backup_progress_bar_stop'));
                ee()->functions->redirect($this->url_base.'db_backups');
            }
        }
        else
        {
            ee()->session->set_flashdata('message_error', $this->services['lang']->__($error->getError()));
            ee()->functions->redirect($this->url_base.'db_backups');
        }
    
        exit;
    }
    
    /**
     * Manually execute a file backup
     */
    public function backup_files()
    {
        @session_write_close();
        $error = $this->services['errors'];
        $backup = $this->services['backup']->setStoragePath($this->settings['working_directory']);
        $error->clearErrors()->checkStorageLocations($this->settings['storage_details'])
              ->checkBackupDirs($backup->getStorage())
              ->checkWorkingDirectory($this->settings['working_directory'])
              ->checkFileBackupLocations($this->settings['backup_file_location']);
        if( $error->totalErrors() == 0 )
        {
            ini_set('memory_limit', -1);
            set_time_limit(0);
            if( $backup->files($this->settings, $this->services['files'], $this->services['regex']) )
            {
                $backups = $this->services['backups']->setBackupPath($this->settings['working_directory'])
                                ->getAllBackups($this->settings['storage_details']);
    
                $backup->getStorage()->getCleanup()->setStorageDetails($this->settings['storage_details'])
                                     ->setBackups($backups)
                                     ->setDetails($this->services['backups']->getDetails())
                                     ->autoThreshold($this->settings['auto_threshold'])
                                     ->counts($this->settings['max_file_backups'], 'files')
                                     ->duplicates($this->settings['allow_duplicates']);
                
                ee()->session->set_flashdata('message_success', $this->services['lang']->__('backup_progress_bar_stop'));
                ee()->functions->redirect($this->url_base.'file_backups');
                exit;
            }
        }
        else
        {
            $url = $this->url_base.'file_backups';
            if( $error->getError() == 'no_backup_file_location' )
            {
                $url = $this->url_base.'settings&section=files';
            }
            
            ee()->session->set_flashdata('message_error', $this->services['lang']->__($error->getError()));
            ee()->functions->redirect($url);
        }
    }    
    


    public function backup()
    {
        $type = ee()->input->get_post('type', TRUE);
        ee()->view->cp_page_title = $this->services['lang']->__('backup_'.$type);
        $proc_url = FALSE;
        $backup = $this->services['backup']->setStoragePath($this->settings['working_directory']);
        switch($type)
        {
            case 'database':
                $proc_url = $this->url_base.'backup_database';
                $errors = $this->services['errors']->clearErrors()->checkWorkingDirectory($this->settings['working_directory'])
                                                 ->checkStorageLocations($this->settings['storage_details'])
                                                 ->getErrors();
                break;
            case 'files':
                $proc_url = $this->url_base.'backup_files';
                $errors = $this->services['errors']->clearErrors()->checkWorkingDirectory($this->settings['working_directory'])
                                                 ->checkStorageLocations($this->settings['storage_details'])
                                                 ->checkFileBackupLocations($this->settings['backup_file_location'])
                                                 ->getErrors();
                break;
        }
    
        if(!$proc_url)
        {
            ee()->session->set_flashdata('message_failure', $this->services['lang']->__('can_not_backup'));
            ee()->functions->redirect($this->url_base.'index');
            exit;
        }
    
        //ee()->cp->add_js_script('ui', 'progressbar');
        //ee()->javascript->output('$("#progressbar").progressbar({ value: 0 });');
        //ee()->javascript->compile();
    
        $vars = array('proc_url' => $proc_url);
        $vars['errors'] = $this->errors;
        $vars['pre_backup_errors'] = $errors;
        $vars['proc_url'] = $proc_url;
        $vars['url_base'] = $this->url_base;
        $vars['backup_type'] = $type;
        $vars['menu_data'] = ee()->backup_pro->get_dashboard_view_menu();
        $vars['method'] = '';
        return ee()->load->view('backup', $vars, TRUE);
    }
}