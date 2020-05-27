// Create the script tag, set the appropriate attributes
var script = document.createElement('script');
script.src = 'https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyAv1kwF8TdBfvvxipHEAl1zW8sAd3876iw&callback=initMap';
script.defer = true;
script.async = true;



var map;

// Attach your callback function to the `window` object
function initMap() {
    // document.getElementById("map").addEventListener("click", mapview);
    var infoWindow = new google.maps.InfoWindow();
    var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: +position.coords.latitude,
                lng: +position.coords.longitude
            };

            map = new google.maps.Map(document.getElementById('map'), {
                center: pos,
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            console.log(pos);
            var marker = new google.maps.Marker({
                position: pos,
                map: map,
                title: 'My Location'
            });
            marker.setMap(map);

            var markers = locations.map(function(location, i) {
                return new google.maps.Marker({
                    position: location,
                    label: labels[i % labels.length],
                });
            });


            var markerCluster = new MarkerClusterer(map, markers, { imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m' });

            // var markerCluster = new MarkerClusterer(map, markers, clusterStyles);

            map.addListener('zoom_changed', function() {
                window.setTimeout(function() {
                    if (map.getZoom() === 22 && markerCluster.clusters_[0].markers_.length >= 5) {

                        console.log("Social Distancing not followed.");
                        infoWindow.setPosition(map.getCenter());
                        infoWindow.setContent('Social Distancing not followed.');
                        infoWindow.open(map);
                        //map.setCenter(pos);

                    }
                    console.log(map.getZoom());
                    console.log(markerCluster.clusters_[0].markers_.length);
                }, 1000);
            });

        }, function() {
            handleLocationError(true, map.getCenter());
        }, { timeout: 10000, maximumAge: 0 });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, map.getCenter());
    }



}

function handleLocationError(browserHasGeolocation, pos) {
    alert('Error: The Geolocation service failed. Error: Your browser doesn\'t support geolocation.');
}
document.head.appendChild(script);



var locations = [
    { lat: 26.1437697, lng: 91.5617644 },
    { lat: 26.15195, lng: 91.7671822 },
    { lat: 26.15236, lng: 91.7682792 },
    { lat: 26.15236, lng: 91.7682792 },
    { lat: 26.15236, lng: 91.7682792 },
    { lat: 26.15236, lng: 91.7682792 },
    { lat: 26.15236, lng: 91.7682792 },
    { lat: 26.15236, lng: 91.7682792 },
    { lat: 26.15236, lng: 91.7682792 },
    { lat: 26.15236, lng: 91.7682792 },
    { lat: 26.15236, lng: 91.7682792 },
    { lat: 26.15236, lng: 91.7682792 },
    { lat: 26.1653026, lng: 91.7575289 },
    { lat: 26.170796, lng: 91.767090 },
    { lat: 26.1705957, lng: 91.7662831 },
]

// var clusterStyles = {
//     styles: [{
//             textColor: 'white',
//             height: 50,
//             url: 'm1.png',
//             width: 50
//         },
//         {
//             textColor: 'white',
//             height: 56,
//             url: 'm4.png',
//             width: 56
//         },
//         {
//             textColor: 'white',
//             height: 66,
//             url: 'm3.png',
//             width: 66
//         }
//     ]
// }