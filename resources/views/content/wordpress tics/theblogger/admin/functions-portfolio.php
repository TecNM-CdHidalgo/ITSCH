<?php

	// For Portfolio Page template and Portfolio Category pages.
	
	function theblogger_portfolio_page_layout()
	{
		$sidebar = "";
		
		if (is_page_template('page_template-portfolio.php'))
		{
			$sidebar = get_option('theblogger_select_page_sidebar' . '__' . get_the_ID(), 'No Sidebar'); // Portfolio page sidebar.
		}
		else
		{
			$sidebar = get_theme_mod('theblogger_setting_sidebar_portfolio_category', 'No'); // Portfolio category sidebar.
		}
		
		$page_layout = 'layout-medium';
		$page_layout = get_theme_mod('theblogger_setting_portfolio_page_layout', 'layout-medium');
		
		if (($page_layout == 'layout-fixed') && (($sidebar == 'Yes') || ($sidebar != 'No Sidebar')))
		{
			$page_layout = 'layout-medium';
		}
		
		$page_layout = esc_attr($page_layout);
		
		echo $page_layout;
	}

?>