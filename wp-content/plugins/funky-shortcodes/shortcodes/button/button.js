( function() {
	
	tinymce.create( 'tinymce.plugins.funky_shortcode_button', {		 
		init: function( ed, url ) {
			
			ed.addCommand( 'mce_funky_shortcode_button', function() {
				
				ed.windowManager.open({
					
					file: url + '/window.php',
					width: 526 + ed.getLang( 'funky_shortcode_button.delta_width', 0 ),
					height: 515 + ed.getLang( 'funky_shortcode_button.delta_height', 0 ),
					inline: 1
					
				}, {
					
					plugin_url: url
					
				});
			});
			
            ed.addButton( 'funky_button', {
                title:	'Insert Button',
                image:	url + '/icon.png',
                cmd:	'mce_funky_shortcode_button'
            });
			
		}
	
	});

	tinymce.PluginManager.add( 'funky_button', tinymce.plugins.funky_shortcode_button );
	
})();