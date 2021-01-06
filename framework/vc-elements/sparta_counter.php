<?php
/*
Element Description: VC SPARTA Lead Paragraph
*/
class spartaCounter extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'sparta_counter_mapping' ) );
        add_shortcode( 'sparta_counter', array( $this, 'sparta_counter_html' ) );
    }
     
    // Element Mapping
    public function sparta_counter_mapping() {
         
             
    // Stop all if VC is not enabled
    if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
    }
    // Map the block with vc_map()
    vc_map( 
  
        array(
            'name' => __('Sparta Counter', 'sparta'),
            'base' => 'sparta_counter',
            'description' => __('An animated number transition element', 'sparta'), 
            'category' => __('Sparta', 'sparta'),   
            'icon' => get_template_directory_uri().'/assets/images/counter.png',            
            'params' => array(
        array(
                    'type' => 'sparta_number',
                    'heading' => __( 'Initial Value', 'sparta' ),
                    'param_name' => 'init_value',
                    'min'   =>  '0',
                    'max'   =>  '999999999999999999',
                    'admin_label' => false,
                    'weight' => 0,
                ),
        array(
                    'type' => 'sparta_number',
                    'heading' => __( 'End Value', 'sparta' ),
                    'param_name' => 'end_value',
                    'min'   =>  '0',
                    'max'   =>  '999999999999999999',
                    'admin_label' => false,
                    'weight' => 0,
                ),
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Text Alignment', 'sparta' ),
                    'param_name' => 'alignment',
                    'description' => __( 'Align the counter left, right or center.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('left', 'right', 'center', 'justify'),
                    'default'   =>  'left'
                ),
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Font Size', 'sparta' ),
                    'param_name' => 'size',
                    'description' => __( 'Choose size of the font to use in your counter.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('Normal', 'Big (36px)', 'Bigger (48px)', 'Super (60px)', 'Hyper (96px)'),
                    'default'   =>  'Normal'
                ),
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Font Weight', 'sparta' ),
                    'param_name' => 'weight',
                    'description' => __( 'Choose weight of the font to use in the counter.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('Regular', 'Black', 'Bold', 'Light'),
                    'default'   =>  'Regular'
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
    public function sparta_counter_html( $atts ) {
         
         
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'init_value'   => '0',
                'end_value'   => '0',
                'alignment'   => 'left',
                'size'   => '',
                'weight'   => '',
                'margin_top'   => '',
                'margin_bottom'   => '',
                'animation'   => '',
                'animation_delay'   => '',
                'extra_classes'   => '',
            ), 
            $atts
        )
    );
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
    $wrap_class = '';
    $hstyles = '';
    $wrap_class .= ' wow '.$animation.' ';
    $wrap_class .= ' '.$extra_classes.' ';
    $wrap_class .= ' text-'.$alignment.' ';
    switch ($size) {
        case "Normal":
            break;
        case "Big (36px)":
            $hstyles .= 'font-size: 36px;';
            break;
        case "Bigger (48px)":
            $hstyles .= 'font-size: 48px;';
            break;
        case "Super (60px)":
            $hstyles .= 'font-size: 60px;';
            break;
        case "Hyper (96px)":
            $hstyles .= 'font-size: 96px;';
            break;
    }
    switch ($weight) {
        case "Regular":
            $wrap_class .= 'Regular ';
            break;
        case "Black":
            $wrap_class .= 'Black ';
            break;
        case "Bold":
            $wrap_class .= 'Bold ';
            break;
        case "Light":
            $wrap_class .= 'Light ';
            break;
    }
    // Fill $html var with data
    $html = '
    <div class="counter_wrap '.$wrap_class.' '.$margins.'" data-wow-delay="'.$animation_delay.'s" style="'.$hstyles.'">
        <div class="counter" data-to="'.$end_value.'">
            '.$init_value.'
        </div>
    </div>
    ';      
     
    return $html;
     
         
    } 
     
} // End Element Class
 
// Element Class Init
new spartaCounter();