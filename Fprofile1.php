<?php
session_start();
if(!isset($_SESSION["femail"])) {
	echo "Please login first ";
}
else{

include 'conn.php';
$con = OpenCon();
if(! $con)
{
    die('Connection Failed'.mysqli_error());
}
$email1=$_SESSION["femail"];
if(isset($_SESSION["femail"])){
	$sql="SELECT name,dept,regno,email FROM facc WHERE email='$email1'";
	if ($result=mysqli_query($con,$sql)){
		 while ($row=mysqli_fetch_row($result)){
		$name=$row[0];
		$department=$row[1];
		$regno=$row[2];
		$email=$row[3];
		 }
		mysqli_free_result($result);
	}

}
CloseCon($con);
?>
<html>
<head>
<title>My Profile</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min1.css">
  <link rel="stylesheet" href="css/navBar.css">
  <link href="css/master.cs" rel="stylesheet">
  <script src="css/jquery.min.js"></script>	
  <script src="js/bootstrap.min1.js"></script>
      <script type="text/javascript">
function bk(){
	
	window.location='Fhome.php';
	
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
<body  >
<nav class="navbar navbar-inverse navbar-fixed-top"> <!--style="background-color: #2d2d30">-->
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navvs navbar-brand" href="#"><?php echo $email1 ;?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right ">
        <li><a href="Fhome.php" style="color:white;">HOME</a></li>
        <li><a href="fprofile.php">PROFILE</a></li>
        <li><a href="leaderboard1.php">LEADERBOARD</a></li>
		<li><a href="create.php">CREATE QUESTION</a></li>
		<li><a href="saved.php" >SAVED CONTEST</a></li>
        <li><a href="Flogout.php">LOGOUT</a></li>
      </ul>
    </div>
  </div>
</nav>
<br/><br/>
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
        </tbody>
    </table>
    
     <table class="table table-striped" style="border: 2px solid black; font-size: 20px;"> 
    <thead>
      <tr style="text-transform:uppercase;"><?>
        <th>S.No</th>
        <th>Contest Name</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Elixir</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Code Hunt</td>
      </tr>
      <tr>
        <td>3</td>
        <td>Quiz</td>
      </tr>
    </tbody>
  </table>

</div>
        </div>
        
        
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="bk();" >Back</button>
        </div>
        
      </div><br><br><br>	
    </div>
  </div>
  

</body>
</html>
<?php 
}

?>	