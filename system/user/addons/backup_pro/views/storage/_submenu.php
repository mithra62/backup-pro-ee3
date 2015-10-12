
<div style="float: right;">
<select name="NewStorageDropdown" id="NewStorageDropdown" >
     <option value="0">New Storage Location</option>
     <?php foreach($available_storage_engines AS $section): ?>
     <option data-imagesrc="<?php echo $theme_folder_url.'backup_pro/images/storage/'.$section['icon']; ?>.png" 
             value="<?php echo ee('CP/URL', 'addons/settings/backup_pro/new_storage/'.$section['short_name']); ?>"><?php echo $view_helper->m62Lang($section['name']); ?></option>
     <?php endforeach; ?>
</select>
</div>