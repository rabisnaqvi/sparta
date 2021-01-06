<?php
/*
Element Description: VC SPARTA Button
*/
// Element Class 
class spartaButton extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'sparta_button_mapping' ) );
        add_shortcode( 'sparta_button', array( $this, 'sparta_button_html' ) );
    }
     
    // Element Mapping
    public function sparta_button_mapping() {
         
             
    // Stop all if VC is not enabled
    if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
    }
    // Map the block with vc_map()
    vc_map( 
        array(
            'name' => __('Sparta Button', 'sparta'),
            'base' => 'sparta_button',
            'description' => __('A button with or without icon', 'sparta'), 
            'category' => __('Sparta', 'sparta'),   
            'icon' => get_template_directory_uri().'/assets/images/button.png',
            'weight'=>'98',
            'params' => array(
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Button Type', 'sparta' ),
                    'param_name' => 'type',
                    'description' => __( 'Type of button to display.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('primary', 'info', 'success', 'warning', 'danger'),
                ),
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Button Size', 'sparta' ),
                    'param_name' => 'size',
                    'description' => __( 'Size of button to display.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('Normal', 'Small', 'Large'),
                ),
        array(
                    'type' => 'textfield',
                    'holder' => 'p',
                    'heading' => __( 'Button Text', 'sparta' ),
                    'param_name' => 'text',
                    'description' => __( 'Text that will be used on the Button.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                ),
        array(
                    'type' => 'vc_link',
                    'heading' => __( 'Button Link', 'sparta' ),
                    'param_name' => 'link',
                    'admin_label' => false,
                    'weight' => 0,
                ),
         array(
                    'type' => 'dropdown',
                    'heading' => __( 'Icon Position', 'sparta' ),
                    'param_name' => 'icon_pos',
                    'description' => __( 'On which side you\'d like icon to appear?', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('left', 'right'),
                ),
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Icon', 'sparta' ),
                    'param_name' => 'icon',
                    'description' => __( 'Icon to Display', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => sparta_get_fontawesome_array(),
                ),
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Custom Color', 'sparta' ),
                    'param_name' => 'custom_color',
                    'description' => __( 'Would you like to change the colors of button?', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('Off', 'On'),
                ),
        array(
                    'type' => 'colorpicker',
                    'heading' => __( 'Button Background', 'sparta' ),
                    'param_name' => 'bg',
                    'description' => __( 'This will be the background of button', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => '#5FCF80',
                ),
        array(
                    'type' => 'colorpicker',
                    'heading' => __( 'Button Text Color', 'sparta' ),
                    'param_name' => 'color',
                    'description' => __( 'This will be the text color of button', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => '#fff',
                ),
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Button Alignment', 'sparta' ),
                    'param_name' => 'alignment',
                    'description' => __( 'Align the button left, right or center.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('left', 'right', 'center', 'justify'),
                    'default'   =>  'left'
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
    public function sparta_button_html( $atts ) {
         
         
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'type'   => 'primary',
                'size'   => '',
                'text'   => '',
                'link'   => '',
                'icon_pos'   => 'left',
                'icon'   => '',
                'custom_color'   => '',
                'bg'   => '',
                'color'   => '',
                'alignment'   => 'left',
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
    $bstyles = '';
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
        switch($size) {
            case "Small":
                $bclass .= 'btn-sm ';
                break;
            case "Large":
                $bclass .= 'btn-lg ';
                break;
        }
    $href = vc_build_link( $link );
    $show_icon = '';
    if($custom_color == 'On') {
        $bstyles .= 'background-color: '.$bg.';';
        $bstyles .= 'color: '.$color.';';
    }
    if($icon && $icon != '') {
        $show_icon .= '<i class="fa '.$icon.' pull-'.$icon_pos.'" style="'.$bstyles.'"></i>';
    }
    $wrap_class .= ' text-'.$alignment.' ';
    $bclass .= 'wow '.$animation.' ';
    $wrap_class .= $extra_classes;
    // Fill $html var with data
    $html = '
    <div class="sparta_button_wrap'.$wrap_class.' '.$margins.'">
        <a role="button" href="'.$href['url'].'" title="'.$href['title'].'" target="'.$href['target'].'" rel="'.$href['rel'].'" class="btn btn-'.$type.' '.$bclass.'" style="'.$bstyles.'" data-wow-delay="'.$animation_delay.'s">'.$show_icon.''.$text.'</a>
    </div>
    '; 
    return $html;
    } 
     
} // End Element Class
 
// Element Class Init
new spartaButton(); 