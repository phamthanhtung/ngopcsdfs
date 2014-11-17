( function() {

	tinymce.create( 'tinymce.plugins.funky_shortcode_dropcaps', {		 
		
		init: function( ed, url ) {
		
			ed.addButton( 'funky_dropcap', {
                title:	'Insert drop cap',
                image:	url + '/icon.png',
                onclick : function() {
                    ed.execCommand( 'mceInsertContent', false, '[funky_dropcap] THIS SHOULD BE AN ENTIRE HEADER OR PARAGRAPH OF TEXT. NOT JUST A SINGLE CHARACTER [/funky_dropcap]' );
                }
            });
			
		},
		
		createControl : function ( n, cm ) {
			return null;
		}
		
	});

	tinymce.PluginManager.add( 'funky_dropcap', tinymce.plugins.funky_shortcode_dropcaps );
	
})();