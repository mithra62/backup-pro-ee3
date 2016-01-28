<fieldset class="col-group <?php echo (is_array($form_errors['rcf_username']) ? 'invalid' : 'security-enhance'); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="rcf_username"><?php echo $view_helper->m62Lang('rcf_username'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('rcf_username_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('rcf_username', $form_data['rcf_username'], 'id="rcf_username"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['rcf_username']); ?>
	</div>
</fieldset>

<fieldset class="col-group <?php echo (is_array($form_errors['rcf_api']) ? 'invalid' : 'security-enhance'); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="rcf_api"><?php echo $view_helper->m62Lang('rcf_api'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('rcf_api_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_password('rcf_api', $form_data['rcf_api'], 'id="rcf_api"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['rcf_api']); ?>
	</div>
</fieldset>

<fieldset class="col-group required <?php echo (is_array($form_errors['rcf_container']) ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="rcf_container"><?php echo $view_helper->m62Lang('rcf_container'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('rcf_container_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('rcf_container', $form_data['rcf_container'], 'id="rcf_container"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['rcf_container']); ?>
	</div>
</fieldset>

<?php $cf_location_options = array('us' => 'US', 'uk' => 'UK'); ?>
<fieldset class="col-group required <?php echo (is_array($form_errors['rcf_location']) ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="rcf_location"><?php echo $view_helper->m62Lang('rcf_location'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('rcf_location_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_dropdown('rcf_location', $cf_location_options, $form_data['rcf_location'], 'id="rcf_location"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['rcf_location']); ?>
	</div>
</fieldset>