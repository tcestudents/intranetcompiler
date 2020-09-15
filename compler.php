<?php
$contest=$_POST["com"];
$num=$_POST["qu"];
$c=$_POST["code"];
session_start();
$email1=$_SESSION["email"];
$i[1]=$_POST["input2"];
$i[2]=$_POST["input3"];
if($_POST["input1"]!=null){
$i[0]=$_POST["input1"];
echo $i[0];
echo $i[1];
echo $i[2];
}


include 'connection.php';
$con = OpenCon("contest");
if(! $con)
{
    die('Connection Failed'.mysqli_error());	
}
$sql="SELECT email FROM result where email='$email1' and conname='$contest'";
	$result = $con->query($sql);
	if ($result->num_rows > 0) {
			echo "<h1>You have already answered</h1>";
			
	}

$sql="SELECT i1,o1,i2,o2,i3,o3 FROM $contest where num='$num'";
$result=mysqli_query($con,$sql);
while ($row=mysqli_fetch_row($result)){
		$i1=$row[0];
		$o[0]=$row[1];		
		$i2=$row[2];
		$o[1]=$row[3];		 
		$i3=$row[4];
		$o[2]=$row[5];		 
		}
?>
<?php //compiler
for($count=0;$count<3;$count++){
 putenv("PATH=C:\Program Files\CodeBlocks\MinGW\bin");
$CC="gcc";
$out="a.exe";
$code=$_POST["code"];
$input=$i[$count];
$filename_code="main.c";
$filename_in="input.txt";
$filename_error="error.txt";
$executable="a.exe";
$command=$CC." -lm ".$filename_code;	
$command_error=$command." 2>".$filename_error;

    exec("sudo -i");	

$file_code=fopen($filename_code,"w+");
fwrite($file_code,$code);
fclose($file_code);
$file_in=fopen($filename_in,"w+");
fwrite($file_in,$input);
fclose($file_in);
exec("chmod 777 $executable");
exec("chmod 777 $filename_error");
shell_exec($command_error);
$error=file_get_contents($filename_error);
    $test=shell_exec("cat a1.txt");
if(trim($error)=="")
{
if(trim($input)=="")
{
$output=shell_exec($out);
}
else
{
$out=$out." < ".$filename_in;
$output=shell_exec($out);
}
//echo "<pre>$output</pre>";//outputttttttttttttttttttt
$op[$count]=$output;





}
else if(!strpos($error,"error"))
{
//echo "<pre>$error</pre>";
if(trim($input)=="")
{
$output=shell_exec($out);
}
else
{
$out=$out." < ".$filename_in;
$output=shell_exec($out);
}
echo "<pre>$output</pre>";

}
else
{
echo "<pre>$error</pre>";
break;
}
exec("rm $filename_code");
exec("rm *.o");
exec("rm *[!0-9].txt");
exec("rm $executable");

}
$s=0;$score=0;
if(isset($op)){
for($i=0;$i<sizeof($op);$i++){
echo "<pre>$o[$i]</pre>";
echo "--------------";
echo "<pre>$op[$i]</pre>";
	
	if($op[$i]==$o[$i]){
		echo "<pre>testcase ".$i."  passed</pre>";
		$s++;
		
		
		if($i==0){
			$score =$score+30;
		}else{
			$score =$score+35;
		}
	}
	else{//echo $o[$i];
	//echo $op[$i];
		echo "<pre>testcase ".$i."  failed</pre>";
		}
}}
	echo "<pre>TEST CASES   ".$s."/3 passed</pre>";
	echo "<pre>YOUR SCORE IS ".$score."</pre>";
	
?>
<html>
<head>
<script type="text/javascript">
function load(){
	document.getElementById("ad").value="<?php echo $num ;?>";
	document.getElementById("cont").value="<?php echo $contest ;?>";
	document.getElementById("score").value="<?php echo $score ;?>";
	window.location.replace("ans.php");
}

</script>
</head>
<body>
<form method="post" action="ans.php">
<input hidden type="text" id="ad" name="ad"   >
<input hidden type="text" id="cont"  name="cont"   >

<input hidden type="text" id="score"  name="score"   >
<input type="button" style=" font-weight:bold;"  class="btn btn-secondary" value="Click here to Submit" onclick="redirect();" />
 <input type="submit" name="add" id="add" onclick="load();" value="Back">
</form>
</body>
</html>
