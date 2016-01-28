<fieldset class="col-group required <?php echo (is_array($form_errors['sftp_host']) ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="sftp_host"><?php echo $view_helper->m62Lang('sftp_host'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('sftp_host_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('sftp_host', $form_data['sftp_host'], 'id="sftp_host"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['sftp_host']); ?>
	</div>
</fieldset>

<fieldset class="col-group <?php echo (is_array($form_errors['sftp_username']) ? 'invalid' : 'security-enhance'); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="sftp_username"><?php echo $view_helper->m62Lang('sftp_username'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('sftp_username_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('sftp_username', $form_data['sftp_username'], 'id="sftp_username"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['sftp_username']); ?>
	</div>
</fieldset>

<fieldset class="col-group <?php echo (is_array($form_errors['sftp_password']) ? 'invalid' : 'security-enhance'); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="sftp_password"><?php echo $view_helper->m62Lang('sftp_password'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('sftp_password_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_password('sftp_password', $form_data['sftp_password'], 'id="sftp_password"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['sftp_password']); ?>
	</div>
</fieldset>

<fieldset class="col-group <?php echo (is_array($form_errors['sftp_private_key']) ? 'invalid' : 'security-enhance'); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="sftp_private_key"><?php echo $view_helper->m62Lang('sftp_private_key'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('sftp_private_key_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('sftp_private_key', $form_data['sftp_private_key'], 'id="sftp_private_key"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['sftp_private_key']); ?>
	</div>
</fieldset>

<fieldset class="col-group required <?php echo (is_array($form_errors['sftp_root']) ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="sftp_root"><?php echo $view_helper->m62Lang('sftp_root'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('sftp_root_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('sftp_root', $form_data['sftp_root'], 'id="sftp_root"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['sftp_root']); ?>
	</div>
</fieldset>

<fieldset class="col-group required <?php echo (is_array($form_errors['sftp_port']) ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="sftp_port"><?php echo $view_helper->m62Lang('sftp_port'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('sftp_port_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('sftp_port', $form_data['sftp_port'], 'id="sftp_port"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['sftp_port']); ?>
	</div>
</fieldset>

<fieldset class="col-group required <?php echo (is_array($form_errors['sftp_timeout']) ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="sftp_timeout"><?php echo $view_helper->m62Lang('sftp_timeout'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('sftp_timeout_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('sftp_timeout', $form_data['sftp_timeout'], 'id="sftp_timeout"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['sftp_timeout']); ?>
	</div>
</fieldset>