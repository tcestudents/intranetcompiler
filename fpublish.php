	<?php
include 'connection.php';
	$con = OpenCon("contest");
$cont= $_GET['cont'];	
$date = date('Y-m-d H:i:s');	
$sql = "UPDATE `saved` SET `publish`='1',`published_on`='$date' WHERE `con_name`='$cont'";
	mysqli_query($con, $sql);
$sql2="SELECT COUNT(*) FROM `$cont` WHERE 1";
$re=mysqli_query($con,$sql2);
while ($row1=mysqli_fetch_row($re)){
$counting=$row1[0];}
	
	$at=$cont.'_attended';
	$sql2 = "CREATE TABLE $at(  
	num INT NOT NULL AUTO_INCREMENT  PRIMARY KEY ,
	name VARCHAR(300) NOT NULL,
	regno VARCHAR(300) NOT NULL,
	total INT  NULL DEFAULT '0'
	)";
	mysqli_query($con, $sql2);
	for($i=1;$i<=$counting;$i++){
	$sql2 = "ALTER TABLE `$at` ADD `q$i` INT(20) DEFAULT '0' NOT NULL , ADD `a$i` LONGTEXT  NULL ;	";
	mysqli_query($con, $sql2);}
	
			?>

<html>
<body onload="myFunction()" >

<script>
function myFunction() {window.location.href = "Fhome.php";
}

</script>
</body>
</html>
