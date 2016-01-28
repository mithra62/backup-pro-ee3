<input type="hidden" value="0" name="storage_location_status" />
<input type="hidden" value="0" name="storage_location_file_use" />
<input type="hidden" value="0" name="storage_location_db_use" />
<input type="hidden" value="0" name="storage_location_include_prune" />

<fieldset class="col-group required <?php echo (is_array($form_errors['storage_location_name']) ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="storage_location_name"><?php echo $view_helper->m62Lang('storage_location_name'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('storage_location_name_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('storage_location_name', $form_data['storage_location_name'], 'id="storage_location_name"'); ?>
		<?php echo $view_helper->m62FormErrors($form_errors['storage_location_name']); ?>
	</div>
</fieldset>

<?php $this->load->view($_form_template); ?>

<fieldset class="col-group <?php echo (is_array($form_errors['storage_location_status']) ? 'invalid required' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3 class=""><span class="ico sub-arrow"></span><label for="storage_location_status"><?php echo $view_helper->m62Lang('storage_location_status'); ?></label></h3>
		<em style=""><?php echo $view_helper->m62Lang('storage_location_status_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8 last" style="">
		<label class="choice mr <?php echo ($form_data['storage_location_status'] == '1' ? 'chosen' : ''); ?>">
		  <?php echo form_checkbox('storage_location_status', '1', $form_data['storage_location_status'], 'id="storage_location_status"'); ?>
		</label>
		<?php echo $view_helper->m62FormErrors($form_errors['storage_location_status']); ?>
	</div>
</fieldset>

<fieldset class="col-group <?php echo (is_array($form_errors['storage_location_file_use']) ? 'invalid required ' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3 class=""><span class="ico sub-arrow"></span><label for="storage_location_file_use"><?php echo $view_helper->m62Lang('storage_location_file_use'); ?></label></h3>
		<em style=""><?php echo $view_helper->m62Lang('storage_location_file_use_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8 last" style="">
		<label class="choice mr <?php echo ($form_data['storage_location_file_use'] == '1' ? 'chosen' : ''); ?>">
		  <?php echo form_checkbox('storage_location_file_use', '1', $form_data['storage_location_file_use'], 'id="storage_location_file_use"'); ?>
		</label>
		<?php echo $view_helper->m62FormErrors($form_errors['storage_location_file_use']); ?>
	</div>
</fieldset>

<fieldset class="col-group <?php echo (is_array($form_errors['storage_location_db_use']) ? 'invalid required' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3 class=""><span class="ico sub-arrow"></span><label for="storage_location_db_use"><?php echo $view_helper->m62Lang('storage_location_db_use'); ?></label></h3>
		<em style=""><?php echo $view_helper->m62Lang('storage_location_db_use_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8 last" style="">
		<label class="choice mr <?php echo ($form_data['storage_location_db_use'] == '1' ? 'chosen' : ''); ?>">
		  <?php echo form_checkbox('storage_location_db_use', '1', $form_data['storage_location_db_use'], 'id="storage_location_db_use"'); ?>
		</label>
		<?php echo $view_helper->m62FormErrors($form_errors['storage_location_db_use']); ?>
	</div>
</fieldset>

<fieldset class="col-group <?php echo (is_array($form_errors['storage_location_include_prune']) ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3 class=""><span class="ico sub-arrow"></span><label for="storage_location_include_prune"><?php echo $view_helper->m62Lang('storage_location_include_prune'); ?></label></h3>
		<em style=""><?php echo $view_helper->m62Lang('storage_location_include_prune_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8 last" style="">
		<label class="choice mr <?php echo ($form_data['storage_location_include_prune'] == '1' ? 'chosen' : ''); ?>">
		  <?php echo form_checkbox('storage_location_include_prune', '1', $form_data['storage_location_include_prune'], 'id="storage_location_include_prune"'); ?>
		</label>
		<?php echo $view_helper->m62FormErrors($form_errors['storage_location_include_prune']); ?>
	</div>
</fieldset>
