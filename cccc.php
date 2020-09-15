<?php 
include 'connection.php';
$con=OpenCon("student");

$s="INSERT INTO `testing_question`( `question`, `i1`, `o1`, `m1`, `i2`, `o2`, `m2`, `i3`, `o3`, `m3`) VALUES ('1','1','1','1','1','1','1','1','1','1')";
$res=mysqli_query($con,$s);
if($res){echo "ss";}
?>