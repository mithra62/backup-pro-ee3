<div class="box">
    <div class="col-group">
        <div class="col w-16">
            <?php $this->load->view('_includes/_errors'); ?>
            	
            	<h1><?php echo $view_helper->m62Lang('remove_storage_location'); ?> (<?php echo $storage_details['storage_location_name']; ?>)</h1>        	
                	<?php echo form_open('', array('id'=>'my_accordion', 'class' => 'settings'))?>
                    <fieldset class="col-group">
                    	<div class="setting-txt col w-8">
                            <p><?php echo $view_helper->m62Lang($storage_engine['desc']); ?></p>
                    	</div>
                    	<div class="setting-field col w-8 last">
                    		<?php $this->load->view('storage/_submenu')?>
                    	</div>
                    </fieldset>
                <div class="tbl-ctrls">
                    <p><?php echo $view_helper->m62Lang('delete_storage_confirm'); ?></p>
                    
                    <p class="notice"><?php echo $view_helper->m62Lang('action_can_not_be_undone'); ?></p>   
                    
                    <p><?php echo $storage_details['storage_location_name']; ?></p> 
                    <fieldset class="form-ctrls">
                    		<?php echo form_submit(array('name' => 'submit', 'value' => $view_helper->m62Lang('remove_storage_location'), 'class' => 'btn'));?>
                    </fieldset>
            	<?php echo form_close()?>
            </div>
        </div>
    </div>
</div>           