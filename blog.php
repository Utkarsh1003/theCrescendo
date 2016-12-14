<?php
require 'core.inc.php';
require 'connect.inc.php';
require 'fb.inc.php';
$check_login = 0;
if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{
    $check_login = 1;
    $gquery = "SELECT `user_name` FROM `login_info` WHERE `user_name`='".$_SESSION['user_id']."'";
    if($gquery_run = mysql_query($gquery))
    {
        $user = mysql_result($gquery_run, 0,`user_name`);
    }
}
else
{
    $check_login = 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>



    <div class="container">

        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">Blog-theCrescendo                    
                    <small>Start here!!</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">Blog Home</li>
                </ol>
            </div>

        </div>

 <!-- test code -->


<div class="post" style="box-shadow:1px 1px 1px black,-1px -1px 1px black;padding:15px">
  
            <form action="blog.php" method="POST">
                <ul class="list-inline" id='list_PostActions'>
                    <li class='active'><p>START HERE</p></li>
                </ul>
                    <textarea class="form-control" placeholder="Title" name="title"></textarea>
                    <textarea class="form-control" placeholder="What's in your mind?"  name="des" style="height:100px"></textarea>
                    <br>
                    <input type="submit" value="POST" name="post">
            </form>
            <?php
            if(isset($_POST['post']))
            {
                header("Location:blog.php");
            }
            ?>
</div>   



<?php

if(isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['des']) && !empty($_POST['des']))  {

    $un=mysql_real_escape_string($_POST['des']);
    $uno=mysql_real_escape_string($_POST['title']);
    // $un=strtolower($_POST['title']);

    // $des=($_POST['des']);
    if($check_login || $check_fblogin)
                        {
                            if($check_login)
                            {
                                 $query= "INSERT into `blog`(title,user_name,date,description) values ('$uno','$user',CURDATE(),'$un')";
                                if(!$query_run=mysql_query($query))
                                     {
                                     echo mysql_error();
                                     }
                            }
                            else if($check_fblogin)
                            {
                                $user1 = $profile['first_name'];
                                $query= "INSERT into `blog`(title,user_name,date,description) values ('$uno','$user1',CURDATE(),'$un')";
                                if(!$query_run=mysql_query($query))
                                     {
                                     echo mysql_error();
                                     }
                               
                            }
                        }
                 

      
}

?>
<br>

<?php

$query="SELECT * from `blog` order by `date` DESC";
if($query_run=mysql_query($query))
{
while ($query_row =mysql_fetch_assoc($query_run))
{
$qid=$query_row['qid'];    
$title=$query_row['title'];
$author=$query_row['user_name'];
$date=$query_row['date'];
$description=$query_row['description'];
?>
        <div class="row">

            <div class="col-md-1">
                <p><i class="fa fa-camera fa-4x"></i>
                </p>
                <pre><?php echo $date;?></pre>
            </div>
            <!-- <div class="col-md-5">
                <a href="blog-post.html">
                    <img src="http://placehold.it/600x300" class="img-responsive">
                </a>
            </div> -->
            <div class="col-md-6">
                <h1><?php echo $title;?>
                </h1> <p>by <strong><?php echo $author;?></strong>
                </p>
                <p><?php echo $description;?></p>
                
            </div>

            <div class="comment">
                <form action="blog.php" method="POST">
               
                    <textarea style="width:250px;height:100px" placeholder="Comment.." name="cmn"></textarea>
                    <br>
                    <input type="submit" value="COMMENT" name="cmnt">
                </form>
            </div>

        </div>

        <hr>

 <?php
 }

}
else
{
    echo mysql_error();
}       
?>


 <?php

if(isset($_POST['$cmn']) && !empty($_POST['$cmn'])) {

    $cm=mysql_real_escape_string($_POST['$cmn']);
    // $uno=mysql_real_escape_string($_POST['title']);
    // $un=strtolower($_POST['title']);

    // $des=($_POST['des']);
    if($check_login || $check_fblogin)
                        {
                            if($check_login)
                            {
                                 $query= "INSERT into `answers`(aid,answers,user_name) values ('1','$cm','$user')";
                                if(!$query_run=mysql_query($query))
                                     {
                                     echo mysql_error();
                                     }
                            }
                            else if($check_fblogin)
                            {
                                $user1 = $profile['first_name'];
                                    $query= "INSERT into `answers`(aid,answers,user_name) values ('1','$cm','$user1')";
                                    if(!$query_run=mysql_query($query))
                                     {
                                     echo mysql_error();
                                     }
                               
                            }
                        }
                 

      
}

?> 

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>theCrescendo &copy;</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modern-business.js"></script>

</body>

</html>
