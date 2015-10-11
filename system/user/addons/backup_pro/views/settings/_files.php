<h2><?=$view_helper->m62Lang('config_files')?></h2>

<fieldset class="col-group required">
	<div class="setting-txt col w-8">
		<h3><label for="max_file_backups"><?php echo $view_helper->m62Lang('max_file_backups'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('max_file_backups_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('max_file_backups', $form_data['max_file_backups'], 'id="max_file_backups"'); ?>
		<?php echo m62_form_errors($form_errors['max_file_backups']); ?>
	</div>
</fieldset>

<fieldset class="col-group required">
	<div class="setting-txt col w-8">
		<h3><label for="file_backup_alert_threshold"><?php echo $view_helper->m62Lang('file_backup_alert_threshold'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('file_backup_alert_threshold_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('file_backup_alert_threshold', $form_data['file_backup_alert_threshold'], 'id="file_backup_alert_threshold"'); ?>
		<?php echo m62_form_errors($form_errors['file_backup_alert_threshold']); ?>
	</div>
</fieldset>

<fieldset class="col-group required">
	<div class="setting-txt col w-8">
		<h3><label for="backup_file_location"><?php echo $view_helper->m62Lang('backup_file_location'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('backup_file_location_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8 ">
		<?php echo form_textarea('backup_file_location', $form_data['backup_file_location'], 'cols="90" rows="6" id="backup_file_location"'); ?>
		<?php echo m62_form_errors($form_errors['backup_file_location']); ?>
	</div>
</fieldset>

<fieldset class="col-group ">
	<div class="setting-txt col w-8">
		<h3><label for="exclude_paths"><?php echo $view_helper->m62Lang('exclude_paths'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('exclude_paths_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8 ">
		<?php echo form_textarea('exclude_paths', $form_data['exclude_paths'], 'cols="90" rows="6" id="exclude_paths"'); ?>
		<?php echo m62_form_errors($form_errors['exclude_paths']); ?>
	</div>
</fieldset>