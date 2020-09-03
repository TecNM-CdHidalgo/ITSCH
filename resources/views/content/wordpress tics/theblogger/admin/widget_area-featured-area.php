<?php

	function theblogger_meta_box__featured_area($post)
	{
		?>
			<div class="admin-inside-box">
				<?php
					wp_nonce_field('theblogger_meta_box__featured_area', 'theblogger_meta_box_nonce__featured_area');
				?>
				<p>
					<label for="theblogger_select_page_featured_area"><?php esc_html_e('Select Featured Area', 'theblogger'); ?></label>
					<?php
						$select_page_featured_area = get_option('theblogger_select_page_featured_area' . '__' . get_the_ID(), 'No Featured Area');
					?>
					<select id="theblogger_select_page_featured_area" name="theblogger_select_page_featured_area">
						<option <?php if ($select_page_featured_area == 'No Featured Area') { echo 'selected="selected"'; } ?> value="No Featured Area"><?php esc_html_e('No Featured Area', 'theblogger'); ?></option>
						<option <?php if ($select_page_featured_area == 'theblogger_sidebar_13') { echo 'selected="selected"'; } ?> value="theblogger_sidebar_13"><?php esc_html_e('Blog Featured Area', 'theblogger'); ?></option>
						<option <?php if ($select_page_featured_area == 'theblogger_sidebar_14') { echo 'selected="selected"'; } ?> value="theblogger_sidebar_14"><?php esc_html_e('Page Featured Area', 'theblogger'); ?></option>
						<option <?php if ($select_page_featured_area == 'theblogger_sidebar_17') { echo 'selected="selected"'; } ?> value="theblogger_sidebar_17"><?php esc_html_e('Portfolio Featured Area', 'theblogger'); ?></option>
						<option <?php if ($select_page_featured_area == 'theblogger_sidebar_18') { echo 'selected="selected"'; } ?> value="theblogger_sidebar_18"><?php esc_html_e('Shop Featured Area', 'theblogger'); ?></option>
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
									
									if ($select_page_featured_area == $sidebar_id)
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
						esc_html_e('Featured Area is a widget area like sidebars. So you can create new one from Appearance > Theme Options > Widget Areas.', 'theblogger');
					?>
				</p>
				<p class="howto">
					<?php
						esc_html_e('Add Main Slider, Link Box or Intro widgets to your featured area. You can add many widgets to a featured area.', 'theblogger');
					?>
				</p>
			</div>
		<?php
	}
	
	
	function theblogger_save_meta_box__featured_area($post_id)
	{
		if (! isset($_POST['theblogger_meta_box_nonce__featured_area']))
		{
			return $post_id;
		}
		
		$nonce = $_POST['theblogger_meta_box_nonce__featured_area'];
		
		if (! wp_verify_nonce($nonce, 'theblogger_meta_box__featured_area'))
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
		
		update_option('theblogger_select_page_featured_area' . '__' . $post_id, $_POST['theblogger_select_page_featured_area']);
	}
	
	add_action('save_post', 'theblogger_save_meta_box__featured_area');
	
	
	function theblogger_add_meta_boxes__featured_area()
	{
		add_meta_box('theblogger_add_meta_box__featured_area',
					 esc_html__('Featured Area', 'theblogger'),
					 'theblogger_meta_box__featured_area',
					 array('page'),
					 'side',
					 'low');
	}
	
	add_action('add_meta_boxes', 'theblogger_add_meta_boxes__featured_area');


/* ============================================================================================================================================= */


	function theblogger_featured_area()
	{
		if ((! isset($_GET['featured_area'])) && is_home() && is_active_sidebar('theblogger_sidebar_13'))
		{
			?>
				<section class="top-content">
					<div class="layout-medium">
						<div class="featured-area">
							<?php
								dynamic_sidebar('theblogger_sidebar_13');
							?>
						</div>
					</div>
				</section>
			<?php
		}
	}

?>