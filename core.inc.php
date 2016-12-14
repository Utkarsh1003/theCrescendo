<?php
ob_start();
@session_start();
$current_file = $_SERVER['SCRIPT_NAME'];

// function getfield($field)
// {
// 	$gquery = "SELECT `$field` FROM `login_info` WHERE `user_email`='".$_SESSION['user_id']."'";
// 	if($gquery_run = mysql_query($gquery))
// 	{
// 		return mysql_result($gquery_run, 0,$field);
// 	}
// }
?>