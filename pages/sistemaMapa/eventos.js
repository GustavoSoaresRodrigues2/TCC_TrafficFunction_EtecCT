var map;

function initMap() {
    var mapOptions = {
        center: {lat: -3.716816, lng: -38.519115},
        zoom: 6,
    };

    map = new google.maps.Map(document.getElementById('map'), mapOptions);

    var marker = new google.maps.Marker ({
        position: {lat: -3.716816, lng: -38.519115},
        map: map,
        title: 'Buraco na calçada',
        icon: 'buraco.png'
    });

    // Quando clicar, X e Y no console.log
    map.addListener('click', function (clicou) {
        console.log(clicou.eb.x),
        console.log(clicou.eb.y);
        
        var clickPositionLAT = clicou.latLng
        var marker = new google.maps.Marker ({
            position: clickPositionLAT,
            map: map,
            title: 'Buraco na calçada',
            icon: 'buraco.png'
        });
    });
}