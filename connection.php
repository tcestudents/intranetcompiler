<?php

function OpenCon($db)
 {
 $dbhost = "localhost";
 $db_user = "root";
 $db_pass = "";
 $db_name = $db;


 $conn = new mysqli($dbhost, $db_user, $db_pass,$db_name) or die("Connect failed: %s\n". $conn -> error);

 
 return $conn;
 }
 
function CloseCon1($conn)
 {
 $conn -> close();
 }
   
?>