( function() {
	
	tinymce.create( 'tinymce.plugins.funky_shortcode_quotes', {		 
		init: function( ed, url ) {
			
			ed.addCommand( 'mce_funky_shortcode_quotes', function() {
				
				ed.windowManager.open({
					
					file: 	url + '/window.php',
					width:	360 + ed.getLang( 'funky_shortcode_quotes.delta_width', 0 ),
					height: 310 + ed.getLang( 'funky_shortcode_quotes.delta_height', 0 ),
					inline: 1
					
				}, {
					
					plugin_url: url
					
				});
			});
			
            ed.addButton( 'funky_quote', {
                title:	'Insert pull quote',
                image:	url + '/icon.png',
				cmd:	'mce_funky_shortcode_quotes'
            });
			
		}
		
	});

	tinymce.PluginManager.add( 'funky_quote', tinymce.plugins.funky_shortcode_quotes );
	
})();