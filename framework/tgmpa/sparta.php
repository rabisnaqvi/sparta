<?php

require_once get_template_directory() . '/framework/tgmpa/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'sparta_register_required_plugins' );

function sparta_register_required_plugins() {
	
	$plugins = array(

		array(
			'name'               => 'Code House', // The plugin name.
			'slug'               => 'code_house', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/lib/plugins/code_house.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		),
        array(
			'name'               => 'Visual Composer', // The plugin name.
			'slug'               => 'js_composer', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/lib/plugins/js_composer.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
		),
        array(
			'name'               => 'Revolution Slider', // The plugin name.
			'slug'               => 'revslider', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/lib/plugins/revslider.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
		),
		array(
			'name'               => 'Ultimate Addons', // The plugin name.
			'slug'               => 'Ultimate_VC_Addons', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/lib/plugins/Ultimate_VC_Addons.zip', // The plugin source.
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
		),
		array(
			'name'      => 'Envato Toolkit',
			'slug'      => 'envato-wordpress-toolkit',
			'source'    => 'https://github.com/envato/envato-wordpress-toolkit/archive/v1.7.3.zip',
		),
        array(
			'name'      => 'Redux Framework',
			'slug'      => 'redux-framework'
		),
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => true,
		),
        array(
			'name'      => 'WooSidebars',
			'slug'      => 'woosidebars',
		),
        array(
			'name'      => 'WooCommerce',
			'slug'      => 'woocommerce',
			'required'  => false,
		),

	);
	$config = array(
		'id'           => 'sparta',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'sparta-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => false,                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
        'parent_slug'=>'sparta',
        'capability'    =>  'manage_options',

		
		'strings'      => array(
			'notice_can_install_required'     => _n_noop(
				'Sparta requires the following plugin: %1$s.',
				'Sparta requires the following plugins: %1$s.',
				'sparta'
			),
			'notice_can_install_recommended'  => _n_noop(
				'Sparta recommends the following plugin: %1$s.',
				'Sparta recommends the following plugins: %1$s.',
				'sparta'
			),
		),

	);

	tgmpa( $plugins, $config );
}
