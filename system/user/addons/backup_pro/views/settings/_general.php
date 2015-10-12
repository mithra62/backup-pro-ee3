<h2  class="accordion"><?=$view_helper->m62Lang('configure_backups')?></h2>
<input type="hidden" value="0" name="relative_time" />
<input type="hidden" value="0" name="allow_duplicates" />

<fieldset class="col-group required <?php echo ($form_errors['working_directory'] ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="working_directory"><?php echo $view_helper->m62Lang('working_directory'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('working_directory_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('working_directory', $form_data['working_directory'], 'id="working_directory"'); ?>
		<?php echo m62_form_errors($form_errors['working_directory']); ?>
	</div>
</fieldset>

<fieldset class="col-group <?php echo ($form_errors['cron_query_key'] ? 'invalid' : 'security-enhance'); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="cron_query_key"><?php echo $view_helper->m62Lang('cron_query_key'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('cron_query_key_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('cron_query_key', $form_data['cron_query_key'], 'id="cron_query_key"'); ?>
		<?php echo m62_form_errors($form_errors['cron_query_key']); ?>
	</div>
</fieldset>	

<fieldset class="col-group required <?php echo ($form_errors['dashboard_recent_total'] ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="dashboard_recent_total"><?php echo $view_helper->m62Lang('dashboard_recent_total'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('dashboard_recent_total_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8 ">
		<?php echo form_input('dashboard_recent_total', $form_data['dashboard_recent_total'], 'id="dashboard_recent_total"'); ?>
		<?php echo m62_form_errors($form_errors['dashboard_recent_total']); ?>
	</div>
</fieldset>	

<fieldset class="col-group required <?php echo ($form_errors['auto_threshold'] ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="auto_threshold"><?php echo $view_helper->m62Lang('auto_threshold'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('auto_threshold_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8 last">
		<?php echo form_dropdown('auto_threshold', $threshold_options, $form_data['auto_threshold'], 'id="auto_threshold"' ); ?>
		<?php echo m62_form_errors($form_errors['auto_threshold']); ?>
	</div>
</fieldset>	

<fieldset class="col-group required <?php echo ($form_errors['auto_threshold_custom'] ? 'invalid' : ''); ?>" id="auto_threshold_custom_wrap" style="display:none;">
	<div class="setting-txt col w-8">
		<h3><label for="auto_threshold_custom"><?php echo $view_helper->m62Lang('auto_threshold_custom'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('auto_threshold_custom_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8 ">
		<?php echo form_input('auto_threshold_custom', $form_data['auto_threshold_custom'], 'id="auto_threshold_custom"'); ?>
		<?php echo m62_form_errors($form_errors['auto_threshold_custom']); ?>
	</div>
</fieldset>	

<fieldset class="col-group <?php echo ($form_errors['allow_duplicates'] ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="allow_duplicates"><?php echo $view_helper->m62Lang('allow_duplicates'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('allow_duplicates_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8 ">
		<?php echo form_checkbox('allow_duplicates', '1', $form_data['allow_duplicates'], 'id="allow_duplicates"'); ?>
		<?php echo m62_form_errors($form_errors['allow_duplicates']); ?>
	</div>
</fieldset>		

<fieldset class="col-group required <?php echo ($form_errors['date_format'] ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="date_format"><?php echo $view_helper->m62Lang('date_format'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('date_format_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8 ">
		<?php echo form_input('date_format', $form_data['date_format'], 'id="date_format"'); ?>
		<?php echo m62_form_errors($form_errors['date_format']); ?>
	</div>
</fieldset>

<fieldset class="col-group <?php echo ($form_errors['relative_time'] ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="relative_time"><?php echo $view_helper->m62Lang('relative_time'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('relative_time_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8 ">
		<?php echo form_checkbox('relative_time', '1', $form_data['relative_time'], 'id="relative_time"'); ?>
		<?php echo m62_form_errors($form_errors['relative_time']); ?>
	</div>
</fieldset>