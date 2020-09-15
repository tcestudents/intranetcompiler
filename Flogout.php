<?php
session_start();
unset($_SESSION["femail"]);
header("Location:Flog.php");
?>