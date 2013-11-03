jQuery.noConflict();
jQuery(document).ready(function()
{	
	//jQuery('#kontakt_link').fancyZoom();
	//jQuery('div#face a').fancyZoom({scaleImg: false, closeOnClick: false, opacity: 0.2});
	
	//jQuery('a.kontakt').fancyZoom({scaleImg: false, closeOnClick: false, opacity: 0.2});
	
	var klik_kontrola=0;
			

/********* OTVARANJE *********/
	jQuery.fn.otvori = function(strana, content) {

		jQuery(this).click(function() 
		{ 
			
				jQuery("#"+content+"-box").addClass("selected"); //dodajemo klasu selected odabranom boxu
				//if (jQuery("#"+content+"-box").hasClass("selected")) {alert(content+" ima selected!");}
				
				klik_kontrola++;
				//alert(klik_kontrola);
				
				/* skrolamo */
			
				var num;
				if (content=='writer') {num=126}
				else if (content=='programmer') {num=246}
				jQuery("#dummy-box").animate(
				{
					marginTop: "-"+num+"px"
				}, 700);


		//if (jQuery(".2").hasClass("selected")) {/* jQuery(this).zatvori_cont('writer'); */ alert("pro ima");}
			
			//alert(klik_kontrola);

			/* Konacna animacija */		
			if (klik_kontrola==1)
			{
				
				//jQuery("#"+content+" p").css("display", "block");
				jQuery("#wrapper").animate(
				{
					width: "931px"
				}, 400);
				jQuery("#right").animate(
				{
					width: "360px",
					height: "494px"
				}, 400);
				jQuery("#"+content).animate
				({				
					width: "360px"
				 
				}, 1500);
				
				//jQuery("#"+content).css("display", "block");
				//if (jQuery("#"+content+"-box").hasClass("selected")) {alert(content+" ima selected!");}
			}
		});
	};


	
	
	/************ ZATVARANJE *****************/
	jQuery.fn.zatvori = function(strana, content)
	{
		jQuery(this).click(function() 
		{
		
		
			jQuery("#"+content).animate
			({				
				width: "0px"
			}, 400); /* mora biti manje od "#strana"	 */
			
			jQuery("#right").animate(
			{
				width: "0px",
			}, 400);
			
			jQuery("#wrapper").animate(
			{
				width: "561px"
			}, 700);
							jQuery("#dummy-box").animate(
				{
					marginTop: "0px"
				}, 700);

	jQuery("#"+content).css("display", "none");
			
			/* Ubijamo content od opisa */
/*
			jQuery("#"+content+" p").css("display", "none"); 
			alert(this);
			jQuery(this).removeClass("selected");
*/			
			jQuery("#"+content+"-box").removeClass("selected");
			klik_kontrola=0;
		});
	};

	jQuery.fn.zatvori_cont = function(content)
	{	
			/* jQuery(this).click(function()  *//* dodano */
		/* { */
		
		//alert("zatvori_cont "+content);
		jQuery("#"+content).animate(
		{				
			width: "0px"
		}, 200);
						
		//jQuery("#"+content+" p").css("display", "none");	
		jQuery("#"+content+"-box").removeClass("selected");
		klik_kontrola=1;
		/* }); */
	};


			jQuery("#slide-down").toggle(function t(){
			   	jQuery("#lang").animate
  				(
  				{top: 0}, 400
  				);
  				jQuery("#strel").css("-webkit-transform", "rotate(180deg)" );
			},function(){
			   jQuery("#lang").animate
  				(
  				{top: "-41px"}, 400
  				);
  				jQuery("#strel").css("-webkit-transform", "rotate(0deg)" );
			});





//jQuery("#1-o").karu('writer');
	jQuery("#1-o").otvori('right', 'writer');
	jQuery("#1-z").zatvori('right', 'writer');
	
	jQuery("#2-o").otvori('right', 'programmer');
	jQuery("#2-z").zatvori('right', 'programmer');
	
	jQuery("#3-asd").otvori('right', 'photographer');
	jQuery("#3-z").zatvori('right', 'photographer');
	
	jQuery("#4-o").otvori('right', 'more');
	jQuery("#4-z").zatvori('right', 'more');
	
});
