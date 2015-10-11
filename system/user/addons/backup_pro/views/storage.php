<?php $this->load->view('_includes/_errors'); ?>
<?php $this->load->view('storage/_submenu')?>
<?php 

$tmpl = array (
	'table_open'          => '<table class="mainTable" border="0" cellspacing="0" cellpadding="0">',

	'row_start'           => '<tr class="even">',
	'row_end'             => '</tr>',
	'cell_start'          => '<td>',
	'cell_end'            => '</td>',

	'row_alt_start'       => '<tr class="odd">',
	'row_alt_end'         => '</tr>',
	'cell_alt_start'      => '<td>',
	'cell_alt_end'        => '</td>',

	'table_close'         => '</table>'
);

$this->table->set_template($tmpl); 
$this->table->set_empty("&nbsp;");
$this->table->set_heading($view_helper->m62Lang('storage_location_name'), $view_helper->m62Lang('type'), $view_helper->m62Lang('status'), $view_helper->m62Lang('created_date'), '');
?>
<div class="clear_left shun"></div>

<?php 
	if(count($storage_details) > 0):
	
    	foreach($storage_details AS $key => $storage): 
    	   $row = array(
    	       '<a href="'.$url_base.'edit_storage&id='.$key.'">'.$storage['storage_location_name'].'</a>',
    	       '<img src="'.$theme_folder_url.'backup_pro/images/storage/'.$storage['storage_location_driver'].'.png" class="" title="'.$storage['storage_location_name'].'">',
    	       ( $storage['storage_location_status'] == '1' ? $view_helper->m62Lang('active') : $view_helper->m62Lang('inactive') ),
    	       $view_helper->m62DateTime($storage['storage_location_create_date']),
    	       ($can_remove ? '<a href="'.$url_base.'remove_storage&id='.$key.'">Remove</a>' : '')
    	       //'<a href="{{ url('backuppro/settings/storage/edit') }}?id={{ key }}">{{ storage.storage_location_name }}</a>'    
	       );
    	   $this->table->add_row($row);
    	endforeach;
    	
    	echo $this->table->generate();
    	$this->table->clear();    	
?>
<?php else: ?>
	<div class="no_backup_found"><?php echo $view_helper->m62Lang('no_storage_locations_created_yet')?></div>
<?php endif; ?>
<?php echo form_close()?>