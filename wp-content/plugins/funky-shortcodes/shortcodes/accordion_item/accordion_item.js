( function() {
	
	tinymce.create( 'tinymce.plugins.funky_shortcode_accordion_item', {
	
		init: function( ed, url ) {
			
			ed.addCommand( 'mce_funky_shortcode_accordion_item', function() {
				
				ed.windowManager.open({
					
					file:	url + '/window.php',
					width:	365 + ed.getLang( 'funky_shortcode_accordion_item.delta_width', 0 ),
					height: 416 + ed.getLang( 'funky_shortcode_accordion_item.delta_height', 0 ),
					inline: 1
					
				}, {
					
					plugin_url: url
					
				});
			});
			
			ed.addButton( 'funky_accordion_item', {
				title:	'Insert Accodion Item',
				image:	url + '/icon.png',
				cmd:	'mce_funky_shortcode_accordion_item'
            });
			
		}
		
	});

	tinymce.PluginManager.add( 'funky_accordion_item', tinymce.plugins.funky_shortcode_accordion_item );
	
})();