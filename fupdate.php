<?php 
include 'connection.php';
$con=OpenCon("contest");
$qCount=count($_POST['i']);	
$contest= $_GET['cont'];
$question = $_GET['quest'];
$k=1;
for($i=0; $i<$qCount ; $i++,$k++)
	{		
			$ii=$_POST["i"][$i];
			$oo=$_POST["o"][$i];
			$mm=$_POST["m"][$i];
			$sql = "UPDATE `$contest` SET `i$k`='$ii',`o$k`='$oo',`m$k`='$mm' WHERE `question`='$question'";
			mysqli_query($con, $sql);
}


?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
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
  animation-name: an\imatebottom;
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
</head><title>UPDATE CONTEST</title>
<body onload="myFunction()" style="margin:0;">

<div id="loader"></div>

<div style="display:none;" id="myDiv" class="animate-bottom">
<br>
<br>
<br>	
  <p style="font-family:Edwardian Script ITC;font-size:60px"><b><br>			
  <?php echo $contest.' updated successfully';?>
  <br></b></p>	
    <button type="button" class="btn btn-success" onclick="back()">BACK</button>&nbsp;&nbsp;&nbsp;
	  
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
	window.location.href = "saved.php";
}
function log(){
	window.location.href = "Fpublish.php";
}
</script>

</body>
</html>
