( function() {
	
	tinymce.create( 'tinymce.plugins.funky_shortcode_highlight', {		 
		init: function( ed, url ) {
			
			ed.addCommand( 'mce_funky_shortcode_highlight', function() {
				
				ed.windowManager.open({
					
					file: url + '/window.php',
					width: 360 + ed.getLang( 'funky_shortcode_highlight.delta_width', 0 ),
					height: 210 + ed.getLang( 'funky_shortcode_highlight.delta_height', 0 ),
					inline: 1
					
				}, {
					
					plugin_url: url
					
				});
			});
			
            ed.addButton( 'funky_highlight', {
                title: 	'Insert highlighted text',
                image: 	url + '/icon.png',
				cmd: 	'mce_funky_shortcode_highlight'
            });
			
		}
		
	});

	tinymce.PluginManager.add( 'funky_highlight', tinymce.plugins.funky_shortcode_highlight );
	
})();