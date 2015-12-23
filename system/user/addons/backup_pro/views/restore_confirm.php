<div class="box">
<?php $this->load->view('_includes/_errors'); ?>
<h1><?php echo $view_helper->m62Lang('backup_pro_module_name'); ?> / <?php echo $view_helper->m62Lang('restore_db'); ?></h1>
<div class="tbl-ctrls ">

<?php echo form_open(ee('CP/URL', 'addons/settings/backup_pro/restore_database'.AMP.'id='.urlencode($view_helper->m62Encode($backup['details_file_name']))), array('id'=>'backup_form')); ?>

    <div id="_restore_details_table">
        <p><?php echo $view_helper->m62Lang('restore_db_question'); ?></p>
        <p class="notice"><?php echo $view_helper->m62Lang('action_can_not_be_undone'); ?> <?php echo $view_helper->m62Lang('restore_double_speak'); ?></p>
        
        <?php 
        $this->table->set_heading('&nbsp;', '');
        if( $backup['note'] != '' )
        {
            $this->table->add_row(array('<strong>'.$view_helper->m62Lang('note').'</strong>', $backup['note']) );
        }
        $this->table->add_row(array('<strong>'.$view_helper->m62Lang('taken').'</strong>', $view_helper->m62DateTime($backup['created_date'])) );
        $this->table->add_row(array('<strong>'.$view_helper->m62Lang('backup_type').'</strong>', $view_helper->m62Lang($backup['database_backup_type'])));
        
        if( $backup['verified'] === 'success')
        {
           $verified = '<span class="success">'.$view_helper->m62Lang('yes').'</span>';
        }
        else
        {
           $verified = '<span class="notice">'.$view_helper->m62Lang('no').'</span>';
        }
        $this->table->add_row(array('<strong>'.$view_helper->m62Lang('verified').'</strong>', $verified));
        $this->table->add_row(array('<strong>'.$view_helper->m62Lang('time_taken').'</strong>', $view_helper->m62TimeFormat($backup['time_taken']) ));
        $this->table->add_row(array('<strong>'.$view_helper->m62Lang('max_memory').'</strong>', $view_helper->m62FileSize($backup['max_memory'])));
        $this->table->add_row(array('<strong>'.$view_helper->m62Lang('uncompressed_sql_size').'</strong>', $view_helper->m62FileSize($backup['uncompressed_size'])));
        $this->table->add_row(array('<strong>'.$view_helper->m62Lang('total_tables').'</strong>', $backup['item_count']));
        $this->table->add_row(array('<strong>'.$view_helper->m62Lang('md5_hash').'</strong>', $backup['hash']));
        echo $this->table->generate();
        $this->table->clear();
        ?>
    </div>

	<div id="restore_running_details"  style="display:none" >
		<div id="backup_instructions"><?php echo $view_helper->m62Lang('restore_in_progress_instructions'); ?>
		</div>			
		<br /><?php echo $view_helper->m62Lang('restore_in_progress'); ?>
	</div>

	<fieldset class="form-ctrls">
		<input class="btn submit" type="submit" value="<?php echo $view_helper->m62Lang('restore_db'); ?>" id="_ee3_restore_direct">
	</fieldset>		
<?php echo form_close()?>
</div>
</div>