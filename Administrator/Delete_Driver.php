<?php
session_start();

$D_ID=$_GET['D_ID'];

require_once('../includes/config.php');

mysqli_query($dbConn,"delete from sessions_riders where D_ID='$D_ID'");
mysqli_query($dbConn,"delete from sessions where D_ID='$D_ID'");

mysqli_query($dbConn,"delete from drivers where ID='$D_ID'");
	  
echo "<script language='JavaScript'>
			  alert ('This Driver Has Been Deleted Successfully !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='View_Drivers_List.php';
        </script>";

?>