<input type="hidden" value="0" name="s3_reduced_redundancy" />
<?php 	
$this->table->add_row(
    '<label for="s3_access_key">'.$view_helper->m62Lang('s3_access_key').'</label><div class="subtext">'.$view_helper->m62Lang('s3_access_key_instructions').'</div>', 
    form_input('s3_access_key', $form_data['s3_access_key'], 'id="s3_access_key"').m62_form_errors($form_errors['s3_access_key'])
);

$this->table->add_row(
    '<label for="s3_secret_key">'.$view_helper->m62Lang('s3_secret_key').'</label><div class="subtext">'.$view_helper->m62Lang('s3_secret_key_instructions').'</div>', 
    form_password('s3_secret_key', $form_data['s3_secret_key'], 'id="s3_secret_key"').m62_form_errors($form_errors['s3_secret_key'])
);

$this->table->add_row(
    '<label for="s3_bucket">'.$view_helper->m62Lang('s3_bucket').'</label><div class="subtext">'.$view_helper->m62Lang('s3_bucket_instructions').'</div>', 
    form_input('s3_bucket', $form_data['s3_bucket'], 'id="s3_bucket"').m62_form_errors($form_errors['s3_bucket'])
);

$this->table->add_row(
    '<label for="s3_optional_prefix">'.$view_helper->m62Lang('s3_optional_prefix').'</label><div class="subtext">'.$view_helper->m62Lang('s3_optional_prefix_instructions').'</div>',
    form_input('s3_optional_prefix', $form_data['s3_optional_prefix'], 'id="s3_bucket"').m62_form_errors($form_errors['s3_optional_prefix'])
);

$this->table->add_row(
    '<label for="s3_reduced_redundancy">'.$view_helper->m62Lang('s3_reduced_redundancy').'</label><div class="subtext">'.$view_helper->m62Lang('s3_reduced_redundancy_instructions').'</div>', 
    form_checkbox('s3_reduced_redundancy', '1', $form_data['s3_reduced_redundancy'], 'id="s3_reduced_redundancy"').m62_form_errors($form_errors['s3_reduced_redundancy'])
);
