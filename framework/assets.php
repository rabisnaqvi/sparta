<?php
global $sparta;
function sparta_assets(){
    global $sparta;
   // Style
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/font-awesome-4.7.0/css/font-awesome.css');
    wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/bootstrap/css/bootswatch-theme.css');
    wp_enqueue_style( 'pace', get_template_directory_uri().'/assets/pace.css');
    wp_enqueue_style( 'animate', get_template_directory_uri().'/assets/animate.css');
    wp_enqueue_style( 'jssocials', get_template_directory_uri().'/assets/jssocials/jssocials.css');
    wp_enqueue_style( 'jssocials-style', get_template_directory_uri().'/assets/jssocials/jssocials-theme-'.$sparta['single_sharing_style'].'.css');    
	wp_enqueue_style( 'bootsnav', get_template_directory_uri().'/assets/bootsnav/css/bootsnav.css');
	wp_enqueue_style( 'main', get_template_directory_uri().'/assets/style.css');
    if ( is_rtl() ) {
      wp_enqueue_style(  'style-rtl',  get_template_directory_uri().'/rtl.css' );
    }
//    Javascript
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/bootstrap/js/bootstrap.min.js', array('jquery'), '', true);
    wp_enqueue_script('pace', get_template_directory_uri().'/assets/pace.js', array('jquery'), '', true);
    wp_enqueue_script('jssocials', get_template_directory_uri().'/assets/jssocials/jssocials.js', array('jquery'), '', true);
    wp_enqueue_script('wow', get_template_directory_uri().'/assets/wow.js', array('jquery'), '', true);
    wp_enqueue_script('animate_number', get_template_directory_uri().'/assets/animate_number/jquery.animateNumber.min.js', array('jquery'), '', true);
    wp_enqueue_script('masonry', get_template_directory_uri().'/assets/masonry.js', array('jquery'), '', true);
    wp_enqueue_script('bootsnav', get_template_directory_uri().'/assets/bootsnav/js/bootsnav.js', array('jquery'), '', true);
    wp_enqueue_script('nicescroll', get_template_directory_uri().'/assets/nicescroll/jquery.nicescroll.js', array('jquery'), '', true);
    wp_enqueue_script('main', get_template_directory_uri().'/assets/main.js', array('jquery'), '', true);
}
add_action( 'wp_enqueue_scripts', 'sparta_assets' );