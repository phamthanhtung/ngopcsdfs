(function() {
	
	tinymce.create( 'tinymce.plugins.funky_shortcode_portfolio', {		 
		init : function( ed, url ) {
			
			ed.addCommand( 'mce_funky_shortcode_portfolio', function() {
				
				ed.windowManager.open({
					
					file:	url + '/window.php',
					width:	403 + ed.getLang( 'funky_shortcode_portfolio.delta_width', 0 ),
					height:	520 + ed.getLang( 'funky_shortcode_portfolio.delta_height', 0 ),
					inline:	1
					
				}, {
					
					plugin_url: url
					
				});
			});
			
            ed.addButton( 'funky_portfolio', {
                title : 'Insert portfolio',
                image : url + '/icon.png',
				cmd : 'mce_funky_shortcode_portfolio'
            });
			
		}
		
	});

	tinymce.PluginManager.add( 'funky_portfolio', tinymce.plugins.funky_shortcode_portfolio );
	
})();