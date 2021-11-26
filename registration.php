<?php
include "connect.php";
$name=$_POST['name'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$bgroup=$_POST['bgroup'];
$addr=$_POST['adr'];
$ms=$_POST['ms'];
$DOB=$_POST['dob'];
$phn=$_POST['phone'];
$gndr=$_POST['sex'];
//echo $name."  ".$fname."  ".$mname."  ".$bgroup." ".$addr;

$sql="INSERT INTO `patient` (`ID`, `NAME`, `FATHER'S NAME`, `MOTHER'S NAME`, `BLOOD GROUP`, `ADDRESS`, `MARITAL STATUS`, `DOB`,  `PHONE NUMBER`, `SEX`) 
VALUES (NULL, '".$name."', '".$fname."', '".$mname."', '".$bgroup."', '".$addr."', '".$ms."', '".$DOB."', '".$phn."', '".$gndr."');";
//echo $sql;
$res=mysqli_query($con_db,$sql);

$last_id = mysqli_insert_id($con_db);
$sql_payment="INSERT INTO `payment`(`P_ID`,`DEMAND`,`PAID`)VALUES($last_id,1000,0)";
$res1=mysqli_query($con_db,$sql_payment);

if($res)
{
	header("Location: common_diseases_form.php");
}
else echo "\n error when inserting";
?>