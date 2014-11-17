( function() {
	
	tinymce.create( 'tinymce.plugins.funky_shortcode_box', {
	
		init: function( ed, url ) {
			
			ed.addCommand( 'mce_funky_shortcode_boxes', function() {
				
				ed.windowManager.open({
					
					file: url + '/window.php',
					width: 360 + ed.getLang( 'funky_shortcode_boxes.delta_width', 0 ),
					height: 310 + ed.getLang( 'funky_shortcode_boxes.delta_height', 0 ),
					inline: 1
					
				}, {
					
					plugin_url: url
					
				});
			});
			
            ed.addButton( 'funky_box', {
                title:	'Insert Styled Box',
                image:	url+'/icon.png',
				cmd:	'mce_funky_shortcode_boxes'
            });
			
		}
		
	});

	tinymce.PluginManager.add( 'funky_box', tinymce.plugins.funky_shortcode_box );
	
})();