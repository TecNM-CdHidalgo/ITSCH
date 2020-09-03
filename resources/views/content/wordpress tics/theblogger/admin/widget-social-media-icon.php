<?php

	class theblogger_Widget_Social_Media_Icon extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct('theblogger_widget_social_media_icon',
								esc_html__('(TheBlogger) Social Media Icon', 'theblogger'),
								array('description' => esc_html__('Social media icons.', 'theblogger')));
		}
		
		public function form($instance)
		{
			if (isset($instance['title'])) { $title = $instance['title']; } else { $title = ""; }
			if (isset($instance['theblogger_icon'])) { $theblogger_icon = $instance['theblogger_icon']; } else { $theblogger_icon = ""; }
			if (isset($instance['theblogger_url'])) { $theblogger_url = $instance['theblogger_url']; } else { $theblogger_url = ""; }
			if (isset($instance['theblogger_new_tab'])) { $theblogger_new_tab = $instance['theblogger_new_tab']; } else { $theblogger_new_tab = ""; }
			
			?>
				<table style="width: 100%; margin-top: 5px;">
					<tr>
						<td>
							<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title', 'theblogger'); ?></label>
						</td>
						<td>
							<input type="text" style="width: 100%;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>">
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo $this->get_field_id('theblogger_icon'); ?>"><?php esc_html_e('Icon', 'theblogger'); ?></label>
						</td>
						<td>
							<select style="width: 100%;" id="<?php echo $this->get_field_id('theblogger_icon'); ?>" name="<?php echo $this->get_field_name('theblogger_icon'); ?>">
								<option></option>
								<option <?php if ($theblogger_icon == 'facebook') { echo 'selected="selected"'; } ?> value="facebook">Facebook</option>
								<option <?php if ($theblogger_icon == 'twitter') { echo 'selected="selected"'; } ?> value="twitter">Twitter</option>
								<option <?php if ($theblogger_icon == 'google-plus') { echo 'selected="selected"'; } ?> value="google-plus">Google+</option>
								<option <?php if ($theblogger_icon == 'instagram') { echo 'selected="selected"'; } ?> value="instagram">Instagram</option>
								<option <?php if ($theblogger_icon == 'linkedin') { echo 'selected="selected"'; } ?> value="linkedin">LinkedIn</option>
								<option <?php if ($theblogger_icon == 'pinterest') { echo 'selected="selected"'; } ?> value="pinterest">Pinterest</option>
								<option <?php if ($theblogger_icon == 'flickr') { echo 'selected="selected"'; } ?> value="flickr">Flickr</option>
								<option <?php if ($theblogger_icon == 'fivehundredpx') { echo 'selected="selected"'; } ?> value="fivehundredpx">500px</option>
								<option <?php if ($theblogger_icon == 'behance') { echo 'selected="selected"'; } ?> value="behance">Behance</option>
								<option <?php if ($theblogger_icon == 'dribbble') { echo 'selected="selected"'; } ?> value="dribbble">Dribbble</option>
								<option <?php if ($theblogger_icon == 'forrst') { echo 'selected="selected"'; } ?> value="forrst">Forrst</option>
								<option <?php if ($theblogger_icon == 'skype') { echo 'selected="selected"'; } ?> value="skype">Skype</option>
								<option <?php if ($theblogger_icon == 'youtube') { echo 'selected="selected"'; } ?> value="youtube">YouTube</option>
								<option <?php if ($theblogger_icon == 'vimeo') { echo 'selected="selected"'; } ?> value="vimeo">Vimeo</option>
								<option <?php if ($theblogger_icon == 'soundcloud') { echo 'selected="selected"'; } ?> value="soundcloud">SoundCloud</option>
								<option <?php if ($theblogger_icon == 'lastfm') { echo 'selected="selected"'; } ?> value="lastfm">Last.fm</option>
								<option <?php if ($theblogger_icon == 'wordpress') { echo 'selected="selected"'; } ?> value="wordpress">WordPress</option>
								<option <?php if ($theblogger_icon == 'tumblr') { echo 'selected="selected"'; } ?> value="tumblr">Tumblr</option>
								<option <?php if ($theblogger_icon == 'blogger') { echo 'selected="selected"'; } ?> value="blogger">Blogger</option>
								<option <?php if ($theblogger_icon == 'delicious') { echo 'selected="selected"'; } ?> value="delicious">Delicious</option>
								<option <?php if ($theblogger_icon == 'digg') { echo 'selected="selected"'; } ?> value="digg">Digg</option>
								<option <?php if ($theblogger_icon == 'github') { echo 'selected="selected"'; } ?> value="github">GitHub</option>
								<option <?php if ($theblogger_icon == 'stack-overflow') { echo 'selected="selected"'; } ?> value="stack-overflow">Stack Overflow</option>
								<option <?php if ($theblogger_icon == 'foursquare') { echo 'selected="selected"'; } ?> value="foursquare">Foursquare</option>
								<option <?php if ($theblogger_icon == 'xing') { echo 'selected="selected"'; } ?> value="xing">Xing</option>
								<option <?php if ($theblogger_icon == 'weibo') { echo 'selected="selected"'; } ?> value="weibo">Weibo</option>
								<option <?php if ($theblogger_icon == 'slideshare') { echo 'selected="selected"'; } ?> value="slideshare">SlideShare</option>
								<option <?php if ($theblogger_icon == 'vkontakte') { echo 'selected="selected"'; } ?> value="vkontakte">VKontakte</option>
								<option <?php if ($theblogger_icon == 'picasa') { echo 'selected="selected"'; } ?> value="picasa">Picasa</option>
								<option <?php if ($theblogger_icon == 'friendfeed') { echo 'selected="selected"'; } ?> value="friendfeed">FriendFeed</option>
								<option <?php if ($theblogger_icon == 'vine') { echo 'selected="selected"'; } ?> value="vine">Vine</option>
								<option <?php if ($theblogger_icon == 'bloglovin') { echo 'selected="selected"'; } ?> value="bloglovin">Bloglovin</option>
								<option <?php if ($theblogger_icon == 'rss') { echo 'selected="selected"'; } ?> value="rss">RSS</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo $this->get_field_id('theblogger_url'); ?>"><?php esc_html_e('URL', 'theblogger'); ?></label>
						</td>
						<td>
							<input type="text" style="width: 100%;" id="<?php echo $this->get_field_id('theblogger_url'); ?>" name="<?php echo $this->get_field_name('theblogger_url'); ?>" value="<?php echo esc_url($theblogger_url); ?>">
						</td>
					</tr>
					<tr>
						<td>
							<label for="<?php echo $this->get_field_id('theblogger_new_tab'); ?>"><?php esc_html_e('New Tab', 'theblogger'); ?></label>
						</td>
						<td>
							<select id="<?php echo $this->get_field_id('theblogger_new_tab'); ?>" name="<?php echo $this->get_field_name('theblogger_new_tab'); ?>">
								<option <?php if ($theblogger_new_tab == 'yes') { echo 'selected="selected"'; } ?> value="yes"><?php esc_html_e('Yes', 'theblogger'); ?></option>
								<option <?php if ($theblogger_new_tab == 'no') { echo 'selected="selected"'; } ?> value="no"><?php esc_html_e('No', 'theblogger'); ?></option>
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
			$instance['title']             = strip_tags($new_instance['title']);
			$instance['theblogger_icon']    = strip_tags($new_instance['theblogger_icon']);
			$instance['theblogger_url']     = strip_tags($new_instance['theblogger_url']);
			$instance['theblogger_new_tab'] = strip_tags($new_instance['theblogger_new_tab']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$title             = apply_filters('widget_title', $instance['title']);
			$theblogger_icon    = apply_filters('widget_icon', $instance['theblogger_icon']);
			$theblogger_url     = apply_filters('widget_url', $instance['theblogger_url']);
			$theblogger_new_tab = apply_filters('widget_new_tab', $instance['theblogger_new_tab']);
			
			echo $before_widget;
			
			if (! empty($title))
			{
				// echo $before_title . $title . $after_title;
			}
			
			if ($theblogger_new_tab != 'no')
			{
				$theblogger_new_tab = 'target="_blank"';
			}
			else
			{
				$theblogger_new_tab = "";
			}
			
			?>
				<a class="social-link <?php echo esc_attr($theblogger_icon); ?>" <?php echo $theblogger_new_tab; ?> href="<?php echo esc_url($theblogger_url); ?>"></a>
			<?php
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', create_function('', 'register_widget("theblogger_widget_social_media_icon");'));

?>