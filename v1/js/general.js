/*
General stuff
Vanja Gavric 2010
*/

//CENTERING WRAPPER
$(document).ready(function()
{	
	var windowHeight = $(window).height();
	var wrapperHeight = $("#wrapper").height();
	var count = (windowHeight-wrapperHeight)/2;
	if (count > 0) {$("#wrapper").css("paddingTop", count+"px");}
});

//EXTERNAL LINKS, FANCYBOX & IE8 ERROR MESSAGE CLOSING
$(document).ready(function()
{
	$('a[rel*=external]').live('click', function() {
 		window.open(this.href);
    return false;
	});
	
	$("a.group").fancybox(
	{
		'overlayColor': '#000',
		'overlayOpacity'	:	0.8,
		'titleShow': true,
		'titlePosition': 'over',
		'padding': 0,
		'onClosed'		: function() { $("#fancybox-outer").css("background", "#fff"); }
	});

	$("a.contact").click(function() { $("#fancybox-outer").css("background", "transparent") });
	$("a.contact").fancybox(
	{
		'overlayColor': '#000',
		'overlayOpacity'	:	0.8,
		'padding': 0,
		'scrolling'		: 'no',
		'titleShow'		: false,
		'onClosed'		: function() { $("#fancybox-outer").css("background", "#fff"); }
	});

	$('#ie8-error a.close').click(function() { $('#ie8-error').hide("fast"); });	

}); 


//JFLICKR FEED, RANDOM LIs & FANCYBOX
$(document).ready(function()
{
	$('.polaroids').jflickrfeed(
	{
		limit: 16,
		qstrings: 
		{
			nsid: '36107738@N00',
			set: '72157623003006842', //my favorites
			/* id: '36107738@N00',  */
			/* tags: 'paris', */
		},
		itemTemplate: '<li><a class="group" rel="flickr_group" href="{{image_b}}"><img src="{{image_m}}" alt="{{tags}}" title="{{title}}"/></a><span><a rel="external" class="flickr" href="{{link}}">{{title}}</a></span></li>'
	}, function(data) 
	{
		//randomize
	  var grp = $(".polaroids").children();
	  var cnt = grp.length;
	  
	  var temp,x;
	  for (var i = 0; i < cnt; i++) 
	  {
	  	temp = grp[i];
	    x = Math.floor(Math.random() * cnt);
	    grp[i] = grp[x];
	    grp[x] = temp;
	 	}
	 	$(grp).remove();
	 	$(".polaroids").append($(grp));
	 	
	 	//fancybox with captions
	 	$(".polaroids li a.group").fancybox(
	 	{
	 		'overlayColor': '#000',
			'overlayOpacity'	:	0.8,
			'titleShow': true,
			'titlePosition': 'over',
			'titleFormat' : function(title, currentArray, currentIndex, currentOpts ) 
			{
				return '<span id="fancybox-title-over">'+ fancybox_image + ' ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
			}
		});
	});	
});
