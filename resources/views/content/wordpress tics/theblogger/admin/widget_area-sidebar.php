<?php

	function theblogger_meta_box__sidebar($post)
	{
		?>
			<div class="admin-inside-box">
				<?php
					wp_nonce_field('theblogger_meta_box__sidebar', 'theblogger_meta_box_nonce__sidebar');
				?>
				<p>
					<label for="theblogger_select_page_sidebar"><?php esc_html_e('Select Sidebar', 'theblogger'); ?></label>
					<?php
						$select_page_sidebar = get_option('theblogger_select_page_sidebar' . '__' . get_the_ID(), 'No Sidebar');
					?>
					<select id="theblogger_select_page_sidebar" name="theblogger_select_page_sidebar">
						<?php
							$current_screen = get_current_screen();
							
							if ($current_screen ->id === 'post')
							{
								$select_page_sidebar = get_option('theblogger_select_page_sidebar' . '__' . get_the_ID(), 'inherit');
								
								?>
									<option <?php if ($select_page_sidebar == 'inherit') { echo 'selected="selected"'; } ?> value="inherit"><?php esc_html_e('Inherit from Customizer', 'theblogger'); ?></option>
								<?php
							}
						?>
						<option <?php if ($select_page_sidebar == 'No Sidebar') { echo 'selected="selected"'; } ?> value="No Sidebar"><?php esc_html_e('No Sidebar', 'theblogger'); ?></option>
						<option <?php if ($select_page_sidebar == 'theblogger_sidebar_1') { echo 'selected="selected"'; } ?> value="theblogger_sidebar_1"><?php esc_html_e('Blog Sidebar', 'theblogger'); ?></option>
						<option <?php if ($select_page_sidebar == 'theblogger_sidebar_2') { echo 'selected="selected"'; } ?> value="theblogger_sidebar_2"><?php esc_html_e('Post Sidebar', 'theblogger'); ?></option>
						<option <?php if ($select_page_sidebar == 'theblogger_sidebar_3') { echo 'selected="selected"'; } ?> value="theblogger_sidebar_3"><?php esc_html_e('Page Sidebar', 'theblogger'); ?></option>
						<option <?php if ($select_page_sidebar == 'theblogger_sidebar_15') { echo 'selected="selected"'; } ?> value="theblogger_sidebar_15"><?php esc_html_e('Portfolio Sidebar', 'theblogger'); ?></option>
						<option <?php if ($select_page_sidebar == 'theblogger_sidebar_16') { echo 'selected="selected"'; } ?> value="theblogger_sidebar_16"><?php esc_html_e('Shop Sidebar', 'theblogger'); ?></option>
						<?php
							$theblogger_sidebars_with_commas = get_option('theblogger_sidebars_with_commas');
							
							if ($theblogger_sidebars_with_commas != "")
							{
								$sidebars = preg_split("/[\s]*[,][\s]*/", $theblogger_sidebars_with_commas);
								
								foreach ($sidebars as $sidebar)
								{
									$sidebar_lowercase = strtolower($sidebar);
									$sidebar_id        = str_replace(" ", '_', $sidebar_lowercase); // Parameters: Old value, New value, String.
									
									$selected = "";
									
									if ($select_page_sidebar == $sidebar_id)
									{
										$selected = 'selected="selected"';
									}
									
									echo '<option ' . $selected . ' value="' . esc_attr($sidebar_id) . '">' . esc_html($sidebar) . '</option>';
								}
							}
						?>
					</select>
				</p>
				<p class="howto">
					<?php
						esc_html_e('Inherit from Customizer: Appearance > Customize > Sidebar > Post Sidebar.', 'theblogger');
					?>
				</p>
				<p class="howto">
					<?php
						esc_html_e('Sidebar is a widget area. You can find all available sidebars in your Widgets page under Appearance menu or Widgets section in Customizer.', 'theblogger');
					?>
				</p>
				<p class="howto">
					<?php
						esc_html_e('Also you can create new sidebars from Appearance > Theme Options > Widget Areas.', 'theblogger');
					?>
				</p>
			</div>
		<?php
	}
	
	
	function theblogger_save_meta_box__sidebar($post_id)
	{
		if (! isset($_POST['theblogger_meta_box_nonce__sidebar']))
		{
			return $post_id;
		}
		
		$nonce = $_POST['theblogger_meta_box_nonce__sidebar'];
		
		if (! wp_verify_nonce($nonce, 'theblogger_meta_box__sidebar'))
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
		
		update_option('theblogger_select_page_sidebar' . '__' . $post_id, $_POST['theblogger_select_page_sidebar']);
	}
	
	add_action('save_post', 'theblogger_save_meta_box__sidebar');
	
	
	function theblogger_add_meta_boxes__sidebar()
	{
		add_meta_box(
			'theblogger_add_meta_box__sidebar',
			esc_html__('Sidebar', 'theblogger'),
			'theblogger_meta_box__sidebar',
			array('page', 'post'),
			'side',
			'low'
		);
	}
	
	add_action('add_meta_boxes', 'theblogger_add_meta_boxes__sidebar');


/* ============================================================================================================================================= */


	function theblogger_sidebar_yes_no()
	{
		global $theblogger_sidebar;
		$theblogger_sidebar = 'with-sidebar';
		
		if (isset($_GET['sidebar']))
		{
			if ($_GET['sidebar'] == 'no')
			{
				$theblogger_sidebar = "";
			}
		}
		else
		{
			if (is_singular('portfolio'))
			{
				$sidebar_portfolio_post = get_theme_mod('theblogger_setting_sidebar_portfolio_post', 'No');
				
				if ($sidebar_portfolio_post != 'Yes')
				{
					$theblogger_sidebar = "";
				}
			}
			elseif (is_single())
			{
				$sidebar_post        = get_theme_mod('theblogger_setting_sidebar_post', 'Yes');
				$select_page_sidebar = get_option('theblogger_select_page_sidebar' . '__' . get_the_ID(), 'inherit');
				
				if ((($sidebar_post == 'No') && ($select_page_sidebar == 'inherit')) || ($select_page_sidebar == 'No Sidebar'))
				{
					$theblogger_sidebar = "";
				}
			}
			else
			{
				if (is_category() || is_tag() || is_author() || is_date() || is_search())
				{
					$sidebar_archive = get_theme_mod('theblogger_setting_sidebar_archive', 'No');
					
					if ($sidebar_archive != 'Yes')
					{
						$theblogger_sidebar = "";
					}
				}
				else
				{
					$sidebar_blog = get_theme_mod('theblogger_setting_sidebar_blog', 'Yes');
					
					if ($sidebar_blog == 'No')
					{
						$theblogger_sidebar = "";
					}
				}
			}
		}
	}


/* ============================================================================================================================================= */


	function theblogger_sidebar()
	{
		if (! is_404())
		{
			?>
				<div id="secondary" class="widget-area sidebar" role="complementary">
				    <div class="sidebar-wrap">
						<div class="sidebar-content">
							<?php
								if (is_page())
								{
									$select_page_sidebar = get_option('theblogger_select_page_sidebar' . '__' . get_the_ID(), 'No Sidebar');
									dynamic_sidebar($select_page_sidebar); // Page sidebar. (for default and custom page templates)
								}
								elseif (is_post_type_archive('product') || is_tax('product_cat') || is_singular('product'))
								{
									$shop_page_id        = get_option('woocommerce_shop_page_id');
									$select_page_sidebar = get_option('theblogger_select_page_sidebar' . '__' . $shop_page_id, 'No Sidebar');
									dynamic_sidebar($select_page_sidebar); // Shop sidebar. (WooCommerce)
								}
								elseif (is_tax('portfolio-category') || is_singular('portfolio'))
								{
									dynamic_sidebar('theblogger_sidebar_15'); // Portfolio sidebar.
								}
								elseif (is_singular('post'))
								{
									$select_page_sidebar = get_option('theblogger_select_page_sidebar' . '__' . get_the_ID(), 'inherit');
									
									if ($select_page_sidebar == 'inherit')
									{
										if (is_active_sidebar('theblogger_sidebar_2'))
										{
											dynamic_sidebar('theblogger_sidebar_2'); // Post sidebar.
										}
										else
										{
											dynamic_sidebar('theblogger_sidebar_1'); // Blog sidebar.
										}
									}
									else
									{
										if ($select_page_sidebar != 'No Sidebar')
										{
											dynamic_sidebar($select_page_sidebar); // Post sidebar.
										}
									}
								}
								else
								{
									dynamic_sidebar('theblogger_sidebar_1'); // Blog sidebar.
								}
							?>
						</div> <!-- .sidebar-content -->
					</div> <!-- .sidebar-wrap -->
				</div> <!-- #secondary .widget-area .sidebar -->
			<?php
		}
	}

?>