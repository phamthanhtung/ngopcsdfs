( function() {
	
	tinymce.create( 'tinymce.plugins.funky_shortcode_toggle', {
		init: function( ed, url ) {
			
			ed.addCommand( 'mce_funky_shortcode_toggle', function() {
				
				ed.windowManager.open({
					
					file:	url + '/window.php',
					width:	365 + ed.getLang( 'funky_shortcode_toggle.delta_width', 0 ),
					height: 416 + ed.getLang( 'funky_shortcode_toggle.delta_height', 0 ),
					inline: 1
					
				}, {
					
					plugin_url: url
					
				});
			});
			
			ed.addButton( 'funky_toggle', {
				title:	'Insert a toggled item',
				image:	url + '/icon.png',
				cmd:	'mce_funky_shortcode_toggle'
            });
			
		}
		
	});

	tinymce.PluginManager.add( 'funky_toggle', tinymce.plugins.funky_shortcode_toggle );
	
})();