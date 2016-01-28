<p><?=$view_helper->m62Lang('license_details_instructions')?></p>
<h2><?=$view_helper->m62Lang('license_details')?></h2>
<fieldset class="col-group required <?php echo ($form_errors['license_number'] ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="license_number"><?php echo $view_helper->m62Lang('license_number'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('license_number_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('license_number', $form_data['license_number'], 'id="license_number"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['license_number']); ?>
	</div>
</fieldset>