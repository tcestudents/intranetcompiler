<?php
session_start();
$email1=$_SESSION["email"];
include 'connection.php';
$con = OpenCon("contest");
$cont=$_POST["input1"];
$num=$_POST["input2"];
$ans= $_POST["code"];

$sql2="SELECT COUNT(*) FROM information_schema.columns WHERE TABLE_NAME= '$cont'";
$re=mysqli_query($con,$sql2);
while ($row1=mysqli_fetch_row($re)){
$counting=$row1[0];}
$counting=($counting-2)/3;
$k=0;
for($i=1;$i<=$counting;$i++,$k++){
			$i1='i'.$i;
			$o1='o'.$i;
			$m1='m'.$i;
			$sql = "SELECT `$i1`, `$o1`, `$m1` FROM `$cont` WHERE `num`='$num'"; 	
			$re=mysqli_query($con,$sql);
			while ($row1=mysqli_fetch_row($re)){
			$in[$k]=$row1[0];
			$output1[$k]=$row1[1];
			$mark[$k]=$row1[2];
			}			
}


?>
<?php //compiler
for($count=0;$count<$counting;$count++){
 putenv("PATH=C:\Program Files\CodeBlocks\MinGW\bin");
$CC="gcc";
$out="a.exe";
$code=$_POST["code"];
$input=$in[$count];
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
//echo "<pre>$output</pre>";

}
else
{
//echo "<pre>$error</pre>";
break;
}
exec("rm $filename_code");
exec("rm *.o");
exec("rm *[!0-9].txt");
exec("rm $executable");

}
$s=0;$score=0;
	
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $cont ;?></title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  
<script>
function wrt(){
	window.location.href = "ans.php?cont=<?php echo $cont;?>&num=<?php echo $num;?>";
}
function home(){
	window.location.href = "Squestion.php?message=<?php echo $cont;?>";
}


</script>
</head>
<body>
<form method="post" action="ans.php">
 <textarea hidden name="ans" id="ans" rows=5 cols=5 placeholder="You can code here."><?php echo $ans;?></textarea>
 <div class="container" style="padding: 100px; text-align: center; width:80%;">
 
  <div class="card text-center" >
  <div class="card-header"><h5 class="card-title">SAMPLE TESTCASES</h5>
  </div>
  <div class="card-body">
  <br>
  <?php 
  if(isset($error)&&($error!=null)){
	  echo"<h2>error :(</h2>";	
	  echo"<p> $error;</p>";	
	  
  }
  $correct=0;
  if(isset($op)){
for($i=0;$i<$counting;$i++){
	echo "<div class=\"row\">
  <div class=\"col-sm-12\">
    <table  width=\"100%\"><tr style=\"\"><td height=\"100px\" width=\"30%\">
        <h3>Test case $i </></td><td align=\"center\"width=\"50%\" style=\"font-size:20px;\">";
if($op[$i]==$output1[$i]){
		echo "<p style=\"color:green;\"><b>TESTCASE PASSED :)";
	$score+=$mark[$i];
	$correct+=1;
	
}else{
	echo "<p style=\"color:red;\">TESTCASE FAILED :(";
}
	echo "</b></p></td></tr>
	<tr style=\"padding:2%;background-color:#cccccc;border-collapse: collapse;border: 1px solid black;\" ><td style=\"padding:2%;\">Input</td><td style=\"padding:2%;border-collapse: collapse;border: 1px solid black;\">Expected Output</td><td style=\"padding:2%;border-collapse: collapse;border: 1px solid black;\">Sample output</td></tr>";
	if($i<2){
	echo "<tr style=\"border-collapse: collapse;border: 1px solid black;\"><td style=\"padding:2%;border-collapse: collapse;border: 1px solid black;\">$in[$i]</td><td style=\"padding:2%;\">$output1[$i]</td><td style=\"padding:2%;border-collapse: collapse;border: 1px solid black;\">$op[$i]</td></tr>";
	}
	else{
		echo "<tr style=\"border-collapse: collapse;border: 1px solid black;\"><td style=\"padding:2%;border-collapse: collapse;border: 1px solid black;\">hidden</td><td style=\"padding:2%;\">hidden</td><td style=\"padding:2%;border-collapse: collapse;border: 1px solid black;\">hidden</td></tr>";
	}
	echo "</table><br>	
	
  </div>
  </div>";

}
echo "<h3 style=\"color:green;\"><b>TESTCASE $correct/$counting PASSED </h3>";}
echo"<h2>You have submitted successfully.<br> Your score is $score</h2>	";
?>
      



</div>
  </div><br><input  type="button" style=" font-weight:bold;" class="btn btn-success " value="GO TO CONTEST" onclick="home()" />&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;<input  type="button" style=" font-weight:bold;" name="back" id="back" class="btn btn-success " value="BACK" onclick="wrt()" />
  
</div>
</form>
</body>
</html>
<?php 
$con1 = OpenCon("student");
	$sql="SELECT name,regno FROM student WHERE email='$email1'";
	if ($result=mysqli_query($con1,$sql)){
		 while ($row=mysqli_fetch_row($result)){
		$name=$row[0];
		$regno=$row[1];
	}}
	$contest=$cont.'_attended';
	$q='q'.$num;$cans='a'.$num;
	$sql="SELECT name, $q FROM `$contest` WHERE regno='$regno'";
	$result = $con->query($sql);
	$re=mysqli_query($con,$sql);
		while ($row=mysqli_fetch_row($re)){
		$scor=$row[1];}
		
		if ($result->num_rows > 0) {
	if($scor<$score){
	$sql="UPDATE `$contest` SET `$q`='$score',`$cans`= '$ans' WHERE`regno`='$regno'";
		mysqli_query($con,$sql);
		}}
	else{
	$sql="INSERT INTO `$contest`( `name`, `regno`, `$q`, `$cans`) VALUES ('$name','$regno','$score','$ans')";
	mysqli_query($con,$sql);

}
	
	$sql2="SELECT COUNT(*) FROM information_schema.columns WHERE TABLE_NAME= '$contest'";
	$re=mysqli_query($con,$sql2);
	while ($row1=mysqli_fetch_row($re)){
	$counting=$row1[0];
	}
	$counting=($counting-4)/2;
	$j=0;
	for($r=1;$r<=$counting;$r++){
		$q='q'.$r;
		$sql3="SELECT $q FROM `$contest` WHERE regno='$regno'";
		$re=mysqli_query($con,$sql3);
		while ($row=mysqli_fetch_row($re)){
		$qn[$j]=$row[0];
		$j=$j+1;
		}
	}
	$sum=0;
	if(isset($qn)){
	for($r=0;$r<sizeof($qn);$r++){
		$sum+=$qn[$r];	
	}}
	$sql="SELECT total FROM `$contest` WHERE regno='$regno'";
	$result1 = $con->query($sql);
	$re=mysqli_query($con,$sql);
		if($re){
		while ($row=mysqli_fetch_row($re)){
		$tot=$row[0];}
		
	if ($result1->num_rows > 0) {
		if($tot<$sum){
	$sql="UPDATE `$contest` SET `total`='$sum' WHERE `regno`='$regno';";
		mysqli_query($con,$sql);}
		}
	}
	$sqlreg="SELECT conname,score FROM `$regno` WHERE conname='$cont'";
	$regn=mysqli_query($con1,$sqlreg);
		while ($row=mysqli_fetch_row($regn)){
		$regnscore=$row[1];}
	$reg=mysqli_query($con1,$sqlreg);
	if ($reg->num_rows > 0){if($sum>$regnscore) {
		$sqlreg="UPDATE $regno SET `score`= '$sum' WHERE conname='$cont'";
	mysqli_query($con1,$sqlreg);}
	}else{$date = date('Y-m-d');	
		$sqlreg="INSERT INTO $regno (`num`, `conname`, `score`, `attended_on`) VALUES (NULL, '$cont', '$sum', '$date');";
		mysqli_query($con1,$sqlreg);echo $sum;
	}
	$sqls="SELECT score FROM student WHERE `regno`='$regno';";
	$regs=mysqli_query($con1,$sqls);
		while ($row=mysqli_fetch_row($regs)){
		$regscore=$row[0];}
		if($sum>$regscore){
			$sqlreg="UPDATE student SET `score`= '$sum' WHERE`regno`='$regno';";
			mysqli_query($con1,$sqlreg);
		}

	//$sql="UPDATE `elxirs_attended` SET `ans1`='$ans'  WHERE `regno`='$regno';";
	//mysqli_query($con,$sql);	
	?>