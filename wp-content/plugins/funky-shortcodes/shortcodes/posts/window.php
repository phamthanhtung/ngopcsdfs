<?php
	
	// Setup location of WordPress
	$absolute_path = __FILE__;
	$path_to_file = explode( 'wp-content', $absolute_path );
	$path_to_wp = $path_to_file[0];

	// Access WordPress
	require_once( $path_to_wp.'/wp-load.php' );

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php _e( "Post List Shortcode", "funky_shortcodes" ); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<script language="javascript" type="text/javascript" src="<?php echo includes_url() ?>js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo includes_url(); ?>js/tinymce/tiny_mce_popup.js"></script>	
	<script language="javascript" type="text/javascript">
	function init() {
		
		tinyMCEPopup.resizeToInnerSize();
		
	}
	
	function insertShortcode() {
		
		var output;
		
		var postlist_title = document.getElementById( 'postlist_title' ).value;
		var postlist_number = document.getElementById( 'postlist_number' ).value;
		var postlist_category = document.getElementById( 'postlist_category' ).value;		
		
		if ( postlist_title != '' ){
			postlist_title = ' title="'+ postlist_title +'"';
		}
		if ( postlist_number != '' ){
			postlist_number = ' number="'+ postlist_number +'"';
		}
		if ( postlist_category != '' ){
			postlist_category = ' category="'+ postlist_category +'"';
		}
		if ( postlist_tag != '' ){
			postlist_tag = ' tag="'+ postlist_tag +'"';
		}	

		output = '[funky_posts' + postlist_title + postlist_number + postlist_category + postlist_tag + ']';
		
		if( window.tinyMCE ) {
			window.tinyMCE.execInstanceCommand( 'content', 'mceInsertContent', false, output );
			tinyMCEPopup.editor.execCommand( 'mceRepaint' );
			tinyMCEPopup.close();
		}
		
		return;
	}
	</script>
	<base target="_self" />
    
	<style type="text/css">	
		label span { color: #F00; }	
    </style>
    
</head>
<body onload="init();">

	<form name="raw_postlist_shortcodes" action="#">
		
		<div class="panel_wrapper">
			
			<fieldset style="padding-left: 15px;">
			
				<legend><?php _e( "Options", "funky_shortcodes" ); ?></legend>
				
				<br />
				
				<!-- TITLE -->
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>				 
						<td nowrap="nowrap"><label for="postlist_title"><?php _e( "Title", "funky_shortcodes" ); ?>:</label></td>					
						<td>					
							<input type="text" name="postlist_title" id="postlist_title" style="width: 230px;"></input>				
						</td>					
					</tr>				  
				</table>
				
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Text to display above post list", "funky_shortcodes" ); ?></em>
				<br /><br />
				
				<!-- NUMBER -->
				<table border="0" cellpadding="4" cellspacing="0">				
					<tr>					 
						<td nowrap="nowrap"><label for="postlist_number"><?php _e( "Number of posts", "funky_shortcodes" ); ?>:</label></td>						
						<td>						
							<select name="postlist_number" id="postlist_number" style="width: 210px"> 							
								<option value="1"><?php _e( "1", "funky_shortcodes" ); ?></option>
								<option value="2"><?php _e( "2", "funky_shortcodes" ); ?></option>
								<option value="3"><?php _e( "3", "funky_shortcodes" ); ?></option>
								<option value="4"><?php _e( "4", "funky_shortcodes" ); ?></option>
								<option value="5"><?php _e( "5", "funky_shortcodes" ); ?></option>
								<option value="6"><?php _e( "6", "funky_shortcodes" ); ?></option>
								<option value="7"><?php _e( "7", "funky_shortcodes" ); ?></option>
								<option value="8"><?php _e( "8", "funky_shortcodes" ); ?></option>
								<option value="9"><?php _e( "9", "funky_shortcodes" ); ?></option>
								<option value="10"><?php _e( "10", "funky_shortcodes" ); ?></option>
								<option value="11"><?php _e( "11", "funky_shortcodes" ); ?></option>
								<option value="12"><?php _e( "12", "funky_shortcodes" ); ?></option>
								<option value="13"><?php _e( "13", "funky_shortcodes" ); ?></option>
								<option value="14"><?php _e( "14", "funky_shortcodes" ); ?></option>
								<option value="15"><?php _e( "15", "funky_shortcodes" ); ?></option>
								<option value="16"><?php _e( "16", "funky_shortcodes" ); ?></option>
								<option value="17"><?php _e( "17", "funky_shortcodes" ); ?></option>
								<option value="18"><?php _e( "18", "funky_shortcodes" ); ?></option>
								<option value="19"><?php _e( "19", "funky_shortcodes" ); ?></option>
								<option value="20"><?php _e( "20", "funky_shortcodes" ); ?></option>
							</select>						
						</td>						
					</tr>					  
				  </table>
				  
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Select the max number of posts to display", "funky_shortcodes" ); ?></em><br />
				<br />
				
				<!-- CATEGORY -->
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>				 
						<td nowrap="nowrap"><label for="postlist_category"><?php _e( "Category Slug", "funky_shortcodes" ); ?>:</label></td>					
						<td>					
							<input type="text" name="postlist_category" id="postlist_category" style="width: 230px;"></input>				
						</td>					
					</tr>				  
				</table>
				
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Enter the slug of the category to display. Leave this option blank to show posts from all categories", "funky_shortcodes" ); ?></em>
				<br /><br />
				
				<!-- TAG -->
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>				 
						<td nowrap="nowrap"><label for="postlist_category"><?php _e( "Tag Slug", "funky_shortcodes" ); ?>:</label></td>					
						<td>					
							<input type="text" name="postlist_category" id="postlist_category" style="width: 230px;"></input>				
						</td>					
					</tr>				  
				</table>
				
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Enter the slug of the tag to display. Leave this option blank to show posts with any tag", "funky_shortcodes" ); ?></em>
				<br /><br />
				
			</fieldset>
			
		</div>

		<div class="mceActionPanel">
			<input type="button" id="cancel" name="cancel" value="Close" style="float: left;" onclick="tinyMCEPopup.close();" />
			<input type="submit" id="insert" name="insert" value="Insert" style="float: right;" onclick="insertShortcode();" />
		</div>
		
	</form>
</body>
</html>
<?php

?>
