<?php
$email = $mysqli->real_escape_string($_POST['email']);
$stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s",$email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows==0) {
    echo '<script> alertfunc("danger","Invalide Email or Password"); </script>';
    $stmt->close();
    session_unset();
    session_destroy();
    exit();
}else {

    $user = $result->fetch_assoc();
    if (password_verify($_POST['password'],$user['password']))
         {
             $_SESSION['email'] = $user['email'];
             $_SESSION['first_name'] = $user['first_name'];
             $_SESSION['last_name'] = $user['last_name'];
             $_SESSION['active'] = $user['active'];
             $_SESSION['logged_in']=true;
             
             echo '<script>location.href = "/profile";</script>';
             $stmt->close();
             exit();
         } else {
           echo '<script> alertfunc("danger","Invalide Email or Password"); </script>';  
           $stmt->close();
           session_unset();
           session_destroy();
           exit();
         }
}

?>