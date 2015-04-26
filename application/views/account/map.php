
    <div id="legends">
        <div id="mapLegend">
            <span>Legends:</span>
            <ul>
                <li style="color:rgba(255, 0, 0, 1)">Theft</li>
                <li style="color:rgba(230, 126, 34, 1)">Overcharging</li>
                <li style="color:rgba(155, 89, 182, 1)">Violation Of Traffic Laws</li>
                <li style="color:rgba(22, 160, 133, 1)">Harassment</li>
                <li style="color:rgba(0, 0, 0, 0.5)">Others</li>
            </ul>
        </div>
    </div>
    <div id="mapContainer"></div>
    <script type="text/javascript" src="<?php echo site_url('assets/js/jquery.js');?>"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/js/map-scripts.js');?>"></script>
    <script type="text/javascript">
    <?php foreach ($results as $row) { ?>
    var color = <?php
        //  echo $row->incident_type;
        switch ($row->incident_type) {
            case 'Theft':
                echo "'rgba(255, 0, 0, 0.8)'";
                break;

            case 'Overcharging':
                echo "'rgba(230, 126, 34, 0.8)'";
                break;

            case 'Violation of Traffic Laws':
                echo "'rgba(155, 89, 182, 0.8)'";
                break;

            case 'Harassment':
                echo "'rgba(22, 160, 133, 0.8)'";
                break;

            default:
                echo "'rgba(0, 0, 0, 0.5)'";
                break;

        }
        echo ";";
        ?>
        var customStyle = {
            fillColor: color,
            strokeColor: "rgba(0,0,0,0)"
        }

        var coords = {lat: <?php echo $row->lat; ?>, lng: <?php echo $row->lon; ?>};
        var circle = new H.map.Circle(coords, 100 * <?php echo $row->count ?>);
        circle.setStyle(customStyle);
        map.addObject(circle);
        circle.addEventListener('tap', function(event){
            console.log('tap');
        });
    <?php } ?>

    $(document).ready(function(){
        $('#searchPlace').keyup(function(event){
            if(event.keyCode == 13){
                var geocodingParams = {
                    searchText: $(this).val()
                };

                //Define callback function to process geocoding response
                var onResult = function(result){
                    var locations = result.Response.View[0].Result, position, marker;
                    // add a marker for each location found
                    for(i = 0; i < locations.length; i++){
                        var xlat = locations[i].Location.DisplayPosition.Latitude, xlng = locations[i].Location.DisplayPosition.Longitude;
                        position = {
                            lat: xlat,
                            lng: xlng
                            };
                        var marker = new H.map.Marker(position);
                        map.addObject(marker);
                        map.setZoom(15);
                        map.setCenter({ lat : xlat, lng : xlng});
                        marker.addEventListener('tap', function(event){
                            $('#info').text("info here");
                        });
                    }
                };

                //Get instance of the geocoding service
                var geocoder = platform.getGeocodingService();

                //Call geocoder, callback if error
                geocoder.geocode(geocodingParams, onResult, function(e){ alert(e); });
            }
        });
    });
    </script>

