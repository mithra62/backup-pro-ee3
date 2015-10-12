<?php $this->load->view('_includes/_errors'); ?>

<?php echo form_open('', array('id'=>'bp3_settings_form', 'class' => 'settings'))?>
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
		$this->load->view('settings/_'.$section, array('settings' => $settings));
		break;

	default:
		$this->load->view('settings/_general');
		break;
}

?>
<fieldset class="form-ctrls">
		<?php echo form_submit(array('name' => 'submit', 'value' => $view_helper->m62Lang('update_settings'), 'class' => 'btn'));?>
</fieldset>
<?php echo form_close()?>