function initMap() {
    var dawes = {lat: 43.6998132, lng: -79.2980773};
//        43.6998132,-79.2980773
    var centerLocation = {lat: 43.7003646, lng: -79.3027575};
//        43.7006377,-79.3004014,17.05
    var map = new google.maps.Map(document.getElementById('map'), {
        center: centerLocation,
        zoom: 17,
        scrollwheel: false
    });
    var marker = new google.maps.Marker({
        position: dawes,
        map: map,
        title: 'Dawes Dental'
    });


    //
    displayContactDetails();
}


function displayContactDetails() {
    document.getElementById("map").appendChild(document.getElementById("contact-details-container"));
}