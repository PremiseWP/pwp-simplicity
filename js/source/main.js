(function($){
	$(document).ready(function(){
		var _doc = $(this); // jQuery object for document

		// reference variables for efficiency
		var navToggle = $('.menu-toggle');
		var mainNav   = $('#primary-menu > ul');

		// bind the nav toggle
		navToggle.click(function(e){
			e.preventDefault();
			mainNav.slideToggle(400);
		});

		// more code here
	});

	$(window).load(function(){
		var _win = $(this); // jQuery object for window

		// more code here
	});
})(jQuery)