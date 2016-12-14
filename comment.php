<?php 
require 'blogtest.php';
if(isset($_POST['post_id']) && isset($_POST['name1']) && isset($_POST['comment']))
{
$username = $_POST['name1'];
// $email=$_POST['email'];
// $email=mysql_real_escape_string($email);
$ucomment=mysql_real_escape_string($_POST['comment']); 
$post_id=$_POST['post_id'];
// $lowercase = strtolower($email);
// $image = md5( $lowercase );
if(!mysql_query("insert into comments(com_name,com_dis,post_id_fk) values ('$name','$comment_dis','$post_id')"))
{
    echo mysql_error();
}
?>

<li class="box">
<?php echo $username; ?><br />
<?php echo $ucomment; ?>
</li>
<?php
}

?>