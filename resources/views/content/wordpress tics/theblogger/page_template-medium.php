<?php
/*
Template Name: Medium width
*/
?>

<?php
	get_header();
?>

<?php
	$theblogger_select_page_featured_area = get_option('theblogger_select_page_featured_area' . '__' . get_the_ID(), 'No Featured Area');
	
	if ((! isset($_GET['featured_area'])) && is_active_sidebar($theblogger_select_page_featured_area))
	{
		?>
			<section class="top-content">
				<div class="layout-medium">
					<div class="featured-area">
						<?php
							dynamic_sidebar($theblogger_select_page_featured_area);
						?>
					</div> <!-- .featured-area -->
				</div> <!-- .layout-medium -->
			</section> <!-- .top-content -->
		<?php
	}
?>

<div id="main" class="site-main">
	<div class="layout-medium">
		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">
				<?php
					while (have_posts()) : the_post();
						?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="post-header page-header post-header-classic">
									<?php
										$theblogger_title_visibility = get_option(get_the_ID() . 'theblogger_title_visibility', false);
									?>
									<header class="entry-header" <?php if ($theblogger_title_visibility == true) { echo 'style="display: none;"'; } ?>>
										<?php
											the_title('<h1 class="entry-title">', '</h1>');
										?>
									</header>
								</div> <!-- .post-header-classic -->
								<?php
									if (has_post_thumbnail())
									{
										?>
											<div class="featured-image">
												<?php
													the_post_thumbnail('theblogger_image_size_1');
												?>
											</div>
										<?php
									}
								?>
								<div class="entry-content">
									<?php
										theblogger_content();
									?>
								</div>
							</article>
							<?php
								comments_template("", true);
							?>
						<?php
					endwhile;
				?>
			</div>
		</div>
	</div>
</div>

<?php
	get_footer();
?>