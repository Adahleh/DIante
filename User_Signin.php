<?php
session_start();

include 'includes/config.php';

$Error = '';


if (isset($_POST['Submit'])) {


    $Phone_Number = $_POST['Phone_Number'];
    $Password = $_POST['Password'];
    $long = $_POST['long'];
    $lat = $_POST['lat'];


    $query = mysqli_query($dbConn, "SELECT * FROM users WHERE (Phone_Number='$Phone_Number' AND Password='$Password') AND Status='Active'");


    if (mysqli_num_rows($query) > 0) {

        $row = mysqli_fetch_array($query);
        $U_ID = $row['ID'];
        $_SESSION['U_Log'] = $U_ID;

        $sql1 = mysqli_query($dbConn, "update users set Longitude='$long', Latitude='$lat' where ID='$U_ID'");


        echo '<script language="JavaScript">
            document.location="Users/";
        </script>';

    } else {

        $Error = 'Sorry ! Check Your Access Information Or Your Status With Administrator !';


    }
}


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="img/logo.png"/>

    <title>Diante</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">


    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">


    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        @font-face {
            font-family: myFirstFont;
            src: url(fonts/NotoKufiArabic-Regular.ttf);
            font-size: 8px;
        }

        body {
            font-family: myFirstFont;
        }

    </style>

</head>


<body onload="getLocation()" class="canvas-menu"
      style="style background-image: url('img/bg.png'); background-size: 100% 100%; background-repeat: no-repeat;">


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
                    style="background-image: url('../img/logo.png'); background-size: 50% 50%; background-repeat: no-repeat; border-radius: 20px;">
                    <div>
                        <center><img src="img/logo.png" style="" width="75%"/></center>


                    </div>

                </li>

                <li class="">
                    <br>
                </li>


                <li class="">
                    <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span></a>

                </li>


                <li class="">
                    <a href="About_Us.php" title="Home"><i class="fa fa-exclamation-circle"></i> <span
                                class="nav-label">About Us</span></a>
                </li>


                <li class="active">
                    <a href="User_Signin.php" title="Users Signin / Signup"><i class="fa fa-users"></i> <span
                                class="nav-label">Users Sigin / Signup</span></a>
                </li>


                <li class="">
                    <a href="Driver_Signin.php" title="Drivers Signin / Signup"><i class="fa fa-users"></i> <span
                                class="nav-label">Drivers Sigin / Signup</span></a>
                </li>


                <li class="">
                    <a href="Contact_Us.php" title="Home"><i class="fa fa-envelope"></i> <span class="nav-label">Contact Us</span></a>
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
                                    <h5>Users Signin</h5>
                                    <div class="ibox-tools">


                                    </div>
                                </div>


                                <div class="ibox-content">


                                    <br>


                                    <form method="post" action="User_Signin.php" class="form-horizontal"
                                          enctype="multipart/form-data">
                                        <INPUT TYPE="hidden" NAME="long" ID="long" VALUE="">
                                        <INPUT TYPE="hidden" NAME="lat" ID="lat" VALUE="">


                                        <div class="form-group"><label class="col-sm-2 control-label">Phone Number
                                                *</label>

                                            <div class="col-sm-10"><input value="" type="text" name="Phone_Number"
                                                                          class="form-control" required></div>
                                        </div>
                                        <div class="hr-line-dashed"></div>

                                        <br>

                                        <div class="form-group"><label class="col-sm-2 control-label">Password *</label>

                                            <div class="col-sm-10"><input value="" type="password" name="Password"
                                                                          class="form-control" required></div>
                                        </div>
                                        <div class="hr-line-dashed"></div>


                                        <br>


                                        <div class="form-group">
                                            <div class="col-sm-4 col-sm-offset-2">
                                                <center>
                                                    <button class="btn btn-primary" type="submit" name="Submit">Signin
                                                    </button>

                                                    <button class="btn btn-danger" type="reset" name="Reset">Cancel
                                                    </button>
                                                </center>
                                            </div>
                                        </div>
                                        <center><font style="color:black"><strong><?php echo $Error; ?></strong></font>
                                        </center>

                                    </form>
                                    <center><font style="color:#000"><a href="User_Forget_Password.php"
                                                                        style="color:#0f76ba">Forget your password?</a></font>
                                    </center>
                                    <br>

                                    <center><font style="color:#000">I dont have account? <a href="User_Singup.php"
                                                                                             style="color:#0f76ba">Sign
                                                Up</a></font></center>


                                </div>


                            </div>
                        </div>


                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br><br><br>

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
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>


<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Flot -->
<script src="js/plugins/flot/jquery.flot.js"></script>
<script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="js/plugins/flot/jquery.flot.spline.js"></script>
<script src="js/plugins/flot/jquery.flot.resize.js"></script>
<script src="js/plugins/flot/jquery.flot.pie.js"></script>

<!-- Peity -->
<script src="js/plugins/peity/jquery.peity.min.js"></script>
<script src="js/demo/peity-demo.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- jQuery UI -->
<script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- GITTER -->
<script src="js/plugins/gritter/jquery.gritter.min.js"></script>

<!-- Sparkline -->
<script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- Sparkline demo data  -->
<script src="js/demo/sparkline-demo.js"></script>

<!-- ChartJS-->
<script src="js/plugins/chartJs/Chart.min.js"></script>

<!-- Toastr -->
<script src="js/plugins/toastr/toastr.min.js"></script>
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
