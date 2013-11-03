/*------------------------------------------------------------------
[General JS]

Project:          Zadatak za natječaj Front-End Engineer
Version:          1.0
Author:           Vanja Gavrić
------------------------------------------------------------------*/


$(document).ready(function() { 
	reloadq(5); 
} );

$(window).scroll( function() { reloadq(); } );
$(window).resize( function() { reloadq(); } );

function reloadq(exec_time) {
	if (exec_time) { 
		for (var i=0; i<exec_time; i++) {
  			filename=$(".lazy").attr('rel');
			reloadCSV(filename);
			$(".lazy:first").removeClass("lazy");
		}
	}
	else {
		lazyNo = $('.lazy').length;
		if (lazyNo > 0) {
			var position = $(".lazy").offset().top;
		 	var scllwidth = $(window).scrollTop() + $(window).height();
			if ( scllwidth > position) {
		  		filename=$(".lazy").attr('rel');
		  		reloadCSV(filename);
		  		$(".lazy:first").removeClass("lazy");
		 	}
		}
	}
}


function reloadCSV(filename){
	$.ajax({
		type: 'GET',
		url: 'csv/'+filename+'',
		dataType: "text",
		async:false,
		data: null,
		success: function(text) {
			var fields = text.split(/\n/);
			fields.pop(fields.length-1);
			var headers = fields[0].split(','), html = '<table>';
			html += '<tr>';
			
			for(var j = 0; j < headers.length; j++) {
				html += '<th scope="col">' + headers[j] + '</th>';
			}
			
			html += '</tr>';
			var data = fields.slice(1, fields.length);
			
			for(var k = 0; k < data.length; k++) {
				var dataFields = data[k].split(',');
				html += '<tr>';
				html += '<td>' + dataFields[0] + '</td>';
				html += '<td>' + dataFields[1] + '</td>';
				html += '<td class="price">' + dataFields[2] + '</td>';
				html += '</tr>';
			}

			html += '</table>';

			$('#files div[rel="'+filename+'"] .question .text').empty().append(html).hide().fadeIn("slow");
		}
	});
}