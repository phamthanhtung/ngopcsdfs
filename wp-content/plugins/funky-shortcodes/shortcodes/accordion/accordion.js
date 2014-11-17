( function() {
	
	tinymce.create( 'tinymce.plugins.funky_shortcode_accordion', {
		
		init: function( ed, url ) {
			
			ed.addButton( 'funky_accordion', {
                title:	'Insert Accordion',
                image:	url + '/icon.png',
                onclick : function() {
				
					ed.focus();					
					ed.selection.setContent( '[funky_accordion]<br />\
						[funky_accordion_item open="true" title="ITEM TITLE"]ITEM CONTENT[/funky_accordion_item]<br />\
						[funky_accordion_item title="ITEM TITLE"]ITEM CONTENT[/funky_accordion_item]<br />\
						[funky_accordion_item title="ITEM TITLE"]ITEM CONTENT[/funky_accordion_item]<br />\
						[/funky_accordion]' );
			
                }
            });
			
		},

		createControl : function ( n, cm ) {
			return null;
		}
		
	});

	tinymce.PluginManager.add( 'funky_accordion', tinymce.plugins.funky_shortcode_accordion );
	
})();