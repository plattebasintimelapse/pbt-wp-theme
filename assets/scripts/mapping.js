jQuery(document).ready(function () {
	var layer = new L.StamenTileLayer("terrain-background");
    var map = new L.Map("map", {
        center: new L.LatLng(40.75,-102),
        zoom: 5,
        scrollWheelZoom: false
    });
    map.addLayer(layer);

    jQuery.getJSON("https://spreadsheets.google.com/feeds/list/1XZx5wnIEaFy7sJ85KI4cJOPrgx4o87ZilsDxp9VNfhs/od6/public/values?alt=json",
        function(data) {
        for (var i = 0; i < data.feed.entry.length; i++) {
            var tempLocation = {
                location: data.feed.entry[i]['gsx$title']['$t'],
                description: data.feed.entry[i]['gsx$description']['$t'],
                lat: Number(data.feed.entry[i]['gsx$lat']['$t']),
                long: Number(data.feed.entry[i]['gsx$long']['$t']),
                sub_basin: data.feed.entry[i]['gsx$basin']['$t'],
                vimeoURL: data.feed.entry[i]['gsx$vimeoid']['$t'],
                phocalstreamID: data.feed.entry[i]['gsx$phocalstreamid']['$t'],
                themes: data.feed.entry[i]['gsx$themes']['$t']
            };

            createTLMarker(tempLocation,map);
        }

    }).done(function() {
        // loadedCheck(count, $loadingPrompt, 'Timelapses');
    }).fail(function() {
        // loadingError(count, $loadingPrompt, 'Timelapses');
    });

    function createTLMarker(longtermTLLocation, map) {

	    // Content for InfoBox
	    var iFrameContentForInfoBox =
	        '<iframe class="timelapse-video" src="http://player.vimeo.com/video/' +
	        longtermTLLocation.vimeoURL +
	        '"frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
	    var phocalstreamAccessTag = 'EXPLORE ALL IMAGES';
	    var phocalstreamBaseURL = 'http://images.plattebasintimelapse.com/photo/cameracollection?siteId=';

	    var marker = L.marker([longtermTLLocation.lat, longtermTLLocation.long]).addTo(map);

	    var popupContent = '<h6 class="text-center">' + longtermTLLocation.location + '</h6>' +
            '<div class="timelapse-wrapper">' + iFrameContentForInfoBox + '</div>' +
            '<p>' + longtermTLLocation.description + '</p>';

	    marker.bindPopup(popupContent);
	}

});