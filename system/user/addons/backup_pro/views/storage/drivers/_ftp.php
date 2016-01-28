<input type="hidden" value="0" name="ftp_passive" />
<input type="hidden" value="0" name="ftp_ssl" />

<fieldset class="col-group required <?php echo (is_array($form_errors['ftp_hostname']) ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="backup_store_location"><?php echo $view_helper->m62Lang('ftp_hostname'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('ftp_hostname_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('ftp_hostname', $form_data['ftp_hostname'], 'id="ftp_hostname"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['ftp_hostname']); ?>
	</div>
</fieldset>

<fieldset class="col-group <?php echo (is_array($form_errors['ftp_username']) ? 'invalid' : 'security-enhance'); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="ftp_username"><?php echo $view_helper->m62Lang('ftp_username'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('ftp_username_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('ftp_username', $form_data['ftp_username'], 'id="ftp_username"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['ftp_username']); ?>
	</div>
</fieldset>

<fieldset class="col-group <?php echo (is_array($form_errors['ftp_password']) ? 'invalid' : 'security-enhance'); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="ftp_password"><?php echo $view_helper->m62Lang('ftp_password'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('ftp_password_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_password('ftp_password', $form_data['ftp_password'], 'id="ftp_password"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['ftp_password']); ?>
	</div>
</fieldset>

<fieldset class="col-group required <?php echo (is_array($form_errors['ftp_port']) ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="ftp_port"><?php echo $view_helper->m62Lang('ftp_port'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('ftp_port_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('ftp_port', $form_data['ftp_port'], 'id="ftp_port"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['ftp_port']); ?>
	</div>
</fieldset>

<fieldset class="col-group required <?php echo (is_array($form_errors['ftp_store_location']) ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="ftp_store_location"><?php echo $view_helper->m62Lang('ftp_store_location'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('ftp_store_location_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('ftp_store_location', $form_data['ftp_store_location'], 'id="ftp_store_location"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['ftp_store_location']); ?>
	</div>
</fieldset>

<fieldset class="col-group <?php echo (is_array($form_errors['ftp_passive']) ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="ftp_passive"><?php echo $view_helper->m62Lang('ftp_passive'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('ftp_passive_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<label class="choice mr <?php echo ($form_data['ftp_passive'] == '1' ? 'chosen' : ''); ?>">
		  <?php echo form_checkbox('ftp_passive', '1', $form_data['ftp_passive'], 'id="ftp_passive"'); ?>
		</label>
		<?php echo $view_helper->m62FormErrors($form_errors['ftp_passive']); ?>
	</div>
</fieldset>

<fieldset class="col-group <?php echo (is_array($form_errors['ftp_ssl']) ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="ftp_ssl"><?php echo $view_helper->m62Lang('ftp_ssl'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('ftp_ssl_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<label class="choice mr <?php echo ($form_data['ftp_ssl'] == '1' ? 'chosen' : ''); ?>">
		  <?php echo form_checkbox('ftp_ssl', '1', $form_data['ftp_ssl'], 'id="ftp_ssl"'); ?>
		</label>
		<?php echo $view_helper->m62FormErrors($form_errors['ftp_ssl']); ?>
	</div>
</fieldset>

<fieldset class="col-group required <?php echo (is_array($form_errors['ftp_timeout']) ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="ftp_timeout"><?php echo $view_helper->m62Lang('ftp_timeout'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('ftp_timeout_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('ftp_timeout', $form_data['ftp_timeout'], 'id="ftp_timeout"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['ftp_timeout']); ?>
	</div>
</fieldset>