<?php
session_start();

include("../includes/config.php");


$U_ID = $_SESSION['U_Log'];


if (!$_SESSION['U_Log'])
    echo '<script language="JavaScript">
 document.location="../User_Signin.php";
</script>';


$U_ID = $_GET['U_ID'];
$V_ID = $_GET['V_ID'];
$P_ID = $_GET['P_ID'];

$Picture = $_GET['Picture'];
$S_Longitude = $_GET['S_Longitude'];
$S_Latitude = $_GET['S_Latitude'];


$E_Longitude = $_GET['E_Longitude'];
$E_Latitude = $_GET['E_Latitude'];


$Users_Notes = $_GET['Users_Notes'];
$Location_Type = $_GET['Location_Type'];


if (isset($_POST['Submit'])) {


    $U_ID = $_POST['U_ID'];
    $V_ID = $_POST['V_ID'];
    $P_ID = $_POST['P_ID'];
    $D_ID = $_POST['D_ID'];
    $T_Cost_2 = $_POST['T_Cost_2'];

    $Picture = $_POST['Picture'];
    $S_Longitude = $_POST['S_Longitude'];
    $S_Latitude = $_POST['S_Latitude'];

    $Users_Notes = $_POST['Users_Notes'];
    $Location_Type = $_POST['Location_Type'];


    $E_Longitude = $_POST['E_Longitude'];
    $E_Latitude = $_POST['E_Latitude'];

    $Date = date("Y-m-d");
    $Start_Time = date("H:i:s");


    $sql1 = mysqli_query($dbConn, "insert into orders (Location_Type,Users_Notes,Driver_ID,User_ID,Package_ID,Vehicle_ID,Picture_File,Start_Longitude,Start_Latitude,End_Longitude,End_Latitude,Date,Start_Time,End_Time,Estimation_Time,Total_KM_Distance,Total_Price,Driver_Rate_Status,Status) values ('$Location_Type','$Users_Notes','$D_ID','$U_ID','$P_ID','$V_ID','$Picture','$S_Longitude','$S_Latitude','$E_Longitude','$E_Latitude','$Date','$Start_Time','','','$TK','$T_Cost_2','','Waiting')");


    $sql2 = mysqli_query($dbConn, "select * from orders where (User_ID='$U_ID' AND Driver_ID='$D_ID') AND Status='Waiting'");
    $row2 = mysqli_fetch_array($sql2);

    $O_ID = $row2['ID'];


    echo "<script language='JavaScript'>
			  alert ('Your Request Has Been Sent !');
      </script>";


    echo '<script language="JavaScript">
 document.location="Track_Driver.php?O_ID=' . $O_ID . '&S_Longitude=' . $S_Longitude . '&S_Latitude=' . $S_Latitude . '&E_Longitude=' . $E_Longitude . '&E_Latitude=' . $E_Latitude . '&D_ID=' . $D_ID . '";
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
            font-size: 8px;
        }

        body {
            font-family: myFirstFont;
        }

    </style>

</head>

<body class="canvas-menu"
      style="style background-image: url('../img/bg.png'); background-size: 100% 100%; background-repeat: no-repeat;">


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
                 style="background-image: url('img/bg.png'); background-size: 100% 100%; background-repeat: no-repeat;">
                <div class="wrapper wrapper-content">
                    <div class="row">


                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>View Drivers</h5>
                                    <div class="ibox-tools">


                                    </div>
                                </div>


                                <div class="ibox-content">


                                    <br>


                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-example">
                                            <thead>
                                            <tr>

                                                <th>Driver Name</th>
                                                <th>Driver Phone</th>

                                                <th>Total Rate</th>
                                                <th>Package Type</th>
                                                <th>Vehicle Type</th>
                                                <th>Estimated Cost</th>
                                                <th>Request</th>


                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php


                                            $sql1 = mysqli_query($dbConn, "select * from drivers where Avalability_Status='True' order by ID ASC");
                                            while ($row1 = mysqli_fetch_array($sql1)) {

                                                $D_ID = $row1['ID'];


                                                $Name = $row1['Name'];
                                                $Phone_Number = $row1['Phone_Number'];
                                                $Total_Rate = $row1['Total_Rate'];

                                                $D_Longitude = $row1['Longitude'];
                                                $D_Latitude = $row1['Latitude'];


                                                $unit = 'K';
                                                $theta = $S_Longitude - $D_Longitude;
                                                $dist = sin(deg2rad($S_Latitude)) * sin(deg2rad($D_Latitude)) + cos(deg2rad($S_Latitude)) * cos(deg2rad($D_Latitude)) * cos(deg2rad($theta));

                                                $dist = acos($dist);
                                                $dist = rad2deg($dist);
                                                $miles = $dist * 60 * 1.1515;
                                                $unit = strtoupper($unit);
                                                $distance = ceil($miles * 1.609344);


                                                if ($distance < 3) {


                                                    $unit1 = 'K';
                                                    $theta1 = $S_Longitude - $E_Longitude;
                                                    $dist1 = sin(deg2rad($S_Latitude)) * sin(deg2rad($E_Latitude)) + cos(deg2rad($S_Latitude)) * cos(deg2rad($E_Latitude)) * cos(deg2rad($theta1));

                                                    $dist1 = acos($dist1);
                                                    $dist1 = rad2deg($dist1);
                                                    $miles1 = $dist1 * 60 * 1.1515;
                                                    $unit1 = strtoupper($unit1);
                                                    $Distance1 = ceil($miles1 * 1.609344);


                                                    $sql3 = mysqli_query($dbConn, "select * from packages where ID='$P_ID'");
                                                    $row3 = mysqli_fetch_array($sql3);
                                                    $P_Type = $row3['Type'];
                                                    $P_Price = $row3['Price'];


                                                    $sql5 = mysqli_query($dbConn, "select * from vehicles where ID='$V_ID'");
                                                    $row5 = mysqli_fetch_array($sql5);
                                                    $V_Type = $row5['Type'];
                                                    $V_Price = $row5['Price'];


                                                    $TK = $Distance1;


                                                    $T_Cost = ($Distance1 * 0.30);

                                                    $T_Cost_1 = ($T_Cost * 0.37);


                                                    $sql121 = mysqli_query($dbConn, "select * from users where ID='$U_ID'");
                                                    $row121 = mysqli_fetch_array($sql121);
                                                    $Penlty_Balance = $row121['Penlty_Balance'];


                                                    $T_Cost_2 = $T_Cost + $T_Cost_1 + $V_Price + $P_Price + $Penlty_Balance;


                                                    ?>


                                                    <form method="post"
                                                          action="View_Drivers.php?Users_Notes=<?php echo $Users_Notes; ?>&Location_Type=<?php echo $Location_Type; ?>&P_ID=<?php echo $P_ID; ?>&V_ID=<?php echo $V_ID; ?>&D_ID=<?php echo $D_ID; ?>&U_ID=<?php echo $U_ID; ?>"
                                                          class="form-horizontal" enctype="multipart/form-data">

                                                        <input type="hidden" name="Picture"
                                                               value="<?php echo $Picture; ?>"/>
                                                        <input type="hidden" name="V_ID" value="<?php echo $V_ID; ?>"/>
                                                        <input type="hidden" name="P_ID" value="<?php echo $P_ID; ?>"/>
                                                        <input type="hidden" name="U_ID" value="<?php echo $U_ID; ?>"/>
                                                        <input type="hidden" name="T_Cost_2"
                                                               value="<?php echo $T_Cost_2; ?>"/>
                                                        <input type="hidden" name="TK" value="<?php echo $TK; ?>"/>

                                                        <input type="hidden" name="D_ID" value="<?php echo $D_ID; ?>"/>
                                                        <input type="hidden" name="S_Longitude"
                                                               value="<?php echo $S_Longitude; ?>"/>
                                                        <input type="hidden" name="S_Latitude"
                                                               value="<?php echo $S_Latitude; ?>"/>
                                                        <input type="hidden" name="E_Longitude"
                                                               value="<?php echo $E_Longitude; ?>"/>
                                                        <input type="hidden" name="E_Latitude"
                                                               value="<?php echo $E_Latitude; ?>"/>

                                                        <input type="hidden" name="D_Longitude"
                                                               value="<?php echo $D_Longitude; ?>"/>
                                                        <input type="hidden" name="D_Latitude"
                                                               value="<?php echo $D_Latitude; ?>"/>

                                                        <input type="hidden" name="Location_Type"
                                                               value="<?php echo $Location_Type; ?>"/>
                                                        <input type="hidden" name="Users_Notes"
                                                               value="<?php echo $Users_Notes; ?>"/>


                                                        <tr class="grade">

                                                            <td><?php echo $Name; ?></td>
                                                            <td><?php echo $Phone_Number; ?></td>


                                                            <td>
                                                                <?php

                                                                for ($i = 1; $i <= $Total_Rate; $i++) {


                                                                    echo '<img width="10" height="10" src="../img/star.png"/>';


                                                                }

                                                                ?>

                                                            </td>

                                                            <td><?php echo $P_Type; ?></td>
                                                            <td><?php echo $V_Type; ?></td>
                                                            <td><?php echo $T_Cost_2; ?> JD</td>
                                                            <td><input type="Submit" name="Submit" value="Send request" class="btn btn-primary"></td>
                                                            <td><a href="Showd.php?D_Longitude=<?php echo $D_Longitude?>&D_Latitude=<?php echo $D_Latitude?>" class="btn btn-primary">Track driver </a> </td>


                                                    </form>


                                                    <?php
                                                } else {
                                                        echo "There is not driver in your area";

                                                }
                                            }
                                            ?>

                                            </tbody>

                                        </table>
                                    </div>











                                </div>


                            </div>
                        </div>


                    </div>
                </div>


                <div class="footer">

                    <div>
                        <center>UniCar © 2020. All Rights Reserved.</center>
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


    $(document).ready(function () {
        $('.animation_select').click(function () {
            $('#animation_box').removeAttr('class').attr('class', '');
            var animation = $(this).attr("data-animation");
            $('#animation_box').addClass('animated');
            $('#animation_box').addClass(animation);
            return false;
        });

        var graph2 = new Rickshaw.Graph({
            element: document.querySelector("#rickshaw_multi"),
            renderer: 'area',
            stroke: true,
            series: [{
                data: [{x: 0, y: 2}, {x: 1, y: 5}, {x: 2, y: 8}, {x: 3, y: 4}, {x: 4, y: 8}],
                color: '#1ab394',
                stroke: '#17997f'
            }, {
                data: [{x: 0, y: 13}, {x: 1, y: 15}, {x: 2, y: 17}, {x: 3, y: 12}, {x: 4, y: 10}],
                color: '#eeeeee',
                stroke: '#d7d7d7'
            }]
        });
        graph2.renderer.unstack = true;
        graph2.render();
    });
</script>
</body>
</html>
