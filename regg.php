<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <title>Students Registration</title>
	<link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <link href="css/main.css" rel="stylesheet" media="all">
	
</head>
<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100" >
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Student Registration</h2>
   <form name="form1" method="POST" action="register1.php" onsubmit="load();" >
                        <div class="input-group">
							<input  class="input--style-3" type="text" name="name"  placeholder="Name">
                        </div>
												                        <div class="input-group">
                            
							<input class="input--style-3" type="text" name="regno" placeholder="Register number">
           
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
								<select name="department" id="department">
							  <option disabled="disabled" selected="selected" value="">Department</option>
							  <option value="IT">IT</option>
							  <option value="CSE">CSE</option>
							  <option value="MECH">MECH</option>
							  <option value="CIVIL">CIVIL</option>
							  <option value="ECE">ECE</option>
							  <option value="EEE">EEE</option>
							  <option value="MECT">MECT</option>
							</select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
						<div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <div class="select-dropdown">
								<select name="year" id="year">
								 <option disabled="disabled" selected="selected" value="">Year</option>
							  <option value="1">1</option>
							  <option value="2">2</option>
							  <option value="3">3</option>
							  <option value="4">4</option>
							</select></div>
                            </div>
                        </div>
						<div class="row row-space">
                            <div class="col-3">
                                <div class="input-group">
                                    <input class="input--style-3" type="email" name="email" placeholder="Email" >
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                           
							<input class="input--style-3" type="password"  placeholder="Password" name="p11" id="p11" >
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password"  placeholder="Confirm Password" name="p1" id="p1" >
                        </div>
                        <div class="p-t-10">
                            
							<input type="submit" value="Submit" class="btn btn--pill btn--green" name="submit" onclick="return check();"><br><br>
							 
							 <button class="btn btn--pill btn--green" onclick="redirect();" type="button">Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>
    <script src="js/global.js"></script>
	
	<script>
function check()
{

 if(document.form1.name.value=="")
  {
    alert("Please Enter name ");
	document.form1.name.focus();
	return false;

}
 if(document.form1.department.value=="")
  {
    alert("Please Select department ");
	document.form1.department.focus();
	return false;

}
 if(document.form1.year.value=="")
  {
    alert("Please Select year ");
	document.form1.year.focus();
	return false;

}
  if(document.form1.email.value=="")
  {
    alert("Please Enter your Email Address");
	document.form1.email.focus();
	return false;
  }
  e=document.form1.email.value;
		f1=e.indexOf('@');
		f2=e.indexOf('@',f1+1);
		e1=e.indexOf('.');		
		e2=e.indexOf('.',e1+1);
		n=e.length;

if(!(f1>0 && f2==-1 && e1>0 && e2>=-1 && f1!=e1+1 && e1!=f1+1 && f1!=n-1 && e1!=n-1))
		{
			alert("Please Enter valid Email");
			document.form1.email.focus();
			return false;
		}
 if(document.form1.regno.value=="")
  {
    alert("Plaese Enter Your Register number");
	document.form1.regno.focus();
	return false;
  } 
 if(document.form1.p11.value=="")
  {
    alert("Please Enter Your Password");
	document.form1.p11.focus();
	return false;
  }
  
  if(document.form1.p1.value=="")
  {
    alert("Please Enter Confirm Password");
	document.form1.p1.focus();
	return false;
  }
  if(document.form1.p11.value!=document.form1.p1.value)
  {
    alert("Confirm Password does not matched");
	document.form1.p1.focus();
	return false;
  }

 if(document.form1.p11.value.length<8)
  {
    alert("Password less than 8 characters");
	document.form1.p11.focus();
	return false;
  }

return true;
}

</script>
</body>

</html>
