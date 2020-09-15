<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container" style="padding: 30px;">
  
 
<h2>Profile Page</h2>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    See Profile
  </button>

  
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        
        <div class="modal-header">
          <h4 class="modal-title-center">My Profile</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        

        <div class="modal-body">
          <div class="bs-example">
    <table class="table table-borderless">
        
        <tbody>
            <tr>
                <td><b>Name</b></td>
                <td>Ravenaa</td>
               
            </tr>
            <tr>
                <td><b>Department</b></td>
                <td>IT</td>
                
            </tr>
            <tr>
                <td><b>Reg no</b></td>
                <td>18IT070</td>

            </tr>   
            <tr>
                <td><b>Email</b></td>
                <td>raveena@gmail.com</td>

            </tr>    
            <tr>
                <td><b>User</b></td>
                <td>student</td>

            </tr>   
        </tbody>
    </table>
</div>
        </div>
        
        
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>

</body>
</html>
