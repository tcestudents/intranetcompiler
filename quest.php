<?php 
session_start();
$email1=$_SESSION["femail"];

?>
<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css"> 
  <link rel="stylesheet" href="css/quest-css.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script>
$(document).ready(function(){
  	var i=1;
	$('#add').click(function(){
		i++;
		$('#dyn').append('<div id="d'+i+'"><fieldset><legend>Question Set</legend>Question:<br><textarea id="question[]" name="question[]" class="col-sm-12" rows="5" ></textarea><b>Test Case 1</b><br/>Input<textarea name="i1[]" id="i1[]" class="col-sm-12" rows="5" ></textarea>Output <textarea name="o1[]" id="o1[]" class="col-sm-12" rows="5" ></textarea><br><b>Test Case 2</b><br/>Input<textarea name="i2[]" id="i2[]" class="col-sm-12" rows="5" ></textarea>Output<textarea name="o2[]" id="o2[]" class="col-sm-12" rows="5" ></textarea><br><b>Test Case 3</b><br/>Input<textarea name="i3[]" id="i3[]" class="col-sm-12" rows="5" ></textarea>Output<textarea name="o3[]" id="o3[]" class="col-sm-12" rows="5" ></textarea><br><br><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Delete</button><br></fieldset></div>');	
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
		$('#d'+button_id+'').remove();
	});
	
	$('#submit').click(function(){		

		alert("Submited");
		//header("location:Slog.php");
		location.href='quest1.php';
		
	});
});
  </script>

</head>
<body style="background-color: #add8e6"> 
<FORM method="post" action="quest1.php">
<div class="container" style="background-color: #ffffff" id="tt">

      <div class="row justify-content-center text-center">
        <h1>Question Creation Page</h1>
      </div>
	        <br/>
		<div >
          <h3>Name of the Contest&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="text" id="naame" name="naame" >    </h3>
		</div>
      <br/>	
	  <div class="form-group">
	        <fieldset>

<div class="table-responsive">

						<div id="dyn">
						

        <legend>Question Set</legend>
        Question:<br>
        <textarea name="question[]" id="question[]" class="col-sm-12" rows="5" >
        </textarea>
        <b>Test Case 1</b><br/>
        Input<textarea name="i1[]" id="i1[]" class="col-sm-12" rows="5" ></textarea>
        Output<textarea name="o1[]" id="o1[]" class="col-sm-12" rows="5" ></textarea><br>
         <b>Test Case 2</b><br/>
       Input<textarea name="i2[]" id="i2[]" class="col-sm-12" rows="5" ></textarea>
        Output<textarea name="o2[]" id="o2[]" class="col-sm-12" rows="5" ></textarea><br>
         <b>Test Case 3</b><br/>
       Input<textarea name="i3[]" id="i3[]" class="col-sm-12" rows="5" ></textarea>
        Output<textarea name="o3[]" id="o3[]" class="col-sm-12" rows="5" ></textarea><br><br>
		
      </fieldset></div><button type="button" name="add" id="add" class="btn btn-success">Add More</button>
	<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info" />
	<br>
	<br>
	</div>

      </fieldset>
	  <br>
	<br>
	
</div>
</div>
</form>
</body>
</html>

