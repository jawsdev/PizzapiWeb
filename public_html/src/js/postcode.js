//PHP Version - http://ben-major.co.uk/2012/02/using-google-maps-to-lookup-uk-postcodes

$('#submit').click(function () {

    //Get Postcode
    var number = $('#number').val();
    var postcode = $('#postcode').val().toUpperCase();
    ;

    //Get latitude & longitude
    $.getJSON('https://maps.googleapis.com/maps/api/geocode/json?address=' + postcode + '&sensor=false',
        function (data) {
            var lat = data.results[0].geometry.location.lat;
            var lng = data.results[0].geometry.location.lng;

            //Get address
            $.getJSON('https://maps.googleapis.com/maps/api/geocode/json?latlng=' + lat + ',' + lng + '&sensor=false',
                function (data) {
                    var address = data.results[0].address_components;
                    var street = address[1].long_name;
                    var town = address[2].long_name;
                    var county = address[3].long_name;

                    //Insert
                    $('#address').val(number + ', ' + street + ', ' + town + ', ' + county + ', ' + postcode);

                    jQuery('#address').on('input', function () {
                        document.getElementById("address").blur();
                    });
                });
        });
    $(document).ready(function() {
        Materialize.updateTextFields();
    });
});