<div class="box">
<?php $this->load->view('_includes/_errors'); ?>

<h1><?php echo $view_helper->m62Lang('backup_pro_module_name'); ?> / <?php echo $view_helper->m62Lang('files_bp_dashboard_menu'); ?></h1>
<div class="tbl-wrap tbl-ctrls">
<?php 
$this->table->set_heading(
	$view_helper->m62Lang('total_backups'), 
	$view_helper->m62Lang('total_space_used'), 
	array('data' => '<div style="float:right">'.$view_helper->m62Lang('last_backup_taken').'</div>', 'align' => 'right'), 
	array('data' => '<div style="float:right">'.$view_helper->m62Lang('first_backup_taken').'</div>', 'align' => 'right')
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
<div class="tbl-ctrls">
<?php echo form_open(ee('CP/URL', 'addons/settings/backup_pro/delete_backup_confirm'), array('id'=>'my_accordion')); ?>
		<input type="hidden" name="type" id="hidden_backup_type" value="files" />

<h2><?php echo $view_helper->m62Lang('file_backups').' ('.count($backups['files']).')'?></h2>
<div id="file_backups">
	<?php if(count($backups['files']) > 0): ?>
	<?php 

	$options = array('enable_editable_note' => 'yes', 'enable_delete' => true, 'backups' => $backups['files'], 'toggle_dir' => 'files', 'enable_actions' => 'yes', );
	$this->load->view('_includes/_backup_table', $options);	
	?>
	<?php else: ?>
		<div class="alert inline warn"><h3>Woops</h3>
		  <ul><li><?php echo $view_helper->m62Lang('no_file_backups')?> <a href="<?php echo $nav_links['nav_backup_files']; ?>"><?php echo $view_helper->m62Lang('would_you_like_to_backup_files_now')?></a></li></ul>
		</div>
	<?php endif; ?>	
</div>
<br />
<?php if(count($backups['files']) != '0'): ?>
		<fieldset class="tbl-bulk-act">
			<input class="btn submit" type="submit" value="<?php echo $view_helper->m62Lang('delete_selected'); ?>" name="_remove_backup_button" id="_remove_backup_button">
		</fieldset>	
<?php endif;?>
<?php echo form_close()?>
</div>
</div>