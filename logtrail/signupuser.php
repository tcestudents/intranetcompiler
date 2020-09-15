<!DOCTYPE HTML>
<html>
<head>
<title>User Signup</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php

extract($_POST);
include("database.php");
$rs=mysqli_query($conn,"select * from student where email='$user_id'");
if (mysqli_num_rows($rs)>0)
{
	echo "<p>Already Register <a href=\"regis.php\" Login here></a></p>";
	exit;
}

$rs=mysqli_query($conn,$query)or die("Could Not Perform the Query");
echo "<br><br><br><div class=head1>Your Login ID  $user_id Created Sucessfully</div>";
echo "<br><div class=head1>Please Login using your Login ID to take Quiz</div>";



?>
</body>
</html>