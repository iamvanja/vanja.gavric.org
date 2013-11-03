$(document).ready(function()
{	
	var klik_kontrola=0;
/********* OTVARANJE *********/
	$.fn.otvori = function(content) {

		$(this).click(function() 
		{ 
			klik_kontrola++;
			//alert("klik_kontrola++ je "+klik_kontrola);
			
			switch (content)
			{
				case "writer":
					$("#writer-box").zatvoriC('developer', 'photographer');
					$("#writer-box").animate(
					{
						marginTop: "0px"
					}, 400);
					document.title = vg + " " + novinar;
					break;
				case "developer":
					$("#developer-box").zatvoriC('writer', 'photographer');
					$("#writer-box").animate(
					{
						marginTop: "-120px"
					}, 500);
					document.title = vg + " " + programer;
					break;
				case "photographer":
					$("#photographer-box").zatvoriC('writer', 'developer');
					$("#writer-box").animate(
					{
						marginTop: "-240px"
					}, 600);
					document.title = vg + " " + fotograf;
					break;
			}			

			
			$("#"+content+"-box").addClass("selected");
			$("#"+content+"-box a").addClass("sele");

			if (klik_kontrola==1)
			{

				//alert("Usao u otvaranje! klik_kontrola=1");
				$("#wrapper").animate(
				{
					width: "920px"
				}, 200);
				
				$("#right").animate(
				{
					width: "360px"
				}, 300);				
				$("#"+content).animate(
				{
					width: "360px",
				}, 300);
				
		
		  }; /* kraj klik-kontrola */
		}); /* kraj click */
	}; /* kraj otvori */
	
	$.fn.zatvori = function(content) {

		$(this).click(function() 
		{ 
				//$("#left").css("marginTop", "0");
				//$("#"+content).css("overflow","hidden");
				$("#"+content).animate(
				{
					width: "0px"
				}, 200);
				
				$("#right").animate(
				{
					width: "0px"
				}, 300);
				
				$("#wrapper").animate(
				{
					width: "571px"
				}, 500);
				
				$("#"+content+"-box").removeClass("selected");
				$("#"+content+"-box a").removeClass("sele");

				$("#writer-box").animate(
				{
					marginTop: "125px"
				}, 400);
				
				document.title = title;
				
				klik_kontrola=0;
				//alert ("0?zatvori "+klik_kontrola);
		
		}); /* kraj click */
	}; /* kraj zatvori */
	
	
	
		$.fn.zatvoriC = function(content1, content2) {

				$("#"+content1).css("width", "0px");
				$("#"+content2).css("width", "0px"); 
				klik_kontrola=1; 
				$("#"+content1+"-box").removeClass("selected");
				$("#"+content2+"-box").removeClass("selected");
				$("#"+content1+"-box a").removeClass("sele");
				$("#"+content2+"-box a").removeClass("sele");
								
				//alert ("0?zatvoriC "+klik_kontrola);
	}; /* kraj zatvoriC */
	
	
			$("#slide-down").toggle(function t(){
			   	$("#lang").animate
  				(
  				{top: "-21px"}, 400
  				);
  				$("#strel").css("-webkit-transform", "rotate(180deg)" );
  				$("#strel").css("-moz-transform", "rotate(180deg)");
  				$("#strel").css("transform", "rotate(180deg)");
			},function(){
			   $("#lang").animate
  				(
  				{top: "-41px"}, 400
  				);
  				$("#strel").css("-webkit-transform", "rotate(0deg)" );
  				$("#strel").css("-moz-transform", "rotate(0deg)");
  				$("#strel").css("transform", "rotate(0deg)");
    
			});

});



