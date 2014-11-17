<?php

/**
 *	Clearboth
 **/
 
if ( !function_exists( 'funky_clearboth' ) ) {

	function funky_clearboth( $atts,  $content = null ) {
		
		return '<hr class="clearboth" />';
		
	}
	
	add_shortcode( 'funky_clearboth', 'funky_clearboth' );
	
}