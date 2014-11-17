<?php

/**
 * Quote
 **/
 
if ( !function_exists( 'funky_quote' ) ) {

	function funky_quote( $atts, $content = null ) {
		
		extract( shortcode_atts(array(
			'align' => ''
		), $atts ) );
		
		if ( $align == "left" ) {
			$align = ' alignleft';
		} elseif ( $align == "right" ) {
			$align = ' alignright';
		}	
		
		return '<blockquote class="'. $align .'">'. do_shortcode( $content ) .'</blockquote>';
		
	}
	
	add_shortcode( 'funky_quote', 'funky_quote' );
	
}