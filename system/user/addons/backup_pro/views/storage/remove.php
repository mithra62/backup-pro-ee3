<?php $this->load->view('_includes/_errors'); ?>
<?php $this->load->view('storage/_submenu')?>
<div class="clear_left shun"></div>
	
	<h2><?php echo $view_helper->m62Lang('remove_storage_location'); ?> (<?php echo $storage_details['storage_location_name']; ?>)</h2>
	
	<p><strong><?php echo $view_helper->m62Lang($storage_engine['name']); ?>:</strong> <?php echo $view_helper->m62Lang($storage_engine['desc']); ?></p>
	<?php echo form_open($query_base.'remove_storage&id='.$storage_id, array('id'=>'my_accordion'))?>
<div class="tableFooter">
	<div class="tableSubmit">
		<?php echo form_submit(array('name' => 'submit', 'value' => $view_helper->m62Lang('remove_storage_location'), 'class' => 'submit'));?>
	</div>
</div>	
	<?php echo form_close()?>