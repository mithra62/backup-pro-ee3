
<div style="float: right;">
		<div class="filters">
			<ul>
				<li>
					<a class="has-sub" href=""><span class="faded">New Storage Location</span></a>
					<div class="sub-menu">
						<fieldset class="filter-search">
							<input type="text" value="" placeholder="filter channels">
						</fieldset>
						<ul>
                             <?php foreach($available_storage_engines AS $section): ?>
                             <li><a href="<?php echo ee('CP/URL', 'addons/settings/backup_pro/new_storage/'.$section['short_name']); ?>"><img src="<?php echo $theme_folder_url.'backup_pro/images/storage/'.$section['icon']; ?>.png" /> <?php echo $view_helper->m62Lang($section['name']); ?></a></li>
                             <?php endforeach; ?>							
						</ul>
					</div>
				</li>
			</ul>
		</div>
</div>