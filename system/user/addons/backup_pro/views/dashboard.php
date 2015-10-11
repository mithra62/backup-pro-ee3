<?php $this->load->view('_includes/_errors'); ?>
<?php $this->load->view('_includes/_backups_submenu'); ?>
<br clear="all" />
<?php 
echo $view_helper->m62Lang('module_instructions'); ?>

<div class="clear_left shun"></div>
<div>
<?php 

$space_available_header = $view_helper->m62Lang('total_space_available');
if($settings['auto_threshold'] != '0')
{
	$space_available_header .= ' ('.$available_space['available_percentage'].'%)';
}

$this->table->set_heading(
	$view_helper->m62Lang('total_backups'), 
	$view_helper->m62Lang('total_space_used'),
	$space_available_header, 
	array('data' => $view_helper->m62Lang('last_backup_taken'), 'align' => 'right'), 
	array('data' => $view_helper->m62Lang('first_backup_taken'), 'align' => 'right')
);
$data = array(
	array('data' => $backup_meta['global']['total_backups'], 'width' => 80), 
	array('data' => $backup_meta['global']['total_space_used'], 'width' => 150), 
	array('data' => ($settings['auto_threshold'] == '0' ? $view_helper->m62Lang('unlimited') : $available_space['available_space'].' / '.$available_space['max_space'])),
	array('data' => ($backup_meta['global']['newest_backup_taken'] != '' ? $view_helper->m62DateTime($backup_meta['global']['newest_backup_taken']) : $view_helper->m62Lang('na')), 'width' => 150, 'align' => 'right'),
	array('data' => ($backup_meta['global']['oldest_backup_taken'] != '' ? $view_helper->m62DateTime($backup_meta['global']['oldest_backup_taken']) : $view_helper->m62Lang('na')), 'width' => 150, 'align' => 'right')
);
$this->table->add_row($data);
echo $this->table->generate();
$this->table->clear();
?>
</div>
<div class="clear_left shun"></div>

<?php echo form_open($query_base, array('id'=>'my_accordion')); ?>

<table width="100%">
	<tr>
		<td width="50%">
		<?php 
		$this->table->set_heading(array('data' => $view_helper->m62Lang('database_backups'), 'width' => '50%'),' ');
		$this->table->add_row('<strong>'.$view_helper->m62Lang('total_backups').'</strong>', $backup_meta['database']['total_backups']);
		$this->table->add_row('<strong>'.$view_helper->m62Lang('total_space_used').'</strong>', $backup_meta['database']['total_space_used']);
		$this->table->add_row('<strong>'.$view_helper->m62Lang('last_backup_taken').'</strong>', ($backup_meta['database']['newest_backup_taken'] != '' ? $view_helper->m62DateTime($backup_meta['database']['newest_backup_taken']) : $view_helper->m62Lang('na')));

		echo $this->table->generate();
		// Clear out of the next one
		$this->table->clear();		
		?>
		</td>
		<td valign="top">
		<?php 
		$this->table->set_heading(array('data' =>$view_helper->m62Lang('file_backups'), 'width' => '50%'),' ');
		$this->table->add_row('<strong>'.$view_helper->m62Lang('total_backups').'</strong>', $backup_meta['files']['total_backups']);
		$this->table->add_row('<strong>'.$view_helper->m62Lang('total_space_used').'</strong>', $backup_meta['files']['total_space_used']);
		$this->table->add_row('<strong>'.$view_helper->m62Lang('last_backup_taken').'</strong>', ($backup_meta['files']['newest_backup_taken'] != '' ? $view_helper->m62DateTime($backup_meta['files']['newest_backup_taken']) : $view_helper->m62Lang('na')));

		echo $this->table->generate();
		// Clear out of the next one
		$this->table->clear();		
		?>
		</td>
	</tr>
</table>
<h3  class="accordion"><?=$view_helper->m62Lang('recent_backups').' ('.count($backups).')';?></h3>
<div id="backups">
	<?php 
		if(count($backups) > 0):
			$options = array('enable_type' => 'yes', 'enable_editable_note' => 'yes', 'enable_actions' => 'yes', 'enable_delete' => 'no');
			$this->load->view('_includes/_backup_table', $options);
	?>
	<?php else: ?>
		<div class="no_backup_found"><?php echo $view_helper->m62Lang('no_backups_exist')?> <a href="<?php echo $nav_links['backup_db']; ?>"><?php echo $view_helper->m62Lang('would_you_like_to_backup_database_now')?></a></div>
	<?php endif; ?>
</div>

<?php echo form_close()?>