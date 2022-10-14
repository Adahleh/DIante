<?php
session_start();

include("../includes/config.php");


$D_ID = $_SESSION['D_Log'];


if (!$_SESSION['D_Log'])
echo '<script language="JavaScript">
 document.location="../Driver_Signin.php";
</script>';


$O_ID=$_GET['O_ID'];



	$sql1=mysqli_query($dbConn,"update orders set Status='Canceled' where ID='$O_ID'");


echo "<script language='JavaScript'>
			  alert ('Order Has Canceled !');
      </script>";


echo '<script language="JavaScript">
            document.location="index.php";
        </script>';

?>
