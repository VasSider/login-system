<?php

// ESCAPE ALL $_POST TO PROTECT AGAINST SQL INJECTIONS


$first_name = $mysqli->real_escape_string($_POST['first_name']); 
$last_name = $mysqli->real_escape_string($_POST['last_name']);
$email = $mysqli->real_escape_string($_POST['email']);
$password = $mysqli->real_escape_string($_POST['password']);
require 'hash_generator.php';
$hash = $mysqli->real_escape_string($generated_hash);


if (empty($first_name) || empty($last_name) || empty($email) || empty($password))
	{   
	    
	    echo '<script> alertfunc("danger","Feel all the fields!"); </script>';
	     //echo '<script>location.href = "/JoinNow?err=empty";</script>';
	   
		exit();
	} else {
		if (!preg_match("/^[a-zA-Z]*$/", $first_name) || !preg_match("/^[a-zA-Z]*$/", $last_name))
			{
				 echo '<script> alertfunc("danger","Fisrt and Last name must contain only letters!"); </script>';
				 //echo '<script>location.href = "/JoinNow?err=name";</script>';
				exit();
			} else {
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				    
					 echo '<script> alertfunc("danger","Invalid Email!"); </script>';
					 //echo '<script>location.href = "/JoinNow?err=inv_email";</script>';
					exit();
				} else {
					$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());
					if ($result->num_rows >0) {
					     echo '<script> alertfunc("danger","Email Exist!"); </script>';
						 //echo '<script>location.href = "/JoinNow?err=ex_email";</script>';
						exit();
					} else { //need 6 or more characters
					    if (strlen($password) < 6) {
					       echo '<script> alertfunc("danger","You must have 6 or more characters in your Password!"); </script>'; 
					       exit();
					        
					    }
						$hashedPwd = password_hash($password, PASSWORD_BCRYPT); 
						$stmt = $mysqli->prepare("INSERT INTO users (first_name, last_name, email, password, hash)"
						. "VALUES (?,?,?,?,?)");
						
						$stmt->bind_param("sssss",$first_name,$last_name, $email, $hashedPwd, $hash);
						
							if ($stmt->execute()) {
							     // SET VALUES TO BE USED ON MAIN PROFILE
                                  echo '<script> alertfunc("success","Successful Registration! Activation Email has been send to you."); </script>';
                                
                                require 'S_verification_email.php';
                                 $stmt->close();   
                                 session_destroy(); 
                                 echo '<script>window.setTimeout(function redirect(){location.href = "/";},2500);</script>';
                                 
                                 
								 exit();
							} else {
							 echo '<script> alertfunc("danger","Unknown error. Try again later!"); </script>';
							 //echo '<script>location.href = "/JoinNow?err=register";</script>';
							exit();			
							}
						}
				}
		}
	}
?>
