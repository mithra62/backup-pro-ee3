<div class="box">

<h1><?php echo $view_helper->m62Lang('backup_pro_module_name'); ?> / <?php echo ($backup_type == 'files' ? $view_helper->m62Lang('backup_files') : $view_helper->m62Lang('backup_db')); ?></h1>

<div class="tbl-ctrls">
<?php if( count($pre_backup_errors) == '0' ):?>
<?php echo form_open($proc_url, array('id'=>'backup_form')); ?>
<div id="backup_instructions">
<?php echo $lang->__('backup_in_progress_instructions'); ?><br />
</div>

		<fieldset class="form-ctrls">
			<input class="btn submit" type="submit" value="<?php echo $view_helper->m62Lang('start_backup'); ?>" id="_backup_direct">
		</fieldset>	
		
<input type="hidden" id="__backup_proc_url" value="<?php echo $proc_url; ?>">
<input type="hidden" id="__url_base" value="<?php echo $url_base; ?>">
<input type="hidden" id="__backup_type" value="<?php echo $backup_type; ?>">
<input type="hidden" id="__lang_backup_progress_bar_stop" value="<?php echo $view_helper->m62Lang('backup_progress_bar_stop'); ?>">
<input type="hidden" id="__lang_backup_progress_bar_running" value="<?php echo $view_helper->m62Lang('backup_in_progress'); ?>">

<div id="progress_bar_container" style="display:none">
	<span id="active_item"></span> <br />
	<div id="progressbar"></div>
	Total Items: <span id="item_number"></span> of <span id="total_items"></span> <br />
	<span id="backup_complete"></span>
</div>


    <?php else: ?>
        <div class="txt-wrap">
        <div class="alert inline issue"><h3><?php echo $view_helper->m62Lang('pre_backup_setting_issue_blurb'); ?>:</h3><ul>
        <?php 
        foreach($pre_backup_errors AS $key => $error): 
            echo '<li>'.$view_helper->m62Lang($error);
            if( $error == 'no_storage_locations_setup' )
            {
                echo ' <a href="'.ee('CP/URL', 'addons/settings/backup_pro/new_storage').'">Setup Storage Location</a>';
            }
            elseif( $error == 'license_number' || $error == 'missing_license_number' )
            {
                echo ' <a href="'.ee('CP/URL', 'addons/settings/backup_pro/settings/license').'">Enter License</a> or <a href="https://mithra62.com/projects/view/backup-pro">Purchase a License</a>';
            }
            elseif( $error == 'invalid_working_directory' )
            {
                echo ' <a href="'.ee('CP/URL', 'addons/settings/backup_pro/settings/general').'">Check Working Directory</a>';
            }
            elseif( $error == 'no_backup_file_location' )
            {
                echo ' <a href="'.ee('CP/URL', 'addons/settings/backup_pro/settings/files').'">Set File Backup Locations</a>';
            }
            echo '</li>';
        endforeach;?>
        </ul></div></div>
        <?php echo form_close()?>
    <?php endif; ?>  
    
</div>  
</div>