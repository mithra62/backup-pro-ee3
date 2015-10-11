<h3  class="accordion"><?=$view_helper->m62Lang('integrity_agent_cron')?></h3>
<input type="hidden" name="cron_notify_member_ids[]" value="" />
<?php 
if(count($ia_cron_commands) >= 1)
{
	$this->table->set_heading(
		array('data' => '', 'width' => '50%'), 
		array('data' => $view_helper->m62Lang('cron_commands'), 'width' => '30%'), 
		array('data' => $view_helper->m62Lang('test'), 'width' => '20%')
	);
	foreach($ia_cron_commands AS $key => $value)
	{
		$this->table->add_row(
			array('data' => $view_helper->m62Lang($key), 'width' => '50%'), 
			'<div class="select_all">'.$value['cmd'].'</div>',
			'<a href="'.$value['url'].'" class="test_cron" rel="'.$key.'"><img src="'.$theme_folder_url.'backup_pro/images/test.png" /></a> <img src="'.$theme_folder_url.'backup_pro/images/indicator.gif" id="animated_'.$key.'" style="display:none" />');
	}
	echo $this->table->generate();
	$this->table->clear();	
}
?>
<h3  class="accordion"><?=$view_helper->m62Lang('configure_integrity_agent_verification')?></h3>
<input type="hidden" name="backup_missed_schedule_notify_member_ids[]" value="" />
<div>
<?php 
	$this->table->set_heading($view_helper->m62Lang('setting'),$view_helper->m62Lang('value'));
	$this->table->add_row(
	    '<label for="db_verification_db_name">'.$view_helper->m62Lang('db_verification_db_name').'</label><div class="subtext">'.$view_helper->m62Lang('db_verification_db_name_instructions').'</div>', 
	    form_input('db_verification_db_name', $form_data['db_verification_db_name'], 'id="db_verification_db_name"').m62_form_errors($form_errors['db_verification_db_name'])
	);
	$this->table->add_row(
	    '<label for="total_verifications_per_execution">'.$view_helper->m62Lang('total_verifications_per_execution').'</label><div class="subtext">'.$view_helper->m62Lang('total_verifications_per_execution_instructions').'</div>', 
	    form_input('total_verifications_per_execution', $form_data['total_verifications_per_execution'], 'id="total_verifications_per_execution"').m62_form_errors($form_errors['total_verifications_per_execution'])
	);
	$this->table->add_row(
	    '<label for="check_backup_state_cp_login">'.$view_helper->m62Lang('check_backup_state_cp_login').'</label><div class="subtext">'.$view_helper->m62Lang('check_backup_state_cp_login_instructions').'</div>', 
	    form_checkbox('check_backup_state_cp_login', '1', $form_data['check_backup_state_cp_login'], 'id="check_backup_state_cp_login"').m62_form_errors($form_errors['check_backup_state_cp_login'])
	);
	echo $this->table->generate();
	$this->table->clear();	
?>
</div>	
	
<h3  class="accordion"><?=$view_helper->m62Lang('configure_integrity_agent_backup_missed_schedule')?></h3>
<div>
<?php 
	$this->table->set_heading($view_helper->m62Lang('setting'),$view_helper->m62Lang('value'));
	$this->table->add_row(
	    '<label for="backup_missed_schedule_notify_email_interval">'.$view_helper->m62Lang('backup_missed_schedule_notify_email_interval').'</label><div class="subtext">'.$view_helper->m62Lang('backup_missed_schedule_notify_email_interval_instructions').'</div>', 
	    form_input('backup_missed_schedule_notify_email_interval', $form_data['backup_missed_schedule_notify_email_interval'], 'id="backup_missed_schedule_notify_email_interval"').m62_form_errors($form_errors['backup_missed_schedule_notify_email_interval'])
	);
	$this->table->add_row(
	    '<label for="backup_missed_schedule_notify_emails">'.$view_helper->m62Lang('backup_missed_schedule_notify_emails').'</label><div class="subtext">'.$view_helper->m62Lang('backup_missed_schedule_notify_emails_instructions').'</div>', 
	    form_textarea('backup_missed_schedule_notify_emails', $form_data['backup_missed_schedule_notify_emails'], 'id="backup_missed_schedule_notify_emails" data-placeholder="'.$view_helper->m62Lang('backup_missed_schedule_notify_emails').'"').m62_form_errors($form_errors['backup_missed_schedule_notify_emails'])
	);
	$this->table->add_row(
	    '<label for="backup_missed_schedule_notify_email_mailtype">'.$view_helper->m62Lang('backup_missed_schedule_notify_email_mailtype').'</label><div class="subtext">'.$view_helper->m62Lang('backup_missed_schedule_notify_email_mailtype_instructions').'</div>', 
	    form_dropdown('backup_missed_schedule_notify_email_mailtype', array('html' => 'html', 'text' => 'text'), $form_data['backup_missed_schedule_notify_email_mailtype'], 'id="backup_missed_schedule_notify_email_mailtype"').m62_form_errors($form_errors['backup_missed_schedule_notify_email_mailtype'])
	);
	$this->table->add_row(
	    '<label for="backup_missed_schedule_notify_email_subject">'.$view_helper->m62Lang('backup_missed_schedule_notify_email_subject').'</label><div class="subtext">'.$view_helper->m62Lang('backup_missed_schedule_notify_email_subject_instructions').'</div>', 
	    form_input('backup_missed_schedule_notify_email_subject', $form_data['backup_missed_schedule_notify_email_subject'], 'id="backup_missed_schedule_notify_email_subject"').m62_form_errors($form_errors['backup_missed_schedule_notify_email_subject'])
	);
	$this->table->add_row(
	    '<label for="backup_missed_schedule_notify_email_message">'.$view_helper->m62Lang('backup_missed_schedule_notify_email_message').'</label><div class="subtext">'.$view_helper->m62Lang('backup_missed_schedule_notify_email_message_instructions').'</div>', 
	    form_textarea('backup_missed_schedule_notify_email_message', $form_data['backup_missed_schedule_notify_email_message'], 'cols="90" rows="6" id="backup_missed_schedule_notify_email_message" ').m62_form_errors($form_errors['backup_missed_schedule_notify_email_message'])
	);
	echo $this->table->generate();
	$this->table->clear();	
?>
</div>