<?php

	function theblogger_widgets_init()
	{
		register_sidebar(
			array(
				'id'            => 'theblogger_sidebar_1',
				'name'          => esc_html__('Blog Sidebar', 'theblogger'),
				'description'   => esc_html__('Add widgets.', 'theblogger'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'theblogger_sidebar_2',
				'name'          => esc_html__('Post Sidebar', 'theblogger'),
				'description'   => esc_html__('Add widgets.', 'theblogger'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'theblogger_sidebar_3',
				'name'          => esc_html__('Page Sidebar', 'theblogger'),
				'description'   => esc_html__('- Add widgets. - Select this sidebar in edit screen of a page to display it with this sidebar.', 'theblogger'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'theblogger_sidebar_15',
				'name'          => esc_html__('Portfolio Sidebar', 'theblogger'),
				'description'   => esc_html__('Select this sidebar in edit screen of your portfolio page. Also this sidebar can be used for portfolio categories and portfolio posts when activated from Customizer.', 'theblogger'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'theblogger_sidebar_16',
				'name'          => esc_html__('Shop Sidebar', 'theblogger'),
				'description'   => esc_html__('Enable sidebar for shop category page and single product page from Customizer > Sidebar.', 'theblogger'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'theblogger_sidebar_13',
				'name'          => esc_html__('Blog Featured Area', 'theblogger'),
				'description'   => esc_html__('Add Main Slider/Link Box/Intro widgets.', 'theblogger'),
				'before_widget' => "",
				'after_widget'  => "",
				'before_title'  => '<span style="display: none;">',
				'after_title'   => '</span>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'theblogger_sidebar_14',
				'name'          => esc_html__('Page Featured Area', 'theblogger'),
				'description'   => esc_html__('Add Main Slider/Link Box/Intro widgets.', 'theblogger'),
				'before_widget' => "",
				'after_widget'  => "",
				'before_title'  => '<span style="display: none;">',
				'after_title'   => '</span>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'theblogger_sidebar_17',
				'name'          => esc_html__('Portfolio Featured Area', 'theblogger'),
				'description'   => esc_html__('Add Main Slider/Link Box/Intro widgets.', 'theblogger'),
				'before_widget' => "",
				'after_widget'  => "",
				'before_title'  => '<span style="display: none;">',
				'after_title'   => '</span>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'theblogger_sidebar_18',
				'name'          => esc_html__('Shop Featured Area', 'theblogger'),
				'description'   => esc_html__('Add Main Slider/Link Box/Intro widgets.', 'theblogger'),
				'before_widget' => "",
				'after_widget'  => "",
				'before_title'  => '<span style="display: none;">',
				'after_title'   => '</span>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'theblogger_sidebar_4',
				'name'          => esc_html__('Header Social Media Icons', 'theblogger'),
				'description'   => esc_html__('Add Social Media Icon widget per icon.', 'theblogger'),
				'before_widget' => "",
				'after_widget'  => "",
				'before_title'  => '<span style="display: none;">',
				'after_title'   => '</span>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'theblogger_sidebar_8',
				'name'          => esc_html__('Author Social Media Icons', 'theblogger'),
				'description'   => esc_html__('Add Social Media Icon widget per icon.', 'theblogger'),
				'before_widget' => "",
				'after_widget'  => "",
				'before_title'  => '<span style="display: none;">',
				'after_title'   => '</span>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'theblogger_sidebar_5',
				'name'          => esc_html__('Footer Subscribe', 'theblogger'),
				'description'   => esc_html__('Add widget.', 'theblogger'),
				'before_widget' => "",
				'after_widget'  => "",
				'before_title'  => '<h3>',
				'after_title'   => '</h3>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'theblogger_sidebar_6',
				'name'          => esc_html__('Footer Instagram', 'theblogger'),
				'description'   => esc_html__('Add widget.', 'theblogger'),
				'before_widget' => "",
				'after_widget'  => "",
				'before_title'  => '<span style="display: none;">',
				'after_title'   => '</span>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'theblogger_sidebar_9',
				'name'          => esc_html__('Footer 1', 'theblogger'),
				'description'   => esc_html__('Add widgets.', 'theblogger'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'theblogger_sidebar_10',
				'name'          => esc_html__('Footer 2', 'theblogger'),
				'description'   => esc_html__('Add widgets.', 'theblogger'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'theblogger_sidebar_11',
				'name'          => esc_html__('Footer 3', 'theblogger'),
				'description'   => esc_html__('Add widgets.', 'theblogger'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'theblogger_sidebar_12',
				'name'          => esc_html__('Footer 4', 'theblogger'),
				'description'   => esc_html__('Add widgets.', 'theblogger'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'theblogger_sidebar_7',
				'name'          => esc_html__('Footer Copyright Text', 'theblogger'),
				'description'   => esc_html__('Add Text widget.', 'theblogger'),
				'before_widget' => "",
				'after_widget'  => "",
				'before_title'  => '<span style="display: none;">',
				'after_title'   => '</span>'
			)
		);
		
		
		$theblogger_sidebars_with_commas = get_option('theblogger_sidebars_with_commas');
		
		if ($theblogger_sidebars_with_commas != "")
		{
			$sidebars = preg_split("/[\s]*[,][\s]*/", $theblogger_sidebars_with_commas);
			
			foreach ($sidebars as $sidebar)
			{
				$sidebar_lowercase = strtolower($sidebar);
				$sidebar_id        = str_replace(" ", '_', $sidebar_lowercase); // Parameters: Old value, New value, String.
				
				register_sidebar(
					array(
						'id'            => $sidebar_id,
						'name'          => $sidebar,
						'description'   => esc_html__('Add widgets.', 'theblogger'),
						'before_widget' => '<aside id="%1$s" class="widget %2$s">',
						'after_widget'  => '</aside>',
						'before_title'  => '<h3 class="widget-title"><span>',
						'after_title'   => '</span></h3>'
					)
				);
			}
		}
	}
	
	add_action('widgets_init', 'theblogger_widgets_init');

?>