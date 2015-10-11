<?php $this->load->view('_includes/_errors'); ?>
<?php $this->load->view('settings/_settings_nav'); ?>


<?php 

$tmpl = array (
	'table_open'          => '<table class="mainTable" border="0" cellspacing="0" cellpadding="0">',

	'row_start'           => '<tr class="even">',
	'row_end'             => '</tr>',
	'cell_start'          => '<td style="width:50%;">',
	'cell_end'            => '</td>',

	'row_alt_start'       => '<tr class="odd">',
	'row_alt_end'         => '</tr>',
	'cell_alt_start'      => '<td>',
	'cell_alt_end'        => '</td>',

	'table_close'         => '</table>'
);

$this->table->set_template($tmpl); 
$this->table->set_empty("&nbsp;");
?>
<div class="clear_left shun"></div>

<?php echo form_open($query_base.'settings', array('id'=>'my_accordion'))?>
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
<div class="tableFooter">
	<div class="tableSubmit">
		<?php echo form_submit(array('name' => 'submit', 'value' => $lang->__('update_settings'), 'class' => 'submit'));?>
	</div>
</div>	
<?php echo form_close()?>

<style>

#mainContent .pageContents {
    overflow: visible !important;
}
.group::after {
    visibility: visible !important;
}
</style>