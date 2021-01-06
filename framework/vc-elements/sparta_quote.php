<?php
/*
Element Description: VC SPARTA Quote
*/
// Element Class 
class spartaQuote extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'sparta_quote_mapping' ) );
        add_shortcode( 'sparta_quote', array( $this, 'sparta_quote_html' ) );
    }
     
    // Element Mapping
    public function sparta_quote_mapping() {
         
             
    // Stop all if VC is not enabled
    if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
    }
    // Map the block with vc_map()
    vc_map( 
        array(
            'name' => __('Sparta Quote', 'sparta'),
            'base' => 'sparta_quote',
            'description' => __('A quote with source/author.', 'sparta'), 
            'category' => __('Sparta', 'sparta'),   
            'icon' => get_template_directory_uri().'/assets/images/quote.png',            
            'params' => array(
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Quote Alignment', 'sparta' ),
                    'param_name' => 'alignment',
                    'description' => __( 'Align the quote left, right or center.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('left', 'right', 'center', 'justify'),
                    'default'   =>  'left'
                ),
        array(
                    'type' => 'textarea',
                    'holder'=>'em',
                    'heading' => __( 'Text', 'sparta' ),
                    'param_name' => 'text',
                    'description' => __( 'Text of Quote', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0
                ),
        array(
                    'type' => 'textfield',
                    'heading' => __( 'Who?', 'sparta' ),
                    'param_name' => 'author',
                    'description' => __( 'Said by Who?', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0
                ),
        array(
                    'type' => 'textfield',
                    'heading' => __( 'Citation', 'sparta' ),
                    'param_name' => 'cite',
                    'description' => __( 'Citation of the quote', 'sparta' ),
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
    public function sparta_quote_html( $atts ) {
         
         
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'alignment'   => 'left',
                'text'   => '',
                'author'   => '',
                'cite'   => '',
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
    $wrap_class .= ' text-'.$alignment.' ';
    $wrap_class .= 'wow '.$animation.' ';
    $wrap_class .= $extra_classes;
    if($alignment == 'right') {
        $bclass .= 'blockquote-reverse';
    }
    // Fill $html var with data
    $html = '
    <div class="sparta_quote_wrap '.$wrap_class.' '.$margins.'" data-wow-delay="'.$animation_delay.'s">
    <blockquote class="'.$bclass.'">
      <p>'.$text.'</p>
      <small>'.$author.' <cite title="'.$cite.'">'.$cite.'</cite></small>
    </blockquote>
    </div>
    '; 
    return $html;
    } 
     
} // End Element Class
 
// Element Class Init
new spartaQuote(); 