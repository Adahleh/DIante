<?php

session_start();

include("../includes/config.php");


$U_ID = $_SESSION['U_Log'];


if (!$_SESSION['U_Log'])
    echo '<script language="JavaScript">
 document.location="../User_Signin.php";
</script>';



$D_Longitude = $_GET['D_Longitude'];
$D_Latitude = $_GET['D_Latitude'];


?>


<!DOCTYPE html>
<html>

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../img/logo.png"/>

    <title>Diante | Users Area</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">


    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../css/plugins/dataTables/datatables.min.css" rel="stylesheet">


    <!-- Toastr style -->
    <link href="../css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="../js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">


    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }


        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>


    <style>
        @font-face {
            font-family: myFirstFont;
            src: url(fonts/NotoKufiArabic-Regular.ttf);
            font-size: 8px;
        }

        body {
            font-family: myFirstFont;
        }


        #map {
            height: 300px;
            width: 100%;
        }


    </style>

    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOorkShHO1xhw2zbjz-OZdSKP-xQ65AS0&callback=initMap"></script>
    <script>
        function showPosition() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showMap, showError);
            } else {
                alert("Sorry, your browser does not support HTML5 geolocation.");
            }
        }

        // Define callback function for successful attempt
        function showMap(position) {
            // Get location data
            lat = position.coords.latitude;
            long = position.coords.longitude;
            var latlong = new google.maps.LatLng(lat, long);

            var myOptions = {
                center: latlong,
                zoom: 16,
                mapTypeControl: true,
                navigationControlOptions: {
                    style: google.maps.NavigationControlStyle.SMALL
                }
            }

            var map = new google.maps.Map(document.getElementById("embedMap"), myOptions);
            var marker = new google.maps.Marker({position: latlong, map: map, title: "You are here!"});
        }

        // Define callback function for failed attempt
        function showError(error) {
            if (error.code == 1) {
                result.innerHTML = "You've decided not to share your position, but it's OK. We won't ask you again.";
            } else if (error.code == 2) {
                result.innerHTML = "The network is down or the positioning service can't be reached.";
            } else if (error.code == 3) {
                result.innerHTML = "The attempt timed out before it could get the location data.";
            } else {
                result.innerHTML = "Geolocation failed due to unknown error.";
            }
        }
    </script>


</head>

<body onload="getLocation()" onload="showPosition();" class="canvas-menu"
      style="style background-image: url('../img/bg.png'); background-size: 100% 100%; background-repeat: no-repeat;">


<script>
    var x = document.getElementById("demo");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {


        document.getElementById('long').value = position.coords.longitude;
        document.getElementById('lat').value = position.coords.latitude


    }
</script>


<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation"


         style="background-color:#0f76ba;



			border: 2px solid #0f76ba;
  padding: 10px;
  border-top-right-radius: 35px;
  border-bottom-right-radius: 35px;





			"


    >
        <div class="sidebar-collapse" style="background-color:#0f76ba" class="animated" id="animation_box">

            <a class="close-canvas-menu"><i class="fa fa-times btn btn-primary btn-sm"></i></a>


            <ul class="nav metismenu" id="side-menu" style="background-color:#0f76ba">
                <li class="nav-header"
                    style="background-image: url('../img/logo123.png'); background-size: 50% 50%; background-repeat: no-repeat; border-radius: 20px;">
                    <div>
                        <center><img src="../img/logo.png" style="" width="75%"/></center>


                    </div>

                </li>

                <li class="">
                    <br>
                </li>


                <li class="">
                    <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span></a>

                </li>


                <li class="">
                    <a href="My_Account.php" title="My Account"><i class="fa fa-user"></i> <span class="nav-label">My Account</span></a>
                </li>


                <li class="">
                    <a href="Logout.php" title=""><i class="fa fa-lock"></i> <span class="nav-label">Logout</span></a>
                </li>


            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i>
                    </a>

                </div>
                <ul class="nav navbar-top-links navbar-right">

                    <li class="dropdown">

                        <ul class="dropdown-menu dropdown-messages">


                            <li class="divider"></li>


                        </ul>
                    </li>


                    <li>
                        <a style="color:#fff" href="">
                            Diante
                        </a>
                    </li>

                </ul>

            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12"
                 style="background-image: url('img/bg11.png'); background-size: 100% 100%; background-repeat: no-repeat; !important">
                <div class="wrapper wrapper-content">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Track Your Driver</h5>

                                </div>


                                <select id="mode" style="visibility:hidden">
                                    <option value="DRIVING">Driving</option>
                                    <option value="WALKING">Walking</option>
                                </select>
                            </div>



                            <div id="map"></div>


                            <script>


                                // Initialize and add the map
                                function initMap() {
                                    // The location of Uluru
                                    var uluru = {lat: <?php echo $D_Latitude; ?>, lng: <?php echo $D_Longitude; ?>};
                                    // The map, centered at Uluru
                                    var map = new google.maps.Map(
                                        document.getElementById('map'), {
                                            zoom: 16, center: uluru, mapTypeId: 'satellite'
                                        });

                                    // The marker, positioned at Uluru
                                    var image = 'icon.png';

                                    var marker = new google.maps.Marker({position: uluru, map: map, icon: image});
                                }

                            </script>


                            <!-- // Data table -->
                        </div>


                    </div>

                </div>


            </div>
        </div>

        <div class="footer" style="background-color:#0f76ba; color:#fff">

            <div>
                <center>Diante © 2020. All Rights Reserved.</center>

            </div>
        </div>
    </div>
</div>

</div>


</div>
</div>


<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOorkShHO1xhw2zbjz-OZdSKP-xQ65AS0&callback=initMap">
</script>

<!-- Mainly scripts -->

<!-- Custom and plugin javascript -->
<script src="../js/jquery-2.1.1.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Flot -->
<script src="../js/plugins/flot/jquery.flot.js"></script>
<script src="../js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="../js/plugins/flot/jquery.flot.spline.js"></script>
<script src="../js/plugins/flot/jquery.flot.resize.js"></script>
<script src="../js/plugins/flot/jquery.flot.pie.js"></script>

<!-- Peity -->
<script src="../js/plugins/peity/jquery.peity.min.js"></script>
<script src="../js/demo/peity-demo.js"></script>

<!-- Custom and plugin javascript -->
<script src="../js/inspinia.js"></script>
<script src="../js/plugins/pace/pace.min.js"></script>

<!-- jQuery UI -->
<script src="../js/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- GITTER -->
<script src="../js/plugins/gritter/jquery.gritter.min.js"></script>

<!-- Sparkline -->
<script src="../js/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- Sparkline demo data  -->
<script src="../js/demo/sparkline-demo.js"></script>

<!-- ChartJS-->
<script src="../js/plugins/chartJs/Chart.min.js"></script>

<!-- Toastr -->
<script src="../js/plugins/toastr/toastr.min.js"></script>


<script src="../js/plugins/jeditable/jquery.jeditable.js"></script>

<script src="../js/plugins/dataTables/datatables.min.js"></script>
<!-- Page-Level Scripts -->


</body>
</html>
