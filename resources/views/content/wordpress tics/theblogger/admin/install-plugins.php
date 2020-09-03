<?php

	require_once get_template_directory() . '/admin/class-tgm-plugin-activation.php';
	
	function theblogger_plugins()
	{
		$plugins = array( array('name'               => esc_html__('TheBlogger Shortcodes', 'theblogger'),
								'slug'               => 'theblogger-shortcodes',
								'source'             => get_template_directory() . '/admin/plugins/theblogger-shortcodes.zip',
								'version'            => '1.8',
								'required'           => true,
								'force_activation'   => false,
								'force_deactivation' => true,
								'external_url'       => "",
								'is_callable'        => ""),
						
						  array('name'               => esc_html__('TheBlogger Portfolio', 'theblogger'),
								'slug'               => 'theblogger-portfolio',
								'source'             => get_template_directory() . '/admin/plugins/theblogger-portfolio.zip',
								'version'            => '1.7',
								'required'           => false,
								'force_activation'   => false,
								'force_deactivation' => true,
								'external_url'       => "",
								'is_callable'        => ""),
						
						  array('name'               => esc_html__('ConvertPlus - Popup Plugin For WordPress', 'theblogger'),
								'slug'               => 'convertplug',
								'source'             => get_template_directory() . '/admin/plugins/convertplug.zip',
								'version'            => '3.2.0',
								'required'           => false,
								'force_activation'   => false,
								'force_deactivation' => true,
								'external_url'       => "",
								'is_callable'        => ""),
						
						  array('name'               => esc_html__('Easy Social Share Buttons for WordPress', 'theblogger'),
								'slug'               => 'easy-social-share-buttons3',
								'source'             => get_template_directory() . '/admin/plugins/easy-social-share-buttons3.zip',
								'version'            => '5.4',
								'required'           => false,
								'force_activation'   => false,
								'force_deactivation' => true,
								'external_url'       => "",
								'is_callable'        => ""),
						
						  array('name'     => esc_html__('One Click Demo Import', 'theblogger'),
								'slug'     => 'one-click-demo-import',
								'required' => false),
						
						  array('name'     => esc_html__('Regenerate Thumbnails', 'theblogger'),
								'slug'     => 'regenerate-thumbnails',
								'required' => false),
						
						  array('name'     => esc_html__('Loco Translate', 'theblogger'),
								'slug'     => 'loco-translate',
								'required' => false),
						
						  array('name'     => esc_html__('WP Instagram Widget', 'theblogger'),
								'slug'     => 'wp-instagram-widget',
								'required' => false),
						
						  array('name'     => esc_html__('Top 10 - Popular Posts', 'theblogger'),
								'slug'     => 'top-10',
								'required' => false),
						
						  array('name'     => esc_html__('I Recommend This', 'theblogger'),
								'slug'     => 'i-recommend-this',
								'required' => false),
						
						  array('name'     => esc_html__('MailChimp for WordPress', 'theblogger'),
								'slug'     => 'mailchimp-for-wp',
								'required' => false),
						
						  array('name'     => esc_html__('Selection Sharer', 'theblogger'),
								'slug'     => 'selection-sharer',
								'required' => false),
						
						  array('name'     => esc_html__('WPFront Scroll Top', 'theblogger'),
								'slug'     => 'wpfront-scroll-top',
								'required' => false));
		
		$config = array('id'           => 'theblogger_tgmpa',
						'default_path' => "",
						'menu'         => 'theblogger-install-plugins',
						'parent_slug'  => 'themes.php',
						'capability'   => 'edit_theme_options',
						'has_notices'  => true,
						'dismissable'  => true,
						'dismiss_msg'  => 'Install Plugins',
						'is_automatic' => true,
						'message'      => "",
						'strings'      => array('nag_type' => 'updated'));
		
		tgmpa($plugins, $config);
	}
	
	add_action('tgmpa_register', 'theblogger_plugins');

?>