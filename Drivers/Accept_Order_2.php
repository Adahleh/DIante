<?php
session_start();

include("../includes/config.php");


$D_ID = $_SESSION['D_Log'];



if (!$_SESSION['D_Log'])
echo '<script language="JavaScript">
 document.location="../Driver_Signin.php";
</script>';





	$O_ID = $_GET['O_ID'];


	
	$sql1=mysqli_query($dbConn,"update drivers set Driver_Rate_Status='False' where ID='$D_ID'");
	
	$sql2=mysqli_query($dbConn,"update orders set Status='Accepted' where ID='$O_ID'");

	





$sql1 = mysqli_query($dbConn,"select * from orders where ID='$O_ID'");

$row11 = mysqli_fetch_array($sql1);




$End_Longitude = $row11['End_Longitude'];
$End_Latitude = $row11['End_Latitude'];


$End_Longitude_2 = $row11['End_Longitude_2'];
$End_Latitude_2 = $row11['End_Latitude_2'];






  header("refresh: 30;");


	
	
$query = @unserialize (file_get_contents('http://ip-api.com/php/'));
if ($query && $query['status'] == 'success') {



$lon = $query['lon'];
$lat = $query['lat'];

	$sql1=mysqli_query($dbConn,"update drivers set Longitude='$lon', Latitude='$lat' where ID='$D_ID'");


}








	

	 if(isset($_POST['Submit']))
{
	

$O_ID = $_POST['O_ID'];
$D_ID = $_POST['D_ID'];
$Distance = $_POST['Distance'];


$long=$_POST['long'];
$lat=$_POST['lat'];

	$sql1=mysqli_query($dbConn,"update drivers set Longitude='$long', Latitude='$lat' where ID='$D_ID'");



$End_Time = date("H:i:s");










$sql1234 = mysqli_query($dbConn,"select * from orders where ID='$O_ID'");
	$row1234 = mysqli_fetch_array($sql1234);
$Start_Time = $row1234['Start_Time'];
$Total_Price = $row1234['Total_Price'];
$U_ID = $row1234['User_ID'];







   $array1 = explode(':', $End_Time);
    $array2 = explode(':', $Start_Time);

    $minutes1 = ($array1[0] * 60.0 + $array1[1]);
    $minutes2 = ($array2[0] * 60.0 + $array2[1]);

    $diff = $minutes1 - $minutes2.' Minutes';







$sql1=mysqli_query($dbConn,"update orders set Total_KM_Distance='$Distance', Status='Finish', End_Time='$End_Time', Estimation_Time='$diff' where ID='$O_ID'");

	//$sql1=mysqli_query($dbConn,"update drivers set Driver_Rate_Status='True' where ID='$D_ID'");


echo "<script language='JavaScript'>
			  alert ('Order Has Ended ! Total Cost Is: ".$Total_Price." JD');
      </script>";


echo '<script language="JavaScript">
 document.location="Rate_User.php?U_ID='.$U_ID.'&D_ID='.$D_ID.'&O_ID='.$O_ID.'";
</script>';
	

} 
	
	
?>
<!DOCTYPE html>
<html>

<head>   


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        	<link rel="shortcut icon" href="../img/logo.png"/>

    <title>Diante | Drivers Area</title>

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
   font-size:8px;
}
body {
   font-family: myFirstFont;
}




#map {
        height: 300px;
		width: 100%;
      }
	  
	  #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
	  


</style>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOorkShHO1xhw2zbjz-OZdSKP-xQ65AS0&callback=initMap"></script>
<script>
function showPosition() {
    if(navigator.geolocation) {
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
            style:google.maps.NavigationControlStyle.SMALL
        }
    }
    
    var map = new google.maps.Map(document.getElementById("embedMap"), myOptions);
    var marker = new google.maps.Marker({ position:latlong, map:map, title:"You are here!" });
}
 
// Define callback function for failed attempt
function showError(error) {
    if(error.code == 1) {
        result.innerHTML = "You've decided not to share your position, but it's OK. We won't ask you again.";
    } else if(error.code == 2) {
        result.innerHTML = "The network is down or the positioning service can't be reached.";
    } else if(error.code == 3) {
        result.innerHTML = "The attempt timed out before it could get the location data.";
    } else {
        result.innerHTML = "Geolocation failed due to unknown error.";
    }
}
</script>


</head>

  <body onload="getLocation()" onload="showPosition();" class="canvas-menu" style="style background-image: url('../img/bg.png'); background-size: 100% 100%; background-repeat: no-repeat;">
   

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




 <div id="wrapper" >
        <nav class="navbar-default navbar-static-side" role="navigation" 
		
		
		style="background-color:#0f76ba;
			
			
			
			border: 2px solid #0f76ba;
  padding: 10px;
  border-top-right-radius: 35px;
  border-bottom-right-radius: 35px;
			
			
			
			
			
			"
		
		
		
		
		>
            <div class="sidebar-collapse" style="background-color:#0f76ba"  class="animated" id="animation_box">
			           
					   <a class="close-canvas-menu"><i class="fa fa-times btn btn-primary btn-sm"></i></a>
				
				
				
                 <ul class="nav metismenu" id="side-menu" style="background-color:#0f76ba"  >
                <li class="nav-header" style="background-image: url('../img/logo123.png'); background-size: 50% 50%; background-repeat: no-repeat; border-radius: 20px;">
                        <div >
                            <center><img src="../img/logo.png" style="" width="75%"/></center>
                            
                           
                        </div>
                      
                    </li>
					
					 <li class="">
                       <br>
                    </li>
					
					
                    <li class="active">
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
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            
        </div>
            <ul class="nav navbar-top-links navbar-right">
               
                <li class="dropdown">
                    
                    <ul class="dropdown-menu dropdown-messages">
                        
                        
                        <li class="divider"></li>
                        
                        
                    </ul>
                </li>
             


                <li >
                    <a style="color:#fff" href="">
                         Diante
                    </a>
                </li>
                
            </ul>

        </nav>
        </div>
            
        <div class="row">
            <div class="col-lg-12" style="background-image: url('img/bg11.png'); background-size: 100% 100%; background-repeat: no-repeat; !important">
                <div class="wrapper wrapper-content">
                        <div class="row">
                       
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title">
                                        <h5>Welcome To Diante</h5>
                                       
                                    </div>
                                









 <form method="post" action="Accept_Order_2.php?O_ID=<?php echo $O_ID; ?>" class="form-horizontal" enctype="multipart/form-data">
                                
							 <INPUT TYPE="hidden" NAME="O_ID" VALUE="<?php echo $O_ID; ?>">
							 <INPUT TYPE="hidden" NAME="D_ID" VALUE="<?php echo $D_ID; ?>">
	 
	 		
								
						      
							 <INPUT TYPE="hidden" NAME="long" ID="long" VALUE="">
     <INPUT TYPE="hidden" NAME="lat" ID="lat" VALUE="">
	 		
								
								
								
						                           
                                
                               <br>
                                
                                
                               <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
							<center>		<button class="btn btn-danger" type="submit" name="Submit">Finish Order</button>


							</center>
                                    </div>
                                </div>








    
    <select id="mode" style="visibility:hidden">
      <option value="DRIVING">Driving</option>
      <option value="WALKING">Walking</option>
    </select>
    </div>
    <div id="map"></div>
		<?php




$End_Latitude=$row11['End_Latitude'];
$End_Longitude=$row11['End_Longitude'];
$End_Latitude_2=$row11['End_Latitude_2'];
$End_Longitude_2=$row11['End_Longitude_2'];



?>
    <script>
      function initMap() {
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: {lat: 32.015638, lng: 35.870362},
		  		    mapTypeId: 'satellite'

        });
		
		
		
		
        directionsDisplay.setMap(map);

        calculateAndDisplayRoute(directionsService, directionsDisplay);
        document.getElementById('mode').addEventListener('change', function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        });
      }
	  
	  
	  
	  
	 
			
		
			

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var selectedMode = document.getElementById('mode').value;
        directionsService.route({
          origin: {lat: <?php echo $End_Latitude; ?>, lng: <?php echo $End_Longitude; ?>}, 
          destination: {lat: <?php echo $End_Latitude_2; ?>, lng: <?php echo $End_Longitude_2; ?>},
          // Note that Javascript allows us to access the constant
          // using square brackets and a string value as its
          // "property."
          travelMode: google.maps.TravelMode[selectedMode]
        }, function(response, status) {
          if (status == 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOorkShHO1xhw2zbjz-OZdSKP-xQ65AS0&callback=initMap">
    </script>
			
			
            <!-- // Data table -->
          </div>
	
	
	
	

	<?php




$Start_Longitude=$row11['Start_Latitude'];
$Start_Latitude=$row11['Start_Longitude'];
$End_Latitude=$row11['End_Latitude'];
$End_Longitude=$row11['End_Longitude'];




  $unit = 'K';											
  $theta = $Start_Longitude - $End_Longitude;
  $dist = sin(deg2rad($Start_Latitude)) * sin(deg2rad($End_Latitude)) +  cos(deg2rad($Start_Latitude)) * cos(deg2rad($End_Latitude)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $distance = ceil($miles * 1.609344);	
  
  
  
  
  
  
  





	?>
      
    
	
	  
      <input type="hidden" name="Distance" value="<?php echo $distance; ?>"/>

	                              </form>

	
	
	
	
	
	
	
	
  
  
  
  
	
	
	
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
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                   
 
 /*                   {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }    */
                   
                ]

            });

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>
	
	
</body>
</html>
