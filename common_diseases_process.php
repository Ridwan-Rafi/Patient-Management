<?php
include "connect.php";

$result=mysqli_query($con_db,"SELECT max(ID) FROM `patient`");
$row = mysqli_fetch_array($result);
$ID=$row[0];
//echo "id: " .$ID;

$dia=$_POST['dia'];
$hbp=$_POST['hbp'];
$hiv=$_POST['hiv'];
$asma=$_POST['asma'];

//echo $ID."  ".$dia."  ".$hbp."  ".$hiv." ".$asma;

$sql="INSERT INTO `common_diseases` (`P_ID`,`DIABETICS`,`HIGH_PRESSURE`,`HIV`,`ASMA`) 
VALUES ('".$ID."', '".$dia."', '".$hbp."', '".$hiv."', '".$asma."');";


$res=mysqli_query($con_db,$sql);

if($res)
{
	header("Location: afterregistrationprofile.php");
}
else echo "error when inserting";

?>