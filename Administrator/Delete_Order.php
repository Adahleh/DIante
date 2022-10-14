<?php
session_start();

$O_ID=$_GET['O_ID'];

require_once('../includes/config.php');

mysqli_query($dbConn,"delete from orders where ID='$O_ID'");
	  
echo "<script language='JavaScript'>
			  alert ('This Order Has Been Deleted Successfully !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='View_Orders_List.php';
        </script>";

?>