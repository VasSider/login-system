<?php
session_start();
require 'includes/S_database_conn.php';

if (isset($_SESSION['logged_in'])) {
    if ($_SESSION['logged_in'] == true)  {
        echo '<script>location.href = "profile";</script>';
        exit();
    }
}

?>

<!DOCTYPE html>
<html>
<title>SpinGear</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}

.spin{

animation:spin 10s linear infinite;
}
/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<body>


<!-- Header -->
<header class="w3-container w3-red w3-center" style="padding:135px 16px">
  <h1 class="w3-margin w3-jumbo">CREATE YOUR GEAR</h1>
  
 <a href="/register" class="w3-button w3-border w3-dark-grey w3-padding-large w3-large w3-margin-top">Get Started</a>
</header>


<div class="w3-card-4 w3-top w3-red">
   
    <form action="/" method="POST">
      <div class = "w3-row-padding w3-container w3-center" style= "width=100%";>

        <div class="w3-col m3" style="padding:10px";>
          <input class="w3-input w3-border" type="text" placeholder="Email" name="email" required>
    </div>
    <div class="w3-col m3" style="padding:10px";>
      
      <input class="w3-input w3-border" type="password" placeholder="Password" name="password" required>
      <br ><a href="forgot" style="color:white">Forgot Password?</a></br>
    </div>
    <div class="w3-col s1" style="padding:10px";>
      
      <button id="SignIn" name="sign_btn" class="w3-button w3-border w3-dark-grey">Sign in</button>
    </div>
     <div class = "w3-row-padding w3-container w3-display-right w3-col m4" id = "alertbox"></div>
	
  </div>
   
<div class = "w3-row-padding w3-container w3-center" style= "width=100%";>



</div>
 </form>

     
  </div>
  
     

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird w3-center">
      <h1>Give a spin!</h1>
      <h5 class="w3-padding-32  w3-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h5>      
    </div>

    <div class="w3-third w3-center">
      <img src = "images/Gear-icon.png" alt="Gear" style ="height:250px;width:250px" class="spin" /> 
    </div>
  </div>
</div>


<div class="w3-container w3-xlarge w3-dark-grey w3-text-white w3-center w3-padding-64">
    
</div>

<!-- Footer -->
<div class="w3-container w3-center">
<h3>Contact</h3>
    <i class="fa fa-map-marker" style="width:30px"></i> Athens, Gr<br>
</div>


<script src= "js/alert.js"></script>

<?php
if ($_SERVER['REQUEST_METHOD']=='POST')
{
    if (isset($_POST['sign_btn'])) {
        
        require 'includes/S_login.php';
    }
  }
?>
</body>
</html>