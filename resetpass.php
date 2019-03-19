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
<head>
<title>Reset Password</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}


</style>
</head>

<body class="w3-dark-grey">
<!-- Header -->

<header class="w3-display-container  w3-content" style="max-width:1700px;"> 
  
 <img class="w3-image"  src="images/networking-gears.png"  style="min-width:600px" width="1700px">
  <div class="w3-display-topmiddle w3-padding-64" style="width:40%">
     
    <div  class="w3-container w3-red w3-card-4 w3-padding-16 " style="min-width:300px" >
      <h3><center>We have sent you an email with a password reset code. Please enter it below.</center></h3>
      <form action="register" autocomplete="off" method="POST">
        <div class="w3-container">
          <label>Email</label>
          <input class="w3-input w3-border" type="text" name="email">
        </div>
        <div class="w3-container">
          <label>Reset Code</label>
          <input class="w3-input w3-border" type="text" name="reset_code">
        </div>
        <div class="w3-container">
          <label>Password (6 or more characters)</label>
          <input class="w3-input w3-border" type="password" name="password">
        </div>
       <p>
     <center>
          <button class="w3-button w3-dark-grey w3-border" name="register_btn">Reset Password</button>
        </center>
        </p>
        </form>
     
    </div>
         
        <!alert boxes>
        <p id="alertbox"> </p>

  </div>

 </header>
<div class="w3-container w3-center w3-xlarge w3-red w3-text-whiter w3-padding-64">
    <div class="w3-margin">Go Gear...Go</div>
</div>

<div class="w3-container w3-center">
<h3>Contact</h3>
    <i class="fa fa-map-marker" style="width:30px"></i> Athens, Gr<br>
    
</div>

<script src=js/alert.js></script>
<script>
    var qs = (function(a) {
    if (a == "") return {};
    var b = {};
    for (var i = 0; i < a.length; ++i)
    {
        var p=a[i].split('=', 2);
        if (p.length == 1)
            b[p[0]] = "";
        else
            b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
    }
    return b;
})(window.location.search.substr(1).split('&'));

    var userNameField = document.getElementsByName("email")[0];
    var resetCodeField = document.getElementsByName("reset_code")[0];
    if(typeof qs['email'] !== "undefined")
    userNameField.value = qs['email'];
    if(typeof qs['h'] !== "undefined")
    resetCodeField.value = qs['h'];
</script>

<?php
if ($_SERVER['REQUEST_METHOD']=='POST')
{
    if (isset($_POST['reset_btn'])) {
        
        require 'includes/S_resetpass.php';
    }
 }
?>

</body>
</html>