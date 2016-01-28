<h2><?=$view_helper->m62Lang('config_files')?></h2>
<input type="hidden" value="0" name="regex_file_exclude" />

<fieldset class="col-group required <?php echo ($form_errors['max_file_backups'] ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="max_file_backups"><?php echo $view_helper->m62Lang('max_file_backups'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('max_file_backups_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('max_file_backups', $form_data['max_file_backups'], 'id="max_file_backups"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['max_file_backups']); ?>
	</div>
</fieldset>

<fieldset class="col-group required <?php echo ($form_errors['file_backup_alert_threshold'] ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="file_backup_alert_threshold"><?php echo $view_helper->m62Lang('file_backup_alert_threshold'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('file_backup_alert_threshold_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('file_backup_alert_threshold', $form_data['file_backup_alert_threshold'], 'id="file_backup_alert_threshold"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['file_backup_alert_threshold']); ?>
	</div>
</fieldset>

<fieldset class="col-group required <?php echo ($form_errors['backup_file_location'] ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="backup_file_location"><?php echo $view_helper->m62Lang('backup_file_location'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('backup_file_location_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8 ">
		<?php echo form_textarea('backup_file_location', $form_data['backup_file_location'], 'cols="90" rows="6" id="backup_file_location"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['backup_file_location']); ?>
	</div>
</fieldset>

<fieldset class="col-group <?php echo ($form_errors['exclude_paths'] ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="exclude_paths"><?php echo $view_helper->m62Lang('exclude_paths'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('exclude_paths_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8 ">
		<?php echo form_textarea('exclude_paths', $form_data['exclude_paths'], 'cols="90" rows="6" id="exclude_paths"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['exclude_paths']); ?>
	</div>
</fieldset>

<fieldset class="col-group <?php echo ($form_errors['regex_file_exclude'] ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="regex_file_exclude"><?php echo $view_helper->m62Lang('regex_file_exclude'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('regex_file_exclude_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8 ">
		<label class="choice mr <?php echo ($form_data['regex_file_exclude'] == '1' ? 'chosen' : ''); ?>"><?php echo form_checkbox('regex_file_exclude', '1', $form_data['regex_file_exclude'], 'id="regex_file_exclude"'); ?></label>
		<?php echo $view_helper->m62FormErrors($form_errors['regex_file_exclude']); ?>
	</div>
</fieldset>