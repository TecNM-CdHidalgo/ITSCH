<?php
	get_header();
?>

<?php
	function theblogger_portfolio_item__feat_img($linked_url = "")
	{
		if (! empty($linked_url))
		{
			$image_big = $linked_url;
			
			?>
				<figure class="wp-caption aligncenter">
					<a href="<?php echo esc_url($image_big); ?>">
						<?php
							the_post_thumbnail('theblogger_image_size_7');
						?>
					</a>
					<?php
						if (has_excerpt())
						{
							?>
								<figcaption class="wp-caption-text">
									<?php
										echo get_the_excerpt();
									?>
								</figcaption>
							<?php
						}
					?>
				</figure>
			<?php
		}
		else
		{
			if (has_post_thumbnail())
			{
				?>
					<p>
						<?php
							the_post_thumbnail('theblogger_image_size_7');
						?>
					</p>
				<?php
			}
		}
	}
?>

<?php
	function theblogger_portfolio_item__short_description()
	{
		if (has_excerpt())
		{
			?>
				<p>
					<?php
						echo get_the_excerpt();
					?>
				</p>
			<?php
		}
	}
?>

<?php
	function theblogger_portfolio_item__image_creator()
	{
		if (has_post_thumbnail())
		{
			$feat_img_id 			 = get_post_thumbnail_id();
			$image_big 				 = "";
			$image_big_width_cropped = wp_get_attachment_image_src($feat_img_id, 'theblogger_image_size_7'); // magnific-popup-width
			
			if ($image_big_width_cropped[1] > $image_big_width_cropped[2])
			{
				$image_big = $image_big_width_cropped[0];
			}
			else
			{
				$image_big_height_cropped = wp_get_attachment_image_src($feat_img_id, 'theblogger_image_size_8'); // magnific-popup-height
				$image_big 				  = $image_big_height_cropped[0];
			}
			
			theblogger_portfolio_item__feat_img($linked_url = $image_big);
		}
	}
?>

<?php
	function theblogger_portfolio_item__link_creator()
	{
		$direct_url = stripcslashes(get_option(get_the_ID() . 'theblogger_featured_video_url'));
		
		if (! empty($direct_url))
		{
			$new_tab = get_option(get_the_ID() . 'theblogger_featured_video_url__new_tab', true);
			
			?>
				<p>
					<a class="button" <?php if ($new_tab != false) { echo 'target="_blank"'; } ?> href="<?php echo esc_url($direct_url); ?>">
						<?php
							esc_html_e('Go To Link', 'theblogger');
						?>
					</a>
				</p>
			<?php
		}
	}
?>

<?php
	function theblogger_portfolio_item__audio_creator()
	{
		$browser_address_url = stripcslashes(get_option(get_the_ID() . 'theblogger_featured_video_url'));
		
		if (! empty($browser_address_url))
		{
			$xml_url 	   = 'http://soundcloud.com/oembed?url=' . $browser_address_url;
			$xml_content   = simplexml_load_file($xml_url);
			$xml_attribute = $xml_content->html; // Get iframe.
			echo $xml_attribute;
		}
	}
?>

<?php
	function theblogger_portfolio_item__video_creator()
	{
		$browser_address_url = stripcslashes(get_option(get_the_ID() . 'theblogger_featured_video_url'));
		
		if (! empty($browser_address_url))
		{
			$browser_address_url__type_youtube = strpos($browser_address_url, 'youtube.com');
			$browser_address_url__type_vimeo   = strpos($browser_address_url, 'vimeo.com');
			
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
		}
	}
?>

<?php
	function theblogger_content__format_image()
	{
		theblogger_portfolio_item__image_creator();
	}
	
	
	function theblogger_content__format_gallery()
	{
		theblogger_portfolio_item__short_description();
	}
	
	
	function theblogger_content__format_audio()
	{
		theblogger_portfolio_item__audio_creator();
		theblogger_portfolio_item__short_description();
	}
	
	
	function theblogger_content__format_video()
	{
		theblogger_portfolio_item__video_creator();
		theblogger_portfolio_item__short_description();
	}
	
	
	function theblogger_content__format_link()
	{
		theblogger_portfolio_item__link_creator();
		theblogger_portfolio_item__short_description();
		theblogger_portfolio_item__feat_img();
	}
?>

<?php
	function theblogger_content__format_chooser()
	{
		if (has_post_format('audio'))
		{
			theblogger_content__format_audio();
		}
		elseif (has_post_format('video'))
		{
			theblogger_content__format_video();
		}
		elseif (has_post_format('image'))
		{
			theblogger_content__format_image();
		}
		elseif (has_post_format('gallery'))
		{
			theblogger_content__format_gallery();
		}
		elseif (has_post_format('link'))
		{
			theblogger_content__format_link();
		}
	}
?>

<?php
	global $theblogger_sidebar;
	theblogger_sidebar_yes_no();
?>

<div id="main" class="site-main">
	<div class="<?php if ($theblogger_sidebar != "") { echo 'layout-medium'; } else { echo 'layout-fixed'; } ?>">
		<div id="primary" class="content-area <?php echo esc_attr( $theblogger_sidebar ); ?>">
			<div id="content" class="site-content" role="main">
				<?php
					while (have_posts()) : the_post();
						?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="post-header portfolio-header post-header-classic">
									<header class="entry-header">
										<?php
											the_title('<h1 class="entry-title">', '</h1>');
										?>
										<div class="entry-meta">
											<?php
												theblogger_meta_like();
												theblogger_meta_share();
											?>
										</div> <!-- .entry-meta -->
									</header> <!-- .entry-header -->
								</div> <!-- .post-header-classic -->
								<div class="entry-content">
									<?php
										theblogger_content__format_chooser();
										theblogger_content();
									?>
								</div> <!-- .entry-content -->
								<?php
									theblogger_single_navigation();
								?>
							</article> <!-- .hentry -->
							<?php
								comments_template("", true);
							?>
						<?php
					endwhile;
				?>
			</div> <!-- #content .site-content -->
		</div> <!-- #primary .content-area -->
		<?php
			if ($theblogger_sidebar != "")
			{
				theblogger_sidebar();
			}
		?>
	</div>
</div> <!-- #main .site-main -->

<?php
	get_footer();
?>