<?php
//initialize email function
$Subject = 'Verification Email (SpinGear)';
$Body = 'Hello '.$first_name.',
You are almost there!!!
Please click the link below to activate you account
https://spingear.000webhostapp.com/verify?email='.$email.'&h='.$hash.'';

mail($email,$Subject,$Body);                                
                                    
?>