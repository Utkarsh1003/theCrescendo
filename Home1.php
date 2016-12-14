<?php
require 'core.inc.php';
require 'connect.inc.php';
$check_login = 0;

//login php//

if(isset($_POST['lemail'])&&isset($_POST['lpassword']))
{
	$luser_email = $_POST['lemail'];
	$lpassword = $_POST['lpassword'];
	if(!empty($luser_email)&&!empty($lpassword))
	{
		$lquery = "SELECT `user_name` FROM `login_info` WHERE `user_email`='$luser_email' AND `password`='$lpassword'";
		if($lquery_run = mysql_query($lquery))
		{
			$lquery_num_rows = mysql_num_rows($lquery_run);
			if($lquery_num_rows==0)
			{
				// echo "Inavlid username/password combination";
				$message = "Inavlid username/password combination";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
			else if($lquery_num_rows==1)
			{
				$useremail = mysql_result($lquery_run,0,'user_name');
				$_SESSION['user_id']=$useremail;
				header('Location: Home1.php');
			}
		}
	}
	else
	{
		// echo "Supply user name and password";
	}
}

if(isset($_POST['susername'])&&isset($_POST['semail'])&&isset($_POST['spassword']))
{
	$suser_name = $_POST['susername'];
	$suser_email = $_POST['semail'];
	$spassword = $_POST['spassword'];
	$squery = "INSERT INTO `login_info` VALUES ('".mysql_real_escape_string($suser_name)."','".mysql_real_escape_string($suser_email)."','".mysql_real_escape_string($spassword)."')";
	$squery_run = mysql_query($squery);
}

//show name php//
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


<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="homestyle1.css" rel="stylesheet" type="text/css">
	<link href="loginstyle1.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<section class="login_img">
		<div class="modal fade" role="dialog" id="register-box">
		    <div class="rb-header">
		      <button type="button" class="close" data-dismiss="modal">&times;</button>
		      <a href='#' class="active" id="login-box-link">Login</a>
		      <a href="#" id="signup-box-link">Sign Up</a>
		    </div>
		    <div class="fb-login">
		      <a href="#" id="fb-login">Login in with facbook</a>
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
		      <div class="form-style">
		        <a href="#" class="forgot-password">Forgot Password</a>
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
		        <input type="password" placeholder="Confirm Password"/>
		      </div>
		      <div class="form-style">
		        <button>Sign Up</button>
		      </div>
		    </form>
		 </div>
		<center><button type="button" class="btn btn-primary btn-sm outline" data-toggle="modal" data-target="#register-box">Login</button></center>
	</section>
<div class="header">
	<?php
		if($check_login)
		{
			echo '<h4>Welcom! '.$user.' <a href="Logout1.php">Logout</a></h4>';
		}
	?>
</div>
<div class="wrapper">
			<div class="compose"><img src="compose3.jpg"><a id="a1" class="outline-button"><!-- <button type="button" class="btn btn-success btn-lg sharp"> -->Compose<!-- </button> --></a></div>
			<div class="newsfeed"><img src="newsfeed.jpg"><button type="button" class="btn btn-success btn-lg sharp"><a href="News.php">News</a></button></div>
			<div class="profile"><img src="profile4.jpg"><button type="button" class="btn btn-success btn-lg sharp"><a id="a3">MyProfile</a></button></div>
			<div class="trending"><img src="trending2.jpg"><button type="button" class="btn btn-success btn-lg sharp">Trending</button></div>
			<div class="search"><img src="search2.jpg" style="height:600px;"><button type="button" class="btn btn-success btn-lg sharp">Search</button></div>
</div>

		 <script type="text/javascript">
		 var check_login = <?php echo json_encode($check_login); ?>;
		 $(document).ready(function(){
			if(check_login == 1)
		 	{
		 		$('a#a1').removeClass('outline-button');
		 		$('a#a1').addClass('outline-button1');
		 		$("a#a1").click(function(){
         			window.location = "Compose.php";    
				});
				$("a#a3").click(function(){
         			window.location = "profile.php";    
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
	 </script>
</body>

		    
		 