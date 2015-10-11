<?php $this->load->view('_includes/_errors'); ?>
<?php $this->load->view('_includes/_backups_submenu'); ?>
<br clear="all" />

<h3><?php echo $view_helper->m62Lang('delete_backup'); ?> ( <?php echo count($backups); ?> )</h3>

<p><?php echo $view_helper->m62Lang('delete_backup_confirm'); ?></p>

<p class="notice"><?php echo $view_helper->m62Lang('action_can_not_be_undone'); ?></p>
<?php echo form_open($query_base.'delete_backups', array('id'=>'backup_form')); ?>
	<input type="hidden" value="<?php echo $backup_type; ?>" name="type" />
	
	<?php 
	$options = array('enable_type' => 'yes', 'enable_editable_note' => 'no', 'enable_actions' => 'no', 'enable_delete' => 'no');
	$this->load->view('_includes/_backup_table', $options);
	?>

	<div class="buttons right">
		<input type="submit" value="<?php echo $view_helper->m62Lang('delete'); ?>" class="btn submit" >
	</div>

<?php echo form_close()?>