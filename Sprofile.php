<?php
include 'connection.php';
$con = OpenCon("student");
if(! $con)
{
    die('Connection Failed'.mysqli_error());
	
}
session_start();
if(!isset($_SESSION["email"])) {
	
	 echo "Please login first ";
}
else{
	
$email1=$_SESSION["email"];
if(isset($_SESSION["email"])){
	
	
	
	$sql="SELECT name,department,regno,email FROM student WHERE email='$email1'";
	if ($result=mysqli_query($con,$sql)){
		 while ($row=mysqli_fetch_row($result)){
		$name=$row[0];
		$department=$row[1];
		$regno=$row[2];
		$email=$row[3];
		
		 }
		mysqli_free_result($result);
	$s=0;$score=0;
	$sql="SELECT conname,score FROM $regno ";
	if ($result=mysqli_query($con,$sql)){
		 while ($row=mysqli_fetch_row($result)){
		$conname[$s]=$row[0];
		$score1[$s]=$row[1];
		$score+=$score1[$s];
		$s+=1;
	}}	
	$sql="UPDATE `student` SET score= '$score' WHERE email='$email1'";
	mysqli_query($con,$sql);
		
		
	}

}
?>
<html>
<head>
<title>PROFILE</title>
  <meta charset="utf-8">
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
      <a class="navvs navbar-brand" style="color:white;" ><?php echo $email1 ;?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right ">
        <li><a href="home.php" >HOME</a></li>
        <li><a href="sprofile.php" style="color:white;">PROFILE</a></li>
        <li><a href="leaderboard.php">LEADERBOARD</a></li>
        <li><a href="logout.php">LOGOUT</a></li>

      </ul>
    </div>
  </div>
</nav>

<div class="container" >
   <div>
   <br><br><br>
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title-center">My Profile</h2>
          <button type="button" class="close" data-dismiss="modal"></button>
        </div>
        

        <div class="modal-body">
          <div class="bs-example">
    <table class="table table-borderless" style="font-size: 23px;">
        
        <tbody>
            <tr>
                <td><b>Name</b></td>
                <td style="text-transform:uppercase;"><?php echo $name ?></td>
               
            </tr>
            <tr>
                <td><b>Department</b></td>
                <td style="text-transform:uppercase;"><?><?php echo $department ?></td>
                
            </tr>
            <tr>
                <td><b>Reg no</b></td>
                <td style="text-transform:uppercase;"><?><?php echo $regno ?></td>

            </tr>   
            <tr>
                <td><b>Email</b></td>
                <td style="text-transform:uppercase;"><?><?php echo $email ?></td>

            </tr>   
            <tr>
                <td><b>Score</b></td>
                <td style="text-transform:uppercase;"><?><?php echo $score; ?></td>

            </tr>  			
        </tbody>
    </table>
    <?php
	if(isset($conname)){
	?>
     <table class="table table-striped" style="border: 2px solid black; font-size: 20px; text-transform: uppercase;"> 
    <thead>
      <tr style="text-transform:uppercase;"><?>
        <th>S.No</th>
        <th>Contest Name</th>
		<th>Score</th>
      </tr>
    </thead>
    <tbody>
	  <?php
	  $n=1;
	  for($pr=0;$pr<sizeof($conname);$pr++){
		  echo "<tr>
        <td>$n</td>
        <td>$conname[$pr]</td>
		<td>$score1[$pr]</td>
      </tr>";
		  $n++;
	  }
	  ?>
	  
    </tbody>
  </table>
  <?php
	}
	else{
		echo "No contest participated";
		
	}
	?>

</div>
        </div>

      </div><br><br><br>	
    </div>
  </div>
</form>
<footer class="container-fluid bg-4 text-center">
</footer>

</body>
</html>
<?php 
}

?>