<?php 

// 1. customize ACF path
add_filter('acf/settings/path', 'sparta_acf_settings_path');
 
function sparta_acf_settings_path( $path ) {
 
    // update path
    $path = get_template_directory() .  '/framework/acf/';
    
    // return
    return $path;
    
}
 

// 2. customize ACF dir
add_filter('acf/settings/dir', 'sparta_acf_settings_dir');
 
function sparta_acf_settings_dir( $dir ) {
 
    // update path
    $dir = get_template_directory_uri() .  '/framework/acf/';
    
    // return
    return $dir;
    
}
 

// 3. Hide ACF field group menu item
add_filter('acf/settings/show_admin', '__return_false');


// 4. Include ACF
include_once(get_template_directory() . '/framework/acf/acf.php');

// 5. Include Fields
include_once(get_template_directory() . '/framework/acf_fields.php' );


define( 'ACF_LITE', true );