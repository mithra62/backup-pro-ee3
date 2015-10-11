<h2><?=$view_helper->m62Lang('integrity_agent_cron')?></h2>
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
<h2><?=$view_helper->m62Lang('configure_integrity_agent_verification')?></h2>
<input type="hidden" name="backup_missed_schedule_notify_member_ids[]" value="" />

<fieldset class="col-group required <?php echo ($form_errors['db_verification_db_name'] ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="db_verification_db_name"><?php echo $view_helper->m62Lang('db_verification_db_name'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('db_verification_db_name_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('db_verification_db_name', $form_data['db_verification_db_name'], 'id="db_verification_db_name"'); ?>
		<?php echo m62_form_errors($form_errors['db_verification_db_name']); ?>
	</div>
</fieldset>

<fieldset class="col-group required <?php echo ($form_errors['total_verifications_per_execution'] ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="total_verifications_per_execution"><?php echo $view_helper->m62Lang('total_verifications_per_execution'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('total_verifications_per_execution_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('total_verifications_per_execution', $form_data['total_verifications_per_execution'], 'id="total_verifications_per_execution"'); ?>
		<?php echo m62_form_errors($form_errors['total_verifications_per_execution']); ?>
	</div>
</fieldset>

<fieldset class="col-group <?php echo ($form_errors['check_backup_state_cp_login'] ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="check_backup_state_cp_login"><?php echo $view_helper->m62Lang('check_backup_state_cp_login'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('check_backup_state_cp_login_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8 ">
		<?php echo form_checkbox('check_backup_state_cp_login', '1', $form_data['check_backup_state_cp_login'], 'id="check_backup_state_cp_login"'); ?>
		<?php echo m62_form_errors($form_errors['check_backup_state_cp_login']); ?>
	</div>
</fieldset>

<h2><?=$view_helper->m62Lang('configure_integrity_agent_backup_missed_schedule')?></h2>

<fieldset class="col-group required <?php echo ($form_errors['backup_missed_schedule_notify_email_interval'] ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="db_verification_db_name"><?php echo $view_helper->m62Lang('backup_missed_schedule_notify_email_interval'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('backup_missed_schedule_notify_email_interval_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('backup_missed_schedule_notify_email_interval', $form_data['backup_missed_schedule_notify_email_interval'], 'id="backup_missed_schedule_notify_email_interval"'); ?>
		<?php echo m62_form_errors($form_errors['backup_missed_schedule_notify_email_interval']); ?>
	</div>
</fieldset>

<fieldset class="col-group <?php echo ($form_errors['backup_missed_schedule_notify_emails'] ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="backup_missed_schedule_notify_emails"><?php echo $view_helper->m62Lang('backup_missed_schedule_notify_emails'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('backup_missed_schedule_notify_emails_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8 ">
		<?php echo form_textarea('backup_missed_schedule_notify_emails', $form_data['backup_missed_schedule_notify_emails'], 'cols="90" rows="6" id="backup_missed_schedule_notify_emails"'); ?>
		<?php echo m62_form_errors($form_errors['backup_missed_schedule_notify_emails']); ?>
	</div>
</fieldset>	

<fieldset class="col-group required <?php echo ($form_errors['backup_missed_schedule_notify_email_mailtype'] ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="backup_missed_schedule_notify_email_mailtype"><?php echo $view_helper->m62Lang('backup_missed_schedule_notify_email_mailtype'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('backup_missed_schedule_notify_email_mailtype_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8 last">
		<?php echo form_dropdown('backup_missed_schedule_notify_email_mailtype', array('html' => 'html', 'text' => 'text'), $form_data['backup_missed_schedule_notify_email_mailtype'], 'id="backup_missed_schedule_notify_email_mailtype"' ); ?>
		<?php echo m62_form_errors($form_errors['backup_missed_schedule_notify_email_mailtype']); ?>
	</div>
</fieldset>	

<fieldset class="col-group required <?php echo ($form_errors['backup_missed_schedule_notify_email_subject'] ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="backup_missed_schedule_notify_email_subject"><?php echo $view_helper->m62Lang('backup_missed_schedule_notify_email_subject'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('backup_missed_schedule_notify_email_subject_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8">
		<?php echo form_input('backup_missed_schedule_notify_email_subject', $form_data['backup_missed_schedule_notify_email_subject'], 'id="backup_missed_schedule_notify_email_subject"'); ?>
		<?php echo m62_form_errors($form_errors['backup_missed_schedule_notify_email_subject']); ?>
	</div>
</fieldset>

<fieldset class="col-group <?php echo ($form_errors['backup_missed_schedule_notify_email_message'] ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="backup_missed_schedule_notify_email_message"><?php echo $view_helper->m62Lang('backup_missed_schedule_notify_email_message'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('backup_missed_schedule_notify_email_message_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8 ">
		<?php echo form_textarea('backup_missed_schedule_notify_email_message', $form_data['backup_missed_schedule_notify_email_message'], 'cols="90" rows="6" id="backup_missed_schedule_notify_email_message"'); ?>
		<?php echo m62_form_errors($form_errors['backup_missed_schedule_notify_email_message']); ?>
	</div>
</fieldset>
