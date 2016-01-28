<fieldset class="col-group <?php echo (is_array($form_errors['gcs_access_key']) ? 'invalid' : 'security-enhance'); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="gcs_access_key"><?php echo $view_helper->m62Lang('gcs_access_key'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('gcs_access_key_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('gcs_access_key', $form_data['gcs_access_key'], 'id="gcs_access_key"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['gcs_access_key']); ?>
	</div>
</fieldset>

<fieldset class="col-group <?php echo (is_array($form_errors['gcs_secret_key']) ? 'invalid' : 'security-enhance'); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="gcs_secret_key"><?php echo $view_helper->m62Lang('gcs_secret_key'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('gcs_secret_key_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_password('gcs_secret_key', $form_data['gcs_secret_key'], 'id="gcs_secret_key"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['gcs_secret_key']); ?>
	</div>
</fieldset>

<fieldset class="col-group required <?php echo (is_array($form_errors['gcs_bucket']) ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="gcs_bucket"><?php echo $view_helper->m62Lang('gcs_bucket'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('gcs_bucket_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('gcs_bucket', $form_data['gcs_bucket'], 'id="gcs_bucket"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['gcs_bucket']); ?>
	</div>
</fieldset>