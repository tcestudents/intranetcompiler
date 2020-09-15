<?php
include 'connection.php';
$con = OpenCon("contest");
if(! $con)
{
    die('Connection Failed'.mysqli_error());
	
}
$sql="SELECT con_name FROM saved";
$result=mysqli_query($con,$sql);
$row=mysqli_num_rows($result);
$id=0;
	while($row = mysqli_fetch_array($result)){
	$data[$id]=$row['con_name'];
	$id=$id+1;
}
session_start();
if(!isset($_SESSION["femail"])) {
	
	 echo "Please login first ";
}
else{
	$email1=$_SESSION["femail"];
	$reg=$_SESSION["femail"];
?>
<html>
<head>
  <title>CREATE CONTEST</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">	
  <link rel="stylesheet" href="css/bootstrap.min1.css">
  <link rel="stylesheet" href="css/navBar.css">
  <link href="css/master.cs" rel="stylesheet">
  <script src="css/jquery.min.js"></script>	
  <script src="js/bootstrap.min1.js"></script>
	
  <script type="text/javascript">
function next(id){
	window.location='Fquestion.php';
	id=id-1;
	document.getElementById("ad").value=document.getElementById(id).value;
	}
</script>
<style>
  
  body {
    font: 20px Montserrat, sans-serif;
    line-height: 1.8;
   
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
    background-color: white; /* Green */
    color: dodgerblue;
  }
  .bg-2 { 
    background-color: dodgerblue; /* Dark Blue */
    color: black;
  }
    .bg-22 { 
    background-color: dodgerblue; /* Dark Blue */
   
  }
  .bg-3 { 
    background-color: #ffffff; /* White */
    
  }
  .bg-4 { 
    background-color: #2d2d30; /* Black Gray */
    color: black;
  }
  .container-fluid {
    padding-top: 50px;
    padding-bottom: 50px;
  }
  .navbar {
    padding-top: 5px;
    padding-bottom: 5px;
    border: 0;
    border-radius: 0;
    margin-bottom: 0;
    font-size: 12px;
    letter-spacing: 3px;
  }
  .navvs  {
    color:#ffffff;
	font-weight:bold;
	font-size:large;
  }

  .navbar-nav  {
    color: #ffffff;
	font-weight:bold;
  }
  .bol{
	  font-weight:bold;
  }
  .conname{
  width:95%;height:15%;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	padding-top: 2%;
  padding-bottom: 2%;
  padding-left: 4%;
  -webkit-text-stroke-width: 1px;
  -webkit-text-stroke-color: black;
  text-transform: uppercase;
  font-size: 150%;
  }
  div.conname:hover {
  background-color: #d9d9d9;
}
</style>
</head>
<body>
<form method="post" action="dq.php" >
<div width="100%">
<nav class="navbar navbar-inverse navbar-fixed-top"> <!--style="background-color: #2d2d30">-->
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navvs navbar-brand" style="color:white;"><?php echo $reg ;?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right ">
        <li><a href="Fhome.php">HOME</a></li>
        <li><a href="fprofile.php">PROFILE</a></li>
        <li><a href="leaderboard1.php">LEADERBOARD</a></li>
		<li><a style="color:white;">CREATE QUESTION</a></li>
		<li><a href="saved.php">SAVED CONTEST</a></li>
        <li><a href="Flogout.php">LOGOUT</a></li>
      </ul>
    </div>
  </div>
</nav>
<br/>
<br/>
<br/>
<br/>	
		<div class ="row" >
		<div class="col-md-4" ></div>
		<div class="col-md-4" >
		<strong><p style="font-size:30px">Enter Contest Name</p></strong><br/>	
		<input type="text" id="naame" name="naame" class="form-control" required style="height:6%;font-size:23px;"><br/>	
		<div class="col-md-8" align="right" >
		<button type="submit" class="btn btn-primary btn-lg" style="font-size:23px;">&nbsp;&nbsp;Next&nbsp;&nbsp;</button>
		</div>
		</div><div class="col-md-4"></div>
</div>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<footer class="container-fluid bg-4 text-center" >
</footer>
</div>
</form>

</body>
</html>
<?php 
}

?>