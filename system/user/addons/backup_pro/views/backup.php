<?php $this->load->view('_includes/_errors'); ?>

<?php if( count($pre_backup_errors) == '0' ):?>
<div id="backup_instructions">
<?php echo $lang->__('backup_in_progress_instructions'); ?><br />
</div>

<div class="bp_top_nav" id="_backup_start_container">
	<div class="bp_nav">
		<span class="button"> 
			<a class="nav_button" href="<?php echo $proc_url; ?>" id="_backup_direct"><?php echo $view_helper->m62Lang('start_backup'); ?></a>
        	<div id="backup_running_details"  style="display:none" >
        	<?php echo $view_helper->m62Lang('backup_in_progress'); ?>
        	<img src="<?php echo $theme_folder_url; ?>backup_pro/images/indicator.gif" id="animated_image" />
        	</div>			
		</span>	
	</div>
</div>

<div id="backup_dashboard_menu" style="display:none">
<?php $this->load->view('_includes/_backups_submenu'); ?>
</div>
<br clear="all" />

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
        <p>You're going to need to fix the below configuration errors before you can start taking backups:</p>
        <?php 
        foreach($pre_backup_errors AS $key => $error): 
            echo $view_helper->m62Lang($error);
            if( $error == 'no_storage_locations_setup' )
            {
                echo ' <a href="'.$url_base.'new_storage&engine=local">Setup Storage Location</a>';
            }
            elseif( $error == 'license_number' || $error == 'missing_license_number' )
            {
                echo ' <a href="'.$url_base.'settings&section=license">Enter License</a> or <a href="https://mithra62.com/projects/view/backup-pro">Purchase a License</a>';
            }
            elseif( $error == 'invalid_working_directory' )
            {
                echo ' <a href="'.$url_base.'settings">Check Working Directory</a>';
            }
            elseif( $error == 'no_backup_file_location' )
            {
                echo ' <a href="'.$url_base.'settings&section=files">Set File Backup Locations</a>';
            }
            echo '<br />';
        endforeach;?>
    <?php endif; ?>  