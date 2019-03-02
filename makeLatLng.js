	//bỏ data tập S vào [] dưới đây.
	var dataNew = [];


	for(var i = 0 ; i < dataNew.length ; i++){
	          


	    $.get('https://maps.googleapis.com/maps/api/geocode/json?&address='+dataNew[i].contentdata+'&key=AIzaSyAmp0BXpbpC-iPPrEaYxTskw3rKkHKjlZM',function(data){

	          // document.write(data.results[0].geometry.location.lat);
	          // document.write("<br>");

	          // document.write(data.results[0].geometry.location.lng);
	          // document.write("<br>");
	      },'json');
	  
}

