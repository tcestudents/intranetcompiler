<?php
include 'connection.php';
$con = OpenCon("student");
$con1 = OpenCon("contest");
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
	if(isset($_SESSION["femail"])){
	$sql="SELECT name,dept,regno,email,contest FROM facc WHERE email='$email1'";
	if ($result=mysqli_query($con,$sql)){
		 while ($row=mysqli_fetch_row($result)){
		$name=$row[0];
		$department=$row[1];
		$regno=$row[2];
		$email=$row[3];
		$contest=$row[4];
		 }
		mysqli_free_result($result);
	}

}
$sql="SELECT `con_name`,`published_on` FROM `saved` WHERE `faculty`='$email'";
$result=mysqli_query($con1,$sql);
$row=mysqli_num_rows($result);
$id=0;
	while($row = mysqli_fetch_array($result)){
	$con_name[$id]=$row['con_name'];
	$published_on[$id]=$row['published_on'];
	$id=$id+1;		}
?>
<html>
<head><title>PROFILE</title>
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
      <a class="navvs navbar-brand" href="#"><?php echo $reg ;?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right ">
        <li><a href="Fhome.php" >HOME</a></li>
        <li><a href="fprofile.php" style="color:white;">PROFILE</a></li>
        <li><a href="leaderboard1.php">LEADERBOARD</a></li>
		<li><a href="create.php">CREATE QUESTION</a></li>
		<li><a href="saved.php" >SAVED CONTEST</a></li>
        <li><a href="Flogout.php">LOGOUT</a></li>

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
                <td><b>Number of Contest Created</b></td>
                <td style="text-transform:uppercase;"><?><?php 
				if(!isset($con_name)) echo "0";
				else
				echo sizeof($con_name) ?></td>

            </tr>  			
        </tbody>
    </table>
    <?php 
	if(isset($con_name)){
	?>
     <table class="table table-striped" style="border: 2px solid black; font-size: 20px;  text-transform: uppercase;"> 
    <thead>
      <tr style="text-transform:uppercase;"><?>
        <th>S.No</th>
        <th>Contest Name</th>
		<th>published On</th>
      </tr>
    </thead>
    <tbody>
	<?php
	  $id=0;
				while($id<sizeof($con_name)){
			$i=$id+1;
				echo "<tr>
        <td>$i</td>
        <td>$con_name[$id]</td>
		<td>$published_on[$id]</td>
		</tr>";
				$id=$id+1;
				}?>
    </tbody>
  </table>
<?php
}else{
	echo "You have not yet posted any contest...";
}?>
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