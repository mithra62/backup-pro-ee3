<h3  class="accordion"><?=$view_helper->m62Lang('config_files')?></h3>
<div>
	<?php 
	
	$this->table->set_heading($view_helper->m62Lang('setting'),$view_helper->m62Lang('value'));
	$this->table->add_row(
	    '<label for="max_file_backups">'.$view_helper->m62Lang('max_file_backups').' </label><div class="subtext">'.$view_helper->m62Lang('max_file_backups_instructions').'</div>', 
	    form_input('max_file_backups', $form_data['max_file_backups'], 'id="max_file_backups"').m62_form_errors($form_errors['max_file_backups'])
	);
	
	$this->table->add_row(
	    '<label for="file_backup_alert_threshold">'.$view_helper->m62Lang('file_backup_alert_threshold').' </label><div class="subtext">'.$view_helper->m62Lang('file_backup_alert_threshold_instructions').'</div>', 
	    form_input('file_backup_alert_threshold', $form_data['file_backup_alert_threshold'], 'id="file_backup_alert_threshold"').m62_form_errors($form_errors['file_backup_alert_threshold'])
	);
	
	$this->table->add_row(
	    '<label for="backup_file_location">'.$view_helper->m62Lang('backup_file_locations').'</label><div class="subtext">'.$view_helper->m62Lang('backup_file_location_instructions').'</div>', 
	    form_textarea('backup_file_location', $form_data['backup_file_location'], 'id="backup_file_location" cols="90" rows="6"').m62_form_errors($form_errors['backup_file_location'])
	);
	
	$this->table->add_row(
	    '<label for="exclude_paths">'.$view_helper->m62Lang('exclude_paths').'</label><div class="subtext">'.$view_helper->m62Lang('exclude_paths_instructions').'</div>', 
	    form_textarea('exclude_paths', $form_data['exclude_paths'], 'cols="90" rows="6" id="exclude_paths"').m62_form_errors($form_errors['exclude_paths'])
	);
	
	echo $this->table->generate();
	$this->table->clear();	
	?>
</div>