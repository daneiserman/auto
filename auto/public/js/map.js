function initMap() {
    var moscow = {lat: 55.755826, lng: 37.6172999};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: moscow
    });

    var male = '/images/male.png';
    var taxi = '/images/taxi.png';

    if(requests === true) {
        loadJSON(function (response) {
            var requests = JSON.parse(response);
            requests.forEach(function (r) {
                var marker = new google.maps.Marker({
                    position: {lat: r.client_lat, lng: r.client_lng},
                    map: map,
                    icon: male,
                    title: 'Пассажир ' + r.id
                })
            })

        }, '/requests.json');
    }

    if(drivers === true) {
        loadJSON(function (response) {
            var drivers = JSON.parse(response);
            drivers.forEach(function (d) {
                var marker = new google.maps.Marker({
                    position: {lat: d.current_lat, lng: d.current_lng},
                    map: map,
                    icon: taxi,
                    title: 'Водитель ' + d.id
                })
            })

        }, '/drivers.json');
    }

    if(typeof client !== 'undefined') {
        var marker = new google.maps.Marker({
            position: client,
            map: map,
            icon: male,
            title: 'Пассажир'
        })
    }
}

function loadJSON(callback, json) {
    var xobj = new XMLHttpRequest();
    xobj.overrideMimeType("application/json");
    xobj.open('GET', json, true);
    xobj.onreadystatechange = function () {
        if (xobj.readyState == 4 && xobj.status == "200") {
            callback(xobj.responseText);
        }
    };
    xobj.send(null);
}