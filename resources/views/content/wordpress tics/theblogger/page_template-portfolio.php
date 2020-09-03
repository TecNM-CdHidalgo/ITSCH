<?php
/*
Template Name: Portfolio
*/
?>

<?php
	get_header();
?>

<?php
	$theblogger_select_page_featured_area = get_option('theblogger_select_page_featured_area' . '__' . get_the_ID(), 'No Featured Area');
	
	if ((! isset($_GET['featured_area'])) && is_active_sidebar($theblogger_select_page_featured_area))
	{
		?>
			<section class="top-content">
				<div class="layout-medium">
					<div class="featured-area">
						<?php
							dynamic_sidebar($theblogger_select_page_featured_area);
						?>
					</div> <!-- .featured-area -->
				</div> <!-- .layout-medium -->
			</section> <!-- .top-content -->
		<?php
	}
?>

<?php
	$theblogger_select_page_sidebar = get_option('theblogger_select_page_sidebar' . '__' . get_the_ID(), 'No Sidebar');
?>

<div id="main" class="site-main">
	<div class="<?php theblogger_portfolio_page_layout(); ?>">
		<div id="primary" class="content-area <?php if ($theblogger_select_page_sidebar != 'No Sidebar') { echo 'with-sidebar'; } ?>">
			<div id="content" class="site-content" role="main">
				<div class="post-header portfolio-header post-header-classic">
					<?php
						$theblogger_title_visibility = get_option(get_the_ID() . 'theblogger_title_visibility', false);
					?>
					<header class="entry-header" <?php if ($theblogger_title_visibility == true) { echo 'style="display: none;"'; } ?>>
						<h1 class="entry-title">
							<?php
								single_post_title();
							?>
						</h1>
					</header> <!-- .entry-header -->
				</div> <!-- .post-header-classic -->
				
				<ul id="filters" class="filters">
					<?php
						$theblogger_categories = get_categories(array('type'     => 'portfolio',
																	  'taxonomy' => 'portfolio-category',
																	  'parent'   => 0)); // Get top level categories.
						
						if (count($theblogger_categories) >= 1)
						{
							?>
								<li class="current">
									<a data-filter="*" href="#">
										<?php
											esc_html_e('all', 'theblogger');
										?>
									</a>
								</li>
							<?php
						}
						
						foreach ($theblogger_categories as $category)
						{
							?>
								<li>
									<a data-filter=".<?php echo esc_attr($category->slug); ?>" href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
										<?php
											echo esc_html($category->name);
										?>
									</a>
								</li>
							<?php
						}
					?>
				</ul> <!-- #filters .filters -->
				
				<?php
					$theblogger_portfolio_page_grid_type_layout = 'masonry';
					$theblogger_portfolio_page_grid_type 		= get_theme_mod('theblogger_setting_portfolio_page_grid_type', 'masonry'); // Also used for feat-img below.
					
					if (($theblogger_portfolio_page_grid_type == 'fitRows_square') || ($theblogger_portfolio_page_grid_type == 'fitRows_wide'))
					{
						$theblogger_portfolio_page_grid_type_layout = 'fitRows';
					}
					
					$theblogger_portfolio_page_post_width = get_theme_mod('theblogger_setting_portfolio_page_post_width', '320');
				?>
				
				<div class="blog-grid-wrap">
					<div class="blog-stream blog-grid blog-small portfolio-grid masonry" data-layout="<?php echo esc_attr($theblogger_portfolio_page_grid_type_layout); ?>" data-item-width="<?php echo esc_attr($theblogger_portfolio_page_post_width); ?>">
						<?php
							function theblogger_portfolio_item_feat_img($theblogger_portfolio_page_grid_type)
							{
								if ($theblogger_portfolio_page_grid_type == 'fitRows_square')
								{
									the_post_thumbnail('theblogger_image_size_3');
								}
								elseif ($theblogger_portfolio_page_grid_type == 'fitRows_wide')
								{
									the_post_thumbnail('theblogger_image_size_4');
								}
								else
								{
									the_post_thumbnail('theblogger_image_size_2');
								}
							}
							
							function theblogger_portfolio_item_feat_img__lightbox_gallery($theblogger_portfolio_page_grid_type)
							{
								if ($theblogger_portfolio_page_grid_type == 'fitRows_square')
								{
									return get_the_post_thumbnail(null, 'theblogger_image_size_3');
								}
								elseif ($theblogger_portfolio_page_grid_type == 'fitRows_wide')
								{
									return get_the_post_thumbnail(null, 'theblogger_image_size_4');
								}
								else
								{
									return get_the_post_thumbnail(null, 'theblogger_image_size_2');
								}
							}
						?>
						
						<?php
							function theblogger_portfolio_item_type_content__standard($feat_img, $theblogger_portfolio_page_grid_type)
							{
								?>
									<a href="<?php the_permalink(); ?>">
										<?php
											if ($feat_img)
											{
												theblogger_portfolio_item_feat_img($theblogger_portfolio_page_grid_type);
											}
											else
											{
												the_title();
											}
										?>
									</a>
								<?php
							}
						?>
						
						<?php
							function theblogger_portfolio_item_type_content__lightbox_feat_img($feat_img, $theblogger_portfolio_page_grid_type)
							{
								$feat_img_url = "";
								$feat_img_id = get_post_thumbnail_id();
								$feat_img_url_width_cropped = wp_get_attachment_image_src($feat_img_id, 'theblogger_image_size_7');  // magnific-popup-width
								
								if ($feat_img_url_width_cropped[1] > $feat_img_url_width_cropped[2])
								{
									$feat_img_url = $feat_img_url_width_cropped[0];
								}
								else
								{
									$feat_img_url_height_cropped = wp_get_attachment_image_src($feat_img_id, 'theblogger_image_size_8'); // magnific-popup-height
									$feat_img_url = $feat_img_url_height_cropped[0];
								}
								
								?>
									<a class="lightbox" title="<?php the_title_attribute(); ?>" href="<?php echo esc_url($feat_img_url); ?>">
										<?php
											if ($feat_img)
											{
												theblogger_portfolio_item_feat_img($theblogger_portfolio_page_grid_type);
											}
											else
											{
												the_title();
											}
										?>
									</a>
								<?php
							}
						?>
						
						<?php
							global $theblogger_portfolio_item_has_feat_img;
							global $theblogger_portfolio_page_grid_type__lightbox_gallery;
							
							function theblogger_portfolio_item_type_content__lightbox_gallery($feat_img, $theblogger_portfolio_page_grid_type)
							{
								the_content();
							}
						?>
						
						<?php
							function theblogger_portfolio_item_type_content__lightbox_audio($feat_img, $theblogger_portfolio_page_grid_type)
							{
								$browser_address_url = stripcslashes(get_option(get_the_ID() . 'theblogger_featured_video_url'));
								
								if (! empty($browser_address_url))
								{
									$xml_url 	   = 'http://soundcloud.com/oembed?url=' . $browser_address_url;
									$xml_content   = simplexml_load_file($xml_url);
									$xml_attribute = $xml_content->html; // Get iframe.
									preg_match_all('#src=([\'"])(.+?)\1#is', $xml_attribute, $out); // Split iframe.
									$url = $out[2][0]; // Get url.
									
									?>
										<a class="lightbox mfp-iframe" title="<?php the_title_attribute(); ?>" href="<?php echo esc_url($url); ?>">
											<?php
												if ($feat_img)
												{
													theblogger_portfolio_item_feat_img($theblogger_portfolio_page_grid_type);
												}
												else
												{
													the_title();
												}
											?>
										</a>
									<?php
								}
							}
						?>
						
						<?php
							function theblogger_portfolio_item_type_content__lightbox_video($feat_img, $theblogger_portfolio_page_grid_type)
							{
								$browser_address_url = stripcslashes(get_option(get_the_ID() . 'theblogger_featured_video_url'));
								
								if (! empty($browser_address_url))
								{
									?>
										<a class="lightbox mfp-iframe" title="<?php the_title_attribute(); ?>" href="<?php echo esc_url($browser_address_url); ?>">
											<?php
												if ($feat_img)
												{
													theblogger_portfolio_item_feat_img($theblogger_portfolio_page_grid_type);
												}
												else
												{
													the_title();
												}
											?>
										</a>
									<?php
								}
							}
						?>
						
						<?php
							function theblogger_portfolio_item_type_content__direct_url($feat_img, $theblogger_portfolio_page_grid_type)
							{
								$direct_url = stripcslashes(get_option(get_the_ID() . 'theblogger_featured_video_url'));
								
								if (! empty($direct_url))
								{
									$new_tab = get_option(get_the_ID() . 'theblogger_featured_video_url__new_tab', true);
									
									?>
										<a <?php if ($new_tab != false) { echo 'target="_blank"'; } ?> href="<?php echo esc_url($direct_url); ?>">
											<?php
												if ($feat_img)
												{
													theblogger_portfolio_item_feat_img($theblogger_portfolio_page_grid_type);
												}
												else
												{
													the_title();
												}
											?>
										</a>
									<?php
								}
							}
						?>
						
						<?php
							function theblogger_portfolio_item_type_content_selector($portfolio_item_format, $feat_img, $theblogger_portfolio_page_grid_type)
							{
								if ($portfolio_item_format == 'image')
								{
									theblogger_portfolio_item_type_content__lightbox_feat_img($feat_img, $theblogger_portfolio_page_grid_type);
								}
								elseif ($portfolio_item_format == 'gallery')
								{
									theblogger_portfolio_item_type_content__lightbox_gallery($feat_img, $theblogger_portfolio_page_grid_type);
								}
								elseif ($portfolio_item_format == 'audio')
								{
									theblogger_portfolio_item_type_content__lightbox_audio($feat_img, $theblogger_portfolio_page_grid_type);
								}
								elseif ($portfolio_item_format == 'video')
								{
									theblogger_portfolio_item_type_content__lightbox_video($feat_img, $theblogger_portfolio_page_grid_type);
								}
								elseif ($portfolio_item_format == 'link')
								{
									theblogger_portfolio_item_type_content__direct_url($feat_img, $theblogger_portfolio_page_grid_type);
								}
								else
								{
									theblogger_portfolio_item_type_content__standard($feat_img, $theblogger_portfolio_page_grid_type);
								}
							}
						?>
						
						<?php
							$theblogger_query = new WP_Query(array('post_type'      => 'portfolio',
																   'posts_per_page' => -1));
							
							if ($theblogger_query->have_posts()) :
								while ($theblogger_query->have_posts()) : $theblogger_query->the_post();
								
									?>
										<div id="post-<?php the_ID(); ?>" <?php post_class(theblogger_portfolio_page__post_class()); ?>>
											<?php
												$portfolio_item_format = get_post_format();
											?>
											<?php
												if (has_post_thumbnail())
												{
													?>
														<div class="featured-image">
															<?php
																$theblogger_portfolio_item_has_feat_img = true;
																$theblogger_portfolio_page_grid_type__lightbox_gallery = $theblogger_portfolio_page_grid_type;
																theblogger_portfolio_item_type_content_selector($portfolio_item_format, $feat_img = true, $theblogger_portfolio_page_grid_type);
															?>
														</div> <!-- .featured-image -->
													<?php
												}
											?>
											<div class="hentry-middle">
												<header class="entry-header">
													<h2 class="entry-title">
														<?php
															$theblogger_portfolio_item_has_feat_img = false;
															$theblogger_portfolio_page_grid_type__lightbox_gallery = $theblogger_portfolio_page_grid_type;
															theblogger_portfolio_item_type_content_selector($portfolio_item_format, $feat_img = false, $theblogger_portfolio_page_grid_type);
														?>
													</h2> <!-- .entry-title -->
													<?php
														if (has_excerpt())
														{
															?>
																<div class="entry-meta">
																	<span class="portfolio-excerpt">
																		<?php
																			echo get_the_excerpt();
																		?>
																	</span> <!-- .portfolio-excerpt -->
																</div> <!-- .entry-meta -->
															<?php
														}
													?>
												</header> <!-- .entry-header -->
											</div> <!-- .hentry-middle -->
										</div> <!-- .hentry -->
									<?php
								endwhile;
							endif;
							wp_reset_postdata();
						?>
					</div> <!-- .blog-stream .blog-grid .blog-small .portfolio-grid .masonry -->
				</div> <!-- .blog-grid-wrap -->
				
				<?php
					while (have_posts()) : the_post();
					
						$page_content = get_the_content();
						
						if (! empty($page_content))
						{
							?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="entry-content">
										<?php
											theblogger_content();
										?>
									</div> <!-- .entry-content -->
								</article> <!-- Page Content -->
								<?php
									comments_template("", true);
								?>
							<?php
						}
					
					endwhile;
				?>
			</div> <!-- #content .site-content -->
		</div> <!-- #primary .content-area -->
		<?php
			if ($theblogger_select_page_sidebar != 'No Sidebar')
			{
				theblogger_sidebar();
			}
		?>
	</div> <!-- layout -->
</div> <!-- #main .site-main -->

<?php
	get_footer();
?>