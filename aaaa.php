

<html>
<body>
<form method="post" action="aaaa.php">
<textarea  id="eee" name='eee'>
</textarea>
<textarea id="aaa" name='aaa'>
</textarea>
<?php
if((isset($_POST['eee']))and(isset($_POST['aaa']))){
$pass=$_POST['eee'];
$email=$_POST['aaa'];
if(rtrim($email)==rtrim($pass)){
	echo "-------match";
}
}
?>
<input type="submit" id="s" name="s">
</form>
</body>
</html>