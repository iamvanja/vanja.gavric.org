/*------------------------------------------------------------------
[General JS]

Project:          Vanja Gavrić Photography
Version:          1.0
Author:           Vanja Gavrić
------------------------------------------------------------------*/


$(document).ready(function() { 
	//alert('nesto');
} );

$(function() {
	if ($.browser.msie && $.browser.version.substr(0,1)<7)
	{
	$('li').has('ul').mouseover(function(){
		$(this).children('ul').css('visibility','visible');
		}).mouseout(function(){
		$(this).children('ul').css('visibility','hidden');
		})
	}

	/* Mobile */
	$('#menu-wrap').prepend('<div id="menu-trigger">Menu</div>');		
	$("#menu-trigger").on("click", function(){
		$("#menu").slideToggle();
	});

	// iPad
	var isiPad = navigator.userAgent.match(/iPad/i) != null;
	if (isiPad) $('#menu ul').addClass('no-transition');      
  });          
    
    


$(function(){

	$(".spaceball").toggle(
  function() { $('body').append('<div id="lightbox"></div>'); $(".img-wrapper").addClass('overlay'); },
  function() { 		$(".img-wrapper").removeClass('overlay');
		$('#lightbox').remove(); }
	);
		
		
	$(".social-follow dd a").hover(
function() {
$(this).stop().css({opacity: 0.7}).animate({"opacity": "1"}, "fast");
}/*
,
function() 
{$(this).stop().css({opacity: 0.7}).animate({"opacity": "1"}, "slow");}
*/
);	
		
		


	

});


$(window).load(function() {
/* 	alert($('#footer-wrap').height()); */
	$('img#full-image').each(function(){
			/*
alert('width je'+this.width);
			alert('height je'+this.height);
*/
	    $(this).addClass(this.width > this.height ? 'landscape' : 'portrait');
	});
});
   
