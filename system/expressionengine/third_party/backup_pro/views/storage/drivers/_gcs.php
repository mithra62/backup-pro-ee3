<?php 
		
$this->table->add_row(
    '<label for="gcs_access_key">'.$view_helper->m62Lang('gcs_access_key').'</label><div class="subtext">'.$view_helper->m62Lang('gcs_access_key_instructions').'</div>', 
    form_input('gcs_access_key', $form_data['gcs_access_key'], 'id="gcs_access_key"').m62_form_errors($form_errors['gcs_access_key'])
);

$this->table->add_row(
    '<label for="gcs_secret_key">'.$view_helper->m62Lang('gcs_secret_key').'</label><div class="subtext">'.$view_helper->m62Lang('gcs_secret_key_instructions').'</div>', 
    form_password('gcs_secret_key', $form_data['gcs_secret_key'], 'id="gcs_secret_key"').m62_form_errors($form_errors['gcs_secret_key'])
);

$this->table->add_row(
    '<label for="gcs_bucket">'.$view_helper->m62Lang('gcs_bucket').'</label><div class="subtext">'.$view_helper->m62Lang('gcs_bucket_instructions').'</div>', 
    form_input('gcs_bucket', $form_data['gcs_bucket'], 'id="gcs_bucket"').m62_form_errors($form_errors['gcs_bucket'])
);
