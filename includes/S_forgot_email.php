<?php
//initialize email function
$Subject = 'Forgot Password (SpinGear)';

$Body= 'Hello '.$first_name.',
I hear you have forgotten your password! No worries, we will help you!!!

Email: '.$email.'

Reset code: '.$hash.'

Reset here: https://spingear.000webhostapp.com/resetpass?email='.$email.'&h='.$hash.'

Then enter your new password!

For your security, this password reset code will expire in about 10 minutes, and it can only be used once.

If you suddenly remember your password, feel free to ignore this email and your current password will still work.

Thanks for being part of our community!' ;

mail($email,$Subject,$Body);                                
       
?>