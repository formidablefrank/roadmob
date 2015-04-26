<html>
<head>
    <title><?php echo $title; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.6/css/jquery.dataTables.css">-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/uikit.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/unsemantic-grid-responsive-tablet.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/hack.css');?>">
    <link rel="stylesheet" media="screen" type="text/css" href="<?php echo base_url('assets/css/datepicker.css');?>">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
    <link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
    <script src="http://js.api.here.com/v3/3.0/mapsjs-core.js" type="text/javascript" charset="utf-8"></script>
    <script src="http://js.api.here.com/v3/3.0/mapsjs-service.js" type="text/javascript" charset="utf-8"></script>
    <script src="http://js.api.here.com/v3/3.0/mapsjs-mapevents.js" type="text/javascript" charset="utf-8"></script>
    <script src="http://js.api.here.com/v3/3.0/mapsjs-ui.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="http://js.api.here.com/v3/3.0/mapsjs-ui.css">

    <script>
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

var placeSearch, autocomplete;


function initialize() {
  // Create the autocomplete object, restricting the search
  // to geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
      { types: ['geocode'] });
  // When the user selects an address from the dropdown,
  // populate the address fields in the form.
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    fillInAddress();
  });
}



// [START region_fillform]
function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();
  var temp = place.geometry.location;

  var lat = temp.k;
  var lon =temp.D;

  $('#lat').val(lat);
  $('#lon').val(lon);

}

// [END region_fillform]

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = new google.maps.LatLng(
          position.coords.latitude, position.coords.longitude);
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
// [END region_geolocation]

    </script>

    <style>
      #locationField, #controls {
        position: relative;
        width: 480px;
      }
      #autocomplete {
        
      }
      .label {
        text-align: right;
        font-weight: bold;
        width: 100px;
        color: #303030;
      }
      #address {
        border: 1px solid #000090;
        background-color: #f0f0ff;
        width: 480px;
        padding-right: 2px;
      }
      #address td {
        font-size: 10pt;
      }
      .field {
        width: 99%;
      }
      .slimField {
        width: 80px;
      }
      .wideField {
        width: 200px;
      }
      #locationField {
        height: 20px;
        margin-bottom: 2px;
      }
    </style>
    <script type="text/javascript">
    $(window).load(function() {
      $(".loader").fadeOut("slow");
    })
    </script>
</head>
<body onload="initialize()">
<div class="loader"></div>