/*
 * jquery.funky-shortcodes.js
 * 
 * Custom scripts for Funky Shortcodes WordPress plugin
 * 
 * Copyright 2012 FunkyThemes
 * http://themeforest.net/user/EugeneO/portfolio
 *
 */

jQuery(document).ready( function ($) {
	
	initShortcodes();
	
	$(document).ajaxComplete(function () {
		initShortcodes();
	});

});

function initShortcodes() {

	/* ---------------------------------------------------
		Accordions & Toggle Content
	-------------------------------------------------- */

	// Open first accordion item
	jQuery(".funky-accordion > .funky-toggle-item:first-child .funky-toggle-button").addClass("close");
	jQuery(".funky-accordion > .funky-toggle-item:first-child .funky-toggle-content").addClass("close").slideDown(250);
	
	jQuery(".funky-toggle-button").click( function() {
		
		// Check if this is an accordion or standard toggle
		if ( jQuery(this).parent().hasClass("accordion") ) {
		
			// Check if this toggle is already open
			if ( !jQuery(this).hasClass("close") ) {
				
				// Hide all toggle items
				jQuery(".funky-toggle-button").each( function() {
					jQuery(this).removeClass("close").parent("div").find(".funky-toggle-content").slideUp(250);
				});
				
				// Open the clicked item
				jQuery(this).addClass("close").parent("div").find(".funky-toggle-content").slideDown(250);
			}
			
		} else {
			
			// Open the clicked item
			jQuery(this).toggleClass("close").parent("div").find(".funky-toggle-content").slideToggle(250);
			
		}
		
	});
	
}