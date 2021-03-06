<input type="hidden" value="0" name="s3_reduced_redundancy" />

<fieldset class="col-group <?php echo (is_array($form_errors['s3_access_key']) ? 'invalid' : 'security-enhance'); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="s3_access_key"><?php echo $view_helper->m62Lang('s3_access_key'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('s3_access_key_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('s3_access_key', $form_data['s3_access_key'], 'id="s3_access_key"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['s3_access_key']); ?>
	</div>
</fieldset>

<fieldset class="col-group <?php echo (is_array($form_errors['s3_secret_key']) ? 'invalid' : 'security-enhance'); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="s3_secret_key"><?php echo $view_helper->m62Lang('s3_secret_key'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('s3_secret_key_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_password('s3_secret_key', $form_data['s3_secret_key'], 'id="s3_secret_key"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['s3_secret_key']); ?>
	</div>
</fieldset>

<fieldset class="col-group required <?php echo (is_array($form_errors['s3_bucket']) ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="s3_bucket"><?php echo $view_helper->m62Lang('s3_bucket'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('s3_bucket_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('s3_bucket', $form_data['s3_bucket'], 'id="s3_bucket"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['s3_bucket']); ?>
	</div>
</fieldset>

<fieldset class="col-group required <?php echo (is_array($form_errors['s3_region']) ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="s3_region"><?php echo $view_helper->m62Lang('s3_region'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('s3_region_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_dropdown('s3_region', $view_helper->m62Options('s3_regions', false), $form_data['s3_region'], 'id="s3_region"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['s3_region']); ?>
	</div>
</fieldset>

<fieldset class="col-group <?php echo (is_array($form_errors['s3_optional_prefix']) ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="s3_optional_prefix"><?php echo $view_helper->m62Lang('s3_optional_prefix'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('s3_optional_prefix_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('s3_optional_prefix', $form_data['s3_optional_prefix'], 'id="s3_optional_prefix"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['s3_optional_prefix']); ?>
	</div>
</fieldset>

<fieldset class="col-group <?php echo (is_array($form_errors['s3_reduced_redundancy']) ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="s3_reduced_redundancy"><?php echo $view_helper->m62Lang('s3_reduced_redundancy'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('s3_reduced_redundancy_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<label class="choice mr <?php echo ($form_data['s3_reduced_redundancy'] == '1' ? 'chosen' : ''); ?>">
		  <?php echo form_checkbox('s3_reduced_redundancy', '1', $form_data['s3_reduced_redundancy'], 'id="s3_reduced_redundancy"'); ?>
		</label>
		<?php echo $view_helper->m62FormErrors($form_errors['s3_reduced_redundancy']); ?>
	</div>
</fieldset>