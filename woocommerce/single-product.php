<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $sparta;
$colorpack = '';
if(isset($sparta['wc_colorpack'])) {
    $colorpack = $sparta['wc_colorpack'];
}
get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
<div class="colorpack-<?= $colorpack; ?> <?php
            if(isset($sparta['wc_shop_layout'])) {
                if($sparta['wc_shop_layout'] == 'full-width') {
                    echo "col-xs-12";
                }
                elseif($sparta['wc_shop_layout'] == 'right-sidebar') {
                    echo "col-sm-12 col-md-9";
                }
                elseif($sparta['wc_shop_layout'] == 'left-sidebar') {
                    echo "col-sm-12 col-md-9 pull-right";
                }
            }
            ?>">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>
			<div class="clearfix"></div>
<?php
    $post_prev = get_adjacent_post( false, '', true );
	$post_next = get_adjacent_post( false, '', false );
    $post              = $post_prev;
    if($post):
    setup_postdata($post);?>
    <div class="link">
<div class="previous_product">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><i class="fa fa-angle-left"></i>
        <span class="show_on_hover">
            <?php the_post_thumbnail('thumbnail'); ?>
        </span>
        </a>
    </div>
</div>
    <?php
    wp_reset_postdata();
    endif;
    $post              = $post_next;
    if($post):
    setup_postdata($post);
?> 
        <div class="link">
<div class="next_product">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><i class="fa fa-angle-right"></i>
        <span class="show_on_hover">
            <?php the_post_thumbnail('thumbnail'); ?>
        </span>
        </a>
    </div>
</div>
		<?php wp_reset_postdata(); endif; ?>
    <?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
</div>
<div class="sidebar colorpack-<?= $colorpack; ?>  <?php
            if(isset($sparta['wc_shop_layout'])) {
                if($sparta['wc_shop_layout'] == 'full-width') {
                    echo "hidden";
                }
                elseif($sparta['wc_shop_layout'] == 'right-sidebar') {
                    echo "col-sm-12 col-md-3";
                }
                elseif($sparta['wc_shop_layout'] == 'left-sidebar') {
                    echo "col-sm-12 col-md-3 pull-left";
                }
            }
            ?>">
    
	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		dynamic_sidebar('wc_sidebar');
	?>
</div>

<?php get_footer( 'shop' ); ?>
