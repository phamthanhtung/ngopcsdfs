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
	<title><?php _e( "Quote Shortcodes", "funky_shortcodes" ); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<script language="javascript" type="text/javascript" src="<?php echo includes_url() ?>js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo includes_url(); ?>js/tinymce/tiny_mce_popup.js"></script>	
	<script language="javascript" type="text/javascript">
	function init() {
		
		tinyMCEPopup.resizeToInnerSize();
		
		var selectedContent = tinyMCE.activeEditor.selection.getContent();
		
		if( selectedContent != '' ) {
			
			document.getElementById( 'quote_text' ).value = selectedContent;
			
		}
		
	}
	
	function insertShortcode() {
		
		var output;
	
		var quote_align = document.getElementById( 'quote_align' ).value;
		var quote_text = document.getElementById( 'quote_text' ).value;
			
		if ( quote_text != '' ){
		
			var align = '';
			
			if ( quote_align == 'right' ){
				align = 'align="right"';
			} else if ( quote_align == 'left' ){
				align = 'align="left"';
			}
			
			output = '[funky_quote '+align+'] '+ quote_text +' [/funky_quote]';
		
		} else {
			
			alert( 'Please enter your quote text.' );
			
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

	<form name="raw_box_shortcodes" action="#">
	
		<div class="panel_wrapper">
			
			<fieldset style="padding-left: 15px;">
			
				<legend><?php _e( "Styling", "funky_shortcodes" ); ?></legend>
				
				<br />
			
				<table border="0" cellpadding="4" cellspacing="0">
				
					<tr>					 
						<td nowrap="nowrap"><label for="quote_align"><?php _e( "Align", "funky_shortcodes" ); ?>:</label></td>
						<td>						
							<select name="quote_align" id="quote_align" style="width: 210px">                        
								<option value="center"><?php _e( "Center", "funky_shortcodes" ); ?></option>
								<option value="left"><?php _e( "Left", "funky_shortcodes" ); ?></option>
								<option value="right"><?php _e( "Right", "funky_shortcodes" ); ?></option>          
							</select>						
						</td>						
					</tr>					  
				</table>
				  
				<em style="font-size: 10px;padding: 5px 0 0 45px;"><?php _e( "Choose the alignment of quote to be insterted", "funky_shortcodes" ); ?></em>
				<br /><br />
			
			</fieldset>
			
			<br />
			
			<fieldset style="padding-left: 15px;">
			
				<legend><?php _e( "Text", "funky_shortcodes" ); ?></legend>
				
				<br />
			
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>				 
						<td nowrap="nowrap"><label for="quote_text"><span>*</span><?php _e( "Text", "funky_shortcodes" ); ?>:</label></td>					
						<td>					
							<textarea type="text" name="quote_text" id="quote_text" style="width: 230px" rows="7"></textarea>					
						</td>				
					</tr>				  
				</table>
				
				<em style="font-size: 10px;padding: 5px 0 0 45px;"><?php _e( "Enter the text to be displayed in this quote", "funky_shortcodes" ); ?></em>
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
