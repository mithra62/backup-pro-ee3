<h2  class="accordion"><?=$view_helper->m62Lang('rest_api_details')?></h2>
<input type="hidden" value="0" name="enable_rest_api" />

<p><?=$view_helper->m62Lang('rest_api_instructions')?></p>

<fieldset class="col-group">
	<div class="setting-txt col w-8">
		<h3><label for="rest_api_route_entry"><?php echo $view_helper->m62Lang('rest_api_route_entry'); ?></label></h3>
	</div>
	<div class="setting-field col w-8 "><a href="<?php echo $rest_api_route_entry; ?>" target="_blank"><?php echo $rest_api_route_entry; ?></a>
	</div>
</fieldset>

<fieldset class="col-group <?php echo ($form_errors['enable_rest_api'] ? 'invalid' : ''); ?>">
	<div class="setting-txt col w-8">
		<h3><label for="enable_rest_api"><?php echo $view_helper->m62Lang('enable_rest_api'); ?></label></h3>
		<em><?php echo $view_helper->m62Lang('enable_rest_api_instructions'); ?></em>
	</div>
	<div class="setting-field col w-8 ">
		<label class="choice mr <?php echo ($form_data['enable_rest_api'] == '1' ? 'chosen' : ''); ?>">
		  <?php echo form_checkbox('enable_rest_api', '1', $form_data['enable_rest_api'], 'id="enable_rest_api"'); ?>
		</label>
		<?php echo $view_helper->m62FormErrors($form_errors['enable_rest_api']); ?>
	</div>
</fieldset>

<div class="panel" id="rest_api_wrap" style="display:none; ">

    <h2  class="accordion"><?=$view_helper->m62Lang('rest_api_credentials')?></h2>
    <p><?=$view_helper->m62Lang('rest_api_credentials_instructions')?></p>
    
    <fieldset class="col-group required <?php echo ($form_errors['api_key'] ? 'invalid' : ''); ?>">
    	<div class="setting-txt col w-8">
    		<h3><label for="api_key"><?php echo $view_helper->m62Lang('api_key'); ?></label></h3>
    		<em><?php echo $view_helper->m62Lang('api_key_instructions'); ?></em>
    	</div>
    	<div class="setting-field col w-8">
    		<?php echo form_input('api_key', $form_data['api_key'], 'id="api_key"'); ?>
    		<?php echo $view_helper->m62FormErrors($form_errors['api_key']); ?>
    	</div>
    </fieldset>
    
    <fieldset class="col-group required <?php echo ($form_errors['api_secret'] ? 'invalid' : ''); ?>">
    	<div class="setting-txt col w-8">
    		<h3><label for="api_secret"><?php echo $view_helper->m62Lang('api_secret'); ?></label></h3>
    		<em><?php echo $view_helper->m62Lang('api_secret_instructions'); ?></em>
    	</div>
    	<div class="setting-field col w-8">
    		<?php echo form_input('api_secret', $form_data['api_secret'], 'id="api_secret"'); ?>
    		<?php echo $view_helper->m62FormErrors($form_errors['api_secret']); ?>
    	</div>
    </fieldset>
    
</div>