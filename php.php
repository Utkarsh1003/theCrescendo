<?php
require 'connect.inc.php';
$user_email = $_POST['user_email'];
$password = $_POST['password'];
$password_hash = md5($password);

$query = "INSERT INTO 'login_info' VALUES ('".mysql_real_escape_string($user_email)."','".mysql_real_escape_string($password_hash)."')";
$query_run = mysql_query($query);
?>