var googleMapsInit = function() {
	this.$el = document.getElementById( 'gmap' );

	this.lat = 39.779722;
	this.lng = -86.148319;
	this.mapCenter = new google.maps.LatLng( this.lat, this.lng );

	this.mapOptions = {
		zoom: 13
		, center: this.mapCenter
		, mapTypeId: google.maps.MapTypeId.ROADMAP
	};

	this.map = new google.maps.Map( this.$el, this.mapOptions );

	this.marker = new google.maps.Marker({
		position: this.mapCenter
		, map: this.map
	});
	return this;
};

$(function() {
	var gmap = googleMapsInit();
});