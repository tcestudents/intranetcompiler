<?php 
session_start();
$email1=$_SESSION["femail"];
$cname=$_REQUEST['naame'];
include 'connection.php';
	$con = OpenCon("contest");
if(! $con)
{
    die('Connection Failed'.mysqli_error());
	
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Create Contest</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css"> 
  <link rel="stylesheet" href="css/quest-css.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
  <script>
  var i1=2;var i=1;
$(document).ready(function(){
  	var tNum=2;
	$('#add').click(function(){
	i++;
	var inps = $('#dyn > div:last').data('count')+1 || 0;
	$('#dyn').append('<br><fieldset id="d'+i+'"><div id="div'+i+'"><legend>Question Number '+i+'</legend>Question:<br><textarea id="question[]" name="question[]" class="col-sm-12" rows="3" required ></textarea><b>Test Case 1</b><br/>Input<textarea name="i1[]" id="i1[]" class="col-sm-12" rows="3" required ></textarea>Output <textarea name="o1[]" id="o1[]" class="col-sm-12" rows="3" required ></textarea><br>Marks Alloted<input type="text" name="m1[]" id="m1[]" required><br><b>Test Case 2</b><br/>Input<textarea name="i2[]" id="i2[]" class="col-sm-12" rows="3" required ></textarea>Output<textarea name="o2[]" id="o2[]" class="col-sm-12" rows="3" required ></textarea><br>Marks Alloted<input type="text" name="m2[]" id="m2[]" required></div><br><button type="button" name="add_t" id="add_t" onclick="addMore1(\'div'+i+'\')" style=\"font-size:20px;font-weight:bold\" class=\"btn btn-outline-dark\">ADD TESTCASE</button><br><br><button type="button" name="remove" id="'+i+'" style="font-size:20px;font-weight:bold" class="btn btn-outline-danger btn_remove">DELETE QUESTION</button><br></fieldset>');	
	});
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
		$('#d'+button_id+'').remove();
	});
	
	/*
	$('#submit').click(function(){		

		alert("Submited");
			location.href='dq1.php';
		
	});
*/
});
function addMore1(a){
  var inps = $('#'+a+' > div:last').data('count')+1 || 3;
  if(inps > i1)
  {i1=inps;
  document.getElementById("total").value=inps;
  }
  $('#'+a+'').append('<div data-count="'+inps+'" id="'+a+inps+'" ><b>Test Case '+inps+'</b><br/>Input<textarea name="'+i+'i'+inps+'" id="'+i+'i'+inps+'" class="col-sm-12" rows="3" required ></textarea>Output <textarea name="'+i+'o'+inps+'" id="'+i+'o'+inps+'" class="col-sm-12" rows="3" required ></textarea><br>Marks Alloted<input type="text" name="'+i+'m'+inps+'" id="'+i+'m'+inps+'" required><br><br><button type="button" name="remove" id=id="count'+inps+'" onclick="del_test(\''+a+inps+'\')" style="font-size:20px;font-weight:bold" class="btn btn-outline-danger btn_remove">DELETE TESTCASE</button><br></div>');
}
function del_test(div){
		$('#'+div+'').remove();
}
function fillQ(){
	<?php
	$q = "SELECT `con_name` FROM `saved` WHERE `con_name`='$cname'";
	$result = $con->query($q);
	if ($result->num_rows > 0) {
	echo "alert(\"Contest name exist\");";
	echo "location.replace(\"create.php\")";
	}?>	
}
function goHome(){
	
	location.replace("Fhome.php");
}
  </script>
  
</head>
<body style="background-color: #add8e6" onload="fillQ()"> 
<form name="f1" method="post" action="dq1.php">
<div class="container" style="background-color: #ffffff" id="tt">
      <div class="row justify-content-center text-center">
        <h1>Contest Creation Page</h1>
      </div><br/>
	  <div >
          <input type="text" hidden value="<?php echo $cname;?>" id="naame" name="naame" required></h3></div><br/>
		  
	  <div class="form-group">
<fieldset>
<div class="table-responsive">
		<div id="dyn">
        <legend>Question  Number 1</legend>
        Question:<br><textarea name="question[]" id="question[]" class="col-sm-12" rows="3"  oninvalid="this.setCustomValidity('Fill the question1')" required ></textarea> 
        <b>TEST CASE 1</b><br/>
        Input<textarea name="i1[]" id="i1[]" class="col-sm-12" rows="3" required ></textarea>
        Output<textarea name="o1[]" id="o1[]" class="col-sm-12" rows="3" required ></textarea><br>
		Marks Alloted<input type="text" name="m1[]" id="m1[]" required><br><br>
         <b>Test Case 2</b><br/>
       Input<textarea name="i2[]" id="i2[]" class="col-sm-12" rows="3" required ></textarea>
        Output<textarea name="o2[]" id="o2[]" class="col-sm-12" rows="3" required ></textarea><br>
		Marks Alloted<input type="text" name="m2[]" id="m2[]" required><br>
		<div id=div1></div>
  <br><button type="button" name="add_t" id="add_t" onclick="addMore1('div1')" style="font-size:20px;font-weight:bold" class="btn btn-outline-dark">ADD TESTCASE</button><br>
      </fieldset></div>
	  <input type="text" hidden  name="total" id="total">
	  <button type="button" name="add" id="add" style="font-size:20px;font-weight:bold" class="btn btn-outline-dark">ADD MORE</button>&nbsp;&nbsp;&nbsp;
	  <button type="button"   class="btn btn-secondary" onclick="goHome()">BACK TO HOME</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="button" name="save" id="save" value="SAVE" class="btn btn-info" data-toggle="modal" data-target="#myModal"/><br><br>
 
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">      
		  <div class="modal-body">
          <div class="bs-example">
   	<p  style="font-size: 25px;">
	   Alert<br>
   Do you want to save it</p>
</div>
        </div>
        <div class="modal-footer">
		<input type="submit" name="submit" id="submit" value="SAVE" class="btn btn-info btn-sm" />
          <input type="button"  value="CLOSE"data-dismiss="modal" class="btn btn-danger" />
        </div>
      </div>
    </div>
  </div>
	
	</div></fieldset><br><br>	
</div>
</div>
</form>
</body>
</html>