<?php 
session_start();
$email1=$_SESSION["femail"];
$cname=$_GET['cont'];
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


function addMore1(a){
  var inps = $('#'+a+' > div:last').data('count')+1 || 3;
  if(inps > i1)
  {i1=inps;
  document.getElementById("total").value=inps;
  }
  $('#'+a+'').append('<div data-count="'+inps+'" id="'+a+inps+'" ><b>Test Case </b><br/>Input<textarea name="'+i+'i'+inps+'" id="'+i+'i'+inps+'" class="col-sm-12" rows="3" required ></textarea>Output <textarea name="'+i+'o'+inps+'" id="'+i+'o'+inps+'" class="col-sm-12" rows="3" required ></textarea><br>Marks Alloted<input type="text" name="'+i+'m'+inps+'" id="'+i+'m'+inps+'" required><br><br><button type="button" name="remove" id=id="count'+inps+'" onclick="del_test(\''+a+inps+'\')" style="font-size:20px;font-weight:bold" class="btn btn-outline-danger btn_remove">DELETE TESTCASE</button><br></div>');
}
function del_test(div){
		$('#'+div+'').remove();
}

function goHome(){
	window.location.href = "Fquestsaved.php?message=<?php echo $cname;?>";
}
  </script>
  
</head>
<body style="background-color: #add8e6" onload="fillQ()"> 
<FORM name="f1" method="post" action="addNewq1.php">
<div class="container" style="background-color: #ffffff" id="tt">
      <div class="row justify-content-center text-center">
         <h1>Add Question</h1> 
      </div><br/>
	  <div >
          <input type="text" hidden value="<?php echo $cname;?>" id="naame" name="naame" required></h3></div><br/>
		  
	  <div class="form-group">
<fieldset>
<div class="table-responsive">
		<div id="dyn">
        
        Question:<br><textarea name="question[]" id="question[]" class="col-sm-12" rows="3"  required ></textarea> 
        <b>Test Case </b><br/>
        Input<textarea name="i1[]" id="i1[]" class="col-sm-12" rows="3" required ></textarea>
        Output<textarea name="o1[]" id="o1[]" class="col-sm-12" rows="3" required ></textarea><br>
		Marks Alloted<input type="text" name="m1[]" id="m1[]" required><br><br>
         <b>Test Case </b><br/>
       Input<textarea name="i2[]" id="i2[]" class="col-sm-12" rows="3" required ></textarea>
        Output<textarea name="o2[]" id="o2[]" class="col-sm-12" rows="3" required ></textarea><br>
		Marks Alloted<input type="text" name="m2[]" id="m2[]" required><br>
		<div id=div1></div>
  <br><button type="button" name="add_t" id="add_t" onclick="addMore1('div1')" style="font-size:20px;font-weight:bold" class="btn btn-outline-dark">ADD TESTCASE</button><br>
      </fieldset></div>
	  <input type="text" hidden name="total" id="total">
	  <button type="button"   class="btn btn-secondary" onclick="goHome()">BACK </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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