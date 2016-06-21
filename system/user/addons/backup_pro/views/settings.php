<div class="box">
<?php $this->load->view('_includes/_errors'); ?>

<h1><?php echo $view_helper->m62Lang('backup_pro_module_name'); ?> / <?php echo $view_helper->m62Lang('nav_backup_pro_settings'); ?></h1>
<?php echo form_open('', array('id'=>'bp3_settings_form', 'class' => 'settings'))?>

<?php 
if( $form_has_errors ):   
?>
<div class="alert inline issue">
	<h3>Woops!</h3>
	<p>Looks like we have an issue...</p>
</div>
<?php endif; ?>


<input type="hidden" value="yes" name="go_settings" />
<input type="hidden" value="<?php echo $section; ?>" name="section" />
<?php 
switch($section)
{
	case 'cron':
	case 'db':
	case 'files':
	case 'license':
	case 'integrity_agent':
	case 'api':
		$this->load->view('settings/_'.$section, array('settings' => $settings));
		break;

	default:
		$this->load->view('settings/_general');
		break;
}

?>
<fieldset class="form-ctrls">
		<?php echo form_submit(array('name' => 'submit', 'value' => $view_helper->m62Lang('update_settings'), 'class' => 'btn', 'id' => 'm62_settings_submit'));?>
</fieldset>
<?php echo form_close()?>
</div>