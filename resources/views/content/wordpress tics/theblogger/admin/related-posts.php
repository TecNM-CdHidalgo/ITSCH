<?php

	if (! function_exists('theblogger_related_posts_style__overlay'))
	{
		function theblogger_related_posts_style__overlay($query)
		{
			if ($query->have_posts()) :
				?>
					<div class="related-posts">
						<h3 class="widget-title">
							<span>
								<?php
									esc_html_e('You May Also Like', 'theblogger');
								?>
							</span>
						</h3>
						<div class="blocks">
							<?php
								while ($query->have_posts()) : $query->the_post();
								
									$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'theblogger_image_size_3');
									
									?>
										<div class="block">
											<div class="post-thumbnail" style="background-image: url(<?php echo esc_url($feat_img[0]); ?>);">
												<div class="post-wrap">
													<header class="entry-header">
														<div class="entry-meta">
															<span class="cat-links">
																<?php
																	the_category(' ');
																?>
															</span>
														</div>
														<h2 class="entry-title">
															<a href="<?php the_permalink(); ?>">
																<?php
																	the_title();
																?>
															</a>
														</h2>
														<a class="more-link" href="<?php the_permalink(); ?>">
															<?php
																esc_html_e('View Post', 'theblogger');
															?>
														</a>
													</header>
												</div>
											</div>
										</div>
									<?php
								
								endwhile;
							?>
						</div>
					</div>
				<?php
			endif;
			wp_reset_postdata();
		}
	}
	
	
	if (! function_exists('theblogger_related_posts_style__classic'))
	{
		function theblogger_related_posts_style__classic($query)
		{
			if ($query->have_posts()) :
				?>
					<div class="related-posts">
						<h3 class="widget-title">
							<span>
								<?php
									esc_html_e('You May Also Like', 'theblogger');
								?>
							</span>
						</h3>
						<div class="blocks">
							<?php
								while ($query->have_posts()) : $query->the_post();
									?>
										<div class="block">
											<div class="related-post post-classic">
												<?php
													if (has_post_thumbnail())
													{
														?>
															<div class="featured-image">
																<a href="<?php the_permalink(); ?>">
																	<?php
																		the_post_thumbnail('theblogger_image_size_3');
																	?>
																</a>
															</div>
														<?php
													}
												?>
												<header class="entry-header">
													<div class="entry-meta">
														<span class="posted-on">
															<span class="prefix">
																<?php
																	esc_html_e('on', 'theblogger');
																?>
															</span>
															<a href="<?php the_permalink(); ?>" rel="bookmark">
																<time class="entry-date published" datetime="<?php echo get_the_date('c'); ?>">
																	<?php
																		echo get_the_date();
																	?>
																</time>
															</a>
														</span>
													</div>
													<h2 class="entry-title">
														<a href="<?php the_permalink(); ?>">
															<?php
																the_title();
															?>
														</a>
													</h2>
												</header>
											</div>
										</div>
									<?php
								endwhile;
							?>
						</div>
					</div>
				<?php
			endif;
			wp_reset_postdata();
		}
	}
	
	
	if (! function_exists('theblogger_related_posts_style'))
	{
		function theblogger_related_posts_style($query)
		{
			$related_posts_style = get_theme_mod('theblogger_setting_related_posts_style', 'overlay');
			
			if ($related_posts_style == 'classic')
			{
				theblogger_related_posts_style__classic($query);
			}
			else
			{
				theblogger_related_posts_style__overlay($query);
			}
		}
	}
	
	
	if (! function_exists('theblogger_related_posts_html'))
	{
		function theblogger_related_posts_html()
		{
			$current_post_id = get_the_ID();
			
			$current_post_categories = ""; // Empty string for all categories of blog.
			$related_posts_category  = get_theme_mod('theblogger_setting_related_posts_category', 'all');
			
			if ($related_posts_category == 'same')
			{
				$current_post_categories = wp_get_post_categories($current_post_id, array('fields' => 'ids')); // Get current post categories. (categories ids only)
			}
			
			$current_post_tags = wp_get_post_tags($current_post_id, array('fields' => 'ids')); // Get current post tags. (tags ids only)
			$exclude_ids       = array($current_post_id); // Exclude only the current post.
			$orderby           = get_theme_mod('theblogger_setting_related_posts_order', 'rand');
			$posts_per_page    = get_theme_mod('theblogger_setting_related_posts_count', '3');
			
			if (! empty($posts_per_page))
			{
				$posts_per_page = intval($posts_per_page);
			}
			else
			{
				$posts_per_page = 3;
			}
			
			$query = new WP_Query(
				array(
					'post_type'           => 'post',
					'ignore_sticky_posts' => true,
					'category__in'        => $current_post_categories,
					'tag__in'             => $current_post_tags,
					'post__not_in'        => $exclude_ids,
					'orderby'             => $orderby,
					'posts_per_page'      => $posts_per_page
				)
			);
			
			theblogger_related_posts_style($query);
		}
	}
	
	
	if (! function_exists('theblogger_related_posts'))
	{
		function theblogger_related_posts()
		{
			$related_posts = get_theme_mod('theblogger_setting_related_posts', 'Yes');
			
			if (($related_posts != 'No') && is_singular('post'))
			{
				theblogger_related_posts_html();
			}
		}
	}

?>