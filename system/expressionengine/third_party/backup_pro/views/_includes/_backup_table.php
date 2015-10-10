<?php if(isset($enable_delete) && $enable_delete != 'yes' ): ?>
	<?php foreach($backups AS $backup): ?>
		<input type="hidden" name="backups[]" value="<?php echo urlencode($view_helper->m62Encode($backup['file_name'])); ?>" />
	<?php endforeach; ?>
<?php endif; ?>
<table width="100%" class="data existing_backups mainTable" id="mainTable" border="0" cellpadding="0" cellspacing="0">
<thead>
	<tr class="odd">
		<th></th>
	
		<?php if(isset($enable_delete) && $enable_delete == 'yes' ): ?>
		<th></th>
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
		<th class=""></th>
		<?php endif; ?>
	</tr>
</thead>
<tbody>
<?php foreach($backups AS $backup): 

	if($backup['verified'] == '0')
	{
		$status_class = 'backup_pro_backup_warn';
	}
	elseif($backup['verified'] == 'success')
	{
		$status_class = 'backup_pro_backup_success';
	}
	elseif($backup['verified'] == 'fail')
	{
		$status_class = 'backup_pro_backup_fail';
	}
?>
<tr class="odd">
	<td class=" backup_pro_backup_status <?php echo $status_class; ?>"></td>
	<?php if(isset($enable_delete) && $enable_delete == 'yes' ): ?>
	<td><?php echo form_checkbox('backups[]', urlencode($view_helper->m62Encode($backup['file_name'])), false, 'id="'.$backup['hash'].'"'); ?></td>
	<?php endif; ?>
	<td style="white-space: nowrap">
    	<?php if(isset($backup['storage_locations']) && is_array($backup['storage_locations']) ): ?>
    		<?php foreach($backup['storage_locations'] AS $location_id => $storage): ?>
    			<img src="<?php echo $theme_folder_url; ?>backup_pro/images/storage/<?php echo $storage['icon']; ?>.png" class="" title="<?php echo $storage['storage_location_name']; ?>">
    		<?php endforeach; ?>
    	<?php endif; ?>
	</td>
	<td style="width:55%">
		<?php if(isset($enable_editable_note) && $enable_editable_note == 'yes' ): ?>
		<div class="bp_editable" rel="<?php echo $backup['hash']; ?>" id="note_div_<?php echo $backup['hash']; ?>"><?php if($backup['note'] == ''): ?>Click to add note...<?php else: ?><?php echo $backup['note']; ?> <?php endif; ?></div>
		<input name="note_<?php echo $backup['hash']; ?>" value="<?php echo $backup['note']; ?>" id="note_<?php echo $backup['hash']; ?>" data-backup-type="<?php echo $backup['backup_type']; ?>" class="note_container" rel="<?php echo urlencode($view_helper->m62Encode($backup['file_name'])); ?>" style="display:none; width:100%" type="text">
		
		<?php else: ?>
            <?php echo ($backup['note'] == '' ? $view_helper->m62Lang('na') : $backup['note']); ?>
		<?php endif; ?>
	</td>
	<td style="white-space: nowrap">
		<!-- <?php echo $backup['created_date']; ?> --><?php echo $view_helper->m62DateTime($backup['created_date']); ?>
	</td>
	<?php if(isset($enable_type) && $enable_type == 'yes' ): ?>
	<td><?php echo $view_helper->m62Lang($backup['backup_type']); ?></td>
	<?php endif; ?>
	<td style="white-space: nowrap"><!-- <?php echo $backup['compressed_size']; ?> --><?php echo $view_helper->m62FileSize($backup['compressed_size']); ?></td>
	<td style="white-space: nowrap"><!-- <?php echo $backup['time_taken']; ?> --><?php echo number_format($backup['time_taken'], 2, '.', ','); ?>s</td>
	<td style="white-space: nowrap"><!-- <?php echo $backup['max_memory']; ?> --><?php echo $view_helper->m62FileSize($backup['max_memory']); ?></td>
		<?php if(isset($enable_actions) && $enable_actions == 'yes' ): ?>
	<td align="right" style="width:40px; white-space: nowrap">
		<div style="float:right">
            <?php if( $backup['backup_type'] == 'database'): ?> 
            
            <?php if( $backup['can_restore'] ): ?>
    			<a href="<?php echo $url_base;?>restore_confirm&id=<?php echo urlencode($view_helper->m62Encode($backup['details_file_name'])); ?>&type=<?php echo $backup['backup_type']; ?>" title="<?php echo $view_helper->m62Lang('restore'); ?>">
    				<img src="<?php echo $theme_folder_url; ?>backup_pro/images/restore.png" alt="<?php echo $view_helper->m62Lang('restore'); ?>" class="">
    			</a> 
            <?php else: ?>
                <img src="<?php echo $theme_folder_url; ?>backup_pro/images/restore.png" alt="<?php echo $view_helper->m62Lang('restore'); ?>" class="desaturate">
            <?php endif; ?>
			
		<?php endif; ?>
        <?php if( $backup['can_download'] ): ?>
    		<a href="<?php echo $url_base;?>download&id=<?php echo urlencode($view_helper->m62Encode($backup['details_file_name'])); ?>&type=<?php echo $backup['backup_type']; ?>" title="<?php echo $view_helper->m62Lang('download'); ?>">
    			<img src="<?php echo $theme_folder_url; ?>backup_pro/images/download.png" alt="<?php echo $view_helper->m62Lang('download'); ?>" class="">
    		</a> 
		<?php else: ?>
			<img src="<?php echo $theme_folder_url; ?>backup_pro/images/download.png" alt="<?php echo $view_helper->m62Lang('download'); ?>" class="desaturate">
		<?php endif; ?>
		</div>
	</td>
	<?php endif; ?>	
</tr>
<?php endforeach; ?>
</tbody>
</table>