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
	<title><?php _e( "Button Shortcode", "funky_shortcodes" ); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<script language="javascript" type="text/javascript" src="<?php echo includes_url() ?>js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo includes_url(); ?>js/tinymce/tiny_mce_popup.js"></script>	
	<script language="javascript" type="text/javascript">
	function init() {
		
		tinyMCEPopup.resizeToInnerSize();
		
	}
	
	function insertShortcode() {
		
		var output;
	
		var button_align = document.getElementById('button_align').value;
		var button_color = document.getElementById('button_color').value;
		var button_text_color = document.getElementById('button_text_color').value;
		var button_text = document.getElementById('button_text').value;				
		var button_margin = document.getElementById('button_margin').value;
		var button_size = document.getElementById('button_size').value;
		var button_url = document.getElementById('button_url').value;
		
		if ( button_color !== '' ) {
			button_color = 'background="#'+button_color+'"';
		} else {
			button_color = '';
		}
		
		if ( button_text_color !== '' ) {
			button_text_color = 'color="#'+button_text_color+'"';
		} else {
			button_text_color = '';
		}
		
		if ( button_size === 'large' ) {
			button_size = 'size="large"';
		} else if ( button_size === 'small' ) {
			button_size = 'size="large"';
		} else {
			button_size = '';
		}
		
		if ( button_margin != '' ) {
			button_margin = 'margin="'+button_margin+'"';
		}
		
		if ( button_text != '' ){
			
			output = '[funky_button align="'+button_align+'" url="'+button_url+'" '+button_color+' '+button_text_color+' '+button_margin+' '+button_size+']'+button_text+'[/funky_button] ';
		
		} else {
			
			alert( 'Please enter the text to appear on your button.' );
			
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
		label span { color: #f00; }	
    </style>
    
</head>
<body onload="init();">

	<form name="raw_button_shortcode" action="#">

		<div class="panel_wrapper">
			
			<fieldset style="padding-left: 15px;">
			
				<legend><?php _e( "Button URL", "funky_shortcodes" ); ?></legend>
				
				<br />
			
				<table border="0" cellpadding="4" cellspacing="0">
				
					<tr>					
						<td nowrap="nowrap"><label for="button_style"><?php _e( "URL", "funky_shortcodes" ); ?>:</label></td>						
						<td>							
							<input type="text" name="button_url" id="button_url" style="width: 230px;"></input>						
						</td>						
					</tr>
				
				</table>
				  
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Enter the URL the button will link to", "funky_shortcodes" ); ?></em><br />
				<br />
			
			</fieldset>
			
			<br />
			
			<fieldset style="padding-left: 15px;">
			
				<legend><?php _e( "Text", "funky_shortcodes" ); ?></legend>
				
				<br />
			
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>				 
						<td nowrap="nowrap"><label for="button_text"><span>*</span><?php _e( "Text", "funky_shortcodes" ); ?>:</label></td>					
						<td>					
							<input type="text" name="button_text" id="button_text" style="width: 230px;"></input>					
						</td>					
					</tr>				  
				</table>
			
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Enter the text to be displayed on the button", "funky_shortcodes" ); ?></em><br />
				<br />
				
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>					 
						<td nowrap="nowrap"><label for="button_align"><?php _e( "Alignment", "funky_shortcodes" ); ?>:</label></td>
						<td>						
							<select name="button_align" id="button_align" style="width: 210px">
								<option value="left"><?php _e( "Left", "funky_shortcodes" ); ?></option>
								<option value="right"><?php _e( "Right", "funky_shortcodes" ); ?></option>
								<option value="center"><?php _e( "Center", "funky_shortcodes" ); ?></option>
							</select>						
						</td>
					</tr>			  
				</table>
			
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Select button alignment", "funky_shortcodes" ); ?></em><br />
				<br />
			
			</fieldset>
			
			<br />
			
			<fieldset style="padding-left: 15px;">
			
				<legend><?php _e( "Styling", "funky_shortcodes" ); ?></legend>
				
				<br />
				
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>					 
						<td nowrap="nowrap"><label for="button_color"><?php _e( "Color", "funky_shortcodes" ); ?>:</label></td>
						<td>						
							<input type="text" name="button_color" id="button_color" style="width: 230px;"></input>						
						</td>
					</tr>			  
				</table>				
				
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Enter button background color", "funky_shortcodes" ); ?></em><br />
				<br />
				
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>					 
						<td nowrap="nowrap"><label for="button_text_color"><?php _e( "Text Color", "funky_shortcodes" ); ?>:</label></td>
						<td>						
							<input type="text" name="button_text_color" id="button_text_color" style="width: 230px;"></input>						
						</td>
					</tr>			  
				</table>				
				
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Enter button text color", "funky_shortcodes" ); ?></em><br />
				<br />
				
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>					 
						<td nowrap="nowrap"><label for="button_size"><?php _e( "Size", "funky_shortcodes" ); ?>:</label></td>
						<td>						
							<select name="button_size" id="button_size" style="width: 210px">
								<option value="normal"><?php _e( "Normal", "funky_shortcodes" ); ?></option>
								<option value="small"><?php _e( "Small", "funky_shortcodes" ); ?></option>
								<option value="large"><?php _e( "Large", "funky_shortcodes" ); ?></option>
							</select>						
						</td>
					</tr>			  
				</table>
			
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Select button size", "funky_shortcodes" ); ?></em><br />
				<br />
				
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>				 
						<td nowrap="nowrap"><label for="button_margin"><?php _e( "Top Margin", "funky_shortcodes" ); ?>: </label></td>					
						<td>					
							<input type="text" name="button_margin" id="button_margin" style="width: 230px;" value=""></input>					
						</td>					
					</tr>				  
				</table>
			
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Enter the size (px) of the top margin", "funky_shortcodes" ); ?></em><br />
				<br />
				
			</fieldset>
			
		</div>

		<div class="mceActionPanel">
			<input type="button" id="cancel" name="cancel" value="Close" style="float: left" onclick="tinyMCEPopup.close();" />
			<input type="submit" id="insert" name="insert" value="Insert" style="float: right" onclick="insertShortcode();" />
		</div>
	
	</form>
	
</body>
</html>