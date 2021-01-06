<?php
/*
Element Description: VC SPARTA HEADING
*/
 global $defaults;
// Element Class 
class spartaHeading extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'sparta_heading_mapping' ) );
        add_shortcode( 'sparta_heading', array( $this, 'sparta_heading_html' ) );
    }
     
    // Element Mapping
    public function sparta_heading_mapping() {
         
             
    // Stop all if VC is not enabled
    if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
    }
    // Map the block with vc_map()
    vc_map( 
  
        array(
            'name' => __('Sparta Heading', 'sparta'),
            'base' => 'sparta_heading',
            'description' => __('Sparta Heading Element with Customizations', 'sparta'), 
            'category' => __('Sparta', 'sparta'),   
            'icon' => get_template_directory_uri().'/assets/images/heading.png',
            'weight'=>'100',
            'params' => array(   
                      
                array(
                    'type' => 'textfield',
                    'holder' => 'p',
                    'class' => 'title-class',
                    'heading' => __( 'Header Text', 'sparta' ),
                    'param_name' => 'header_text',
                    'description' => __( 'Text that will be used for the header.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                ),  
                array(
                    'type' => 'textfield',
                    'class' => 'subtitle-class',
                    'heading' => __( 'Sub Header', 'sparta' ),
                    'param_name' => 'subheader_text',
                    'description' => __( 'Text that will be used for the Sub header.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                ),  
                array(
                    'type' => 'dropdown',
                    'class' => 'subheader-class',
                    'heading' => __( 'Header Type', 'sparta' ),
                    'param_name' => 'header_type',
                    'description' => __( 'Choose the type of header you want to use.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6')
                ),
        array(
                    'type' => 'dropdown',
                    'class' => 'override_section_colorpack-class',
                    'heading' => __( 'Override section Color Pack', 'sparta' ),
                    'param_name' => 'override_colorpack',
                    'description' => __( 'Set to On to override the color pack of the section.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('Off', 'On'),
                    'default'   =>  'Off'
                ),
        array(
                    'type' => 'colorpicker',
                    'class' => 'heading_color-class',
                    'heading' => __( 'Heading Color', 'sparta' ),
                    'param_name' => 'heading_color',
                    'description' => __( 'Set the color of the heading.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' =>  '#000'
                ),
        array(
                    'type' => 'dropdown',
                    'class' => 'subheader_size-class',
                    'heading' => __( 'Sub Header Font Size', 'sparta' ),
                    'param_name' => 'subheader_size',
                    'description' => __( 'Choose size of the font to use in your sub header.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('Normal Paragraph', 'Lead Paragraph'),
                    'default'   =>  'Normal Paragraph'
                ),
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Header Font Size', 'sparta' ),
                    'param_name' => 'header_font_size',
                    'description' => __( 'Choose size of the font to use in your header.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('Normal', 'Big (36px)', 'Bigger (48px)', 'Super (60px)', 'Hyper (96px)'),
                    'default'   =>  'Normal'
                ),
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Header Font Weight', 'sparta' ),
                    'param_name' => 'header_font_weight',
                    'description' => __( 'Choose weight of the font to use in the header.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('Regular', 'Black', 'Bold', 'Light'),
                    'default'   =>  'Regular'
                ),
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Header Font Alignment', 'sparta' ),
                    'param_name' => 'header_font_alignment',
                    'description' => __( 'Align the text shown in the header left, right or center.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('left', 'right', 'center', 'justify'),
                    'default'   =>  'left'
                ),
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Header Underline', 'sparta' ),
                    'param_name' => 'header_underline',
                    'description' => __( 'Adds an underline effect below the header.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('hide', 'show'),
                    'default'   =>  'hide'
                ),
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Header Underline Size', 'sparta' ),
                    'param_name' => 'header_underline_size',
                    'description' => __( 'Size of the underline.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('Normal (72px)', 'Small (48px)'),
                    'default'   =>  'Normal (72px)'
                ),
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Fade Out When Leaving Page', 'sparta' ),
                    'param_name' => 'header_fade_out',
                    'description' => __( 'Fades the heading out when the heading leaves the page.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('Off', 'On'),
                    'default'   =>  'Off'
                ),
        array(
                    'type' => 'textfield',
                    'heading' => __( 'Extra Classes', 'sparta' ),
                    'param_name' => 'extra_classes',
                    'description' => __( 'Space Separated Extra Classes', 'sparta' ),
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
            )
        )
    );                             
        
    } 
     
     
    // Element HTML
    public function sparta_heading_html( $atts ) {
         
         
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'header_text'   => '',
                'subheader_text' => '',
                'header_type' => 'h1',
                'override_colorpack' => '',
                'heading_color' => '',
                'subheader_size' => '',
                'header_font_size' => '',
                'header_font_weight' => '',
                'header_font_alignment' => '',
                'header_underline' => '',
                'header_underline_size' => '',
                'header_fade_out' => '',
                'extra_classes' => '',
                'margin_top' => '',
                'margin_bottom' => '',
                'animation' => '',
                'animation_delay' => '',
            ), 
            $atts
        )
    );
    $wrap_classes = '';
    $paragraph_classes = '';
    $hstyles = '';
    $gstyles = '';
    $hclass = '';
    if($subheader_size == 'Lead Paragraph') {
        $paragraph_classes .= 'lead ';
    }
    if($override_colorpack == 'On'){ 
        $gstyles .= 'color: '.$heading_color.';';
    }
    switch ($header_font_size) {
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
    switch ($header_font_weight) {
        case "Regular":
            $hclass .= 'Regular ';
            break;
        case "Black":
            $hclass .= 'Black ';
            break;
        case "Bold":
            $hclass .= 'Bold ';
            break;
        case "Light":
            $hclass .= 'Light ';
            break;
    }
    $wrap_classes .= 'text-'.$header_font_alignment.' ';
        if($header_underline == 'show') {
            $hclass .= 'underlined ';
        }
        if($header_underline_size == 'Small (48px)') {
            $hclass .= 'underline-small ';
        }
        if($header_fade_out == 'On') {
            $hclass .= 'fade_out ';
            $paragraph_classes .= 'fade_out ';
        }
    switch($margin_top) {
        case "No Margin":
            break;
        case "Short (28px)":
            $wrap_classes .= 'short-m-top ';
            break;
        case "Medium (48px)":
            $wrap_classes .= 'medium-m-top ';
            break;
        case "Normal (72px)":
            $wrap_classes .= 'normal-m-top ';
            break;
        case "Tall (96px)":
            $wrap_classes .= 'tall-m-top ';
            break;
    }
        switch($margin_bottom) {
        case "No Margin":
            break;
        case "Short (28px)":
            $wrap_classes .= 'short-m-bottom ';
            break;
        case "Medium (48px)":
            $wrap_classes .= 'medium-m-bottom ';
            break;
        case "Normal (72px)":
            $wrap_classes .= 'normal-m-bottom ';
            break;
        case "Tall (96px)":
            $wrap_classes .= 'tall-m-bottom ';
            break;
    }
    // Fill $html var with data
    $html = '
    <div class="sparta_heading_wrap '. $wrap_classes .' '.$extra_classes.'">
        <div class="wow '.$animation.'" data-wow-delay="'.$animation_delay.'s">
        <div class="position-relative"><'.$header_type.' style="'.$hstyles.$gstyles.'" class="sparta_heading '.$hclass.'">'.$header_text.'</'.$header_type.'></div>
        <div class="clearfix"></div>
        <p class="'.$paragraph_classes.'" style="'.$gstyles.'">'.$subheader_text.'</p>
        </div>
    </div>';      
     
    return $html;
     
         
    } 
     
} // End Element Class
 
// Element Class Init
new spartaHeading(); 