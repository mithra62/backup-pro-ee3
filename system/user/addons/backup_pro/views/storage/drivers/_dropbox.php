<fieldset class="col-group <?php echo (is_array($form_errors['dropbox_access_token']) ? 'invalid' : 'security-enhance'); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="dropbox_access_token"><?php echo $view_helper->m62Lang('dropbox_access_token'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('dropbox_access_token_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_password('dropbox_access_token', $form_data['dropbox_access_token'], 'id="dropbox_access_token"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['dropbox_access_token']); ?>
	</div>
</fieldset>

<fieldset class="col-group required <?php echo (is_array($form_errors['dropbox_app_secret']) ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="dropbox_app_secret"><?php echo $view_helper->m62Lang('dropbox_app_secret'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('dropbox_app_secret_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_password('dropbox_app_secret', $form_data['dropbox_app_secret'], 'id="dropbox_app_secret"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['dropbox_app_secret']); ?>
	</div>
</fieldset>

<fieldset class="col-group <?php echo (is_array($form_errors['dropbox_prefix']) ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="dropbox_prefix"><?php echo $view_helper->m62Lang('dropbox_prefix'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('dropbox_prefix_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('dropbox_prefix', $form_data['dropbox_prefix'], 'id="dropbox_prefix"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['dropbox_prefix']); ?>
	</div>
</fieldset>