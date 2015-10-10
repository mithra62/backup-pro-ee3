<div class="bp_top_nav">
	<div class="bp_nav">

		<span class="button"> 
			<a class="nav_button <?php echo ($section == 'general' ? 'current' : ''); ?>" href="<?php echo $url_base.'settings&section=general'; ?>">General</a>
		</span>
		<span class="button"> 
			<a class="nav_button <?php echo ($section == 'db' ? 'current' : ''); ?>" href="<?php echo $url_base.'settings&section=db'; ?>">Database Backup</a>
		</span>
		<span class="button"> 
			<a class="nav_button <?php echo ($section == 'files' ? 'current' : ''); ?>" href="<?php echo $url_base.'settings&section=files'; ?>">File Backup</a>
		</span>
		<span class="button"> 
			<a class="nav_button <?php echo ($section == 'cron' ? 'current' : ''); ?>" href="<?php echo $url_base.'settings&section=cron'; ?>">Cron Backup</a>
		</span>
		<span class="button"> 
			<a class="nav_button <?php echo ($section == 'storage' ? 'current' : ''); ?>" href="<?php echo $url_base.'view_storage'; ?>">Storage Locations</a>
		</span>
		<span class="button"> 
			<a class="nav_button <?php echo ($section == 'integrity_agent' ? 'current' : ''); ?>" href="<?php echo $url_base.'settings&section=integrity_agent'; ?>">Integrity Agent</a>
		</span>
		<span class="button"> 
			<a class="nav_button <?php echo ($section == 'license' ? 'current' : ''); ?>" href="<?php echo $url_base.'settings&section=license'; ?>">License Details</a>
		</span>			
	</div>
</div>