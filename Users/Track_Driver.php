<?php
session_start();

include("../includes/config.php");


$U_ID = $_SESSION['U_Log'];



if (!$_SESSION['U_Log'])
echo '<script language="JavaScript">
 document.location="../User_Signin.php";
</script>';




$Start_Longitude = $_GET['S_Longitude'];
$Start_Latitude = $_GET['S_Latitude'];


$End_Longitude = $_GET['E_Longitude'];
$End_Latitude = $_GET['E_Latitude'];


$D_ID = $_GET['D_ID'];






$sql1234 = mysqli_query($dbConn,"select * from drivers where ID='$D_ID'");
$row1234 = mysqli_fetch_array($sql1234);

$D_Longitude = $row1234['Longitude'];
$D_Latitude = $row1234['Latitude'];


header("refresh: 30;");



  $DS = '';
  $Order_Status = '';



$sql121 = mysqli_query($dbConn,"select * from orders where User_ID='$U_ID' AND (End_Time='' AND Estimation_Time='') AND Status!='Canceled'");
$row121 = mysqli_fetch_array($sql121);
$O_ID = $row121['ID'];
$Order_Status = $row121['Status'];
	$D_ID = $row121['Driver_ID'];
	
	
	
	if ($Order_Status=='Waiting'){
		
		
		
		$Cancel_Button="<a href='Cancel_Order.php?U_ID=".$U_ID."&O_ID=".$O_ID."' class='btn btn-danger btn-sm' role='button'>Cancel Order</a>
		<br>
		<span style='color:red'>If You Cancel The Order An Additional Fees Will Be Added To Your Next Order !</span>
		
		
		";
		
		
	}else{
		
		$Cancel_Button='';

		
	}
	
	
	
	
	
	$sql222 = mysqli_query($dbConn,"select * from orders where User_ID='$U_ID' AND (Status='Finish' AND Driver_Rate_Status='')");
$row222 = mysqli_fetch_array($sql222);
$O_ID_2 = $row222['ID'];
$Order_Status_2 = $row222['Status'];
	$D_ID_2 = $row222['Driver_ID'];


	
	if ($Order_Status=='Finish'){
		
echo '<script language="JavaScript">
 document.location="Rate_Driver.php?U_ID='.$U_ID.'&D_ID='.$D_ID_2.'&O_ID='.$O_ID_2.'";
</script>';		
		
		
		
		
	}
	

  $unit1 = 'K';											
  $theta1 = $Start_Longitude - $D_Longitude;
  $dist1 = sin(deg2rad($Start_Latitude)) * sin(deg2rad($D_Latitude)) +  cos(deg2rad($Start_Latitude)) * cos(deg2rad($D_Latitude)) * cos(deg2rad($theta1));

  $dist1 = acos($dist1);
  $dist1 = rad2deg($dist1);
  $miles1 = $dist1 * 60 * 1.1515;
  $unit1 = strtoupper($unit1);										
  $Distance1 = $miles1 * 1.609344;	
  $Distance1_M = $Distance1 * 1000; 


if ($Distance1_M > 100 && $Order_Status=='Accepted'){
	
	
	
  $DS = 'Driver Is On The Way !';
	
	
	
}elseif (($Distance1_M < 100 && $Distance1_M > 10) && $Order_Status=='Accepted'){


  $DS = 'Your Driver Is Near By !';


}elseif (($Distance1_M <= 10) && $Order_Status=='Accepted'){


  $DS = 'Your Driver Is Arrived !';


}

	




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
	  
	   #map2 {
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








#map2 {
        height: 300px;
		width: 100%;
      }


#map {
        height: 300px;
		width: 100%;
      }
	  
	 
	  
	  

</style>




</head>

  <body onload="getLocation()" onload="showPosition();" class="canvas-menu" style="style background-image: url('../img/bg.png'); background-size: 100% 100%; background-repeat: no-repeat;">
   

	




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
                                        <h5>Track Your Driver</h5>
                                       
                                    </div>
                                


<center>

		<h4 style="color:red"><?php echo $DS; ?></h4>
<br>
		<h4 style="color:red">Order Status: <?php echo $Order_Status; ?></h4>

<br>

<?php
echo $Cancel_Button;
?>




</center>









	
	
	
	
	
		
	
	

		 
		 
		 
		 
		 
		  			 <div id="map"></div>

		 
		
		 
		 
		  <script>
	  
	  
		       // Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: <?php echo $D_Latitude; ?>, lng: <?php echo $D_Longitude; ?>};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 16, center: uluru, mapTypeId: 'satellite'
});
	  
  // The marker, positioned at Uluru
          var image = 'icon.png';

  var marker = new google.maps.Marker({position: uluru, map: map, icon: image});
}

    </script>

					 
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOorkShHO1xhw2zbjz-OZdSKP-xQ65AS0&callback=initMap">
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
