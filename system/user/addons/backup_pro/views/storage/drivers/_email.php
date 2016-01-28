
<fieldset class="col-group required <?php echo (is_array($form_errors['email_storage_emails']) ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="email_storage_emails"><?php echo $view_helper->m62Lang('email_storage_emails'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('email_storage_emails_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_textarea('email_storage_emails', $form_data['email_storage_emails'], 'id="email_storage_emails"') ?>
		<?php echo $view_helper->m62FormErrors($form_errors['email_storage_emails']); ?>
	</div>
</fieldset>

<fieldset class="col-group required <?php echo (is_array($form_errors['email_storage_attach_threshold']) ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="email_storage_attach_threshold"><?php echo $view_helper->m62Lang('email_storage_attach_threshold'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('email_storage_attach_threshold_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('email_storage_attach_threshold', $form_data['email_storage_attach_threshold'], 'id="email_storage_attach_threshold"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['email_storage_attach_threshold']); ?>
	</div>
</fieldset>