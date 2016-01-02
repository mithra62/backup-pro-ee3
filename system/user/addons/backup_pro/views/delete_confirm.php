<div class="box">
    <div class="col-group">
        <div class="col w-16">
        <?php $this->load->view('_includes/_errors'); ?>
        <h1><?php echo $view_helper->m62Lang('delete_backup'); ?> ( <?php echo count($backups); ?> )</h1>
        
        <div class="tbl-ctrls">
            <p><?php echo $view_helper->m62Lang('delete_backup_confirm'); ?></p>
            
            <p class="notice"><?php echo $view_helper->m62Lang('action_can_not_be_undone'); ?></p>
            <?php echo form_open(ee('CP/URL', 'addons/settings/backup_pro/delete_backups'), array('id'=>'backup_form')); ?>
            	<input type="hidden" value="<?php echo $backup_type; ?>" name="type" />
            	
            	<?php 
            	$options = array('enable_type' => 'yes', 'enable_editable_note' => 'no', 'enable_actions' => 'no', 'enable_delete' => 'no');
            	$this->load->view('_includes/_backup_table', $options);
            	?>
            	
            		<fieldset class="tbl-bulk-act">
            			<input class="btn submit" type="submit" value="<?php echo $view_helper->m62Lang('delete'); ?>" name="_remove_backup_button" id="_remove_backup_button">
            		</fieldset>		
            
            <?php echo form_close()?>
            </div>
        </div>
    </div>
</div>