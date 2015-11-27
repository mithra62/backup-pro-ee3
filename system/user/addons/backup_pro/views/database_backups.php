<div class="box">

<?php $this->load->view('_includes/_errors'); ?>

<h1><?php echo $view_helper->m62Lang('backup_pro_module_name'); ?> / <?php echo $view_helper->m62Lang('db_bp_dashboard_menu'); ?></h1>
<div class="tbl-wrap tbl-ctrls">
<?php 
$this->table->set_heading(
	$view_helper->m62Lang('total_backups'), 
	$view_helper->m62Lang('total_space_used'), 
	array('data' => '<div style="float:right">'.$view_helper->m62Lang('last_backup_taken').'</div>', 'align' => 'right'), 
	array('data' => '<div style="float:right">'.$view_helper->m62Lang('first_backup_taken').'</div>', 'align' => 'right')
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
<div class="tbl-ctrls">
<?php echo form_open(ee('CP/URL', 'addons/settings/backup_pro/delete_backup_confirm'), array('id'=>'backup_form')); ?>
		<input type="hidden" name="type" id="hidden_backup_type" value="database" />	

<h2><?=$view_helper->m62Lang('database_backups').' ('.count($backups['database']).')';?></h2>
<div id="database_backups">
	<?php 
if(count($backups['database']) > 0): 


	$options = array('enable_editable_note' => 'yes', 'enable_actions' => 'yes', 'enable_delete' => 'yes', 'backups' => $backups['database']);
	$this->load->view('_includes/_backup_table', $options);

	?>
	<?php else: ?>
		<div class="alert inline warn"><h3>Woops</h3>
		  <ul><li><?php echo $view_helper->m62Lang('no_database_backups')?> <a href="<?php echo $nav_links['nav_backup_db']; ?>"><?php echo $view_helper->m62Lang('would_you_like_to_backup_database_now')?></a></li></ul>
		</div>
	<?php endif; ?>
</div>

<?php if(count($backups['database']) != '0'): ?>
		<fieldset class="tbl-bulk-act">
			<input class="btn submit" type="submit" value="<?php echo $view_helper->m62Lang('delete_selected'); ?>">
		</fieldset>
<?php endif;?>
<?php echo form_close()?>
</div>
</div>