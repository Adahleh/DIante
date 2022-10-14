<?php
session_start();

include("../includes/config.php");


$U_ID = $_SESSION['U_Log'];



if (!$_SESSION['U_Log'])
echo '<script language="JavaScript">
 document.location="../User_Signin.php";
</script>';



$U_ID=$_GET['U_ID'];
$P_ID=$_GET['P_ID'];
$V_ID=$_GET['V_ID'];
$S_Longitude=$_GET['S_Longitude'];
$S_Latitude=$_GET['S_Latitude'];
$Users_Notes=$_GET['Users_Notes'];
$Location_Type=$_GET['Location_Type'];

$Picture=$_GET['Picture'];


$E_Longitude=$_GET['E_Longitude'];
$E_Latitude=$_GET['E_Latitude'];




if(isset($_POST['Submit']))
{
	
	
$U_ID=$_POST['U_ID'];
$P_ID=$_POST['P_ID'];
$V_ID=$_POST['V_ID'];
$S_Longitude=$_POST['S_Longitude'];
$S_Latitude=$_POST['S_Latitude'];
$Users_Notes=$_POST['Users_Notes'];
$Location_Type=$_POST['Location_Type'];


$E_Longitude_2=$_POST['long'];
$E_Latitude_2=$_POST['lat'];


$E_Longitude=$_POST['E_Longitude'];
$E_Latitude=$_POST['E_Latitude'];




$Picture=$_POST['Picture'];


echo '<script language="JavaScript">
            document.location="View_Drivers_2.php?E_Latitude_2='.$E_Latitude_2.'&E_Longitude_2='.$E_Longitude_2.'&Location_Type='.$Location_Type.'&Users_Notes='.$Users_Notes.'&Picture='.$Picture.'&U_ID='.$U_ID.'&P_ID='.$P_ID.'&V_ID='.$V_ID.'&S_Longitude='.$S_Longitude.'&S_Latitude='.$S_Latitude.'&E_Longitude='.$E_Longitude.'&E_Latitude='.$E_Latitude.'";
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
	
	<style>
@font-face {
   font-family: myFirstFont;
   src: url(../fonts/NotoKufiArabic-Regular.ttf);
   font-size:8px;
}
body {
   font-family: myFirstFont;
}

</style>

</head>

<body class="canvas-menu" style="style background-image: url('../img/bg.png'); background-size: 100% 100%; background-repeat: no-repeat;">
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

        <div class="row" >
            <div class="col-lg-12" style="background-image: url('img/bg.png'); background-size: 100% 100%; background-repeat: no-repeat;">
                <div class="wrapper wrapper-content">
                        <div class="row">

                          
<div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                     <h5>Request Driver</h5>
                        <div class="ibox-tools">
                            
                          
                           
                        </div>
                    </div>
                   
                        
                        
                        
                        
                          <div class="ibox-content">

                  
                  
                  <br>
                  
                     <form method="post" action="Request_Driver_4.php" class="form-horizontal" enctype="multipart/form-data">
                      
					  
					   <input type="hidden" name="U_ID" value="<?php echo $U_ID; ?>" required />
					   <input type="hidden" name="V_ID" value="<?php echo $V_ID; ?>" required />
					   <input type="hidden" name="P_ID" value="<?php echo $P_ID; ?>" required />
					   <input type="hidden" name="S_Longitude" value="<?php echo $S_Longitude; ?>" required />
					   <input type="hidden" name="S_Latitude" value="<?php echo $S_Latitude; ?>" required />
					   
					    <input type="hidden" name="E_Longitude" value="<?php echo $E_Longitude; ?>" required />
					   <input type="hidden" name="E_Latitude" value="<?php echo $E_Latitude; ?>" required />
					   
					    <input type="hidden" name="Location_Type" value="<?php echo $Location_Type; ?>" required />
					   <input type="hidden" name="Users_Notes" value="<?php echo $Users_Notes; ?>" required />

					   <input type="hidden" name="Picture" value="<?php echo $Picture; ?>" required />

								
								
 <input type="hidden" name="lat" id="us3-lat" required />
									<input type="hidden" name="long" id="us3-lon" required />



						
						
								
								
							
							   
							   
							   
							     <div class="form-group"><label class="col-sm-2 control-label">Pickoff Location Two *</label>

                                   <div class="col-sm-10" id="us3" style="height: 250px;"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
							   
							   
							   											

							   
							   
							   
							   
                                
                                
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
							<center>	<button class="btn btn-primary" type="submit" name="Submit">View Drivers</button>

									<button class="btn btn-danger" type="reset" name="Reset">Cancel</button>
							</center>
                                    </div>
                                </div>

                            </form>

     
                        </div>

						
                        
                    </div>
                </div>
             

                        </div>
                </div>
             

                <div class="footer">

                    <div>
					                <center>Jordanian Trip © 2020. All Rights Reserved.</center>
                    </div>
                </div>
            </div>
        </div>

        </div>




        </div>
    </div>
<!-- Custom and plugin javascript -->
   
<!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>





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



<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOorkShHO1xhw2zbjz-OZdSKP-xQ65AS0&callback=initMap"></script>
    <script src="locationpicker.jquery.min.js"></script>


								
								  <script>
            $('#us3').locationpicker({
                location: {
                    latitude: <?php echo $S_Latitude; ?>,
                    longitude: <?php echo $S_Longitude; ?>

				},
                radius: 200,
                inputBinding: {
                    latitudeInput: $('#us3-lat'),
                    longitudeInput: $('#us3-lon'),
                    radiusInput: $('#us3-radius'),
                    locationNameInput: $('#us3-address')
                },
                enableAutocomplete: true,
                onchanged: function (currentLocation, radius, isMarkerDropped) {
                }
            });
        </script>		
	
	
	
	
</body>
</html>
