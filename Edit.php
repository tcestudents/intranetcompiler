<?php
session_start();
if(!isset($_SESSION["femail"])) {
	echo "Please login first ";
	}
else{
$email1=$_SESSION["femail"];
include 'connection.php';
$con = OpenCon("contest");
if(! $con)
{
    die('Connection Failed'.mysqli_error());	
}

$contest= $_GET['cont'];
$question = $_GET['question'];
$sql2="SELECT COUNT(*) FROM information_schema.columns WHERE TABLE_NAME= '$contest'	";
$re=mysqli_query($con,$sql2);
while ($row1=mysqli_fetch_row($re)){
$counting=$row1[0];}
$counting=($counting-2)/3;
$sql="SELECT question FROM $contest where question='$question'";
$result=mysqli_query($con,$sql);
while ($row=mysqli_fetch_row($result)){
		$Qname=$row[0];	 }
?>	

<!DOCTYPE html>
<html>
<head>
  <title>Update Questions</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css"> 
  <link rel="stylesheet" href="css/quest-css.css"> 
  <link rel="stylesheet" href="css/navBar.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  </head>
<script type="text/javascript">

</script>
<body style="background-color: #add8e6" > 
<form name="f1" method="post" action="fupdate.php?cont=<?php echo $contest;?>&quest=<?php echo $question;?>">
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
		<textarea  name="question" id="question" rows=5 cols=5 ><?php echo $Qname ;?></textarea>
		
		
        <br/>
		<?php 
		for($j=1;$j<=$counting;$j++)
		{
			$i='i'.$j;
			$o='o'.$j;
			$m='m'.$j;
	$s="SELECT `$i`,`$o`,`$m` FROM `$contest` WHERE question='$question'";
$res=mysqli_query($con,$s);
while ($row=mysqli_fetch_row($res))
{
		$ii=$row[0];
		$oo=$row[1];	
		$mm=$row[2];
		if(($ii!='')||($ii!=null)){
		?>
		<b>Sample Input  <?php echo $j;?> </b>
		<textarea  name="i[]" id="i[]" rows=5 cols=5 ><?php echo $ii;?></textarea><br><br>
        <b>Sample Output  <?php echo $j;?> </b>
		<textarea  name="o[]" id="o[]" rows=5 cols=5 ><?php echo $oo;?></textarea><br><br>
		<b>Mark Alloted</b>
		<textarea  name="m[]" id="m[]" rows=1 cols=5 ><?php echo $mm ;?></textarea>	<br><br>
		<?php
		}}}
		?>
        
        
      <textarea hidden name="input1" id="input1" rows=5 cols=5 ></textarea>
	   <textarea hidden name="input2" id="input2" rows=5 cols=5 ></textarea>
	    <textarea hidden name="input3" id="input3" rows=5 cols=5 ></textarea>
      <input type="submit" name="up" id="up" style=" font-weight:bold;" class="btn btn-success" value="Update">
      
		<br> <br> 
       </fieldset></div><br> 	
<input type="submit" style=" font-weight:bold;" name="submit" id="submit" class="btn btn-success" value="back" onclick="f1.action='Fquestsaved.php?message=<?php echo $contest;?>';" />
	<br> 
		
	</div>
	</div>
</form>
</body>
</html>

<?php 
}
?>	