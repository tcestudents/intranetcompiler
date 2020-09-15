<?php
include 'connection.php';
	$con = OpenCon("contest");
$cont= $_GET['cont'];	
$question=$_GET['num'];	
$date = date('Y-m-d H:i:s');	
$sql = "DELETE  FROM `$cont` WHERE `question`='$question'";
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
	window.location.href = "Fquestsaved.php?message=<?php echo $cont;?>";
}

</script>
</body>
</html>
