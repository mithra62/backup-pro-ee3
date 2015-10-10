<?php $this->load->view('_includes/_errors'); ?>
<?php $this->load->view('_includes/_backups_submenu'); ?>
<br clear="all" />
<?php 
echo $view_helper->m62Lang('module_instructions'); ?>
<div class="clear_left shun"></div>
<div>
<?php 
$this->table->set_heading(
	$view_helper->m62Lang('total_backups'), 
	$view_helper->m62Lang('total_space_used'), 
	array('data' => $view_helper->m62Lang('last_backup_taken'), 'align' => 'right'), 
	array('data' => $view_helper->m62Lang('first_backup_taken'), 'align' => 'right')
);
$data = array(
	array('data' => $backup_meta['database']['total_backups'], 'width' => 10), 
	array('data' => $backup_meta['database']['total_space_used'], 'width' => 150), 
	array('data' => ($backup_meta['database']['newest_backup_taken'] != '' ? $view_helper->m62DateTime($backup_meta['database']['newest_backup_taken']) : $view_helper->m62Lang('na')), 'width' => 150, 'align' => 'right'),
	array('data' => ($backup_meta['database']['oldest_backup_taken'] != '' ? $view_helper->m62DateTime($backup_meta['database']['oldest_backup_taken']) : $view_helper->m62Lang('na')), 'width' => 150, 'align' => 'right')
);
$this->table->add_row($data);
echo $this->table->generate();
$this->table->clear();
?>
</div>
<div class="clear_left shun"></div>

<?php echo form_open($query_base.'delete_backup_confirm', array('id'=>'backup_form')); ?>
		<input type="hidden" name="type" id="hidden_backup_type" value="database" />	

<h3  class="accordion"><?=$view_helper->m62Lang('database_backups').' ('.count($backups['database']).')';?></h3>
<div id="database_backups">
	<?php 
if(count($backups['database']) > 0): 


	$options = array('enable_editable_note' => 'yes', 'enable_actions' => 'yes', 'enable_delete' => 'yes', 'backups' => $backups['database']);
	$this->load->view('_includes/_backup_table', $options);

	?>
	<?php else: ?>
		<div class="no_backup_found"><?php echo $view_helper->m62Lang('no_database_backups')?> <a href="<?php echo $nav_links['backup_db']; ?>"><?php echo $view_helper->m62Lang('would_you_like_to_backup_now')?></a></div>
	<?php endif; ?>
</div>

<?php if(count($backups['database']) != '0'): ?>
<div class="tableFooter">
	<div class="tableSubmit">
		<?php echo form_submit(array('name' => 'submit', 'value' => $view_helper->m62Lang('delete_selected'), 'class' => 'submit', 'id' => 'submit_button'));?>
	</div>
</div>	
<?php endif;?>
<?php echo form_close()?>