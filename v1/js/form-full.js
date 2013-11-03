$(window).ready(function()
{
  $('.error').hide();

  $(".button").click(function() 
  {
    $('.error').hide();
		
	var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
		
	var urlFilter = /^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/;

		
	var name = $("input#name").val();
	if (name == "") 
	{
      $("label#name_error1").show();
      $("input#name").focus();
      return false;
    } else if (name.length < 3)
    {
      $("label#name_error2").show();
      $("input#name").focus();
      return false;
    }
    
    
    
	var email = $("input#email").val();
	if (email == "") 
	{
      $("label#email_error1").show();
      $("input#email").focus();
      return false;
    } else if (!(filter.test(email))) 
    {
      $("label#email_error2").show();
      $("input#email").focus();
      return false;
    }
    
    var url = $("input#url").val();
    if (url == "") {}
    else if (!(urlFilter.test(url))) 
    {
      $("label#url_error").show();
      $("input#url").focus();
      return false;
    }
    
    var comment = $("textarea#comment").val();
	if (comment == "") 
	{
      $("label#textarea_error1").show();
      $("textarea#comment").focus();
      return false;
    } else if (comment.length < 10)
    {
      $("label#textarea_error2").show();
      $("textarea#comment").focus();
      return false;
    }
		
		
	var dataString = 'name='+ name + '&email=' + email + '&url=' + url + '&comment=' + comment;
	//alert (dataString);return false;
		
	$.ajax(
	{
	  	type: "POST",
	  	url: "bin/process.php",
	  	data: dataString,
	  	success: function() 
	  	{
		  $('#contact_form').html("<div id='message'></div>");
		  $('#message').html("<h2>+"form_h1+"</h2>")
		  .append("<p>"+form_p+"</p>")
		  .append("<img id='checkmark' src='images/check.png' />")
		  .hide()
		  .fadeIn(1500, function() { });
	   	}
 	});
 return false;
 });
});
