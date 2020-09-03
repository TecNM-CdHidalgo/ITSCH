<?php
	get_header();
?>

<?php
	global $theblogger_sidebar;
	theblogger_sidebar_yes_no();
?>

<?php
	theblogger_featured_area();
?>

<?php
	function theblogger_featured_media($theblogger_1st_full, $theblogger_grid_type)
	{
		$browser_address_url = stripcslashes(get_option(get_the_ID() . 'theblogger_featured_video_url'));
		$browser_address_url = trim($browser_address_url); // Strip whitespace (or other characters) from the beginning and end of the string.
		
		if (! empty($browser_address_url))
		{
			?>
				<div class="featured-image">
					<?php
						$browser_address_url__type_youtube    = strpos($browser_address_url, 'youtube.com');
						$browser_address_url__type_vimeo      = strpos($browser_address_url, 'vimeo.com');
						$browser_address_url__type_soundcloud = strpos($browser_address_url, 'soundcloud.com');
						
						if ($browser_address_url__type_youtube !== false)
						{
							$xml_url 	   = 'http://www.youtube.com/oembed?url=' . $browser_address_url . '&format=xml';
							$xml_content   = simplexml_load_file($xml_url);
							$xml_attribute = $xml_content->html; // Get iframe.
							echo $xml_attribute;
						}
						elseif ($browser_address_url__type_vimeo !== false)
						{
							$xml_url 	   = 'http://vimeo.com/api/oembed.xml?url=' . $browser_address_url;
							$xml_content   = simplexml_load_file($xml_url);
							$xml_attribute = $xml_content->html; // Get iframe.
							echo $xml_attribute;
						}
						elseif ($browser_address_url__type_soundcloud !== false)
						{
							$xml_url 	   = 'http://soundcloud.com/oembed?url=' . $browser_address_url;
							$xml_content   = simplexml_load_file($xml_url);
							$xml_attribute = $xml_content->html; // Get iframe.
							echo $xml_attribute;
						}
					?>
				</div> <!-- .featured-image -->
			<?php
		}
		elseif (has_post_thumbnail())
		{
			?>
				<div class="featured-image">
					<a href="<?php the_permalink(); ?>">
						<?php
							if ($theblogger_1st_full == 'Yes')
							{
								the_post_thumbnail('theblogger_image_size_1');
							}
							else
							{
								if ($theblogger_grid_type == 'fitRows')
								{
									the_post_thumbnail('theblogger_image_size_4');
								}
								else
								{
									the_post_thumbnail('theblogger_image_size_2');
								}
							}
						?>
					</a>
				</div> <!-- .featured-image -->
			<?php
		}
	}
?>

<div id="main" class="site-main">
	<div class="layout-medium">
		<div id="primary" class="content-area <?php echo esc_attr($theblogger_sidebar); ?>">
			<div id="content" class="site-content" role="main">
				<?php
					theblogger_archive_title();
				?>
				<?php
					$theblogger_1st_full = 'No';
					
					if (isset($_GET['first_full']))
					{
						$theblogger_1st_full = 'Yes';
					}
					else
					{
						if (is_category())
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
						
						if ($layout == '1st Full + Grid')
						{
							$theblogger_1st_full = 'Yes';
						}
					}
					
					$theblogger_grid_type = get_theme_mod('theblogger_setting_grid_type', 'masonry');
					
					if (isset($_GET['grid_type']))
					{
						if ($_GET['grid_type'] == 'fitRows')
						{
							$theblogger_grid_type = 'fitRows';
						}
					}
					
					$theblogger_grid_post_width = get_theme_mod('theblogger_setting_grid_post_width', '320');
				?>
				
				<div class="blog-grid-wrap">
					<div class="blog-stream blog-grid blog-small masonry <?php if ($theblogger_1st_full == 'Yes') { echo 'first-full'; } ?>" data-layout="<?php echo esc_attr($theblogger_grid_type); ?>" data-item-width="<?php echo esc_attr($theblogger_grid_post_width); ?>">
						<?php
							if (have_posts()) :
								while (have_posts()) : the_post();
								
									$meta_cat_link_style = get_theme_mod('theblogger_setting_meta_cat_link_style', 'is-cat-link-border-bottom');
									
									if ($theblogger_1st_full == 'Yes')
									{
										?>
											<article id="post-<?php the_ID(); ?>" <?php post_class(esc_attr($meta_cat_link_style)); ?>>
												<?php
													theblogger_featured_media($theblogger_1st_full = 'Yes', $theblogger_grid_type);
												?>
												<div class="hentry-middle">
													<header class="entry-header">
														<?php
															theblogger_meta('above_title');
														?>
														<h2 class="entry-title">
															<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														</h2>
														<?php
															theblogger_meta('below_title');
														?>
													</header> <!-- .entry-header -->
													<div class="entry-content">
														<?php
															theblogger_content();
														?>
													</div> <!-- .entry-content -->
													<?php
														theblogger_meta('below_content');
													?>
												</div> <!-- .hentry-middle -->
											</article>
										<?php
										
										$theblogger_1st_full = 'No';
									}
									else
									{
										?>
											<article id="post-<?php the_ID(); ?>" <?php post_class(esc_attr($meta_cat_link_style)); ?>>
												<?php
													theblogger_featured_media($theblogger_1st_full = 'No', $theblogger_grid_type);
												?>
												<div class="hentry-middle">
													<header class="entry-header">
														<?php
															theblogger_meta('above_title');
														?>
														<h2 class="entry-title">
															<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														</h2>
														<?php
															theblogger_meta('below_title');
														?>
													</header> <!-- .entry-header -->
													<div class="entry-content">
														<?php
															theblogger_content();
														?>
													</div> <!-- .entry-content -->
													<?php
														theblogger_meta('below_content');
													?>
												</div> <!-- .hentry-middle -->
											</article>
										<?php
									}
								
								endwhile;
							else :
							
								theblogger_content_none();
							
							endif;
						?>
					</div> <!-- .blog-stream .blog-grid .blog-small .masonry -->
				</div> <!-- .blog-grid-wrap -->
				<?php
					theblogger_blog_navigation();
				?>
			</div> <!-- #content .site-content -->
		</div> <!-- #primary .content-area -->
		<?php
			if ($theblogger_sidebar != "")
			{
				theblogger_sidebar();
			}
		?>
	</div> <!-- .layout-medium -->
</div> <!-- #main .site-main -->

<?php
	get_footer();
?>