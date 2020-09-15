<?php
include 'connection.php';
$con = OpenCon("student");
if(! $con)
{
    die('Connection Failed'.mysqli_error());
	
}
session_start();
if(!isset($_SESSION["femail"])) {
	
	 echo "Please login first ";
}
else{
	$email1=$_SESSION["femail"];
	$reg=$_SESSION["femail"];
	$sql="SELECT name,regno,score FROM student ORDER BY score DESC LIMIT 10";
	$result=mysqli_query($con,$sql);
	$row=mysqli_num_rows($result);
	$id=0;
while($row = mysqli_fetch_array($result)){
	$data[$id]=$row['name'];
	$regno[$id]=$row['regno'];
	$score[$id]=$row['score'];
	$id=$id+1;
}
?>
<html>
<head>
  <meta charset="utf-8">
  <title>LEADERBOARD</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">	
  <link rel="stylesheet" href="css/bootstrap.min1.css">
  <link rel="stylesheet" href="css/navBar.css">
  <link href="css/master.cs" rel="stylesheet">
  <script src="css/jquery.min.js"></script>	
  <script src="js/bootstrap.min1.js"></script>
	
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
<form method="post" >

<nav class="navbar navbar-inverse navbar-fixed-top"> <!--style="background-color: #2d2d30">-->
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navvs navbar-brand" href="#"><?php echo $reg ;?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right ">
        <li><a href="Fhome.php" >HOME</a></li>
        <li><a href="fprofile.php" >PROFILE</a></li>
        <li><a href="leaderboard1.php" style="color:white;">LEADERBOARD</a></li>
		<li><a href="create.php">CREATE QUESTION</a></li>
        <li><a href="saved.php" >SAVED CONTEST</a></li>
		<li><a href="Flogout.php">LOGOUT</a></li>

      </ul>
    </div>
  </div>
</nav><br><br>

<div class="container"  >
   <h1 align="center">OVERALL</h1>
 <table class="table table-striped" align="center" style="background-color:#b3ffd9;border: 2px solid black;width:80%; font-size: 20px;text-transform: uppercase;"> 
    <thead style="text-transform:uppercase; border: 1px solid black;">
        <th>S.No</th>
        <th>Student Name</th>
         <th>Roll Number</th>
		<th>Total Score</th>
    </thead>
    <tbody>
<?php
				$id=0;$i=1;
				while($id<sizeof($data)){
				echo "<tr><td>$i</td><td>$data[$id]</td><td>$regno[$id]</td><td>$score[$id]</td></tr>";
				$i=$i+1;	
				
				$id=$id+1;
				}
?> 
    </tbody>
  </table> 
  </div>
</form>
<footer class="container-fluid bg-4 text-center">
</footer>

</body>
</html>
<?php 
}

?>