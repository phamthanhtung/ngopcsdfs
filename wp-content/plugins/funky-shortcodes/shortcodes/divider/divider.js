( function() {
	
	tinymce.create( 'tinymce.plugins.funky_shortcode_divider', {
		init: function( ed, url ) {
			
			ed.addCommand( 'mce_funky_shortcode_divider', function() {
				
				ed.windowManager.open({
					
					file: url + '/window.php',
					width: 360 + ed.getLang( 'funky_shortcode_divider.delta_width', 0 ),
					height: 140 + ed.getLang( 'funky_shortcode_divider.delta_height', 0 ),
					inline: 1
					
				}, {
					
					plugin_url: url
					
				});
			});
			
            ed.addButton( 'funky_divider', {
                title: 'Insert divider',
                image: url + '/icon.png',
				cmd: 'mce_funky_shortcode_divider'
            });
			
		}
	
	});

	tinymce.PluginManager.add( 'funky_divider', tinymce.plugins.funky_shortcode_divider );
	
})();