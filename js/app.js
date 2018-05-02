jQuery( document ).ready(function( $ ) {
  // Code that uses jQuery's $ can follow here.

  	$(document).foundation();

	$( ".nav-toggle" ).click(function() {
	$(this).toggleClass("open");
	$("nav").fadeToggle(100);

	return false;
	});
});
// Code that uses other library's $ can follow here.




