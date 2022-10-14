<?php
session_start();

$U_ID=$_GET['U_ID'];

require_once('../includes/config.php');

mysqli_query($dbConn,"delete from orders where User_ID='$U_ID'");
mysqli_query($dbConn,"delete from users where ID='$U_ID'");

	  
echo "<script language='JavaScript'>
			  alert ('This User Has Been Deleted Successfully !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='View_Users_List.php';
        </script>";

?>