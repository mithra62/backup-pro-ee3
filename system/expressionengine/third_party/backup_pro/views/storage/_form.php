<input type="hidden" value="0" name="storage_location_status" />
<input type="hidden" value="0" name="storage_location_file_use" />
<input type="hidden" value="0" name="storage_location_db_use" />
<input type="hidden" value="0" name="storage_location_include_prune" />
<?php 

$tmpl = array (
	'table_open'          => '<table class="mainTable" border="0" cellspacing="0" cellpadding="0">',

	'row_start'           => '<tr class="even">',
	'row_end'             => '</tr>',
	'cell_start'          => '<td style="width:50%;">',
	'cell_end'            => '</td>',

	'row_alt_start'       => '<tr class="odd">',
	'row_alt_end'         => '</tr>',
	'cell_alt_start'      => '<td>',
	'cell_alt_end'        => '</td>',

	'table_close'         => '</table>'
);

$this->table->set_template($tmpl); 
$this->table->set_empty("&nbsp;");

$this->table->set_heading($view_helper->m62Lang('setting'),$view_helper->m62Lang('value'));
$this->table->add_row(
    '<label for="storage_location_name">'.$view_helper->m62Lang('storage_location_name').'</label><div class="subtext">'.$view_helper->m62Lang('storage_location_name_instructions').'</div>',
    form_input('storage_location_name', $form_data['storage_location_name'], 'id="storage_location_name"').m62_form_errors($form_errors['storage_location_name'])
);


$this->load->view($_form_template); 

$this->table->add_row(
    '<label for="storage_location_status">'.$view_helper->m62Lang('storage_location_status').'</label><div class="subtext">'.$view_helper->m62Lang('storage_location_status_instructions').'</div>',
    form_checkbox('storage_location_status', '1', $form_data['storage_location_status'], 'id="storage_location_status"').m62_form_errors($form_errors['storage_location_status'])
);

$this->table->add_row(
    '<label for="storage_location_file_use">'.$view_helper->m62Lang('storage_location_file_use').'</label><div class="subtext">'.$view_helper->m62Lang('storage_location_file_use_instructions').'</div>',
    form_checkbox('storage_location_file_use', '1', $form_data['storage_location_file_use'], 'id="storage_location_file_use"').m62_form_errors($form_errors['storage_location_file_use'])
);

$this->table->add_row(
    '<label for="storage_location_db_use">'.$view_helper->m62Lang('storage_location_db_use').'</label><div class="subtext">'.$view_helper->m62Lang('storage_location_db_use_instructions').'</div>',
    form_checkbox('storage_location_db_use', '1', $form_data['storage_location_db_use'], 'id="storage_location_db_use"').m62_form_errors($form_errors['storage_location_db_use'])
);

$this->table->add_row(
    '<label for="storage_location_include_prune">'.$view_helper->m62Lang('storage_location_include_prune').'</label><div class="subtext">'.$view_helper->m62Lang('storage_location_include_prune_instructions').'</div>',
    form_checkbox('storage_location_include_prune', '1', $form_data['storage_location_include_prune'], 'id="storage_location_include_prune"').m62_form_errors($form_errors['storage_location_include_prune'])
);

echo $this->table->generate();
$this->table->clear();
?>