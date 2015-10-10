<p><?=$view_helper->m62Lang('license_details_instructions')?></p>
<h3  class="accordion"><?=$view_helper->m62Lang('license_details')?></h3>
<div>
	<?php 
	
	$this->table->set_heading($view_helper->m62Lang('setting'),$view_helper->m62Lang('value'));
	$this->table->add_row(
	    '<label for="license_number">'.$view_helper->m62Lang('license_number').'</label><div class="subtext">'.$view_helper->m62Lang('license_number_instructions').'</div>', 
	    form_input('license_number', $form_data['license_number'], 'id="license_number"').m62_form_errors($form_errors['license_number'])
    );
	
	echo $this->table->generate();
	$this->table->clear();	
	?>
</div>