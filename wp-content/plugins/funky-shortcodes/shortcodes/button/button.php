<?php

/**
 *	Button
 **/
 
if ( !function_exists( 'funky_button' ) ) {
	
	function funky_button( $atts, $content = null ){
	
		extract(shortcode_atts( array(
			'align'				=> 'left',			// left | center | right
			'background'		=> '',				// Background hex colour value
			'color'				=> '',				// Text hex colour value
			'margin'			=> '',				// Top margin size in px
			'url'				=> '#',				// URL button will link to
			'target'			=> '_self',			// _self | _blank
			'size'				=> ''				// small | normal | large
		), $atts ) );
		
		$style = '';
		
		// Size
		switch ( $size ) {
			case 'small':
				$size = ' button-small';
				break;
			case 'large':
				$size = ' button-large';
				break;
			default:
				$size = '';
				break;
		}
		
		// Alignment
		if ( $align == "left" ) {
			$align = ' alignleft';
		} elseif ( $align == "right" ) {
			$align = ' alignright';
		}		
		
		// Background
		if ( $background != '' ) {
		
			// Check the colour value has the '#' at the beginning.
			$first_character = mb_substr( $background, 0, 1, get_bloginfo( 'charset' ) );
			if ( $first_character != '#' ) {
				$background = '#'. $background;
			}
			
			$style .= ' background-color: '. $background .';';

		}
		
		// Color
		if ( $color != '' ) {
		
			// Check the colour value has the '#' at the beginning.
			$first_character = mb_substr( $color, 0, 1, get_bloginfo( 'charset' ) );
			if ( $first_character != '#' ) {
				$color = '#'. $color;
			}
			
			$style .= ' color: '. $color .';';

		}
		
		// Top margin
		if ( $margin != '' ) {
		
			// Check the margin value for 'px' at the end. Remove if found.
			if ( mb_substr( $margin, -2, 2, get_bloginfo( 'charset' ) ) == 'px' ) {
				$margin = mb_strcut( $margin, -2, 2, get_bloginfo( 'charset' ) );
			}
			
			$style .= ' margin-top: '. $margin .'px;';
			
		}		
		
		if ( $align == "center" ) {
			
			return '<div class="funky-button-center">
					<a	class="funky-button'. $size .'"
						href="'. $url .'"
						target="'. $target .'"
						style="'. $style .'">'. $content .'</a>
				</div>';
			
		} else {
			
			return '<a	class="funky-button'. $size . $align .'"
						href="'. $url .'"
						target="'. $target .'"
						style="'. $style .'">'. $content .'</a>';
		
		}
		
	}
	
	add_shortcode( 'funky_button', 'funky_button' );
	
}