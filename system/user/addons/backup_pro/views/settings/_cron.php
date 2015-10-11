<h3  class="accordion"><?=$view_helper->m62Lang('configure_cron')?></h3>
<input type="hidden" value="0" name="cron_attach_backups" />
<input type="hidden" name="cron_notify_member_ids[]" value="" />
<?php 
	if(count($backup_cron_commands) >= 1)
	{
		$this->table->set_heading(
			array('data' => $view_helper->m62Lang('backup_type'), 'width' => '50%'), 
			array('data' => $view_helper->m62Lang('cron_commands'), 'width' => '30%'), 
			array('data' => $view_helper->m62Lang('test'), 'width' => '20%')
		);
		foreach($backup_cron_commands AS $key => $value)
		{
			$this->table->add_row(
				array('data' => $view_helper->m62Lang($key), 'width' => '50%'), 
				'<div class="select_all">'.$value['cmd'].'</div>',
				'<a href="'.$value['url'].'" class="test_cron" rel="'.$key.'"><img src="'.$theme_folder_url.'backup_pro/images/test.png" /></a> <img src="'.$theme_folder_url.'backup_pro/images/indicator.gif" id="animated_'.$key.'" style="display:none" />');
		}
		echo $this->table->generate();
		$this->table->clear();	
	}	
	//
	?>
	
<h3  class="accordion"><?=$view_helper->m62Lang('configure_cron_notification')?></h3>
<?php 
	$this->table->set_heading($view_helper->m62Lang('setting'),$view_helper->m62Lang('value'));
	$this->table->add_row(
	    '<label for="cron_notify_emails">'.$view_helper->m62Lang('cron_notify_emails').'</label><div class="subtext">'.$view_helper->m62Lang('cron_notify_emails_instructions').'</div>', 
	    form_textarea('cron_notify_emails', $form_data['cron_notify_emails'], 'cols="90" rows="6" id="cron_notify_emails" ').m62_form_errors($form_errors['cron_notify_emails'])
	);
	$this->table->add_row(
	    '<label for="cron_notify_email_mailtype">'.$view_helper->m62Lang('cron_notify_email_mailtype').'</label><div class="subtext">'.$view_helper->m62Lang('cron_notify_email_mailtype_instructions').'</div>', 
	    form_dropdown('cron_notify_email_mailtype', array('html' => 'html', 'text' => 'text'), $form_data['cron_notify_email_mailtype'], 'id="cron_notify_email_mailtype"').m62_form_errors($form_errors['cron_notify_email_mailtype'])
	);
	$this->table->add_row(
	    '<label for="cron_notify_email_subject">'.$view_helper->m62Lang('cron_notify_email_subject').'</label><div class="subtext">'.$view_helper->m62Lang('cron_notify_email_subject_instructions').'</div>', 
	    form_input('cron_notify_email_subject', $form_data['cron_notify_email_subject'], 'id="cron_notify_email_subject"').m62_form_errors($form_errors['cron_notify_email_subject'])
	);
	$this->table->add_row(
	    '<label for="cron_notify_email_message">'.$view_helper->m62Lang('cron_notify_email_message').'</label><div class="subtext">'.$view_helper->m62Lang('cron_notify_email_message_instructions').'</div>', 
	    form_textarea('cron_notify_email_message', $form_data['cron_notify_email_message'], 'cols="90" rows="6" id="cron_notify_email_message" ').m62_form_errors($form_errors['cron_notify_email_message'])
	);
	
	echo $this->table->generate();
	$this->table->clear();	
?>
</div>