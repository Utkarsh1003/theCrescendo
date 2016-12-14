<?php
require 'core.inc.php';
require 'connect.inc.php';


if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{
	$gquery = "SELECT `user_name` FROM `login_info` WHERE `user_name`='".$_SESSION['user_id']."'";
	if($gquery_run = mysql_query($gquery))
	{
		$user = mysql_result($gquery_run, 0,`user_name`);
	}
	?>


<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="homestyle.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
	<section>
		<div class="header">

<?php
echo '<h4>Welcom! '.$user.' <a href="Logout.php">Logout</a></h4>';
}
else
{
	include 'Login.inc.php';
}
?></div>
		<div class="wrapper">
			<div class="compose"><img src="compose3.jpg"><button type="button" class="btn btn-success btn-lg sharp"><a href="Compose.php">Compose</a></button></div>
			<div class="newsfeed"><img src="newsfeed.jpg"><button type="button" class="btn btn-success btn-lg sharp"><a href="News.php">News</a></button></div>
			<div class="profile"><img src="profile4.jpg"><button type="button" class="btn btn-success btn-lg sharp"><a href="profile.php">MyProfile</a></button></div>
			<div class="trending"><img src="trending2.jpg"><button type="button" class="btn btn-success btn-lg sharp">Trending</button></div>
			<div class="search"><img src="search2.jpg" style="height:600px;"><button type="button" class="btn btn-success btn-lg sharp">Search</button></div>
		</div>
	</section>
</body>

		    
		 