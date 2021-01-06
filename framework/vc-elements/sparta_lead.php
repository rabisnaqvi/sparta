<?php
/*
Element Description: VC SPARTA Lead Paragraph
*/
 global $defaults;
// Element Class 
class spartaLead extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'sparta_lead_mapping' ) );
        add_shortcode( 'sparta_lead', array( $this, 'sparta_lead_html' ) );
    }
     
    // Element Mapping
    public function sparta_lead_mapping() {
         
             
    // Stop all if VC is not enabled
    if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
    }
    // Map the block with vc_map()
    vc_map( 
  
        array(
            'name' => __('Sparta Lead', 'sparta'),
            'base' => 'sparta_lead',
            'description' => __('A Paragraph with Larger and Bolder Text', 'sparta'), 
            'category' => __('Sparta', 'sparta'),   
            'icon' => get_template_directory_uri().'/assets/images/lead.png',
            'weight'=>'99',
            'params' => array(
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Font Alignment', 'sparta' ),
                    'param_name' => 'font_alignment',
                    'description' => __( 'Align the text shown in the lead left, right or center.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('left', 'right', 'center', 'justify'),
                    'default'   =>  'left'
                ),
        array(
                    'type' => 'textarea',
                    'holder' => 'p',
                    'heading' => __( 'Lead Text', 'sparta' ),
                    'param_name' => 'lead_text',
                    'description' => __( 'Text that will be used for the Lead Paragraph.', 'sparta' ),
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
    public function sparta_lead_html( $atts ) {
         
         
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'font_alignment'   => 'left',
                'lead_text'   => '',
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
    // Fill $html var with data
    $html = '
    <div class="sparta_lead_wrapper wow text-'.$font_alignment.' '.$animation.' '.$extra_classes.' '.$margins.'" data-wow-delay="'.$animation_delay.'s">
        <p class="lead">'.$lead_text.'</p>
    </div>
    ';      
     
    return $html;
     
         
    } 
     
} // End Element Class
 
// Element Class Init
new spartaLead(); 