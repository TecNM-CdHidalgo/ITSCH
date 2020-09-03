<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
	
	<div class="post-header shop-header post-header-classic">
		<header class="entry-header">
			<?php
				if (apply_filters('woocommerce_show_page_title', true))
				{
					?>
						<h1 class="entry-title">
							<?php
								woocommerce_page_title();
							?>
						</h1>
					<?php
				}
			?>
		</header> <!-- .entry-header .shop-header -->
	</div> <!-- .post-header-classic -->
	
	<div class="shop-filters">
		<!-- woocommerce-result-count -->
		<?php
			if (have_posts()) :
				?>
					<?php
						/**
						 * woocommerce_before_shop_loop hook.
						 *
						 * @hooked woocommerce_result_count - 20.
						 * @hooked woocommerce_catalog_ordering - 30.
						 */
						do_action('woocommerce_before_shop_loop');
					?>
				<?php
			endif;
		?>
		<!-- woocommerce-result-count -->
		
		<?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?>
	</div> <!-- .shop-filters -->
	
	<?php
		/**
		 * woocommerce_archive_description hook.
		 *
		 * @hooked woocommerce_taxonomy_archive_description - 10.
		 * @hooked woocommerce_product_archive_description - 10.
		 */
		
		do_action('woocommerce_archive_description');
	?>
	
	<?php
		if (have_posts()) :
		
			woocommerce_product_loop_start();
			
			woocommerce_product_subcategories();
			
			while (have_posts()) : the_post();
			
				wc_get_template_part('content', 'product');
			
			endwhile;
			
			woocommerce_product_loop_end();
			
			?>
				<?php
					/**
					 * woocommerce_after_shop_loop hook.
					 *
					 * @hooked woocommerce_pagination - 10.
					 */
					
					do_action('woocommerce_after_shop_loop');
				?>
			<?php
		
		elseif (! woocommerce_product_subcategories(array('before' => woocommerce_product_loop_start(false), 'after' => woocommerce_product_loop_end(false)))) :
		
			wc_get_template('loop/no-products-found.php');
		
		endif;
	?>
	
	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content).
		 */
		
		do_action('woocommerce_after_main_content');
	?>

<?php
	get_footer('shop');
?>