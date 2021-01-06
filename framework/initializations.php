<?php
// Add Title Tag Automatically
add_theme_support( 'title-tag' );
//Add Topbar menu
function register_topbar_menu() {
  register_nav_menu('topbar',__( 'Topbar', 'sparta' ));
}
add_action( 'init', 'register_topbar_menu' );
//Add Primary menu
function register_primary_menu() {
  register_nav_menu('primary',__( 'Primary', 'sparta' ));
}
add_action( 'init', 'register_primary_menu' );
//Add Slide menu
function register_slide_menu() {
  register_nav_menu('slide',__( 'Slide', 'sparta' ));
}
add_action( 'init', 'register_slide_menu' );
// automatic feed links
add_theme_support( 'automatic-feed-links' );

/*
|======================================
|===== Start Color Pack Post Type =====
|======================================
*/
/*
* Creating a function to create our CPT
*/

function custom_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Color Packs', 'Post Type General Name', 'sparta' ),
		'singular_name'       => _x( 'Color Pack', 'Post Type Singular Name', 'sparta' ),
		'menu_name'           => __( 'Color Packs', 'sparta' ),
		'parent_item_colon'   => __( 'Parent Color Pack', 'sparta' ),
		'all_items'           => __( 'All Color Packs', 'sparta' ),
		'view_item'           => __( 'View Color Pack', 'sparta' ),
		'add_new_item'        => __( 'Add New Color Pack', 'sparta' ),
		'add_new'             => __( 'Add New', 'sparta' ),
		'edit_item'           => __( 'Edit Color Pack', 'sparta' ),
		'update_item'         => __( 'Update Color Pack', 'sparta' ),
		'search_items'        => __( 'Search Color Pack', 'sparta' ),
		'not_found'           => __( 'Color Pack Not Found', 'sparta' ),
		'not_found_in_trash'  => __( 'Color Pack Not found in Trash', 'sparta' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'color_packs', 'sparta' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title'),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'type' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 50,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => false,
		'capability_type'     => 'page',
        'menu_icon'             => 'dashicons-art'
	);
	
	// Registering your Custom Post Type
	register_post_type( 'color_packs', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'custom_post_type', 0 );



    
/*
|===================================
|==== End Color Pack Post Type =====
|===================================
*/
// Excerpt Read More Text
function new_excerpt_more($excerpt) 
{
	return ' ...';
}
add_filter('excerpt_more', 'new_excerpt_more');
// Theme Setup
function sparta_setup() {
	add_theme_support('post-thumbnails');
//	add_image_size( 'loop_image', 1024, 768, false );
}
add_action('after_setup_theme', 'sparta_setup' );

add_action('widgets_init', 'spartaWidgetInit');

//$result = false; // have we got a valid purchase code?
//$our_item_id = 149180; // check if they've bought this item id.
//$username = 'dtbaker'; // authors username
//$api_key = 'gphyrdsomething'; // api key from my account area
//$url = "http://marketplace.envato.com/api/edge/$username/$api_key/verify-purchase:$code.json";
//$ch = curl_init($url);
//curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//$json_res = curl_exec($ch);
//$data = json_decode($json_res,true);
//$purchases = $data['verify-purchase'];
//if(isset($purchases['buyer'])){
//   // format single purchases same as multi purchases
//   $purchases=array($purchases); 
//}
//$purchase_details = array();
//foreach($purchases as $purchase){
//    $purchase=(array)$purchase; // json issues
//    if((int)$purchase['item_id']==(int)$our_item_id){
//        // we have a winner!
//        $result = true;
//        $purchase_details = $purchase;
//    }
//}
//// do something with the users purchase details, 
//// eg: check which license they've bought, save their username something
//if($result){
//echo 'user has bought our item';
//print_r($purchase_details);
//}else{
//echo 'invalid purchase code';
//}

// Theme Widget

class sparta_register_copyright_widget extends WP_Widget {
     
    function __construct() {
        parent::__construct(
         
        // base ID of the widget
        'sparta_copyright_widget',
         
        // name of the widget
        __('Copyright Widget', 'sparta' ),
         
        // widget options
        array (
            'description' => __( 'Copyright Widget by Sparta. Most Useful in Lower Footer.', 'sparta' )
        )
         
    );
    }
     
    function form( $instance ) {
    $defaults = array(
        'year_from' => '-1',
        'copyright_text' => '-1'
    );
    $year_from = $instance[ 'year_from' ];
    $copyright_text = $instance[ 'copyright_text' ];
     
    // markup for form ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'year_from' ); ?>"><?php _e('Year From:', 'sparta') ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'year_from' ); ?>" name="<?php echo $this->get_field_name( 'year_from' ); ?>" value="<?php echo esc_attr( $year_from ); ?>">
        <em><?php _e('Leave Blank For None', 'sparta') ?></em>
    </p>
    
    <p>
        <label for="<?php echo $this->get_field_id( 'copyright_text' ); ?>"><?php _e('Copyright Text:', 'sparta') ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'copyright_text' ); ?>" name="<?php echo $this->get_field_name( 'copyright_text' ); ?>" value="<?php echo esc_attr( $copyright_text ); ?>">
        <em><?php _e('Leave Blank For None', 'sparta') ?></em>
    </p>
             
<?php
}
     
    function update( $new_instance, $old_instance ) {    
        $instance = $old_instance;
    $instance[ 'year_from' ] = strip_tags( $new_instance[ 'year_from' ] );
    $instance[ 'copyright_text' ] = $new_instance[ 'copyright_text' ];
    return $instance;
    }
     
    function widget( $args, $instance ) {
         extract( $args ); ?>
         <p class="text-center"> &copy; 
        <?php if($instance['year_from']){
        echo $instance['year_from'].' - ';
        } echo date('Y').' '; echo $instance['copyright_text']; ?>
        </p>
        <?php
    }
     
}

function sparta_register_copyright_widget() {
 
    register_widget( 'sparta_register_copyright_widget' );
 
}
add_action( 'widgets_init', 'sparta_register_copyright_widget' );
// -----------------
class sparta_register_socialicons_widget extends WP_Widget {
     
    function __construct() {
        parent::__construct(
         
        // base ID of the widget
        'sparta_socialicons_widget',
         
        // name of the widget
        __('Social Icons', 'sparta' ),
         
        // widget options
        array (
            'description' => __( 'Add links to your Social Network profiles using this widget.', 'sparta' )
        )
         
    );
    }
     
    function form( $instance ) {
    $defaults = array(
        'facebook' => '#',
        'twitter' => '#',
        'linkedin' => '#',
        'xing' => '#',
        'gplus' => '#',
        'tumblr' => '#',
        'pinterest' => '#',
        'youtube' => '#',
        'instagram' => '#',
        'vine' => '#',
        'vk' => '#',
        'align' => 'left'
    );
    $facebook = $instance[ 'facebook' ];
    $twitter = $instance[ 'twitter' ];
    $linkedin = $instance[ 'linkedin' ];
    $xing = $instance[ 'xing' ];
    $gplus = $instance[ 'gplus' ];
    $tumblr = $instance[ 'tumblr' ];
    $pinterest = $instance[ 'pinterest' ];
    $youtube = $instance[ 'youtube' ];
    $instagram = $instance[ 'instagram' ];
    $vine = $instance[ 'vine' ];
    $vk = $instance[ 'vk' ];
    $align = $instance[ 'align' ];
     
    // markup for form ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e('Facebook:', 'sparta') ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo esc_attr( $facebook ); ?>">
        <em><?php _e('Leave Blank For None', 'sparta') ?></em>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e('Twitter:', 'sparta') ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo esc_attr( $twitter ); ?>">
        <em><?php _e('Leave Blank For None', 'sparta') ?></em>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e('LinkedIn:', 'sparta') ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="<?php echo esc_attr( $linkedin ); ?>">
        <em><?php _e('Leave Blank For None', 'sparta') ?></em>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'xing' ); ?>"><?php _e('Xing:', 'sparta') ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'xing' ); ?>" name="<?php echo $this->get_field_name( 'xing' ); ?>" value="<?php echo esc_attr( $xing ); ?>">
        <em><?php _e('Leave Blank For None', 'sparta') ?></em>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'gplus' ); ?>"><?php _e('Google Plus:', 'sparta') ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'gplus' ); ?>" name="<?php echo $this->get_field_name( 'gplus' ); ?>" value="<?php echo esc_attr( $gplus ); ?>">
        <em><?php _e('Leave Blank For None', 'sparta') ?></em>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'tumblr' ); ?>"><?php _e('Tumblr:', 'sparta') ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'tumblr' ); ?>" name="<?php echo $this->get_field_name( 'tumblr' ); ?>" value="<?php echo esc_attr( $tumblr ); ?>">
        <em><?php _e('Leave Blank For None', 'sparta') ?></em>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e('Pinterest:', 'sparta') ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" value="<?php echo esc_attr( $pinterest ); ?>">
        <em><?php _e('Leave Blank For None', 'sparta') ?></em>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e('Youtube:', 'sparta') ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" value="<?php echo esc_attr( $youtube ); ?>">
        <em><?php _e('Leave Blank For None', 'sparta') ?></em>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e('Instagram:', 'sparta') ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" value="<?php echo esc_attr( $instagram ); ?>">
        <em><?php _e('Leave Blank For None', 'sparta') ?></em>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'vine' ); ?>"><?php _e('Vine:', 'sparta') ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'vine' ); ?>" name="<?php echo $this->get_field_name( 'vine' ); ?>" value="<?php echo esc_attr( $vine ); ?>">
        <em><?php _e('Leave Blank For None', 'sparta') ?></em>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'vk' ); ?>"><?php _e('VK:', 'sparta') ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'vk' ); ?>" name="<?php echo $this->get_field_name( 'vk' ); ?>" value="<?php echo esc_attr( $vk ); ?>">
        <em><?php _e('Leave Blank For None', 'sparta') ?></em>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'align' ); ?>"><?php _e('Icons Alignment:', 'sparta') ?></label>
        <select name="<?php echo $this->get_field_name( 'align' ); ?>" id="<?php echo $this->get_field_id( 'align' ); ?>" class="widefat">
            <option value="left" <?php if(esc_attr( $align ) == 'left' || !esc_attr( $align )) { echo "selected"; } ?>>Left</option>
            <option value="right" <?php if(esc_attr( $align ) == 'right') { echo "selected"; } ?>>Right</option>
            <option value="center" <?php if(esc_attr( $align ) == 'center') { echo "selected"; } ?>>Center</option>
        </select>
    </p>
             
<?php
}
     
    function update( $new_instance, $old_instance ) {    
        $instance = $old_instance;
    $instance[ 'facebook' ] = strip_tags( $new_instance[ 'facebook' ] );
    $instance[ 'twitter' ] = $new_instance[ 'twitter' ];
    $instance[ 'linkedin' ] = $new_instance[ 'linkedin' ];
    $instance[ 'xing' ] = $new_instance[ 'xing' ];
    $instance[ 'gplus' ] = $new_instance[ 'gplus' ];
    $instance[ 'tumblr' ] = $new_instance[ 'tumblr' ];
    $instance[ 'pinterest' ] = $new_instance[ 'pinterest' ];
    $instance[ 'youtube' ] = $new_instance[ 'youtube' ];
    $instance[ 'instagram' ] = $new_instance[ 'instagram' ];
    $instance[ 'vine' ] = $new_instance[ 'vine' ];
    $instance[ 'vk' ] = $new_instance[ 'vk' ];
    $instance[ 'align' ] = $new_instance[ 'align' ];
    return $instance;
    }
     
    function widget( $args, $instance ) {
         extract( $args ); ?>
         <div class="text-<?= $instance['align'] ?>">
             <ul class="social_networks_list">
                 <?php if($instance['facebook']) { ?>
                    <li><a href="<?= $instance['facebook'] ?>" style="color: #3b5998;"><i class="fa fa-facebook fa-lg"></i></a></li>
                 <?php } ?>
                 <?php if($instance['twitter']) { ?>
                    <li><a href="<?= $instance['twitter'] ?>" style="color: #55acee;"><i class="fa fa-twitter fa-lg"></i></a></li>
                 <?php } ?>
                 <?php if($instance['linkedin']) { ?>
                    <li><a href="<?= $instance['linkedin'] ?>" style="color: #007bb5;"><i class="fa fa-linkedin fa-lg"></i></a></li>
                 <?php } ?>
                 <?php if($instance['xing']) { ?>
                    <li><a href="<?= $instance['xing'] ?>" style="color: ##00605E;"><i class="fa fa-xing fa-lg"></i></a></li>
                 <?php } ?>
                 <?php if($instance['gplus']) { ?>
                    <li><a href="<?= $instance['gplus'] ?>" style="color: #dd4b39;"><i class="fa fa-google-plus fa-lg"></i></a></li>
                 <?php } ?>
                 <?php if($instance['tumblr']) { ?>
                    <li><a href="<?= $instance['tumblr'] ?>" style="color: #32506d;"><i class="fa fa-tumblr fa-lg"></i></a></li>
                 <?php } ?>
                 <?php if($instance['pinterest']) { ?>
                    <li><a href="<?= $instance['pinterest'] ?>" style="color: #cb2027;"><i class="fa fa-pinterest fa-lg"></i></a></li>
                 <?php } ?>
                 <?php if($instance['youtube']) { ?>
                    <li><a href="<?= $instance['youtube'] ?>" style="color: #bb0000;"><i class="fa fa-youtube fa-lg"></i></a></li>
                 <?php } ?>
                 <?php if($instance['instagram']) { ?>
                    <li><a href="<?= $instance['instagram'] ?>" style="color: #e95950;"><i class="fa fa-instagram fa-lg"></i></a></li>
                 <?php } ?>
                 <?php if($instance['vine']) { ?>
                    <li><a href="<?= $instance['vine'] ?>" style="color: #00bf8f;"><i class="fa fa-vine fa-lg"></i></a></li>
                 <?php } ?>
                 <?php if($instance['vk']) { ?>
                    <li><a href="<?= $instance['vk'] ?>" style="color: #45668e;"><i class="fa fa-vk fa-lg"></i></a></li>
                 <?php } ?>
             </ul>
         </div>
        <?php
    }
     
}
function sparta_register_socialicons_widget() {
 
    register_widget( 'sparta_register_socialicons_widget' );
 
}
add_action( 'widgets_init', 'sparta_register_socialicons_widget' );

// End Theme widgets

// Load Theme Text Domain
load_theme_textdomain( 'sparta', get_template_directory().'/languages' );

// Enable HTML5 components for the theme
add_theme_support( 'html5', array('comment-form', 'comment-list', 'search-form', 'gallery', 'caption' ) );
//


/*
* add a group of links under a parent link
*/

// Add a parent shortcut link

function custom_toolbar_link($wp_admin_bar) {
	$args = array(
		'id' => 'sparta',
		'title' => 'Sparta', 
		'href' => get_admin_url().'admin.php?page=sparta_options', 
		'meta' => array(
			'class' => 'sparta', 
			'title' => 'Sparta'
			)
	);
	$wp_admin_bar->add_node($args);

// Add another child link
$args = array(
        'id' => 'options',
        'title' => 'Theme Options', 
        'href' => get_admin_url().'admin.php?page=sparta_options',
        'parent' => 'sparta', 
        'meta' => array(
            'class' => 'options', 
            'title' => 'Theme Options',
            'target' => '_blank'
            )
    );
    $wp_admin_bar->add_node($args);
// Add another child link
$args = array(
		'id' => 'documentaion',
		'title' => 'Documentation', 
		'href' => 'http://codehouse.services.cheersbin.com/sparta/docs',
		'parent' => 'sparta', 
		'meta' => array(
			'class' => 'documentaion', 
			'title' => 'Documentation',
            'target' => '_blank'
			)
	);
	$wp_admin_bar->add_node($args);


}

add_action('admin_bar_menu', 'custom_toolbar_link', 50);

remove_filter( 'the_content', 'wpautop' );