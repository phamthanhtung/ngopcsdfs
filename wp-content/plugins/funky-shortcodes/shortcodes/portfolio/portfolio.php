<?php
	
/**
 * Portfolio
 **/
 
if ( !function_exists( 'funky_portfolio' ) ) {

	function funky_portfolio( $atts, $content = null ) {
		
		if ( post_type_exists( 'portfolio_item' ) ) {
		
			extract(shortcode_atts(array(
				'title' 	=> 'true',			// Show page title.
				'image' 	=> 'true',			// Show feature image. True | False
				'number' 	=> '-1',			// Number of pages to return.
				'columns' 	=> '1',				// Number of columns to display results in.
				'orderby' 	=> 'date',			// Method used to order results.
				'order' 	=> 'DESC',			// Ordering 
				'id' 		=> '',				// ID of specific pages.
				'portfolio' => ''				// Portfolio
			), $atts));
				
			if( empty ( $id ) ) {

				$query_args = array(
					'post_type' => 'portfolio_item',
					'posts_per_page' => $number,				
					'orderby' => $orderby,
					'order' => $order
				);

			} else {
			
				$id_array = explode( ',', $id );
				
				$query_args = array(
					'post_type' => 'portfolio_item',
					'posts_per_page' => $number,
					'orderby' => $orderby,
					'order' => $order,				
					'post__in' => $id_array
				);
				
			}
			
			if ( $portfolio != '' ) {
			
				$portfolio_args = array (
					'tax_query' => array (
						array(
							'taxonomy' => 'portfolio',
							'field' => 'slug',
							'terms' => $portfolio
						)
					)
				);			
				
				$query_args = array_merge( $query_args, $portfolio_args );
				
			}
			
			$portfolio_item = new WP_query( $query_args );

			if ( $portfolio_item->have_posts() ) {
			
				$columns_class = ''; 
				$html = "";
				$count = 1;
				$i = 1;
				
				switch( $columns ) {
					case ( '1' ):
						$columns_class = '';
						$width = '940';
						$height = '626';
					break;
					case ( '2' ):
						$columns_class = 'half';
						$width = '460';
						$height = '306';
					break;
					case ( '3' ):
						$columns_class = 'third';
						$width = '300';
						$height = '200';
					break;
					case ( '4' ):
						$columns_class = 'fourth';
						$width = '300';
						$height = '200';
					break;			
				}		
				
				while ( $portfolio_item->have_posts() ) {
				
					$portfolio_item->the_post();
					
					if ( $count == $columns || $number == $i ) {
						
						$end = 'end';
						$row_end = '<div class="clearboth"></div>';
						$count = 1;					
						
					} else {
						
						$count++;
						$end = null;
						$row_end = null;
						
					}
					
					$html .= '<div class="funky-portfolio-item '. $columns_class .' '. $end .'">';				
						
						if ( $title != 'false' ) {
							$html .= '<h3><a href="'. get_permalink() .'">'. get_the_title() .'</a></h3>';
						}
						
						if ( $image != "false" ) {			
							
							$html .= '<div class="funky-pages-image">';
					
							if ( has_post_thumbnail() ) {
								$thumbnail = vt_resize( get_post_thumbnail_id(), '', $width, $height, true );				
						
								$html .= '<a href="'. get_permalink() .'">							
											<img src="'. $thumbnail[url] .'" alt="" />
										</a>';
							}
						
							$html .= '</div>';
							
						}
						
						if ( $excerpt != 'false' ) {
							$html .= '<p>'. get_the_excerpt() .'</p>';
						}
					
					$html .= '</div>'. $row_end;
					
					$i++;
					
				}
				
				$html .= '<div class="clearboth"></div>';			
				return $html;
			
			}
			
			wp_reset_postdata();
			
		}
		
	}
	
	add_shortcode( 'funky_portfolio', 'funky_portfolio' );
	
}