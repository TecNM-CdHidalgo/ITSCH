<?php

	class theblogger_Widget_Intro extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct('theblogger_widget_intro',
								esc_html__('(TheBlogger) Intro', 'theblogger'),
								array('description' => esc_html__('Intro widget.', 'theblogger')));
		}
		
		public function form($instance)
		{
			if (isset($instance['title'])) { $title = $instance['title']; } else { $title = ""; }
			if (isset($instance['theblogger_image_url'])) { $theblogger_image_url = $instance['theblogger_image_url']; } else { $theblogger_image_url = ""; }
			if (isset($instance['theblogger_bg_image_url'])) { $theblogger_bg_image_url = $instance['theblogger_bg_image_url']; } else { $theblogger_bg_image_url = ""; }
			if (isset($instance['theblogger_bg_video_embed'])) { $theblogger_bg_video_embed = $instance['theblogger_bg_video_embed']; } else { $theblogger_bg_video_embed = ""; }
			if (isset($instance['theblogger_bg_video_self_hosted'])) { $theblogger_bg_video_self_hosted = $instance['theblogger_bg_video_self_hosted']; } else { $theblogger_bg_video_self_hosted = ""; }
			if (isset($instance['theblogger_bg_video_parallax'])) { $theblogger_bg_video_parallax = $instance['theblogger_bg_video_parallax']; } else { $theblogger_bg_video_parallax = ""; }
			if (isset($instance['theblogger_description'])) { $theblogger_description = $instance['theblogger_description']; } else { $theblogger_description = ""; }
			if (isset($instance['theblogger_button_text'])) { $theblogger_button_text = $instance['theblogger_button_text']; } else { $theblogger_button_text = ""; }
			if (isset($instance['theblogger_button_url'])) { $theblogger_button_url = $instance['theblogger_button_url']; } else { $theblogger_button_url = ""; }
			if (isset($instance['theblogger_new_tab'])) { $theblogger_new_tab = $instance['theblogger_new_tab']; } else { $theblogger_new_tab = ""; }
			
			?>
				<table style="width: 100%; margin-top: 5px;">
					<tr>
						<td>
							<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e('Title', 'theblogger'); ?></label>
						</td>
						<td>
							<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>">
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_image_url')); ?>"><?php esc_html_e('Image', 'theblogger'); ?></label>
						</td>
						<td>
							<input type="hidden" id="<?php echo esc_attr($this->get_field_id('theblogger_image_url')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_image_url')); ?>" value="<?php echo esc_attr($theblogger_image_url); ?>">
							<input type="button" class="button button-browse" value="<?php esc_html_e('Browse', 'theblogger'); ?>">
							<?php
								$image = wp_get_attachment_image_src($theblogger_image_url, 'theblogger_image_size_2');
							?>
							<img style="max-height: 25px;" alt="" src="<?php echo esc_url($image[0]); ?>">
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_bg_image_url')); ?>"><?php esc_html_e('Background Image', 'theblogger'); ?></label>
						</td>
						<td>
							<input type="hidden" id="<?php echo esc_attr($this->get_field_id('theblogger_bg_image_url')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_bg_image_url')); ?>" value="<?php echo esc_attr($theblogger_bg_image_url); ?>">
							<input type="button" class="button button-browse" value="<?php esc_html_e('Browse', 'theblogger'); ?>">
							<?php
								$image = wp_get_attachment_image_src($theblogger_bg_image_url, 'theblogger_image_size_2');
							?>
							<img style="max-height: 25px;" alt="" src="<?php echo esc_url($image[0]); ?>">
						</td>
					</tr>
				</table>
				<table style="width: 100%; margin-top: 10px;">
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_bg_video_embed')); ?>"><?php esc_html_e('Background Embed Video', 'theblogger'); ?></label>
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('theblogger_bg_video_embed')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_bg_video_embed')); ?>" value="<?php echo esc_attr($theblogger_bg_video_embed); ?>">
							<span style="font-size: 11px; color: #999999;"><?php esc_html_e('YouTube, Vimeo embed code.', 'theblogger'); ?></span>
						</td>
					</tr>
				</table>
				<table style="width: 100%; margin-top: 5px;">
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_bg_video_self_hosted')); ?>"><?php esc_html_e('Background Self-Hosted Video', 'theblogger'); ?></label>
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" id="<?php echo esc_attr($this->get_field_id('theblogger_bg_video_self_hosted')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_bg_video_self_hosted')); ?>" value="<?php echo esc_url($theblogger_bg_video_self_hosted); ?>">
							<input type="button" class="button button-browse-video" value="<?php esc_html_e('Browse', 'theblogger'); ?>">
							<span style="font-size: 11px; color: #999999;"><?php esc_html_e('MP4 video.', 'theblogger'); ?></span>
						</td>
					</tr>
				</table>
				<table style="width: 100%; margin-top: 5px;">
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_bg_video_parallax')); ?>"><?php esc_html_e('Background Parallax Video', 'theblogger'); ?></label>
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('theblogger_bg_video_parallax')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_bg_video_parallax')); ?>" value="<?php echo esc_url($theblogger_bg_video_parallax); ?>">
							<span style="font-size: 11px; color: #999999;"><?php esc_html_e('YouTube, Vimeo page url.', 'theblogger'); ?></span>
						</td>
					</tr>
				</table>
				<table style="width: 100%; margin-top: 5px;">
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_description')); ?>"><?php esc_html_e('Description', 'theblogger'); ?></label>
						</td>
					</tr>
					<tr>
						<td>
							<textarea class="widefat" rows="5" cols="20" id="<?php echo esc_attr($this->get_field_id('theblogger_description')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_description')); ?>"><?php echo esc_textarea($theblogger_description); ?></textarea>
						</td>
					</tr>
				</table>
				<table style="width: 100%;">
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_button_text')); ?>"><?php echo esc_html__('Button Text', 'theblogger'); ?></label>
						</td>
						<td>
							<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('theblogger_button_text') ); ?>" name="<?php echo esc_attr( $this->get_field_name('theblogger_button_text') ); ?>" value="<?php echo esc_attr( $theblogger_button_text ); ?>">
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_button_url')); ?>"><?php echo esc_html__('Button URL', 'theblogger'); ?></label>
						</td>
						<td>
							<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('theblogger_button_url') ); ?>" name="<?php echo esc_attr( $this->get_field_name('theblogger_button_url') ); ?>" value="<?php echo esc_attr( $theblogger_button_url ); ?>">
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_new_tab')); ?>"><?php esc_html_e('New Tab', 'theblogger'); ?></label>
						</td>
						<td>
							<select id="<?php echo esc_attr($this->get_field_id('theblogger_new_tab')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_new_tab')); ?>">
								<option <?php if ($theblogger_new_tab == 'no') { echo 'selected="selected"'; } ?> value="no"><?php esc_html_e('No', 'theblogger'); ?></option>
								<option <?php if ($theblogger_new_tab == 'yes') { echo 'selected="selected"'; } ?> value="yes"><?php esc_html_e('Yes', 'theblogger'); ?></option>
							</select>
						</td>
					</tr>
				</table>
				
				<hr>
			<?php
		}
		
		public function update($new_instance, $old_instance)
		{
			$instance = array();
			$instance['title'] 					   		 = strip_tags($new_instance['title']);
			$instance['theblogger_image_url'] 	   		 = strip_tags($new_instance['theblogger_image_url']);
			$instance['theblogger_bg_image_url']   		 = strip_tags($new_instance['theblogger_bg_image_url']);
			$instance['theblogger_bg_video_embed'] 		 = strip_tags($new_instance['theblogger_bg_video_embed'], '<iframe>');
			$instance['theblogger_bg_video_self_hosted'] = strip_tags($new_instance['theblogger_bg_video_self_hosted']);
			$instance['theblogger_bg_video_parallax'] 	 = strip_tags($new_instance['theblogger_bg_video_parallax']);
			$instance['theblogger_description']    		 = strip_tags($new_instance['theblogger_description']);
			$instance['theblogger_button_text']    		 = strip_tags($new_instance['theblogger_button_text']);
			$instance['theblogger_button_url']     		 = strip_tags($new_instance['theblogger_button_url']);
			$instance['theblogger_new_tab'] 	   		 = strip_tags($new_instance['theblogger_new_tab']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$title                     		 = apply_filters('widget_title', $instance['title']);
			$theblogger_image_url      		 = apply_filters('theblogger_image_url', $instance['theblogger_image_url']);
			$theblogger_bg_image_url   		 = apply_filters('theblogger_bg_image_url', $instance['theblogger_bg_image_url']);
			$theblogger_bg_video_embed 		 = apply_filters('theblogger_bg_video_embed', $instance['theblogger_bg_video_embed']);
			$theblogger_bg_video_self_hosted = apply_filters('theblogger_bg_video_self_hosted', $instance['theblogger_bg_video_self_hosted']);
			$theblogger_bg_video_parallax 	 = apply_filters('theblogger_bg_video_parallax', $instance['theblogger_bg_video_parallax']);
			$theblogger_description    		 = apply_filters('theblogger_description', $instance['theblogger_description']);
			$theblogger_button_text    		 = apply_filters('theblogger_button_text', $instance['theblogger_button_text']);
			$theblogger_button_url     		 = apply_filters('theblogger_button_url', $instance['theblogger_button_url']);
			$theblogger_new_tab        		 = apply_filters('theblogger_new_tab', $instance['theblogger_new_tab']);
			
			echo $before_widget;
			
				if (! empty($title))
				{
					echo $before_title . $title . $after_title;
				}
				
				?>
					<?php
						$image_bg = wp_get_attachment_image_src($theblogger_bg_image_url, 'theblogger_image_size_7');
					?>
					<div class="intro" style="background-image: url(<?php echo esc_url($image_bg[0]); ?>);" data-parallax-video="<?php echo esc_url($theblogger_bg_video_parallax); ?>">
						<?php
							if (! empty($theblogger_bg_video_embed))
							{
								?>
									<div class="intro-vid">
										<?php
											echo $theblogger_bg_video_embed; // An iframe.
										?>
									</div>
								<?php
							}
							elseif (! empty($theblogger_bg_video_self_hosted))
							{
								?>
									<div class="intro-vid">
										<video autoplay loop>
											<source type="video/mp4" src="<?php echo esc_url($theblogger_bg_video_self_hosted); ?>">
										</video>
									</div>
								<?php
							}
						?>
						<div class="intro-content">
							<?php
								$image = wp_get_attachment_image_src($theblogger_image_url, 'theblogger_image_size_3');
								
								if (! empty($image))
								{
									?>
										<img alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($image[0]); ?>">
									<?php
								}
							?>
							<div class="intro-text">
								<h1>
									<?php
										echo esc_html($theblogger_description);
									?>
								</h1>
								<?php
									if (! empty($theblogger_button_text))
									{
										?>
											<a class="button" <?php if ($theblogger_new_tab == 'yes') { echo 'target="_blank"'; } ?> href="<?php echo esc_url($theblogger_button_url); ?>">
												<?php
													echo esc_html($theblogger_button_text);
												?>
											</a>
										<?php
									}
								?>
							</div> <!-- .intro-text -->
						</div> <!-- .intro-content -->
					</div> <!-- .intro -->
				<?php
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', create_function('', 'register_widget( "theblogger_widget_intro" );'));

?>