<?php
// Before VC Init
if(function_exists('vc_set_as_theme')) {
    vc_set_as_theme( true );
}
if(!function_exists('vc_remove_element')){
    return;
}

add_action( 'vc_before_init', 'vc_before_init_actions' );
 
function vc_before_init_actions() {
     
    // Link your VC elements's folder
    if( function_exists('vc_set_shortcodes_templates_dir') ){ 
     
        $dir = get_stylesheet_directory() . '/framework/vc-elements';
        vc_set_shortcodes_templates_dir( $dir );
        require_once( get_template_directory() .'/framework/vc-elements/sparta_heading.php' );
        require_once( get_template_directory() .'/framework/vc-elements/sparta_lead.php' );
        require_once( get_template_directory() .'/framework/vc-elements/sparta_button.php' );
        require_once( get_template_directory() .'/framework/vc-elements/sparta_progressbar.php' );
        require_once( get_template_directory() .'/framework/vc-elements/sparta_counter.php' );
        require_once( get_template_directory() .'/framework/vc-elements/sparta_pricecolumn.php' );
        require_once( get_template_directory() .'/framework/vc-elements/sparta_quote.php' );
        require_once( get_template_directory() .'/framework/vc-elements/sparta_emphasis.php' );
        require_once( get_template_directory() .'/framework/vc-elements/sparta_alert.php' );
        require_once( get_template_directory() .'/framework/vc-elements/sparta_jumbotron.php' );
        require_once( get_template_directory() .'/framework/vc-elements/sparta_panel.php' );
        require_once( get_template_directory() .'/framework/vc-elements/sparta_zoombox.php' );
        require_once( get_template_directory() .'/framework/vc-elements/sparta_infobox.php' );
        // Create Number Input Field
        vc_add_shortcode_param( 'sparta_number', 'sparta_num_field' );
function sparta_num_field( $settings, $value ) {
   return '<div class="sparta_num_field">'
             .'<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .
             esc_attr( $settings['param_name'] ) . ' ' .
             esc_attr( $settings['type'] ) . '_field" type="number" value="' . esc_attr( $value ) . '" min="'. esc_attr( $settings['min_val'] ) .'"  max="'. esc_attr( $settings['max_val'] ) .'" />' .
             '</div>'; // This is html markup that will be outputted in content elements edit form
    
}
    }
     
}
// After VC Init
$query = new WP_Query(array(
    'post_type' => 'color_packs',
    'post_status' => 'publish'
));
    $colorpacks = array();
    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
//        $title = str_replace(' ', '', get_the_title());
        $colorpacks[] = array(get_the_title() => $post_id);
    }
    wp_reset_query();
$new_colorpacks = array();
foreach($colorpacks as $value) {
    $new_colorpacks += $value;
}
global $new_colorpacks;



add_action( 'vc_after_init', 'vc_after_init_actions' );



function vc_after_init_actions() {
    global $new_colorpacks;
     
    //*******************//
    // VC ROW REMAPPING //
    //*******************//
 
    // Add Params
    $vc_row_new_params = array(
         
        // Example
        array(
            'type' => 'dropdown',
            'value' => $new_colorpacks,
            'class' => 'colorpack',
            'heading' => __( 'Colorpack', 'sparta' ),
            'param_name' => 'colorpack',
            'admin_label' => false,
            'group' => 'Sparta',
        ),      
     
    );
     
    vc_add_params( 'vc_row', $vc_row_new_params );
    // Add Params
    $vc_inner_row_new_params = array(
         
        // Example
        array(
            'type' => 'dropdown',
            'value' => $new_colorpacks,
            'heading' => __( 'Color Pack', 'sparta' ),
            'param_name' => 'inner_row_colorpack',
            'admin_label' => false,
            'group' => 'Sparta',
        ),      
     
    );
     
    vc_add_params( 'vc_row_inner', $vc_inner_row_new_params );
         
}