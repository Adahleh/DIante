<?php
session_start();

$V_ID=$_GET['V_ID'];

require_once('../includes/config.php');

mysqli_query($dbConn,"delete from orders where Vehicle_ID='$V_ID'");
mysqli_query($dbConn,"delete from vehicles where ID='$V_ID'");
	  
echo "<script language='JavaScript'>
			  alert ('This Vehcile Has Been Deleted Successfully !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='View_Vehicles_List.php';
        </script>";

?>