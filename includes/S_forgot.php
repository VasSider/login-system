<?php
$email = $mysqli->real_escape_string($_POST['email']);
$stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s",$email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows==0) {
    echo '<script> alertfunc("danger","Invalide Email"); </script>';
    $stmt->close();
    session_unset();
    session_destroy();
    exit();
} else  {     
            $user = $result->fetch_assoc();
            if ($user['active']==0) {
                echo '<script> alertfunc("danger","You have to activate your account first."); </script>';
                echo '<script>window.setTimeout(function redirect(){location.href = "/";},2500);</script>';
                exit();
            } elseif  (time()-$user['time'] < 600) { //10min
                echo '<script> alertfunc("danger","You already have a forgot-password link.."); </script>';
                echo '<script>window.setTimeout(function redirect(){location.href = "/";},2500);</script>';
                exit();
            } else {
                // time and new hash in database
                $first_name = $user['first_name'];
                $stmt->close();
                
                $time = time();
                require 'hash_generator.php';
                $hash = $mysqli->real_escape_string($generated_hash);
                
                $stmt = $mysqli->prepare("UPDATE users SET hash=?, time=? WHERE email=?");
                $stmt->bind_param("sis",$hash,$time,$email);
                $stmt->execute();
                
                echo '<script> alertfunc("success","A link for reset your password has been sent to your email."); </script>';
                require "S_forgot_email.php";
                echo '<script>window.setTimeout(function redirect(){location.href = "/";},2500);</script>';
                
                $stmt->close();
                exit();
            }
         } 

?>
