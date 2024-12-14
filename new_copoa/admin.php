<?php 
    include("login.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login</title>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="row border rounded-5 p-3 bg-white shadow box-area">
    <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #0c8b85;">
           <div class="featured-image mb-3">
            <img src="ss.jpg" class="img-fluid" style="width: 250px;">
           </div>
           <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">CMRU</p>
           <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Welcome to CMRU Login.</small>
       </div> 

       <div class="col-md-6 right-box">
          <div class="row align-items-center">
          <div class="header-text mb-4">
                     <b><h2>Welcome to Admin Login,</h2></b>
                     <p>Please login to continue.</p>
                </div>
    <div id="form">
        <form name="form" onsubmit="return isValid()" method="POST">
            <div class="input-group mb-3">
            <input type="text" class="form-control form-control-lg bg-light fs-6" id="user" name="user" placeholder="Email address"></br></br>
    </div>
    <div class="input-group mb-1">
            <input type="password" class="form-control form-control-lg bg-light fs-6" id="pass" name="pass" placeholder="Password"></br></br>
    </div>
    <div class="input-group mb-5 d-flex justify-content-between">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="formCheck">
                        <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                    </div>
                    <div class="forgot">
                        <small><a href="#">Forgot Password?</a></small>
                    </div>
    </div>
    <div class="input-group mb-3">
            <input type="submit" id="btn" value="Submit" name="submit"/>
    </div>
        </form>
    </div>
    <script>
        function isValid() {
            var user = document.forms["form"]["user"].value;
            var pass = document.forms["form"]["pass"].value;
            
            if (user.length === 0 && pass.length === 0) {
                alert("Email and password fields are empty!");
                return false;
            } else if (user.length === 0) {
                alert("Email field is empty!");
                return false;
            } else if (pass.length === 0) {
                alert("Password field is empty!");
                return false;
            }

            // You can add additional validation or processing logic here if needed.

            return true;
        }
    </script>
</body>
</html>