( function() {
	
	tinymce.create( 'tinymce.plugins.funky_shortcode_clearboth', {
	
		init: function( ed, url ) {
			
            ed.addButton( 'funky_clearboth', {
                title:	'Reset top margins',
                image:	url + '/icon.png',
                onclick : function() {
                    ed.execCommand( 'mceInsertContent', false, '[funky_clearboth] ' );
                }
            });
			
		},

		createControl : function ( n, cm ) {
			return null;
		}
		
	});

	tinymce.PluginManager.add( 'funky_clearboth', tinymce.plugins.funky_shortcode_clearboth );
	
})();