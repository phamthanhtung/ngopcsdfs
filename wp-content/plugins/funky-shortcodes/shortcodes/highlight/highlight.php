<?php
	
/**
 * Highlight
 **/

if ( !function_exists( 'funky_highlight' ) ) {

	function funky_highlight( $atts, $content ) {
		
		return '<span class="funky-highlight">'. do_shortcode( $content ) .'</span>';
	}
	
	add_shortcode( 'funky_highlight', 'funky_highlight' );
	
}