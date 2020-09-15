<?php 
session_start();
$email1=$_SESSION["femail"];
$cname=$_REQUEST['naame'];

	$q = "SELECT `Name` FROM `contest` WHERE `Name`='$cname'";
	$result = $con->query($q);
	if ($result->num_rows > 0) {
	echo "alert(\"Contest name exist\");";
	echo "location.replace(\"create.php\")";
	}
?>	
