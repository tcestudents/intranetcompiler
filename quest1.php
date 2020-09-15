<?php
$ss=($_POST['naame']);
$s = $ss;
$c=count($_POST['question']);
include 'connection.php';
	$con = OpenCon("contest");
if(! $con)
{
    die('Connection Failed'.mysqli_error());
	
}
session_start();
$email1=$_SESSION["femail"];

echo $ss ;
if($c>0){	

	$sql = "CREATE TABLE $s( 
	num INT NOT NULL AUTO_INCREMENT  PRIMARY KEY ,
	 question TEXT(300) NOT NULL,
	i1 VARCHAR(30) NOT NULL,
	o1 VARCHAR(30) NOT NULL,
	i2 VARCHAR(30) NOT NULL,
	o2 VARCHAR(30) NOT NULL,
	i3 VARCHAR(30) NOT NULL,
	o3 VARCHAR(30) NOT NULL	)";
	mysqli_query($con, $sql);
	

	$sql = "INSERT INTO contest( `Name`, `Number of Qns`, `faculty`) VALUES('$s','$c','$email1')";
	mysqli_query($con, $sql);	
	
	for($i=0; $i<$c; $i++)
	{
		if(trim($_POST["question"][$i] != ''))
		{
			$q =  $_POST["question"][$i];
			$i1=$_POST["i1"][$i];
			$o1=$_POST["o1"][$i];
			$i2=$_POST["i2"][$i];
			$o2=$_POST["o2"][$i];
			$i3=$_POST["i3"][$i];
			$o3=$_POST["o3"][$i];
			
			
			$sql = "INSERT INTO $s(`question`, `i1`, `o1`, `i2`, `o2`, `i3`, `o3`) VALUES('$q','$i1','$o1','$i2','$o2','$i3','$o3')";
			mysqli_query($con, $sql);
}}}

	
?>
<html>
<head>
<script>
function onl(){
	<?php
	 header("location:fhome.php");
	?>}

	
</script>
</head>
<body onload="onl()" ></body></html>