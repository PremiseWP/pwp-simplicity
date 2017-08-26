/**
 * Build our Footer object
 */
function pwpsFooter() {
	$ = jQuery;

	this.widgetsArea = $('.pwp-simplicity-footer-widgets'),
	this.footerWidgets = this.widgetsArea.children(),

	this.loadWidgets();

	return this;
}

pwpsFooter.prototype.loadWidgets = function() {
	this.footerWidgets.addClass( 'span' + Math.floor(12 / this.footerWidgets.length) ),
	this.widgetsArea.show();
}