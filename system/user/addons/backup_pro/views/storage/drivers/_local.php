<fieldset class="col-group required <?php echo (is_array($form_errors['backup_store_location']) ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="backup_store_location"><?php echo $view_helper->m62Lang('backup_store_location'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('backup_store_location_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('backup_store_location', $form_data['backup_store_location'], 'id="backup_store_location"'); ?>
		<?php echo m62_form_errors($form_errors['backup_store_location']); ?>
	</div>
</fieldset>
