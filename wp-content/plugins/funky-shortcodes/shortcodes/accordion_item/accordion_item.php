<?php
	
/**
 *	Accordion Item
 **/
 
if ( !function_exists( 'funky_accordion_item' ) ) {

	function funky_accordion_item( $atts, $content = null ){
		
		extract( shortcode_atts(array(
			'title' => ''
		), $atts ) );
		
		return '<div class="funky-toggle-item accordion">
			<div class="funky-toggle-button">
				<h4 class="funky-toggle-title">'. $title .'</h4>
			</div>
			<div class="funky-toggle-content">'. do_shortcode( $content ) .'</div>
		</div>';
		
	}
	
	add_shortcode( 'funky_accordion_item', 'funky_accordion_item' );

}