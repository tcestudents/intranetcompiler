<?php
$ss=($_POST['naame']);
$s=$ss;
$at=$ss.'_attended';
$c=$_POST['total'];
include 'connection.php';
	$con = OpenCon("contest");
if(! $con)
{
    die('Connection Failed'.mysqli_error());
	
}
session_start();
$email1=$_SESSION["femail"];	
	$sql = "CREATE TABLE $s(  
	num INT NOT NULL AUTO_INCREMENT  PRIMARY KEY ,
	 question TEXT(300) NOT NULL,
	i1 VARCHAR(30) NOT NULL,
	o1 VARCHAR(30) NOT NULL,
	m1 INT(30) NOT NULL,
	i2 VARCHAR(30) NOT NULL,
	o2 VARCHAR(30) NOT NULL,
	m2 INT(30) NOT NULL	)";
	mysqli_query($con, $sql);
	$t=2;
	for($i=2; $i<$c; $i++){
		$t++;
		$sql = "ALTER TABLE $s ADD (i$t VARCHAR(30),o$t VARCHAR(30),m$t INT(30))";
		mysqli_query($con, $sql);
	}
$qCount=count($_POST['question']);	
	for($i=0; $i<$qCount ; $i++)
	{
		if(trim($_POST["question"][$i] != ''))
		{
			$q =  $_POST["question"][$i];
			$i1=$_POST["i1"][$i];
			$o1=$_POST["o1"][$i];
			$i2=$_POST["i2"][$i];
			$o2=$_POST["o2"][$i];
			$m1=$_POST["m1"][$i];
			$m2=$_POST["m2"][$i];
			$sql = "INSERT INTO $s(`question`, `i1`, `o1`,`m1`, `i2`, `o2`,`m2`) VALUES('$q','$i1','$o1','$m1','$i2','$o2','$m2')";
			 mysqli_query($con, $sql);
}}

$date = date('Y-m-d H:i:s');	
$sql = "INSERT INTO `saved`(`con_name`, `question`, `faculty`, `saved_on`) VALUES ('$s','$qCount','$email1','$date')";

mysqli_query($con, $sql);

for($i=1;$i<=$qCount;$i++){
	for($j=2;$j<=$c;$j++){
		$iName=$i.'i'.$j;
		$oName=$i.'o'.$j;
		$mName=$i.'m'.$j;
		if(isset($_POST[$iName])){
			$ii=$_POST[$iName];
			$oo=$_POST[$oName];
			$mm=$_POST[$mName];
			$i1='i'.$j;
			$o1='o'.$j;
			$m1='m'.$j;
			$sql = "UPDATE $s
				SET 
					`$i1` = '$ii',`$o1` = '$oo',`$m1` = '$mm'
					WHERE
                    `num`='$i'
				";
			mysqli_query($con, $sql);
		}
		
		
	}
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
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css"> 
  <link rel="stylesheet" href="css/quest-css.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 
</head>
<body onload="myFunction()" style="margin:0;">
<form method="post">
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">
<br>
<br>
<br>	
<p style="font-family:Edwardian Script ITC;font-size:60px"><b><br>			
  <?php echo $s;?> created successfully....
  <br></b></p>	
    <button type="button" class="btn btn-success" onclick="back()">BACK TO HOME</button>&nbsp;&nbsp;&nbsp;
	  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">PUBLISH CONTEST</button>
	   <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">      
		  <div class="modal-body">
          <div class="bs-example">
   <h3>Do you want to publish it.</h3><br>
   <h5>Once you published you can't edit it.</h5>
</div>
        </div>
        <div class="modal-footer">
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" onclick="log()">PUBLISH CONTEST</button>
          <input type="button"  value="CLOSE" data-dismiss="modal" class="btn btn-danger" />
        </div>
        
      </div>
    </div>
  </div>
</div>
</form>
<script>
var myVar;
function myFunction() {
  myVar = setTimeout(showPage, 10); 
}
function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
function back(){
	window.location.href = "Fhome.php";
}
function log(){
	window.location.href = "fpublish.php?cont=<?php echo $s;?>";
}
</script>
</body>
</html>