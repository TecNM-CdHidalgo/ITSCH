<?php

	function theblogger_create_tabs($current = 'customizer')
	{
		$tabs = array(
			'customizer'   => 'Customizer',
			'widget-areas' => 'Widget Areas',
			'support'      => 'Support'
		);
		
		?>
			<h1>Theme Options</h1>
			
			<h2 class="nav-tab-wrapper">
				<?php
					foreach ($tabs as $tab => $name)
					{
						$class = ($tab == $current) ? ' nav-tab-active' : "";
						
						echo "<a class='nav-tab$class' href='?page=theblogger-theme-options&tab=$tab'>$name</a>";
					}
				?>
			</h2>
		<?php
	}


/* ============================================================================================================================================ */


	function theblogger_theme_options_page()
	{
		global $pagenow;
		
		?>
			<div class="wrap wrap2">
				<div class="status">
					<img alt="..." src="<?php echo get_template_directory_uri(); ?>/admin/ajax-loader.gif">
					
					<strong></strong>
				</div>
				
				<?php
					if ( isset( $_GET['tab'] ) )
					{
						theblogger_create_tabs($_GET['tab']);
					}	
					else
					{
						theblogger_create_tabs('customizer');
					}
				?>
				
				<div id="poststuff">
					<?php
						// theme options page
						if ( $pagenow == 'themes.php' && $_GET['page'] == 'theblogger-theme-options' )
						{
							// tab from url
							if ( isset( $_GET['tab'] ) )
							{
								$tab = $_GET['tab'];
							}
							else
							{
								$tab = 'customizer'; 
							}
							
							switch ($tab)
							{
								case 'customizer' :
									
									if (esc_attr( @$_GET['saved'] ) == 'true')
									{
										echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<?php
													$theblogger_admin_url = admin_url( 'themes.php?page=theblogger-theme-options' );
												?>
												<form method="post" class="ajax-form" action="<?php echo esc_url( $theblogger_admin_url ); ?>">
													<?php
														wp_nonce_field("settings-page");
													?>
													<table>
														<tr>
															<td class="option-left">
																<?php
																	echo '<a class="button button-primary button-hero" href="' . esc_url(admin_url('customize.php')) . '">Customize Your Site</a>';
																?>
															</td>
															<td class="option-right">
																The Customizer allows you to preview changes to your site before publishing them.
															</td>
														</tr>
													</table>
												</form>
											</div> <!-- .inside -->
										</div> <!-- .postbox -->
									<?php
								break;
								
								case 'widget-areas' :
								
									if (esc_attr(@$_GET['saved']) == 'true')
									{
										$theblogger_no_sidebar_name = get_option('theblogger_no_sidebar_name');
										
										if ($theblogger_no_sidebar_name == "")
										{
											echo '<div class="updated notice is-dismissible">
													<p>Enter text for a new widget area name.</p>
												  </div>';
										}
										else
										{
											echo '<div class="updated notice is-dismissible">
													<p>Widget area created.</p>
												  </div>';
										}
									}
									elseif (esc_attr(@$_GET['deleted']) == 'true')
									{
										delete_option('theblogger_sidebars_with_commas');
										
										echo '<div class="updated notice is-dismissible">
												<p>Widget areas deleted.</p>
											  </div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<?php
													$theblogger_admin_url = admin_url('themes.php?page=theblogger-theme-options&tab=widget-areas');
												?>
												<form method="post" action="<?php echo esc_url($theblogger_admin_url); ?>">
													<?php
														wp_nonce_field( "settings-page" );
													?>
													<table>
														<tr>
															<td class="option-left">
																<h4>New Widget Area</h4>
																<input type="text" name="theblogger_new_sidebar_name" required="required" style="width: 100%;" value="">
															</td>
															<td class="option-right">
																Enter text for a new widget area name.
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<input type="submit" name="submit" class="button button-primary button-large" value="Create">
																<input type="hidden" name="settings-submit" value="Y">
															</td>
															<td class="option-right">
																Create new widget area.
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<h4>Widget Areas</h4>
																<select name="sidebars" style="width: 100%;" size="10" disabled="disabled">
																	<?php
																		$theblogger_sidebars_with_commas = get_option( 'theblogger_sidebars_with_commas' );
																		
																		if ( $theblogger_sidebars_with_commas != "" )
																		{
																			$sidebars = preg_split("/[\s]*[,][\s]*/", $theblogger_sidebars_with_commas);

																			foreach ( $sidebars as $sidebar_name )
																			{
																				echo '<option>' . $sidebar_name . '</option>';
																			}
																		}
																	?>
																</select>
															</td>
															<td class="option-right">
																New widget area name must be different from created widget area names.
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<?php
																	$theblogger_admin_url = admin_url( 'themes.php?page=theblogger-theme-options&tab=widget-areas&deleted=true' );
																?>
																<a class="button button-large" style="margin-top: 20px;" href="<?php echo esc_url( $theblogger_admin_url ); ?>">Delete</a>
															</td>
															<td class="option-right">
																Remove widget areas.
															</td>
														</tr>
													</table>
												</form>
											</div> <!-- .inside -->
										</div> <!-- .postbox -->
									<?php
								break;
								
								case 'support' :
									
									if (esc_attr( @$_GET['saved'] ) == 'true')
									{
										echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<?php
													$theblogger_admin_url = admin_url( 'themes.php?page=theblogger-theme-options' );
												?>
												<form method="post" class="ajax-form" action="<?php echo esc_url($theblogger_admin_url); ?>">
													<?php
														wp_nonce_field("settings-page");
													?>
													<table>
														<tr>
															<td class="option-left">
																<h4>Need Help?</h4>
																<a class="button button-primary" style="margin-top: 0px;" target="_blank" href="http://www.pixelwars.org/forums/">View Support Forum</a>
															</td>
															<td class="option-right">
																Got something to say?
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<h4>Documentation</h4>
																<a class="button" target="_blank" href="https://themeforest.net/downloads">Get Documentation</a>
															</td>
															<td class="option-right">
																Theme documentation is in the package. You can find it on ThemeForest in your downloads menu.
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<h4>Rate Theme</h4>
																<a class="button" target="_blank" href="http://themeforest.net/user/pixelwars/portfolio">Rate on ThemeForest</a>
															</td>
															<td class="option-right">
																If you liked the theme you can rate it on ThemeForest in your downloads menu.
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<h4>Follow Us</h4>
																<a class="button" target="_blank" href="http://themeforest.net/user/pixelwars/follow">Follow us on ThemeForest</a>
																<br>
																<br>
																<a class="button" target="_blank" href="https://www.facebook.com/pixelwarsdesign/">Follow us on Facebook</a>
																<br>
																<br>
																<a class="button" target="_blank" href="https://twitter.com/pixelwarsdesign">Follow us on Twitter</a>
																<br>
																<br>
																<a class="button" target="_blank" href="https://www.instagram.com/pixelwarsdesign/">Follow us on Instagram</a>
																<br>
																<br>
																<a class="button" target="_blank" href="https://www.youtube.com/c/pixelwarsdesign">Follow us on YouTube</a>
															</td>
															<td class="option-right">
																Follow us and don't miss new upcoming premium themes.
															</td>
														</tr>
													</table>
												</form>
											</div> <!-- .inside -->
										</div> <!-- .postbox -->
									<?php
								break;
							}
						}
					?>
				</div> <!-- #poststuff -->
			</div> <!-- .wrap .wrap2 -->
		<?php
	}


/* ============================================================================================================================================ */


	function theblogger_theme_save_settings()
	{
		global $pagenow;
		
		if ( $pagenow == 'themes.php' && $_GET['page'] == 'theblogger-theme-options' )
		{
			if ( isset ( $_GET['tab'] ) )
			{
				$tab = $_GET['tab'];
			}
			else
			{
				$tab = 'customizer';
			}
			
			
			switch ( $tab )
			{
				case 'customizer' :
				
					// ...
				
				break;
				
				case 'widget-areas' :
				
					update_option( 'theblogger_no_sidebar_name', esc_attr( $_POST['theblogger_new_sidebar_name'] ) );
					
					if ( esc_attr( $_POST['theblogger_new_sidebar_name'] ) != "" )
					{
						$theblogger_sidebars_with_commas = get_option( 'theblogger_sidebars_with_commas', "" );
						
						if ( $theblogger_sidebars_with_commas == "" )
						{
							update_option( 'theblogger_sidebars_with_commas', esc_attr( $_POST['theblogger_new_sidebar_name'] ) );
						}
						else
						{
							update_option( 'theblogger_sidebars_with_commas', get_option( 'theblogger_sidebars_with_commas' ) . ',' . esc_attr( $_POST['theblogger_new_sidebar_name'] ) );
						}
					}
				
				break;
			}
		}
	}


/* ============================================================================================================================================ */


	function theblogger_load_settings_page()
	{
		if ( isset( $_POST["settings-submit"] ) == 'Y' )
		{
			check_admin_referer( "settings-page" );
			theblogger_theme_save_settings();
			$url_parameters = isset( $_GET['tab'] ) ? 'tab=' . $_GET['tab'] . '&saved=true' : 'saved=true';
			wp_redirect( admin_url( 'themes.php?page=theblogger-theme-options&' . $url_parameters ) );
			exit;
		}
	}


/* ============================================================================================================================================ */


	function theblogger_theme_menu()
	{
		$settings_page = add_theme_page('Theme Options',
										'Theme Options',
										'edit_theme_options',
										'theblogger-theme-options',
										'theblogger_theme_options_page' );
		
		add_action( "load-{$settings_page}", 'theblogger_load_settings_page' );
	}
	
	add_action( 'admin_menu', 'theblogger_theme_menu' );

?>