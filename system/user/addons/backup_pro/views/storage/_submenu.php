<div style="float:left">
<?php $this->load->view('settings/_settings_nav'); ?>
</div>

<div style="float: right;">
<select name="NewStorageDropdown" id="NewStorageDropdown" >
     <option value="0">New Storage Location</option>
     <?php foreach($available_storage_engines AS $section): ?>
     <option data-imagesrc="<?php echo $theme_folder_url.'backup_pro/images/storage/'.$section['icon']; ?>.png" 
             value="<?php echo $url_base.'new_storage&engine='.$section['short_name']; ?>"><?php echo $view_helper->m62Lang($section['name']); ?></option>
     <?php endforeach; ?>
</select>
</div>