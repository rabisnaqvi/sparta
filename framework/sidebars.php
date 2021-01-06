<?php
global $sparta;
// Sidebars
function spartaWidgetInit() {
    global $sparta;
	   /**
		* Creates a sidebar
		* @param string|array  Builds Sidebar based off of 'name' and 'id' values.
		*/
		$args = array(
			'name'          => __( 'Default Sidebar', 'sparta' ),
			'id'            => 'default_sidebar',
			'description'   => __( 'Default Sidebar used on Posts, Blog & Archive Pages', 'sparta'),
            'before_widget' => '<div id="%1$s" class="widget %2$s sidebar_widget">',
         'after_widget'  => '</div>',
         'before_title'  => '<div class="position-relative"><h4 class="sidebar_header underlined">',
         'after_title'   => '</h4></div>'
		);
    register_sidebar( $args );
    if(function_exists('is_woocommerce')) {
    $args = array(
			'name'          => __( 'WooCommerce Sidebar', 'sparta' ),
			'id'            => 'wc_sidebar',
			'description'   => __( 'Sidebar Used on Shop, Category and Single Product Pages', 'sparta'),
            'before_widget' => '<div id="%1$s" class="widget %2$s sidebar_widget">',
         'after_widget'  => '</div>',
         'before_title'  => '<div class="position-relative"><h4 class="sidebar_header underlined">',
         'after_title'   => '</h4></div>'
		);
    register_sidebar( $args );
    }
	   for($i = 1; $i <= $sparta['up_footer_columns']; $i++) {
           $args = array(
			'name'          => __( 'Upper Footer '.$i, 'sparta' ),
			'id'            => 'upper_footer_'.$i,
            'before_widget' => '<div id="%1$s" class="widget %2$s sidebar_widget">',
         'after_widget'  => '</div>',
         'before_title'  => '<div class="position-relative"><h4 class="sidebar_header underlined">',
         'after_title'   => '</h4></div>'
		);
    register_sidebar( $args );
       }
    	   for($i = 1; $i <= $sparta['footer_columns']; $i++) {
           $args = array(
			'name'          => __( 'Footer '.$i, 'sparta' ),
			'id'            => 'lower_footer_'.$i,
            'before_widget' => '<div id="%1$s" class="widget %2$s sidebar_widget">',
         'after_widget'  => '</div>',
         'before_title'  => '<div class="position-relative"><h4 class="sidebar_header underlined">',
         'after_title'   => '</h4></div>'
		);
    register_sidebar( $args );
       }
	
}