<?php
require 'includes/S_database_conn.php';

if (isset($_SESSION['logged_in'])) {
    if ($_SESSION['logged_in'] == true)  {
        echo '<script>location.href = "profile";</script>';
        exit();
    }
}

if (isset($_GET['email']) && !empty($_GET['email']) && isset($_GET['h']) && !empty($_GET['h'])) {
    $email_unsafe = $_GET['email'];
    $hash_unsafe = $_GET['h'];    
    $email = $mysqli -> real_escape_string($email_unsafe); 
    $hash = $mysqli -> real_escape_string($hash_unsafe); 
    
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ? AND hash = ? AND active = 0");
    $stmt->bind_param("ss", $email, $hash);
    $stmt->execute();
    $result = $stmt->get_result();
 
    if ($result->num_rows==0) {
        $message = 'Account has already been activated or Invalide URL.';
        $stmt->close();
    } else {
        $stmt = $mysqli->prepare('UPDATE users SET active = 1 WHERE email = ? AND hash = ?') or die($mysqli -> error);
        $stmt->bind_param("ss", $email, $hash); 
        $stmt->execute();
        $stmt->close();
        
        $message = 'Your account has been successfully activated!';
    }
    
}
 else {
    $message = 'Invalid parameters for account verification.';
}


?>
    
<!DOCTYPE html>
<html>
<head>
<title>Account Verify</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}


</style>
</head>
<body class="w3-dark-grey">
<!-- Header -->

<header class="w3-display-container  w3-content" style="max-width:1700px;"> 
  
   <img class="w3-image"  src="images/networking-gears.png"  style="min-width:600px" width="1700px">
  <div class="w3-display-middle" style="width:50%">
     
    <div  class="w3-container w3-red w3-card-4 w3-padding-16 " style="min-width:300px" >
      <h3><center><?php echo $message ?></center></h3>
    </div>
    </div>

</header>
<div class="w3-container w3-center w3-xlarge w3-red w3-text-whiter w3-padding-64">
    <div class="w3-margin">Go Gear...Go</div>
</div>

<div class="w3-container w3-center">
<h3>Contact</h3>
    <i class="fa fa-map-marker" style="width:30px"></i> Athens, Gr<br>
    
</div>

<script>window.setTimeout(function redirect(){location.href = "/";},2500);</script>

</body>
</html>