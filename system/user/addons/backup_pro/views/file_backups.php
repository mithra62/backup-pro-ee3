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
	array('data' => $backup_meta['files']['total_backups'], 'width' => 80), 
	array('data' => $backup_meta['files']['total_space_used'], 'width' => 150), 
	array('data' => ($backup_meta['files']['newest_backup_taken'] != '' ? $view_helper->m62DateTime($backup_meta['files']['newest_backup_taken']) : $view_helper->m62Lang('na')), 'width' => 150, 'align' => 'right'),
	array('data' => ($backup_meta['files']['oldest_backup_taken'] != '' ? $view_helper->m62DateTime($backup_meta['files']['oldest_backup_taken']) : $view_helper->m62Lang('na')), 'width' => 150, 'align' => 'right')
);
$this->table->add_row($data);
echo $this->table->generate();
$this->table->clear();
?>
</div>
<div class="clear_left shun"></div>

<?php echo form_open($query_base.'delete_backup_confirm', array('id'=>'my_accordion')); ?>
		<input type="hidden" name="type" id="hidden_backup_type" value="files" />

<h3  class="accordion"><?php echo $view_helper->m62Lang('file_backups').' ('.count($backups['files']).')'?></h3>
<div id="file_backups">
	<?php if(count($backups['files']) > 0): ?>
	<?php 

	$options = array('enable_editable_note' => 'yes', 'enable_delete' => true, 'backups' => $backups['files'], 'toggle_dir' => 'files', 'enable_actions' => 'yes', );
	$this->load->view('_includes/_backup_table', $options);	
	?>
	<?php else: ?>
		<div class="no_backup_found"><?php echo $view_helper->m62Lang('no_file_backups')?> <a href="<?php echo $nav_links['backup_files']; ?>"><?php echo $view_helper->m62Lang('would_you_like_to_backup_now')?></a></div>
	<?php endif; ?>	
</div>
<br />
<?php if(count($backups['files']) != '0'): ?>
<div class="tableFooter">
	<div class="tableSubmit">
		<?php echo form_submit(array('name' => 'submit', 'value' => $view_helper->m62Lang('delete_selected'), 'class' => 'submit'));?>
	</div>
</div>	
<?php endif;?>
<?php echo form_close()?>