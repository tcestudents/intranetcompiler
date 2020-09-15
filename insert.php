<?php


$user = $_POST["ont"];
$error=false;
// Connect to the database
include 'conn.php';
$con = OpenCon();
// Make sure we connected successfully
if(! $con)
{
    die('Connection Failed'.mysqli_error());
	
}
$user_check_query = "SELECT email,pass FROM login WHERE email='$user'AND pass='$pass'";
$result = mysqli_query($con, $user_check_query);

$row = mysqli_fetch_array($result);

if($row["email"]==$user && $row["pass"]==$pass)
{
	session_start();
    header("location:myprofile.php");
}
else
{
//    echo"Sorry, your credentials are not valid, Please try again.";
	$error=true;
	$msg="Incorrect Password or Login";
	echo "<script type='text/javascript'>alert('$msg');</script>";
	//header("location:login.php");
}

?>