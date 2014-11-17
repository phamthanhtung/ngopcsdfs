<?php

/**
 * Fourth
 **/
 
if ( !function_exists( 'funky_fourth' ) ) {
	
	function funky_fourth( $atts, $content = null ) {
		
		extract( shortcode_atts( array(
			'end' => ''
		), $atts ) );
		
		if ( $end == 'true' ) {
			return '<div class="fourth end">'. do_shortcode( $content ) .'</div>';
		} else {
			return '<div class="fourth">'. do_shortcode( $content ) .'</div>';
		}
		
	}
	
	add_shortcode( 'funky_fourth', 'funky_fourth' );

}

	
/**
 * Third
 **/
 
if ( !function_exists( 'funky_third' ) ) {
	
	function funky_third( $atts, $content = null ) {
		
		extract( shortcode_atts( array(
			'end' => ''
		), $atts ) );
		
		if ( $end == 'true' ) {
			return '<div class="third end">'. do_shortcode( $content) .'</div>';
		} else {
			return '<div class="third">'. do_shortcode( $content ) .'</div>';
		}
		
	}

	add_shortcode( 'funky_third', 'funky_third' );
	
}


/**
 * Half
 **/
 
if ( !function_exists( 'funky_half' ) ) {

	function funky_half( $atts, $content = null ) {
	
		extract( shortcode_atts( array(
			'end' => ''
		), $atts ) );
		
		if ( $end == 'true' ) {
			return '<div class="half end">'. do_shortcode( $content ) .'</div>';
		} else {
			return '<div class="half">'. do_shortcode( $content ) .'</div>';
		}
		
	}

	add_shortcode( 'funky_half', 'funky_half' );
	
}


/**
 * Two Thirds
 **/
 
if ( !function_exists( 'funky_two_thirds' ) ) {

	function funky_two_thirds( $atts, $content = null ) {
	
		extract( shortcode_atts( array(
			'end' => ''
		), $atts ) );
		
		if ( $end == 'true' ) {
			return '<div class="two-thirds end">'. do_shortcode( $content ) .'</div>';
		} else {
			return '<div class="two-thirds">'. do_shortcode( $content ) .'</div>';
		}
	}
	
	add_shortcode( 'funky_two_thirds', 'funky_two_thirds' );
	
}

/**
 * Three Fourths
 **/
 
if ( !function_exists( 'funky_three_fourths' ) ) {

	function funky_three_fourths( $atts, $content = null ) {
	
		extract( shortcode_atts( array(
			'end' => ''
		), $atts ) );
		
		if ( $end == 'true' ) {
			return '<div class="three-fourths end">'. do_shortcode( $content ) .'</div>';
		} else {
			return '<div class="three-fourths">'. do_shortcode( $content ) .'</div>';
		}
	}
	
	add_shortcode( 'funky_three_fourths', 'funky_three_fourths' );
	
}