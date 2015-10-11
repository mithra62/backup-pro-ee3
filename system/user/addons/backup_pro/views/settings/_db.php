<h2><?=$view_helper->m62Lang('config_db')?></h2>
<?php 
$db_backup_methods = array('php' => 'PHP', 'mysqldump' => 'MySQLDUMP');
$db_restore_methods = array('php' => 'PHP', 'mysql' => 'MySQL');
?>
<input type="hidden" name="db_backup_ignore_tables[]" value="" />
<input type="hidden" name="db_backup_ignore_table_data[]" value="" />

<fieldset class="col-group required">
	<div class="setting-txt col w-8">
		<h3><label for="max_db_backups"><?php echo $view_helper->m62Lang('max_db_backups'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('max_db_backups_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('max_db_backups', $form_data['max_db_backups'], 'id="max_db_backups"'); ?>
		<?php echo m62_form_errors($form_errors['max_db_backups']); ?>
	</div>
</fieldset>

<fieldset class="col-group required">
	<div class="setting-txt col w-8">
		<h3><label for="db_backup_alert_threshold"><?php echo $view_helper->m62Lang('db_backup_alert_threshold'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('db_backup_alert_threshold_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('db_backup_alert_threshold', $form_data['db_backup_alert_threshold'], 'id="db_backup_alert_threshold"'); ?>
		<?php echo m62_form_errors($form_errors['db_backup_alert_threshold']); ?>
	</div>
</fieldset>

<fieldset class="col-group required">
	<div class="setting-txt col w-8">
		<h3><label for="db_backup_method"><?php echo $view_helper->m62Lang('db_backup_method'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('db_backup_method_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8 last">
		<?php echo form_dropdown('db_backup_method', $db_backup_methods, $form_data['db_backup_method'], 'id="db_backup_method"' ); ?>
		<?php echo m62_form_errors($form_errors['db_backup_method']); ?>
	</div>
</fieldset>	

<fieldset class="col-group required" id="mysqldump_command_wrap" style="display:none;">
	<div class="setting-txt col w-8">
		<h3><label for="mysqldump_command"><?php echo $view_helper->m62Lang('mysqldump_command'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('mysqldump_command_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8 ">
		<?php echo form_input('mysqldump_command', $form_data['mysqldump_command'], 'id="mysqldump_command"'); ?>
		<?php echo m62_form_errors($form_errors['mysqldump_command']); ?>
	</div>
</fieldset>	

<fieldset class="col-group required">
	<div class="setting-txt col w-8">
		<h3><label for="db_restore_method"><?php echo $view_helper->m62Lang('db_restore_method'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('db_restore_method_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8 last">
		<?php echo form_dropdown('db_restore_method', $db_restore_methods, $form_data['db_restore_method'], 'id="db_restore_method"' ); ?>
		<?php echo m62_form_errors($form_errors['db_restore_method']); ?>
	</div>
</fieldset>	

<fieldset class="col-group required" id="mysqlcli_command_wrap" style="display:none;">
	<div class="setting-txt col w-8">
		<h3><label for="mysqlcli_command"><?php echo $view_helper->m62Lang('mysqlcli_command'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('mysqlcli_command_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8 ">
		<?php echo form_input('mysqlcli_command', $form_data['mysqlcli_command'], 'id="mysqlcli_command"'); ?>
		<?php echo m62_form_errors($form_errors['mysqlcli_command']); ?>
	</div>
</fieldset>	

<div>
	
	<h2  class="accordion"><?=$view_helper->m62Lang('config_ignore_sql')?></h2>
	<?php 

	$this->table->set_heading($view_helper->m62Lang('setting'),$view_helper->m62Lang('value'));
	$this->table->add_row(
	    '<label for="db_backup_ignore_tables">'.$view_helper->m62Lang('db_backup_ignore_tables').'</label><div class="subtext">'.$view_helper->m62Lang('db_backup_ignore_tables_instructions').'</div>', 
	    form_multiselect('db_backup_ignore_tables[]', $db_tables, $form_data['db_backup_ignore_tables'], 'id="db_backup_ignore_tables" data-placeholder="'.$view_helper->m62Lang('db_backup_ignore_tables').'"')
	    .m62_form_errors($form_errors['db_backup_ignore_tables'])
	);
	
	$this->table->add_row(
	    '<label for="db_backup_ignore_table_data">'.$view_helper->m62Lang('db_backup_ignore_table_data').'</label><div class="subtext">'.$view_helper->m62Lang('db_backup_ignore_table_data_instructions').'</div>', 
	    form_multiselect('db_backup_ignore_table_data[]', $db_tables, $form_data['db_backup_ignore_table_data'], 'id="db_backup_ignore_table_data" data-placeholder="'.$view_helper->m62Lang('db_backup_ignore_table_data').'"')
	    .m62_form_errors($form_errors['db_backup_ignore_table_data'])
	);
	
	echo $this->table->generate();
	$this->table->clear();	
	?>
		
	<h3  class="accordion"><?=$view_helper->m62Lang('config_extra_archive_sql')?></h3>
	<?php 

	$this->table->set_heading($view_helper->m62Lang('setting'),$view_helper->m62Lang('value'));
	$this->table->add_row(
	    '<label for="db_backup_archive_pre_sql">'.$view_helper->m62Lang('db_backup_archive_pre_sql').'</label><div class="subtext">'.$view_helper->m62Lang('db_backup_archive_pre_sql_instructions').'</div>', 
	    form_textarea('db_backup_archive_pre_sql', $form_data['db_backup_archive_pre_sql'], 'cols="90" rows="6" id="db_backup_archive_pre_sql"').m62_form_errors($form_errors['max_file_backups'])
	);
	
	$this->table->add_row(
	    '<label for="db_backup_archive_post_sql">'.$view_helper->m62Lang('db_backup_archive_post_sql').'</label><div class="subtext">'.$view_helper->m62Lang('db_backup_archive_post_sql_instructions').'</div>', 
	    form_textarea('db_backup_archive_post_sql', $form_data['db_backup_archive_post_sql'], 'cols="90" rows="6" id="db_backup_archive_post_sql"').m62_form_errors($form_errors['db_backup_archive_post_sql'])
	);
	
	echo $this->table->generate();
	$this->table->clear();	
	?>
	
	<h3  class="accordion"><?=$view_helper->m62Lang('config_execute_sql')?></h3>
	<?php 

	$this->table->set_heading($view_helper->m62Lang('setting'),$view_helper->m62Lang('value'));
	$this->table->add_row(
	    '<label for="db_backup_execute_pre_sql">'.$view_helper->m62Lang('db_backup_execute_pre_sql').'</label><div class="subtext">'.$view_helper->m62Lang('db_backup_execute_pre_sql_instructions').'</div>', 
	    form_textarea('db_backup_execute_pre_sql', $form_data['db_backup_execute_pre_sql'], 'cols="90" rows="6" id="db_backup_execute_pre_sql"').m62_form_errors($form_errors['db_backup_execute_pre_sql'])
	);
	
	$this->table->add_row(
	    '<label for="db_backup_execute_post_sql">'.$view_helper->m62Lang('db_backup_execute_post_sql').'</label><div class="subtext">'.$view_helper->m62Lang('db_backup_execute_post_sql_instructions').'</div>', 
	    form_textarea('db_backup_execute_post_sql', $form_data['db_backup_execute_post_sql'], 'cols="90" rows="6" id="db_backup_execute_post_sql"').m62_form_errors($form_errors['db_backup_execute_post_sql'])
	);
	
	echo $this->table->generate();
	$this->table->clear();	
	?>
</div>