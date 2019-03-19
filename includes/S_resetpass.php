<?php

// ESCAPE ALL $_POST TO PROTECT AGAINST SQL INJECTIONS

$password = $mysqli->real_escape_string($_POST['password']);
$email = $_SESSION['email'];

					   if (strlen($password) < 6) {
					       echo '<script> alertfunc("danger","You must have 6 or more characters in your Password!"); </script>'; 
					       exit();
					        
					    } else {
						$hashedPwd = password_hash($password, PASSWORD_BCRYPT); 
						$time=0;
						$stmt = $mysqli->prepare("UPDATE users SET password=?, time=? WHERE email=?");
						
						$stmt->bind_param("sss",$hashedPwd,$time, $email);
					    }
							if ($stmt->execute()) {
							     // SET VALUES TO BE USED ON MAIN PROFILE
                                  $_SESSION['Success']=true;
                                  echo '<script> alertfunc("success","Your password has been successfully reset!"); </script>';
                                  
                                 $stmt->close();   
                                
                                 echo '<script>window.setTimeout(function redirect(){location.href = "/";},2500);</script>';
                                 
                                 
								 exit();
							} else {
							 echo '<script> alertfunc("danger","Unknown error. Try again later!"); </script>';
							 //echo '<script>location.href = "/JoinNow?err=register";</script>';
							exit();			
							}
				
		
?>
