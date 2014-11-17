<?php
	
/**
 *	Box
 **/
 
if ( !function_exists( 'funky_box' ) ) {

	function funky_box( $atts, $content = null ){
		
		extract( shortcode_atts( array(
			'style' => ''
		), $atts ) );
		
		switch ( $style ) {
			case 'red':
				return '<div class="funky-box red-box">'. do_shortcode( $content ) .'</div>';
				break;
			case 'green':
				return '<div class="funky-box green-box">'. do_shortcode( $content ) .'</div>';
				break;
			case 'blue':
				return '<div class="funky-box blue-box">'. do_shortcode( $content ) .'</div>';
				break;
			default:
				return '<div class="funky-box">'. do_shortcode( $content ) .'</div>';
		}
		
	}
	
	add_shortcode( 'funky_box', 'funky_box' );

}