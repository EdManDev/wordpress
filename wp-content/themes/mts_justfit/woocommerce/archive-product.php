<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header('shop'); ?>
<div id="page" class="clearfix">
	<article class="<?php mts_article_class(); ?>">
		<div class="content_box" >
			<?php do_action('woocommerce_before_main_content'); ?>
			<div class="inner-page-header border-bottom clearfix">
				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
					<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
				<?php endif; ?>
			</div>
		
			<?php do_action( 'woocommerce_archive_description' ); ?>
			<?php if ( have_posts() ) : ?>
				<div class="inner-page-header border-bottom clearfix">
				<?php do_action( 'woocommerce_before_shop_loop' ); ?>
				<?php woocommerce_product_loop_start(); ?>
					<?php woocommerce_product_subcategories(); ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php woocommerce_get_template_part( 'content', 'product' ); ?>
					<?php endwhile; // end of the loop. ?>
				<?php woocommerce_product_loop_end(); ?>
				</div>
				<div class="woo-pagination-wrapper pagination clearfix">
				<?php do_action( 'woocommerce_after_shop_loop' ); ?>
				</div>
			<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
				<?php woocommerce_get_template( 'loop/no-products-found.php' ); ?>
			<?php endif; ?>

			<?php do_action('woocommerce_after_main_content'); ?>
		</div>
	</article>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>