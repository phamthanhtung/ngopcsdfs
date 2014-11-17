( function() {
	
	tinymce.create( 'tinymce.plugins.funky_shortcode_columns', {		 
		init: function( ed, url ) {
			
			ed.addCommand( 'mce_funky_shortcode_columns', function() {
				
				ed.windowManager.open({
					
					file: url + '/window.php',
					width: 360 + ed.getLang( 'funky_shortcode_columns.delta_width', 0 ),
					height: 135 + ed.getLang( 'funky_shortcode_columns.delta_height', 0 ),
					inline: 1
					
				}, {
					
					plugin_url: url
					
				});
			});
			
            ed.addButton( 'funky_columns', {
                title:	'Insert columns',
                image:	url + '/icon.png',
				cmd:	'mce_funky_shortcode_columns'
            });
			
		}
		
	});

	tinymce.PluginManager.add( 'funky_columns', tinymce.plugins.funky_shortcode_columns );
	
})();