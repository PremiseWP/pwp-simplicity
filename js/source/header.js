/**
 * our header Constructor
 *
 * @return {Object} Return instance of this object
 */
function pwpsHeader() {
	$ = jQuery;

	this.widgetsArea = $('.pwp-simplicity-header-widgets'),
	this.bump        = $('.site-header-bump'),
	this.header      = $('.site-header'),
	this.adminBar    = $('#wpadminbar'),
	this.widgets     = this.widgetsArea.children(),

	this.loadWidgets(),

	this.setBumpHeight(),

	this.adjustForAdminbar();

	return this;
}

pwpsHeader.prototype.loadWidgets = function() {
	this.widgets.addClass( 'span' + Math.floor(12 / this.widgets.length) ),
	this.widgetsArea.show();
}

pwpsHeader.prototype.setBumpHeight = function() {
		if ( this.bump.length ) {
			this.bump.height( this.header.outerHeight( true ) );
		}
}

pwpsHeader.prototype.adjustForAdminbar = function(e) {
		if ( this.adminBar.length && 'fixed' === this.header.css('position') ) {
			this.header.css('margin-top', this.adminBar.height() );
		}
}