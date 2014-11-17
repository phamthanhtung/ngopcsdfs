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
	<title><?php _e( "Column Shortcode", "funky_shortcodes" ); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<script language="javascript" type="text/javascript" src="<?php echo includes_url() ?>js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo includes_url(); ?>js/tinymce/tiny_mce_popup.js"></script>	
	<script language="javascript" type="text/javascript">
	function init() {
		
		tinyMCEPopup.resizeToInnerSize();
		
	}
	
	function insertShortcode() {
		
		var output;
		var width;
		
		var column_width = document.getElementById( 'column_width' ).value;
			
		if ( column_width == '1212' ){
			
			output = '[funky_half] *Column content goes here* [/funky_half]<br/>\
			[funky_half end="true"] *Column content goes here* [/funky_half]<br/>\
			<br/>\
			[funky_clearboth]';
			
		} else if ( column_width == '1323' ){
			
			output = '[funky_third] *Column content goes here* [/funky_third]<br/>\
			[funky_two_thirds end="true"] *Column content goes here* [/funky_two_thirds]<br/>\
			<br/>\
			[funky_clearboth]';
		
		} else if ( column_width == '2313' ){
			
			output = '[funky_two_thirds] *Column content goes here* [/funky_two_thirds]<br/>\
			[funky_third end="true"] *Column content goes here* [/funky_third]<br/>\
			<br/>\
			[funky_clearboth]';
			
		} else if ( column_width == '131313' ){
		
			output = '[funky_third] *Column content goes here* [/funky_third]<br/>\
			[funky_third] *Column content goes here* [/funky_third]<br/>\
			[funky_third end="true"] *Column content goes here* [/funky_third]<br/>\
			<br/>\
			[funky_clearboth]';
			
		} else if ( column_width == '121414' ){
			
			output = '[funky_half] *Column content goes here* [/funky_half]<br/>\
			[funky_fourth]  [/funky_fourth]<br/>\
			[funky_fourth end="true"] *Column content goes here* [/funky_fourth]<br/>\
			<br/>\
			[funky_clearboth]';
			
		} else if ( column_width == '141214' ){
		
			output = '[funky_fourth] *Column content goes here* [/funky_fourth]<br/>\
			[funky_half] *Column content goes here* [/funky_half]<br/>\
			[funky_fourth end="true"] *Column content goes here* [/funky_fourth]<br/>\
			<br/>\
			[funky_clearboth]';
			
		} else if ( column_width == '141412' ){
		
			output = '[funky_fourth] *Column content goes here* [/funky_fourth]<br/>\
			[funky_fourth] *Column content goes here* [/funky_fourth]<br/>\
			[funky_half end="true"] *Column content goes here* [/funky_half]<br/>\
			<br/>\
			[funky_clearboth]';
			
		} else if ( column_width == '14141414' ){			
			
			output = '[funky_fourth] *Column content goes here* [/funky_fourth]<br/>\
			[funky_fourth] *Column content goes here* [/funky_fourth]<br/>\
			[funky_fourth] *Column content goes here* [/funky_fourth]<br/>\
			[funky_fourth end="true"] *Column content goes here* [/funky_fourth]<br/>\
			<br/>\
			[funky_clearboth]';
		} else if ( column_width == '1434' ){
			
			output = '[funky_fourth] *Column content goes here* [/funky_fourth]<br/>\
			[funky_three_fourths end="true"] *Column content goes here* [/funky_three_fourths]<br/>\
			<br/>\
			[funky_clearboth]';
		
		} else if ( column_width == '3414' ){
			
			output = '[funky_three_fourths] *Column content goes here* [/funky_three_fourths]<br/>\
			[funky_fourth end="true"] *Column content goes here* [/funky_fourth]<br/>\
			<br/>\
			[funky_clearboth]';
			
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

	<form name="raw_columns_shortcode" action="#">

		<div class="panel_wrapper">	
	
			<fieldset style="padding-left: 15px;">
			
				<legend><?php _e( "Column Configuration", "funky_shortcodes" ); ?></legend>
				
				<br />
			
				<table border="0" cellpadding="4" cellspacing="0">				
					<tr>					 
						<td nowrap="nowrap"><label for="column_width"><?php _e( "Row Layout", "funky_shortcodes" ); ?>:</label></td>						
						<td>							
							<select name="column_width" id="column_width" style="width: 210px;">                        
								<option value="1212"><?php _e( "1/2 - 1/2", "funky_shortcodes" ); ?></option>
								<option value="1323"><?php _e( "1/3 - 2/3", "funky_shortcodes" ); ?></option>
								<option value="2313"><?php _e( "2/3 - 1/3", "funky_shortcodes" ); ?></option>
								<option value="131313"><?php _e( "1/3 - 1/3 - 1/3", "funky_shortcodes" ); ?></option>
								<option value="121414"><?php _e( "1/2 - 1/4 - 1/4", "funky_shortcodes" ); ?></option>
								<option value="141214"><?php _e( "1/4 - 1/2 - 1/4", "funky_shortcodes" ); ?></option>
								<option value="141412"><?php _e( "1/4 - 1/4 - 1/2", "funky_shortcodes" ); ?></option>
								<option value="14141414"><?php _e( "1/4 - 1/4 - 1/4 - 1/4", "funky_shortcodes" ); ?></option>
								<option value="1434"><?php _e( "1/4 - 3/4", "funky_shortcodes" ); ?></option>
								<option value="3414"><?php _e( "3/4 - 1/4", "funky_shortcodes" ); ?></option>
							</select>						
						</td>						
					</tr>					  
				</table>
			
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Choose the configuration of this row", "funky_shortcodes" ); ?></em><br/>
				<br/>
				
			</fieldset>
			
		</div>

		<div class="mceActionPanel">
			<input type="button" id="cancel" name="cancel" value="Close" style="float: left" onclick="tinyMCEPopup.close();" />
			<input type="submit" id="insert" name="insert" value="Insert" style="float: right" onclick="insertShortcode();" />
		</div>
	
	</form>
	
</body>
</html>