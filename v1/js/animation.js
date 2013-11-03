/*
Some animation magic & hash check
Vanja Gavric 2010
*/


$(document).ready(function()
{
	//OPEN
	$('#center ul li a').click(function()
	{
		var $currentID = $(this).parent().attr("id");
		var $content = $currentID.substring(0, $currentID.length - 4);	
		$(this).parent().addClass('selected').siblings().removeClass('selected');
		
		switch ($currentID)
		{
			case "writer-box":
				$("#writer-box").animate( { marginTop: "0px" }, 400 );
				document.title = vg + " " + novinar;
				break;
			case "developer-box":
				$("#writer-box").animate( { marginTop: "-120px" }, 500 );
				document.title = vg + " " + programer;
				break;
			case "photographer-box":
				$("#writer-box").animate( { marginTop: "-240px" }, 600 );
				document.title = vg + " " + fotograf;
				break;
		}
			
		$("#wrapper").animate( { width: "920px" }, 200 );
		$("#right").animate( { width: "360px" }, 300 );				
		$("#"+$content).siblings().css( "width", 0 );							
		$("#"+$content).css("display", "block");			
		$("#"+$content).animate( { width: "360px" }, 300) ;			

	});
	
	//CLOSE
	$("#right a.close").click(function()
	{
		var $currentContent = $(this).parent().attr("id");
		$("#"+$currentContent).siblings().css("width", 0);
		$("#"+$currentContent).animate( { width: "0px" }, 200 );
		$("#right").animate( { width: "0px" }, 300 );
		$("#wrapper").animate( { width: "561px" }, 500 );
		$("#center ul li").removeClass("selected");
		$("#writer-box").animate( { marginTop: "125px" }, 500 );
		document.title = title;
	});
	
	//ANCHOR OPEN
	//$('a.anchor').remove().prependTo('body');
	var $url = document.location.toString();
	if ($url.match('#')) 
	{ 
		var $myUrl = '#' + $url.split('#')[1];
		
		/*
		if ( $myUrl == '#novinar' ) { $myUrl = '#writer' }
		else if ( $myUrl == '#programer' ) { $myUrl = '#developer'; }
		else if ( $myUrl == '#fotograf' ) { $myUrl = '#photographer'; }
		*/
		
		$("#center ul li" + $myUrl + "-box a").click();
	}

	
	
	//LANG & SOC NETWORKS ANIMATION 
	//(replaced with CSS3 transition awesomeness) (note - :hover)
/*
	$('#lang li').not('.open').hover(function() 
	{
	 	$(this).stop().animate( { marginLeft: 0 }, 200 );
	}, function() 
	{
		$(this).stop().animate( { marginLeft: "55px" }, 200 );
	});

	$('#networks li a img').hover(function() 
	{
	 	$(this).stop().animate( { marginTop: "8px" }, 200 );
	}, function() 
	{
	  $(this).stop().animate( { marginTop: "15px" }, 200 );
	});
*/
	
	//ARTICLES LIST BUBBLE
	$("ul.lista li a").hover(function() 
	{
		$(this).next(".popup").stop(true, true).animate({opacity: "show" , right: "-65" }, "slow");
	}, function() 
	{
		$(this).next(".popup").stop(true, true).animate({opacity: "hide", right: "-75"}, "fast");
	});

	
});


//BACK-FORWARD
// (idea is to handle animations directly through hashChange, without 
// click events (see $('#center ul li a').click() & $("a.close").click() ), 
// but will deal with that when I have more time)

 $(document).ready(function()
{
	$(window).hashchange(function()
	{
		var $myHash = location.hash;
 		//alert($myHash);
    
		if ($myHash=="#index")
		{
			var $currentCont;
			if ($("#center ul li#writer-box").hasClass("selected")) { $currentCont = "writer" }
			else if ($("#center ul li#developer-box").hasClass("selected")) { $currentCont = "developer" }
			else if ($("#center ul li#photographer-box").hasClass("selected")) { $currentCont = "photographer" }
		
			$("#writer-box").animate( { marginTop: "125px" }, 500 );
			$("#"+$currentCont).siblings().css("width", 0);
			$("#"+$currentCont).animate( { width: "0px" }, 200 );
			$("#right").animate( { width: "0px" }, 300 );
			$("#wrapper").animate( { width: "561px" }, 500 );
			$("#center ul li").removeClass("selected");
			document.title = title;
		}
 		else 
 		{   
			/*
			if ( $myHash == '#novinar' ) { $myHash = '#writer' }
			else if ( $myHash == '#programer' ) { $myHash = '#developer'; }
			else if ( $myHash == '#fotograf' ) { $myHash = '#photographer'; }
			*/
			
			$("#center ul li" + $myHash + "-box a").click().parent().addClass("selected");
		}
	});
}); 
