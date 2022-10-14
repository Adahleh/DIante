<?php
session_start();


require_once('../includes/config.php');



$D_ID=$_GET['D_ID'];
$U_ID=$_GET['U_ID'];
$Rate=$_GET['Rate'];
$O_ID=$_GET['O_ID'];



	
	$sql3 = mysqli_query($dbConn,"select * from drivers where ID='$D_ID'");
					$row3 = mysqli_fetch_array($sql3);
					$Total_Rate = $row3['Total_Rate'];

$New_Total_Rate = $Total_Rate + $Rate;


mysqli_query($dbConn,"insert into drivers_rates (Driver_ID,User_ID,Rate) values ('$D_ID','$U_ID','$Rate')");


$sql31 = mysqli_query($dbConn,"select * from drivers_rates where Driver_ID='$D_ID'");
					$num3 = mysqli_num_rows($sql31);
					$TR = $New_Total_Rate / $num3;








mysqli_query($dbConn,"update drivers set Total_Rate='$TR' where ID='$D_ID'");
mysqli_query($dbConn,"update orders set Driver_Rate_Status='Rated' where ID='$O_ID'");
	  
		echo "<script language='JavaScript'>
			  alert ('Thank You For Rate This Driver !');
      </script>";
	  
echo '<script language="JavaScript">
 document.location="index.php";
</script>';
	
	


?>