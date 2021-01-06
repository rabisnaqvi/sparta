<?php
/*
Element Description: VC SPARTA Zoom Box
*/
// Element Class 
class spartaZoomBox extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'sparta_zoombox_mapping' ) );
        add_shortcode( 'sparta_zoombox', array( $this, 'sparta_zoombox_html' ) );
    }
     
    // Element Mapping
    public function sparta_zoombox_mapping() {
         
             
    // Stop all if VC is not enabled
    if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
    }
    // Map the block with vc_map()
    vc_map( 
        array(
            'name' => __('Sparta Zoom Box', 'sparta'),
            'base' => 'sparta_zoombox',
            'description' => __('A Attractive image with Hover Effect.', 'sparta'), 
            'category' => __('Sparta', 'sparta'),   
            'icon' => get_template_directory_uri().'/assets/images/zoombox.png',            
            'params' => array(
        array(
                    'type' => 'attach_image',
                    'heading' => __( 'Image', 'sparta' ),
                    'param_name' => 'image',
                    'description' => __( 'This image will be used in zoom box.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                ),
        array(
                    'type' => 'colorpicker',
                    'heading' => __( 'Overlay Color', 'sparta' ),
                    'param_name' => 'color',
                    'description' => __( 'This will be the background of text when user will hover the image.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                ),
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Alignment', 'sparta' ),
                    'param_name' => 'alignment',
                    'description' => __( 'Align the zoombox left, right or center.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('left', 'right', 'center', 'justify'),
                    'default'   =>  'left'
                ),
        array(
                    'type' => 'sparta_number',
                    'heading' => __( 'Padding Top', 'sparta' ),
                    'param_name' => 'padding',
                    'description' => __( 'Padding given to text from top.', 'sparta' ),
                    'min'   =>  '0',
                    'max'   =>  '1000',
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => '0'
                ),
        array(
                    'type' => 'textarea_html',
                    'heading' => __( 'Content', 'sparta' ),
                    'param_name' => 'content',
                    'description' => __( 'Content of Zoom Box', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0
                ),
        array(
                    'type' => 'vc_link',
                    'heading' => __( 'Link of Hover Box', 'sparta' ),
                    'param_name' => 'link',
                    'admin_label' => false,
                    'weight' => 0
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
    public function sparta_zoombox_html( $atts, $content ) {
         
         
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'image'   => '',
                'color'   => '',
                'alignment'   => 'left',
                'padding'   => '',
                'link'   => '',
                'margin_top'   => '',
                'margin_bottom'   => '',
                'animation'   => '',
                'animation_delay'   => '',
                'extra_classes'   => '',
            ), 
            $atts
        )
    );
    $atts['content'] = $content;
    $wrap_class = '';
    $margins = '';
    $hover_styles = '';
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
    $wrap_class .= ' text-'.$alignment.' ';
    $wrap_class .= 'wow '.$animation.' ';
    $wrap_class .= ' '.$margins.' ';
    $wrap_class .= $extra_classes;
    $hover_styles .= "background-color: ".$color.";";
    $url = vc_build_link($link);
    // Fill $html var with data
    $html = '
    <div class="sparta_zoombox_wrap '.$wrap_class.'" data-wow-delay="'.$animation_delay.'s">
        <div class="zoombox position-relative">
            <a href="'.$url['url'].'" title="'.$url['title'].'" rel="'.$url['rel'].'" target="'.$url['target'].'">
                <div class="photo">
                '.wp_get_attachment_image($image, 'full', false, array('class'=>'zoombox_image img-responsive')).'
                </div>
                <div class="hover" style="'.$hover_styles.'">
                    <div class="content" style="padding-top: '.$padding.'px;">'.$content.'</div>
                </div>
            </a>
        </div>
    </div>
    '; 
    return $html;
    } 
     
} // End Element Class
 
// Element Class Init
new spartaZoomBox(); 