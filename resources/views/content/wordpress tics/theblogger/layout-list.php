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
						
						if ($layout == '1st Full + List')
						{
							$theblogger_1st_full = 'Yes';
						}
					}
				?>
				
				<div class="blog-stream blog-list blog-small <?php if ($theblogger_1st_full == 'Yes') { echo 'first-full'; } ?>">
					<?php
						if (have_posts()) :
							while (have_posts()) : the_post();
							
								$meta_cat_link_style = get_theme_mod('theblogger_setting_meta_cat_link_style', 'is-cat-link-border-bottom');
								
								if ($theblogger_1st_full == 'Yes')
								{
									?>
										<article id="post-<?php the_ID(); ?>" <?php post_class(esc_attr($meta_cat_link_style)); ?>>
											<?php
												if (has_post_thumbnail())
												{
													$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'theblogger_image_size_1');
													
													?>
														<div class="featured-image" style="background-image: url(<?php echo esc_url($feat_img[0]); ?>);">
															<a href="<?php the_permalink(); ?>">
																<?php
																	the_post_thumbnail('theblogger_image_size_1');
																?>
															</a>
														</div>
													<?php
												}
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
												if (has_post_thumbnail())
												{
													$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'theblogger_image_size_2');
													
													?>
														<div class="featured-image" style="background-image: url(<?php echo esc_url($feat_img[0]); ?>);">
															<a href="<?php the_permalink(); ?>">
																<?php
																	the_post_thumbnail('theblogger_image_size_2');
																?>
															</a>
														</div>
													<?php
												}
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
				</div> <!-- .blog-stream .blog-list .blog-small -->
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