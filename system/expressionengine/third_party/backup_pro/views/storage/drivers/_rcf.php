<?php 
$cf_location_options = array('us' => 'US', 'uk' => 'UK');

$this->table->add_row(
    '<label for="rcf_username">'.$view_helper->m62Lang('rcf_username').'</label><div class="subtext">'.$view_helper->m62Lang('rcf_username_instructions').'</div>', 
    form_input('rcf_username', $form_data['rcf_username'], 'id="rcf_username"').m62_form_errors($form_errors['rcf_username'])
);

$this->table->add_row(
    '<label for="rcf_api">'.$view_helper->m62Lang('rcf_api').'</label><div class="subtext">'.$view_helper->m62Lang('rcf_api_instructions').'</div>', 
    form_password('rcf_api', $form_data['rcf_api'], 'id="rcf_api"').m62_form_errors($form_errors['rcf_api'])
);

$this->table->add_row(
    '<label for="rcf_container">'.$view_helper->m62Lang('rcf_container').'</label><div class="subtext">'.$view_helper->m62Lang('rcf_container_instructions').'</div>', 
    form_input('rcf_container', $form_data['rcf_container'], 'id="rcf_container"').m62_form_errors($form_errors['rcf_container'])
);

$this->table->add_row(
    '<label for="rcf_location">'.$view_helper->m62Lang('rcf_location').'</label><div class="subtext">'.$view_helper->m62Lang('rcf_location_instructions').'</div>', 
    form_dropdown('rcf_location', $cf_location_options, $form_data['rcf_location'], 'id="rcf_location"').m62_form_errors($form_errors['rcf_location'])
);
