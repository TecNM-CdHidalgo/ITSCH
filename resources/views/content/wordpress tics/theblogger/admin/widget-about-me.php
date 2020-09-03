<?php

	class theblogger_Widget_About_Me extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct('theblogger_widget_about_me',
								esc_html__( '(TheBlogger) About Me', 'theblogger' ),
								array( 'description' => esc_html__( 'About me widget.', 'theblogger' ) ) );
		}
		
		public function form( $instance )
		{
			if ( isset( $instance[ 'title' ] ) ) { $title = $instance[ 'title' ]; } else { $title = ""; }
			if ( isset( $instance[ 'theblogger_image_url' ] ) ) { $theblogger_image_url = $instance[ 'theblogger_image_url' ]; } else { $theblogger_image_url = ""; }
			if ( isset( $instance[ 'theblogger_description' ] ) ) { $theblogger_description = $instance[ 'theblogger_description' ]; } else { $theblogger_description = ""; }
			if ( isset( $instance[ 'theblogger_more_link_url' ] ) ) { $theblogger_more_link_url = $instance[ 'theblogger_more_link_url' ]; } else { $theblogger_more_link_url = ""; }
			if ( isset( $instance[ 'theblogger_style' ] ) ) { $theblogger_style = $instance[ 'theblogger_style' ]; } else { $theblogger_style = ""; }
			
			?>
				<table style="width: 100%; margin-top: 5px;">
					<tr>
						<td>
							<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>">
								<?php
									echo esc_html__('Title', 'theblogger');
								?>
							</label>
						</td>
						<td>
							<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php echo esc_attr( $title ); ?>">
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr( $this->get_field_id('theblogger_image_url') ); ?>">
								<?php
									esc_html_e('Image', 'theblogger');
								?>
							</label>
						</td>
						<td>
							<input type="hidden" id="<?php echo esc_attr( $this->get_field_id('theblogger_image_url') ); ?>" name="<?php echo esc_attr( $this->get_field_name('theblogger_image_url') ); ?>" value="<?php echo esc_attr( $theblogger_image_url ); ?>">
							<input type="button" class="button button-browse" value="<?php esc_html_e('Browse', 'theblogger'); ?>">
							<?php
								$image = wp_get_attachment_image_src($theblogger_image_url, 'theblogger_image_size_2');
							?>
							<img style="max-height: 25px;" alt="" src="<?php echo esc_url($image[0]); ?>">
						</td>
					</tr>
				</table>
				<table style="width: 100%;">
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
							<label for="<?php echo esc_attr( $this->get_field_id('theblogger_more_link_url') ); ?>">
								<?php
									echo esc_html__('More Link URL', 'theblogger');
								?>
							</label>
						</td>
						<td>
							<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('theblogger_more_link_url') ); ?>" name="<?php echo esc_attr( $this->get_field_name('theblogger_more_link_url') ); ?>" value="<?php echo esc_attr( $theblogger_more_link_url ); ?>">
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_style')); ?>"><?php esc_html_e('Style', 'theblogger'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('theblogger_style')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_style')); ?>">
								<option <?php if ($theblogger_style == 'is-about-me-widget-default') { echo 'selected="selected"'; } ?> value="is-about-me-widget-default"><?php esc_html_e('Default', 'theblogger'); ?></option>
								<option <?php if ($theblogger_style == 'is-about-me-widget-round') { echo 'selected="selected"'; } ?> value="is-about-me-widget-round"><?php esc_html_e('Rounded Image', 'theblogger'); ?></option>
							</select>
						</td>
					</tr>
				</table>
				
				<hr>
			<?php
		}
		
		public function update( $new_instance, $old_instance )
		{
			$instance = array();
			$instance['title'] = strip_tags( $new_instance['title'] );
			$instance['theblogger_image_url'] = strip_tags( $new_instance['theblogger_image_url'] );
			$instance['theblogger_description'] = strip_tags( $new_instance['theblogger_description'] );
			$instance['theblogger_more_link_url'] = strip_tags( $new_instance['theblogger_more_link_url'] );
			$instance['theblogger_style'] = strip_tags( $new_instance['theblogger_style'] );
			return $instance;
		}
		
		public function widget( $args, $instance )
		{
			extract( $args );
			$title                    = apply_filters( 'widget_title', $instance['title'] );
			$theblogger_image_url     = apply_filters( 'theblogger_image_url', $instance['theblogger_image_url'] );
			$theblogger_description   = apply_filters( 'theblogger_description', $instance['theblogger_description'] );
			$theblogger_more_link_url = apply_filters( 'theblogger_more_link_url', $instance['theblogger_more_link_url'] );
			$theblogger_style         = apply_filters( 'theblogger_style', $instance['theblogger_style'] );
			
			echo $before_widget;
			
				if (! empty($title))
				{
					echo $before_title . $title . $after_title;
				}
				
				?>
					<div class="about-me-wrap <?php echo esc_attr($theblogger_style); ?>">
						<?php
							$image = wp_get_attachment_image_src($theblogger_image_url, 'theblogger_image_size_2');
						?>
						<img alt="<?php bloginfo('name'); ?>" src="<?php echo esc_url($image[0]); ?>">
						
						<?php
							echo esc_html($theblogger_description);
						?>
						
						<?php
							if (! empty($theblogger_more_link_url))
							{
								?>
									<a href="<?php echo esc_url($theblogger_more_link_url); ?>"><?php esc_html_e('more', 'theblogger'); ?></a>
								<?php
							}
						?>
					</div>
				<?php
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', create_function('', 'register_widget( "theblogger_widget_about_me" );'));

?>