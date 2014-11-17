<?php

/**
 *	Accordion
 **/
 
if ( !function_exists( 'funky_accordion' ) ) {

	function funky_accordion( $atts, $content = null ) {
		
		return '<div class="funky-accordion">'. do_shortcode( $content ) .'</div>';
		
	}
	
	add_shortcode( 'funky_accordion', 'funky_accordion' );

}