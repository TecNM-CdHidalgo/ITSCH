<?php
	if (isset($_GET['layout']))
	{
		if ($_GET['layout'] == 'circles')
		{
			get_template_part('layout', 'circles');
		}
		elseif ($_GET['layout'] == 'list')
		{
			get_template_part('layout', 'list');
		}
		elseif ($_GET['layout'] == 'grid')
		{
			get_template_part('layout', 'grid');
		}
		else
		{
			get_template_part('layout', 'regular');
		}
	}
	else
	{
		$layout = "";
		
		if (! have_posts())
		{
			$layout = 'Regular';
		}
		elseif (is_category())
		{
			$layout = get_theme_mod('theblogger_setting_layout_category', 'Grid');
		}
		elseif (is_tag())
		{
			$layout = get_theme_mod('theblogger_setting_layout_tag', 'Grid');
		}
		elseif (is_author())
		{
			$layout = get_theme_mod('theblogger_setting_layout_author', 'Grid');
		}
		elseif (is_date())
		{
			$layout = get_theme_mod('theblogger_setting_layout_date', 'Grid');
		}
		elseif (is_search())
		{
			$layout = get_theme_mod('theblogger_setting_layout_search', 'Grid');
		}
		else
		{
			$layout = get_theme_mod('theblogger_setting_layout_blog', 'Regular');
		}
		
		if (($layout == 'List') || ($layout == '1st Full + List'))
		{
			get_template_part('layout', 'list');
		}
		elseif (($layout == 'Grid') || ($layout == '1st Full + Grid'))
		{
			get_template_part('layout', 'grid');
		}
		elseif ($layout == 'Circles')
		{
			get_template_part('layout', 'circles');
		}
		else
		{
			get_template_part('layout', 'regular');
		}
	}
?>