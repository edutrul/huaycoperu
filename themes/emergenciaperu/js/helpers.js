function myMap() {
	var mapProp= {
		center:new google.maps.LatLng(5.3375265,-80.9551981),
		zoom:4,
	};
	var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
	var map2=new google.maps.Map(document.getElementById("googleMap2"),mapProp);
	var map3=new google.maps.Map(document.getElementById("googleMap3"),mapProp);
}