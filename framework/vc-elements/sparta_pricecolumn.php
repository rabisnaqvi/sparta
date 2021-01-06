<?php
/*
Element Description: VC SPARTA Pricing Column
*/
class spartaPriceColumn extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'sparta_pricecolumn_mapping' ) );
        add_shortcode( 'sparta_pricecolumn', array( $this, 'sparta_pricecolumn_html' ) );
    }
     
    // Element Mapping
    public function sparta_pricecolumn_mapping() {
         
             
    // Stop all if VC is not enabled
    if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
    }
    // Map the block with vc_map()
    vc_map( 
  
        array(
            'name' => __('Sparta Price Column', 'sparta'),
            'base' => 'sparta_pricecolumn',
            'description' => __('A beautiful price info column', 'sparta'), 
            'category' => __('Sparta', 'sparta'),   
            'icon' => get_template_directory_uri().'/assets/images/pricecolumn.png',            
            'params' => array(
        array(
                    'type' => 'textfield',
                    'holder'=>'em',
                    'heading' => __( 'Heading', 'sparta' ),
                    'param_name' => 'heading',
                    'description' => __( 'Text to be displayed on top of column', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                ), 
        array(
                    'type' => 'textfield',
                    'heading' => __( 'Sub Text', 'sparta' ),
                    'param_name' => 'subtext',
                    'description' => __( 'Text to be displayed below heading on top of column', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                ),
        array(
                    'type' => 'textfield',
                    'heading' => __( 'Currency', 'sparta' ),
                    'param_name' => 'currency',
                    'description' => __( 'Currency to be displayed. e.g, <code>$</code> or <code>Rs.</code>', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value'=>'$'
                ),
        array(
                    'type' => 'sparta_number',
                    'heading' => __( 'Decimal value of Price', 'sparta' ),
                    'param_name' => 'price',
                    'description' => __( 'Enter the left part of your price value. e.g if your price is 4.65 then enter 4 here', 'sparta' ),
                    'min'   =>  '0',
                    'max'   =>  '9999999999',
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => '0'
                ),
        array(
                    'type' => 'sparta_number',
                    'heading' => __( 'Float value of Price', 'sparta' ),
                    'param_name' => 'dotprice',
                    'description' => __( 'Enter the right part of your price value. e.g if your price is 4.65 then enter 65 here', 'sparta' ),
                    'min'   =>  '0',
                    'max'   =>  '9999999999',
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => '00'
                ),
        array(
                    'type' => 'textfield',
                    'heading' => __( 'Text Below Price', 'sparta' ),
                    'param_name' => 'price_below_text',
                    'description' => __( 'Text to be displayed below price. e.g, <code>-/ month</code> or <code>one time</code>', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value'=>'per month'
                ),
        array(
                    'type' => 'exploded_textarea',
                    'heading' => __( 'Features', 'sparta' ),
                    'param_name' => 'features',
                    'description' => __( 'Features which will be displayed in column. NOTE: ADD ONE FEATURE PER LINE ', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0
                ),
        array(
                    'type' => 'textarea',
                    'heading' => __( 'Text Below Features', 'sparta' ),
                    'param_name' => 'about',
                    'description' => __( 'Text to be displayed below features on column', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0
                ), 
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Display Button', 'sparta' ),
                    'param_name' => 'button',
                    'description' => __( 'Would you like to display a button in price column ?', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('Yes', 'No'),
                ),
        array(
                    'type' => 'textfield',
                    'heading' => __( 'Button Text', 'sparta' ),
                    'param_name' => 'button_text',
                    'description' => __( 'Text to be displayed on button', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value'=>'Buy Now'
                ),
        array(
                    'type' => 'textfield',
                    'heading' => __( 'Button Link', 'sparta' ),
                    'param_name' => 'button_link',
                    'admin_label' => false,
                    'weight' => 0
    ),
        array(
                    'type' => 'dropdown',
                    'heading' => __( 'Is Featured?', 'sparta' ),
                    'param_name' => 'featured',
                    'description' => __( 'Featured Columns are more attractive and have unique layout then non-featured columns.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => array('No', 'Yes'),
                ),
        array(
                    'type' => 'colorpicker',
                    'heading' => __( 'Primary Color', 'sparta' ),
                    'param_name' => 'pcolor',
                    'description' => __( 'Primary color is used on header and on featured/hovered price column\'s border.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => '#36D7AC',
                ),
        array(
                    'type' => 'colorpicker',
                    'heading' => __( 'Primary Text Color', 'sparta' ),
                    'param_name' => 'ptextcolor',
                    'description' => __( 'Primary text color is used on top header text. On heading and sub heading of column', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => '#fff',
                ),
        array(
                    'type' => 'colorpicker',
                    'heading' => __( '2nd Color', 'sparta' ),
                    'param_name' => 'scolor',
                    'description' => __( '2ND color is used on background of price area. And on unhovered price column\'s border.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => '#FBFEF2',
                ),
        array(
                    'type' => 'colorpicker',
                    'heading' => __( '2nd text color', 'sparta' ),
                    'param_name' => 'stextcolor',
                    'description' => __( '2nd text color is used on price of unhovered/non-featured price columns.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => '#bac39f',
                ),
        array(
                    'type' => 'colorpicker',
                    'heading' => __( '3rd color', 'sparta' ),
                    'param_name' => 'tcolor',
                    'description' => __( '3rd color is used as background of features, button area.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => '#fff',
                ),
        array(
                    'type' => 'colorpicker',
                    'heading' => __( '3rd text color', 'sparta' ),
                    'param_name' => 'ttextcolor',
                    'description' => __( '3rd text color is used on text of features area.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => '#888',
                ),
        array(
                    'type' => 'colorpicker',
                    'heading' => __( 'Shadow color', 'sparta' ),
                    'param_name' => 'shadowcolor',
                    'description' => __( 'NOTE: Box shadow is only visible on featured columns.', 'sparta' ),
                    'admin_label' => false,
                    'weight' => 0,
                    'dependency'=> array(
                    'element'=>'featured',
                    'value'=>'Yes'
                    ),
                    'value' => 'rgba(54, 215, 172, 0.2)',
                ),
        array(
                    'type' => 'colorpicker',
                    'heading' => __( 'Button Background color', 'sparta' ),
                    'param_name' => 'buttonbg',
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => '#f3c200',
                ),
        array(
                    'type' => 'colorpicker',
                    'heading' => __( 'Button Text color', 'sparta' ),
                    'param_name' => 'buttontextcolor',
                    'admin_label' => false,
                    'weight' => 0,
                    'value' => '#fff',
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
    public function sparta_pricecolumn_html( $atts ) {
         
         
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'heading'   => '',
                'subtext'   => '',
                'currency'   => '$',
                'price'   => '0',
                'dotprice'   => '00',
                'price_below_text'   => 'per month',
                'features'   => '',
                'about'   => '',
                'button'   => 'Yes',
                'button_text'   => 'Buy Now',
                'button_link'   => '',
                'featured'   => '',
                'pcolor'   => '',
                'ptextcolor'   => '',
                'shadowcolor'   => 'rgba(54, 215, 172, 0.2)',
                'stextcolor'   => '#bac39f',
                'tcolor'   => '',
                'ttextcolor'   => '',
                'scolor'   => '',
                'buttonbg'   => '',
                'buttontextcolor'   => '',
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
    $show_button = '';
    $wrap_class .= ' wow '.$animation.' ';
    $wrap_class .= ' '.$extra_classes.' ';
    $features = explode(',', $features);
    $show_features = '';
    foreach($features as $feature){
        $show_features .= '<li style="background: '.$tcolor.';color: '.$ttextcolor.';">'.$feature.'</li>';
    }
    if($button == 'Yes') {
        $show_button .= '
        <a href="'.$button_link.'" class="btn yellow-crusta" style="background: '.$buttonbg.'; color: '.$buttontextcolor.';">
        '.$button_text.'
        </a>
        ';
    }
    $featured_styles = '';
    if($featured == 'Yes') {
        $wrap_class .= 'pricing-featured';
        $featured_styles .= "box-shadow: 7px 7px ".$scolor."; ";
    }
    // Fill $html var with data
    $html = '
    <div class="pricing hover-effect '.$wrap_class.' '.$margins.'" style="border-color: '.$scolor.'; '.$featured_styles.'" data-wow-delay="'.$animation_delay.'s">
				<div class="pricing-head">
					<h3 style="color: '.$ptextcolor.';background-color: '.$pcolor.'">'.$heading.' <span style="color: '.$ptextcolor.';background-color: '.$pcolor.'">
					'.$subtext.' </span>
					</h3>
					<h4 style="background: '.$scolor.';color: '.$stextcolor.';"><i style="background: '.$scolor.';color: '.$stextcolor.';">'.$currency.'</i>'.$price.'<i style="background: '.$scolor.';color: '.$stextcolor.';">.'.$dotprice.'</i>
					<span style="background: '.$scolor.';color: '.$stextcolor.';">
					'.$price_below_text.' </span>
					</h4>
				</div>
				<ul class="pricing-content list-unstyled" style="background: '.$scolor.';margin: 0px;">
					'.$show_features.'
				</ul>
				<div class="pricing-footer" style="background: '.$tcolor.';color: '.$ttextcolor.';">
					<p style="background: '.$tcolor.';color: '.$ttextcolor.';">
						 '.$about.'
					</p>
					'.$show_button.'
				</div>
			</div>
    ';
    return $html;
     
         
    } 
     
} // End Element Class
 
// Element Class Init
new spartaPriceColumn();