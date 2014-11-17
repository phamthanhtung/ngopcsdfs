( function() {
	
	tinymce.create( 'tinymce.plugins.funky_shortcode_pagelist', {		 
		init: function( ed, url ) {
			
			ed.addCommand( 'mce_funky_shortcode_pagelist', function() {
				
				ed.windowManager.open({
					
					file: url + '/window.php',
					width: 403 + ed.getLang( 'funky_shortcode_pagelist.delta_width', 0 ),
					height: 518 + ed.getLang( 'funky_shortcode_pagelist.delta_height', 0 ),
					inline: 1
					
				}, {
					
					plugin_url: url
					
				});
			});
			
            ed.addButton( 'funky_pages', {
                title:	'Insert page list',
                image:	url + '/icon.png',
				cmd:	'mce_funky_shortcode_pagelist'
            });
			
		}
		
	});

	tinymce.PluginManager.add( 'funky_pages', tinymce.plugins.funky_shortcode_pagelist );
	
})();