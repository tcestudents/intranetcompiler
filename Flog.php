<html>
<head>
<link rel="stylesheet" href="css\bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="style.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<title>
My Login	
</title>
<script type="text/javascript">
function fun(){<?php
if((isset($_POST['eee']))and(isset($_POST['aaa']))){
$pass=$_POST['eee'];
$email=$_POST['aaa'];
include 'conn.php';
$con = OpenCon();
if(! $con)
{
    die('Connection Failed'.mysqli_error());
}
$q = "SELECT email,password FROM facc WHERE email='$email'AND password='$pass'";
$result = $con->query($q);
$arr_users = [];
if ($result->num_rows > 0) {
	session_start();
$_SESSION["femail"]=$email;
 header("location:Fhome.php");
}
CloseCon($con);
}
?>
}
function viewPassword()
{
  var passwordInput = document.getElementById('eee');
  var passStatus = document.getElementById('pass-status');
 
  if (passwordInput.type == 'password'){
    passwordInput.type='text';
    passStatus.className='fa fa-eye-slash';
    
  }
  else{
    passwordInput.type='password';
    passStatus.className='fa fa-eye';
  }
}

</script>
<style>

.fa{
  color:black;
  font-size:25px;
  margin-left:8px;
}
#validation-txt{
  color:red;
  font-size:18px;
  width: 300px;
}
#password-3{
  -webkit-text-security: disc;
    -moz-text-security:circle;
     text-security:circle;
}
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
</style>

</head>
<body>
<form method="post" > 
<br>
<br><br><br><br>
<div class="row">
  <div class="col-md-4"  ></div>
  <div class="col-md-4" class="container" >
<div class="card" style=" border-radius: 22px; padding: 2%;width:120%; heigth:100%;  background-color: #f2f2f2;">
    <br>
	<h2 style="text-align: center;">FACULTY LOGIN</h2>
    <div class="card-body">
       <form method="post" >
       <div class="row">
          <table  class="table table-borderless" style="width:110%;" align="center">
          <tr style="text-align: left;">
          <td>
          <label style="font-weight: bolder; font-size: large; text-align: left;  " >Email</label>
          </td>
          <td><input type="email"id="aaa" name='aaa'   style="width:86%; height:40px">		  </td>
          </tr>
          <tr style="width: 120%; height: 50px; text-align: left;">
          <td>
          <label style="font-weight: bolder; font-size: large; text-align: left;" >Password</label>
          </td>
          <td>
		  <input type="password" id="eee" name='eee'   style="width:86%; height:40px">
		 
          <tr><td></td>
		  <td  align="left">
		    <input style="text-align:center;" class="btn btn-success" type="submit" name="submit" onclick="fun() ;">&nbsp;&nbsp;&nbsp;&nbsp;
				<a href ="Freg.php" style="text-decoration: underline; color:black;">Create Account</a>
		  </td></tr>
		  </table>
		
    </div>
  </div>
</div>
  </div>
  <div class="col-md-4" ></div>
</div>
</form>
</body>
</html> 
