<?php

function OpenCon()
 {
 $dbhost = "localhost";
 $db_user = "root";
 $db_pass = "";
 $db_name = "student";


 $conn = new mysqli($dbhost, $db_user, $db_pass,$db_name) or die("Connect failed: %s\n". $conn -> error);

 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>