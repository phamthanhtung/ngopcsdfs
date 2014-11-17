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
	<title><?php _e( "Portfolio Shortcode","raw_theme" ); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<script language="javascript" type="text/javascript" src="<?php echo includes_url() ?>js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo includes_url(); ?>js/tinymce/tiny_mce_popup.js"></script>	
	<script language="javascript" type="text/javascript">
	function init() {
		
		tinyMCEPopup.resizeToInnerSize();
		
	}
	
	function insertShortcode() {
		
		var output;
		
		var portfolio_list_number = document.getElementById( 'portfolio_list_number' ).value;
		var portfolio_list_columns = document.getElementById( 'portfolio_list_columns' ).value;
		var portfolio_list_category = document.getElementById( 'portfolio_list_category' ).value;	
		var portfolio_list_page = document.getElementById( 'portfolio_list_page' ).value;
		var portfolio_list_orderby = document.getElementById( 'portfolio_list_orderby' ).value;
		var portfolio_list_order = document.getElementById( 'portfolio_list_order' ).value;
		var portfolio_list_image = document.getElementById( 'portfolio_list_image' ).value;
		var portfolio_list_title = document.getElementById( 'portfolio_list_title' ).value;
		var portfolio_list_excerpt = document.getElementById( 'portfolio_list_excerpt' ).value;
		
		if ( portfolio_list_number != '' ){
			portfolio_list_number = ' number="'+portfolio_list_number+'"';
		}
		if ( portfolio_list_columns != '' ){
			portfolio_list_columns = ' columns="'+portfolio_list_columns+'"';
		}
		if ( portfolio_list_category != '' ){
			portfolio_list_category = ' category="'+portfolio_list_category+'"';
		}
		if ( portfolio_list_page != '' ){
			portfolio_list_page = ' page="'+portfolio_list_page+'"';
		}
		if ( portfolio_list_orderby != '' ){
			portfolio_list_orderby = ' orderby="'+portfolio_list_orderby+'"';
		}
		if ( portfolio_list_order != '' ){
			portfolio_list_order = ' order="'+portfolio_list_order+'"';
		}
		if ( portfolio_list_image != '' ){
			portfolio_list_image = ' image="'+portfolio_list_image+'"';
		}
		if ( portfolio_list_title != '' ){
			portfolio_list_title = ' title="'+portfolio_list_title+'"';
		}
		if ( portfolio_list_excerpt != '' ){
			portfolio_list_excerpt = ' excerpt="'+portfolio_list_excerpt+'"';
		}
		
		output = '[portfolio' + portfolio_list_number + portfolio_list_columns + portfolio_list_category + portfolio_list_page + portfolio_list_orderby + portfolio_list_order + portfolio_list_image + portfolio_list_title + portfolio_list_excerpt + ']';
		
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

	<form name="raw_portfolio_list_shortcodes" action="#">
		
		<div class="panel_wrapper">
			
			<fieldset style="padding-left: 15px;">
			
				<legend><?php _e( "Options","raw_theme" ); ?></legend>
				
				<br />
				
				<!-- NUMBER -->
				<table border="0" cellpadding="4" cellspacing="0">				
					<tr>					 
						<td nowrap="nowrap"><label for="portfolio_list_number"><?php _e( "Number of pages","raw_theme" ); ?>:</label></td>						
						<td>						
							<select name="portfolio_list_number" id="portfolio_list_number" style="width: 210px"> 							
								<option value="-1"><?php _e( "All","raw_theme" ); ?></option>
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
				  
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Select the number of pages to display","raw_theme" ); ?></em><br />
				<br />
				
				<!-- COLUMNS -->
				<table border="0" cellpadding="4" cellspacing="0">				
					<tr>					 
						<td nowrap="nowrap"><label for="portfolio_list_columns"><?php _e( "Columns","raw_theme" ); ?>:</label></td>						
						<td>						
							<select name="portfolio_list_columns" id="portfolio_list_columns" style="width: 210px"> 							
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select>						
						</td>						
					</tr>					  
				  </table>
				  
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Select the number of columns to display the pages in", "raw_theme" ); ?></em><br />
				<br />
				
				<!-- PARENT -->
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>				 
						<td nowrap="nowrap"><label for="portfolio_list_category"><?php _e( "Category", "raw_theme" ); ?>:</label></td>					
						<td>					
							<input type="text" name="portfolio_list_category" id="portfolio_list_category" style="width: 230px;"></input>				
						</td>					
					</tr>				  
				</table>
				
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Slug of portfolio category post to display", "raw_theme" ); ?></em>
				<br /><br />
				
				<!-- PAGE ID -->
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>				 
						<td nowrap="nowrap"><label for="portfolio_list_page"><?php _e( "Page ID", "raw_theme" ); ?>:</label></td>					
						<td>					
							<input type="text" name="portfolio_list_page" id="portfolio_list_page" style="width: 230px;"></input>				
						</td>					
					</tr>				  
				</table>
				
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Display specific pages by entering their IDs here. Separete each ID with a comma ", "raw_theme"); ?></em>
				<br /><br />
				
				<!-- ORDER BY -->
				<table border="0" cellpadding="4" cellspacing="0">				
					<tr>					 
						<td nowrap="nowrap"><label for="portfolio_list_orderby"><?php _e( "Order By", "raw_theme" ); ?>:</label></td>						
						<td>						
							<select name="portfolio_list_orderby" id="portfolio_list_orderby" style="width: 210px"> 							
								<option value="menu_order"><?php _e( "Menu Order", "raw_theme" ); ?></option>
								<option value="date"><?php _e( "Date", "raw_theme" ); ?></option>
								<option value="id">ID</option>
								<option value="title"><?php _e( "Title", "raw_theme" ); ?></option>
								<option value="rand"><?php _e( "Random", "raw_theme" ); ?></option>
								<option value="parent"><?php _e( "Parent", "raw_theme" ); ?></option>
								<option value="author"><?php _e( "Author", "raw_theme" ); ?></option>
							</select>						
						</td>						
					</tr>					  
				</table>
			
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Select the method used to order results", "raw_theme" ); ?>.</em><br />
				<br />
				
				<!-- ORDER -->
				<table border="0" cellpadding="4" cellspacing="0">				
					<tr>					 
						<td nowrap="nowrap"><label for="portfolio_list_order"><?php _e( "Order", "raw_theme" ); ?>:</label></td>						
						<td>						
							<select name="portfolio_list_order" id="portfolio_list_order" style="width: 210px"> 							
								<option value="ASC"><?php _e( "Ascending", "raw_theme" ); ?></option>
								<option value="DESC"><?php _e( "Descending", "raw_theme" ); ?></option>
							</select>						
						</td>						
					</tr>					  
				</table>
				
				<!-- IMAGE -->
				<table border="0" cellpadding="4" cellspacing="0">				
					<tr>					 
						<td nowrap="nowrap"><label for="portfolio_list_image"><?php _e( "Image", "raw_theme" ); ?>:</label></td>						
						<td>						
							<select name="portfolio_list_image" id="portfolio_list_image" style="width: 210px"> 							
								<option value="true"><?php _e( "Show feature image", "raw_theme" ); ?></option>
								<option value="false"><?php _e( "Don't show feature image", "raw_theme" ); ?></option>
							</select>						
						</td>						
					</tr>					  
				</table>
				
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Select whether or not ot show the page's feature image", "raw_theme" ); ?></em><br />
				<br />
				
				<!-- TITLES -->
				<table border="0" cellpadding="4" cellspacing="0">				
					<tr>					 
						<td nowrap="nowrap"><label for="portfolio_list_title"><?php _e( "Title", "raw_theme" ); ?>:</label></td>						
						<td>						
							<select name="portfolio_list_title" id="portfolio_list_title" style="width: 210px"> 							
								<option value="true"><?php _e( "Show page titles", "raw_theme" ); ?></option>
								<option value="false"><?php _e( "Don't show page titles", "raw_theme" ); ?></option>
							</select>						
						</td>						
					</tr>					  
				</table>
				
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Select whether or not ot show the page's title", "raw_theme" ); ?></em><br />
				<br />
				
				<!-- EXCERPTS -->
				<table border="0" cellpadding="4" cellspacing="0">				
					<tr>					 
						<td nowrap="nowrap"><label for="portfolio_list_excerpt"><?php _e( "Excerpts", "raw_theme" ); ?>:</label></td>						
						<td>						
							<select name="portfolio_list_excerpt" id="portfolio_list_excerpt" style="width: 210px"> 							
								<option value="true"><?php _e( "Show page excerpts", "raw_theme" ); ?></option>
								<option value="false"><?php _e( "Don't show page excerpts", "raw_theme" ); ?></option>
							</select>						
						</td>						
					</tr>					  
				</table>
				
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Select whether or not ot show the page's excerpt", "raw_theme" ); ?></em><br />
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
