<?php

	class theblogger_Widget_Main_Slider extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct('theblogger_widget_main_slider',
								esc_html__('(TheBlogger) Main Slider', 'theblogger'),
								array('description' => esc_html__("Display your site's posts.", 'theblogger')));
		}
		
		public function form($instance)
		{
			if (isset($instance['title'])) { $title = $instance[ 'title' ]; } else { $title = ""; }
			if (isset($instance['theblogger_widget_option_1'])) { $theblogger_widget_option_1 = $instance['theblogger_widget_option_1']; } else { $theblogger_widget_option_1 = 'sticky'; }
			if (isset($instance['theblogger_widget_option_2'])) { $theblogger_widget_option_2 = $instance['theblogger_widget_option_2']; } else { $theblogger_widget_option_2 = '5'; }
			if (isset($instance['theblogger_widget_option_3'])) { $theblogger_widget_option_3 = $instance['theblogger_widget_option_3']; } else { $theblogger_widget_option_3 = 'w-50'; }
			if (isset($instance['theblogger_widget_option_4'])) { $theblogger_widget_option_4 = $instance['theblogger_widget_option_4']; } else { $theblogger_widget_option_4 = ""; }
			if (isset($instance['theblogger_widget_option_5'])) { $theblogger_widget_option_5 = $instance['theblogger_widget_option_5']; } else { $theblogger_widget_option_5 = '1'; }
			if (isset($instance['theblogger_widget_option_6'])) { $theblogger_widget_option_6 = $instance['theblogger_widget_option_6']; } else { $theblogger_widget_option_6 = 'false'; }
			if (isset($instance['theblogger_widget_option_7'])) { $theblogger_widget_option_7 = $instance['theblogger_widget_option_7']; } else { $theblogger_widget_option_7 = 'true'; }
			if (isset($instance['theblogger_widget_option_8'])) { $theblogger_widget_option_8 = $instance['theblogger_widget_option_8']; } else { $theblogger_widget_option_8 = 'true'; }
			if (isset($instance['theblogger_widget_option_9'])) { $theblogger_widget_option_9 = $instance['theblogger_widget_option_9']; } else { $theblogger_widget_option_9 = 'false'; }
			if (isset($instance['theblogger_widget_option_10'])) { $theblogger_widget_option_10 = $instance['theblogger_widget_option_10']; } else { $theblogger_widget_option_10 = 'false'; }
			if (isset($instance['theblogger_widget_option_11'])) { $theblogger_widget_option_11 = $instance['theblogger_widget_option_11']; } else { $theblogger_widget_option_11 = '4000'; }
			if (isset($instance['theblogger_widget_option_12'])) { $theblogger_widget_option_12 = $instance['theblogger_widget_option_12']; } else { $theblogger_widget_option_12 = 'false'; }
			if (isset($instance['theblogger_widget_option_13'])) { $theblogger_widget_option_13 = $instance['theblogger_widget_option_13']; } else { $theblogger_widget_option_13 = 'true'; }
			if (isset($instance['theblogger_widget_option_14'])) { $theblogger_widget_option_14 = $instance['theblogger_widget_option_14']; } else { $theblogger_widget_option_14 = 'true'; }
			if (isset($instance['theblogger_widget_option_15'])) { $theblogger_widget_option_15 = $instance['theblogger_widget_option_15']; } else { $theblogger_widget_option_15 = ""; }
			if (isset($instance['theblogger_widget_option_16'])) { $theblogger_widget_option_16 = $instance['theblogger_widget_option_16']; } else { $theblogger_widget_option_16 = ""; }
			if (isset($instance['theblogger_widget_option_17'])) { $theblogger_widget_option_17 = $instance['theblogger_widget_option_17']; } else { $theblogger_widget_option_17 = ""; }
			if (isset($instance['theblogger_widget_option_18'])) { $theblogger_widget_option_18 = $instance['theblogger_widget_option_18']; } else { $theblogger_widget_option_18 = '0.7'; }
			
			?>
				<table style="width: 100%; margin-top: 5px;">
					<tr>
						<td style="vertical-align: top; padding-top: 5px;">
							<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'theblogger'); ?></label>
						</td>
						<td>
							<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>">
							<span style="font-size: 11px; color: #999999;"><?php esc_html_e('Enter title.', 'theblogger'); ?></span>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_1')); ?>"><?php esc_html_e('Slides', 'theblogger'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_1')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_widget_option_1')); ?>">
								<option <?php if ($theblogger_widget_option_1 == 'sticky') { echo 'selected="selected"'; } ?> value="sticky"><?php esc_html_e('Sticky posts', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_1 == 'latest') { echo 'selected="selected"'; } ?> value="latest"><?php esc_html_e('Latest posts', 'theblogger'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_2')); ?>"><?php esc_html_e('Slides Count', 'theblogger'); ?></label>
						</td>
						<td>
							<input type="number" min="1" max="20" step="1" class="widefat" id="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_2')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_widget_option_2')); ?>" value="<?php echo esc_attr($theblogger_widget_option_2); ?>">
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_5')); ?>"><?php esc_html_e('Show Items', 'theblogger'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_5')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_widget_option_5')); ?>">
								<option <?php if ($theblogger_widget_option_5 == '1') { echo 'selected="selected"'; } ?> value="1"><?php esc_html_e('1', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_5 == '2') { echo 'selected="selected"'; } ?> value="2"><?php esc_html_e('2', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_5 == '3') { echo 'selected="selected"'; } ?> value="3"><?php esc_html_e('3', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_5 == '4') { echo 'selected="selected"'; } ?> value="4"><?php esc_html_e('4', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_5 == '5') { echo 'selected="selected"'; } ?> value="5"><?php esc_html_e('5', 'theblogger'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_3')); ?>"><?php esc_html_e('Width', 'theblogger'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_3')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_widget_option_3')); ?>">
								<option <?php if ($theblogger_widget_option_3 == 'w-50') { echo 'selected="selected"'; } ?> value="w-50"><?php esc_html_e('50%', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_3 == 'w-75') { echo 'selected="selected"'; } ?> value="w-75"><?php esc_html_e('75%', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_3 == "") { echo 'selected="selected"'; } ?> value=""><?php esc_html_e('100%', 'theblogger'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_4')); ?>"><?php esc_html_e('Ratio', 'theblogger'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_4')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_widget_option_4')); ?>">
								<option <?php if ($theblogger_widget_option_4 == "") { echo 'selected="selected"'; } ?> value=""><?php esc_html_e('Square', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_4 == 'ratio-16-9') { echo 'selected="selected"'; } ?> value="ratio-16-9"><?php esc_html_e('Wide', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_4 == 'ratio-21-9') { echo 'selected="selected"'; } ?> value="ratio-21-9"><?php esc_html_e('Extra Wide', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_4 == 'ratio-ultra-wide') { echo 'selected="selected"'; } ?> value="ratio-ultra-wide"><?php esc_html_e('Ultra Wide', 'theblogger'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_6')); ?>"><?php esc_html_e('Animation', 'theblogger'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_6')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_widget_option_6')); ?>">
								<option <?php if ($theblogger_widget_option_6 == 'false') { echo 'selected="selected"'; } ?> value="false"><?php esc_html_e('Slide', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'fade') { echo 'selected="selected"'; } ?> value="fade"><?php esc_html_e('Fade', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'backSlide') { echo 'selected="selected"'; } ?> value="backSlide"><?php esc_html_e('Back Slide', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'goDown') { echo 'selected="selected"'; } ?> value="goDown"><?php esc_html_e('Go Down', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'fadeUp') { echo 'selected="selected"'; } ?> value="fadeUp"><?php esc_html_e('Fade Zoom', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'scale') { echo 'selected="selected"'; } ?> value="scale"><?php esc_html_e('Scale', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'stackScale') { echo 'selected="selected"'; } ?> value="stackScale"><?php esc_html_e('Stack Scale', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'stackZoom') { echo 'selected="selected"'; } ?> value="stackZoom"><?php esc_html_e('Stack Zoom', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'fadeHorizontal') { echo 'selected="selected"'; } ?> value="fadeHorizontal"><?php esc_html_e('Fade Horizontal', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'fadeHorizontalBig') { echo 'selected="selected"'; } ?> value="fadeHorizontalBig"><?php esc_html_e('Fade Horizontal Big', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'fadeVertical') { echo 'selected="selected"'; } ?> value="fadeVertical"><?php esc_html_e('Fade Vertical', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'fadeVerticalBig') { echo 'selected="selected"'; } ?> value="fadeVerticalBig"><?php esc_html_e('Fade Vertical Big', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'jello') { echo 'selected="selected"'; } ?> value="jello"><?php esc_html_e('Jello', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'jelloVertical') { echo 'selected="selected"'; } ?> value="jelloVertical"><?php esc_html_e('Jello Vertical', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'jelloVerticalBig') { echo 'selected="selected"'; } ?> value="jelloVerticalBig"><?php esc_html_e('Jello Vertical Big', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'jelloHorizontal') { echo 'selected="selected"'; } ?> value="jelloHorizontal"><?php esc_html_e('Jello Horizontal', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'jelloHorizontalBig') { echo 'selected="selected"'; } ?> value="jelloHorizontalBig"><?php esc_html_e('Jello Horizontal Big', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'swing') { echo 'selected="selected"'; } ?> value="swing"><?php esc_html_e('Swing', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'swingVertical') { echo 'selected="selected"'; } ?> value="swingVertical"><?php esc_html_e('Swing Vertical', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'swingVerticalBig') { echo 'selected="selected"'; } ?> value="swingVerticalBig"><?php esc_html_e('Swing Vertical Big', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'swingHorizontal') { echo 'selected="selected"'; } ?> value="swingHorizontal"><?php esc_html_e('Swing Horizontal', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'swingHorizontalBig') { echo 'selected="selected"'; } ?> value="swingHorizontalBig"><?php esc_html_e('Swing Horizontal Big', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'rubberBand') { echo 'selected="selected"'; } ?> value="rubberBand"><?php esc_html_e('Rubber Band', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'rubberBandVertical') { echo 'selected="selected"'; } ?> value="rubberBandVertical"><?php esc_html_e('Rubber Band Vertical', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'rubberBandVerticalBig') { echo 'selected="selected"'; } ?> value="rubberBandVerticalBig"><?php esc_html_e('Rubber Band Vertical Big', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'rubberBandHorizontal') { echo 'selected="selected"'; } ?> value="rubberBandHorizontal"><?php esc_html_e('Rubber Band Horizontal', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'rubberBandHorizontalBig') { echo 'selected="selected"'; } ?> value="rubberBandHorizontalBig"><?php esc_html_e('Rubber Band Horizontal Big', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'zoom') { echo 'selected="selected"'; } ?> value="zoom"><?php esc_html_e('Zoom', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'zoomHorizontal') { echo 'selected="selected"'; } ?> value="zoomHorizontal"><?php esc_html_e('Zoom Horizontal', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'zoomHorizontalBig') { echo 'selected="selected"'; } ?> value="zoomHorizontalBig"><?php esc_html_e('Zoom Horizontal Big', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'zoomVertical') { echo 'selected="selected"'; } ?> value="zoomVertical"><?php esc_html_e('Zoom Vertical', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'zoomVerticalBig') { echo 'selected="selected"'; } ?> value="zoomVerticalBig"><?php esc_html_e('Zoom Vertical Big', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'zoomInDown') { echo 'selected="selected"'; } ?> value="zoomInDown"><?php esc_html_e('Zoom In Down', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'fadeUpZoomOut') { echo 'selected="selected"'; } ?> value="fadeUpZoomOut"><?php esc_html_e('Fade Up Zoom Out', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'fadeLeftZoomOut') { echo 'selected="selected"'; } ?> value="fadeLeftZoomOut"><?php esc_html_e('Fade Left Zoom Out', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'flipVertical') { echo 'selected="selected"'; } ?> value="flipVertical"><?php esc_html_e('Flip Vertical', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'flipHorizontal') { echo 'selected="selected"'; } ?> value="flipHorizontal"><?php esc_html_e('Flip Horizontal', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'lightSpeed') { echo 'selected="selected"'; } ?> value="lightSpeed"><?php esc_html_e('Light Speed', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'jackInTheBox') { echo 'selected="selected"'; } ?> value="jackInTheBox"><?php esc_html_e('Jack In The Box', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'hinge') { echo 'selected="selected"'; } ?> value="hinge"><?php esc_html_e('Hinge', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'rotate') { echo 'selected="selected"'; } ?> value="rotate"><?php esc_html_e('Rotate', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'rotateUpSwitch') { echo 'selected="selected"'; } ?> value="rotateUpSwitch"><?php esc_html_e('Rotate Up Switch', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'rotateDownSwitch') { echo 'selected="selected"'; } ?> value="rotateDownSwitch"><?php esc_html_e('Rotate Down Switch', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'rotateHorizontal') { echo 'selected="selected"'; } ?> value="rotateHorizontal"><?php esc_html_e('Rotate Horizontal', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'rotateVertical') { echo 'selected="selected"'; } ?> value="rotateVertical"><?php esc_html_e('Rotate Vertical', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'jumpIn') { echo 'selected="selected"'; } ?> value="jumpIn"><?php esc_html_e('Jump In', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'blur') { echo 'selected="selected"'; } ?> value="blur"><?php esc_html_e('Blur', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'blurZoom') { echo 'selected="selected"'; } ?> value="blurZoom"><?php esc_html_e('Blur Zoom', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'blurScale') { echo 'selected="selected"'; } ?> value="blurScale"><?php esc_html_e('Blur Scale', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'blurStackScale') { echo 'selected="selected"'; } ?> value="blurStackScale"><?php esc_html_e('Blur Stack Scale', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'blurStackZoom') { echo 'selected="selected"'; } ?> value="blurStackZoom"><?php esc_html_e('Blur Stack Zoom', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_6 == 'invert') { echo 'selected="selected"'; } ?> value="invert"><?php esc_html_e('Invert', 'theblogger'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td style="vertical-align: top; padding-top: 5px;">
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_18')); ?>"><?php esc_html_e('Animation Duration', 'theblogger'); ?></label>
						</td>
						<td>
							<input type="number" min="0.1" max="2" step="0.1" class="widefat" id="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_18')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_widget_option_18')); ?>" value="<?php echo esc_attr($theblogger_widget_option_18); ?>">
							<span style="font-size: 11px; color: #999999;"><?php esc_html_e('Default: 0.7 s', 'theblogger'); ?></span>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_9')); ?>"><?php esc_html_e('Mouse Drag', 'theblogger'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_9')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_widget_option_9')); ?>">
								<option <?php if ($theblogger_widget_option_9 == 'false') { echo 'selected="selected"'; } ?> value="false"><?php esc_html_e('No', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_9 == 'true') { echo 'selected="selected"'; } ?> value="true"><?php esc_html_e('Yes', 'theblogger'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_7')); ?>"><?php esc_html_e('Nav Arrows', 'theblogger'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_7')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_widget_option_7')); ?>">
								<option <?php if ($theblogger_widget_option_7 == 'true') { echo 'selected="selected"'; } ?> value="true"><?php esc_html_e('Yes', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_7 == 'false') { echo 'selected="selected"'; } ?> value="false"><?php esc_html_e('No', 'theblogger'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_8')); ?>"><?php esc_html_e('Nav Dots', 'theblogger'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_8')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_widget_option_8')); ?>">
								<option <?php if ($theblogger_widget_option_8 == 'true') { echo 'selected="selected"'; } ?> value="true"><?php esc_html_e('Yes', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_8 == 'false') { echo 'selected="selected"'; } ?> value="false"><?php esc_html_e('No', 'theblogger'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_10')); ?>"><?php esc_html_e('Autoplay', 'theblogger'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_10')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_widget_option_10')); ?>">
								<option <?php if ($theblogger_widget_option_10 == 'false') { echo 'selected="selected"'; } ?> value="false"><?php esc_html_e('No', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_10 == 'true') { echo 'selected="selected"'; } ?> value="true"><?php esc_html_e('Yes', 'theblogger'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td style="vertical-align: top; padding-top: 5px;">
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_11')); ?>"><?php esc_html_e('Autoplay Timeout', 'theblogger'); ?></label>
						</td>
						<td>
							<input type="number" min="500" max="10000" step="250" class="widefat" id="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_11')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_widget_option_11')); ?>" value="<?php echo esc_attr($theblogger_widget_option_11); ?>">
							<span style="font-size: 11px; color: #999999;"><?php esc_html_e('Default: 4000 ms', 'theblogger'); ?></span>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_12')); ?>"><?php esc_html_e('Center', 'theblogger'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_12')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_widget_option_12')); ?>">
								<option <?php if ($theblogger_widget_option_12 == 'false') { echo 'selected="selected"'; } ?> value="false"><?php esc_html_e('No', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_12 == 'true') { echo 'selected="selected"'; } ?> value="true"><?php esc_html_e('Yes', 'theblogger'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_13')); ?>"><?php esc_html_e('Loop', 'theblogger'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_13')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_widget_option_13')); ?>">
								<option <?php if ($theblogger_widget_option_13 == 'true') { echo 'selected="selected"'; } ?> value="true"><?php esc_html_e('Yes', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_13 == 'false') { echo 'selected="selected"'; } ?> value="false"><?php esc_html_e('No', 'theblogger'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_14')); ?>"><?php esc_html_e('Rewind', 'theblogger'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_14')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_widget_option_14')); ?>">
								<option <?php if ($theblogger_widget_option_14 == 'true') { echo 'selected="selected"'; } ?> value="true"><?php esc_html_e('Yes', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_14 == 'false') { echo 'selected="selected"'; } ?> value="false"><?php esc_html_e('No', 'theblogger'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_15')); ?>"><?php esc_html_e('Overflow', 'theblogger'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_15')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_widget_option_15')); ?>">
								<option <?php if ($theblogger_widget_option_15 == "") { echo 'selected="selected"'; } ?> value=""><?php esc_html_e('Hidden', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_15 == 'is-overflow-visible') { echo 'selected="selected"'; } ?> value="is-overflow-visible"><?php esc_html_e('Visible', 'theblogger'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_16')); ?>"><?php esc_html_e('Background', 'theblogger'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_16')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_widget_option_16')); ?>">
								<option <?php if ($theblogger_widget_option_16 == "") { echo 'selected="selected"'; } ?> value=""><?php esc_html_e('Dark', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_16 == 'is-post-slider-bg-none') { echo 'selected="selected"'; } ?> value="is-post-slider-bg-none"><?php esc_html_e('None', 'theblogger'); ?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_17')); ?>"><?php esc_html_e('Box Shadow', 'theblogger'); ?></label>
						</td>
						<td>
							<select class="widefat" id="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_17')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_widget_option_17')); ?>">
								<option <?php if ($theblogger_widget_option_17 == "") { echo 'selected="selected"'; } ?> value=""><?php esc_html_e('None', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_17 == 'has-shadow') { echo 'selected="selected"'; } ?> value="has-shadow"><?php esc_html_e('Container', 'theblogger'); ?></option>
								<option <?php if ($theblogger_widget_option_17 == 'has-slide-shadow') { echo 'selected="selected"'; } ?> value="has-slide-shadow"><?php esc_html_e('Slides', 'theblogger'); ?></option>
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
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['theblogger_widget_option_1'] = strip_tags($new_instance['theblogger_widget_option_1']);
			$instance['theblogger_widget_option_2'] = strip_tags($new_instance['theblogger_widget_option_2']);
			$instance['theblogger_widget_option_3'] = strip_tags($new_instance['theblogger_widget_option_3']);
			$instance['theblogger_widget_option_4'] = strip_tags($new_instance['theblogger_widget_option_4']);
			$instance['theblogger_widget_option_5'] = strip_tags($new_instance['theblogger_widget_option_5']);
			$instance['theblogger_widget_option_6'] = strip_tags($new_instance['theblogger_widget_option_6']);
			$instance['theblogger_widget_option_7'] = strip_tags($new_instance['theblogger_widget_option_7']);
			$instance['theblogger_widget_option_8'] = strip_tags($new_instance['theblogger_widget_option_8']);
			$instance['theblogger_widget_option_9'] = strip_tags($new_instance['theblogger_widget_option_9']);
			$instance['theblogger_widget_option_10'] = strip_tags($new_instance['theblogger_widget_option_10']);
			$instance['theblogger_widget_option_11'] = strip_tags($new_instance['theblogger_widget_option_11']);
			$instance['theblogger_widget_option_12'] = strip_tags($new_instance['theblogger_widget_option_12']);
			$instance['theblogger_widget_option_13'] = strip_tags($new_instance['theblogger_widget_option_13']);
			$instance['theblogger_widget_option_14'] = strip_tags($new_instance['theblogger_widget_option_14']);
			$instance['theblogger_widget_option_15'] = strip_tags($new_instance['theblogger_widget_option_15']);
			$instance['theblogger_widget_option_16'] = strip_tags($new_instance['theblogger_widget_option_16']);
			$instance['theblogger_widget_option_17'] = strip_tags($new_instance['theblogger_widget_option_17']);
			$instance['theblogger_widget_option_18'] = strip_tags($new_instance['theblogger_widget_option_18']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$title = apply_filters('widget_title', $instance['title']);
			$theblogger_widget_option_1 = apply_filters('theblogger_widget_option_1', $instance['theblogger_widget_option_1']);
			$theblogger_widget_option_2 = apply_filters('theblogger_widget_option_2', $instance['theblogger_widget_option_2']);
			$theblogger_widget_option_3 = apply_filters('theblogger_widget_option_3', $instance['theblogger_widget_option_3']);
			$theblogger_widget_option_4 = apply_filters('theblogger_widget_option_4', $instance['theblogger_widget_option_4']);
			$theblogger_widget_option_5 = apply_filters('theblogger_widget_option_5', $instance['theblogger_widget_option_5']);
			$theblogger_widget_option_6 = apply_filters('theblogger_widget_option_6', $instance['theblogger_widget_option_6']);
			$theblogger_widget_option_7 = apply_filters('theblogger_widget_option_7', $instance['theblogger_widget_option_7']);
			$theblogger_widget_option_8 = apply_filters('theblogger_widget_option_8', $instance['theblogger_widget_option_8']);
			$theblogger_widget_option_9 = apply_filters('theblogger_widget_option_9', $instance['theblogger_widget_option_9']);
			$theblogger_widget_option_10 = apply_filters('theblogger_widget_option_10', $instance['theblogger_widget_option_10']);
			$theblogger_widget_option_11 = apply_filters('theblogger_widget_option_11', $instance['theblogger_widget_option_11']);
			$theblogger_widget_option_12 = apply_filters('theblogger_widget_option_12', $instance['theblogger_widget_option_12']);
			$theblogger_widget_option_13 = apply_filters('theblogger_widget_option_13', $instance['theblogger_widget_option_13']);
			$theblogger_widget_option_14 = apply_filters('theblogger_widget_option_14', $instance['theblogger_widget_option_14']);
			$theblogger_widget_option_15 = apply_filters('theblogger_widget_option_15', $instance['theblogger_widget_option_15']);
			$theblogger_widget_option_16 = apply_filters('theblogger_widget_option_16', $instance['theblogger_widget_option_16']);
			$theblogger_widget_option_17 = apply_filters('theblogger_widget_option_17', $instance['theblogger_widget_option_17']);
			$theblogger_widget_option_18 = apply_filters('theblogger_widget_option_18', $instance['theblogger_widget_option_18']);
			
			echo $before_widget;
			
				if (! empty($title))
				{
					// echo $before_title . $title . $after_title;
				}
				
				// *** start Main Slider ***
				
					$slides 		= $theblogger_widget_option_1;
					$slides_count   = $theblogger_widget_option_2;
					$excluded_posts = "";
					
					if ($slides != 'latest')
					{
						$slides = get_option('sticky_posts');
					}
					else
					{
						$slides = "";
						$excluded_posts = get_option('sticky_posts');
					}
					
					$query = new WP_Query(
						array(
							'post_type'      => 'post',
							'post__in'       => $slides,
							'post__not_in'   => $excluded_posts,
							'posts_per_page' => $slides_count
						)
					);
					
					if ($query->have_posts()) :
					
						$width = $theblogger_widget_option_3;
						
						if (isset($_GET['main_slider_width']))
						{
							$width = 'w-' . $_GET['main_slider_width'];
						}
						
						$ratio = $theblogger_widget_option_4;
						
						if (isset($_GET['main_slider_ratio']))
						{
							$ratio = 'ratio-' . $_GET['main_slider_ratio'];
						}
						
						$items 			    = $theblogger_widget_option_5;
						$animation 		    = $theblogger_widget_option_6;
						$nav_arrows 	    = $theblogger_widget_option_7;
						$nav_dots 		    = $theblogger_widget_option_8;
						$mouse_drag 	    = $theblogger_widget_option_9;
						$autoplay 		    = $theblogger_widget_option_10;
						$autoplay_timeout   = $theblogger_widget_option_11;
						$center             = $theblogger_widget_option_12;
						$loop               = $theblogger_widget_option_13;
						$rewind             = $theblogger_widget_option_14;
						$overflow           = $theblogger_widget_option_15;
						$background         = $theblogger_widget_option_16;
						$box_shadow         = $theblogger_widget_option_17;
						$animation_duration = $theblogger_widget_option_18;
						
						?>
							<div class="block slider-box <?php echo esc_attr($width); ?> <?php echo esc_attr($ratio); ?>">
								<?php
									if (! empty($animation_duration))
									{
										?>
											<style type="text/css"> .owl-carousel .animated { animation-duration: <?php echo esc_attr($animation_duration); ?>s; } </style>
										<?php
									}
								?>
								<div class="post-slider owl-carousel <?php echo esc_attr($overflow); ?> <?php echo esc_attr($background); ?> <?php echo esc_attr($box_shadow); ?>" data-items="<?php echo esc_attr($items); ?>" data-animation="<?php echo esc_attr($animation); ?>" data-nav="<?php echo esc_attr($nav_arrows); ?>" data-dots="<?php echo esc_attr($nav_dots); ?>" data-mouse-drag="<?php echo esc_attr($mouse_drag); ?>" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-autoplay-timeout="<?php echo esc_attr($autoplay_timeout); ?>" data-center="<?php echo esc_attr($center); ?>" data-loop="<?php echo esc_attr($loop); ?>" data-rewind="<?php echo esc_attr($rewind); ?>">
									<?php
										function theblogger_main_slider__featured_media($width)
										{
											$browser_address_url = stripcslashes(get_option(get_the_ID() . 'theblogger_featured_video_url', ""));
											$browser_address_url = trim($browser_address_url); // Strip whitespace (or other characters) from the beginning and end of the string.
											
											if (! empty($browser_address_url))
											{
												echo 'data-parallax-video="' . esc_url($browser_address_url) . '"';
											}
											elseif (has_post_thumbnail())
											{
												$feat_img = "";
												$feat_area_width = get_theme_mod('theblogger_setting_feat_area_width', 'is-featured-area-fixed');
												
												if ($feat_area_width == 'is-featured-area-fixed')
												{
													$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'theblogger_image_size_1');
												}
												else
												{
													if ($width == 'w-50')
													{
														$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'theblogger_image_size_1');
													}
													else
													{
														$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'theblogger_image_size_7');
													}
												}
												
												echo 'style="background-image: url(' . esc_url($feat_img[0]) . ');"';
											}
										}
									?>
									
									<?php
										while ($query->have_posts()) : $query->the_post();
										
											$main_slider_meta_style = get_theme_mod('theblogger_setting_main_slider_meta_style', 'is-cat-link-ribbon-left');
											
											?>
												<div class="slider-post main-slider-post is-post-dark <?php echo esc_attr($main_slider_meta_style); ?>">
													<div class="post-thumbnail" <?php theblogger_main_slider__featured_media($width); ?>>
														<div class="post-wrap">
															<header class="entry-header">
																<div class="entry-meta">
																	<span class="cat-links">
																		<?php
																			the_category(' ');
																		?>
																	</span>	
																</div> <!-- .entry-meta -->
																<h2 class="entry-title">
																	<a href="<?php the_permalink(); ?>">
																		<?php
																			the_title();
																		?>
																	</a>
																</h2>
																<a class="more-link" href="<?php the_permalink(); ?>">
																	<?php
																		esc_html_e('View Post', 'theblogger');
																	?>
																</a>
															</header> <!-- .entry-header -->
														</div> <!-- .post-wrap -->
													</div> <!-- .post-thumbnail -->
												</div> <!-- .main-slider-post -->
											<?php
										endwhile;
									?>
								</div> <!-- .post-slider -->
							</div> <!-- .slider-box -->
						<?php
					endif;
					wp_reset_postdata();
				
				// *** end Main Slider ***
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', create_function('', 'register_widget("theblogger_widget_main_slider");'));

?>