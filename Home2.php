<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>theCrescendo</title>
    <link href="homestyle1.css" rel="stylesheet" type="text/css">
    <link href="loginstyle1.css" rel="stylesheet" type="text/css">
    <link href="carousel.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" type="image/x-icon" href="img/icon.png" />
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Custom Theme CSS -->
    <link href="css/main.css" rel="stylesheet">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

    

    <section class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">THE CRESCENDO</h1>
                        <div class="page-scroll">
                            <a href="#navigate" class="btn btn-circle">
                                <i class="fa fa-angle-double-down animated"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="video_div">
            <video width="100%" height="100%" autoplay loop>
            <source src="intro.webm" type="video/webm">
            </video>
        </div>
    </section>
    <?php
require 'core.inc.php';
require 'connect.inc.php';
require 'fb.inc.php';
$check_login = 0;

//login php//

if(isset($_POST['lemail'])&&isset($_POST['lpassword']))
{
    $luser_email = $_POST['lemail'];
    $lpassword = $_POST['lpassword'];
    if(!empty($luser_email)&&!empty($lpassword))
    {
        $lquery = "SELECT `user_email` FROM `login_info` WHERE `user_email`='$luser_email' AND `password`='$lpassword'";
        if($lquery_run = mysql_query($lquery))
        {
            $lquery_num_rows = mysql_num_rows($lquery_run);
            if($lquery_num_rows==0)
            {
                // echo "Inavlid username/password combination";
                $message1 = "Inavlid username/password combination";
                echo "<script type='text/javascript'>alert('$message1');</script>";
            }
            else if($lquery_num_rows==1)
            {
                $useremail = mysql_result($lquery_run,0,'user_email');
                $_SESSION['user_id']=$useremail;
                header('Location: Home2.php');
            }
        }
    }
    else
    {
        $message2 = "All Field Required";
        echo "<script type='text/javascript'>alert('$message2');</script>";
    }
}

if(isset($_POST['susername'])&&isset($_POST['semail'])&&isset($_POST['spassword'])&&isset($_POST['cspassword']))
{
    $suser_name = $_POST['susername'];
    $suser_email = $_POST['semail'];
    $spassword = $_POST['spassword'];
    $cspassword = $_POST['cspassword'];
    if(!empty($suser_name)&&!empty($suser_email)&&!empty($spassword)&&!empty($cspassword))
    {
        $exist_query = "SELECT `user_email` FROM `login_info` WHERE `user_email`='$suser_email'";
        if($exist_query_run = mysql_query($exist_query))
        {
            $exist_query_num_rows = mysql_num_rows($exist_query_run);
            if($exist_query_num_rows==1)
            {
                $message3 = "Email Already Exist";
                echo "<script type='text/javascript'>alert('$message3');</script>";
            }
            else if($exist_query_num_rows==0)
            {
                if($spassword == $cspassword)
                {
                    $squery = "INSERT INTO `login_info` VALUES ('".mysql_real_escape_string($suser_name)."','".mysql_real_escape_string($suser_email)."','".mysql_real_escape_string($spassword)."')";
                    $squery_run = mysql_query($squery);
                }
                else
                {
                    $message4 = "Password does not match with Confirm Password";
                    echo "<script type='text/javascript'>alert('$message4');</script>";
                }
            }
        }
    }
    else
    {
        $message2 = "All Field Required";
        echo "<script type='text/javascript'>alert('$message2');</script>";
    }
}

//show name php//
if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{
    $check_login = 1;
    $gquery = "SELECT `user_name` FROM `login_info` WHERE `user_email`='".$_SESSION['user_id']."'";
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
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">

            <div class="collapse navbar-collapse navbar-main-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#navigate">Navigate</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">About</a>                        
                    </li>
                    <li class="page-scroll">
                        <a href="#team">Team</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right" style="margin-right:5px">
			        <li>
                    <?php
                        if($check_login)
                        {
                            echo '<a href="profile3.php">Welcome! '.$user.'</a>';
                            
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
                    <?php
                        }
				        else
				        { ?>
				    		<a href="#" data-toggle="modal" data-target="#register-box"><span class="glyphicon glyphicon-log-in"></span> Login</a>
				        <?php
				    	}
			    	?>
                    </li>
			    </ul>
            </div>
        </div>
    </nav>

        <div class="modal fade" role="dialog" id="register-box">
            <div class="rb-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <a href='#' class="active" id="login-box-link">Login</a>
              <a href="#" id="signup-box-link">Sign Up</a>
            </div>
            <div class="fb-login">

              <?php echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';?>
            </div>
            <form class="email-login" action="<?php echo $current_file; ?>" method="POST">
              <div class="form-style">
                <input type="email" placeholder="Email" name="lemail"/>
              </div>
              <div class="form-style">
                <input type="password" placeholder="Password" name="lpassword"/>
              </div>
              <div class="form-style">
                <button>Log in</button>
              </div>
            </form>
            <form class="email-signup" action="<?php echo $current_file; ?>" method="POST">
              <div class="form-style">
                <input type="text" placeholder="User Name" name="susername"/>
              </div>
              <div class="form-style">
                <input type="email" placeholder="Email" name="semail"/>
              </div>
              <div class="form-style">
                <input type="password" placeholder="Password" name="spassword"/>
              </div>
              <div class="form-style">
                <input type="password" placeholder="Confirm Password" name="cspassword"/>
              </div>
              <div class="form-style">
                <button>Sign Up</button>
              </div>
            </form>
         </div>

<section class="content-section" id="navigate">
<div class="headers">
<h1>NAVIGATE OUR SITE</h1>
</div>
<div class="wrapper">
            <div class="compose"><img src="compose3.jpg"><a href="Compose.php"><button type="button" class="btn btn-success btn-lg sharp">Compose</button></a></div>
            <div class="trending"><img src="trending2.jpg"><a href="trending.php"><button type="button" class="btn btn-success btn-lg sharp">Trending</button></a></div>            
            <div class="profile"><img src="profile4.jpg"><a id="a1" class="outline-button">Myprofile</a></div>
            <div class="newsfeed"><img src="newsfeed.jpg"><a href="news7.php"><button type="button" class="btn btn-success btn-lg sharp">News</button></a></div>
            <div class="search"><img src="search2.jpg" style="height:600px;"><a href="blogtest.php"><button type="button" class="btn btn-success btn-lg sharp">Blog</button></a></div>
</div>
</section>

<div class="headers" style="margin-top:80px">
<h1>WHY YOU SHOULD VISIT US EVERYDAY</h1>
</div>
<section id="about">

<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
        <li data-target="#carousel" data-slide-to="3"></li>
        <li data-target="#carousel" data-slide-to="4"></li>
    </ol>
    
    <div class="carousel-inner">
        <div class="active item"><img src="img/compose2.jpg"></div>
        <div class="item"><img src="img/news2.jpg"></div>
        <div class="item"><img src="img/profile1.jpg"></div>
        <div class="item"><img src="img/trending1.jpg"></div>
        <div class="item"><img src="img/blog2.jpg"></div>
    </div>
    
    <a class="carousel-control left" href="#carousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#carousel" data-slide="next">&rsaquo;</a>
</div>
</section>

<section class="content-section" id="team">
    <div class="headers">
    <h1>MEET THE TEAM</h1>
    </div>
    <br>
    <br>
    <br>
            <div class="team">
                <div class="member1">
                    <img class="img img-circle" src="img/himanshu.jpg" height="120px" width="120px">
                    <br>
                    <br>
                    <h4><b>Himanshu</b></h4>
                    <h5>jesushanuman786@gmail.com</h5>
                </div>
                
                <div class="member2">
                    <img class="img img-circle" src="img/rajat.jpg" height="120px" width="120px">
                    <br>
                    <br>
                    <h4><b>Rajat Sharma</b></h4>
                    <h5>rajatdevsharma03@gmail.com </h5>
                </div>
                
                <div class="member3">
                    <img class="img img-circle" src="img/utkarsh.jpg" height="120px" width="120px">
                    <br>
                    <br>
                    <h4><b>Utkarsh Kumar</b></h4>
                    <h5>utkarshkumar1003@gmail.com</h5>
                </div>
            </div>
</section>

   

    <!-- Core JavaScript Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="js/main.js"></script>

    <script type="text/javascript">
         var check_login = <?php echo json_encode($check_login); ?>;
         $(document).ready(function(){
            if(check_login)
            {
                $('a#a1').removeClass('outline-button');
                $('a#a1').addClass('outline-button1');
                $("a#a1").click(function(){
                    window.location = "profile3.php";    
                });
            }
            else
            {
                $('a#a1').addClass('outline-button');
                $("a#a1").click(function(){
                    $('#register-box').modal('show'); 
                }); 
            }
        });
      $(".email-signup").hide();
      $("#signup-box-link").click(function(){
        $(".email-login").fadeOut(100);
        $(".email-signup").delay(100).fadeIn(100);
        $("#login-box-link").removeClass("active");
        $("#signup-box-link").addClass("active");
      });
      $("#login-box-link").click(function(){
        $(".email-login").delay(100).fadeIn(100);;
        $(".email-signup").fadeOut(100);
        $("#login-box-link").addClass("active");
        $("#signup-box-link").removeClass("active");
      });
      // Script for Carousel
      $('.carousel').carousel();
     </script>

</body>

</html>
