<?php $this->load->view('_includes/_errors'); ?>
<?php $this->load->view('storage/_submenu')?>
<div class="clear_left shun"></div>
<p><?php echo $view_helper->m62Lang($storage_engine['desc']); ?></p>


<?php echo form_open($query_base.'new_storage&engine='.$engine, array('id'=>'my_accordion'))?>
<h3  class="accordion"><?=$view_helper->m62Lang('add_storage_location')?> (<?=$view_helper->m62Lang($storage_engine['name'])?>)</h3>

<?php $this->load->view('storage/_form'); ?>

<div class="tableFooter">
	<div class="tableSubmit">
		<?php echo form_submit(array('name' => 'submit', 'value' => $view_helper->m62Lang('add_storage_location'), 'class' => 'submit'));?>
	</div>
</div>	
<?php echo form_close()?>