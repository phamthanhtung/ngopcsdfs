<?php

/**
 * Divider
 **/
 
if ( !function_exists( 'funky_divider' ) ) {

	function funky_divider( $atts,  $content = null ) {
		
		extract( shortcode_atts( array(
			'style' => ''		// Divider style [top | thick]
		), $atts ) );
		
		if ( $style == 'top' ) {			// Thin divider With Top Link
			return '<div class="hr top"><a href="#top">'. __( 'top', 'funky_shortcodes' ) .'</a></div>';
		} elseif ( $style == 'thick' ) {	// Thick divider
			return '<hr class="thick" />';
		} else {							// Thin divider
			return '<hr />';
		}
		
	}

	add_shortcode( 'funky_divider', 'funky_divider' );
	
}