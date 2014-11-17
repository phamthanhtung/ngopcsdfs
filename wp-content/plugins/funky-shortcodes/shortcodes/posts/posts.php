<?php
	
/**
 * posts
 **/
 
if ( !function_exists( 'funky_posts' ) ) {

	// POST LIST
	function funky_posts( $atts, $content ){
		
		extract( shortcode_atts( array(
			'title' => '',
			'number' => '3',			// Number of pages to return.
			'category' => '',
			'tag' => ''
		), $atts));		
		
		if ( empty( $tag ) ){
			$query_args = array(
				'post_type' => 'post',
				'posts_per_page' => $number,
				'category_name' => $category,
				'ignore_sticky_posts' => 1
			);
		} else {
			$tag_array = explode( ',', $tag );
			
			$query_args = array(
				'post_type' => 'post',
				'posts_per_page' => $number,
				'category_name' => $category,
				'tag_slug__in' => $tag_array,
				'ignore_sticky_posts' => 1
			);		
		}
		
		$postlist = new WP_query( $query_args );
		
		if ( $postlist->have_posts() ) :
			
			$output = "";
			
			if ( $title != "" ) {
				$output .= '<h3>'. $title .'</h3>';
			}
			
			$output .= '<div class="funky-posts">';
			
			while ( $postlist->have_posts() ) : $postlist->the_post();
			
				global $post;	
				
				$output .= '<article>';
				
					$output .= '<a href="'. get_permalink() .'">'. get_the_title() .'</a>';
					$output .= '<span class="post-date"><time datetime="'. get_the_time( 'c' ) .'">'. get_the_date() .'</time>';
				
				$output .= '</article>';
				
			endwhile;			
			
			$output .= '</div>';
			
			$output .= '<div class="clearboth"></div>';
			
			wp_reset_postdata();
			
			return $output;
		
		endif;
		
	}
	
	add_shortcode('funky_posts', 'funky_posts');

}