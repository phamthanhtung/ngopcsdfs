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
	<title><?php _e( "Page List Shortcode", "funky_shortcodes" ); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<script language="javascript" type="text/javascript" src="<?php echo includes_url() ?>js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo includes_url(); ?>js/tinymce/tiny_mce_popup.js"></script>	
	<script language="javascript" type="text/javascript">
	function init() {
		
		tinyMCEPopup.resizeToInnerSize();
		
	}
	
	function insertShortcode() {
		
		var output;
		
		var pagelist_parent = document.getElementById( 'pagelist_parent' ).value;	
		var pagelist_title = document.getElementById( 'pagelist_title' ).value;
		var pagelist_image = document.getElementById( 'pagelist_image' ).value;
		var pagelist_excerpt = document.getElementById( 'pagelist_excerpt' ).value;
		var pagelist_number = document.getElementById( 'pagelist_number' ).value;
		var pagelist_columns = document.getElementById( 'pagelist_columns' ).value;
		var pagelist_orderby = document.getElementById( 'pagelist_orderby' ).value;
		var pagelist_order = document.getElementById( 'pagelist_order' ).value;
		var pagelist_page = document.getElementById( 'pagelist_page' ).value;
		
		if ( pagelist_number != '' ){
			pagelist_number = ' number="'+ pagelist_number +'"';
		}
		if ( pagelist_columns != '' ){
			pagelist_columns = ' columns="'+ pagelist_columns +'"';
		}
		if ( pagelist_parent != '' ){
			pagelist_parent = ' parent="'+ pagelist_parent +'"';
		}
		if ( pagelist_page != '' ){
			pagelist_page = ' page="'+ pagelist_page +'"';
		}
		if ( pagelist_orderby != '' ){
			pagelist_orderby = ' orderby="'+ pagelist_orderby +'"';
		}
		if ( pagelist_order != '' ){
			pagelist_order = ' order="'+ pagelist_order +'"';
		}
		if ( pagelist_image != '' ){
			pagelist_image = ' image="'+ pagelist_image +'"';
		}
		if ( pagelist_title != '' ){
			pagelist_title = ' title="'+ pagelist_title +'"';
		}
		if ( pagelist_excerpt != '' ){
			pagelist_excerpt = ' excerpt="'+ pagelist_excerpt +'"';
		}
		
		output = '[funky_pagelist'+ pagelist_number + pagelist_columns + pagelist_parent + pagelist_page + pagelist_orderby + pagelist_order + pagelist_image + pagelist_title + pagelist_excerpt +']';
		
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

	<form name="raw_pagelist_shortcodes" action="#">
		
		<div class="panel_wrapper">
			
			<fieldset style="padding-left: 15px;">
			
				<legend><?php _e( "Options", "funky_shortcodes" ); ?></legend>
				
				<br />
				
				<!-- NUMBER -->
				<table border="0" cellpadding="4" cellspacing="0">				
					<tr>					 
						<td nowrap="nowrap"><label for="pagelist_number"><?php _e( "Number of pages", "funky_shortcodes" ); ?>:</label></td>						
						<td>						
							<select name="pagelist_number" id="pagelist_number" style="width: 210px"> 							
								<option value="-1"><?php _e( "All", "funky_shortcodes" ); ?></option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
							</select>						
						</td>						
					</tr>					  
				  </table>
				  
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Select the number of pages to display", "funky_shortcodes" ); ?></em><br />
				<br />
				
				<!-- COLUMNS -->
				<table border="0" cellpadding="4" cellspacing="0">				
					<tr>					 
						<td nowrap="nowrap"><label for="pagelist_columns"><?php _e( "Columns", "funky_shortcodes" ); ?>:</label></td>						
						<td>						
							<select name="pagelist_columns" id="pagelist_columns" style="width: 210px"> 							
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select>						
						</td>						
					</tr>					  
				  </table>
				  
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Select the number of columns to display the pages in", "funky_shortcodes" ); ?></em><br />
				<br />
				
				<!-- PARENT -->
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>				 
						<td nowrap="nowrap"><label for="pagelist_parent"><?php _e( "Parent", "funky_shortcodes" ); ?>:</label></td>					
						<td>					
							<input type="text" name="pagelist_parent" id="pagelist_parent" style="width: 230px;"></input>				
						</td>					
					</tr>				  
				</table>
				
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "ID of parent page", "funky_shortcodes" ); ?></em>
				<br /><br />
				
				<!-- PAGE ID -->
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>				 
						<td nowrap="nowrap"><label for="pagelist_page"><?php _e( "Page ID", "funky_shortcodes" ); ?>:</label></td>					
						<td>					
							<input type="text" name="pagelist_page" id="pagelist_page" style="width: 230px;"></input>				
						</td>					
					</tr>				  
				</table>
				
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Display specific pages by entering their IDs here. Separete each ID with a comma ", "funky_shortcodes" ); ?></em>
				<br /><br />
				
				<!-- ORDER BY -->
				<table border="0" cellpadding="4" cellspacing="0">				
					<tr>					 
						<td nowrap="nowrap"><label for="pagelist_orderby"><?php _e( "Order By", "funky_shortcodes" ); ?>:</label></td>						
						<td>						
							<select name="pagelist_orderby" id="pagelist_orderby" style="width: 210px"> 							
								<option value="menu_order"><?php _e( "Menu Order", "funky_shortcodes" ); ?></option>
								<option value="date"><?php _e( "Date", "funky_shortcodes" ); ?></option>
								<option value="id">ID</option>
								<option value="title"><?php _e( "Title", "funky_shortcodes" ); ?></option>
								<option value="rand"><?php _e( "Random", "funky_shortcodes" ); ?></option>
								<option value="parent"><?php _e( "Parent", "funky_shortcodes" ); ?></option>
								<option value="author"><?php _e( "Author", "funky_shortcodes" ); ?></option>
							</select>						
						</td>						
					</tr>					  
				</table>
			
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Select the method used to order results", "funky_shortcodes" ); ?>.</em><br />
				<br />
				
				<!-- ORDER -->
				<table border="0" cellpadding="4" cellspacing="0">				
					<tr>					 
						<td nowrap="nowrap"><label for="pagelist_order"><?php _e( "Order", "funky_shortcodes" ); ?>:</label></td>						
						<td>						
							<select name="pagelist_order" id="pagelist_order" style="width: 210px"> 							
								<option value="ASC"><?php _e( "Ascending", "funky_shortcodes" ); ?></option>
								<option value="DESC"><?php _e( "Descending", "funky_shortcodes" ); ?></option>
							</select>						
						</td>						
					</tr>					  
				</table>
				
				<!-- IMAGE -->
				<table border="0" cellpadding="4" cellspacing="0">				
					<tr>					 
						<td nowrap="nowrap"><label for="pagelist_image"><?php _e( "Image", "funky_shortcodes" ); ?>:</label></td>						
						<td>						
							<select name="pagelist_image" id="pagelist_image" style="width: 210px"> 							
								<option value="true"><?php _e( "Show feature image", "funky_shortcodes" ); ?></option>
								<option value="false"><?php _e( "Don't show feature image", "funky_shortcodes" ); ?></option>
							</select>						
						</td>						
					</tr>					  
				</table>
				
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Select whether or not ot show the page's feature image", "funky_shortcodes" ); ?></em><br />
				<br />
				
				<!-- TITLES -->
				<table border="0" cellpadding="4" cellspacing="0">				
					<tr>					 
						<td nowrap="nowrap"><label for="pagelist_title"><?php _e( "Title", "funky_shortcodes" ); ?>:</label></td>						
						<td>						
							<select name="pagelist_title" id="pagelist_title" style="width: 210px"> 							
								<option value="true"><?php _e( "Show page titles", "funky_shortcodes" ); ?></option>
								<option value="false"><?php _e( "Don't show page titles", "funky_shortcodes" ); ?></option>
							</select>						
						</td>						
					</tr>					  
				</table>
				
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Select whether or not ot show the page's title", "funky_shortcodes" ); ?></em><br />
				<br />
				
				<!-- EXCERPTS -->
				<table border="0" cellpadding="4" cellspacing="0">				
					<tr>					 
						<td nowrap="nowrap"><label for="pagelist_excerpt"><?php _e( "Excerpts", "funky_shortcodes" ); ?>:</label></td>						
						<td>						
							<select name="pagelist_excerpt" id="pagelist_excerpt" style="width: 210px"> 							
								<option value="true"><?php _e( "Show page excerpts", "funky_shortcodes" ); ?></option>
								<option value="false"><?php _e( "Don't show page excerpts", "funky_shortcodes" ); ?></option>
							</select>						
						</td>						
					</tr>					  
				</table>
				
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Select whether or not ot show the page's excerpt", "funky_shortcodes" ); ?></em><br />
				<br />
				
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
