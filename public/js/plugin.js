$(document).ready(function () {

    "use strict";

    /***********************************************************************************************/
    /***********************************************************************************************/
    /***********************************************************************************************/
    /** dashboard.blade.php */
    function getTime()
    {
        $.ajax({
            method: "GET",
            url: "/getTime",
            success: function(result){
                $("#time span").text(result);
//                alert(result);
            }
        });
    }
    setInterval(getTime, 1000);


    /***********************************************************************************************/
    /***********************************************************************************************/
    /***********************************************************************************************/
    /** weather.blade.php */
    function getTimeToWeatherPage()
    {
        $.ajax({
            method: "GET",
            url: "/getTimeToWeatherPage",
            success: function(result){
                $("#w-time").text(result);
            }
        });
    }
    setInterval(getTimeToWeatherPage, 1000);
    
    
    /***********************************************************************************************/
    /***********************************************************************************************/
    /* popover */
    $('[data-toggle="tooltip"]').tooltip();

    /***********************************************************************************************/
    /***********************************************************************************************/
    /* weather.blade.php */
    function insert_weather_data()
    {
        $.ajax({
            method: "GET",
            url: '/insert-weather-data',
            success: function (e) {
                // alert("OKK");
            }
        });
    }
    setInterval(insert_weather_data, 10800000);
    // setInterval(insert_weather_data, 10000);



    /***********************************************************************************************/
    /***********************************************************************************************/
    /* sidebar */
    $('#sidebar').stickySidebar({
        topSpacing: 50,
        bottomSpacing: 0,
        // containerSelector: '.container'
    });


    /***********************************************************************************************/
    /***********************************************************************************************/
    /* handle/check_arduino.blade.php */
    function check_arduino()
    {
        $.ajax({
            method: "GET",
            url: "/check_arduino",
            success: function (response) {
                alert(response);
            }
        });
    }
    //setInterval(check_arduino, 2000);


    /***********************************************************************************************/
    /***********************************************************************************************/
    /* empty the arduinos table every day */
    function truncate_arduinos_table() {
        $.ajax({
            method: "GET",
            url: "/trucate_arduinos_table",
            success: function (response) {
                alert(response);
            }
        });
    }
    //setInterval(truncate_arduinos_table, 86400);


    /***********************************************************************************************/
    /***********************************************************************************************/
    /* search for user */
    $("#search-auditing").keyup(function () {
        var searchValue = $("#search-auditing").val();
        $.ajax({
            method: "GET",
            url: "/auditing_search",
            data: {a_d: searchValue},
            success: function (result) {
                // console.log(result);
                var table = $('.audit-table tbody');
                var data = '';

                for(var i = 0; i < result.length; i++)
                {
                    data += "<tr>" +
                        "<td>" + result[i].id + "</td>" +
                        "<td>" + result[i].user_name + "</td>" +
                        "<td>" + result[i].user_email + "</td>" +
                        "<td>" + result[i].type + "</td>" +
                        "<td>" + result[i].action + "</td>" +
                        "<td>" + result[i].created_at + "</td>" +
                        "</tr>";
                }
                table.empty();
                table.append(data);
                console.log(data);
            }
        });
    });

    $("#search-auditing").focus();



    /***********************************************************************************************/
    /***********************************************************************************************/
    /* search for user */
    $("#search").keyup(function () {
        var searchValue = $("#search").val();
        $.ajax({
            method: "GET",
            url: "/user_search",
            data: {user: searchValue},
            success: function (result) {
                // console.log(result);
                var table = $('.user-table tbody');
                var data = '';
                var admin;

                for(var i = 0; i < result.length; i++)
                {
                    data += "<tr>" +
                        "<td>" + result[i].id + "</td>" +
                        "<td>" + result[i].name + "</td>" +
                        "<td>" + result[i].email + "</td>";
                    if(result[i].admin == 0) {
                        admin = "user";
                    }else{
                        admin = "admin";
                    }

                    data += "<td>" + admin + "</td>" +
                        "<td>" + result[i].created_at + "</td>" +
                        "<td>" +
                        "<a href='/users/" + result[i].id + "/edit'" + "><i class='fa fa-edit'></i></a> " +
                        "<a href='/users/" + result[i].id + "/edit'" + "><i class='fa fa-trash color-red'></i></a>" +
                        "</td>" +
                        "</tr>";
                }
                table.empty();
                table.append(data);
                console.log(data);
            }
        });
    });

    $("#search").focus();












    /***********************************************************************************************/
    /***********************************************************************************************/
    /* google map javascript api */
    var map_1;
    var myLatlng_1;

    geoLocationInit();

    function geoLocationInit() {
        if(navigator.geolocation){
            //if the browser is allowed to detect the location, it will execute "success" function => else, it will execute "fail" function
            navigator.geolocation.getCurrentPosition(success, fail);
        }else{
            alert("Browser is not supported");
        }
    }

    function success(position) {
        // console.log(position);
        var latval = position.coords.latitude;
        var lngval = position.coords.longitude;

        // console.log([latval, lngval]);

        myLatlng_1 = new google.maps.LatLng(latval, lngval);

        createMap(myLatlng_1);
        // nearbySearch(myLatlng, "school");
        searchMap(latval, lngval);
    }

    function fail() {
        // alert('fail to progress');
    }

    function createMap(myLatlng_1) {
        map_1 = new google.maps.Map(document.getElementById('map-1'), {
            center: myLatlng_1,
            zoom: 12
        });

        var marker = new google.maps.Marker({
            position: myLatlng_1,
            map: map_1
        });
    }

    function createMarker(latlng, icn, name) {
        var marker = new google.maps.Marker({
            position: latlng,
            map: map_1,
            icon: icn,
            title: name
        });
    }
    
    function searchMap(lat, lng) {
        $.get("/searchMap", {lat: lat, lng: lng}, function (match) {
            // console.log(match);
            $.each(match, function (i, val) {
               var glatval = val.lat;
               var glngval = val.lng;
               var gname = val.name;

               var gLatlng = new google.maps.LatLng(glatval, glngval);
               var gicn = "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png";

               createMarker(gLatlng, gicn, gname);
            });
        });
    }


    /***********************************************************************************************/
    /***********************************************************************************************/
    /* google map javascript api */
    var map;
    var myLatlng;

    geoLocationInit();

    function geoLocationInit() {
        if(navigator.geolocation){
            //if the browser is allowed to detect the location, it will execute "success" function => else, it will execute "fail" function
            navigator.geolocation.getCurrentPosition(success, fail);
        }else{
            alert("Browser is not supported");
        }
    }

    function success(position) {
        console.log(position);
        var latval = position.coords.latitude;
        var lngval = position.coords.longitude;

        console.log([latval, lngval]);

        myLatlng = new google.maps.LatLng(latval, lngval);

        createMap(myLatlng);
        // nearbySearch(myLatlng, "school");
        searchMap(latval, lngval);
    }

    function fail() {
        // alert('fail to progress');
    }

    function createMap(myLatlng) {
        map = new google.maps.Map(document.getElementById('map'), {
            center: myLatlng,
            zoom: 12
        });

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map
        });
    }

    function createMarker(latlng, icn, name) {
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            icon: icn,
            title: name
        });
    }

    function searchMap(lat, lng) {
        $.get("/searchMap", {lat: lat, lng: lng}, function (match) {
            // console.log(match);
            $.each(match, function (i, val) {
                var glatval = val.lat;
                var glngval = val.lng;
                var gname = val.name;

                var gLatlng = new google.maps.LatLng(glatval, glngval);
                var gicn = "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png";

                createMarker(gLatlng, gicn, gname);
            });
        });
    }
});