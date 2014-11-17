<?php
	
/**
 *	Shortcode Array
 **/
$funky_shortcodes = array	(
	"accordion",
	"accordion_item", 
	"box",
	"button",
	"clearboth",
	"columns",
	"divider",
	"dropcap",
	"highlight",
	"pages",
	//"portfolio",
	"posts",
	"quote",
	"toggle"
);

foreach ( $funky_shortcodes as $shortcode ) {
	require_once( dirname(__FILE__) .'/'. $shortcode .'/'. $shortcode .'.php' );
}


/**
 *	TinyMCE Buttons
 **/
function add_funky_shortcode_buttons() {

	if ( current_user_can( 'edit_posts' ) || current_user_can( 'edit_pages' ) ) {
		add_filter( 'mce_buttons_3', 'register_funky_shortcode_buttons' );
		add_filter( 'mce_external_plugins', 'add_funky_shortcode_tinymce_plugin' );
	}

}
add_action( 'admin_init', 'add_funky_shortcode_buttons' );


function register_funky_shortcode_buttons( $buttons ) {
	
	array_push( $buttons,
		'funky_accordion',
		'funky_accordion_item',
		'funky_box',
		'funky_button',
		'funky_clearboth',
		'funky_columns',
		'funky_divider',
		'funky_dropcap',
		'funky_highlight',
		'funky_pages',
		//'funky_portfolio',
		'funky_posts',
		'funky_quote',
		'funky_toggle'
	);
	
	return $buttons;
	
}


function add_funky_shortcode_tinymce_plugin( $plugin_array ) {

	$plugin_array['funky_accordion'] 		= plugins_url( '/shortcodes/accordion/accordion.js', dirname( __FILE__ ) );   
	$plugin_array['funky_accordion_item'] 	= plugins_url( '/shortcodes/accordion_item/accordion_item.js', dirname( __FILE__ ) );   
	$plugin_array['funky_box'] 				= plugins_url( '/shortcodes/box/box.js', dirname( __FILE__ ) );   
	$plugin_array['funky_button'] 			= plugins_url( '/shortcodes/button/button.js', dirname( __FILE__ ) );   
	$plugin_array['funky_clearboth'] 		= plugins_url( '/shortcodes/clearboth/clearboth.js', dirname( __FILE__ ) );   
	$plugin_array['funky_columns']	 		= plugins_url( '/shortcodes/columns/columns.js', dirname( __FILE__ ) );   
	$plugin_array['funky_divider'] 			= plugins_url( '/shortcodes/divider/divider.js', dirname( __FILE__ ) );   
	$plugin_array['funky_dropcap'] 			= plugins_url( '/shortcodes/dropcap/dropcap.js', dirname( __FILE__ ) );   
	$plugin_array['funky_highlight']		= plugins_url( '/shortcodes/highlight/highlight.js', dirname( __FILE__ ) );   
	$plugin_array['funky_pages'] 			= plugins_url( '/shortcodes/pages/pages.js', dirname( __FILE__ ) );   
	//$plugin_array['funky_portfolio'] 		= plugins_url( '/shortcodes/portfolio/portfolio.js', dirname( __FILE__ ) );   
	$plugin_array['funky_posts'] 			= plugins_url( '/shortcodes/posts/posts.js', dirname( __FILE__ ) );   
	$plugin_array['funky_quote'] 			= plugins_url( '/shortcodes/quote/quote.js', dirname( __FILE__ ) );   
	$plugin_array['funky_toggle'] 			= plugins_url( '/shortcodes/toggle/toggle.js', dirname( __FILE__ ) );
	
	return $plugin_array;

}