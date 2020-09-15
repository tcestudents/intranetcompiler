<?php 
include 'connection.php';
$con=OpenCon("student");
if((isset($_REQUEST['name']))&&(isset($_REQUEST['department']))&&(isset($_REQUEST['regno']))&&(isset($_REQUEST['email']))&&(isset($_REQUEST['year']))&&(isset($_REQUEST['p1'])))
{
$name=$_REQUEST['name'];
$department=$_REQUEST['department'];
$regno=$_REQUEST['regno'];
$email=$_REQUEST['email'];
$year=$_REQUEST['year'];
$pass=$_REQUEST['p1'];
}
$exist1="true1";
$errors = array(); 
$q1 = "SELECT * FROM student WHERE regno='$regno'";
$result1 = $con->query($q1);
$q = "SELECT * FROM student WHERE email='$email'";
$result = $con->query($q);
if ($result->num_rows > 0) {
	$exist="Email Id already exist :(";
}
elseif ($result1->num_rows > 0) {
	$exist="Register number already exist :(";
}else
{$exist="You have registered successfully :)";
$sql="INSERT INTO `student`(`name`, `department`, `regno`, `year`, `email`, `pass`, `score`) VALUES ('$name','$department','$regno','$year','$email','$pass','0')";
$res=mysqli_query($con,$sql);
	$sql1 = "CREATE TABLE $regno(  
	num INT NOT NULL AUTO_INCREMENT  PRIMARY KEY ,
	conname VARCHAR(30) NOT NULL,
	score INT(30) NOT NULL,
	`attended_on` DATETIME NOT NULL)";
	mysqli_query($con, $sql1);	
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/* Center the loader */
p {
	  font-size: 40px;
  font-family: "Times New Roman", Times, serif;
}
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
a:link, a:visited {
  background-color: #000000;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  font-family: "Times New Roman", Times, serif;
}

a:hover, a:active {
	font-size: 22px;
  background-color:#808080 ;
}
</style>
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body onload="myFunction()" style="margin:0;">
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">
<br>
<br>
<br>	
<p style="font-family:Edwardian Script ITC;font-size:60px"><b><br>			
  <?php echo $exist;?>
  <br></b></p>	
    <button type="button" class="btn btn-success" onclick="back()">BACK</button>&nbsp;&nbsp;&nbsp;
	  <button type="button" class="btn btn-success" onclick="log()">LOGIN HERE</button>
</div>
<script>
var myVar;
function myFunction() {
  myVar = setTimeout(showPage, 3000); 
}
function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
function back(){
	window.location.href = "regg.php";
}
function log(){
	window.location.href = "Slog.php";
}
</script>
</body>
</html>