<div class="box">
<?php $this->load->view('_includes/_errors'); ?>
<h1><?=$view_helper->m62Lang('edit_storage_location')?> (<?=$view_helper->m62Lang($storage_engine['name'])?>)</h1>
<?php echo form_open('', array('id'=>'my_accordion', 'class' => 'settings'))?>

<fieldset class="col-group <?php echo (is_array($form_errors['storage_location_status']) ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
        <p><?php echo $view_helper->m62Lang($storage_engine['desc']); ?></p>
	</div>
	<div class="setting-field col w-8 last">
		<?php $this->load->view('storage/_submenu')?>
	</div>
</fieldset>

<br clear="all" />
<?php $this->load->view('storage/_form'); ?>

<fieldset class="form-ctrls">
		<?php echo form_submit(array('name' => 'submit', 'value' => $view_helper->m62Lang('edit_storage_location'), 'class' => 'btn', 'id' => 'm62_settings_submit'));?>
</fieldset>
<?php echo form_close()?>
</div>