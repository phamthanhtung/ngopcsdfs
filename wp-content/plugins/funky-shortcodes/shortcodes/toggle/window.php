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
	<title><?php _e( "Toggle Content Shortcode", "funky_shortcodes" ); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<script language="javascript" type="text/javascript" src="<?php echo includes_url() ?>js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo includes_url(); ?>js/tinymce/tiny_mce_popup.js"></script>	
	<script language="javascript" type="text/javascript">
	function init() {
		
		tinyMCEPopup.resizeToInnerSize();
		
		var selectedContent = tinyMCE.activeEditor.selection.getContent();
		
		if( selectedContent != '' ) {
			
			document.getElementById( 'toggle_text' ).value = selectedContent;
			
		}
		
	}
	
	function insertShortcode() {
		
		var output;
	
		var toggle_title = document.getElementById( 'toggle_title' ).value;
		var toggle_text = document.getElementById( 'toggle_text' ).value;
			
		if ( toggle_title != '' && toggle_text != '' ){
		
			output = '[funky_toggle title="'+ toggle_title +'"] '+ toggle_text +' [/funky_toggle] ';
		
		} else {
			
			alert( 'Please enter title text and toggled content.' );
			
		}	
		
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

	<form name="raw_toggle_shortcode" action="#">
	
		<div class="panel_wrapper">
			
			<fieldset style="padding-left: 15px;">
			
				<legend><?php _e( "Title", "funky_shortcodes" ); ?></legend>
				
				<br />
			
				<table border="0" cellpadding="4" cellspacing="0">				
					<tr>					 
						<td nowrap="nowrap"><label for="toggle_title"><span>*</span><?php _e( "Title", "funky_shortcodes" ); ?>:</label></td>
						<td>						
							<textarea type="text" name="toggle_title" id="toggle_title" style="width: 230px" rows="7"></textarea>				
						</td>						
					</tr>					  
				</table>
				  
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Enter the title of this toggle content. This is the text the user will click on to toggle the hiden content", "funky_shortcodes" ); ?></em>
				<br /><br />
			
			</fieldset>
			
			<br />
			
			<fieldset style="padding-left: 15px;">
			
				<legend><?php _e( "Text", "funky_shortcodes" ); ?></legend>
				
				<br />
			
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>				 
						<td nowrap="nowrap"><label for="toggle_text"><span>*</span><?php _e( "Content", "funky_shortcodes" ); ?>:</label></td>					
						<td>					
							<textarea type="text" name="toggle_text" id="toggle_text" style="width: 230px" rows="7"></textarea>					
						</td>				
					</tr>				  
				</table>
				
				<em style="font-size: 10px; padding: 5px 0 0;"><?php _e( "Enter the text to be hidden and shown when the title is clicked", "funky_shortcodes" ); ?></em>
				<br /><br />
			
			</fieldset>
			
		</div>

		<div class="mceActionPanel">
			<input type="button" id="cancel" name="cancel" value="Close" style="float: left" onclick="tinyMCEPopup.close();" />
			<input type="submit" id="insert" name="insert" value="Insert" style="float: right" onclick="insertShortcode();" />
		</div>
		
	</form>
	
</body>
</html>
<?php

?>
