 <?php

$dbServerName = "localhost";
$dbUsername = "...Your UserName...";
$dbPassword = "...Your Password...";
$dbName = "...Your DataBase Name... ";

$mysqli = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName) or die($mysqli->error);

?>
