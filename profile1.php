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

<?php

error_reporting(E_ERROR | E_PARSE);

if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{
  
  $email= "SELECT `user_email` FROM `login_info` WHERE `user_name`='".$_SESSION['user_id']."'";
           if($email_run = mysql_query($email))
            {
              $user = mysql_result($email_run, 0,`user_email`);
            }
?>


    <?php
            $pic= "SELECT `image` FROM `userimage` WHERE `user_email`='$user'";
           
             if($pic_run = mysql_query($pic))
            {
              $user_pic = mysql_result($pic_run, 0,`image`);
            }
   
  
              if(empty($user_pic)!==true)
              {
                $user_picname=mysql_query("select * from userimage where user_email='$user'");
                $user_picname=mysql_fetch_assoc($user_picname);
                $user_picname= $user_picname['name'];
                // echo $user;
               
                $count1=mysql_query("SELECT COUNT(image) FROM userimage where user_email='$user'");
                $c=1;
              }
              else{
                $c=0;
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
<script type="text/javascript">
 	var r=1;

    function default1(){
         if(<?php echo $c; ?> >0)
              return "<?php echo $user_picname;?>";
             else
             return "photo.jpg";
         }
</script>
	<div class="profile_cover">
		<!-- <div id="cover"> --><img src="profile.jpg" id="img_src" onload="this.onload=null; this.src=default1()"><!-- </div> -->
	</div>
	<div id="profile" style="display:none">
		<form action="profile1.php" method="POST" enctype="multipart/form-data">
		<input type="file" name="image" id="fileID" style="opacity:0" ><br>
		<input type="submit" value="upload" name="Submit" style="opacity:0"><br>
	</form>
		<?php
		    if(isset($_POST['Submit']))
		    {
		    header("Location: profile1.php");
		    }
		?>
	</div>
				<?php
			  @$file= $_FILES['image']['tmp_name'];

			 if(!isset($file)){}
			  // echo"Please select an image";
			 else
			 {
			$image= addslashes(file_get_contents($_FILES['image'] ['tmp_name']));
			$image_name = addslashes($_FILES['image']['name']); 
			 $image_size=getimagesize($_FILES['image']['tmp_name']);

			if($image_size==FALSE)
			  echo "<script>
			          alert(thats not an image);
			        </script>";
			else
			{
			   if(empty($user_pic)===true)
			   {
			    $insert=mysql_query("insert into userimage(user_email,name,image) values ('$user','$image_name','$image')");
			   
			    echo  "<script>
			    window.location.reload();
			    </script>";   
			   }
			   else
			   {

			   $Update_pic=mysql_query("UPDATE userimage SET `name`='$image_name',`image`='$image' where user_email='$user'");
			   
			   // echo "<script>window.location.reload();</script>";
			  
			     }


			}

			}
			 
			?>
	<div class="main_section">
		<div class="side_bar">
			<a href="#" onclick="reload_image()"><button type="button" class="btn btn-primary btn-lg sharp">Cover Pic</button></a><br>
			<button type="button" class="btn btn-primary btn-lg sharp" data-toggle="modal" data-target="#subs_modal">Subscribe</button><br>
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

<!-- Subscription Modal  	 -->

      <div class="modal fade" id="subs_modal" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Your Subscriptions</h4>
        </div>
        <div class="modal-body" background=:"red">
          <p id="subs"> 
 <table class="form-table" id="customFields">
  <tr valign="top">
    <th scope="row"><label for="customFieldName">Add subscription</label></th>
    <td>
      <form action="MyProfile34.php" method="POST">
      <input type="text" class="code" id="customFieldNames" name="customFieldName" value="" placeholder="Input Name" />    
      <button id="add-name" onclick="addname()">Add</button>
     
      <br> <br>  
    </form>
    </td>
  </tr>
</table>
<?php
                      
            $rs=mysql_query("select * from subscriptions where user_email='$user' ");
        ?> 
                    <table width="300" border="0" cellspacing="1" cellpadding="0" background="#08C">
                    <tr>
                    <td><form name="form1" method="post" action="MyProfile34.php">
                    <table width="500" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
                   
                    <tr>

                    <td align="center" bgcolor="#FFFFFF"> &nbsp;</td>
                      </tr>
         
                    <?php
                    while($rows=mysql_fetch_array($rs))
                    {
                    ?>
                    <tr>

                    <td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $rows['id']; ?>"></td>
                    <td bgcolor="#FFFFFF"><?php echo $rows['user_subs']; ?></td>
                    </tr>
                    <?php
                    }
                    ?>

                    <tr>
                      <td align="center" bgcolor="#FFFFFF"> &nbsp;</td>

                    <td colspan="5" align="center" bgcolor="#FFFFFF"><input name="delete" type="submit" id="delete" value="Delete"></td>
                    </tr>

                    </table>
                    </form>
                    </td>
                    </tr>
                    </table>

                    <?php
 

if(isset($_POST['delete'])) {
 if (count($_POST['checkbox']) > 0) {
   foreach ($_POST['checkbox'] as $del_id) 
   {
    $sql = "DELETE FROM `subscriptions` WHERE id=' " . $del_id . " ' ";
    $result = mysql_query($sql) or die(mysql_error()); 
    // if(mysql_affected_rows($result) > 0) echo 'Selected data rows Deleted';
   
   }

 }
 else 
 {
     echo '<script >'
   , 'alert("Select Subsription");'
   , '</script>'
;
  
 }

}

  
 
?> 

          </p>
        </div>

      </div>
  	</div>
      
    </div>
<!-- Sunscription modal end -->

  	<!-- Core JavaScript Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
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
	function reload_image()
	{
	   $("input[type='file']").trigger('click');
	   $("input[type='file']").change(function () {
	    $("input[type='submit']").trigger('click');
	});
	}


 	var r=1;

    function default1(){
         if(<?php echo $c; ?> >0)
              return "<?php echo $user_picname;?>";
             else
             return "photo.jpg";
         }
</script>
</body>
</html>
<?php
}
// echo '<h4>Welcom! '.$user.' <a href="Logout.php">Logout</a></h4>';
else
{
  include 'Login.inc.php';
}
?>