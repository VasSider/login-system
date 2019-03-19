<?php
session_start();

    if (empty($_SESSION['logged_in']) || ($_SESSION['logged_in'] != true) ) {
        echo '<html><h1>You have to login...</h1></html>'; 
        session_destroy();
        echo '<script>window.setTimeout(function redirect(){location.href = "/";},2000);</script>';
        exit();
    } else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}

if ($active==0) {
     
        echo '<html><h1>You need activate you account first.</h1></html>';
        session_unset();
        session_destroy();
        echo '<script>window.setTimeout(function redirect(){location.href = "/";},4000);</script>';
        exit();
 }
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome <?= $first_name.' '.$last_name ?></title>
  
</head>

<body>
  <form action="profile" method="POST">

          <h1>Welcome</h1>
          
          <h2><?php echo $first_name.' '.$last_name; ?></h2>
          <p><?= $email ?></p>
          
          <button class="button button-block" name="logout"/>Log Out</button>

    </form>
    
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<?php
if ($_SERVER['REQUEST_METHOD']=='POST')
{
    if (isset($_POST['logout'])) {
        
        session_unset();
        session_destroy();
        session_write_close();
        echo '<script>location.href = "/";</script>';
        exit();
    }
  }
?>

</body>
</html>
