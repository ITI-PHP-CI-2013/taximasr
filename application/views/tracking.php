<script src="src/prettify/prettify.js" onload="prettyPrint();" defer></script>
<script src="js/utils.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src=<?php echo base_url('js/jquery.js'); ?>></script>
<script type="text/javascript">
    if(window.location.href !="<?php echo base_url('users/start_track'); ?>" ){
        window.location.href = "<?php echo base_url('users/start_track'); ?>";
    }
</script>
<span class="slide device-access" id="geolocation">
    <style>
        #see-position {
            margin-bottom: 10px;
        }
        #geo-map {
            height: 280px;
            width: 640px;
        }
        #geo-log {
            background-color: red;
            color: white;
            padding: 5px;
            border-radius: 5px;
            visibility: hidden;
        }
    </style>
    <header><span class="js"></span> <h1 style="color:#FFD700;">موقعك الان</h1></header>
    <section>
        <span id="geo-log"></span>
        <div id="geo-map" class="gmap example">
            <img src="http://maps.google.com/maps/api/staticmap?center=37.4419,-94.1419&zoom=3&size=680x278&sensor=true"/>
            <form>
                <input id='ajax' type='hidden' value="<?php echo base_url('users/test_track2'); ?>">
            </form>
        </div>
        <script defer>
            var flag=0;
            var Lat=0;
            var Long=0;
            (function() {


                var map = null;
                var geolog = document.querySelector('#geo-log');
                var geoMap = document.querySelector('#geo-map');
                var flightPlanCoordinates = new Array();
                function showPosition(position) {

                    geolog.textContent = "You're within " + position.coords.accuracy +
                        " meters of (" + position.coords.latitude + ", " +
                        position.coords.longitude + ")";
                    Lat=position.coords.latitude;
                    Long=position.coords.longitude;
                    var latLng = new google.maps.LatLng(
                    position.coords.latitude, position.coords.longitude);
                    flightPlanCoordinates.push(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));

                    var flightPath = new google.maps.Polyline({
                        path: flightPlanCoordinates,
                        strokeColor: "#FF0000",
                        strokeOpacity: 1.0,
                        strokeWeight: 2
                    });
                    flightPath.setMap(map);
                    var marker = new google.maps.Marker({
                        position: latLng,
                        map: map
                    });
                    map.setCenter(latLng);
                    flag=1;



                }
                function handlePositionError(evt) {
                    //geolog.textContent = evt.message;
                    geolog.textContent = evt.message;
                }
                function successPositionHandler() {
                    // Load map if it doesn't already exist and when user clicks the button.
                    if (!map) {
                        map = new google.maps.Map(geoMap, {
                            zoom: 3,
                            center: new google.maps.LatLng(37.4419, -94.1419), // United States
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        });
                        map.getDiv().style.border = '1px solid #ccc';
                    }
                    if (navigator.geolocation) {

                        geolog.style.visibility = 'visible';
                        geolog.textContent = 'Looking for location...';
                        map.setZoom(15);
                        <!--setInterval(
                        setInterval(function(){

                            navigator.geolocation.getCurrentPosition(showPosition, handlePositionError);
                        },3000);
                        // navigator.geolocation.getCurrentPosition(showPosition, handlePositionError);
                        // Also monitor position as it changes.
                        //navigator.geolocation.watchPosition(showPosition, handlePositionError);
                    } else {
                        geolog.textContent = 'Oops! Your browser does not support geolocation.';
                    }
                }

                var ajax_call = function() {
                    if(flag)
                    {
                        $.ajax({
                            type:"POST",
                            url: "<?php echo base_url('users/test_track3'); ?>",
                            data: "y=" + Lat + "\u0026x=" + Long ,
                            success: function(){

                            }
                        })
                    }
                };
                setInterval(ajax_call,10000);
                $(document).ready(function() {
                    successPositionHandler();
                });
                //document.querySelector('#see-position').addEventListener('click', successPositionHandler, false);
                //geoMap.addEventListener('click', successPositionHandler, false);
            })();
        </script>
    </section>
</span>
<form action="<?php echo base_url('users/stop_track'); ?>" method="post"> 
    <input type='hidden' value='12' name='stop_track_check'>
    <input type="submit" name="stop_track" data-theme="e" data-inline="true" value="انهي التعقب">
</form>