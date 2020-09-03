<?php

	add_image_size('theblogger_image_size_1', 1060); // blog-regular, single-post, 1st-full, gallery-type-slider, gallery-type-grid, main-slider-50%, main-slider-100%, page-default, page-medium
	add_image_size('theblogger_image_size_2', 550); // blog-grid-masonry, blog-list, single-post, about-me-widget, woocommerce-shop-page, portfolio-page-feat-img
	add_image_size('theblogger_image_size_3', 550, 550, true); // blog-circles, related-posts, main-slider-50%, main-slider-75%, link-box-widget, intro-widget, portfolio-page-feat-img
	add_image_size('theblogger_image_size_4', 550, 362, true); // blog-grid-fitRows, portfolio-page-feat-img
	add_image_size('theblogger_image_size_5', 300, 300, true); // prev-post, next-post, page_template-latest_posts
	add_image_size('theblogger_image_size_6', null, 500); // gallery-type-grid
	add_image_size('theblogger_image_size_7', 1920); // magnific-popup-width, gallery-type-slider, main-slider-75%, main-slider-100%, intro-widget bg img, page-full, single-post, (single-portfolio-format --> link, image)
	add_image_size('theblogger_image_size_8', null, 1080); // magnific-popup-height


/* ============================================================================================================================================= */


	if (! isset($content_width))
	{
		$content_width = 700;
		
		// All below values are depending on default Main Style. (Default v2)
		
		if (is_page_template('page_template-full.php'))
		{
			// Flexible.
		}
		elseif (is_page_template('page_template-medium.php'))
		{
			$content_width = 1060;
		}
		elseif (is_page_template('page_template-latest_posts.php'))
		{
			$content_width = 740;
		}
		elseif (is_page_template('page_template-portfolio.php'))
		{
			$content_width = 1060;
		}
		elseif (is_page())
		{
			$content_width = 740;
		}
		elseif (is_singular('portfolio'))
		{
			$content_width = 740;
		}
		elseif (is_single())
		{
			$content_width = 710;
		}
		else
		{
			$content_width = 710;
		}
	}

?>