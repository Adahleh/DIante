<?php
session_start();

include("../includes/config.php");


$D_ID = $_SESSION['D_Log'];



if (!$_SESSION['D_Log'])
echo '<script language="JavaScript">
 document.location="../Driver_Signin.php";
</script>';





$D_ID=$_GET['D_ID'];
$U_ID=$_GET['U_ID'];
$O_ID=$_GET['O_ID'];






$sql1 = mysqli_query($dbConn,"SELECT * FROM orders where ID='$O_ID'"); 
$row1 = mysqli_fetch_array($sql1);

$Total_Price=$row1['Total_Price'];










		




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
                     <h5>Rate Your User</h5>
                        <div class="ibox-tools">
                            
                          
                           
                        </div>
                    </div>
                   
                        
                        
                        
                        
                          <div class="ibox-content">

                  
                  
                  <br>
                  
                    
								
								

<div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>

                            <th>Total Price</th>
                            <th>Rate User</th>
                           
                           
                     
                       
                       
                      
                    </tr>
                    </thead>
                    <tbody>
					







                    <tr class="grade">

                          <td><?php echo $Total_Price; ?> JD</td>
                   


			

 <td class="center">
			  
			  
 <a href="Rate.php?O_ID=<?php echo $O_ID; ?>&Rate=1&D_ID=<?php echo $D_ID; ?>&U_ID=<?php echo $U_ID; ?>" role="button"><img width="6" title="1" height="6" src="../img/star.png"/></a>
 <a href="Rate.php?O_ID=<?php echo $O_ID; ?>&Rate=2&D_ID=<?php echo $D_ID; ?>&U_ID=<?php echo $U_ID; ?>" role="button"><img width="6" title="2" height="6" src="../img/star.png"/></a>
 <a href="Rate.php?O_ID=<?php echo $O_ID; ?>&Rate=3&D_ID=<?php echo $D_ID; ?>&U_ID=<?php echo $U_ID; ?>" role="button"><img width="6" title="3" height="6" src="../img/star.png"/></a>
 <a href="Rate.php?O_ID=<?php echo $O_ID; ?>&Rate=4&D_ID=<?php echo $D_ID; ?>&U_ID=<?php echo $U_ID; ?>" role="button"><img width="6" title="4" height="6" src="../img/star.png"/></a>
 <a href="Rate.php?O_ID=<?php echo $O_ID; ?>&Rate=5&D_ID=<?php echo $D_ID; ?>&U_ID=<?php echo $U_ID; ?>" role="button"><img width="6" title="5" height="6" src="../img/star.png"/></a>
 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				  
				  </td>
 
 
                   
                                       
 </tr>
                    
                   
                    
                    </tbody>
                    
                    </table>
                        </div>   

								
								
								
								
						                           
                                
                               
                                
                               

                            </form>



 
                               


     
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
