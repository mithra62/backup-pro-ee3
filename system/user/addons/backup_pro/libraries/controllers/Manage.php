<?php
/**
 * mithra62 - Backup Pro
 *
 * @copyright	Copyright (c) 2015, mithra62, Eric Lamb.
 * @link		http://mithra62.com/
 * @version		3.0
 * @filesource 	./mithra62/BackupPro/Controllers/Eecms/Manage.php
 */

/**
 * Backup Pro - Eecms Manage Backup Controller
 *
 * Contains the Manage Backup Controller Actions for ExpressionEngine
 *
 * @package 	BackupPro\Eecms\Controllers
 * @author		Eric Lamb <eric@mithra62.com>
 */
trait BackupProManageController
{
    /**
     * Download a backup action
     */
    public function download()
    {
        $encrypt = $this->services['encrypt'];
        $file_name = $encrypt->decode(ee()->input->get_post('id'));
        $type = ee()->input->get_post('type');
        $storage = $this->services['backup']->setStoragePath($this->settings['working_directory']);
        if($type == 'files')
        {
            $file = $storage->getStorage()->getFileBackupNamePath($file_name);
        }
        else
        {
            $file = $storage->getStorage()->getDbBackupNamePath($file_name);
        }
    
        
        $backup_info = $this->services['backups']->setLocations($this->settings['storage_details'])->getBackupData($file);
        $download_file_path = false;
        if( !empty($backup_info['storage_locations']) && is_array($backup_info['storage_locations']) )
        {
            foreach($backup_info['storage_locations'] AS $storage_location)
            {
                if( $storage_location['obj']->canDownload() )
                {
                    $download_file_path = $storage_location['obj']->getFilePath($backup_info['file_name'], $backup_info['backup_type']); //next, get file path
                    break;
                }
            }
        }
    
        if($download_file_path && file_exists($download_file_path))
        {
            //$new_name = $backup->getStorage()->makePrettyFilename($file_name, $type, craft()->config->get('siteName'));
            $this->services['files']->fileDownload($download_file_path);
            exit;
        }
        else
        {
            ee()->session->set_flashdata('message_error', $this->services['lang']->__('db_backup_not_found'));
            ee()->functions->redirect($this->url_base.'index');
        }
    }
    
    /**
     * AJAX Action for updating a backup note
     */
    public function update_backup_note()
    {
        $encrypt = $this->services['encrypt'];
        $file_name = $encrypt->decode(ee()->input->get_post('backup'));
        $backup_type = ee()->input->get_post('backup_type'); 
        $note_text = ee()->input->get_post('note_text'); 
        if($note_text && $file_name)
        {
            $path = rtrim($this->settings['working_directory'], DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$backup_type;
            $this->services['backup']->getDetails()->addDetails($file_name, $path, array('note' => $note_text));
            echo json_encode(array('success'));
        }
        exit;
    }
    
    /**
     * Delete Backup Confirmation Action
     */
    public function delete_backup_confirm()
    {
        $delete_backups = ee()->input->get_post('backups');
        $type = ee()->input->get_post('type'); 
        $backups = $this->validateBackups($delete_backups, $type);
        $variables = array(
            'settings' => $this->settings,
            'backups' => $backups,
            'backup_type' => $type,
            'menu_data' => ee()->backup_pro->get_dashboard_view_menu(),
            'method' => ee()->input->get_post('method'),
            'errors' => $this->errors
        );
    
        //$template = 'backuppro/delete_confirm';
    
        ee()->view->cp_page_title = $this->services['lang']->__('dashboard');
        return ee()->load->view('delete_confirm', $variables, true);
    }
    
    /**
     * Delete Backup Action
     */
    public function delete_backups()
    {
        $delete_backups = ee()->input->get_post('backups');
        $type = ee()->input->get_post('type'); 
        $backups = $this->validateBackups($delete_backups, $type);
        if( $this->services['backups']->setBackupPath($this->settings['working_directory'])->removeBackups($backups) )
        {
            ee()->session->set_flashdata('message_success', $this->services['lang']->__('backups_deleted'));
            ee()->functions->redirect($this->url_base.'index');
        }
        else
        {
            ee()->session->set_flashdata('message_error', $this->services['lang']->__('backup_delete_failure'));
            ee()->functions->redirect($this->url_base.'index');
        }
    }
    
    /**
     * Validates the POST'd backup data and returns the clean array
     * @param array $delete_backups
     * @param string $type
     * @return multitype:array
     */
    private function validateBackups($delete_backups, $type)
    {
        if(!$delete_backups || count($delete_backups) == 0)
        {
            ee()->session->set_flashdata('message_error', $this->services['lang']->__('backups_not_found'));
            ee()->functions->redirect($this->url_base.'index');
        }
    
        $encrypt = $this->services['encrypt'];
        $backups = array();
    
        $locations = $this->settings['storage_details'];
        $drivers = $this->services['backup']->getStorage()->getAvailableStorageDrivers();
        foreach($delete_backups AS $file_name)
        {
            $file_name = $encrypt->decode(urldecode($file_name));
            if( $file_name != '' )
            {
                $path = rtrim($this->settings['working_directory'], DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$type;
                $file_data = $this->services['backup']->getDetails()->getDetails($file_name, $path);
                $file_data = $this->services['backups']->getBackupStorageData($file_data, $locations, $drivers);
                $backups[] = $file_data;
            }
        }
    
        if(count($backups) == 0)
        {
            ee()->session->set_flashdata('message_error', $this->services['lang']->__('backups_not_found'));
            ee()->functions->redirect($this->url_base.'index');
        }
    
        return $backups;
    }    
}