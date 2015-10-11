<?php
$this->table->add_row(
    '<label for="backup_store_location">'.$view_helper->m62Lang('backup_store_location').'</label><div class="subtext">'.$view_helper->m62Lang('backup_store_location_instructions').'</div>',
    form_input('backup_store_location', $form_data['backup_store_location'], 'id="backup_store_location"').m62_form_errors($form_errors['backup_store_location'])
);