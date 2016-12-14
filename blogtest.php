<?php
require 'core.inc.php';
require 'connect.inc.php';
require 'fb.inc.php';
error_reporting(E_ERROR | E_PARSE);
$check_login = 0;
if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{
    $check_login = 1;
    $gquery = "SELECT `user_name` FROM `login_info` WHERE `user_email`='".$_SESSION['user_id']."'";
    if($gquery_run = mysql_query($gquery))
    {
        $user = mysql_result($gquery_run, 0,`user_name`);
    }
    $g1query = "SELECT `user_email` FROM `login_info` WHERE `user_email`='".$_SESSION['user_id']."'";
    if($g1query_run = mysql_query($g1query))
    {
        $user_name_email = mysql_result($g1query_run, 0,`user_email`);
    }
}
else
{
    $check_login = 0;
}
if(isset($_POST['del'])&&isset($_POST['del_id']))
{
    $del_id=$_POST['del_id'];
    $del_email = $_SESSION['user_id'];
    $del_query = "DELETE FROM `blog` WHERE `user_email`='$del_email' AND `qid` = '$del_id'";
    $del_query_run = mysql_query($del_query);
}
if(isset($_POST['del1'])&&isset($_POST['delcom_id']))
{
    $delcom_id=$_POST['delcom_id'];
    $delcom_email = $_SESSION['user_id'];
    $del1_query = "DELETE FROM `comments` WHERE `user_email`='$delcom_email' AND `com_id` = '$delcom_id'";
    $del1_query_run = mysql_query($del1_query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>theCrescendo</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/icon.png" />

    <!-- Bootstrap core CSS -->
    
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="blog.css" rel="stylesheet">
    <link href="bootstrap.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Add custom CSS here -->
    
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>

<!-- NAV-BAR -->

<nav class="navbar navbar-custom navbar-fixed-top top-nav-collapse" role="navigation">

            <div class="collapse navbar-collapse navbar-main-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li class="page-scroll">
                        <a href="Compose.php">Compose</a>
                    </li>
                    <li class="page-scroll">
                        <a href="trending.php">Trending</a>                        
                    </li>
                    <li class="page-scroll">
                        <a href="news7.php">News</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right" style="margin-right:5px">
                    <li>
                    <?php
                        if($check_login)
                        {
                            echo '<a href="profile3.php">Welcome! '.$user.'</a>';
                        }
                    ?>
                    </li>
                    <li>
                    <?php
                        if($check_login)
                        {
                         echo '<a href="Logout1.php">Logout</a>';
                        }
                    ?>
                    </li>
                    <li>
                        <a href="home2.php">Home</a>
                    </li>
                </ul>
            </div>
        </div>
</nav>

    <div class="container" style="margin-top:25px">

        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">theCrescendo-BLOG                    
                </h1>
                <ol class="breadcrumb">
                    <li class="active">Blog Home</li>
                </ol>
            </div>

        </div>

 <!-- test code -->


<div class="post" style="box-shadow:1px 1px 1px black,-1px -1px 1px black;padding:15px">
  
            <form action="blogtest.php" method="POST">
                <ul class="list-inline" id='list_PostActions'>
                    <li class='active'><p>What's on your mind</p></li>
                </ul>
                    <!-- <textarea class="form-control" placeholder="Title" name="title"></textarea> -->
                    <textarea class="form-control" placeholder="Your Question" id="des" name="des" style="height:100px"></textarea>
                    <br>
                    <input type="submit" value="POST" name="post">
            </form>
            
</div>   



<?php

if(isset($_POST['des']) && !empty($_POST['des']))  {

    $un=mysql_real_escape_string($_POST['des']);
    // $uno=mysql_real_escape_string($_POST['title']);
   
    if($check_login)
                        {
                            if($check_login)
                            {
                                 $query= "INSERT into `blog`(user_name,date,description,user_email) values ('$user',CURDATE(),'$un','$user_name_email')";
                                if(!$query_run=mysql_query($query))
                                     {
                                     echo mysql_error();
                                     }
                            }
                            if(isset($_POST['post']))
                            {
                                header("Location:blogtest.php");
                            }
            
                        }
                        else
                        {
                            $message10 = "Please Login to Post";
                            echo "<script type='text/javascript'>alert('$message10');</script>";
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
$email_check=$query_row['user_email'];
$qid=$query_row['qid'];    
$author=$query_row['user_name'];
$date=$query_row['date'];
$description=$query_row['description'];
?>
        <div class="row" style="background-color:#dcdcdc">
            <div style="width:100%">
            <div class="col-md-1" style="width:5%;float:left;margin-top:12px">
                <p><i class="fa fa-question-circle fa-4x"></i>
                </p>
                
            </div>
            <div class="col-md-6" style="width:75%;float:left">
                <h1><?php echo $description;?>
                </h1> <p style="font-size:16px">by <strong style="color:#778899"><?php echo $author;?></strong>
                </p>
                
            </div>
            <div style="width:10%;float:left;margin-top:12px">
            <form action="<?php echo $current_file; ?>" method="POST">
                <?php
                if($email_check == $_SESSION['user_id'])
                {
                ?>
                    <button name="del" style="background:none;border:transparent"><i class="fa fa-trash-o fa-4x"></i></button>
                    <input type="hidden" name="del_id"  value="<?php echo $qid; ?>"/> 
                <?php
                }
                ?>
            </form>
            </div>
            <div style="width:10%;float:left;margin-top:12px"><pre><?php echo $date;?></pre></div>
            </div>
            <div style="width:50%;margin-left:100px">


<!-- new -->
<ol id="update" class="timeline">
<?php

$count=2;
$sql=mysql_query("select * from comments where post_id_fk='$qid' order by `com_id` DESC ");
$no_of_rows=mysql_num_rows($sql);
if($no_of_rows>2)
{
while($count)
{
$row=mysql_fetch_array($sql);
$name=$row['com_name'];
$comment_dis=$row['com_dis'];
$email_check1=$row['user_email'];
$com_id=$row['com_id'];
?>
    <div style="width:100%">
    <div style="width:80%;float:left">
    <p>
        <strong style="color:#ff6666">
            <?php echo $name; ?>
        </strong>
    </p>
    <p>    
        <?php echo $comment_dis; ?>
    </p>
    </div>
    <div style="width:20%;float:left">
        <form action="<?php echo $current_file; ?>" method="POST">
                <?php
                if($email_check1 == $_SESSION['user_id'])
                {
                ?>
                    <button name="del1" style="background:none;border:transparent"><i class="fa fa-trash-o fa-2x"></i></button>
                    <input type="hidden" name="delcom_id"  value="<?php echo $com_id; ?>"/>
                <?php
                }
                ?>
        </form>
    </div>
    </div>

    <hr style="border-top: 2px solid #778899;">
    

<?php
$count--;
}
}
else
{
while($row=mysql_fetch_array($sql))
{
$name=$row['com_name'];
$comment_dis=$row['com_dis'];
$email_check1=$row['user_email'];
$com_id=$row['com_id'];
?>
    <div style="width:100%">
    <div style="width:80%;float:left">
    <p>
        <strong style="color:#ff6666">
            <?php echo $name; ?>
        </strong>
    </p>
    <p>    
        <?php echo $comment_dis; ?>
    </p>
    </div>
    <div style="width:20%;float:left">
        <form action="<?php echo $current_file; ?>" method="POST">
                <?php
                if($email_check1 == $_SESSION['user_id'])
                {
                ?>
                    <button name="del1" style="background:none;border:transparent"><i class="fa fa-trash-o fa-2x"></i></button>
                    <input type="hidden" name="delcom_id"  value="<?php echo $com_id; ?>"/>
                <?php
                }
                ?>
        </form>
    </div>

    </div>

    
    <hr style="border-top: 2px solid #778899;">
<?php
}
}
?>
</ol>

<div style="margin-left:40px">
<form action="blogtest.php" method="post">
<input type="hidden" name="post_id"  value="<?php echo $qid; ?>"/> 

<textarea name="comment" id="comment" style="width:100%;height:100px" placeholder="Comment Here..."></textarea><br />
<br>
<input type="submit"  value="Comment " name="cmnt" style="float:right;margin-bottom:10px"/>

</form>
    </div> <!-- /new -->

</div>

</div><!-- /row -->  

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

if(isset($_POST['post_id']) && isset($_POST['comment']) && !empty($_POST['comment']))
{

$ucomment=mysql_real_escape_string($_POST['comment']); 
$post_id=$_POST['post_id'];

if($check_login)
                        {
                            if($check_login)
                            {
                                 $query= "INSERT into `comments`(com_name,com_dis,post_id_fk,user_email) values ('$user','$ucomment','$post_id','$user_name_email')";
                                if(!$query_run=mysql_query($query))
                                     {
                                     echo mysql_error();
                                     }
                            }
                            if(isset($_POST['cmnt']))
                            {
                                header("Location:blogtest.php");
                            }
                        }
                        else
                        {
                            $message11 = "Please Login to Comment";
                            echo "<script type='text/javascript'>alert('$message11');</script>";
                        }

// if(!mysql_query("insert into `comments`(com_name,com_dis,post_id_fk) values ('$username','$ucomment','$post_id')"))
// {
//     echo mysql_error();
// }

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
    <!-- Core JavaScript Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    

</body>

</html>
