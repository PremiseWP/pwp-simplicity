(function($){
	$(document).ready(function(){
		var _doc = $(this); // jQuery object for document

		//
		//
		// navigation
		var nav = $('#site-navigation'),
		button  = $('.menu-toggle');
		button.click(function(e){
			e.preventDefault();
			!nav.is('.toggled')
				? nav.addClass('toggled')
				: nav.removeClass('toggled');
			return false;
		});

		//
		//
		// set the right number of widget columns for the header
		var headerWidgetsArea = $('.pwp-simplicity-header-widgets'),
		headerWidgets = headerWidgetsArea.children();
		headerWidgets.addClass( 'span' + Math.floor(12 / headerWidgets.length) );
		headerWidgetsArea.show();

		//
		//
		// set the right number of widget columns for the footer
		var footerWidgetsArea = $('.pwp-simplicity-footer-widgets'),
		footerWidgets = footerWidgetsArea.children();
		footerWidgets.addClass( 'span' + Math.floor(12 / footerWidgets.length) );
		footerWidgetsArea.show();
	});

	$(window).load(function(){
		var _win = $(this); // jQuery object for window

		// more code here
	});
})(jQuery)