<?php
session_start();

$O_ID=$_GET['O_ID'];
$U_ID=$_GET['U_ID'];

require_once('../includes/config.php');



$sql121 = mysqli_query($dbConn,"select * from users where ID='$U_ID'");
$row121 = mysqli_fetch_array($sql121);
$Penlty_Balance = $row121['Penlty_Balance'];

$New_P_B = $Penlty_Balance + 1.20;


$sql121 = mysqli_query($dbConn,"update users set Penlty_Balance='$New_P_B' where ID='$U_ID'");


mysqli_query($dbConn,"delete from orders where ID='$O_ID'");
	  
echo "<script language='JavaScript'>
			  alert ('This Order Has Been Canceled Successfully !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='index.php';
        </script>";

?>