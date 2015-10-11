<h3  class="accordion"><?=$view_helper->m62Lang('configure_backups')?></h3>
<input type="hidden" value="0" name="relative_time" />
<input type="hidden" value="0" name="allow_duplicates" />
<div>
	<?php 
	
	$this->table->set_heading($view_helper->m62Lang('setting'),$view_helper->m62Lang('value'));
	$this->table->add_row(
	    '<label for="working_directory">'.$view_helper->m62Lang('working_directory').'</label><div class="subtext">'.$view_helper->m62Lang('working_directory_instructions').'</div>', 
	    form_input('working_directory', $form_data['working_directory'], 'id="working_directory"').m62_form_errors($form_errors['working_directory'])
    );

	$this->table->add_row(
	    '<label for="cron_query_key">'.$view_helper->m62Lang('cron_query_key').'</label><div class="subtext">'.$view_helper->m62Lang('cron_query_key_instructions').'</div>',
	    form_input('cron_query_key', $form_data['cron_query_key'], 'id="cron_query_key"').m62_form_errors($form_errors['cron_query_key'])
	);
	
	$this->table->add_row(
	    '<label for="dashboard_recent_total">'.$view_helper->m62Lang('dashboard_recent_total').'</label><div class="subtext">'.$view_helper->m62Lang('dashboard_recent_total_instructions').'</div>', 
	    form_input('dashboard_recent_total', $form_data['dashboard_recent_total'], 'id="dashboard_recent_total"').m62_form_errors($form_errors['dashboard_recent_total'])
	);
	
	$this->table->add_row(
	    '<label for="auto_threshold">'.$view_helper->m62Lang('auto_threshold').' </label><div class="subtext">'.$view_helper->m62Lang('auto_threshold_instructions').'</div>', 
	    form_dropdown('auto_threshold', $threshold_options, $form_data['auto_threshold'], 'id="auto_threshold"' ).'<span id="auto_threshold_custom_wrap" style="display:none; ">'.
	       form_input('auto_threshold_custom', $form_data['auto_threshold_custom'], 'id="auto_threshold_custom" style="width:40%; margin-left:10px;"').'</span>'
	       .m62_form_errors($form_errors['auto_threshold'])
	       .m62_form_errors($form_errors['auto_threshold_custom'])
	);
	
	$this->table->add_row(
        '<label for="allow_duplicates">'.$view_helper->m62Lang('allow_duplicates').'</label><div class="subtext">'.$view_helper->m62Lang('allow_duplicates_instructions').'</div>', 
	    form_checkbox('allow_duplicates', '1', $form_data['allow_duplicates'], 'id="allow_duplicates"').m62_form_errors($form_errors['allow_duplicates'])
	);
	
	$this->table->add_row(
	    '<label for="date_format">'.$view_helper->m62Lang('date_format').'</label><div class="subtext">'.$view_helper->m62Lang('date_format_instructions').'</div>', 
	    form_input('date_format', $form_data['date_format'], 'id="date_format"').m62_form_errors($form_errors['date_format'])
	);
	
	$this->table->add_row(
        '<label for="relative_time">'.$view_helper->m62Lang('relative_time').'</label><div class="subtext">'.$view_helper->m62Lang('relative_time_instructions').'</div>', 
	    form_checkbox('relative_time', '1', $form_data['relative_time'], 'id="relative_time"').m62_form_errors($form_errors['relative_time'])
	);
	//$this->table->add_row('<label for="license_number">'.$view_helper->m62Lang('license_number').'</label>', form_input('license_number', $settings['license_number'], 'id="license_number"'));
	
	echo $this->table->generate();
	$this->table->clear();	
	?>
</div>