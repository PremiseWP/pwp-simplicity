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
	});

	$(window).load(function(){
		var _win = $(this); // jQuery object for window

		// more code here
	});
})(jQuery)