<?php
/**
 * mithra62 - Backup Pro
 *
 * @copyright	Copyright (c) 2015, mithra62, Eric Lamb.
 * @link		http://mithra62.com/
 * @version		3.0
 * @filesource 	./mithra62/BackupPro/Controllers/Eecms/Settings.php
 */

/**
 * Backup Pro - Eecms Settings Controller
 *
 * Contains the Settings Controller Actions for ExpressionEngine
 *
 * @package 	BackupPro\Eecms\Controllers
 * @author		Eric Lamb <eric@mithra62.com>
 */
trait BackupProSettingsController
{
    /**
     * The Settings Control Panel page
     */
    public function settings()
    {
        $section = ( ee()->input->get_post('section') != '' ? ee()->input->get_post('section') : 'general' );
        $variables = array('form_data' => $this->settings, 'form_errors' => $this->returnEmpty($this->settings));
        $variables['form_data']['cron_notify_emails'] = implode("\n", $this->settings['cron_notify_emails']);
        $variables['form_data']['exclude_paths'] = implode("\n", $this->settings['exclude_paths']);
        $variables['form_data']['backup_file_location'] = implode("\n", $this->settings['backup_file_location']);
        $variables['form_data']['db_backup_archive_pre_sql'] = implode("\n", $this->settings['db_backup_archive_pre_sql']);
        $variables['form_data']['db_backup_archive_post_sql'] = implode("\n", $this->settings['db_backup_archive_post_sql']);
        $variables['form_data']['db_backup_execute_pre_sql'] = implode("\n", $this->settings['db_backup_execute_pre_sql']);
        $variables['form_data']['db_backup_execute_post_sql'] = implode("\n", $this->settings['db_backup_execute_post_sql']);
        $variables['form_data']['backup_missed_schedule_notify_emails'] = implode("\n", $this->settings['backup_missed_schedule_notify_emails']);
        
        if( ee()->input->server('REQUEST_METHOD') == 'POST' )
        {
            $data = array();
            foreach($_POST as $key => $value){
                $data[$key] = ee()->input->post($key);
            }
    
            $variables['form_data'] = array_merge(array('db_backup_ignore_tables' => '', 'db_backup_ignore_table_data' => ''), $data);
            $backup = $this->services['backups'];
            $backups = $backup->setBackupPath($this->settings['working_directory'])->getAllBackups($this->settings['storage_details']);
            $data['meta'] = $backup->getBackupMeta($backups);
            $extra = array('db_creds' => $this->platform->getDbCredentials());
            $settings_errors = $this->services['settings']->validate($data, $extra);
            if( !$settings_errors )
            {
                if( $this->services['settings']->update($data) )
                {
                    ee()->session->set_flashdata('message_success', $this->services['lang']->__('settings_updated'));
                    ee()->functions->redirect($this->url_base.'settings'.AMP.'section='.ee()->input->get_post('section'));
                }
            }
            else
            {
                $variables['form_errors'] = array_merge($variables['form_errors'], $settings_errors);
            }
        }
    
        $variables['section']= $section;
        $variables['db_tables'] = $this->services['db']->getTables();
        $variables['backup_cron_commands'] = $this->platform->getBackupCronCommands($this->settings);
        $variables['ia_cron_commands'] = $this->platform->getIaCronCommands($this->settings);
        $variables['errors'] = $this->errors;
        $variables['threshold_options'] = $this->services['settings']->getAutoPruneThresholdOptions();
        $variables['available_db_backup_engines'] = $this->services['backup']->getDataBase()->getAvailableEnginesOptions();
        $variables['menu_data'] = ee()->backup_pro->get_settings_view_menu();
    
        ee()->view->cp_page_title = $this->services['lang']->__($variables['section'].'_bp_settings_menu');
        return ee()->load->view('settings', $variables, true);
    }
}