<?php
/*
Plugin Name: Funky Shortcodes
Plugin URI: http://www.eugeneo.com
Version: 2.0.7
Author: Funky Themes
Description: A selection of styling shortcodes.
*/

/*  Copyright (c) 2013 Funky Themes.
	All rights reserved.

	Funky Shortcodes is distributed under the GNU General Public License, Version 2,
	June 1991. Copyright (C) 1989, 1991 Free Software Foundation, Inc., 51 Franklin
	St, Fifth Floor, Boston, MA 02110, USA

	THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
	ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
	WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
	DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
	ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
	(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
	LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
	ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
	(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
	SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*/

/**
 *	Load language file
 */
load_theme_textdomain( 'funky_shortcodes', dirname( __FILE__ ) .'/lang' );


/**
 *	Include Shortcode Files
 *	Action hook that includes shortcode files on page init
 */
function funky_shortcode_include_files() {
	require_once dirname( __FILE__ ) .'/shortcodes/shortcodes.php';
}
add_action( 'init', 'funky_shortcode_include_files' );


/**
 *	Enqueue Scripts
 *	Enqueue the Javascript files needed by the shortcodes
 */
function funky_shortcode_enqueue_scripts() {
	
	if ( !is_admin() ) {
		
		// Funky Shortcode CSS
		wp_enqueue_style( 'funky-shortcodes-default', plugins_url( 'funky-shortcodes-default.css', __FILE__ ) );
		
		// Funky Shortcodes JS
		wp_enqueue_script( 'funky-shortcodes', plugins_url( 'jquery.funky-shortcodes.js', __FILE__ ) , array( 'jquery' ), false, 1 );
		
	}
	
}
add_action( 'template_redirect', 'funky_shortcode_enqueue_scripts' );


/**
 *	HTML Editor Quicktags
 *	Add quicktag buttons to HTML tab of content editor
 */
function funky_quicktags() {
	wp_enqueue_script( 'funky_shortcode_quicktags', plugins_url( 'shortcodes/quicktags.js', __FILE__ ), array( 'quicktags' ) );
}
add_action( 'admin_print_scripts', 'funky_quicktags' );


/**
 *	Allow shortcodes inside sidebar widgets	
 */
add_filter( 'widget_text', 'do_shortcode' );


/**
 * Resize images dynamically using wp built in functions
 * Victor Teixeira
 *
 * php 5.2+
 *
 * Exemplo de uso:
 * 
 * <?php 
 * $thumb = get_post_thumbnail_id(); 
 * $image = vt_resize( $thumb, '', 140, 110, true );
 * ?>
 * <img src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" />
 *
 * @param int $attach_id
 * @param string $img_url
 * @param int $width
 * @param int $height
 * @param bool $crop
 * @return array
 **/
if ( !function_exists( 'vt_resize') ) {

	function vt_resize( $attach_id = null, $img_url = null, $width, $height, $crop = false ) {

		// this is an attachment, so we have the ID
		if ( $attach_id ) {

			$image_src = wp_get_attachment_image_src( $attach_id, 'full' );
			$file_path = get_attached_file( $attach_id );

		// this is not an attachment, let's use the image url
		} else if ( $img_url ) {

			$file_path = parse_url( $img_url );
			$file_path = $_SERVER['DOCUMENT_ROOT'] . $file_path['path'];

			// Look for Multisite Path
			if(file_exists($file_path) === false){
				global $blog_id;
				$file_path = parse_url( $img_url );
				if (preg_match("/files/", $file_path['path'])) {
					$path = explode('/',$file_path['path']);
					foreach($path as $k=>$v){
						if($v == 'files'){
							$path[$k-1] = 'wp-content/blogs.dir/'.$blog_id;
						}
					}
					$path = implode('/',$path);
				}
				$file_path = $_SERVER['DOCUMENT_ROOT'].$path;
			}
			//$file_path = ltrim( $file_path['path'], '/' );
			//$file_path = rtrim( ABSPATH, '/' ).$file_path['path'];

			$orig_size = getimagesize( $file_path );

			$image_src[0] = $img_url;
			$image_src[1] = $orig_size[0];
			$image_src[2] = $orig_size[1];
		}

		$file_info = pathinfo( $file_path );

		// check if file exists
		$base_file = $file_info['dirname'].'/'.$file_info['filename'].'.'.$file_info['extension'];
		if ( !file_exists($base_file) )
		 return;

		$extension = '.'. $file_info['extension'];

		// the image path without the extension
		$no_ext_path = $file_info['dirname'].'/'.$file_info['filename'];
		
		/* Calculate the eventual height and width for accurate file name */
		if ( $crop == false ) {
		   $proportional_size = wp_constrain_dimensions( $image_src[1], $image_src[2], $width, $height );
		   $width = $proportional_size[0];
		   $height = $proportional_size[1];
		}
		$cropped_img_path = $no_ext_path.'-'.$width.'x'.$height.$extension;

		// checking if the file size is larger than the target size
		// if it is smaller or the same size, stop right here and return
		if ( $image_src[1] > $width ) {

			// the file is larger, check if the resized version already exists (for $crop = true but will also work for $crop = false if the sizes match)
			if ( file_exists( $cropped_img_path ) ) {

				$cropped_img_url = str_replace( basename( $image_src[0] ), basename( $cropped_img_path ), $image_src[0] );

				$vt_image = array (
					'url' => $cropped_img_url,
					'width' => $width,
					'height' => $height
				);

				return $vt_image;
			}

			// $crop = false or no height set
			if ( $crop == false OR !$height ) {

				// calculate the size proportionaly
				$proportional_size = wp_constrain_dimensions( $image_src[1], $image_src[2], $width, $height );
				$resized_img_path = $no_ext_path.'-'.$proportional_size[0].'x'.$proportional_size[1].$extension;

				// checking if the file already exists
				if ( file_exists( $resized_img_path ) ) {

					$resized_img_url = str_replace( basename( $image_src[0] ), basename( $resized_img_path ), $image_src[0] );

					$vt_image = array (
						'url' => $resized_img_url,
						'width' => $proportional_size[0],
						'height' => $proportional_size[1]
					);

					return $vt_image;
				}
			}

			// check if image width is smaller than set width
			$img_size = getimagesize( $file_path );
			if ( $img_size[0] <= $width ) $width = $img_size[0];

			// Check if GD Library installed
			if (!function_exists ('imagecreatetruecolor')) {
			    echo 'GD Library Error: imagecreatetruecolor does not exist - please contact your webhost and ask them to install the GD library';
			    return;
			}

			// no cache files - let's finally resize it
			$editor = wp_get_image_editor( $file_path );
			if ( is_wp_error( $editor ) )
				return $editor;
			$editor->set_quality( 100 );
			$resized = $editor->resize( $width, $height, $crop );
			$dest_file = $editor->generate_filename( NULL, NULL );
			$saved = $editor->save( $dest_file );
			if ( is_wp_error( $saved ) )
				return $saved;
			$new_img_path=$dest_file;			
			$new_img_size = getimagesize( $new_img_path );
			$new_img = str_replace( basename( $image_src[0] ), basename( $new_img_path ), $image_src[0] );

			// resized output
			$vt_image = array (
				'url' => $new_img,
				'width' => $new_img_size[0],
				'height' => $new_img_size[1]
			);

			return $vt_image;
		}

		// default output - without resizing
		$vt_image = array (
			'url' => $image_src[0],
			'width' => $width,
			'height' => $height
		);

		return $vt_image;
		
	}
	
}


/**
 *	Shortcode spacing fix
 */
if ( !function_exists( 'funky_shortcode_empty_paragraph_fix' ) ) {

	function funky_shortcode_empty_paragraph_fix( $content ) {
		
		$block = join( "|",array( "funky_accordion", "funky_accordion_item", "funky_box", "funky_clearboth", "funky_divider", "funky_fourth", "funky_third", "funky_half", "funky_two_thirds", "funky_three_fourths", "funky_quote", "funky_toggle" ) );

		// opening tag
		$new_content = preg_replace( "/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/", "[$2$3]", $content );

		// closing tag
		$new_content = preg_replace( "/(<p>)?\[\/($block)](<\/p>|<br \/>)/", "[/$2]", $new_content );
		
		return $new_content;
	
	}

}
add_filter( 'the_content', 'funky_shortcode_empty_paragraph_fix' ); 

?>