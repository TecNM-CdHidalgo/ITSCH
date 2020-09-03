<?php

	function theblogger_archive_title()
	{
		if (! is_front_page())
		{
			?>
				<div class="post-header archive-header post-header-classic">
					<?php
						if (is_category())
						{
							?>
								<header class="entry-header">
									<h1 class="entry-title">
										<i><?php esc_html_e('Browsing Category', 'theblogger'); ?></i>
										
										<span class="cat-title"><?php echo single_cat_title(); ?></span>
									</h1>
									<?php
										the_archive_description('<div class="category-description">', '</div> <!-- .category-description -->');
									?>
								</header> <!-- .entry-header -->
							<?php
						}
						elseif (is_tag())
						{
							?>
								<header class="entry-header">
									<h1 class="entry-title">
										<i><?php esc_html_e('Posts tagged', 'theblogger'); ?></i>
										
										<span class="cat-title"><?php echo single_tag_title(); ?></span>
									</h1>
									<?php
										the_archive_description('<div class="category-description">', '</div> <!-- .category-description -->');
									?>
								</header> <!-- .entry-header -->
							<?php
						}
						elseif (is_author())
						{
							?>
								<header class="entry-header">
									<h1 class="entry-title">
										<i><?php esc_html_e('Posts Published by', 'theblogger'); ?></i>
										
										<span class="cat-title"><?php the_author(); ?></span>
									</h1>
									<?php
										the_archive_description('<div class="category-description">', '</div> <!-- .category-description -->');
									?>
								</header> <!-- .entry-header -->
							<?php
						}
						elseif (is_search())
						{
							?>
								<header class="entry-header">
									<h1 class="entry-title">
										<i><?php esc_html_e('you searched for', 'theblogger'); ?></i>
										
										<span class="cat-title"><?php the_search_query(); ?></span>
									</h1>
								</header> <!-- .entry-header -->
							<?php
						}
						elseif (is_date())
						{
							?>
								<header class="entry-header">
									<h1 class="entry-title">
										<i><?php esc_html_e('Date Archives', 'theblogger'); ?></i>
										
										<span class="cat-title">
											<?php
												if (is_day())
												{
													printf(get_the_date());
												}
												elseif (is_month())
												{
													printf(get_the_date(_x('F Y', 'monthly archives date format', 'theblogger')));
												}
												elseif (is_year())
												{
													printf(get_the_date(_x('Y', 'yearly archives date format', 'theblogger')));
												}
												else
												{
													esc_html_e('Archives', 'theblogger');
												}
											?>
										</span>
									</h1>
								</header> <!-- .entry-header -->
							<?php
						}
						elseif (is_post_type_archive())
						{
							?>
								<header class="entry-header">
									<h1 class="entry-title">
										<i><?php esc_html_e('Archives', 'theblogger'); ?></i>
										
										<span class="cat-title"><?php echo post_type_archive_title(); ?></span>
									</h1>
									<?php
										the_archive_description('<div class="category-description">', '</div> <!-- .category-description -->');
									?>
								</header> <!-- .entry-header -->
							<?php
						}
						elseif (is_archive())
						{
							?>
								<header class="entry-header">
									<h1 class="entry-title">
										<i><?php esc_html_e('Archives', 'theblogger'); ?></i>
										
										<span class="cat-title"><?php echo single_term_title(); ?></span>
									</h1>
									<?php
										the_archive_description('<div class="category-description">', '</div> <!-- .category-description -->');
									?>
								</header> <!-- .entry-header -->
							<?php
						}
						else
						{
							$title_visibility = false;
							$blog_page_id     = get_option('page_for_posts');
							
							if ($blog_page_id)
							{
								$title_visibility = get_option($blog_page_id . 'theblogger_title_visibility', false);
							}
							
							?>
								<header class="entry-header" <?php if ($title_visibility == true) { echo 'style="display: none;"'; } ?>>
									<h1 class="entry-title">
										<?php
											single_post_title();
										?>
									</h1>
								</header> <!-- .entry-header -->
							<?php
						}
					?>
				</div> <!-- .post-header-classic -->
			<?php
		}
	}

?>