/**
 * our nav  Constructor
 *
 * @return {Object} Return instance of this object
 */
function pwpsNavigation() {
	$ = jQuery;

	this.nav = $('#site-navigation'),
	this.button  = $('.menu-toggle');

	this.bindEvents();

	return this;
}

pwpsNavigation.prototype.bindEvents = function() {
	this.button.click(this.toggle.bind(this));

}

pwpsNavigation.prototype.toggle = function(e) {
		!this.nav.is('.toggled')
			? this.nav.addClass('toggled')
			: this.nav.removeClass('toggled');
		return false;
}