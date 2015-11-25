<?php
if(count($errors) >= 1)
{
	echo '<div class="alert issue"><h3>Uh-oh... There are some issues...</h3><ul>';
	foreach($errors AS $key => $error)
	{
		echo '<li>';
        echo $view_helper->m62Lang($error);
		
		if( $key == 'no_storage_locations_setup' )
		{
		    echo ' <a href="'.ee('CP/URL', 'addons/settings/backup_pro/new_storage').'">'.$view_helper->m62Lang('setup_storage_location').'</a><br />';
		}
		elseif( $key == 'license_number' )
		{
		    echo ' <a href="'.ee('CP/URL', 'addons/settings/backup_pro/settings/license').'">'.$view_helper->m62Lang('enter_license').'</a> or <a href="https://mithra62.com/projects/view/backup-pro">'.$view_helper->m62Lang('purchase_a_license').'</a><br />';
		}
	    elseif( $error == 'invalid_working_directory' )
	    {
	        echo ' <a href="'.ee('CP/URL', 'addons/settings/backup_pro/settings/general').'">'.$view_helper->m62Lang('check_working_dir').'</a><br />';
	    }
	    elseif( $error == 'no_db_backups_exist_yet' )
	    {
	        echo ' <a href="'.ee('CP/URL', 'addons/settings/backup_pro/backup/database').'">'.$view_helper->m62Lang('would_you_like_to_backup_database_now').'</a><br />';
	    }
	    elseif( $error == 'no_file_backups_exist_yet' )
	    {
	        echo ' <a href="'.ee('CP/URL', 'addons/settings/backup_pro/backup/files').'">'.$view_helper->m62Lang('would_you_like_to_backup_files_now').'</a><br />';
	    }
	    elseif( $error == 'db_backup_past_expectation_stub' || $error == 'file_backup_past_expectation_stub' )
	    {
	        if( $error == 'db_backup_past_expectation_stub' )
	        {
	            $lang = sprintf(
	                $view_helper->m62Lang('db_backup_past_expectation'),
	                $view_helper->getRelativeDateTime($backup_meta['database']['newest_backup_taken_raw'], false),
	                ee('CP/URL', 'addons/settings/backup_pro/backup/database')
	            );
	        }
	        else if ( $error == 'file_backup_past_expectation_stub' )
	        {
	            $lang = sprintf(
	                $view_helper->m62Lang('files_backup_past_expectation'),
	                $view_helper->getRelativeDateTime($backup_meta['files']['newest_backup_taken_raw'], false),
	                ee('CP/URL', 'addons/settings/backup_pro/backup/files')
	            );
	        }
	        echo $lang;
	    }		
		
	    echo '</li>';
		//echo '</div>';
	}
	echo '</ul><a class="close" href=""></a></div>';
}