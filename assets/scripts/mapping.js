(function($) {

    $(document).ready(function () {
        createMainMap();
        createAboutMap();

        function createMainMap() {
            var layer = new L.StamenTileLayer("terrain-background");
            var map = new L.Map("map", {
                center: new L.LatLng(40.75,-102),
                zoom: 5,
                scrollWheelZoom: false,
                attributionControl: null
            });
            map.addLayer(layer);

            $.getJSON('wp-content/themes/pbt/assets/data/platte-basin-outline.json', function(data) {
                var platte_basin_outline = L.geoJson(data, {
                    style: function(feature) {

                        var styles = {
                            fillOpacity: .3,
                            weight: 1,
                            color: 'white'
                        }

                        return styles;
                    }

                }).addTo(map);

            });

            $.getJSON("https://spreadsheets.google.com/feeds/list/1XZx5wnIEaFy7sJ85KI4cJOPrgx4o87ZilsDxp9VNfhs/od6/public/values?alt=json",
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

            });

            function createTLMarker(longtermTLLocation, map) {

                // Content for InfoBox
                var iFrameContentForInfoBox =
                    '<iframe class="timelapse-video" src="http://player.vimeo.com/video/' +
                    longtermTLLocation.vimeoURL +
                    '"frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';

                var marker = L.marker([longtermTLLocation.lat, longtermTLLocation.long]).addTo(map);

                var popupContent = '<h6 class="text-center">' + longtermTLLocation.location + '</h6>' +
                    '<div class="timelapse-wrapper">' + iFrameContentForInfoBox + '</div>' +
                    '<p>' + longtermTLLocation.description + '</p>';

                marker.bindPopup(popupContent);
            }
        }

        var platte_basin_outline;

        function createAboutMap() {
            var map = new L.Map("map-small", {
                center: new L.LatLng(40.75,-102),
                zoom: 6,
                scrollWheelZoom: false,
                zoomControl:false,
                attributionControl: null

            });

            $.getJSON('wp-content/themes/pbt/assets/data/states.json', function(data) {
                var states = L.geoJson(data, {
                    style: function(feature) {

                        var styles = {
                            fillOpacity: 0,
                            weight: 1,
                            color: 'lightgray'
                        }

                        return styles;
                    }

                }).addTo(map);

            });

            $.getJSON('wp-content/themes/pbt/assets/data/platte-basins.json', function(data) {
                platte_basin_outline = L.geoJson(data, {
                    style: function(feature) {

                        var styles = {
                            fillOpacity: 1,
                            fillColor: 'lightgray',
                            weight: 2,
                            color: 'white'
                        }

                        return styles;
                    },
                    onEachFeature: function(feature, layer) {
                        bindLabel(feature, layer);
                        bindLayerEvents(layer);
                    }

                }).addTo(map);

            });

            // platte_basin_outline.bringToFront();

        }

        function bindLabel(feature, layer) {

            var popup_content = '<h4>' + feature.properties.NAME + '</h4><a href="' + feature.properties.URL + '" class="btn btn-primary btn-ghost btn-sm btn-block btn-max-width" role="button"><h6>Read Stories</h6></a>';

            layer.bindPopup( popup_content );
        }

        function bindLayerEvents(layer) {
            layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight
            });
        }

        function highlightFeature(e) {
            var layer = e.target;

            layer.setStyle({
                fillColor: '#6aaac3',
                fillOpacity: 1
            });

            if (!L.Browser.ie && !L.Browser.opera) { layer.bringToFront(); }
        }

        function resetHighlight(e) { platte_basin_outline.resetStyle(e.target);}

    });

})(jQuery);



