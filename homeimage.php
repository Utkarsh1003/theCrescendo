<?php
require 'connect.inc.php';
$id= addslashes($_REQUEST['id']);

$image=mysql_query("select * from userimage where id=$id ");
$image=mysql_fetch_assoc($image);
$image= $image['image'];

header("Content-type:image/jpeg");

echo $image;
?>