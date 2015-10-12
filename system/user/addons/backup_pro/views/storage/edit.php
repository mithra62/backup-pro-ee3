<?php $this->load->view('_includes/_errors'); ?>
<?php $this->load->view('storage/_submenu')?>
<div class="clear_left shun"></div>
<p><?php echo $view_helper->m62Lang($storage_engine['desc']); ?></p>


<?php echo form_open('', array('id'=>'my_accordion'))?>
<h2><?=$view_helper->m62Lang('edit_storage_location')?> (<?=$view_helper->m62Lang($storage_engine['name'])?>)</h2>

<?php $this->load->view('storage/_form'); ?>

<fieldset class="form-ctrls">
		<?php echo form_submit(array('name' => 'submit', 'value' => $view_helper->m62Lang('edit_storage_location'), 'class' => 'btn'));?>
</fieldset>
<?php echo form_close()?>