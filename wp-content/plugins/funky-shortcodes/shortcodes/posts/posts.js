( function() {
	
	tinymce.create( 'tinymce.plugins.funky_shortcode_postlist', {		 
		init: function( ed, url ) {
			
			ed.addCommand( 'mce_funky_shortcode_postlist', function() {
				
				ed.windowManager.open({
					
					file: url + '/window.php',
					width: 403 + ed.getLang( 'funky_shortcode_postlist.delta_width', 0 ),
					height: 240 + ed.getLang( 'funky_shortcode_postlist.delta_height', 0 ),
					inline: 1
					
				}, {
					
					plugin_url: url
					
				});
			});
			
            ed.addButton( 'funky_posts', {
                title:	'Insert post list',
                image:	url + '/icon.png',
				cmd:	'mce_funky_shortcode_postlist'
            });
			
		}
		
	});

	tinymce.PluginManager.add( 'funky_posts', tinymce.plugins.funky_shortcode_postlist );
	
})();