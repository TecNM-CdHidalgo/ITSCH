<?php

	remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
	
	
	function theblogger_remove_wc_breadcrumbs()
	{
		remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
	}
	
	add_action('init', 'theblogger_remove_wc_breadcrumbs');
	
	
	function theblogger_header_add_to_cart_fragment($fragments)
	{
		ob_start();
		$count = WC()->cart->cart_contents_count;
		
		?>
			<a class="shopping-cart" href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" title="<?php esc_html_e('View your shopping cart', 'theblogger'); ?>">
				<?php
					if ($count > 0)
					{
						?>
							<span>
								<?php
									echo esc_html($count);
								?>
							</span>
						<?php            
					}
				?>
			</a> <!-- .shopping-cart -->
		<?php
		
		$fragments['a.shopping-cart'] = ob_get_clean();
		
		return $fragments;
	}
	
	add_filter('woocommerce_add_to_cart_fragments', 'theblogger_header_add_to_cart_fragment');
	
	
	function theblogger_wc_cart_count()
	{
		if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))))
		{
			$count = WC()->cart->cart_contents_count;
			
			?>
				<a class="shopping-cart" href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" title="<?php esc_html_e('View your shopping cart', 'theblogger'); ?>">
					<?php
						if ($count > 0)
						{
							?>
								<span>
									<?php
										echo esc_html($count);
									?>
								</span>
							<?php
						}
					?>
				</a> <!-- .shopping-cart -->
			<?php
		}
	}
	
	add_action('theblogger_header_cart_icon', 'theblogger_wc_cart_count');


/* ============================================================================================================================================= */


	// $cols contains the current number of products per page based on the value stored on Options -> Reading.
	// Return the number of products you wanna show per page.
	
	function theblogger_loop_shop_per_page($cols)
	{
		$posts_per_page = get_theme_mod('theblogger_setting_products_per_page', '8');
		
		if (! empty($posts_per_page))
		{
			$posts_per_page = intval($posts_per_page);
		}
		else
		{
			$posts_per_page = 8;
		}
		
		$cols = $posts_per_page;
		
		return $cols;
	}
	
	add_filter('loop_shop_per_page', 'theblogger_loop_shop_per_page', 20);


/* ============================================================================================================================================= */


	/**
	 * WooCommerce Extra Feature
	 * --------------------------
	 *
	 * Change number of related products on product page.
	 * Set your own value for 'posts_per_page'.
	 *
	 */
	function woo_related_products_limit()
	{
		global $product;
		
		$args['posts_per_page'] = 6;
		
		return $args;
	}
	
	
	function theblogger_related_products_args($args)
	{
		$posts_per_page = get_theme_mod('theblogger_setting_related_products_count', '3');
		
		if (! empty($posts_per_page))
		{
			$posts_per_page = intval($posts_per_page);
		}
		else
		{
			$posts_per_page = 3;
		}
		
		$args['posts_per_page'] = $posts_per_page; // Related products.
		$args['columns'] = 3; // Arranged in 3 columns.
		
		return $args;
	}
	
	add_filter('woocommerce_output_related_products_args', 'theblogger_related_products_args');


/* ============================================================================================================================================= */


	function theblogger_shop_grid__type()
	{
		$grid_type = 'masonry';
		$grid_type = get_theme_mod('theblogger_setting_shop_grid_type', 'masonry');
		
		if (($grid_type == 'fitRows_square') || ($grid_type == 'fitRows_wide'))
		{
			$grid_type = 'fitRows';
		}
		
		$grid_type = 'data-layout="' . esc_attr($grid_type) . '"';
		
		echo $grid_type;
	}
	
	
	function theblogger_shop_grid__feat_img_size()
	{
		$feat_img_size = 'theblogger_image_size_2';
		$grid_type     = get_theme_mod('theblogger_setting_shop_grid_type', 'masonry');
		
		if ($grid_type == 'fitRows_square')
		{
			$feat_img_size = 'theblogger_image_size_3';
		}
		elseif ($grid_type == 'fitRows_wide')
		{
			$feat_img_size = 'theblogger_image_size_4';
		}
		else
		{
			$feat_img_size = 'theblogger_image_size_2';
		}
		
		return $feat_img_size;
	}
	
	
	function theblogger_shop_grid__item_width()
	{
		$item_width = '320';
		$item_width = get_theme_mod('theblogger_setting_shop_grid_item_width', '320');
		$item_width = 'data-item-width="' . esc_attr($item_width) . '"';
		
		echo $item_width;
	}

?>