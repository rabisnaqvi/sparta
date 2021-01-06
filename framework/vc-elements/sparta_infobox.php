<?php
/*
Element Description: VC SPARTA Info
*/
// Element Class 
class spartaInfoBox extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'sparta_infobox_mapping' ) );
        add_shortcode( 'sparta_infobox', array( $this, 'sparta_infobox_html' ) );
    }
     
    // Element Mapping
    public function sparta_infobox_mapping() {
         
             
    // Stop all if VC is not enabled
    if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
    }
    // Map the block with vc_map()
    vc_map( 
        array(
            'name' => __('Sparta Infobox', 'sparta'),
            'base' => 'sparta_infobox',
            'description' => __('Displays a box with icon, border and hover effect.', 'sparta'), 
            'category' => __('Sparta', 'sparta'),   
            'icon' => get_template_directory_uri().'/assets/images/infobox.png',            
            'params' => array(
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Icon', 'sparta' ),
                    'param_name' => 'icon',
                    'description' => __( 'Icon to Display', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => sparta_get_fontawesome_array(false),
                ),
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Icon Size', 'sparta' ),
                    'param_name' => 'icon_size',
                    'description' => __( 'Size of Icon.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('Normal', 'Big', 'Bigger', 'Super', 'Hyper'),
                ),
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Icon Style', 'sparta' ),
                    'param_name' => 'icon_style',
                    'description' => __( 'Style of Icon.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('Square', 'Round', 'Circle'),
                ),
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Text Alignment', 'sparta' ),
                    'param_name' => 'alignment',
                    'description' => __( 'Align the Info Box\'s content left, right or center.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('left', 'right', 'center', 'justify'),
                    'default'   =>  'left'
                ),
        array(
                    'type' => 'textfield',
                    'heading' => __( 'Box Title', 'sparta' ),
                    'param_name' => 'title',
                    'description' => __( 'Infobox Title', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                ), 
        array(
                    'type' => 'textarea',
                    'heading' => __( 'Content', 'sparta' ),
                    'param_name' => 'text',
                    'description' => __( 'Content of Info box', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                ),
        array(
                    'type' => 'colorpicker',
                    'heading' => __( 'Icon Color', 'sparta' ),
                    'param_name' => 'iconcolor',
                    'description' => __( 'Color of Icon', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                ),
        array(
                    'type' => 'colorpicker',
                    'heading' => __( 'Icon Background Color', 'sparta' ),
                    'param_name' => 'iconbgcolor',
                    'description' => __( 'Background Color of Icon', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                ),
        array(
                    'type' => 'colorpicker',
                    'heading' => __( 'Icon Border Color', 'sparta' ),
                    'param_name' => 'iconbordercolor',
                    'description' => __( 'Border Color of Icon', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                ),
        array(
                    'type' => 'colorpicker',
                    'heading' => __( 'Icon Color on Hover', 'sparta' ),
                    'param_name' => 'iconcolorhover',
                    'description' => __( 'Color of Icon on hover', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                ),
        array(
                    'type' => 'colorpicker',
                    'heading' => __( 'Icon Background Color on Hover', 'sparta' ),
                    'param_name' => 'iconbgcolorhover',
                    'description' => __( 'Background Color of Icon on hover', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                ), 
        array(
                    'type' => 'colorpicker',
                    'heading' => __( 'Icon Border Color on hover', 'sparta' ),
                    'param_name' => 'iconbordercolorhover',
                    'description' => __( 'Border Color of Icon on hover', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                ),
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Margin Top', 'sparta' ),
                    'param_name' => 'margin_top',
                    'description' => __( 'Amount of space to add above this element.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('No Margin', 'Short (28px)', 'Medium (48px)', 'Normal (72px)', 'Tall (96px)'),
                ),
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Margin Bottom', 'sparta' ),
                    'param_name' => 'margin_bottom',
                    'description' => __( 'Amount of space to add below this element.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('No Margin', 'Short (28px)', 'Medium (48px)', 'Normal (72px)', 'Tall (96px)'),
                ),
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Scroll Animation', 'sparta' ),
                    'param_name' => 'animation',
                    'description' => __( 'Animation that will occur when the user scrolls onto the element.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array(
            'No Animation',
        'bounce',
        'flash',
        'pulse',
        'rubberBand',
        'shake',
        'headShake',
        'swing',
        'tada',
        'wobble',
        'jello',
        'bounceIn',
        'bounceInDown',
        'bounceInLeft',
        'bounceInRight',
        'bounceInUp',
        'bounceOut',
        'bounceOutDown',
        'bounceOutLeft',
        'bounceOutRight',
        'bounceOutUp',
        'fadeIn',
        'fadeInDown',
        'fadeInDownBig',
        'fadeInLeft',
        'fadeInLeftBig',
        'fadeInRight',
        'fadeInRightBig',
        'fadeInUp',
        'fadeInUpBig',
        'fadeOut',
        'fadeOutDown',
        'fadeOutDownBig',
        'fadeOutLeft',
        'fadeOutLeftBig',
        'fadeOutRight',
        'fadeOutRightBig',
        'fadeOutUp',
        'fadeOutUpBig',
        'flipInX',
        'flipInY',
        'flipOutX',
        'flipOutY',
        'lightSpeedIn',
        'lightSpeedOut',
        'rotateIn',
        'rotateInDownLeft',
        'rotateInDownRight',
        'rotateInUpLeft',
        'rotateInUpRight',
        'rotateOut',
        'rotateOutDownLeft',
        'rotateOutDownRight',
        'rotateOutUpLeft',
        'rotateOutUpRight',
        'hinge',
        'rollIn',
        'rollOut',
        'zoomIn',
        'zoomInDown',
        'zoomInLeft',
        'zoomInRight',
        'zoomInUp',
        'zoomOut',
        'zoomOutDown',
        'zoomOutLeft',
        'zoomOutRight',
        'zoomOutUp',
        'slideInDown',
        'slideInLeft',
        'slideInRight',
        'slideInUp',
        'slideOutDown',
        'slideOutLeft',
        'slideOutRight',
        'slideOutUp',
    ),
                ),
         array(
                    'type' => 'sparta_number',
                    'heading' => __( 'Animation Delay', 'sparta' ),
                    'param_name' => 'animation_delay',
                    'description' => __( 'Delay after scrolling onto the element before animation starts in seconds.', 'sparta' ),
                    'min'   =>  '0',
                    'max'   =>  '4',
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => '0'
                ),  
        array(
                    'type' => 'textfield',
                    'heading' => __( 'Extra Classes', 'sparta' ),
                    'param_name' => 'extra_classes',
                    'description' => __( 'Space Separated Extra Classes', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                ),  
            )
        )
    );                             
        
    } 
     
    
    // Element HTML
    public function sparta_infobox_html( $atts ) {
         
         
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'icon'   => 'fa-500',
                'icon_size'   => 'Normal',
                'icon_style'   => 'Square',
                'title'   => '',
                'text'   => '',
                'alignment'   => 'left',
                'iconcolor'   => '',
                'iconbgcolor'   => '',
                'iconbordercolor'   => '',
                'iconcolorhover'   => '',
                'iconbgcolorhover'   => '',
                'iconbordercolorhover'   => '',
                'margin_top'   => '',
                'margin_bottom'   => '',
                'animation'   => '',
                'animation_delay'   => '',
                'extra_classes'   => '',
            ), 
            $atts
        )
    );
    $wrap_class = '';
    $bclass = '';
    $margins = '';
    switch($margin_top) {
        case "No Margin":
            break;
        case "Short (28px)":
            $margins .= 'short-m-top ';
            break;
        case "Medium (48px)":
            $margins .= 'medium-m-top ';
            break;
        case "Normal (72px)":
            $margins .= 'normal-m-top ';
            break;
        case "Tall (96px)":
            $margins .= 'tall-m-top ';
            break;
    }
    switch($margin_bottom) {
        case "No Margin":
            break;
        case "Short (28px)":
            $margins .= 'short-m-bottom ';
            break;
        case "Medium (48px)":
            $margins .= 'medium-m-bottom ';
            break;
        case "Normal (72px)":
            $margins .= 'normal-m-bottom ';
            break;
        case "Tall (96px)":
            $margins .= 'tall-m-bottom ';
            break;
    }
    $wrap_class .= 'wow '.$animation.' ';
    $wrap_class .= $extra_classes;
    // Fill $html var with data
    $html = '
    <div class="sparta_infobox '.$margins.' '.$wrap_class.' text-'.$alignment.'" data-wow-delay="'.$animation_delay.'s">
        <div class="icon styled '.$icon_style.' '.$icon_size.'" style="color: '.$iconcolor.'; background-color: '.$iconbgcolor.'; border-color: '.$iconbordercolor.';" data-color="'.$iconcolor.'" data-bg="'.$iconbgcolor.'" data-border="'.$iconbordercolor.'" data-color-hover="'.$iconcolorhover.'" data-bg-hover="'.$iconbgcolorhover.'" data-border-hover="'.$iconbordercolorhover.'">
            <i class="fa '.$icon.'"></i>
        </div>
        <div class="content">
            <div class="title">
                <span>'.$title.'</span>
            </div>
            <div class="text">
                <span>'.$text.'</span>
            </div>
        </div>
    </div>
    '; 
    return $html;
    } 
     
} // End Element Class
 
// Element Class Init
new spartaInfoBox(); 