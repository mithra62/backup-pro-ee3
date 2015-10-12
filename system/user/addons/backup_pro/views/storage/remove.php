<?php $this->load->view('_includes/_errors'); ?>
<?php $this->load->view('storage/_submenu')?>
<div class="clear_left shun"></div>
	
	<h2><?php echo $view_helper->m62Lang('remove_storage_location'); ?> (<?php echo $storage_details['storage_location_name']; ?>)</h2>
	
	<p><strong><?php echo $view_helper->m62Lang($storage_engine['name']); ?>:</strong> <?php echo $view_helper->m62Lang($storage_engine['desc']); ?></p>
	<?php echo form_open('', array('id'=>'my_accordion'))?>

<fieldset class="form-ctrls">
		<?php echo form_submit(array('name' => 'submit', 'value' => $view_helper->m62Lang('remove_storage_location'), 'class' => 'btn'));?>
</fieldset>
	<?php echo form_close()?>