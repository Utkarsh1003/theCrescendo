<!DOCTYPE html>
<?php
require 'connect.inc.php';
require 'core.inc.php';
if(isset($_POST['new_name']))
{
	$nusername = $_POST['new_name'];
	if(!empty($nusername))
	{
		$nquery = "UPDATE `login_info` SET `user_name` = '$nusername' WHERE `user_name` = '".$_SESSION['user_id']."'";
		if($nquery_run = mysql_query($nquery))
		{
			$useremail_query = "SELECT `user_name` FROM `login_info` WHERE `user_name`='$nusername'";
			$useremail_query_run = mysql_query($useremail_query);
			$useremail = mysql_result($useremail_query_run,0,'user_name');
			$_SESSION['user_id']=$useremail;
		}
	}
	else
	{
		$message2 = "All Field Required";
        echo "<script type='text/javascript'>alert('$message2');</script>";
	}
}
if (isset($_POST['current_pass'])&&isset($_POST['new_pass'])&&isset($_POST['confirm_new_pass']))
{
	$password = $_POST['current_pass'];
	$npassword = $_POST['new_pass'];
	$cnpassword = $_POST['confirm_new_pass']; 
	if(!empty($password)&&!empty($npassword)&&!empty($cnpassword))
	{
		$pass_check_query = "SELECT `password` FROM `login_info` WHERE `user_name` = '".$_SESSION['user_id']."'";
		$pass_check_query_run = mysql_query($pass_check_query);
		$pass_check = mysql_result($pass_check_query_run,0,'password');
		if($pass_check == $password)
		{
			if($npassword == $cnpassword)
			{
				$cpass_query = "UPDATE `login_info` SET `password` = '$npassword' WHERE `user_name` = '".$_SESSION['user_id']."'";
				$cpass_query_run = mysql_query($cpass_query);
			}
			else
			{
				$message4 = "New Password does not match with Confirm New Password";
            	echo "<script type='text/javascript'>alert('$message4');</script>";
			}
		}
		else
		{
			$message4 = "Password is incorrect";
            echo "<script type='text/javascript'>alert('$message4');</script>";
		}		
	}
	else
	{
		$message2 = "All Field Required";
    	echo "<script type='text/javascript'>alert('$message2');</script>";
	}
}
?>
<html>
<head>
	<title>MyProfile</title>
	<link rel="stylesheet" href="profile.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="profile_cover">
		<div id="cover"></div>
	</div>
	<div class="main_section">
		<div class="side_bar">
			<button type="button" class="btn btn-primary btn-lg sharp">Compose</button><br>
			<button type="button" class="btn btn-primary btn-lg sharp">Subscribe</button><br>
			<button type="button" class="btn btn-primary btn-lg sharp" data-toggle="modal" data-target="#setting">Setting</button><br>
			<button type="button" class="btn btn-primary btn-lg sharp">Any</button><br>
			<button type="button" class="btn btn-primary btn-lg sharp">Any</button><br>
		</div>
		<div class="tab_box">
			<div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1primary" data-toggle="tab">Primary 1</a></li>
                            <li><a href="#tab2primary" data-toggle="tab">Primary 2</a></li>
                            <li><a href="#tab3primary" data-toggle="tab">Primary 3</a></li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1primary">Primary 1</div>
                        <div class="tab-pane fade" id="tab2primary">Primary 2</div>
                        <div class="tab-pane fade" id="tab3primary">Primary 3</div>
                        <div class="tab-pane fade" id="tab4primary">Primary 4</div>
                        <div class="tab-pane fade" id="tab5primary">Primary 5</div>
                    </div>
                </div>
            </div>
		</div>
	</div>
	<div class="modal fade" id="setting" role="dialog">
    	<div class="modal-dialog">
	      <div class="modal-content">
	        <div class="modal-header" style="text-align:center;border-color:black">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Setting</h4>
	        </div>
	        <div class="modal-body">
	        	<div class="user_email">Email</div><hr>
	        	<div class="user_name">Name<a style="float:right" id="e1">Edit</a>
	        		<div class="change_username">
	        			<form action="<?php echo $current_file; ?>" method="POST">
	        				<p>Current Name:</p>
	        				<input type="text" placeholder="New Name" name="new_name"/><br><br>
	        				<button>Submit</button>
	        				<button type="button" id="chng1">Cancel</button>
	        			</form>
	        		</div>
	        	</div><hr>
	        	<div class="user_password">Password<a style="float:right" id="e2">Edit</a>
	        		<div class="change_password">
	        			<form action="<?php echo $current_file; ?>" method="POST">
	        				<p>Current Name:</p>
	        				<input type="password" placeholder="Current Password" name="current_pass"/><br><br>
	        				<input type="password" placeholder="New Password" name="new_pass"/><br><br>
	        				<input type="password" placeholder="Cofirm New Password" name="confirm_new_pass"/><br><br>
	        				<button>Submit</button>
	        				<button type="button" id="chng2">Cancel</button>
	        			</form>
	        		</div>
	        	</div><hr>
	        	<div></div>
	        </div>
	        <div class="modal-footer"  style="border-color:black">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
      
    	</div>
  	</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#e1').click(function(){
			$('.change_username').addClass('show');
		});
	});
	$(document).ready(function(){
		$('#chng1').click(function(){
			$('.change_username').removeClass('show');
		});
	});
	$(document).ready(function(){
		$('#e2').click(function(){
			$('.change_password').addClass('show');
		});
	});
	$(document).ready(function(){
		$('#chng2').click(function(){
			$('.change_password').removeClass('show');
		});
	});
</script>
</body>
</html>