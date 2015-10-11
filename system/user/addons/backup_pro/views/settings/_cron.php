<h2><?=$view_helper->m62Lang('configure_cron')?></h2>
<input type="hidden" value="0" name="cron_attach_backups" />
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
	
<h2><?=$view_helper->m62Lang('configure_cron_notification')?></h2>

<fieldset class="col-group ">
	<div class="setting-txt col w-8">
		<h3><label for="cron_notify_emails"><?php echo $view_helper->m62Lang('cron_notify_emails'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('cron_notify_emails_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8 ">
		<?php echo form_textarea('cron_notify_emails', $form_data['cron_notify_emails'], 'cols="90" rows="6" id="cron_notify_emails"'); ?>
		<?php echo m62_form_errors($form_errors['cron_notify_emails']); ?>
	</div>
</fieldset>

<fieldset class="col-group required">
	<div class="setting-txt col w-8">
		<h3><label for="cron_notify_email_mailtype"><?php echo $view_helper->m62Lang('cron_notify_email_mailtype'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('cron_notify_email_mailtype_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8 last">
		<?php echo form_dropdown('cron_notify_email_mailtype', array('html' => 'html', 'text' => 'text'), $form_data['cron_notify_email_mailtype'], 'id="cron_notify_email_mailtype"' ); ?>
		<?php echo m62_form_errors($form_errors['cron_notify_email_mailtype']); ?>
	</div>
</fieldset>	

<fieldset class="col-group required">
	<div class="setting-txt col w-8">
		<h3><label for="cron_notify_email_subject"><?php echo $view_helper->m62Lang('cron_notify_email_subject'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('cron_notify_email_subject_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('cron_notify_email_subject', $form_data['cron_notify_email_subject'], 'id="cron_notify_email_subject"'); ?>
		<?php echo m62_form_errors($form_errors['cron_notify_email_subject']); ?>
	</div>
</fieldset>

<fieldset class="col-group ">
	<div class="setting-txt col w-8">
		<h3><label for="cron_notify_email_message"><?php echo $view_helper->m62Lang('cron_notify_email_message'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('cron_notify_email_message_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8 ">
		<?php echo form_textarea('cron_notify_email_message', $form_data['cron_notify_email_message'], 'cols="90" rows="6" id="cron_notify_email_message"'); ?>
		<?php echo m62_form_errors($form_errors['cron_notify_email_message']); ?>
	</div>
</fieldset>
