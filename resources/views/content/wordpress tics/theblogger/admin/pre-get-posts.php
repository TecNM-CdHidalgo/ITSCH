<?php

	function theblogger_pre_get_posts($query)
	{
		$sticky_posts = get_theme_mod('theblogger_setting_sticky_posts', 'exclude');
		
		if (($sticky_posts != 'include') && ($query->is_main_query()) && is_home() && (! is_admin()))
		{
			$query->set('post__not_in', get_option('sticky_posts'));
		}
	}
	
	add_action('pre_get_posts', 'theblogger_pre_get_posts');

?>