<?php
/*
Element Description: VC SPARTA Lead Paragraph
*/
// Element Class 
class spartaProgressBar extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'sparta_progressbar_mapping' ) );
        add_shortcode( 'sparta_progressbar', array( $this, 'sparta_progressbar_html' ) );
    }
     
    // Element Mapping
    public function sparta_progressbar_mapping() {
         
             
    // Stop all if VC is not enabled
    if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
    }
    // Map the block with vc_map()
    vc_map( 
  
        array(
            'name' => __('Sparta Progress Bar', 'sparta'),
            'base' => 'sparta_progressbar',
            'description' => __('A Progress Bar with percentage value', 'sparta'), 
            'category' => __('Sparta', 'sparta'),   
            'icon' => get_template_directory_uri().'/assets/images/progress-bar.png',            
            'params' => array(
        array(
                    'type' => 'sparta_number',
                    'holder' => 'em',
                    'heading' => __( 'Percentage Value', 'sparta' ),
                    'param_name' => 'value',
                    'description' => __( 'Percentage of the progress bar.', 'sparta' ),
                    'min'   =>  '0',
                    'max'   =>  '100',
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => '50'
                ),
        array(
                    'type' => 'textfield',
                    'holder' => 'p',
                    'heading' => __( 'Text', 'sparta' ),
                    'param_name' => 'text',
                    'description' => __( 'Text to be displayed on the progress bar', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                ),
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Bar Type', 'sparta' ),
                    'param_name' => 'type',
                    'description' => __( 'Type of bar to display.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('Normal', 'Stripped', 'Animated')
                ),
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Bar Style', 'sparta' ),
                    'param_name' => 'style',
                    'description' => __( 'Style of bar to display.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('Primary', 'Info', 'Success', 'Warning', 'Danger')
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
    public function sparta_progressbar_html( $atts ) {
         
         
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'value'   => '50',
                'text'   => '',
                'type'   => '',
                'style'   => '',
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
    $bclass = '';
    switch($type) {
        case "Stripped":
            $wrap_class .= 'progress-striped ';
            break;
        case "Animated":
            $wrap_class .= 'progress-striped active ';
            break;
    }
    switch($style) {
        case "Primary":
            $bclass .= 'progress-bar-primary ';
            break;
        case "Info":
            $bclass .= 'progress-bar-info ';
            break;
        case "Success":
            $bclass .= 'progress-bar-success ';
            break;
        case "Warning":
            $bclass .= 'progress-bar-warning ';
            break;
        case "Danger":
            $bclass .= 'progress-bar-danger ';
            break;
    }
    $wrap_class .= ' wow '.$animation.' ';
    $wrap_class .= ' '.$extra_classes.' ';
    // Fill $html var with data
    $html = '
    <div class="progress '.$wrap_class.' '.$margins.'">
    <div class="progress-bar '.$bclass.'" role="progressbar" aria-valuenow="'.$value.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$value.'%" data-wow-delay="'.$animation_delay.'s">
      <span>'.$text.'</span>
    </div>
  </div>
    ';      
     
    return $html;
     
         
    } 
     
} // End Element Class
 
// Element Class Init
new spartaProgressBar(); 