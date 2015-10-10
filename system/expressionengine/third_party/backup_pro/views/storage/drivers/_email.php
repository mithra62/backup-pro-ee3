<?php
$this->table->add_row(
    '<label for="email_storage_emails">'.$view_helper->m62Lang('email_storage_emails').'</label><div class="subtext">'.$view_helper->m62Lang('email_storage_emails_instructions').'</div>',
    form_textarea('email_storage_emails', $form_data['email_storage_emails'], 'id="email_storage_emails"').m62_form_errors($form_errors['email_storage_emails'])
);

$this->table->add_row(
    '<label for="email_storage_attach_threshold">'.$view_helper->m62Lang('email_storage_attach_threshold').'</label><div class="subtext">'.$view_helper->m62Lang('email_storage_attach_threshold_instructions').'</div>',
    form_input('email_storage_attach_threshold', $form_data['email_storage_attach_threshold'], 'id="email_storage_attach_threshold"').m62_form_errors($form_errors['email_storage_attach_threshold'])
);