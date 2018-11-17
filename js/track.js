// setting up for getting the data
var hh = document.getElementById('whr');

function settt(){
	var request = new XMLHttpRequest(); 
	request.open('GET','https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=52.457080,-2.052090&destinations=52.453537%2C-2.045567&key=AIzaSyAVqkU8OJTPL_U7FRneTgRDu_uDmeRq7jo');
	request.onload = function(){
		var data = JSON.parse(request.responseText);
		render(data);
	};
	request.send();
}
function createLink(cLat,cLong,sLat,sLong){
	var link = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial"+
		"&origins="+cLat+","+cLat+
		"&destinations="+cLat+"%2C"+sLong+
		"&key=AIzaSyAVqkU8OJTPL_U7FRneTgRDu_uDmeRq7jo";
		settt(link);
}
function render(data){
	var string = "<p> It will take "+
	data.rows[0].elements[1].duration
	+"mins to get from "+data.destination_addresses+" to "+data.origin_addresses+"</p>"; 
	hh.insertAdjacentHTML('beforeend',string);
}