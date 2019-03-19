<?php
for ($i = 1; $i <= 40; $i++) {
    $bytes = openssl_random_pseudo_bytes($i);
    $generated_hash   = substr(bin2hex($bytes),0,30);
} 
?>