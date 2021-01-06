<?php

if (!class_exists('Redux')) {
    return;
}

function removeDemoModeLink() {
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_meta_demo_mode_link'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'removeDemoModeLink');

// This is your option name where all the Redux data is stored.
$opt_name = "sparta";

/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => 'Code House Options Panel',
    // Name that appears at the top of your panel
    'display_version'      => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type'            => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => 'Sparta',
    'page_title'           => 'Sparta',
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => 'AIzaSyDUOMYwfBUvOEQmJpbaOcwqteLVui1DvSI',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => true,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => false,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-shield',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    // Show the time the page took to load, etc
    'update_notice'        => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    'show_options_object' => false,

    // OPTIONAL -> Give you extra features
    'page_priority'        => 2,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'sparta',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => get_template_directory_uri().'/assets/images/menu_icon.png',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => get_template_directory_uri().'/assets/images/menu_icon.png',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'sparta_options',
    // Page slug used to denote the panel
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
     'footer_credit'     => '<em>Thanks For Creating it with a product of <a href="http://codehouse.services.cheersbin.com" target="_blank" title="Code House">Code House</a></em>',                   // Disable the footer credit of Redux. Please leave if you can help it.

    //'compiler'             => true,

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'light',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),
);


// Panel Intro text -> before the form
if (!isset($args['global_variable']) || $args['global_variable'] !== false) {
    if (!empty($args['global_variable'])) {
        $v = $args['global_variable'];
    } else {
        $v = str_replace('-', '_', $args['opt_name']);
    }
    $args['intro_text'] = sprintf(__('<p>Thanks for using one of Code House themes. You can customize your Site from this admin panel. Thanks.</p>', 'sparta'), $v);
} else {
    $args['intro_text'] = __('<p>Thanks for using one of Code House themes. You can customize your Site from this admin panel. Thanks.</p>', 'sparta');
}

// Add content after the form.
$args['footer_text'] = __('<p>&copy; 2013 - ' . date('Y') . ' All rights reserved by Code House</p>', 'draft');

Redux::setArgs($opt_name, $args);

/*
 * ---> END ARGUMENTS
 */

if(!function_exists('redux_register_custom_extension_loader')) :
    function redux_register_custom_extension_loader($ReduxFramework) {
        $path = dirname( __FILE__ ) . '/extensions/';
        $folders = scandir( $path, 1 );        
        foreach($folders as $folder) {
            if ($folder === '.' or $folder === '..' or !is_dir($path . $folder) ) {
                continue;   
            } 
            $extension_class = 'ReduxFramework_Extension_' . $folder;
            if( !class_exists( $extension_class ) ) {
                // In case you wanted override your override, hah.
                $class_file = $path . $folder . '/extension_' . $folder . '.php';
                $class_file = apply_filters( 'redux/extension/'.$ReduxFramework->args['opt_name'].'/'.$folder, $class_file );
                if( $class_file ) {
                    require_once( $class_file );
                    $extension = new $extension_class( $ReduxFramework );
                }
            }
        }
    }
    // Modify {$redux_opt_name} to match your opt_name
    add_action("redux/extensions/sparta/before", 'redux_register_custom_extension_loader', 0);
endif;


/*
 *
 * ---> START SECTIONS
 *
 */

$section_options = array(
    'title'   => 'General',
    'icon'    => 'el-icon-cogs',
    'heading' => 'General Options',
);
Redux::setSection($opt_name, $section_options);
$section_options = array(
    'title'      => 'Logo',
    'id'         => 'logo',
    'subsection' => true,
    'desc'      => 'These options allow you to configure the site logo, you can select a logo type and then create a text logo, image logo or both image and text. There is also an option to use retina sized images.',
    'fields'     => array(
        array(
            'id'      => 'logo_text',
            'default' => 'Sparta',
            'title'     => 'Logo Text',
            'type'      => 'text'
        ),
    array(
    'id'       => 'logo_normal',
    'type'     => 'media', 
    'title'    => __('Logo Image', 'sparta'),
    'default'   =>  array(
                        'url'=>get_template_directory_uri().'/assets/images/sparta-crown.gif'
                    ),
),
    array(
    'id'       => 'logo_transparent',
    'type'     => 'media', 
    'title'    => __('Logo Transparent Image', 'sparta'),
    'default'   =>  array(
                        'url'=>get_template_directory_uri().'/assets/images/sparta-crown-white.png'
                    ),
),
    )
);
Redux::setSection($opt_name, $section_options);
$section_options = array(
    'title'      => 'Page Loader',
    'id'         => 'page_loader',
    'subsection' => true,
    'desc'      => 'Toggle an animation when each page loads.',
    'fields'     => array(
        array(
            'id'      => 'page_loader',
            'default' => false,
            'title'     => 'Page Loader Animation',
            'type'      => 'switch'
        ),
    array(
    'id'       => 'loader',
    'type'     => 'button_set',
    'title'    => __('Loader', 'sparta'),
    'options'  => array(
        'pace' => 'Pace Loader',
        'gears' => 'Full Screen'
    ),
    'default'  => 'gears',
),
    array(
    'id'       => 'loader_gif',
    'type'     => 'media', 
    'title'    => __('Loader Image', 'sparta'),
    'default'   =>  array(
                        'url'=>get_template_directory_uri().'/assets/images/loader.png'
                    ),
    'required'  =>  array('loader', 'equals', 'gears')
),
    )
);
Redux::setSection($opt_name, $section_options);
$section_options = array(
    'title'      => 'Header Options',
    'id'         => 'header',
    'subsection' => true,
    'desc'      => 'This section will allow you to setup your site header. You can choose from  different types of header to use on your site.',
    'fields'     => array(
    array(
    'id'       => 'menu_layout',
    'type'     => 'image_select',
    'title'    => __('Menu Layout', 'sparta'), 
    'desc'      =>  __('Sticky Navbar, Search functionality, slide menu and woocommerce menu cart isn\'t supported on layout 4 and 5.', 'sparta'),
    'options'  => array(
        '1'      => array(
            'alt'   => 'right menu', 
            'img'   => get_template_directory_uri().'/assets/images/header_1.png'
        ),
        '2'      => array(
            'alt'   => 'center menu', 
            'img'   => get_template_directory_uri().'/assets/images/header_2.png'
        ),
        '3'      => array(
            'alt'   => 'left menu', 
            'img'  => get_template_directory_uri().'/assets/images/header_3.png'
        ),
        '4'      => array(
                'alt'   => 'logo center', 
                'img'  => get_template_directory_uri().'/assets/images/header_4.png'
            ),
    '5'      => array(
                'alt'   => 'side menu', 
                'img'  => get_template_directory_uri().'/assets/images/header_5.png'
            ),
    '6'      => array(
                'alt'   => 'Logo Center 2', 
                'img'  => get_template_directory_uri().'/assets/images/header_6.png'
            ),
    '7'      => array(
                'alt'   => 'Logo Center 3', 
                'img'  => get_template_directory_uri().'/assets/images/header_7.png'
            )
    ),
    'default' => '2'
),
    array(
            'id'      => 'navbar_fixed',
            'default' => true,
            'title'     => 'Navbar Fixed',
            'desc'      => 'Turn On if you want sticky Navbar which scrolls with page',
            'type'      => 'switch'
        ),
    array(
            'id'      => 'topbar',
            'default' => false,
            'title'     => 'Topbar',
            'desc'      => 'Turn On if you want Topbar',
            'type'      => 'switch'
        ),
    array(
            'id'      => 'navbar_search',
            'default' => false,
            'title'     => 'Search',
            'desc'      => 'Turn On if you want search functionality on navbar',
            'type'      => 'switch'
        ),
    array(
    'id'       => 'menu_color_pack',
    'type'     => 'select',
    'title'    => __('Menu Color Pack', 'sparta'),
    'data'  => 'posts',
    'args'  => array(
        'post_type'      => 'color_packs'
    )
),
    array(
    'id'       => 'topbar_color_pack',
    'type'     => 'select',
    'title'    => __('Topbar Color Pack', 'sparta'),
    'data'  => 'posts',
    'args'  => array(
        'post_type'      => 'color_packs'
    )
),
    array(
    'id'       => 'menu_capitalization',
    'type'     => 'button_set',
    'title'    => __('Capitalization', 'sparta'),
    'options'  => array(
        'none' => 'Off',
        'lowercase' => 'Lowercase',
    'uppercase' => 'Uppercase'
    ),
    'default'  => 'uppercase',
),
    array(
    'id'       => 'menu_colorpack_after_change',
    'type'     => 'select',
    'title'    => __('Menu Color Pack after Change', 'sparta'),
    'data'  => 'posts',
    'args'  => array(
        'post_type'      => 'color_packs'
    )
),
          )
);
Redux::setSection($opt_name, $section_options);
$section_options = array(
    'title'      => 'Comments Options',
    'id'         => 'comment_options',
    'subsection' => true,
    'desc'      => 'This section will allow you to setup the comments for your site.',
    'fields'     => array(
    array(
    'id'       => 'comments_colorpack',
    'type'     => 'select',
    'title'    => __('Comments Sections Color Pack', 'sparta'),
    'data'  => 'posts',
    'args'  => array(
        'post_type'      => 'color_packs'
    )
),
    )
);
Redux::setSection($opt_name, $section_options);
$section_options = array(
    'title'      => 'Upper Footer',
    'id'         => 'upper_footer',
    'subsection' => true,
    'desc'      => 'This footer is above the bottom footer of your site. Here you can set the footer to use 1-4 columns, you can add Widgets to your footer in the Appearance -> Widgets page',
    'fields'     => array(
    array(
    'id'       => 'up_footer_columns',
    'type'     => 'button_set',
    'title'    => __('Upper Footer Columns', 'sparta'),
    'options' => array(
        '1'=>'1',
    '2'=>'2',
    '3'=>'3',
    '4'=>'4'
     ), 
    'default' => '4'
),
    array(
    'id'       => 'up_footer_colorpack',
    'type'     => 'select',
    'title'    => __('Upper Footer Color Pack', 'sparta'),
    'data'  => 'posts',
    'args'  => array(
        'post_type'      => 'color_packs'
    )
),
    )
);
Redux::setSection($opt_name, $section_options);
$section_options = array(
    'title'      => 'Footer',
    'id'         => 'footer',
    'subsection' => true,
    'desc'      => 'The footer is the bottom bar of your site. Here you can set the footer to use 1-4 columns, you can add Widgets to your footer in the Appearance -> Widgets page',
    'fields'     => array(
    array(
    'id'       => 'footer_columns',
    'type'     => 'button_set',
    'title'    => __('Footer Columns', 'sparta'),
    'options' => array(
        '1'=>'1',
    '2'=>'2',
    '3'=>'3',
    '4'=>'4'
     ), 
    'default' => '1'
),
    array(
    'id'       => 'footer_colorpack',
    'type'     => 'select',
    'title'    => __('Footer Color Pack', 'sparta'),
    'data'  => 'posts',
    'args'  => array(
        'post_type'      => 'color_packs'
    )
),
    array(
            'id'      => 'back_to_top',
            'default' => true,
            'title'     => 'Back To Top',
            'type'      => 'switch'
        ),
    array(
    'id'       => 'back_to_top_shape',
    'type'     => 'button_set',
    'title'    => __('Back To Top Shape', 'sparta'),
    'options' => array(
        'square'=>'Square',
        'circle'=>'Circle'
     ), 
    'default' => 'circle'
),
    )
);
Redux::setSection($opt_name, $section_options);
$section_options = array(
    'title'      => 'Topbar Social icons',
    'id'         => 'topbar_icons',
    'subsection' => true,
    'desc'      => 'The Links below will be displayed as their respective icons on topbar\'s left side.',
    'fields'     => array(
    array(
    'id'       => 'tb_fb',
    'type'     => 'text',
    'title'    => __('Facebook', 'sparta'),
),
    array(
    'id'       => 'tb_twitter',
    'type'     => 'text',
    'title'    => __('Twitter', 'sparta'),
),
    array(
    'id'       => 'tb_linkedin',
    'type'     => 'text',
    'title'    => __('LinkedIn', 'sparta'),
),
    array(
    'id'       => 'tb_xing',
    'type'     => 'text',
    'title'    => __('Xing', 'sparta'),
),
    array(
    'id'       => 'tb_gplus',
    'type'     => 'text',
    'title'    => __('Google Plus', 'sparta'),
),
    array(
    'id'       => 'tb_tumblr',
    'type'     => 'text',
    'title'    => __('Tumblr', 'sparta'),
),
    array(
    'id'       => 'tb_pinterest',
    'type'     => 'text',
    'title'    => __('Pinterest', 'sparta'),
),
    array(
    'id'       => 'tb_youtube',
    'type'     => 'text',
    'title'    => __('Youtube', 'sparta'),
),
    array(
    'id'       => 'tb_instagram',
    'type'     => 'text',
    'title'    => __('Instagram', 'sparta'),
),
    array(
    'id'       => 'tb_vine',
    'type'     => 'text',
    'title'    => __('Vine', 'sparta'),
),
    array(
    'id'       => 'tb_vk',
    'type'     => 'text',
    'title'    => __('VK', 'sparta'),
),
    )
);
Redux::setSection($opt_name, $section_options);
$section_options = array(
    'title'      => '404 Page',
    'id'         => '404_page',
    'subsection' => true,
    'desc'      => 'Pick the page that you want to be used as the 404 page.',
    'fields'     => array(
    array(
    'id'       => '404_page',
    'type'     => 'select',
    'title'    => __('404 Page', 'sparta'),
    'data'  => 'pages'
),
    )
);
Redux::setSection($opt_name, $section_options);


//Blog




$section_options = array(
    'title'   => 'Blog',
    'icon'    => 'el-icon-cogs',
    'heading' => 'Blog Options',
);
Redux::setSection($opt_name, $section_options);
$section_options = array(
    'title'      => 'Blog Header Heading',
    'id'         => 'blog_heading',
    'subsection' => true,
    'desc'      => 'Change the text of your blog heading here.',
    'fields'     => array(
        array(
            'id'      => 'blog_header',
            'default' => true,
            'title'     => 'Show Header',
            'type'      => 'switch'
        ),
    array(
            'id'      => 'blog_header_text',
            'title'     => 'Header Text',
            'type'      => 'text',
            'default'   => 'My Blog'
        ),
    array(
            'id'      => 'blog_subheader_text',
            'title'     => 'Sub Header Text',
            'type'      => 'text'
        ),
    array(
    'id'       => 'blog_header_type',
    'type'     => 'button_set',
    'title'    => __('Header Type', 'sparta'),
    'options'  => array(
        'h1' => 'H1',
        'h2' => 'H2',
        'h3' => 'H3',
        'h4' => 'H4',
        'h5' => 'H5',
        'h6' => 'H6'
    ),
    'default'  => 'h1',
),
    array(
    'id'       => 'blog_header_colorpack',
    'type'     => 'select',
    'title'    => __('Header Color Pack', 'sparta'),
    'data'  => 'posts',
    'args'  => array(
        'post_type'      => 'color_packs'
    )
),
    array(
            'id'      => 'overide_blog_colorpack',
            'default' => false,
            'title'     => 'Override Section Color Pack',
            'type'      => 'switch'
        ),
    array(
    'id'       => 'blog_heading_color',
    'type'     => 'color',
    'title'    => __('Heading Color', 'sparta'), 
    'default'  => '#000',
    'validate' => 'color',
    'transparent'=> false
),
    array(
    'id'       => 'blog_subheader_type',
    'type'     => 'button_set',
    'title'    => __('Sub Header Type', 'sparta'),
    'options'  => array(
        'normal' => 'Normal Paragraph',
        'lead' => 'Lead Paragraph'
    ),
    'default'  => 'normal',
),
    array(
    'id'       => 'blog_header_size',
    'type'     => 'button_set',
    'title'    => __('Header Text Size', 'sparta'),
    'options'  => array(
        '25' => 'Normal',
        '36' => 'Big (36px)',
        '48' => 'Bigger (48px)',
        '60' => 'Super (60px)',
        '96' => 'Hyper (96px)'
    ),
    'default'  => '25',
),
    array(
    'id'       => 'blog_header_fweight',
    'type'     => 'button_set',
    'title'    => __('Header Font Weight', 'sparta'),
    'options'  => array(
        '400' => 'Regular',
        'bolder' => 'Black',
        '700' => 'Bold',
        'lighter' => 'Light'
),
    'default'  => '400',
),
    array(
    'id'       => 'blog_header_alignment',
    'type'     => 'button_set',
    'title'    => __('Header Font Alignment', 'sparta'),
    'options'  => array(
        'text-left' => 'Left',
        'text-center' => 'Center',
        'text-right' => 'Right',
        'text-justify' => 'Justify'
),
    'default'  => 'text-left',
),
    array(
            'id'      => 'blog_header_underline',
            'default' => false,
            'title'     => 'Header Underline',
            'type'      => 'switch'
        ),
    array(
    'id'       => 'blog_header_underline_size',
    'type'     => 'button_set',
    'title'    => __('Header Underline Size', 'sparta'),
    'options'  => array(
        'underline-normal' => 'Normal (72px)',
        'underline-small' => 'Small (48px)'
),
    'default'  => 'underline-normal',
),
    array(
            'id'      => 'blog_header_fadeout',
            'default' => false,
            'title'     => 'Fade out when leaving page',
            'type'      => 'switch'
        ),
    array(
            'id'      => 'blog_header_classes',
            'title'     => 'Extra Classes',
            'desc'  =>  'Space Separated',
            'default'=>'',
            'type'      => 'text'
        ),
    array(
    'id'       => 'blog_header_margin_top',
    'type'     => 'button_set',
    'title'    => __('Margin Top', 'sparta'),
    'options'  => array(
        '0' =>  'None',
        '24' => 'Short (24px)',
        '48' => 'Medium (48px)',
        '72' => 'Normal (72px)',
        '92' => 'Tall (92px)'
),
    'default'  => '24',
),
    array(
    'id'       => 'blog_header_margin_bottom',
    'type'     => 'button_set',
    'title'    => __('Margin Bottom', 'sparta'),
    'options'  => array(
        '0' =>  'None',
        '24' => 'Short (24px)',
        '48' => 'Medium (48px)',
        '72' => 'Normal (72px)',
        '92' => 'Tall (92px)'
),
    'default'  => '24',
),
    array(
    'id'        => 'blog_header_overlay',
    'type'      => 'color_rgba',
    'title'     => 'Overlay Color',
 
    // These options display a fully functional color palette.  Omit this argument
    // for the minimal color picker, and change as desired.
    'options'       => array(
        'show_input'                => true,
        'show_initial'              => true,
        'show_alpha'                => true,
        'show_palette'              => true,
        'show_palette_only'         => false,
        'show_selection_palette'    => true,
        'max_palette_size'          => 10,
        'allow_empty'               => true,
        'clickout_fires_change'     => false,
        'choose_text'               => 'Choose',
        'cancel_text'               => 'Cancel',
        'show_buttons'              => true,
        'use_extended_classes'      => true,
        'palette'                   => null,  // show default
        'input_text'                => 'Select Color'
    ),                        
),
    array(
    'id'        => 'blog_header_overlay_grid',
    'type'      => 'slider',
    'title'     => __('Overlay Grid', 'sparta'),
    "default"   => 0,
    "min"       => 0,
    "step"      => 10,
    "max"       => 100,
    'display_value' => 'text'
),
    array(
    'id'       => 'blog_header_bg_img',
    'type'     => 'media', 
    'title'    => __('Background Image', 'sparta'),
),
    array(
    'id'       => 'blog_header_img_size',
    'type'     => 'button_set',
    'title'    => __('Background Image Size', 'sparta'),
    'options'  => array(
        '100%' =>  'Full Width',
        'auto' => 'Actual Size'
),
    'default'  => '100%',
),
    array(
    'id'       => 'blog_header_img_repeat',
    'type'     => 'select',
    'title'    => __('Background Image Repeat', 'sparta'),
    'options'  => array(
        'no-repeat' =>  'No Repeat',
        'repeat-x' => 'Repeat Horizontally',
        'repeat-y' => 'Repeat Vertically',
        'repeat' => 'Repeat Horizontally & Vertically'
),
    'default'  => 'no-repeat',
),
    array(
    'id'        => 'blog_header_img_vpos',
    'type'      => 'slider',
    'title'     => __('Background Image Vertical Position', 'sparta'),
    "default"   => 0,
    "min"       => -100,
    "step"      => 1,
    "max"       => 100,
    'display_value' => 'text'
),
    array(
    'id'       => 'blog_header_img_attachment',
    'type'     => 'button_set',
    'title'    => __('Background Image Attachment', 'sparta'),
    'options'  => array(
        'scroll' =>  'Scroll',
        'fixed' => 'Fixed'
),
    'default'  => 'scroll',
),
    ),
);
Redux::setSection($opt_name, $section_options);
$section_options = array(
    'title'      => 'General Blog Options',
    'id'         => 'general_blog',
    'subsection' => true,
    'desc'      => 'Here you can setup the blog options that are used on all the main blog list pages.',
    'fields'     => array(
    array(
    'id'       => 'blog_layout',
    'type'     => 'image_select',
    'title'    => __('Blog Layout', 'sparta'), 
    'options'  => array(
        '1'      => array(
            'alt'   => 'Right Sidebar', 
            'img'   => get_template_directory_uri() .'/assets/images/right-sidebar.jpeg'
        ),
        '2'      => array(
            'alt'   => 'Left Sidebar', 
            'img'   => get_template_directory_uri() .'/assets/images/left-sidebar.jpeg'
        ),
        '3'      => array(
            'alt'   => 'No Sidebar', 
            'img'   => get_template_directory_uri() .'/assets/images/no-sidebar.jpeg'
        ),
        '4'      => array(
            'alt'   => 'No Sidebar Narrow', 
            'img'   => get_template_directory_uri() .'/assets/images/no-sidebar-narrow.jpeg'
        ),
        '5'      => array(
            'alt'   => 'No Sidebar Wide', 
            'img'   => get_template_directory_uri() .'/assets/images/no-sidebar-wide.jpeg'
        )
    ),
    'default' => '1'
),
    array(
    'id'       => 'blog_display',
    'type'     => 'button_set',
    'title'    => __('Blog Posts Style', 'sparta'),
    'options' => array(
        'list'=>'List',
        'masonry'=>'Masonry',
     ), 
    'default' => 'list'
),
    array(
    'id'        => 'masonry_columns',
    'type'      => 'slider',
    'title'     => __('Masonry Columns', 'sparta'),
    "default"   => 3,
    "min"       => 2,
    "step"      => 1,
    "max"       => 4,
    'display_value' => 'text',
    'required' => array('blog_display','equals','masonry')
),
    array(
    'id'       => 'blog_colorpack',
    'type'     => 'select',
    'title'    => __('Blog Color Pack', 'sparta'),
    'data'  => 'posts',
    'args'  => array(
        'post_type'      => 'color_packs'
    )
),
    array(
    'id'       => 'blog_post_title_type',
    'type'     => 'button_set',
    'title'    => __('Single Post Title Type', 'sparta'),
    'options'  => array(
        'h1' => 'H1',
        'h2' => 'H2',
        'h3' => 'H3',
        'h4' => 'H4',
        'h5' => 'H5',
        'h6' => 'H6'
    ),
    'default'  => 'h3',
),
    array(
            'id'      => 'blog_readmore',
            'default' => true,
            'title'     => 'Show Read More',
            'type'      => 'switch'
        ),
    array(
            'id'      => 'blog_readmore_text',
            'title'     => 'Read More Text',
            'default'=>'read more',
            'type'      => 'text'
        ),
    array(
    'id'       => 'blog_readmore_style',
    'type'     => 'button_set',
    'title'    => __('Read More Style', 'sparta'),
    'options'  => array(
        'button' =>  'Button',
        'link' => 'Simple Link'
),
    'default'  => 'button',
),
    array(
       'id' => 'post_meta_section_start',
       'type' => 'section',
       'title' => __('Post Meta', 'sparta'),
       'subtitle' => __('With this section you can customize what you want to show below the title on Blog Page.', 'sparta'),
       'indent' => true 
   ),
    array(
            'id'      => 'blog_meta_category',
            'default' => true,
            'title'     => 'Category',
            'type'      => 'switch'
        ),
    array(
            'id'      => 'blog_meta_time',
            'default' => true,
            'title'     => 'Date (Time)',
            'type'      => 'switch'
        ),
    array(
            'id'      => 'blog_meta_author',
            'default' => true,
            'title'     => 'Author',
            'type'      => 'switch'
        ),
    array(
            'id'      => 'blog_meta_comments',
            'default' => true,
            'title'     => 'Comments Count',
            'type'      => 'switch'
        ),
    array(
    'id'     => 'post_meta_section_end',
    'type'   => 'section',
    'indent' => false,
    ),
    )
);
Redux::setSection($opt_name, $section_options);
$section_options = array(
    'title'      => 'Single Header Heading',
    'id'         => 'single_post_heading',
    'subsection' => true,
    'fields'     => array(
    array(
    'id'       => 'single_header_type',
    'type'     => 'button_set',
    'title'    => __('Header Type', 'sparta'),
    'options'  => array(
        'h1' => 'H1',
        'h2' => 'H2',
        'h3' => 'H3',
        'h4' => 'H4',
        'h5' => 'H5',
        'h6' => 'H6'
    ),
    'default'  => 'h1',
),
    array(
    'id'       => 'sinlge_header_colorpack',
    'type'     => 'select',
    'title'    => __('Header Color Pack', 'sparta'),
    'data'  => 'posts',
    'args'  => array(
        'post_type'      => 'color_packs'
    )
),
    array(
            'id'      => 'overide_single_colorpack',
            'default' => false,
            'title'     => 'Override Section Color Pack',
            'type'      => 'switch'
        ),
    array(
    'id'       => 'single_heading_color',
    'type'     => 'color',
    'title'    => __('Heading Color', 'sparta'), 
    'default'  => '#fff',
    'validate' => 'color',
    'transparent'=> false
),
    array(
    'id'       => 'single_header_size',
    'type'     => 'button_set',
    'title'    => __('Header Text Size', 'sparta'),
    'options'  => array(
        '25' => 'Normal',
        '36' => 'Big (36px)',
        '48' => 'Bigger (48px)',
        '60' => 'Super (60px)',
        '96' => 'Hyper (96px)'
    ),
    'default'  => '48',
),
    array(
    'id'       => 'single_header_fweight',
    'type'     => 'button_set',
    'title'    => __('Header Font Weight', 'sparta'),
    'options'  => array(
        '400' => 'Regular',
        'bolder' => 'Black',
        '700' => 'Bold',
        'lighter' => 'Light'
),
    'default'  => '700',
),
    array(
    'id'       => 'single_header_alignment',
    'type'     => 'button_set',
    'title'    => __('Header Font Alignment', 'sparta'),
    'options'  => array(
        'text-left' => 'Left',
        'text-center' => 'Center',
        'text-right' => 'Right',
        'text-justify' => 'Justify'
),
    'default'  => 'text-center',
),
    array(
            'id'      => 'single_header_underline',
            'default' => false,
            'title'     => 'Header Underline',
            'type'      => 'switch'
        ),
    array(
    'id'       => 'single_header_underline_size',
    'type'     => 'button_set',
    'title'    => __('Header Underline Size', 'sparta'),
    'options'  => array(
        'underline-normal' => 'Normal (72px)',
        'underline-small' => 'Small (48px)'
),
    'default'  => 'underline-normal',
),
    array(
            'id'      => 'single_header_fadeout',
            'default' => false,
            'title'     => 'Fade out when leaving page',
            'type'      => 'switch'
        ),
    array(
            'id'      => 'single_header_classes',
            'title'     => 'Extra Classes',
            'desc'  =>  'Space Separated',
            'default'=>'',
            'type'      => 'text'
        ),
    array(
    'id'       => 'single_header_margin_top',
    'type'     => 'button_set',
    'title'    => __('Margin Top', 'sparta'),
    'options'  => array(
        '48' => 'Medium (48px)',
        '72' => 'Normal (72px)',
        '92' => 'Tall (92px)',
        '150'=> 'Recommended (150px)'
),
    'default'  => '150',
),
    array(
    'id'       => 'single_header_margin_bottom',
    'type'     => 'button_set',
    'title'    => __('Margin Bottom', 'sparta'),
    'options'  => array(
        '48' => 'Medium (48px)',
        '72' => 'Normal (72px)',
        '92' => 'Tall (92px)',
        '150'=> 'Recommended (150px)'
),
    'default'  => '150',
),
    array(
    'id'        => 'single_header_overlay',
    'type'      => 'color_rgba',
    'title'     => 'Overlay Color',
 
    // These options display a fully functional color palette.  Omit this argument
    // for the minimal color picker, and change as desired.
    'options'       => array(
        'show_input'                => true,
        'show_initial'              => true,
        'show_alpha'                => true,
        'show_palette'              => true,
        'show_palette_only'         => false,
        'show_selection_palette'    => true,
        'max_palette_size'          => 10,
        'allow_empty'               => true,
        'clickout_fires_change'     => false,
        'choose_text'               => 'Choose',
        'cancel_text'               => 'Cancel',
        'show_buttons'              => true,
        'use_extended_classes'      => true,
        'palette'                   => null,  // show default
        'input_text'                => 'Select Color'
    ),
    'default'   =>  array(
        'rgba' => 'rgba(46, 204, 113, 1)')
    ),
    array(
    'id'        => 'single_header_overlay_grid',
    'type'      => 'slider',
    'title'     => __('Overlay Grid', 'sparta'),
    "default"   => 0,
    "min"       => 0,
    "step"      => 10,
    "max"       => 100,
    'display_value' => 'text'
),
    array(
       'id' => 'single_post_meta_section_start',
       'type' => 'section',
       'title' => __('For Single Post Which Have Featured Image Set', 'sparta'),
       'indent' => true 
   ),
    
    array(
    'id'       => 'single_header_img_size',
    'type'     => 'button_set',
    'title'    => __('Background Image Size', 'sparta'),
    'options'  => array(
        '100%' =>  'Full Width',
        'auto' => 'Actual Size'
),
    'default'  => '100%',
),
    array(
    'id'       => 'single_header_img_repeat',
    'type'     => 'select',
    'title'    => __('Background Image Repeat', 'sparta'),
    'options'  => array(
        'no-repeat' =>  'No Repeat',
        'repeat-x' => 'Repeat Horizontally',
        'repeat-y' => 'Repeat Vertically',
        'repeat' => 'Repeat Horizontally & Vertically'
),
    'default'  => 'no-repeat',
),
    array(
    'id'        => 'single_header_img_vpos',
    'type'      => 'slider',
    'title'     => __('Background Image Vertical Position', 'sparta'),
    "default"   => 0,
    "min"       => -100,
    "step"      => 1,
    "max"       => 100,
    'display_value' => 'text'
),
    array(
    'id'       => 'single_header_img_attachment',
    'type'     => 'button_set',
    'title'    => __('Background Image Attachment', 'sparta'),
    'options'  => array(
        'scroll' =>  'Scroll',
        'fixed' => 'Fixed'
),
    'default'  => 'scroll',
),
    array(
    'id'     => 'single_post_img_section_end',
    'type'   => 'section',
    'indent' => false,
    ),
    ),
);
Redux::setSection($opt_name, $section_options);
$section_options = array(
    'title'      => 'General Single Post Options',
    'id'         => 'general_single',
    'subsection' => true,
    'fields'     => array(
    array(
    'id'       => 'single_layout',
    'type'     => 'image_select',
    'title'    => __('Single Post Layout', 'sparta'),
    'desc'      => __('4th Option is Recommended', 'sparta'),
    'options'  => array(
        '1'      => array(
            'alt'   => 'Right Sidebar', 
            'img'   => get_template_directory_uri() .'/assets/images/right-sidebar.jpeg'
        ),
        '2'      => array(
            'alt'   => 'Left Sidebar', 
            'img'   => get_template_directory_uri() .'/assets/images/left-sidebar.jpeg'
        ),
        '3'      => array(
            'alt'   => 'No Sidebar', 
            'img'   => get_template_directory_uri() .'/assets/images/no-sidebar.jpeg'
        ),
        '4'      => array(
            'alt'   => 'No Sidebar Narrow', 
            'img'   => get_template_directory_uri() .'/assets/images/no-sidebar-narrow.jpeg'
        ),
        '5'      => array(
            'alt'   => 'No Sidebar Wide', 
            'img'   => get_template_directory_uri() .'/assets/images/no-sidebar-wide.jpeg'
        )
    ),
    'default' => '4'
),
    array(
    'id'       => 'single_colorpack',
    'type'     => 'select',
    'title'    => __('Single Post Color Pack', 'sparta'),
    'data'  => 'posts',
    'args'  => array(
        'post_type'      => 'color_packs'
    )
),
    array(
    'id'       => 'single_sharing_style',
    'type'     => 'select',
    'title'    => __('Single Post Sharing Styling', 'sparta'),
    'options'   => array(
    'flat' =>  'Flat',
    'classic' =>  'Classic',
    'minima' =>  'Minimalism',
    'plain' =>  'Plain',
),
    'default'   =>  'flat'
),
    array(
    'id'       => 'sharing_options',
    'type'     => 'select',
    'title'    => __('Sharing Options', 'sparta'),
    'multi'    => true,
    //Must provide key => value pairs for options
    'options' => array(
        'email' => 'Email', 
        'twitter' => 'Twitter', 
        'facebook' => 'facebook',
        'googleplus' => 'googleplus',
        'linkedin' => 'linkedin',
        'pinterest' => 'pinterest',
        'stumbleupon' => 'stumbleupon',
        'pocket' => 'pocket',
        'whatsapp' => 'whatsapp',
        'viber' => 'viber',
        'messenger' => 'messenger',
        'vkontakte' => 'vkontakte',
        'telegram' => 'telegram',
        'line' => 'line'
     ), 
    'default' => array('email', 'twitter', 'facebook', 'googleplus', 'whatsapp', 'messenger'),
),
    array(
       'id' => 'post_meta_section_start',
       'type' => 'section',
       'title' => __('Post Meta', 'sparta'),
       'indent' => true 
   ),
    array(
            'id'      => 'single_post_categories',
            'default' => true,
            'title'     => 'Category',
            'type'      => 'switch'
        ),
    array(
            'id'      => 'single_post_writes_on',
            'default' => true,
            'title'     => 'Writes On (Date)',
            'type'      => 'switch'
        ),
    array(
            'id'      => 'single_about_author',
            'default' => true,
            'title'     => 'About Author',
            'type'      => 'switch'
        ),
    array(
            'id'      => 'single_post_tags',
            'default' => true,
            'title'     => 'Tags',
            'type'      => 'switch'
        ),
    array(
    'id'     => 'post_meta_section_end',
    'type'   => 'section',
    'indent' => false,
    ),
    )
);
Redux::setSection($opt_name, $section_options);

// WooCommerce

$section_options = array(
    'title'   => 'WooCommerce',
    'icon'    => 'el-icon-cogs',
    'heading' => 'WooCommerce Options',
);
Redux::setSection($opt_name, $section_options);

$section_options = array(
    'title'      => 'General WooCommerce Options',
    'desc'  =>  'Change the way your shop page looks with these options.',
    'id'         => 'general_wc',
    'subsection' => true,
    'fields'     => array(
    array(
    'id'       => 'wc_colorpack',
    'type'     => 'select',
    'title'    => __('General Shop Color Pack', 'sparta'),
    'data'  => 'posts',
    'args'  => array(
        'post_type'      => 'color_packs'
    )
),
    array(
    'id'       => 'wc_shop_layout',
    'type'     => 'button_set',
    'title'    => __('WooCommerce Layout', 'sparta'),
    'options'  => array(
        'left-sidebar' =>  'Left Sidebar',
        'full-width' => 'Full Width',
        'right-sidebar' => 'Right Sidebar',
),
    'default'  => 'full-width',
),
    array(
            'id'      => 'wc_sharing',
            'default' => true,
            'title'     => 'Sharing',
            'subtitle'  =>  'Show Social Network Sharing Options on Product pages',
            'type'      => 'switch',
        ),
    array(
            'id'      => 'wc_header_cart',
            'default' => true,
            'title'     => 'Cart Icon in Menu',
            'subtitle'  =>  'Turn On if you want a cart icon on header menu.',
            'type'      => 'switch',
        ),
    )
);
Redux::setSection($opt_name, $section_options);

$section_options = array(
    'title'      => 'Shop Page',
    'desc'  =>  'Setup the layout of your Shop.',
    'id'         => 'shop_wc',
    'subsection' => true,
    'fields'     => array(
    array(
    'id'        => 'wc_columns',
    'type'      => 'slider',
    'title'     => __('Product Columns', 'sparta'),
    'default'   => 3,
    'min'       => 2,
    'step'      => 1,
    'max'       => 4,
    'display_value' => 'label'
),
    )
);
Redux::setSection($opt_name, $section_options);
$section_options = array(
    'title'      => 'WooCommerce Header',
    'id'         => 'wc_header',
    'subsection' => true,
    'desc'      => 'Change the text, feel of your WooCommerce heading here.',
    'fields'     => array(
    array(
            'id'      => 'wc_header',
            'default' => true,
            'title'     => 'Show Header',
            'type'      => 'switch',
        ),
    array(
            'id'      => 'wc_single_header',
            'default' => true,
            'title'     => 'Show Header On Single Product Pages',
            'type'      => 'switch',
        ),
    array(
            'id'      => 'wc_header_text',
            'title'     => 'Header Text',
            'type'      => 'text',
            'default'   => 'Shop'
        ),
    array(
            'id'      => 'wc_subheader_text',
            'title'     => 'Sub Header Text',
            'type'      => 'text'
        ),
    array(
    'id'       => 'wc_header_type',
    'type'     => 'button_set',
    'title'    => __('Header Type', 'sparta'),
    'options'  => array(
        'h1' => 'H1',
        'h2' => 'H2',
        'h3' => 'H3',
        'h4' => 'H4',
        'h5' => 'H5',
        'h6' => 'H6'
    ),
    'default'  => 'h1',
),
    array(
    'id'       => 'wc_header_colorpack',
    'type'     => 'select',
    'title'    => __('Header Color Pack', 'sparta'),
    'data'  => 'posts',
    'args'  => array(
        'post_type'      => 'color_packs'
    )
),
    array(
            'id'      => 'overide_wc_colorpack',
            'default' => false,
            'title'     => 'Override Section Color Pack',
            'type'      => 'switch'
        ),
    array(
    'id'       => 'wc_heading_color',
    'type'     => 'color',
    'title'    => __('Heading Color', 'sparta'), 
    'default'  => '#000',
    'validate' => 'color',
    'transparent'=> false
),
    array(
    'id'       => 'wc_subheader_type',
    'type'     => 'button_set',
    'title'    => __('Sub Header Type', 'sparta'),
    'options'  => array(
        'normal' => 'Normal Paragraph',
        'lead' => 'Lead Paragraph'
    ),
    'default'  => 'normal',
),
    array(
    'id'       => 'wc_header_size',
    'type'     => 'button_set',
    'title'    => __('Header Text Size', 'sparta'),
    'options'  => array(
        '25' => 'Normal',
        '36' => 'Big (36px)',
        '48' => 'Bigger (48px)',
        '60' => 'Super (60px)',
        '96' => 'Hyper (96px)'
    ),
    'default'  => '25',
),
    array(
    'id'       => 'wc_header_fweight',
    'type'     => 'button_set',
    'title'    => __('Header Font Weight', 'sparta'),
    'options'  => array(
        '400' => 'Regular',
        'bolder' => 'Black',
        '700' => 'Bold',
        'lighter' => 'Light'
),
    'default'  => '400',
),
    array(
    'id'       => 'wc_header_alignment',
    'type'     => 'button_set',
    'title'    => __('Header Font Alignment', 'sparta'),
    'options'  => array(
        'text-left' => 'Left',
        'text-center' => 'Center',
        'text-right' => 'Right',
        'text-justify' => 'Justify'
),
    'default'  => 'text-left',
),
    array(
            'id'      => 'wc_header_underline',
            'default' => false,
            'title'     => 'Header Underline',
            'type'      => 'switch'
        ),
    array(
    'id'       => 'wc_header_underline_size',
    'type'     => 'button_set',
    'title'    => __('Header Underline Size', 'sparta'),
    'options'  => array(
        'underline-normal' => 'Normal (72px)',
        'underline-small' => 'Small (48px)'
),
    'default'  => 'underline-normal',
),
    array(
            'id'      => 'wc_header_fadeout',
            'default' => false,
            'title'     => 'Fade out when leaving page',
            'type'      => 'switch'
        ),
    array(
            'id'      => 'wc_header_classes',
            'title'     => 'Extra Classes',
            'desc'  =>  'Space Separated',
            'default'=>'',
            'type'      => 'text'
        ),
    array(
    'id'       => 'wc_header_margin_top',
    'type'     => 'button_set',
    'title'    => __('Margin Top', 'sparta'),
    'options'  => array(
        '0' =>  'None',
        '24' => 'Short (24px)',
        '48' => 'Medium (48px)',
        '72' => 'Normal (72px)',
        '92' => 'Tall (92px)'
),
    'default'  => '24',
),
    array(
    'id'       => 'wc_header_margin_bottom',
    'type'     => 'button_set',
    'title'    => __('Margin Bottom', 'sparta'),
    'options'  => array(
        '0' =>  'None',
        '24' => 'Short (24px)',
        '48' => 'Medium (48px)',
        '72' => 'Normal (72px)',
        '92' => 'Tall (92px)'
),
    'default'  => '24',
),
    array(
    'id'        => 'wc_header_overlay',
    'type'      => 'color_rgba',
    'title'     => 'Overlay Color',
 
    // These options display a fully functional color palette.  Omit this argument
    // for the minimal color picker, and change as desired.
    'options'       => array(
        'show_input'                => true,
        'show_initial'              => true,
        'show_alpha'                => true,
        'show_palette'              => true,
        'show_palette_only'         => false,
        'show_selection_palette'    => true,
        'max_palette_size'          => 10,
        'allow_empty'               => true,
        'clickout_fires_change'     => false,
        'choose_text'               => 'Choose',
        'cancel_text'               => 'Cancel',
        'show_buttons'              => true,
        'use_extended_classes'      => true,
        'palette'                   => null,  // show default
        'input_text'                => 'Select Color'
    ),                        
),
    array(
    'id'        => 'wc_header_overlay_grid',
    'type'      => 'slider',
    'title'     => __('Overlay Grid', 'sparta'),
    "default"   => 0,
    "min"       => 0,
    "step"      => 10,
    "max"       => 100,
    'display_value' => 'text'
),
    array(
    'id'       => 'wc_header_bg_img',
    'type'     => 'media', 
    'title'    => __('Background Image', 'sparta'),
),
    array(
    'id'       => 'wc_header_img_size',
    'type'     => 'button_set',
    'title'    => __('Background Image Size', 'sparta'),
    'options'  => array(
        '100%' =>  'Full Width',
        'auto' => 'Actual Size'
),
    'default'  => '100%',
),
    array(
    'id'       => 'wc_header_img_repeat',
    'type'     => 'select',
    'title'    => __('Background Image Repeat', 'sparta'),
    'options'  => array(
        'no-repeat' =>  'No Repeat',
        'repeat-x' => 'Repeat Horizontally',
        'repeat-y' => 'Repeat Vertically',
        'repeat' => 'Repeat Horizontally & Vertically'
),
    'default'  => 'no-repeat',
),
    array(
    'id'        => 'wc_header_img_vpos',
    'type'      => 'slider',
    'title'     => __('Background Image Vertical Position', 'sparta'),
    "default"   => 0,
    "min"       => -100,
    "step"      => 1,
    "max"       => 100,
    'display_value' => 'text'
),
    array(
    'id'       => 'wc_header_img_attachment',
    'type'     => 'button_set',
    'title'    => __('Background Image Attachment', 'sparta'),
    'options'  => array(
        'scroll' =>  'Scroll',
        'fixed' => 'Fixed'
),
    'default'  => 'scroll',
),
    ),
);
Redux::setSection($opt_name, $section_options);



// Colours


$section_options = array(
    'title'   => 'Colours',
    'icon'    => 'el-icon-cogs',
    'heading' => 'Colours Settings',
);
Redux::setSection($opt_name, $section_options);
$section_options = array(
    'title'      => 'Go to top button Colours',
    'desc'  =>  'Set the colours used in go to top button that appears on scrolling a page.',
    'id'         => 'go_to_top',
    'subsection' => true,
    'fields'     => array(
    array(
    'id'       => 'cp_icon_color',
    'type'     => 'color',
    'title'    => __('Button Icon Colour', 'sparta'), 
    'default'  => '#fff',
    'validate' => 'color',
    'transparent'=> false
),
    array(
    'id'        => 'cp_icon_bg',
    'type'      => 'color_rgba',
    'title'     => 'Button Background Colour',
 
    // These options display a fully functional color palette.  Omit this argument
    // for the minimal color picker, and change as desired.
    'options'       => array(
        'show_input'                => true,
        'show_initial'              => true,
        'show_alpha'                => true,
        'show_palette'              => true,
        'show_palette_only'         => false,
        'show_selection_palette'    => true,
        'max_palette_size'          => 10,
        'allow_empty'               => true,
        'clickout_fires_change'     => false,
        'choose_text'               => 'Choose',
        'cancel_text'               => 'Cancel',
        'show_buttons'              => true,
        'use_extended_classes'      => true,
        'palette'                   => null,  // show default
        'input_text'                => 'Select Color'
    ),
    'default'=> array(
        'rgba'     => '#000'
        )                      
)
    )
);
Redux::setSection($opt_name, $section_options);
$section_options = array(
    'title'      => 'Loader Background Colour',
    'id'         => 'loader_bg',
    'subsection' => true,
    'fields'     => array(
    array(
    'id'        => 'loader_bg',
    'type'      => 'color_rgba',
    'title'     => 'Loader Background Colour',
 
    // These options display a fully functional color palette.  Omit this argument
    // for the minimal color picker, and change as desired.
    'options'       => array(
        'show_input'                => true,
        'show_initial'              => true,
        'show_alpha'                => true,
        'show_palette'              => true,
        'show_palette_only'         => false,
        'show_selection_palette'    => true,
        'max_palette_size'          => 10,
        'allow_empty'               => true,
        'clickout_fires_change'     => false,
        'choose_text'               => 'Choose',
        'cancel_text'               => 'Cancel',
        'show_buttons'              => true,
        'use_extended_classes'      => true,
        'palette'                   => null,  // show default
        'input_text'                => 'Select Color'
    ), 
    'default'=> array(
        'rgba'     => '#2E2E2E'
        )                        
)
    )
);
Redux::setSection($opt_name, $section_options);
$section_options = array(
    'title'      => 'Body Background Colour',
    'id'         => 'body_bg',
    'subsection' => true,
    'fields'     => array(
    array(
    'id'        => 'body_bg',
    'type'      => 'color_rgba',
    'title'     => 'Body Background Colour',
 
    // These options display a fully functional color palette.  Omit this argument
    // for the minimal color picker, and change as desired.
    'options'       => array(
        'show_input'                => true,
        'show_initial'              => true,
        'show_alpha'                => true,
        'show_palette'              => true,
        'show_palette_only'         => false,
        'show_selection_palette'    => true,
        'max_palette_size'          => 10,
        'allow_empty'               => true,
        'clickout_fires_change'     => false,
        'choose_text'               => 'Choose',
        'cancel_text'               => 'Cancel',
        'show_buttons'              => true,
        'use_extended_classes'      => true,
        'palette'                   => null,  // show default
        'input_text'                => 'Select Color'
    ),
    'default'   =>  array(
    'rgba' => 'rgba(255,255,255,1)')
)
    )
);
Redux::setSection($opt_name, $section_options);
$section_options = array(
    'title'      => 'Misc.',
    'id'         => 'misc',
    'subsection' => true,
    'fields'     => array(
    array(
    'id'        => 'plinkbgcolor',
    'type'      => 'color_rgba',
    'title'     => 'Next & Previous Post Link Bg Colour',
 
    // These options display a fully functional color palette.  Omit this argument
    // for the minimal color picker, and change as desired.
    'options'       => array(
        'show_input'                => true,
        'show_initial'              => true,
        'show_alpha'                => true,
        'show_palette'              => true,
        'show_palette_only'         => false,
        'show_selection_palette'    => true,
        'max_palette_size'          => 10,
        'allow_empty'               => true,
        'clickout_fires_change'     => false,
        'choose_text'               => 'Choose',
        'cancel_text'               => 'Cancel',
        'show_buttons'              => true,
        'use_extended_classes'      => true,
        'palette'                   => null,  // show default
        'input_text'                => 'Select Color'
    ),
),
    array(
    'id'        => 'plinkiconcolor',
    'type'      => 'color_rgba',
    'title'     => 'Next & Previous Post Link Icon Colour',
 
    // These options display a fully functional color palette.  Omit this argument
    // for the minimal color picker, and change as desired.
    'options'       => array(
        'show_input'                => true,
        'show_initial'              => true,
        'show_alpha'                => true,
        'show_palette'              => true,
        'show_palette_only'         => false,
        'show_selection_palette'    => true,
        'max_palette_size'          => 10,
        'allow_empty'               => true,
        'clickout_fires_change'     => false,
        'choose_text'               => 'Choose',
        'cancel_text'               => 'Cancel',
        'show_buttons'              => true,
        'use_extended_classes'      => true,
        'palette'                   => null,  // show default
        'input_text'                => 'Select Color'
    ),
)
    )
);
Redux::setSection($opt_name, $section_options);
$section_options = array(
    'title'   => 'Advanced',
    'icon'    => 'el-icon-cogs',
    'heading' => 'Advanced Settings',
);
Redux::setSection($opt_name, $section_options);
$section_options = array(
    'title'      => 'CSS',
    'id'         => 'css',
    'desc'  =>  'Here you can modify the themes advanced CSS options.<br/>
Please ensure that the CSS added here is valid. You can copy / paste your CSS <a href="https://jigsaw.w3.org/css-validator/#validate_by_input" target="_blank">here</a> to validate it.',
    'subsection' => true,
    'fields'     => array(
    array(
    'id'       => 'custom_css',
    'type'     => 'ace_editor',
    'title'    => __('Custom CSS', 'sparta'),
    'subtitle' => __('Paste your CSS code here.', 'sparta'),
    'mode'     => 'css',
    'theme'    => 'monokai',
)
    )
);
Redux::setSection($opt_name, $section_options);
$section_options = array(
    'title'      => 'JavaScript',
    'id'         => 'js',
    'desc'  =>  'Here you can modify the themes advanced JS options.',
    'subsection' => true,
    'fields'     => array(
    array(
    'id'       => 'custom_js',
    'type'     => 'ace_editor',
    'title'    => __('Custom JavaScript', 'sparta'),
    'subtitle' => __('Loaded in Footer.', 'sparta'),
    'mode'     => 'javascript',
    'theme'    => 'monokai',
    'default'  => "jQuery(document).ready(function($){
        // YOUR CUSTOM JS HERE
});"
)
    )
);
Redux::setSection($opt_name, $section_options);
$section_options = array(
    'title'      => 'Site Fav Icon',
    'id'         => 'site_fav',
    'desc'  =>  'The site Fav Icon is the icon that appears in the top corner of the browser tab, it is also used when saving bookmarks. Upload your own custom Fav Icon here, recommended resolutions are 16x16 or 32x32.',
    'subsection' => true,
    'fields'     => array(
    array(
    'id'       => 'site_fav',
    'type'     => 'media', 
    'url'      => false,
    'title'    => __('Site Favicon', 'sparta')
)
    )
);
Redux::setSection($opt_name, $section_options);
$section_options = array(
    'title'      => 'Apple & Android Icons',
    'id'         => 'device_icons',
    'desc'  =>  'If someone saves a bookmark to their desktop on an Apple / Android device these are the icons that will be used. Here you can upload the icon you would like to be used on the various Apple / Android devices.',
    'subsection' => true,
    'fields'     => array(
    array(
    'id'       => 'icon_57n57',
    'type'     => 'media', 
    'url'      => false,
    'desc'      =>  'size: 57×57',
    'title'    => __('Classic iPhone / iPod', 'sparta')
),
    array(
    'id'       => 'icon_76n76',
    'type'     => 'media', 
    'url'      => false,
    'desc'      =>  'size: 76×76',
    'title'    => __('iPad', 'sparta')
),
    array(
    'id'       => 'icon_120n120',
    'type'     => 'media', 
    'url'      => false,
    'desc'      =>  'size: 120×120',
    'title'    => __('iPhone / iPod Retina', 'sparta')
),
    array(
    'id'       => 'icon_152n152',
    'type'     => 'media', 
    'url'      => false,
    'desc'      =>  'size: 152×152',
    'title'    => __('iPad Retina', 'sparta')
),
    array(
    'id'       => 'icon_180n180',
    'type'     => 'media', 
    'url'      => false,
    'desc'      =>  'size: 180×180',
    'title'    => __('iPhone 6 Plus', 'sparta')
),
    array(
    'id'       => 'icon_128n128',
    'type'     => 'media', 
    'url'      => false,
    'desc'      =>  'size: 128×128',
    'title'    => __('Android Regular', 'sparta')
),
    array(
    'id'       => 'icon_192n192',
    'type'     => 'media', 
    'url'      => false,
    'desc'      =>  'size: 192×192',
    'title'    => __('Android Hi-Res', 'sparta')
)
    )
);
Redux::setSection($opt_name, $section_options);
$section_options = array(
    'title'      => 'Google Analytics',
    'id'         => 'google_analytics',
    'desc'  =>  'Set your Google Analytics Tracker and keep track of visitors to your site.',
    'subsection' => true,
    'fields'     => array(
    array(
    'id'       => 'google_analy_id',
    'type'     => 'text', 
    'url'      => false,
    'title'    => __('Google Analytics', 'sparta'),
    'default'   => 'UA-XXXXX-X'
)
    )
);
Redux::setSection($opt_name, $section_options);
$section_options = array(
    'title'      => 'Scroll Type',
    'id'         => 'scroll',
    'desc'  =>  'Set scroll type of your site.',
    'subsection' => true,
    'fields'     => array(
    array(
    'id'       => 'scroll',
    'type'     => 'switch', 
    'title'    => __('Smooth Scroll', 'sparta'),
    'default'   => true
),
    array(
    'id'       => 'scroll_speed',
    'type'     => 'text', 
    'title'    => __('Scroll Speed', 'sparta'),
    'default'   => '40',
    'required' => array('scroll','equals',true)
),
    )
);
Redux::setSection($opt_name, $section_options);
$section_options = array(
    'title'   => 'Typography',
    'icon'    => 'el-icon-cogs',
    'heading' => 'Typography',
    'desc'  =>  'This page allows you to choose which fonts your site will load and where they will be used.',
    'fields'     => array(
        array(
            'id'          => 'body_typ',
            'type'        => 'typography', 
            'title'       => __('Body', 'sparta'),
            'google'      => true, 
            'font-backup' => true,
            'output'      => array('h2.site-description'),
            'units'       =>'px',
            'color'         =>  false,
            'fonts' => array( 'Open Sans,arial,helvatica' => 'Open Sans', 'BebasRegular,arial,helvatica' => 'Bebas Regular', 'LeagueGothicRegular,arial,helvatica' => 'League Gothic Regular', 'Arial,helvetica,sans-serif' => 'Arial', '"Helvetica Neue",Helvetica,Arial,sans-serif' => 'Helvatica', 'sans-serif,arial,helvatica' => 'Sans Serif', 'verdana,san-serif,helvatica' => 'Verdana' ),
            'text-align'    => false,
            'default'     => array(
                'font-weight'  => 400, 
                'font-family' => '"Helvetica Neue",Helvetica,Arial,sans-serif', 
                'google'      => true,
                'font-size'   => '15', 
                'line-height' => '24px',
            ),
        ),
    array(
            'id'          => 'headings_typ',
            'type'        => 'typography', 
            'title'       => __('Headings', 'sparta'),
            'google'      => true, 
            'font-backup' => true,
            'output'      => array('h2.site-description'),
            'units'       =>'px',
            'color'         =>  false,
            'font-size' =>  false,
            'line-height' =>  false,
            'text-align'    => false,
            'fonts' => array( 'Open Sans,arial,helvatica' => 'Open Sans', 'BebasRegular,arial,helvatica' => 'Bebas Regular', 'LeagueGothicRegular,arial,helvatica' => 'League Gothic Regular', 'Arial,helvetica,sans-serif' => 'Arial', '"Helvetica Neue",Helvetica,Arial,sans-serif' => 'Helvatica', 'sans-serif,arial,helvatica' => 'Sans Serif', 'verdana,san-serif,helvatica' => 'Verdana' ),
            'default'     => array(
                'font-weight'  => 'lighter',
                'font-family' => '"Helvetica Neue",Helvetica,Arial,sans-serif', 
                'google'      => true,
            ),
        ),
    )
);
Redux::setSection($opt_name, $section_options);
/*
 * <--- END SECTIONS
 */

Redux::init($opt_name);