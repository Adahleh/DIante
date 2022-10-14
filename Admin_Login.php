<?php
session_start();

include 'includes/config.php';

	$Error ='';



if(isset($_POST['Submit']))
{
	
$Username=$_POST['Username'];
$Password=md5($_POST['Password']);

if ($Username=='admin' && $Password=='21232f297a57a5a743894a0e4a801fc3'){

$A_ID=1;
$_SESSION['A_Log'] = $A_ID;


echo '<script language="JavaScript">
            document.location="Administrator/";
        </script>';	
}
else
{

$Error = 'Error ... Please Check Administrator Username Or Password !';
}
}


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Diante - Administrator Portal | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
	    <link href="css/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	        	<link rel="shortcut icon" href="img/logo.png"/>
	
	<style>
@font-face {
   font-family: myFirstFont;
   src: url(fonts/NotoKufiArabic-Regular.ttf);
   font-size:8px;
}
body {
   font-family: myFirstFont;
}



.form-group {
  position: relative
}
.form-group input[type="password"] {
  padding-right: 30px
}
.form-group .glyphicon {
  right: 10px;
  position:absolute;
  top:29px
}



</style>





</head>

<body class="white-bg" class="" style="background-color:#fff">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
            
       
                <img src="img/logo.png" class="img-rounded" width="90%"/>

            </div>
                    <h2 class="font-bold">Admin Login</h2>
            
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
			            <p style="color:black">Please enter the username & password for the administrator</p>


            <form class="m-t" role="form" method="post" action="Admin_Login.php">
                <div class="form-group">
                   Username <input type="text" class="form-control" placeholder="Username" name="Username" required="">
                </div>
				



                <div class="form-group">
                  Password  <input type="password" id="password" class="form-control" placeholder="Password" name="Password" required="">
				  				<span class="glyphicon glyphicon-eye-open"></span>

				</div>
					
                <button type="submit" name="Submit" class="btn btn-primary block full-width m-b">Login</button>
                <button type="reset" name="Reset" class="btn btn-danger block full-width m-b">Clear</button>
			
				<font style="color:red"><?php echo $Error; ?></font>
				
				
			   </div>

			</form>




  <p class="m-t"> <small><br>Diante © 2020. All Rights Reserved </small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>


<script>
$(".glyphicon-eye-open").on("click", function() {
$(this).toggleClass("glyphicon-eye-close");
  var type = $("#password").attr("type");
if (type == "text"){ 
  $("#password").prop('type','password');}
else{ 
  $("#password").prop('type','text'); }
});
</script>


