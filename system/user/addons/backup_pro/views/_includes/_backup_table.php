<?php if(isset($enable_delete) && $enable_delete != 'yes' ): ?>
	<?php foreach($backups AS $backup): ?>
		<input type="hidden" name="backups[]" value="<?php echo urlencode($view_helper->m62Encode($backup['file_name'])); ?>" />
	<?php endforeach; ?>
<?php endif; ?>

<input type="hidden" value="<?php echo $note_url; ?>" name="__note_url" id="__note_url" />
<div class="tbl-wrap">
<table width="100%" class="data existing_backups " id="existing_backup_table" border="0" cellpadding="0" cellspacing="0">
<thead>
	<tr class="odd">
		<th></th>
	
		<?php if(isset($enable_delete) && $enable_delete == 'yes' ): ?>
		<th><?php echo form_checkbox('bp_toggle_all', 1, false, 'id="fdsafdsa" class="fdsafdsafdsa"'); ?></th>
		<?php endif; ?>
		<th></th>
		<th></th>
		<th class=""><?php echo $view_helper->m62Lang('taken'); ?></th>
		<?php if(isset($enable_type) && $enable_type == 'yes' ): ?>
		<th class=""><?php echo $view_helper->m62Lang('type'); ?></th>
		<?php endif; ?>
		<th class=""><?php echo $view_helper->m62Lang('file_size'); ?></th>
		<th class=""><?php echo $view_helper->m62Lang('time'); ?></th>
		<th><?php echo $view_helper->m62Lang('memory'); ?></th>
		<?php if(isset($enable_actions) && $enable_actions == 'yes' ): ?>
		<th class="">  </th>
		<?php endif; ?>
	</tr>
</thead>
<tbody>
<?php $count = 0; foreach($backups AS $backup): 

	if($backup['verified'] == '0')
	{
		$status_class = 'st-pending';
		$status_string = 'Unverified';
	}
	elseif($backup['verified'] == 'success')
	{
		$status_class = 'st-open';
		$status_string = 'Verified';
	}
	elseif($backup['verified'] == 'fail')
	{
		$status_class = 'st-error';
		$status_string = 'Corrupt';
	}
?>
<tr class="odd">
	<td class="  "><span class="<?php echo $status_class; ?>"><?php echo $status_string; ?></span></td>
	<?php if(isset($enable_delete) && $enable_delete == 'yes' ): ?>
	<td><?php echo form_checkbox('backups[]', urlencode($view_helper->m62Encode($backup['file_name'])), false, 'id="backup_check_'.$count.'" class="bp_toggle_check"'); ?></td>
	<?php endif; ?>
	<td style="white-space: nowrap">
    	<?php if(isset($backup['storage_locations']) && is_array($backup['storage_locations']) ): ?>
    		<?php foreach($backup['storage_locations'] AS $location_id => $storage): ?>
    			<img src="<?php echo $theme_folder_url; ?>backup_pro/images/storage/<?php echo $storage['icon']; ?>.png" class="" title="<?php echo $view_helper->m62Escape($storage['storage_location_name']); ?>">
    		<?php endforeach; ?>
    	<?php endif; ?>
	</td>
	<td >
		<?php if(isset($enable_editable_note) && $enable_editable_note == 'yes' ): ?>
		<div class="bp_editable" rel="<?php echo $view_helper->m62Escape($backup['hash']); ?>" id="note_div_<?php echo $view_helper->m62Escape($backup['hash']); ?>"><?php if($backup['note'] == ''): ?><?php echo $view_helper->m62Lang('click_to_add_note'); ?><?php else: ?><?php echo $view_helper->m62Escape($backup['note']); ?> <?php endif; ?></div>
		<input name="note_<?php echo $view_helper->m62Escape($backup['hash']); ?>" value="<?php echo $backup['note']; ?>" id="note_<?php echo $view_helper->m62Escape($backup['hash']); ?>" data-backup-type="<?php echo $view_helper->m62Escape($backup['backup_type']); ?>" class="note_container" rel="<?php echo urlencode($view_helper->m62Encode($backup['file_name'])); ?>" style="display:none; width:100%" type="text">
		
		<?php else: ?>
            <?php echo ($backup['note'] == '' ? $view_helper->m62Lang('na') : $view_helper->m62Escape($backup['note'])); ?>
		<?php endif; ?>
	</td>
	<td style="white-space: nowrap">
		<!-- <?php echo $view_helper->m62Escape($backup['created_date']); ?> --><?php echo $view_helper->m62DateTime($backup['created_date']); ?>
	</td>
	<?php if(isset($enable_type) && $enable_type == 'yes' ): ?>
	<td><?php echo $view_helper->m62Lang($backup['backup_type']); ?></td>
	<?php endif; ?>
	<td style="white-space: nowrap"><!-- <?php echo $view_helper->m62Escape($backup['compressed_size']); ?> --><?php echo $view_helper->m62FileSize($backup['compressed_size']); ?></td>
	<td style="white-space: nowrap"><!-- <?php echo $view_helper->m62Escape($backup['time_taken']); ?> --><?php echo $view_helper->m62TimeFormat($backup['time_taken']); ?></td>
	<td style="white-space: nowrap"><!-- <?php echo $view_helper->m62Escape($backup['max_memory']); ?> --><?php echo $view_helper->m62FileSize($backup['max_memory']); ?></td>
		<?php if(isset($enable_actions) && $enable_actions == 'yes' ): ?>
	<td>
		<div class="toolbar-wrap">
		<ul class="toolbar">
            <?php if( $backup['backup_type'] == 'database'): ?> 
            
            <?php if( $backup['can_restore'] ): ?>
    			<li class="sync"><a href="<?php echo ee('CP/URL', 'addons/settings/backup_pro/restore_confirm'.AMP.'id='.urlencode($view_helper->m62Encode($backup['details_file_name'])).AMP.'type='.$view_helper->m62Escape($backup['backup_type']));?>" title="<?php echo $view_helper->m62Lang('restore'); ?>" id="restore_link_<?php echo $count; ?>">
    				
    			</a><?php ?>
            <?php else: ?>
                <img src="<?php echo $theme_folder_url; ?>backup_pro/images/restore.png" alt="<?php echo $view_helper->m62Lang('restore'); ?>" class="desaturate">
            <?php endif; ?>
			
		<?php endif; ?>
        <?php if( $backup['can_download'] ): ?>
    		<li class="download"><a href="<?php echo ee('CP/URL', 'addons/settings/backup_pro/download'.AMP.'id='.urlencode($view_helper->m62Encode($backup['details_file_name'])).AMP.'type='.$view_helper->m62Escape($backup['backup_type']));?>" title="<?php echo $view_helper->m62Lang('download'); ?>" id="download_link_<?php echo $count; ?>">
    			
    		</a></li>
		<?php else: ?>
		
		<?php endif; ?>
		</ul>
		</div>
	</td>
	<?php endif; ?>	
</tr>
<?php $count++; endforeach; ?>
</tbody>
</table>
</div>