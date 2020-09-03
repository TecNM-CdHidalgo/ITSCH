<?php

	function theblogger_post_column_add($columns)
	{
		return array_merge(
			$columns,
			array(
				'theblogger_post_feat_img' => esc_html__('Featured Image', 'theblogger')
			)
		);
	}
	
	add_filter('manage_posts_columns', 'theblogger_post_column_add');
	
	
	function theblogger_post_column_show($column, $post_id)
	{
		if ($column == 'theblogger_post_feat_img')
		{
			the_post_thumbnail(
				'thumbnail',
				array(
					'style' => 'max-height: 40px; max-width: 40px;'
				)
			);
		}
	}
	
	add_action('manage_posts_custom_column' , 'theblogger_post_column_show', 10, 2);

?>