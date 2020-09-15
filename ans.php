<?php
session_start();
if(!isset($_SESSION["email"])) {
	echo "Please login first ";
	
}
else{
$email1=$_SESSION["email"];
include 'connection.php';
$con = OpenCon("contest");
if(! $con)
{
    die('Connection Failed'.mysqli_error());	
}
$con1 = OpenCon("student");
	$sql="SELECT name,regno FROM student WHERE email='$email1'";
	if ($result=mysqli_query($con1,$sql)){
		 while ($row=mysqli_fetch_row($result)){
		$name=$row[0];
		$regno=$row[1];
	}}
$contest= $_GET['cont'];
$num = $_GET['num'];
$contatt=$contest.'_attended';
$cans='a'.$num;
$s_sql="SELECT `$cans` FROM `$contatt` WHERE `regno`='$regno'";
if ($s_result=mysqli_query($con,$s_sql)){
		 while ($s_row=mysqli_fetch_row($s_result)){
		$code=$s_row[0];
	}}echo $code;
	
		if(isset($_POST["score"]))
		{
		$score=$_POST["score"];
		}

$sql2="SELECT COUNT(*) FROM information_schema.columns WHERE TABLE_NAME= '$contest'	";
$re=mysqli_query($con,$sql2);
while ($row1=mysqli_fetch_row($re)){
$numoft=$row1[0];}
$numoft=($numoft-2)/3;
$mm=1;
for($i=0;$i<$numoft;$i++){
	$m='m'.$mm;
	$sql2="SELECT $m FROM `$contest` where num='$num'";$mm+=1;
	$re=mysqli_query($con,$sql2);
	while ($row1=mysqli_fetch_row($re)){
	if($row1[0]!=null){
	$mark[$i]=$row1[0];}
	}
}

$sql="SELECT question,i1,o1,i2,o2 FROM $contest where num='$num'";
$result=mysqli_query($con,$sql);
if($result){
while ($row=mysqli_fetch_row($result)){
		$Qname=$row[0];
		$i1=$row[1];
		$o1=$row[2];
		$i2=$row[3];
		$o2=$row[4];		 }
?>	
<!---compiler---->
<script type="text/javascript">


</script>

<!---/compiler---->
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $contest ;?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css"> 
  <link rel="stylesheet" href="css/quest-css.css"> 
  <link rel="stylesheet" href="css/navBar.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<style>
</style>
  </head>
<script type="text/javascript">
function bk(){
window.location.href = "Squestion.php?message=<?php echo $contest?>";
}
function wrt(){
	document.getElementById("input1").value="<?php echo $contest; ?>";
	document.getElementById("input2").value="<?php echo $num; ?>";
}

</script>
<body style="background-color: #add8e6" onload="wrt()"> 
<form name="f1" method="post" action="compile.php">
<div class="container" style="background-color: #ffffff" id="tt">

      <div class="row justify-content-center text-center">
        <h1 style="text-transform:uppercase;"><?php echo $contest ;?></h1>
      </div>
      <br/>
	<div class="form-group">
            <div id="1" class="table-responsive">
      <fieldset>
        <legend>Question Set</legend>
       <b> Question:</b><br>
	   
        <pre><?php echo $Qname ;?></pre>
        <br/>
		<table align="center" width="30%"><th>TEST CASES</th><th>WEIGHTAGE</th>
			   <?php $ij=1;
	   for($ii=0;$ii<sizeof($mark);$ii++)
	   {
	   echo "<tr><td>Testcase $ij </td><td> $mark[$ii] marks</td></tr>";
		   $ij++;
	   }
	   ?>
	   </table>
	   <br/>
        <b>Sample Input </b>
		<pre>
		<?php echo $i1 ;?></pre><br><br>
        <b>Sample Output </b>
		<pre>
		<?php echo $o1 ;?></pre><br><br>
        <b>Your Code</b>		
      <?php
	  if($code){
	  ?> 
	  <textarea name="code" id="code" rows=10 cols=5 onkeydown=insertTab(this,event) id="code" ><?php echo $code?>	  </textarea>
	  <?php
	  }else{
	  ?>
	   <textarea name="code" id="code" rows=10 cols=5 onkeydown=insertTab(this,event) id="code" >#include<stdio.h>&#13;&#10;int main() {&#13;&#10;&#13;&#10;&#13;&#10;&#13;&#10;return 0; &#13;&#10;}  
	  </textarea>
	  <?php
	  }
	  ?>
	  
      <span id="errorCode" class="error"></span><br/><br/>
           <textarea hidden name="input1" id="input1" rows=5 cols=5 ></textarea>
	   <textarea hidden name="input2" id="input2" rows=5 cols=5 ></textarea>
      <input type="reset" value="Reset" class="btn btn-danger"><br/>
	  <div align="right" width="100%" height="100%" style="background-color: ">
	  <button   type="submit" name="add" id="add" style="font-size:20px;font-weight:bold" formaction="test.php" class="btn btn-success">COMPILE</button>
	  <button   type="submit" name="add" id="add" style="font-size:20px;font-weight:bold" class="btn btn-success">SUBMIT</button>
	  
	  </div>
		<br> <br> 
       </fieldset></div><br> 	
<input type="button" style=" font-weight:bold;"  class="btn btn-success" value="Back" onclick="bk()" />
	<br> 
		
	</div>
	</div>
</form>
</body>
</html>

<?php 
}
else{
	echo "page doesnot exist...";
}	
}
?>	
