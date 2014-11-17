<?php
	
/**
 * Pages
 **/
 
if ( !function_exists( 'funky_pages' ) ) {

	function funky_pages( $atts, $content = null ) {
		
		extract( shortcode_atts( array(
			'parent'	=> false,			// ID of parent page
			'title'		=> 'true',			// Show page title
			'image'		=> 'true',			// Show feature image. True | False
			'excerpt'	=> 'true',			// Show page excerpt
			'number'	=> '-1',			// Number of pages to return
			'columns'	=> '1',				// Number of columns to display results in
			'orderby'	=> 'menu_order',	// Method used to order results
			'order'		=> 'ASC',			// Ordering
			'id'		=> ''				// ID of specific pages
		), $atts ) );
		
		
		if( empty( $id ) ) {

			$query_args = array(
				'post_type' 		=> 'page',
				'posts_per_page'	=> $number,
				'post_parent'		=> $parent,
				'orderby'			=> $orderby,
				'order'				=> $order		
			);

		} else {
		
			$id_array = explode( ',', $id );
			
			$query_args = array(
				'post_type'			=> 'page',
				'posts_per_page'	=> $number,
				'post_parent'		=> $parent,
				'orderby'			=> $orderby,
				'order'				=> $order,
				'post__in'			=> $id_array
			);
			
		}
		
		$pages = new WP_query( $query_args );

		if ( $pages->have_posts() ) {
		
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
			
			while ( $pages->have_posts() ) {
				
				$pages->the_post();
				
				if ( $count == $columns || $number == $i ) {
					
					$end = 'end';
					$row_end = '<div class="clearboth"></div>';
					$count = 1;					
					
				} else {
					
					$count++;
					$end = null;
					$row_end = null;
					
				}
				
				$html .= '<div class="funky-pages-item '. $columns_class .' '. $end .'">';				
					
					if ( $title != 'false' ) {
						$html .= '<h3><a href="'. get_permalink() .'">'. get_the_title() .'</a></h3>';
					}
					
					if ( $image != "false" ) {			
						
						$html .= '<div class="funky-pages-image">';
					
						if ( has_post_thumbnail() ) {
							$thumbnail = vt_resize( get_post_thumbnail_id(), '', $width, $height, true );				
					
							$html .= '<a href="'. get_permalink() .'">							
										<img src="'. $thumbnail['url'] .'" alt="" />
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
	
	add_shortcode( 'funky_pages', 'funky_pages' );

}