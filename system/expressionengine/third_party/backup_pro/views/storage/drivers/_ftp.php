<input type="hidden" value="0" name="ftp_passive" />
<input type="hidden" value="0" name="ftp_ssl" />
<?php 	
$this->table->add_row(
    '<label for="ftp_hostname">'.$view_helper->m62Lang('ftp_hostname').'</label><div class="subtext">'.$view_helper->m62Lang('ftp_hostname_instructions').'</div>', 
    form_input('ftp_hostname', $form_data['ftp_hostname'], 'id="ftp_hostname"').m62_form_errors($form_errors['ftp_hostname'])
);

$this->table->add_row(
    '<label for="ftp_username">'.$view_helper->m62Lang('ftp_username').'</label><div class="subtext">'.$view_helper->m62Lang('ftp_username_instructions').'</div>', 
    form_input('ftp_username', $form_data['ftp_username'], 'id="ftp_username"').m62_form_errors($form_errors['ftp_username'])
);

$this->table->add_row(
    '<label for="ftp_password">'.$view_helper->m62Lang('ftp_password').'</label><div class="subtext">'.$view_helper->m62Lang('ftp_password_instructions').'</div>', 
    form_password('ftp_password', $form_data['ftp_password'], 'id="ftp_password"').m62_form_errors($form_errors['ftp_password'])
);

$this->table->add_row(
    '<label for="ftp_port">'.$view_helper->m62Lang('ftp_port').'</label><div class="subtext">'.$view_helper->m62Lang('ftp_port_instructions').'</div>', 
    form_input('ftp_port', $form_data['ftp_port'], 'id="ftp_port"').m62_form_errors($form_errors['ftp_port'])
);

$this->table->add_row(
    '<label for="ftp_store_location">'.$view_helper->m62Lang('ftp_store_location').'</label><div class="subtext">'.$view_helper->m62Lang('ftp_store_location_instructions').'</div>', 
    form_input('ftp_store_location', $form_data['ftp_store_location'], 'id="ftp_store_location"').m62_form_errors($form_errors['ftp_store_location'])
);

$this->table->add_row(
    '<label for="ftp_passive">'.$view_helper->m62Lang('ftp_passive').'</label><div class="subtext">'.$view_helper->m62Lang('ftp_passive_instructions').'</div>',
    form_checkbox('ftp_passive', '1', $form_data['ftp_passive'], 'id="ftp_passive"').m62_form_errors($form_errors['ftp_passive'])
);

$this->table->add_row(
    '<label for="ftp_ssl">'.$view_helper->m62Lang('ftp_ssl').'</label><div class="subtext">'.$view_helper->m62Lang('ftp_ssl_instructions').'</div>',
    form_checkbox('ftp_ssl', '1', $form_data['ftp_ssl'], 'id="ftp_ssl"').m62_form_errors($form_errors['ftp_ssl'])
);


$this->table->add_row(
    '<label for="ftp_timeout">'.$view_helper->m62Lang('ftp_timeout').'</label><div class="subtext">'.$view_helper->m62Lang('ftp_timeout_instructions').'</div>',
    form_input('ftp_timeout', $form_data['ftp_timeout'], 'id="ftp_timeout"').m62_form_errors($form_errors['ftp_timeout'])
);