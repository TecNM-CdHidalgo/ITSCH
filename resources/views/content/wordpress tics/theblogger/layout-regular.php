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
	function theblogger_featured_media()
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
							the_post_thumbnail('theblogger_image_size_1');
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
				<div class="blog-stream blog-regular">
					<?php
						if (have_posts()) :
							while (have_posts()) : the_post();
							
								$meta_cat_link_style = get_theme_mod('theblogger_setting_meta_cat_link_style', 'is-cat-link-border-bottom');
								
								?>
									<article id="post-<?php the_ID(); ?>" <?php post_class(esc_attr($meta_cat_link_style)); ?>>
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
										<?php
											theblogger_featured_media();
										?>
										<div class="entry-content">
											<?php
												theblogger_content();
											?>
										</div> <!-- .entry-content -->
										<?php
											theblogger_meta('below_content');
										?>
									</article>
								<?php
							endwhile;
						else :
						
							theblogger_content_none();
						
						endif;
					?>
					<?php
						theblogger_blog_navigation();
					?>
				</div> <!-- .blog-stream .blog-regular -->
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