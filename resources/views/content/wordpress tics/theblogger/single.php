<?php
	get_header();
?>

<?php
	function theblogger_entry_header()
	{
		?>
			<header class="entry-header">
				<?php
					theblogger_meta('above_title');
					the_title('<h1 class="entry-title">', '</h1>');
					theblogger_meta('below_title');
				?>
			</header> <!-- .entry-header -->
		<?php
	}
?>

<?php
	function theblogger_featured_image($post_header_top, $parallax, $overlay)
	{
		if ($parallax)
		{
			?>
				<div class="post-thumbnail" style="background-image: url(<?php the_post_thumbnail_url('theblogger_image_size_2'); ?>);" data-medium-image="<?php the_post_thumbnail_url('theblogger_image_size_1'); ?>" data-large-image="<?php the_post_thumbnail_url('theblogger_image_size_7'); ?>">
					<div class="post-wrap">
						<?php
							if ($overlay)
							{
								theblogger_entry_header();
							}
						?>
					</div> <!-- .post-wrap -->
				</div> <!-- .post-thumbnail -->
			<?php
		}
		else
		{
			if (has_post_thumbnail())
			{
				?>
					<div class="featured-image">
						<?php
							if (($post_header_top == 'is-top-content-single-medium') ||
								($post_header_top == 'is-top-content-single-full') ||
								($post_header_top == 'is-top-content-single-full-margins'))
							{
								the_post_thumbnail('theblogger_image_size_7');
							}
							else
							{
								the_post_thumbnail('theblogger_image_size_1');
							}
						?>
					</div> <!-- .featured-image -->
				<?php
			}
		}
	}
?>

<?php
	function theblogger_featured_video($browser_address_url, $parallax, $overlay)
	{
		if ($parallax)
		{
			?>
				<div class="post-thumbnail" data-parallax-video="<?php echo esc_url($browser_address_url); ?>">
					<div class="post-wrap">
						<?php
							if ($overlay)
							{
								theblogger_entry_header();
							}
						?>
					</div> <!-- .post-wrap -->
				</div> <!-- .post-thumbnail -->
			<?php
		}
		else
		{
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
		}
	}
?>

<?php
	function theblogger_featured_media($post_header_top, $post_header_inline, $featured_image_position, $where = "", $parallax, $overlay)
	{
		$browser_address_url = stripcslashes(get_option(get_the_ID() . 'theblogger_featured_video_url'));
		$browser_address_url = trim($browser_address_url); // Strip whitespace (or other characters) from the beginning and end of the string.
		
		if (($where == $featured_image_position) || ($post_header_inline == 'is-top-content-single-medium with-title-full'))
		{
			if (($post_header_inline == 'post-header-classic is-featured-image-left') ||
				($post_header_inline == 'post-header-classic is-featured-image-right')) // Force for Image Left and Image Right.
			{
				if (has_post_thumbnail())
				{
					theblogger_featured_image($post_header_top, $parallax, $overlay);
				}
				elseif (! empty($browser_address_url))
				{
					theblogger_featured_video($browser_address_url, $parallax, $overlay);
				}
			}
			elseif (! empty($browser_address_url))
			{
				theblogger_featured_video($browser_address_url, $parallax, $overlay);
			}
			else
			{
				theblogger_featured_image($post_header_top, $parallax, $overlay);
			}
		}
	}
?>

<?php
	function theblogger_post_header__content($post_header_top, $post_header_inline, $featured_image_position, $parallax, $overlay, $only_title, $only_media)
	{
		$post_header_inline_out = $post_header_inline;
		
		if (((($post_header_inline == 'post-header-classic is-featured-image-left') || ($post_header_inline == 'post-header-classic is-featured-image-right')) && (! has_post_thumbnail())) ||
			  ($post_header_inline == 'is-top-content-single-medium with-title-full')) // Force for: Image Left, Image Right and Title Full.
		{
			$post_header_inline_out = 'post-header-classic';
		}
		
		$meta_cat_link_style = get_theme_mod('theblogger_setting_meta_cat_link_style', 'is-cat-link-border-bottom');
		
		?>
			<div class="post-header <?php echo esc_attr($post_header_inline_out); ?> <?php echo esc_attr($meta_cat_link_style); ?>">
				<?php
					if ($parallax)
					{
						if ((! $overlay) && ($featured_image_position != 'above_title'))
						{
							theblogger_entry_header();
						}
						
						theblogger_featured_media($post_header_top,
												  $post_header_inline,
												  $featured_image_position,
												  $where = $featured_image_position,
												  $parallax,
												  $overlay);
					}
					else
					{
						if ($only_title)
						{
							theblogger_entry_header();
						}
						elseif ($only_media)
						{
							theblogger_featured_media($post_header_top,
													  $post_header_inline,
													  $featured_image_position,
													  $where = $featured_image_position,
													  $parallax,
													  $overlay);
						}
						else
						{
							if (($post_header_inline == 'post-header-classic is-featured-image-left') ||
								($post_header_inline == 'post-header-classic is-featured-image-right')) // Force for Image Left and Image Right.
							{
								theblogger_entry_header();
								theblogger_featured_media($post_header_top,
														  $post_header_inline,
														  $featured_image_position,
														  $where = $featured_image_position,
														  $parallax,
														  $overlay);
							}
							else
							{
								theblogger_featured_media($post_header_top,
														  $post_header_inline,
														  $featured_image_position,
														  $where = 'above_title',
														  $parallax,
														  $overlay);
								theblogger_entry_header();
								theblogger_featured_media($post_header_top,
														  $post_header_inline,
														  $featured_image_position,
														  $where = 'below_title',
														  $parallax,
														  $overlay);
							}
						}
					}
				?>
			</div> <!-- .post-header -->
		<?php
	}
?>

<?php
	function theblogger_post_header__inline($post_header_top, $post_header_inline, $featured_image_position, $parallax, $overlay, $only_title, $only_media)
	{
		theblogger_post_header__content($post_header_top,
										$post_header_inline,
										$featured_image_position,
										$parallax,
										$overlay,
										$only_title,
										$only_media);
	}
?>

<?php
	function theblogger_post_header__top($post_header_top, $post_header_inline, $featured_image_position, $parallax, $overlay, $only_title, $only_media)
	{
		?>
			<section class="top-content-single <?php echo esc_attr($post_header_top); ?>">
				<div class="layout-medium">
					<?php
						theblogger_post_header__content($post_header_top,
														$post_header_inline,
														$featured_image_position,
														$parallax,
														$overlay,
														$only_title,
														$only_media);
					?>
				</div> <!-- .layout-medium -->
			</section> <!-- .top-content-single -->
		<?php
	}
?>

<?php
	function theblogger_post_header__inline_chooser($post_style, $post_header_top, $featured_image_position, $only_title, $only_media)
	{
		switch ($post_style)
		{
			case 'post-header-classic':
			case 'post-header-classic is-featured-image-left':
			case 'post-header-classic is-featured-image-right':
			case 'is-top-content-single-medium with-title-full':
			
				theblogger_post_header__inline($post_header_top,
											   $post_header_inline = $post_style,
											   $featured_image_position,
											   $parallax = false,
											   $overlay  = false,
											   $only_title,
											   $only_media); // POST STYLE: Classic, Image Left, Image Right, Title Full.
				break;
			
			case 'post-header-overlay post-header-overlay-inline is-post-dark':
			
				theblogger_post_header__inline($post_header_top,
											   $post_header_inline = $post_style,
											   $featured_image_position,
											   $parallax = true,
											   $overlay  = true,
											   $only_title,
											   $only_media); // POST STYLE: Overlay.
				break;
		}
	}
?>

<?php
	function theblogger_post_header__top_chooser($post_style, $post_header_top, $featured_image_position, $only_title, $only_media)
	{
		switch ($post_style)
		{
			case 'is-top-content-single-medium':
			case 'is-top-content-single-full':
			case 'is-top-content-single-full-margins':
			case 'is-top-content-single-medium with-title-full':
			
				theblogger_post_header__top($post_header_top 	= $post_style,
											$post_header_inline = 'post-header-classic',
											$featured_image_position,
											$parallax = false,
											$overlay  = false,
											$only_title,
											$only_media); // POST STYLE: Classic Medium, Classic Full, Classic Full with Margins, Title Full.
				break;
			
			case 'is-top-content-single-medium with-parallax':
			case 'is-top-content-single-full with-parallax':
			case 'is-top-content-single-full-margins with-parallax':
			
				theblogger_post_header__top($post_header_top 	= $post_style,
											$post_header_inline = 'post-header-classic',
											$featured_image_position,
											$parallax = true,
											$overlay  = false,
											$only_title,
											$only_media); // POST STYLE: Classic Medium Parallax, Classic Full Parallax, Classic Full with Margins Parallax.
				break;
			
			case 'is-top-content-single-medium with-overlay':
			case 'is-top-content-single-full with-overlay':
			case 'is-top-content-single-full-margins with-overlay':
			
				theblogger_post_header__top($post_header_top 	= $post_style,
											$post_header_inline = 'post-header-overlay is-post-dark',
											$featured_image_position,
											$parallax = true,
											$overlay  = true,
											$only_title,
											$only_media); // POST STYLE: Overlay Medium, Overlay Full, Overlay Full with Margins.
				break;
		}
	}
?>

<?php
	function theblogger_post_header($post_header_top)
	{
		$featured_image_position = get_theme_mod('theblogger_setting_post_featured_image_position', 'below_title');
		$post_style = 'inherit'; // Default: Inherit from Customizer.
		$post_style = get_option('theblogger_post_style' . '__' . get_the_ID(), 'inherit'); // Get post style class. (edit screen)
		
		if (($post_style == 'inherit') || ($post_style == null) || ($post_style == false))
		{
			$post_style = get_theme_mod('theblogger_setting_post_style_global', 'post-header-classic'); // Get post style class. (customizer)
		}
		
		$only_title = false; // Top header with just title w/ meta.
		$only_media = false; // Inline header with just featured image/video.
		
		if ($post_header_top && ($post_style == 'is-top-content-single-medium with-title-full')) // Title Full. (top header)
		{
			$only_title = true;
			$only_media = false;
			theblogger_post_header__top_chooser($post_style,
												$post_header_top,
												$featured_image_position,
												$only_title,
												$only_media);
		}
		elseif ((! $post_header_top) && ($post_style == 'is-top-content-single-medium with-title-full')) // Title Full. (inline header)
		{
			$only_title = false;
			$only_media = true;
			theblogger_post_header__inline_chooser($post_style,
												   $post_header_top,
												   $featured_image_position,
												   $only_title,
												   $only_media);
		}
		elseif ($post_style != 'is-top-content-single-medium with-title-full') // NOT "Title Full".
		{
			$browser_address_url = stripcslashes(get_option(get_the_ID() . 'theblogger_featured_video_url'));
			$browser_address_url = trim($browser_address_url); // Strip whitespace (or other characters) from the beginning and end of the string.
			
			if ((! $post_header_top) && empty($browser_address_url) && (! has_post_thumbnail())) // NO featured media.
			{
				theblogger_post_header__inline_chooser($post_style = 'post-header-classic',
													   $post_header_top,
													   $featured_image_position,
													   $only_title,
													   $only_media); // Force for Classic style.
			}
			elseif ($post_header_top && ((! empty($browser_address_url)) || has_post_thumbnail()))
			{
				switch ($post_style)
				{
					case 'is-top-content-single-medium':
					case 'is-top-content-single-medium with-parallax':
					case 'is-top-content-single-full':
					case 'is-top-content-single-full with-parallax':
					case 'is-top-content-single-full-margins':
					case 'is-top-content-single-full-margins with-parallax':
					
						if ($featured_image_position == 'above_title')  // Force for Classic style.
						{
							$only_media = true;
						}
						
						break;
				}
				
				theblogger_post_header__top_chooser($post_style,
													$post_header_top,
													$featured_image_position,
													$only_title,
													$only_media);
			}
			elseif (! $post_header_top)
			{
				switch ($post_style)
				{
					case 'is-top-content-single-medium':
					case 'is-top-content-single-medium with-parallax':
					case 'is-top-content-single-full':
					case 'is-top-content-single-full with-parallax':
					case 'is-top-content-single-full-margins':
					case 'is-top-content-single-full-margins with-parallax':
					
						if ($featured_image_position == 'above_title')  // Force for Classic style.
						{
							$only_title = true;
							$post_style = 'post-header-classic';
						}
						
						break;
				}
				
				theblogger_post_header__inline_chooser($post_style,
													   $post_header_top,
													   $featured_image_position,
													   $only_title,
													   $only_media);
			}
		}
	}
?>

<?php
	global $theblogger_sidebar;
	theblogger_sidebar_yes_no();
?>

<?php
	while (have_posts()) : the_post();
?>

<?php
	theblogger_post_header($post_header_top = true); // Press top header.
?>

<div id="main" class="site-main">
	<div class="<?php if ($theblogger_sidebar != "") { echo 'layout-medium'; } else { echo 'layout-fixed'; } ?>">
		<div id="primary" class="content-area <?php echo esc_attr($theblogger_sidebar); ?>">
			<div id="content" class="site-content" role="main">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php
						theblogger_post_header($post_header_top = false); // Press inline header.
					?>
					<div class="entry-content">
						<?php
							theblogger_content();
						?>
					</div> <!-- .entry-content -->
					<?php
						theblogger_post_tags();
					?>
					<?php
						theblogger_meta('below_content');
					?>
					<?php
						theblogger_share_links();
					?>
					<?php
						theblogger_single_navigation();
					?>
					<?php
						theblogger_about_author();
					?>
					<?php
						theblogger_related_posts();
					?>
				</article> <!-- .post -->
				<?php
					comments_template("", true);
				?>
			</div> <!-- #content .site-content -->
		</div> <!-- #primary .content-area -->
<?php
	endwhile;
?>

		<?php
			if ($theblogger_sidebar != "")
			{
				theblogger_sidebar();
			}
		?>
	</div> <!-- layout -->
</div> <!-- #main .site-main -->

<?php
	get_footer();
?>