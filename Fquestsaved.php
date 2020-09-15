<?php
session_start();
if(!isset($_SESSION["femail"])) {
	
	 echo "Please login first ";
}
else{
	$email1=$_SESSION["femail"];
	$reg=$_SESSION["femail"];
include 'connection.php';
$con = OpenCon("contest");
if(! $con)
{
    die('Connection Failed'.mysqli_error());
	
}
$cont= $_GET['message'];

?>

<html>
<head>
  <title><?php echo $cont ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">	
  <link rel="stylesheet" href="css/bootstrap.min1.css">
  <link rel="stylesheet" href="css/navBar.css">
  <link href="css/master.cs" rel="stylesheet">
  <script src="css/jquery.min.js"></script>	
  <script src="js/bootstrap.min1.js"></script>
	
  <script type="text/javascript">
	function check(id)
{
	document.getElementById("cont").value=id;
	window.location='Squestion.php';
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
  .connamebtn{
  width:95%;height:15%;
	padding-top: 2%;
  padding-bottom: 2%;
  padding-left: 4%;
  }
  div.conname:hover {
  background-color: #d9d9d9;
}
</style>
</head>
<body>
<form method="post" action="">
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
		<li><a href="create.php">CREATE QUESTION</a></li>
		<li><a href="saved.php" style="color:white;">SAVED CONTEST</a></li>
        <li><a href="Flogout.php">LOGOUT</a></li>
      </ul>
    </div>
  </div>
</nav>
<br/><br/>
	<div class="container">
  <div class="row">
  <br>	
<div class="row">
  <div class="col-sm-6"><h2 style="text-transform: uppercase;"><?php echo $cont;?></h2></div>
  <div class="col-sm-2"><button type="button" class="btn btn-success float-left btn" onclick="addq()">ADD QUESTION</button></div>
  <div class="col-sm-2"><button type="button" class="btn btn-success float-left btn" data-toggle="modal" data-target="#myModal">PUBLISH CONTEST</button></div>
  <div class="col-sm-2"><button type="button" class="btn btn-danger float-right btn" data-toggle="modal" data-target="#myModaldel">DELETE CONTEST</button></div>
</div> 
<br>
	<?php
$sql="SELECT question FROM `$cont`";
$result=mysqli_query($con,$sql);
$row=mysqli_num_rows($result);
$id=0;
	while($row = mysqli_fetch_array($result)){
	$data[$id]=$row['question'];
	$id=$id+1;		}

$id=0;			if(isset($data)){
				while($id<sizeof($data)){
					$i=$id+1;
				echo "<a href=\"Edit.php?cont=$cont&question=$data[$id]\"><div class=\"col-*-* conname\">$data[$id]</div></a><br>";
				echo "<div align=\"right\"  class=\"col-*-* connamebtn\" ><button type=\"button\" class=\"btn btn-danger float-right btn-lg\" data-toggle=\"modal\" onclick=\"delqnum('$data[$id]')\" data-target=\"#myModaldelq\">DELETE QUESTION</button></div>";
				$id=$id+1;
}}else{
	echo "Questions are not yet created";
}
			
?>

  </div>
  	 
	   <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">      
        
		  <div class="modal-body">
          <div class="bs-example">
	<p  style="font-size: 25px; ">
   Do you want to publish it.<br>
   Once you published you can't edit it.</p>
</div>
        </div>
        <div class="modal-footer">
		<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal" onclick="log()">PUBLISH CONTEST</button>
          <input type="button"  value="CLOSE" data-dismiss="modal" class="btn btn-danger btn-lg" />
        </div>
        
      </div>
    </div>
  </div>
  
    	 
	   <div class="modal" id="myModaldel">
    <div class="modal-dialog">
      <div class="modal-content">      
        
		  <div class="modal-body">
          <div class="bs-example">
	<p  style="font-size: 25px; ">
   Do you want to delete contest <?php echo $cont;?>.<br>
   Once you delete you can't reretrieve it.</p>
</div>
        </div>
        <div class="modal-footer">
		<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModaldel" onclick="del()">DELETE CONTEST</button>
          <input type="button"  value="CLOSE" data-dismiss="modal" class="btn btn-danger btn-lg" />
        </div>
        
      </div>
    </div>
  </div>
  
  	   <div class="modal" id="myModaldelq">
    <div class="modal-dialog">
      <div class="modal-content">      
        
		  <div class="modal-body">
          <div class="bs-example">
	<p  style="font-size: 25px; ">
   Do you want to delete it.<br>
  Once you delete you can't reretrieve it.</p>
</div>
        </div>
        <div class="modal-footer">
		<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModaldelq" onclick="delq()">DELETE QUESTION</button>
          <input type="button"  value="CLOSE" data-dismiss="modal" class="btn btn-danger btn-lg" />
        </div>
        
      </div>
    </div>
  </div>
<input hidden type="text" id="visit" name="visit"><button type="button" class="btn btn-success btn-lg" onclick="back()">BACK</button>
</div>
</form>
<footer class="container-fluid bg-4 text-center">
</footer>

</body>
</html>
<?php 
}

?><script>

function log(){
	window.location.href = "fpublish.php?cont=<?php echo $_GET['message'];?>";
}
function del(){
	window.location.href = "fcontdel.php?cont=<?php echo $_GET['message'];?>";
}
function delq(){
	window.location.href = "fdelquest.php?cont=<?php echo $_GET['message'];?>&num="+document.getElementById('visit').value;
}
function delqnum(a){
	document.getElementById('visit').value=a;
}
function addq(){
	window.location.href = "addNewq.php?cont=<?php echo $_GET['message'];?>";
	
}
function back(){
	window.location.href = "saved.php";
}

</script>