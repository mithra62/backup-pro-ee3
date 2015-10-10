<div class="bp_top_nav">
	<div class="bp_nav">
	
		<?php 
		foreach($menu_data AS $key => $value): ?>
		<span class="button"> 
			<a class="nav_button <?php echo ($method == $value['url'] ? 'current' : ''); ?>" href="<?php echo $url_base.$value['url']; ?>"><?php echo $view_helper->m62Lang($key.'_bp_dashboard_menu')?></a>
		</span>
		<?php endforeach; ?>	
			
	</div>
</div>