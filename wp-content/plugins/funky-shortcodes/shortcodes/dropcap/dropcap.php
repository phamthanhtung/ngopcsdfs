<?php

/**
 * Dropcap
 **/
 
if ( !function_exists( 'funky_dropcap' ) ) {

	function funky_dropcap( $atts, $content = null ) {
		
		return '<p class="funky-dropcap">'. $content .'</p>';
		
	}
	
	add_shortcode( 'funky_dropcap', 'funky_dropcap' );
	
}