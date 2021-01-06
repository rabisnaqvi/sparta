<?php
/*
Element Description: VC SPARTA Alert
*/
// Element Class 
class spartaAlert extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'sparta_alert_mapping' ) );
        add_shortcode( 'sparta_alert', array( $this, 'sparta_alert_html' ) );
    }
     
    // Element Mapping
    public function sparta_alert_mapping() {
         
             
    // Stop all if VC is not enabled
    if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
    }
    // Map the block with vc_map()
    vc_map( 
        array(
            'name' => __('Sparta Alert', 'sparta'),
            'base' => 'sparta_alert',
            'description' => __('Displays a alert box representing a state.', 'sparta'), 
            'category' => __('Sparta', 'sparta'),   
            'icon' => get_template_directory_uri().'/assets/images/alert.png',            
            'params' => array(
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Text Type', 'sparta' ),
                    'param_name' => 'type',
                    'description' => __( 'Type of text.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('warning', 'danger', 'success', 'info')
                ),
        array(
                    'type' => 'textfield',
                    'holder'=>'p',
                    'heading' => __( 'Title', 'sparta' ),
                    'param_name' => 'title',
                    'description' => __( 'Title of the alert box displayed as a bold text.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                ), 
        array(
                    'type' => 'textarea',
                    'holder'=>'em',
                    'heading' => __( 'Text', 'sparta' ),
                    'param_name' => 'text',
                    'description' => __( 'Text to be displayed', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0
                ),
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Dismisable', 'sparta' ),
                    'param_name' => 'dismisable',
                    'description' => __( 'Turn on to make alert box dismisable', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('No', 'Yes'),
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
    public function sparta_alert_html( $atts ) {
         
         
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'type'   => 'warning',
                'title'   => '',
                'text'   => '',
                'dismisable'   => '',
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
    $alert_class = '';
    $dis = '';
    if($dismisable == 'Yes') {
        $dis = '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        $alert_class .= ' alert-dismissible ';
    }
    // Fill $html var with data
    $html = '
    <div class="sparta_alert_wrap '.$wrap_class.' " data-wow-delay="'.$animation_delay.'s">
    <div class="alert alert-'.$type.' '.$alert_class.'">
        '.$dis.'
      <h4>'.$title.'</h4>
      <p>'.$text.'</p>
    </div>
    </div>
    '; 
    return $html;
    } 
     
} // End Element Class
 
// Element Class Init
new spartaAlert(); 