<?php
session_start();

include("../includes/config.php");


$D_ID = $_SESSION['D_Log'];




if (!$_SESSION['D_Log'])
echo '<script language="JavaScript">
 document.location="../Driver_Signin.php";
</script>';


$sql1 = mysqli_query($dbConn,"SELECT * FROM drivers where ID='$D_ID'"); 
$row1 = mysqli_fetch_array($sql1);

$Longitude=$row1['Longitude'];
$Latitude=$row1['Latitude'];





$sql2 = mysqli_query($dbConn,"SELECT * FROM orders where Driver_ID='$D_ID' AND Status='Waiting'"); 
if (mysqli_num_rows($sql2)>0){
	
	
	
	
	
	
	
	
}else{
	
	
	
	echo '<script language="JavaScript">
            document.location="index.php";
        </script>';
	
	
}









if(isset($_POST['Submit']))
{
	
	

$Session_ID=$_POST['Session_ID'];
$S_ID=$_POST['S_ID'];


$Longitude=$_POST['Longitude'];
$Latitude=$_POST['Latitude'];





	  
echo '<script language="JavaScript">
            document.location="View_Location.php?Session_ID='.$Session_ID.'&S_ID='.$S_ID.'&Longitude='.$Longitude.'&Latitude='.$Latitude.'";
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

<body  class="canvas-menu" style="style background-image: url('../img/bg.png'); background-size: 100% 100%; background-repeat: no-repeat;">
   

	



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
                     <h5>Current Orders</h5>
                        <div class="ibox-tools">
                            
                          
                           
                        </div>
                    </div>
                   
                        
                        
                        
                        
                          <div class="ibox-content">

                  
                  
                  <br>
                  
                    
								
								

<div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Order Number</th>
						<th>User Name</th>
                        <th>User Phone Number</th>
                        <th>Package Type</th>
                        <th>Vehicle Type</th>
                        <th>Package Picture</th>
                        <th>Total KM</th>
                        <th>Total Price</th>
                        
                        <th>Date</th>
                        <th>Start Time</th>
                       
                        <th>Status</th>
                        
                        
                        <th>Add Date / Time</th>




                    </tr>
                    </thead>
                    <tbody>
                    <?php
					$sql1 = mysqli_query($dbConn,"select * from orders where Status='Waiting' AND Driver_ID='$D_ID' order by ID DESC");
					while ($row1 = mysqli_fetch_array($sql1)){

						$O_ID = $row1['ID'];
						$D_ID = $row1['Driver_ID'];
						$U_ID = $row1['User_ID'];
						$V_ID = $row1['Vehicle_ID'];
						$P_ID = $row1['Package_ID'];
						$Picture_File = $row1['Picture_File'];
						
						$Date = $row1['Date'];
						$Start_Time = $row1['Start_Time'];
						$End_Time = $row1['End_Time'];
						$Start_Longitude = $row1['Start_Longitude'];
						$Start_Latitude = $row1['Start_Latitude'];
						
						$End_Longitude = $row1['End_Longitude'];
						$End_Latitude = $row1['End_Latitude'];
						
						
						$End_Longitude_2 = $row1['End_Longitude_2'];
						$End_Latitude_2 = $row1['End_Latitude_2'];
						
						
						
						
						$Total_KM_Distance = $row1['Total_KM_Distance'];
						$Estimation_Time = $row1['Estimation_Time'];
						$Total_Price = $row1['Total_Price'];
					
						$Status = $row1['Status'];



					$sql2 = mysqli_query($dbConn,"select * from drivers where ID='$D_ID'");
					$row2 = mysqli_fetch_array($sql2);
					$D_Name = $row2['Name'];
					$D_Phone_Number = $row2['Phone_Number'];
					




					$sql3 = mysqli_query($dbConn,"select * from packages where ID='$P_ID'");
					$row3 = mysqli_fetch_array($sql3);
					$P_Type = $row3['Type'];
					


					$sql5 = mysqli_query($dbConn,"select * from vehicles where ID='$V_ID'");
					$row5 = mysqli_fetch_array($sql5);
					$V_Type = $row5['Type'];
					



					$sql6 = mysqli_query($dbConn,"select * from users where ID='$U_ID'");
					$row6 = mysqli_fetch_array($sql6);
					$U_Name = $row6['Name'];
					$U_Phone_Number = $row6['Phone_Number'];
					

					
					
						$Add_Date_Time  = $row1['Add_Date_Time'];



						?>
                    <tr class="grade">
                        <td><?php echo $O_ID; ?></td>
                        <td><?php echo $U_Name; ?></td>
                        <td><?php echo $U_Phone_Number; ?></td>
                        <td><?php echo $P_Type; ?></td>
                        <td><?php echo $V_Type; ?></td>
                        <td><img src="../Administrator/<?php echo $Picture_File; ?>" width="100%"/></td>
                        <td><?php echo $Total_KM_Distance; ?> KM</td>
                        <td><?php echo $Total_Price; ?> JD</td>
                        <td><?php echo $Date; ?></td>
                        <td><?php echo $Start_Time; ?></td>
                        
                       
					
		                <td><?php echo $Status; ?></td>
				
						
                        <td><?php echo $Add_Date_Time; ?></td>





 </tr>

                    <?php
					}
					?>

                    </tbody>

                    </table>
                        </div>   

								
								
								
								
						                           
                                
                               
                                
                               

                            </form>



 
                                <div class="form-group" align ="right" >
                                    
							<a href="Accept_Order.php?O_ID=<?php echo $O_ID; ?>" class="btn btn-primary">Accept Order</a>

								<a href="Cancel_Order.php?O_ID=<?php echo $O_ID; ?>" class="btn btn-danger">Cancel Order</a>
							
                                    
                                </div>



     
                        </div>

						
                        
                    </div>
                </div>
             

                        </div>
                </div>
             

                <div class="footer">

                    <div>
					                <center>Diante © 2020. All Rights Reserved.</center>
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
<script>


        $(document).ready(function() {
            $('.animation_select').click( function(){
                $('#animation_box').removeAttr('class').attr('class', '');
                var animation = $(this).attr("data-animation");
                $('#animation_box').addClass('animated');
                $('#animation_box').addClass(animation);
                return false;
            });

            var graph2 = new Rickshaw.Graph( {
                element: document.querySelector("#rickshaw_multi"),
                renderer: 'area',
                stroke: true,
                series: [ {
                    data: [ { x: 0, y: 2 }, { x: 1, y: 5 }, { x: 2, y: 8 }, { x: 3, y: 4 }, { x: 4, y: 8 } ],
                    color: '#1ab394',
                    stroke: '#17997f'
                }, {
                    data: [ { x: 0, y: 13 }, { x: 1, y: 15 }, { x: 2, y: 17 }, { x: 3, y: 12 }, { x: 4, y: 10 } ],
                    color: '#eeeeee',
                    stroke: '#d7d7d7'
                } ]
            } );
            graph2.renderer.unstack = true;
            graph2.render();
        });
    </script>
</body>
</html>
