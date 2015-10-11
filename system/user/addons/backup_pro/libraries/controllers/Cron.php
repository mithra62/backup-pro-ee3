<?php
/**
 * mithra62 - Backup Pro
 *
 * @copyright	Copyright (c) 2015, mithra62, Eric Lamb.
 * @link		http://mithra62.com/
 * @version		3.0
 * @filesource 	./mithra62/BackupPro/Controllers/Eecms/Cron.php
 */

use mithra62\Traits\Log;
use mithra62\BackupPro\Exceptions\BackupException;

/**
 * Backup Pro - Eecms Cron Controller
 *
 * Contains the Cron Controller Actions for ExpressionEngine
 *
 * @package 	BackupPro\Eecms\Controllers
 * @author		Eric Lamb <eric@mithra62.com>
 */
trait BackupProCronController
{
    use Log;
    
    /**
     * The Backup Cron
    */
    public function cron()
    {
        if( ee()->input->get_post('backup_pro') != $this->settings['cron_query_key'] )
        {
            exit;
        }
        
        @session_write_close();
        $error = $this->services['errors'];
        $backup = $this->services['backup']->setStoragePath($this->settings['working_directory']);
        $errors = $error->clearErrors()->checkStorageLocations($this->settings['storage_details'])->checkBackupDirs($backup->getStorage())->getErrors();
    
        if( $error->totalErrors() == '0' )
        {
            ini_set('memory_limit', -1);
            set_time_limit(0);
    
            $backup_type = ee()->input->get_post('type');
            $backup_paths = array();
            switch($backup_type)
            {
                case 'db':
                    $db_info = $this->platform->getDbCredentials();
                    $backup_paths['database'] = $backup->setDbInfo($db_info)->database($db_info['database'], $this->settings, $this->services['shell']);
                    break;
    
                case 'file':
                    $backup_paths['files'] = $backup->files($this->settings, $this->services['files'], $this->services['regex']);
                    break;
            }
            
            $backups = $this->services['backups']->setBackupPath($this->settings['working_directory'])
                                                 ->getAllBackups($this->settings['storage_details']);
            $backup->getStorage()->getCleanup()->setStorageDetails($this->settings['storage_details'])
                                               ->setBackups($backups)
                                               ->setDetails($this->services['backups']->getDetails())
                                               ->autoThreshold($this->settings['auto_threshold'])
                                               ->counts($this->settings['max_file_backups'], 'files')
                                               ->duplicates($this->settings['allow_duplicates']);            
    
            //now send the notifications (if any)
            if(count($backup_paths) >= 1 && (is_array($this->settings['cron_notify_emails']) && count($this->settings['cron_notify_emails']) >= 1))
            {
                $notify = $this->services['notify']; 
                $notify->getMail()->setConfig($this->platform->getEmailConfig());
                foreach($backup_paths As $type => $path)
                {
                    $cron = array($type => $path);
                    $notify->setBackup($backup)->sendBackupCronNotification($this->settings['cron_notify_emails'], $cron, $type);
                }
            }
        }
        else
        {
            $this->logDebug($error->getError());
            throw new BackupException($error->getError());
        }
    
        exit;
    }
    
    /**
     * The Integrity Agent Cron
     */
    public function integrity()
    {
        if( ee()->input->get_post('backup_pro') != $this->settings['cron_query_key'] )
        {
            exit;
        }
        
        ini_set('memory_limit', -1);
        set_time_limit(0); //limit the time to 1 hours

        //grab the backup and storage objects and set them up
        $backup = $this->services['backups']->setLocations($this->settings['storage_details'])
                                            ->setBackupPath($this->settings['working_directory']);
        $storage = $this->services['backup']->setStoragePath($this->settings['working_directory']);
        $backup->getIntegrity()->setFile($this->services['files'])->setStorage($storage->getStorage());
		//first, check the backup state
		//ee()->integrity_agent->monitor_backup_state();
		
		//now check the backups and ensure they're all valid
		$backups = $backup->getAllBackups($this->settings['storage_details']);
		$type = ($this->settings['last_verification_type'] == 'database' ? 'files' : 'database') ;
		
		//ok, this is a little bash over the head to FUCING ENSURE we're NOT using the production db for database testing!
		//THAT WOULD BE BAD. So... bad... uh... coooooodddddddde... 
		if( $type == 'database' && empty($this->settings['db_verification_db_name']) )
		{
			$type = 'files';
		}
		$total = 0;
		foreach($backups[$type] AS $details)
		{
			if( empty($details['verified']) || $details['verified'] == '0')
			{
			    if($type == 'files')
			    {
			        $file = $storage->getStorage()->getFileBackupNamePath($details['details_file_name']);
			    }
			    else
			    {
			        $file = $storage->getStorage()->getDbBackupNamePath($details['details_file_name']);
                    $backup->getIntegrity()->setDbConf($this->platform->getDbCredentials())
                                           ->setTestDbName($this->settings['db_verification_db_name'])
                                           ->setShell($this->services['shell'])
                                           ->setSettings($this->settings)
                                           ->setBackupInfo($details)
                                           ->setRestore($this->services['restore']);
                    
			    }
			    
			    $backup_info = $this->services['backups']->setLocations($this->settings['storage_details'])->getBackupData($file);
				if( $backup->getIntegrity()->checkBackup($backup_info, $type) )
				{
					$status = 'success';
					$total++;
				}
				else 
				{
					$status = 'fail';
				}
				
				$path = rtrim($this->settings['working_directory'], DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$type;
				$this->services['backup']->getDetails()->addDetails($details['file_name'], $path, array('verified' => $status));
			}
			
			if( $total >= $this->settings['total_verifications_per_execution'])
			{
				break;
			}
		}
		
		$data = array(
		    'last_verification_type' => $type,
		    'last_verification_time' => time()
		);
		$this->services['settings']->update($data);
		exit;
    }
}