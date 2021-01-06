<?php
global $sparta;
if(!function_exists('is_woocommerce')) {
    return;
}
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_filter( 'woocommerce_breadcrumb_defaults', 'sparta_woocommerce_breadcrumbs' );
function sparta_woocommerce_breadcrumbs() {
    global $sparta;
    $colorpack = '';
    if(isset($sparta['wc_colorpack'])) {
        $colorpack = $sparta['wc_colorpack'];
    }
    $class = 'colorpack-'.$colorpack;
    return array(
            'delimiter'   => ' &#47; ',
            'wrap_before' => '<nav class="woocommerce-breadcrumb '.$class.'" itemprop="breadcrumb">',
            'wrap_after'  => '</nav>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}
// Remove Styles
add_filter('woocommerce_enqueue_styles','__return_false');
/*
 Imagesizes
 */
function sparta_woocommerce_image_dimensions() {
	global $pagenow;
 
  	$catalog = array(
		'width' 	=> '700',
        'height'     => '',	// px
		'crop'		=> 0 		// true
	);
	$single = array(
		'width' 	=> '700',	// px
		'crop'		=> 0,
        'height'     => '',		// true
	);
	$thumbnail = array(
		'width' 	=> '90',	// px
		'crop'		=> 0,
        'height'     => '', 		// false
	);
	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}
add_action( 'after_switch_theme', 'sparta_woocommerce_image_dimensions', 1 );
register_activation_hook( 'activate_woocommerce/woocommerce.php', 'sparta_woocommerce_image_dimensions' );

/* This snippet removes the action that inserts thumbnails to products in teh loop
 * and re-adds the function customized with our wrapper in it.
 * It applies to all archives with products.
 *
 * @original plugin: WooCommerce
 * @author of snippet: Brian Krogsard
 */
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);


if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {
    function woocommerce_template_loop_product_thumbnail() {
        echo woocommerce_get_product_thumbnail();
    } 
}
if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {   
    function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
        global $post, $woocommerce;
         global $product;
         $attachment_ids = $product->get_gallery_attachment_ids();
        $output_back = '';
        $hover_class = '';
        if($attachment_ids):
        $back_image = wp_get_attachment_url( $attachment_ids[0] );
        $output_back = '<img src="'.$back_image.'" class="img-responsive back_image">';
        $hover_class = ' hover_effect ';
        endif;
        $output = '<div class="sparta_product_image_wrap"><div class="front_image'.$hover_class.'">';
        
        if ( has_post_thumbnail() ) {               
            $output .= get_the_post_thumbnail( $post->ID, $size );              
        }
        
        $output .= '</div>'.$output_back.'</div>';
        return $output;
    }
}

// WooCommerce Sale Flash Position
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

// WooCommerce Checkout
add_filter('woocommerce_checkout_fields', 'addBootstrapToCheckoutFields' );
function addBootstrapToCheckoutFields($fields) {
    foreach ($fields as &$fieldset) {
        foreach ($fieldset as &$field) {
            // if you want to add the form-group class around the label and the input
            $field['class'][] = 'form-group'; 

            // add form-control to the actual input
            $field['input_class'][] = 'form-control';
        }
    }
    return $fields;
}

function wc_custom_store_notice_updated( $text ) {
	return str_replace( 'This is a demo store for testing purposes &mdash; no orders shall be fulfilled.', 'This Site is Proudly Powered by Cheers Bin\'s Sparta Theme.', $text );
}
add_filter( 'woocommerce_demo_store', 'wc_custom_store_notice_updated' );


add_filter( 'get_product_search_form' , 'woo_custom_product_searchform' );

/**
 * woo_custom_product_searchform
 *
 * @access      public
 * @since       1.0 
 * @return      void
*/
function woo_custom_product_searchform( $form ) {
	
	$form = '<form role="search" method="get" class="search-form form-group" action="'.home_url( '/' ).'">
    <div class="form-group">
        <div class="input-group">
            <input type="search" class="search-field form-control" placeholder="'.esc_attr_x( 'Search Products', 'sparta' ).'" value="'.get_search_query().'" name="s" title="'.esc_attr_x( 'Search Products', 'label' ).'"> <span class="input-group-btn">
        <button role="submit" class="search-submit btn btn-primary"><i class="fa fa-search"></i></button>
    </span> </div>
    </div>
<input type="hidden" name="post_type" value="product" />
</form>';
	
	return $form;
}