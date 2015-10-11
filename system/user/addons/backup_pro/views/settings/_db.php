<h3  class="accordion"><?=$view_helper->m62Lang('config_db')?></h3>
<input type="hidden" name="db_backup_ignore_tables[]" value="" />
<input type="hidden" name="db_backup_ignore_table_data[]" value="" />
<div>
	<?php 
	$db_backup_methods = array('php' => 'PHP', 'mysqldump' => 'MySQLDUMP');
	$db_restore_methods = array('php' => 'PHP', 'mysql' => 'MySQL');
	
	$this->table->set_heading($view_helper->m62Lang('setting'),$view_helper->m62Lang('value'));
	$this->table->add_row(
	    '<label for="max_db_backups">'.$view_helper->m62Lang('max_db_backups').' </label><div class="subtext">'.$view_helper->m62Lang('max_db_backups_instructions').'</div>', 
	    form_input('max_db_backups', $form_data['max_db_backups'], 'id="max_db_backups"').m62_form_errors($form_errors['max_db_backups'])
	);
	
	$this->table->add_row(
	    '<label for="db_backup_alert_threshold">'.$view_helper->m62Lang('db_backup_alert_threshold').' </label><div class="subtext">'.$view_helper->m62Lang('db_backup_alert_threshold_instructions').'</div>', 
	    form_input('db_backup_alert_threshold', $form_data['db_backup_alert_threshold'], 'id="db_backup_alert_threshold"').m62_form_errors($form_errors['db_backup_alert_threshold'])
	);
	
	$this->table->add_row(
	    '<label for="db_backup_method">'.$view_helper->m62Lang('db_backup_method').'</label><div class="subtext">'.$view_helper->m62Lang('db_backup_method_instructions').'</div>', 
	    form_dropdown('db_backup_method', $db_backup_methods, $form_data['db_backup_method'], 'id="db_backup_method"').
	       '<span id="mysqldump_command_wrap" style="display:none;">'.form_input('mysqldump_command', $form_data['mysqldump_command'], 'id="mysqldump_command" style="width:60%; margin-left:10px;"').'</span>'
	       .m62_form_errors($form_errors['db_backup_method'])
	       .m62_form_errors($form_errors['mysqldump_command'])
	);
	
	$this->table->add_row(
	    '<label for="db_restore_method">'.$view_helper->m62Lang('db_restore_method').'</label><div class="subtext">'.$view_helper->m62Lang('db_restore_method_instructions').'</div>', 
	    form_dropdown('db_restore_method', $db_restore_methods, $form_data['db_restore_method'], 'id="db_restore_method"').
	       '<span id="mysqlcli_command_wrap" style="display:none;">'.form_input('mysqlcli_command', $form_data['mysqlcli_command'], 'id="mysqlcli_command" style="width:60%; margin-left:10px;"').'</span>'
	       .m62_form_errors($form_errors['db_restore_method'])
	       .m62_form_errors($form_errors['mysqlcli_command'])
	);
	
	echo $this->table->generate();
	$this->table->clear();	
	?>
	
	<h3  class="accordion"><?=$view_helper->m62Lang('config_ignore_sql')?></h3>
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