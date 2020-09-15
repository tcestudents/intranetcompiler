<?php
include 'connection.php';
	$con = OpenCon("contest");
$cont= $_GET['cont'];	
$date = date('Y-m-d H:i:s');	
$sql = "DROP TABLE $cont";
mysqli_query($con, $sql);
$sql = "DELETE FROM saved WHERE con_name='$cont'";
mysqli_query($con, $sql);
$sql = "ALTER TABLE `$cont` DROP `num`";
mysqli_query($con, $sql);
$sql = "ALTER TABLE `$cont` ADD `num` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`num`)";
mysqli_query($con, $sql);
	?>

<html>
<body onload="myFunction()" >

<script>
function myFunction() {
	window.location.href = "saved.php";
}

</script>
</body>
</html>
