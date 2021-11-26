<?php
include "connect.php";

$id=$_POST['id'];
$name=$_POST['name'];
$bg=$_POST['bg'];
$phn=$_POST['phn'];
$addr=$_POST['addr'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$gndr=$_POST['sex'];
$ms=$_POST['ms'];
$DOB=$_POST['dob'];
$medi=$_POST['medicine'];
$pay=$_POST['payment'];
$prob=$_POST['problems'];
//echo $id."  ".$name."  ".$fname."  ".$mname."  ".$bg." ".$addr." ".$medi." ".$pay;

$sql_info = "UPDATE `patient` SET `NAME` = '".$name."',`BLOOD GROUP` = '".$bg."',`PHONE NUMBER` = '".$phn."',`ADDRESS` = '".$addr."',`FATHER'S NAME` = '".$fname."',`MOTHER'S NAME` = '".$mname."',`SEX` = '".$gndr."',`MARITAL STATUS` = '".$ms."',`DOB` = '".$DOB."' 
WHERE `id` = ".$id.";";

$sql_p1= "START TRANSACTION;";
$sql_p2="SET @new:=".$pay.";";
$sql_p3="SELECT @tk:=`PAID` FROM `payment` WHERE `P_ID`=".$id.";"; 
$sql_p4="SET @tk:=@tk+@new;";
$sql_p5="UPDATE `payment` SET `PAID`=@tk where `P_ID`= ".$id.";";
$sql_p6="COMMIT;";

$sqldate="SELECT CURDATE();";
$ress=mysqli_query($con_db,$sqldate);
$res= mysqli_fetch_array($ress);
$date=$res[0];


$sql_medi="INSERT INTO `pre_medicine`(`P_ID`,`DATE`,`MEDI_NAMES`,`PROBLEMS`)
VALUES('".$id."','".$date."','".$medi."','".$prob."')";
echo $sql_medi;

//$sql_medi="UPDATE `pre_medicine` SET `MEDI_NAMES` = '".$medi."',`PROBLEMS` = '".$prob."' where `P_ID`= ".$id.";";

//echo $sql_payment;
$res_p1=mysqli_query($con_db,$sql_p1);
$res_p2=mysqli_query($con_db,$sql_p2);
$res_p3=mysqli_query($con_db,$sql_p3);
$res_p4=mysqli_query($con_db,$sql_p4);
$res_p5=mysqli_query($con_db,$sql_p5);
$res_p6=mysqli_query($con_db,$sql_p6);

//echo $sql_medi;
$res_medi=mysqli_query($con_db,$sql_medi);

$res=mysqli_query($con_db,$sql_info);

if($res_medi)
{
	header("Location: index.html");
}

?>