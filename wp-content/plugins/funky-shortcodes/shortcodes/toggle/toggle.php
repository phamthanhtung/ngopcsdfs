<?php

/**
 * Toggle
 **/
 
if ( !function_exists( 'funky_toggle' ) ) {

	function funky_toggle( $atts, $content ){
		
		extract( shortcode_atts(array(
			'title' => ''
		), $atts ) );
		
		return '<div class="funky-toggle-item">
			<div class="funky-toggle-button">
				<h4 class="funky-toggle-title">'. $title .'</h4>
			</div>
			<div class="funky-toggle-content">'. do_shortcode( $content ) .'</div>
		</div>';
		
	}
	
	add_shortcode( 'funky_toggle', 'funky_toggle' );
	
}