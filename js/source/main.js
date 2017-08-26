/**
 * Our main theme object
 *
 * global pwpSimplicity is set using wp_localize_script.
 *
 * @param  {Object} $ jQuery
 * @return {void}   does not return anything
 */
(function($){
	$(document).ready(function(){
		var _doc = $(this); // jQuery object for document

		// Build our navigation Object
		pwpSimplicity.navigation = new pwpsNavigation();

		// Build our header Object
		pwpSimplicity.header = new pwpsHeader();

		// Build our footer Object
		pwpSimplicity.footer = new pwpsFooter();

		// our theme object
		console.log(pwpSimplicity);

	});

	$(window).load(function(){
		var _win = $(this); // jQuery object for window

		// more code here
	});
})(jQuery)