<?php

	function theblogger_after_setup_theme()
	{
		load_theme_textdomain('theblogger', get_template_directory() . '/languages');
		register_nav_menus(array('theblogger_theme_menu_location' => esc_html__('Theme Navigation Menu', 'theblogger')));
		
		add_theme_support('post-formats', array('image', 'gallery', 'audio', 'video', 'quote', 'link', 'chat', 'status', 'aside'));
		add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
		add_theme_support('automatic-feed-links');
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails', array('post', 'page'));
		
		add_theme_support('woocommerce');
		add_theme_support('wc-product-gallery-zoom');
		add_theme_support('wc-product-gallery-lightbox');
		add_theme_support('wc-product-gallery-slider');
	}
	
	add_action('after_setup_theme', 'theblogger_after_setup_theme');


/* ============================================================================================================================================= */


	include_once(get_template_directory() . '/admin/enqueue-styles-scripts.php');
	include_once(get_template_directory() . '/admin/enqueue-inline-style.php');
	include_once(get_template_directory() . '/admin/image-sizes.php');


/* ============================================================================================================================================= */


	add_filter('the_excerpt', 'do_shortcode');
	add_filter('widget_text', 'do_shortcode');
	add_filter('category_description', 'do_shortcode');


/* ============================================================================================================================================= */


	function theblogger_tinyplugin_register($plugin_array)
	{
		$url = get_template_directory_uri() . '/admin/shortcode-generator.js';
		$plugin_array['tinyplugin'] = $url;
		return $plugin_array;
	}
	
	add_filter('mce_external_plugins', 'theblogger_tinyplugin_register');
	
	
	function theblogger_tinyplugin_add_button($buttons)
	{
		array_push($buttons, 'separator', 'tinyplugin');
		return $buttons;
	}
	
	add_filter('mce_buttons', 'theblogger_tinyplugin_add_button', 0);


/* ============================================================================================================================================= */


	/*
		To override this walker in a child theme without modifying the comments template
		simply create your own theblogger_theme_comments(), and that function will be used instead.
		
		Used as a callback by wp_list_comments() for displaying the comments.
	*/
	
	function theblogger_theme_comments($comment, $args, $depth)
	{
		$GLOBALS['comment'] = $comment;
		
		switch ($comment->comment_type)
		{
			case 'pingback' :
			
			case 'trackback' :
			
				?>
					<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
						<p>
							<?php
								esc_html_e('Pingback:', 'theblogger');
							?>
							<?php
								comment_author_link();
							?>
							<?php
								edit_comment_link(esc_html__('(Edit)', 'theblogger'), '<span class="edit-link">', '</span>');
							?>
						</p>
				<?php
			
			break;
			
			default :
			
				global $post;
				
				?>
					<li id="li-comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
						<article id="comment-<?php comment_ID(); ?>" class="comment">
							<header class="comment-meta comment-author vcard">
								<?php
									echo get_avatar($comment, 150);
								?>
								<cite class="fn">
									<?php
										echo get_comment_author_link();
									?>
								</cite>
								<span class="comment-date">
									<?php
										echo get_comment_date();
									?>
									<?php
										esc_html_e('at', 'theblogger');
									?>
									<?php
										echo get_comment_time();
									?>
									<?php
										edit_comment_link(esc_html__('Edit', 'theblogger'), '<span class="comment-edit-link">', '</span>');
									?>
								</span>
							</header>
							
							<section class="comment-content comment">
								<?php
									if ('0' == $comment->comment_approved)
									{
										?>
											<p class="comment-awaiting-moderation">
												<?php
													esc_html_e('Your comment is awaiting moderation.', 'theblogger');
												?>
											</p>
										<?php
									}
								?>
								<?php
									comment_text();
								?>
							</section>
							
							<div class="reply">
								<?php
									comment_reply_link(array_merge($args,
																   array('reply_text' => esc_html__('Reply', 'theblogger'),
																		 'after'      => ' <span>&#8595;</span>',
																		 'depth'      => $depth,
																		 'max_depth'  => $args['max_depth'])));
								?>
							</div>
						</article>
				<?php
			
			break;
		}
	}


/* ============================================================================================================================================= */


	function theblogger_post_tags()
	{
		$tags = get_theme_mod('theblogger_setting_tags', 'Yes');
		
		if ($tags != 'No')
		{
			if (get_the_tags() != "")
			{
				?>
					<div class="post-tags tagcloud">
						<?php
							the_tags("", ' ', "");
						?>
					</div>
				<?php
			}
		}
	}


/* ============================================================================================================================================= */


	function theblogger_share_links_meta()
	{
		?>
			<span class="entry-share">
				<span class="entry-share-text">
					<?php
						esc_html_e('Share', 'theblogger');
					?>
				</span>
				
				<span class="entry-share-wrap">
					<span class="entry-share-inner-wrap">
						<a class="share-facebook" rel="nofollow" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php echo urlencode(the_title_attribute('echo=0')); ?>" title="<?php esc_attr_e('Share this post on Facebook', 'theblogger'); ?>"><?php esc_html_e('Facebook', 'theblogger'); ?></a>
						
						<a class="share-twitter" rel="nofollow" target="_blank" href="http://twitter.com/home?status=<?php esc_attr_e('Currently%20reading', 'theblogger'); ?>:%20'<?php echo urlencode(the_title_attribute('echo=0')); ?>'%20<?php the_permalink(); ?>" title="<?php esc_attr_e('Share this post with your followers', 'theblogger'); ?>"><?php esc_html_e('Twitter', 'theblogger'); ?></a>
						
						<a class="share-pinterest" rel="nofollow" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?><?php if (has_post_thumbnail()) { echo '&media='; the_post_thumbnail_url('theblogger_image_size_1'); } ?>&description=<?php echo urlencode(the_title_attribute('echo=0')); ?>"><?php esc_html_e('Pinterest', 'theblogger'); ?></a>
						
						<a class="share-gplus" rel="nofollow" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" title="<?php esc_attr_e('Share this post on Google+', 'theblogger'); ?>"><?php esc_attr_e('Google+', 'theblogger'); ?></a>
						
						<a class="share-mail" rel="nofollow" target="_blank" href="mailto:?subject=<?php echo urlencode(esc_attr__('I wanted you to see this post', 'theblogger')); ?>&amp;body=<?php echo urlencode(esc_attr__('Check out this post', 'theblogger')); ?>%20:%20<?php echo urlencode(the_title_attribute('echo=0')); ?>%20-%20<?php the_permalink(); ?>" title="<?php esc_attr_e('Email this post to a friend', 'theblogger'); ?>"><?php esc_attr_e('Email', 'theblogger'); ?></a>
					</span> <!-- .entry-share-inner-wrap -->
				</span> <!-- .entry-share-wrap -->
			</span> <!-- .entry-share -->
		<?php
	}
	
	
	function theblogger_share_links()
	{
		$share_links = get_theme_mod('theblogger_setting_share_links', 'Yes');
		
		if ($share_links != 'No')
		{
			?>
				<div class="share-links">
					<h3>
						<?php
							esc_html_e('Share This', 'theblogger');
						?>
					</h3>
					
					<a class="share-facebook" rel="nofollow" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php echo urlencode(the_title_attribute('echo=0')); ?>" title="<?php esc_attr_e('Share this post on Facebook', 'theblogger'); ?>">
						<i class="pw-icon-facebook"></i>
					</a>
					
					<a class="share-twitter" rel="nofollow" target="_blank" href="http://twitter.com/home?status=<?php esc_attr_e('Currently%20reading', 'theblogger'); ?>:%20'<?php echo urlencode(the_title_attribute('echo=0')); ?>'%20<?php the_permalink(); ?>" title="<?php esc_attr_e('Share this post with your followers', 'theblogger'); ?>">
						<i class="pw-icon-twitter"></i>
					</a>
					
					<a class="share-pinterest" rel="nofollow" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?><?php if (has_post_thumbnail()) { echo '&media='; the_post_thumbnail_url('theblogger_image_size_1'); } ?>&description=<?php echo urlencode(the_title_attribute('echo=0')); ?>" title="<?php esc_attr_e('Pin It', 'theblogger'); ?>">
						<i class="pw-icon-pinterest-circled"></i>
					</a>
					
					<a class="share-gplus" rel="nofollow" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" title="<?php esc_attr_e('Share this post on Google+', 'theblogger'); ?>">
						<i class="pw-icon-gplus"></i>
					</a>
					
					<a class="share-mail" rel="nofollow" target="_blank" href="mailto:?subject=<?php echo urlencode(esc_attr__('I wanted you to see this post', 'theblogger')); ?>&amp;body=<?php echo urlencode(esc_attr__('Check out this post', 'theblogger')); ?>%20:%20<?php echo urlencode(the_title_attribute('echo=0')); ?>%20-%20<?php the_permalink(); ?>" title="<?php esc_attr_e('Email this post to a friend', 'theblogger'); ?>">
						<i class="pw-icon-mail"></i>
					</a>
				</div> <!-- .share-links -->
			<?php
		}
	}


/* ============================================================================================================================================= */


	function theblogger_about_author()
	{
		$theblogger_about_the_author_module = get_theme_mod('theblogger_setting_author_info_box', 'Yes');
		
		if (($theblogger_about_the_author_module != 'No') && (is_singular('post')))
		{
			?>
				<aside class="about-author">
					<h3 class="widget-title">
						<span>
							<?php
								esc_html_e('Written By', 'theblogger');
							?>
						</span>
					</h3>
					
					<div class="author-bio">
						<div class="author-img">
							<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
								<?php
									echo get_avatar(get_the_author_meta('user_email'), 300, "", get_the_author_meta('display_name'));
								?>
							</a>
						</div>
						<div class="author-info">
							<h4 class="author-name">
								<?php
									the_author();
								?>
							</h4>
							<p>
								<?php	
									echo get_the_author_meta('description');
								?>
							</p>
							<?php
								dynamic_sidebar('theblogger_sidebar_8');
							?>
						</div>
					</div>
				</aside>
			<?php
		}
	}


/* ============================================================================================================================================= */


	function theblogger_blog_navigation()
	{
		$numbered_pagination = get_theme_mod('theblogger_setting_numbered_pagination', 'No');
		
		if ($numbered_pagination == 'Yes')
		{
			the_posts_pagination(array('screen_reader_text' => esc_html__('Posts navigation', 'theblogger'),
									   'prev_text'          => esc_html__('Prev', 'theblogger'),
									   'next_text'          => esc_html__('Next', 'theblogger'),
									   'end_size' 			=> 1,
									   'mid_size' 			=> 1,
									   'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__('Page', 'theblogger') . ' </span>'));
		}
		else
		{
			$next_posts_link     = get_next_posts_link();
			$previous_posts_link = get_previous_posts_link();
			
			if (($next_posts_link != "") || ($previous_posts_link != ""))
			{
				?>
					<nav class="navigation" role="navigation">
						<div class="nav-previous">
							<?php
								next_posts_link('&#8592; ' . esc_html__('Older Posts', 'theblogger'));
							?>
						</div> <!-- .nav-previous -->
						<div class="nav-next">
							<?php
								previous_posts_link(esc_html__('Newer Posts', 'theblogger') . ' &#8594;');
							?>
						</div> <!-- .nav-next -->
					</nav> <!-- .navigation -->
				<?php
			}
		}
	}


/* ============================================================================================================================================= */


	if (! function_exists('theblogger_single_navigation_html'))
	{
		function theblogger_single_navigation_html()
		{
			if (wp_attachment_is_image())
			{
				?>
					<nav class="nav-single">
						<div class="nav-previous">
							<div class="nav-desc">
								<?php
									previous_image_link(false, '<span class="meta-nav">&#8592;</span>' . esc_html__('Previous Image', 'theblogger'));
								?>
							</div>
						</div>
						<div class="nav-next">
							<div class="nav-desc">
								<?php
									next_image_link(false, esc_html__('Next Image', 'theblogger') . '<span class="meta-nav">&#8594;</span>');
								?>
							</div>
						</div>
					</nav>
				<?php
			}
			else
			{
				$previous_post_link = get_previous_post_link();
				$next_post_link     = get_next_post_link();
				
				if (($previous_post_link != "") || ($next_post_link != ""))
				{
					$previous_post = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
					$next_post     = get_adjacent_post(false, '', false);
					
					?>
						<nav class="nav-single">
							<div class="nav-previous">
								<?php
									if ($previous_post &&  has_post_thumbnail($previous_post->ID))
									{
										$feat_img  = wp_get_attachment_image_src(get_post_thumbnail_id($previous_post->ID), 'theblogger_image_size_5');
										$feat_img_alt = get_post_meta(get_post_thumbnail_id($previous_post->ID), '_wp_attachment_image_alt', true);
										
										?>
											<a class="nav-image-link" href="<?php echo get_permalink($previous_post->ID); ?>">
												<img alt="<?php echo esc_attr($feat_img_alt); ?>" src="<?php echo esc_url($feat_img[0]); ?>">
											</a>
										<?php
									}
								?>
								
								<?php
									previous_post_link('<div class="nav-desc"><h4>' . esc_html__('Previous Post', 'theblogger') . '</h4>%link</div>',
													   '<span class="meta-nav">&#8592;</span> %title');
								?>
								
								<?php
									if ($previous_post)
									{
										?>
											<a class="nav-overlay-link" href="<?php echo get_permalink($previous_post->ID); ?>" rel="prev">
												<?php
													echo esc_html($previous_post->post_title);
												?>
											</a>
										<?php
									}
								?>
							</div>
							
							<div class="nav-next">
								<?php
									if ($next_post && has_post_thumbnail($next_post->ID))
									{
										$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id($next_post->ID), 'theblogger_image_size_5');
										$feat_img_alt = get_post_meta(get_post_thumbnail_id($next_post->ID), '_wp_attachment_image_alt', true);
										
										?>
											<a class="nav-image-link" href="<?php echo get_permalink($next_post->ID); ?>">
												<img alt="<?php echo esc_attr($feat_img_alt); ?>" src="<?php echo esc_url($feat_img[0]); ?>">
											</a>
										<?php
									}
								?>
								
								<?php
									next_post_link('<div class="nav-desc"><h4>' . esc_html__('Next Post', 'theblogger') . '</h4>%link</div>',
												   '%title <span class="meta-nav">&#8594;</span>');
								?>
								
								<?php
									if ($next_post)
									{
										?>
											<a class="nav-overlay-link" href="<?php echo get_permalink($next_post->ID); ?>" rel="next">
												<?php
													echo esc_html($next_post->post_title);
												?>
											</a>
										<?php
									}
								?>
							</div>
						</nav>
					<?php
				}
			}
		}
	}
	
	
	if (! function_exists('theblogger_single_navigation'))
	{
		function theblogger_single_navigation()
		{
			$post_navigation = get_theme_mod('theblogger_setting_post_navigation', 'Yes');
			
			if ($post_navigation != 'No')
			{
				theblogger_single_navigation_html();
			}
		}
	}


/* ============================================================================================================================================= */


	function theblogger_content_none()
	{
		if (is_404())
		{
			?>
				<article class="hentry page">
					<header class="entry-header">
						<h1 class="entry-title">
							<?php
								esc_html_e('you are lost!', 'theblogger');
							?>
						</h1>
					</header>
					<div class="entry-content">
                        <div class="http-alert">
                            <h1>
								<i class="pw-icon-doc-alt"></i>
							</h1>
							<p>
								<?php
									esc_html_e('The page you are looking for was not found!', 'theblogger');
								?>
							</p>
                            <p>
                            	<a class="button big" href="<?php echo esc_url(home_url('/')); ?>">
									<i class="pw-icon-home"></i>
									
									<?php
										esc_html_e('Return To Homepage', 'theblogger');
									?>
								</a>
                            </p>
                        </div>
					</div>
				</article>
			<?php
		}
		elseif (is_search())
		{
			?>
				<article class="hentry page">
					<header class="entry-header">
						<h1 class="entry-title">
							<?php
								esc_html_e('nothing found', 'theblogger');
							?>
						</h1>
					</header>
					<div class="entry-content">
						<div class="http-alert">
                            <h1>
								<i class="pw-icon-doc-alt"></i>
							</h1>
							<p>
								<?php
									esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'theblogger');
								?>
							</p>
							<?php
								get_search_form();
							?>
						</div>
					</div>
				</article>
			<?php
		}
		else
		{
			?>
				<article class="hentry page">
					<header class="entry-header">
						<h1 class="entry-title">
							<?php
								esc_html_e('nothing found', 'theblogger');
							?>
						</h1>
					</header>
					<div class="entry-content">
						<div class="http-alert">
                            <h1>
								<i class="pw-icon-doc-alt"></i>
							</h1>
							<p>
								<?php
									esc_html_e('It seems we can not find what you are looking for. Perhaps searching can help.', 'theblogger');
								?>
							</p>
							<?php
								get_search_form();
							?>
						</div>
					</div>
				</article>
			<?php
		}
	}


/* ============================================================================================================================================= */


	function theblogger_meta_category()
	{
		?>
			<span class="cat-links">
				<span class="prefix">
					<?php
						esc_html_e('in', 'theblogger');
					?>
				</span>
				<?php
					the_category(' ');
				?>
			</span>
		<?php
	}
	
	function theblogger_meta_date()
	{
		?>
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
					<time class="updated" datetime="<?php echo get_the_modified_date('c'); ?>">
						<?php
							echo get_the_modified_date();
						?>
					</time>
				</a>
			</span>
		<?php
	}
	
	function theblogger_meta_comment_hide_0()
	{
		?>
			<span class="comment-link">
				<span class="prefix">
					<?php
						esc_html_e('with', 'theblogger');
					?>
				</span>
				<?php
					comments_popup_link(esc_html__('0 Comments', 'theblogger'),
										esc_html__('1 Comment', 'theblogger'),
										esc_html__('% Comments', 'theblogger'),
										"",
										'Comments Off');
				?>
			</span>
		<?php
	}
	
	function theblogger_meta_comment()
	{
		$meta_blog_comment_hide_0 = get_theme_mod('theblogger_setting_meta_blog_comment_hide_0', true);
		$meta_post_comment_hide_0 = get_theme_mod('theblogger_setting_meta_post_comment_hide_0', true);
		
		if (is_single())
		{
			if (get_comments_number() || (! $meta_post_comment_hide_0))
			{
				theblogger_meta_comment_hide_0();
			}
		}
		else
		{
			if (get_comments_number() || (! $meta_blog_comment_hide_0))
			{
				theblogger_meta_comment_hide_0();
			}
		}
	}
	
	function theblogger_meta_author()
	{
		?>
			<span class="vcard author">
				<span class="prefix">
					<?php
						esc_html_e('by', 'theblogger');
					?>
				</span>
				<a class="url fn n" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
					<span class="fn">
						<?php
							the_author();
						?>
					</span>
				</a>
			</span>
		<?php
	}
	
	function theblogger_meta_like()
	{
		?>
			<span class="entry-like">
				<?php
					if (function_exists('dot_irecommendthis'))
					{
						dot_irecommendthis();
					}
				?>
			</span>
		<?php
	}
	
	function theblogger_meta_share()
	{
		theblogger_share_links_meta();
	}
	
	function theblogger_meta_edit()
	{
		edit_post_link(esc_html__('Edit', 'theblogger'),
					   '<span class="edit-link">',
					   '</span>');
	}
	
	
	function theblogger_meta_wrap_position($meta_wrap_position, $meta_position, $meta_control)
	{
		$has_meta = false;
		$meta_position_category = $meta_position[0];
		$meta_position_date     = $meta_position[1];
		$meta_position_comment  = $meta_position[2];
		$meta_position_author   = $meta_position[3];
		$meta_position_share    = $meta_position[4];
		$meta_position_like     = $meta_position[5];
		$meta_position_edit     = $meta_position[6];
		
		if ($meta_position_category == $meta_wrap_position)
		{
			if (! $meta_control)
			{
				theblogger_meta_category();
			}
			
			$has_meta = true;
		}
		
		if ($meta_position_date == $meta_wrap_position)
		{
			if (! $meta_control)
			{
				theblogger_meta_date();
			}
			
			$has_meta = true;
		}
		
		if ($meta_position_comment == $meta_wrap_position)
		{
			if (! $meta_control)
			{
				theblogger_meta_comment();
			}
			
			$has_meta = true;
		}
		
		if ($meta_position_author == $meta_wrap_position)
		{
			if (! $meta_control)
			{
				theblogger_meta_author();
			}
			
			$has_meta = true;
		}
		
		if ($meta_position_share == $meta_wrap_position)
		{
			if (! $meta_control)
			{
				theblogger_meta_share();
			}
			
			$has_meta = true;
		}
		
		if ($meta_position_like == $meta_wrap_position)
		{
			if (! $meta_control)
			{
				theblogger_meta_like();
			}
			
			$has_meta = true;
		}
		
		if ($meta_position_edit == $meta_wrap_position)
		{
			if (! $meta_control)
			{
				theblogger_meta_edit();
			}
			
			$has_meta = true;
		}
		
		return $has_meta;
	}
	
	
	function theblogger_meta($meta_wrap_position)
	{
		$meta_position = array();
		
		if (is_singular('post'))
		{
			$meta_position = array(get_theme_mod('theblogger_setting_meta_post_cat', 'below_title'),
								   get_theme_mod('theblogger_setting_meta_post_date', 'below_title'),
								   get_theme_mod('theblogger_setting_meta_post_comment', 'below_title'),
								   get_theme_mod('theblogger_setting_meta_post_author', 'hidden'),
								   get_theme_mod('theblogger_setting_meta_post_share', 'below_title'),
								   get_theme_mod('theblogger_setting_meta_post_like', 'below_title'),
								   get_theme_mod('theblogger_setting_meta_post_edit', 'hidden')
								   );
		}
		else
		{
			$meta_position = array(get_theme_mod('theblogger_setting_meta_blog_cat', 'below_title'),
								   get_theme_mod('theblogger_setting_meta_blog_date', 'below_title'),
								   get_theme_mod('theblogger_setting_meta_blog_comment', 'hidden'),
								   get_theme_mod('theblogger_setting_meta_blog_author', 'hidden'),
								   get_theme_mod('theblogger_setting_meta_blog_share', 'below_title'),
								   get_theme_mod('theblogger_setting_meta_blog_like', 'below_title'),
								   get_theme_mod('theblogger_setting_meta_blog_edit', 'hidden')
								   );
		}
		
		if ($meta_wrap_position == 'above_title')
		{
			if (theblogger_meta_wrap_position($meta_wrap_position, $meta_position, $meta_control = true))
			{
				?>
					<div class="entry-meta above-title">
						<?php
							theblogger_meta_wrap_position($meta_wrap_position, $meta_position, $meta_control = false);
						?>
					</div> <!-- .entry-meta .above-title -->
				<?php
			}
		}
		elseif ($meta_wrap_position == 'below_title')
		{
			if (theblogger_meta_wrap_position($meta_wrap_position, $meta_position, $meta_control = true))
			{
				?>
					<div class="entry-meta below-title">
						<?php
							theblogger_meta_wrap_position($meta_wrap_position, $meta_position, $meta_control = false);
						?>
					</div> <!-- .entry-meta .below-title -->
				<?php
			}
		}
		elseif ($meta_wrap_position == 'below_content')
		{
			if (theblogger_meta_wrap_position($meta_wrap_position, $meta_position, $meta_control = true))
			{
				?>
					<footer class="entry-meta below-content">
						<?php
							theblogger_meta_wrap_position($meta_wrap_position, $meta_position, $meta_control = false);
						?>
					</footer> <!-- .entry-meta .below-content -->
				<?php
			}
		}
	}


/* ============================================================================================================================================= */


	function theblogger_gallery_type__slider($atts)
	{
		extract(shortcode_atts(array('ids'     => "",
									 'orderby' => "",
									 'link'    => "",
									 'size'    => 'thumbnail'), $atts));
		
		$output = "";
		$items_with_commas = $ids;
		
		if ($items_with_commas != "")
		{
			$items_in_array = preg_split("/[\s]*[,][\s]*/", $items_with_commas);
			
			if ($orderby == 'rand')
			{
				shuffle($items_in_array);
			}
			
			$output .= '<div class="owl-carousel" data-items="1" data-loop="true" data-center="false" data-mouse-drag="true" data-nav="true" data-dots="true" data-autoplay="false" data-autoplay-speed="600" data-autoplay-timeout="2000">';
			
				if (is_page_template('page_template-full.php') || is_page_template('page_template-medium.php') || is_singular('portfolio'))
				{
					$size = 'theblogger_image_size_7';
				}
				else
				{
					$size = 'theblogger_image_size_1';
				}
				
				foreach ($items_in_array as $item)
				{
					$image 		   = wp_get_attachment_image_src($item, $size);
					$image_alt 	   = get_post_meta($item, '_wp_attachment_image_alt', true);
					$image_caption = get_post_field('post_excerpt', $item);
					
					if ($image_caption != "")
					{
						$image_caption = '<p class="owl-title">' . $image_caption . '</p>';
					}
					
					$output .= '<div>';
					$output .= '<img alt="' . esc_attr($image_alt) . '" src="' . esc_url($image[0]) . '">';
					$output .= $image_caption;
					$output .= '</div>';
				}
			
			$output .= '</div>';
		}
		
		return $output;
	}
	
	
	function theblogger_gallery_type__grid($atts)
	{
		extract(shortcode_atts(array('ids'     => "",
									 'orderby' => "",
									 'link'    => "",
									 'size'    => 'thumbnail'), $atts));
		
		$output = "";
		$items_with_commas = $ids;
		
		if ($items_with_commas != "")
		{
			$items_in_array = preg_split("/[\s]*[,][\s]*/", $items_with_commas);
			
			if ( $orderby == 'rand' )
			{
				shuffle($items_in_array);
			}
			
			$output .= '<div class="gallery ' . (($link == "") ? 'link-to-attachment-page' : 'link-to-' . $link) . '">';
			
				foreach ($items_in_array as $item)
				{
					$image_big = "";
					$image_big_width_cropped = wp_get_attachment_image_src($item, 'theblogger_image_size_7'); // magnific-popup-width
					
					if ($image_big_width_cropped[1] > $image_big_width_cropped[2])
					{
						$image_big = $image_big_width_cropped[0];
					}
					else
					{
						$image_big_height_cropped = wp_get_attachment_image_src($item, 'theblogger_image_size_8'); // magnific-popup-height
						$image_big = $image_big_height_cropped[0];
					}
					
					$image_small = "";
					
					if ($size == 'full')
					{
						$image_small = wp_get_attachment_image_src($item, 'theblogger_image_size_1'); // gallery-type-grid
					}
					else
					{
						$image_small = wp_get_attachment_image_src($item, 'theblogger_image_size_6'); // gallery-type-grid
					}
					
					$image_alt 	   = get_post_meta($item, '_wp_attachment_image_alt', true);
					$image_caption = get_post_field('post_excerpt', $item);
					
					if ($image_caption != "")
					{
						$image_caption = '<figcaption class="wp-caption-text gallery-caption">' . $image_caption . '</figcaption>';
					}
					
					if ($link == 'file')
					{
						$output .= '<figure class="gallery-item">';
						$output .= '<div class="gallery-icon landscape">';
						$output .= '<a href="' . esc_url($image_big) . '">';
						$output .= '<img class="attachment-thumbnail" alt="' . esc_attr($image_alt) . '" src="' . esc_url($image_small[0]) . '">';
						$output .= '</a>';
						$output .= '</div>';
						$output .= $image_caption;
						$output .= '</figure>';
					}
					elseif ($link == 'none')
					{
						$output .= '<figure class="gallery-item">';
						$output .= '<div class="gallery-icon landscape">';
						$output .= '<img class="attachment-thumbnail" alt="' . esc_attr($image_alt) . '" src="' . esc_url($image_small[0]) . '">';
						$output .= '</div>';
						$output .= $image_caption;
						$output .= '</figure>';
					}
					else
					{
						$attachment_page = get_attachment_link($item);
						
						$output .= '<figure class="gallery-item">';
						$output .= '<div class="gallery-icon landscape">';
						$output .= '<a href="' . esc_url($attachment_page) . '">';
						$output .= '<img class="attachment-thumbnail" alt="' . esc_attr($image_alt) . '" src="' . esc_url($image_small[0]) . '">';
						$output .= '</a>';
						$output .= '</div>';
						$output .= $image_caption;
						$output .= '</figure>';
					}
				}
			
			$output .= '</div>';
		}
		
		return $output;
	}
	
	
	function theblogger_portfolio_page__lightbox_gallery($atts)
	{
		extract(shortcode_atts(array('ids'     => "",
									 'orderby' => "",
									 'link'    => "",
									 'size'    => 'thumbnail'), $atts));
		
		$output = "";
		$items_with_commas = $ids;
		
		if ($items_with_commas != "")
		{
			$items_in_array = preg_split("/[\s]*[,][\s]*/", $items_with_commas);
			
			if ($orderby == 'rand')
			{
				shuffle($items_in_array);
			}
			
				$first_item = true;
				global $theblogger_portfolio_item_has_feat_img;
				$feat_img = $theblogger_portfolio_item_has_feat_img;
				global $theblogger_portfolio_page_grid_type__lightbox_gallery;
				
				foreach ($items_in_array as $item)
				{
					$image_big = "";
					$image_big_width_cropped = wp_get_attachment_image_src($item, 'theblogger_image_size_7'); // magnific-popup-width
					
					if ($image_big_width_cropped[1] > $image_big_width_cropped[2])
					{
						$image_big = $image_big_width_cropped[0];
					}
					else
					{
						$image_big_height_cropped = wp_get_attachment_image_src($item, 'theblogger_image_size_8'); // magnific-popup-height
						$image_big = $image_big_height_cropped[0];
					}
					
					$image_caption = get_post_field('post_excerpt', $item);
					
					if ($image_caption != "")
					{
						$image_caption = 'title="' . esc_attr($image_caption) . '"';
					}
					
					if ($first_item)
					{
						if ($feat_img)
						{
							$output .= '<a class="lightbox" ' . $image_caption . ' href="' . esc_url($image_big) . '">' . theblogger_portfolio_item_feat_img__lightbox_gallery($theblogger_portfolio_page_grid_type__lightbox_gallery) . '</a>';
						}
						else
						{
							$output .= '<a class="lightbox" ' . $image_caption . ' href="' . esc_url($image_big) . '">' . get_the_title() . '</a>';
						}
						
						$first_item = false;
					}
					else
					{
						$output .= '<a class="lightbox" ' . $image_caption . ' href="' . esc_url($image_big) . '"></a>';
					}
				}
		}
		
		return $output;
	}
	
	
	function theblogger_post_gallery($output = "", $atts, $content = false, $tag = false)
	{
		$new_output = $output;
		
		
		if ((is_page_template('page_template-portfolio.php') || is_tax('portfolio-category')) && has_post_format('gallery'))
		{
			$new_output = theblogger_portfolio_page__lightbox_gallery($atts);
		}
		else
		{
			$gallery_type = get_option('theblogger_gallery_type' . '__' . get_the_ID(), 'grid');
			
			if ($gallery_type == 'slider')
			{
				$new_output = theblogger_gallery_type__slider($atts);
			}
			else
			{
				$new_output = theblogger_gallery_type__grid($atts);
			}
		}
		
		
		return $new_output;
	}
	
	add_filter('post_gallery', 'theblogger_post_gallery', 10, 4);


/* ============================================================================================================================================= */


	function theblogger_meta_box__title_visibility($post)
	{
		?>
			<?php
				wp_nonce_field('theblogger_meta_box__title_visibility',
							   'theblogger_meta_box_nonce__title_visibility');
			?>
			<p>
				<?php
					$theblogger_title_visibility = get_option(get_the_ID() . 'theblogger_title_visibility', false);
				?>
				<label for="theblogger_title_visibility">
					<input type="checkbox" id="theblogger_title_visibility" name="theblogger_title_visibility" <?php if ($theblogger_title_visibility == true) { echo 'checked="checked"'; } ?>>
					<?php esc_html_e('Hide Title', 'theblogger'); ?>
				</label>
			</p>
		<?php
	}
	
	
	function theblogger_meta_box_save__title_visibility($post_id)
	{
		if (! isset($_POST['theblogger_meta_box_nonce__title_visibility']))
		{
			return $post_id;
		}
		
		$nonce = $_POST['theblogger_meta_box_nonce__title_visibility'];
		
		if (! wp_verify_nonce($nonce, 'theblogger_meta_box__title_visibility'))
        {
			return $post_id;
		}
		
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        {
			return $post_id;
		}
		
		if ('page' == $_POST['post_type'])
		{
			if (! current_user_can('edit_page', $post_id))
			{
				return $post_id;
			}
		}
		else
		{
			if (! current_user_can('edit_post', $post_id))
			{
				return $post_id;
			}
		}
		
		update_option($post_id . 'theblogger_title_visibility', $_POST['theblogger_title_visibility']);
	}
	
	add_action('save_post', 'theblogger_meta_box_save__title_visibility');
	
	
	function theblogger_add_meta_boxes__title_visibility()
	{
		add_meta_box('theblogger_add_meta_box__title_visibility',
					 esc_html__('Title Visibility', 'theblogger'),
					 'theblogger_meta_box__title_visibility',
					 array('page'),
					 'side',
					 'high');
	}
	
	add_action('add_meta_boxes', 'theblogger_add_meta_boxes__title_visibility');


/* ============================================================================================================================================= */


	function theblogger_meta_box__featured_video($post)
	{
		?>
			<?php
				wp_nonce_field('theblogger_meta_box__featured_video',
							   'theblogger_meta_box_nonce__featured_video');
			?>
			<p>
				<label for="theblogger_featured_video_url"><?php esc_html_e('URL', 'theblogger'); ?></label>
				<?php
					$theblogger_featured_video_url          = stripcslashes(get_option(get_the_ID() . 'theblogger_featured_video_url', ""));
					$theblogger_featured_video_url__new_tab = get_option(get_the_ID() . 'theblogger_featured_video_url__new_tab', true);
				?>
				<input type="text" id="theblogger_featured_video_url" name="theblogger_featured_video_url" class="widefat" value="<?php echo esc_url($theblogger_featured_video_url); ?>">
				<span id="theblogger_featured_video__new_tab">
					<label style="font-size: 12px; color: #777777;">
						<input type="checkbox" name="theblogger_featured_video_url__new_tab" <?php if ($theblogger_featured_video_url__new_tab != false) { echo 'checked="checked"'; } ?>> <?php esc_html_e('Open In New Tab', 'theblogger'); ?> <span style="color: #999999;"><?php esc_html_e('(for Link format)', 'theblogger'); ?></span>
					</label>
				</span>
			</p>
			
			<p class="howto theblogger_featured_video__howto_post">
				<?php
					esc_html_e('Audio: Just paste the browser address url of an audio from SoundCloud. This audio will be shown in place of featured image.', 'theblogger');
				?>
				<br>
				<br>
				<?php
					esc_html_e('Video: Just paste the browser address url of a video from YouTube or Vimeo. This video will be shown in place of featured image.', 'theblogger');
				?>
			</p>
			<p class="howto theblogger_featured_video__howto_portfolio">
				<?php
					esc_html_e('Use this URL field for format; Link, Audio and Video.', 'theblogger');
				?>
				<br>
				<br>
				<?php
					esc_html_e('- Link: Enter your custom url.', 'theblogger');
				?>
				<br>
				<br>
				<?php
					esc_html_e('- Audio: Use browser address url of an audio from SoundCloud. This audio will be shown in a lightbox in your portfolio page.', 'theblogger');
				?>
				<br>
				<br>
				<?php
					esc_html_e('- Video: Use browser address url of a video from YouTube or Vimeo. This video will be shown in a lightbox in your portfolio page.', 'theblogger');
				?>
			</p>
		<?php
	}
	
	
	function theblogger_meta_box_save__featured_video($post_id)
	{
		if (! isset($_POST['theblogger_meta_box_nonce__featured_video']))
		{
			return $post_id;
		}
		
		$nonce = $_POST['theblogger_meta_box_nonce__featured_video'];
		
		if (! wp_verify_nonce($nonce, 'theblogger_meta_box__featured_video'))
        {
			return $post_id;
		}
		
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        {
			return $post_id;
		}
		
		if ('page' == $_POST['post_type'])
		{
			if (! current_user_can('edit_page', $post_id))
			{
				return $post_id;
			}
		}
		else
		{
			if (! current_user_can('edit_post', $post_id))
			{
				return $post_id;
			}
		}
		
		update_option($post_id . 'theblogger_featured_video_url', $_POST['theblogger_featured_video_url']);
		update_option($post_id . 'theblogger_featured_video_url__new_tab', $_POST['theblogger_featured_video_url__new_tab']);
	}
	
	add_action('save_post', 'theblogger_meta_box_save__featured_video');
	
	
	function theblogger_add_meta_boxes__featured_video()
	{
		add_meta_box('theblogger_add_meta_box__featured_video__post',
					 esc_html__('Featured Audio/Video', 'theblogger'),
					 'theblogger_meta_box__featured_video',
					 array('post'),
					 'side',
					 'low');
		
		add_meta_box('theblogger_add_meta_box__featured_video__portfolio',
					 esc_html__('Featured Audio/Video/Link', 'theblogger'),
					 'theblogger_meta_box__featured_video',
					 array('portfolio'),
					 'side',
					 'low');
	}
	
	add_action('add_meta_boxes', 'theblogger_add_meta_boxes__featured_video');


/* ============================================================================================================================================= */


	function theblogger_meta_box__gallery_type($post)
	{
		?>
			<div class="admin-inside-box">
				<?php
					wp_nonce_field('theblogger_meta_box__gallery_type', 'theblogger_meta_box_nonce__gallery_type');
				?>
				<p>
					<label for="theblogger_gallery_type"><?php esc_html_e('Select Gallery Type', 'theblogger'); ?></label>
					<?php
						$gallery_type = get_option('theblogger_gallery_type' . '__' . get_the_ID(), 'grid');
					?>
					<select id="theblogger_gallery_type" name="theblogger_gallery_type" style="min-width: 100px;">
						<option <?php if ($gallery_type == 'grid') { echo 'selected="selected"'; } ?> value="grid"><?php esc_html_e('Grid', 'theblogger'); ?></option>
						<option <?php if ($gallery_type == 'slider') { echo 'selected="selected"'; } ?> value="slider"><?php esc_html_e('Slider', 'theblogger'); ?></option>
					</select>
				</p>
				<p class="howto">
					<?php
						esc_html_e('Create galleries from Add Media button above the content editor.', 'theblogger');
					?>
				</p>
				<p class="howto">
					<?php
						esc_html_e('And select gallery type from here. You can turn your gallery into a slider.', 'theblogger');
					?>
				</p>
				<p class="howto">
					<?php
						esc_html_e('To show your images in a lightbox, select Grid type then edit your gallery in the content editor and choose Link To: Media File from gallery settings.', 'theblogger');
					?>
				</p>
			</div>
		<?php
	}
	
	
	function theblogger_save_meta_box__gallery_type($post_id)
	{
		if (! isset($_POST['theblogger_meta_box_nonce__gallery_type']))
		{
			return $post_id;
		}
		
		$nonce = $_POST['theblogger_meta_box_nonce__gallery_type'];
		
		if (! wp_verify_nonce($nonce, 'theblogger_meta_box__gallery_type'))
        {
			return $post_id;
		}
		
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) 
        {
			return $post_id;
		}
		
		if ('page' == $_POST['post_type'])
		{
			if (! current_user_can('edit_page', $post_id))
			{
				return $post_id;
			}
		}
		else
		{
			if (! current_user_can('edit_post', $post_id))
			{
				return $post_id;
			}
		}
		
		update_option('theblogger_gallery_type' . '__' . $post_id, $_POST['theblogger_gallery_type']);
	}
	
	add_action('save_post', 'theblogger_save_meta_box__gallery_type');
	
	
	function theblogger_add_meta_boxes__gallery_type()
	{
		add_meta_box('theblogger_add_meta_box__gallery_type',
					 esc_html__('Gallery Type', 'theblogger'),
					 'theblogger_meta_box__gallery_type',
					 array('post', 'page', 'portfolio'),
					 'side',
					 'low');
	}
	
	add_action('add_meta_boxes', 'theblogger_add_meta_boxes__gallery_type');


/* ============================================================================================================================================= */


	function theblogger_meta_box__post_style($post)
	{
		?>
			<div class="admin-inside-box">
				<?php
					wp_nonce_field('theblogger_meta_box__post_style', 'theblogger_meta_box_nonce__post_style');
				?>
				<p>
					<label for="theblogger_post_style"><?php esc_html_e('Select Post Style', 'theblogger'); ?></label>
					<?php
						$post_style = get_option('theblogger_post_style' . '__' . get_the_ID(), 'inherit');
					?>
					<select id="theblogger_post_style" name="theblogger_post_style">
						<option <?php if ($post_style == 'inherit') { echo 'selected="selected"'; } ?> value="inherit"><?php esc_html_e('Inherit from Customizer', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'post-header-classic') { echo 'selected="selected"'; } ?> value="post-header-classic"><?php esc_html_e('Classic', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-medium') { echo 'selected="selected"'; } ?> value="is-top-content-single-medium"><?php esc_html_e('Classic Medium', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-medium with-parallax') { echo 'selected="selected"'; } ?> value="is-top-content-single-medium with-parallax"><?php esc_html_e('Classic Medium Parallax', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-full') { echo 'selected="selected"'; } ?> value="is-top-content-single-full"><?php esc_html_e('Classic Full', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-full with-parallax') { echo 'selected="selected"'; } ?> value="is-top-content-single-full with-parallax"><?php esc_html_e('Classic Full Parallax', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-full-margins') { echo 'selected="selected"'; } ?> value="is-top-content-single-full-margins"><?php esc_html_e('Classic Full with Margins', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-full-margins with-parallax') { echo 'selected="selected"'; } ?> value="is-top-content-single-full-margins with-parallax"><?php esc_html_e('Classic Full with Margins Parallax', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'post-header-overlay post-header-overlay-inline is-post-dark') { echo 'selected="selected"'; } ?> value="post-header-overlay post-header-overlay-inline is-post-dark"><?php esc_html_e('Overlay', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-medium with-overlay') { echo 'selected="selected"'; } ?> value="is-top-content-single-medium with-overlay"><?php esc_html_e('Overlay Medium', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-full with-overlay') { echo 'selected="selected"'; } ?> value="is-top-content-single-full with-overlay"><?php esc_html_e('Overlay Full', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-full-margins with-overlay') { echo 'selected="selected"'; } ?> value="is-top-content-single-full-margins with-overlay"><?php esc_html_e('Overlay Full with Margins', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-medium with-title-full') { echo 'selected="selected"'; } ?> value="is-top-content-single-medium with-title-full"><?php esc_html_e('Title Full', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'post-header-classic is-featured-image-left') { echo 'selected="selected"'; } ?> value="post-header-classic is-featured-image-left"><?php esc_html_e('Image Left', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'post-header-classic is-featured-image-right') { echo 'selected="selected"'; } ?> value="post-header-classic is-featured-image-right"><?php esc_html_e('Image Right', 'theblogger'); ?></option>
					</select>
				</p>
				<p class="howto">
					<?php
						esc_html_e('Inherit from Customizer: Appearance > Customize > Single Post > Post Style.', 'theblogger');
					?>
					<br>
					<br>
					<?php
						esc_html_e('- Classic style applies if there is no featured media.', 'theblogger');
					?>
					<br>
					<?php
						esc_html_e('- Image Left and Image Right layouts display as classic style when featured video is present.', 'theblogger');
					?>
				</p>
			</div>
		<?php
	}
	
	
	function theblogger_save_meta_box__post_style($post_id)
	{
		if (! isset($_POST['theblogger_meta_box_nonce__post_style']))
		{
			return $post_id;
		}
		
		$nonce = $_POST['theblogger_meta_box_nonce__post_style'];
		
		if (! wp_verify_nonce($nonce, 'theblogger_meta_box__post_style'))
        {
			return $post_id;
		}
		
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) 
        {
			return $post_id;
		}
		
		if ('page' == $_POST['post_type'])
		{
			if (! current_user_can('edit_page', $post_id))
			{
				return $post_id;
			}
		}
		else
		{
			if (! current_user_can('edit_post', $post_id))
			{
				return $post_id;
			}
		}
		
		update_option('theblogger_post_style' . '__' . $post_id, $_POST['theblogger_post_style']);
	}
	
	add_action('save_post', 'theblogger_save_meta_box__post_style');
	
	
	function theblogger_add_meta_boxes__post_style()
	{
		add_meta_box('theblogger_add_meta_box__post_style',
					 esc_html__('Post Style', 'theblogger'),
					 'theblogger_meta_box__post_style',
					 array('post'),
					 'side',
					 'high');
	}
	
	add_action('add_meta_boxes', 'theblogger_add_meta_boxes__post_style');


/* ============================================================================================================================================= */


	/*
		This function filters the post content when viewing a post with the "chat" post format.  It formats the 
		content with structured HTML markup to make it easy for theme developers to style chat posts. The 
		advantage of this solution is that it allows for more than two speakers (like most solutions). You can 
		have 100s of speakers in your chat post, each with their own, unique classes for styling.
		
		@author David Chandra
		@link http://www.turtlepod.org
		@author Justin Tadlock
		@link http://justintadlock.com
		@copyright Copyright (c) 2012
		@license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
		@link http://justintadlock.com/archives/2012/08/21/post-formats-chat
		
		@global array $_post_format_chat_ids An array of IDs for the chat rows based on the author.
		@param string $content The content of the post.
		@return string $chat_output The formatted content of the post.
	*/
	
	function theblogger_theme_post_format_chat_content( $content )
	{
		global $_post_format_chat_ids;
		
		/* If this is not a 'chat' post, return the content. */
		if ( !has_post_format( 'chat' ) )
		{
			return $content;
		}
		
		/* Set the global variable of speaker IDs to a new, empty array for this chat. */
		$_post_format_chat_ids = array();
		
		/* Allow the separator (separator for speaker/text) to be filtered. */
		$separator = apply_filters( 'my_post_format_chat_separator', ':' );
		
		/* Open the chat transcript div and give it a unique ID based on the post ID. */
		$chat_output = "\n\t\t\t" . '<div id="chat-transcript-' . esc_attr( get_the_ID() ) . '" class="chat-transcript">';
		
		/* Split the content to get individual chat rows. */
		$chat_rows = preg_split( "/(\r?\n)+|(<br\s*\/?>\s*)+/", $content );
		
		/* Loop through each row and format the output. */
		foreach ( $chat_rows as $chat_row )
		{
			/* If a speaker is found, create a new chat row with speaker and text. */
			if ( strpos( $chat_row, $separator ) )
			{
				/* Split the chat row into author/text. */
				$chat_row_split = explode( $separator, trim( $chat_row ), 2 );
				
				/* Get the chat author and strip tags. */
				$chat_author = strip_tags( trim( $chat_row_split[0] ) );
				
				/* Get the chat text. */
				$chat_text = trim( $chat_row_split[1] );
				
				/* Get the chat row ID (based on chat author) to give a specific class to each row for styling. */
				$speaker_id = theblogger_theme_post_format_chat_row_id( $chat_author );
				
				/* Open the chat row. */
				$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class( "chat-speaker-{$speaker_id}" ) . '">';
				
				/* Add the chat row author. */
				$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-author ' . sanitize_html_class( strtolower( "chat-author-{$chat_author}" ) ) . ' vcard"><cite class="fn">' . apply_filters( 'my_post_format_chat_author', $chat_author, $speaker_id ) . '</cite>' . $separator . '</div>';
				
				/* Add the chat row text. */
				$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text"><p>' . str_replace( array( "\r", "\n", "\t" ), '', apply_filters( 'my_post_format_chat_text', $chat_text, $chat_author, $speaker_id ) ) . '</p></div>';
				
				/* Close the chat row. */
				$chat_output .= "\n\t\t\t\t" . '</div><!-- .chat-row -->';
			}
			/*
				If no author is found, assume this is a separate paragraph of text that belongs to the
				previous speaker and label it as such, but let's still create a new row.
			*/
			else
			{
				/* Make sure we have text. */
				if ( !empty( $chat_row ) )
				{
					/* Open the chat row. */
					$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class( "chat-speaker-{$speaker_id}" ) . '">';
					
					/* Don't add a chat row author.  The label for the previous row should suffice. */
					
					/* Add the chat row text. */
					$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text"><p>' . str_replace( array( "\r", "\n", "\t" ), '', apply_filters( 'my_post_format_chat_text', $chat_row, $chat_author, $speaker_id ) ) . '</p></div>';
					
					/* Close the chat row. */
					$chat_output .= "\n\t\t\t</div><!-- .chat-row -->";
				}
			}
		}
		
		/* Close the chat transcript div. */
		$chat_output .= "\n\t\t\t</div><!-- .chat-transcript -->\n";
		
		/* Return the chat content and apply filters for developers. */
		return apply_filters( 'my_post_format_chat_content', $chat_output );
	}
	
	/*
		This function returns an ID based on the provided chat author name. It keeps these IDs in a global 
		array and makes sure we have a unique set of IDs.  The purpose of this function is to provide an "ID"
		that will be used in an HTML class for individual chat rows so they can be styled. So, speaker "John" 
		will always have the same class each time he speaks. And, speaker "Mary" will have a different class 
		from "John" but will have the same class each time she speaks.
		
		@author David Chandra
		@link http://www.turtlepod.org
		@author Justin Tadlock
		@link http://justintadlock.com
		@copyright Copyright (c) 2012
		@license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
		@link http://justintadlock.com/archives/2012/08/21/post-formats-chat
		
		@global array $_post_format_chat_ids An array of IDs for the chat rows based on the author.
		@param string $chat_author Author of the current chat row.
		@return int The ID for the chat row based on the author.
	*/
	
	function theblogger_theme_post_format_chat_row_id( $chat_author )
	{
		global $_post_format_chat_ids;
		
		/* Let's sanitize the chat author to avoid craziness and differences like "John" and "john". */
		$chat_author = strtolower( strip_tags( $chat_author ) );
		
		/* Add the chat author to the array. */
		$_post_format_chat_ids[] = $chat_author;
		
		/* Make sure the array only holds unique values. */
		$_post_format_chat_ids = array_unique( $_post_format_chat_ids );
		
		/* Return the array key for the chat author and add "1" to avoid an ID of "0". */
		return absint( array_search( $chat_author, $_post_format_chat_ids ) ) + 1;
	}
	
	/* Filter the content of chat posts. */
	add_filter( 'the_content', 'theblogger_theme_post_format_chat_content' );


/* ============================================================================================================================================= */


	if (! function_exists('theblogger_portfolio_page__post_class'))
	{
		function theblogger_portfolio_page__post_class()
		{
			$taxonomy         = 'portfolio-category';
			$categories_slugs = "";
			$categories 	  = get_the_terms(get_the_ID(), $taxonomy);
			
			if ($categories && (! is_wp_error($categories)))
			{
				foreach ($categories as $category)
				{
					// Get post's category slug and its parent category slug.
					
					$categories_slugs .= get_term_parents_list(
						$category->term_id,
						$taxonomy,
						array(
							'format'    => 'slug',
							'separator' => ' ',
							'link'      => false,
							'inclusive' => true,
						)
					);
				}
			}
			
			$post_class = esc_attr($categories_slugs);
			
			return $post_class;
		}
	}


/* ============================================================================================================================================= */


	function theblogger_wp_head__theme_directory_url()
	{
		// Used for local_font_url in customizer.
		
		if (is_customize_preview())
		{
			$theme_directory_url = get_template_directory_uri(); // http://www.example.com/wp-content/themes/theblogger
			
			// Remove URL prefix http: OR https:
			
			$theme_directory_url__http  = strpos($theme_directory_url, 'http:'); // Check for http:
			$theme_directory_url__https = strpos($theme_directory_url, 'https:'); // Check for https:
			
			if ($theme_directory_url__http !== false)
			{
				$theme_directory_url = substr($theme_directory_url, 5); // Remove http:
			}
			elseif ($theme_directory_url__https !== false)
			{
				$theme_directory_url = substr($theme_directory_url, 6); // Remove https:
			}
			
			// end Remove URL prefix http: OR https:
			
			?>

<meta id="theblogger_theme_directory_url" name="theblogger_theme_directory_url" content="<?php echo esc_url($theme_directory_url); ?>">

			<?php
		}
	}
	
	add_action('wp_head', 'theblogger_wp_head__theme_directory_url');


/* ============================================================================================================================================= */


	if (is_admin())
	{
		include_once(get_template_directory() . '/admin/theme-options.php');
	}
	
	
	include_once(get_template_directory() . '/admin/pre-get-posts.php');
	include_once(get_template_directory() . '/admin/posts-columns.php');
	include_once(get_template_directory() . '/admin/functions-portfolio.php');
	include_once(get_template_directory() . '/admin/functions-woocommerce.php');
	include_once(get_template_directory() . '/admin/archive-title.php');
	
	include_once(get_template_directory() . '/admin/widget_area-register.php');
	include_once(get_template_directory() . '/admin/widget_area-featured-area.php');
	include_once(get_template_directory() . '/admin/widget_area-sidebar.php');
	
	include_once(get_template_directory() . '/admin/widgets.php');
	include_once(get_template_directory() . '/admin/automatic-excerpt.php');
	include_once(get_template_directory() . '/admin/related-posts.php');
	include_once(get_template_directory() . '/admin/customizer.php');
	include_once(get_template_directory() . '/admin/install-plugins.php');
	include_once(get_template_directory() . '/admin/demo-import.php');

?>