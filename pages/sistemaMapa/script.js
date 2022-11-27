var map;

function initMap() {
    var mapOptions = {
        center: {lat: -3.716816, lng: -38.519115},
        zoom: 6,
    };

    map = new google.maps.Map(document.getElementById('map'), mapOptions);

};