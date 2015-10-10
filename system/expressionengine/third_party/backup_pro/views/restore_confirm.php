<?php $this->load->view('_includes/_errors'); ?>
<?php $this->load->view('_includes/_backups_submenu'); ?>
<br clear="all" />
	
<h2><?php echo $view_helper->m62Lang('restore_db'); ?></h2>

<p><?php echo $view_helper->m62Lang('restore_db_question'); ?></p>
<p class="notice"><?php echo $view_helper->m62Lang('action_can_not_be_undone'); ?> <?php echo $view_helper->m62Lang('restore_double_speak'); ?></p>

<p>
	<strong><?php echo $view_helper->m62Lang('taken'); ?>:</strong> <?php echo $view_helper->m62DateTime($backup['created_date']); ?> <br />
	<strong><?php echo $view_helper->m62Lang('backup_type'); ?>:</strong> <?php echo $view_helper->m62Lang($backup['database_backup_type']); ?><br />
	<strong><?php echo $view_helper->m62Lang('verified'); ?>:</strong> 
		<?php if( $backup['verified'] == 'success'): ?>
			<span class="success"><?php echo $view_helper->m62Lang('yes'); ?></span>
		<?php else: ?>
			<span class="notice"><?php echo $view_helper->m62Lang('no'); ?></span>
		<?php endif; ?> <br />
	<strong><?php echo $view_helper->m62Lang('time_taken'); ?>:</strong> <?php echo number_format($backup['time_taken'], 2, '.', ','); ?>s <br />
	<strong><?php echo $view_helper->m62Lang('max_memory'); ?>:</strong> <?php echo $view_helper->m62FileSize($backup['max_memory']); ?> <br />
	<strong><?php echo $view_helper->m62Lang('uncompressed_sql_size'); ?>:</strong> <?php echo $view_helper->m62FileSize($backup['uncompressed_size']); ?> <br />
	<strong><?php echo $view_helper->m62Lang('total_tables'); ?>:</strong> <?php echo $backup['item_count']; ?><br />
	<strong><?php echo $view_helper->m62Lang('md5_hash'); ?>:</strong> <?php echo $backup['hash']; ?>
</p>

<?php echo form_open($query_base.'restore_database&id='.urlencode($view_helper->m62Encode($backup['details_file_name'])), array('id'=>'backup_form')); ?>

	<div class="buttons">
		<input type="submit" value="<?php echo $view_helper->m62Lang('restore'); ?>" class="btn submit" >
	</div>
<?php echo form_close()?>