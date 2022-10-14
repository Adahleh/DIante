<?php
session_start();

$P_ID=$_GET['P_ID'];

require_once('../includes/config.php');

mysqli_query($dbConn,"delete from orders where Package_ID='$P_ID'");
mysqli_query($dbConn,"delete from packages where ID='$P_ID'");
	  
echo "<script language='JavaScript'>
			  alert ('This Package Has Been Deleted Successfully !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='View_Packages_List.php';
        </script>";

?>