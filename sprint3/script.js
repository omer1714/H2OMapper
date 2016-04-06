window.alert('Javascript');

function initMap() {
	var mapDiv = document.getElementById('map');
	var map = new google.maps.Map(mapDiv, {
	  center: {lat: 49.8879967, lng: -119.4399066},
	  zoom: 13
	});
}

