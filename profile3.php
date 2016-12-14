<!DOCTYPE html>
<?php
require 'connect.inc.php';
require 'core.inc.php';
require 'fb.inc.php';
$check_login = 0;
if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{
    $check_login = 1;
    $gquery = "SELECT `user_name` FROM `login_info` WHERE `user_email`='".$_SESSION['user_id']."'";
    if($gquery_run = mysql_query($gquery))
    {
        $user5 = mysql_result($gquery_run, 0,`user_name`);
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
if(isset($_POST['new_name']))
{
	$nusername = $_POST['new_name'];
	if(!empty($nusername))
	{
		$nquery = "UPDATE `login_info` SET `user_name` = '$nusername' WHERE `user_email` = '".$_SESSION['user_id']."'";
		$nquery_run = mysql_query($nquery);
		header("Location: profile3.php");
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
		$pass_check_query = "SELECT `password` FROM `login_info` WHERE `user_email` = '".$_SESSION['user_id']."'";
		$pass_check_query_run = mysql_query($pass_check_query);
		$pass_check = mysql_result($pass_check_query_run,0,'password');
		if($pass_check == $password)
		{
			if($npassword == $cnpassword)
			{
				$cpass_query = "UPDATE `login_info` SET `password` = '$npassword' WHERE `user_email` = '".$_SESSION['user_id']."'";
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

// error_reporting(E_ERROR | E_PARSE);

if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{
  
  $email= "SELECT `user_email` FROM `login_info` WHERE `user_email`='".$_SESSION['user_id']."'";
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
	<title>theCrescendo</title>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="img/icon.png" />
	<!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="profile.css">
	<!-- Fonts -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

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
                    <li class="page-scroll">
                        <a href="blogtest.php">Blog</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right" style="margin-right:5px">
			        <li>
			    	<?php
				        if($check_login)
				        {
				        	echo '<a href="profile3.php">Welcome! '.$user5.'</a>';
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

<script type="text/javascript">
var r=1;

function default1(){
    if(<?php echo $c; ?> >0)
       return "<?php echo $user_picname;?>";
    else
       return "Batman-News-Default.jpg";
}


var at=2;

function fun1()
{
$(document).ready(function(){
  $('#header').fadeOut(0);
});
}

  
$(document).ready(function(){

  $( "#delete" ).click(function() {
         window.location.reload();
});
}); 

function addname()
{
 <?php

if(isset($_POST['customFieldName']) && !empty($_POST['customFieldName']))
{
	
		  $suser_name = $_POST['customFieldName'];
		  $name1 = "SELECT `user_subs` FROM `subscriptions` WHERE `user_subs`='$suser_name' and user_email='$user'";
        if($name1_run = mysql_query($name1))
        {
            $name1_num_rows = mysql_num_rows($name1_run);
            if($name1_num_rows==1)
            {

                $message8 = "Subscription Already Exist";
                echo "alert('$message8');";
            }
            
            else
            {
  
  			$squery = "INSERT INTO `subscriptions`(user_email,user_subs) VALUES ('$user','".mysql_real_escape_string($suser_name)."')";
  			$squery_run = mysql_query($squery);
			}
		}
}
?>
}
</script>
	<div class="profile_cover" style="margin-top:50px">
		<!-- <div id="cover"> --><img src="profile.jpg" id="img_src" onload="this.onload=null; this.src=default1()"><!-- </div> -->
	</div>
	<div id="profile" style="display:none">
		<form action="profile3.php" method="POST" enctype="multipart/form-data">
		<input type="file" name="image" style="opacity:0" ><br>
		<input type="submit" value="upload" name="pic_submit" style="opacity:0" id="pic_sub"><br>
	</form>
		<?php
		    if(isset($_POST['pic_submit']))
		    {
		    header("Location: profile3.php");
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
		<div class="side_bar" style="font-family:"Lato"">
			<a href="#" onclick="reload_image()"><button type="button" class="btn btn-primary btn-lg sharp">Cover Pic</button></a><br>
			<button type="button" class="btn btn-primary btn-lg sharp" data-toggle="modal" data-target="#subs_modal">Subscribe</button><br>
			<button type="button" class="btn btn-primary btn-lg sharp" data-toggle="modal" data-target="#setting">Setting</button><br>
		</div>
		<div class="tab_box">
			<div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1primary" data-toggle="tab">MY CREATIONS</a></li>
                            <li><a href="#tab2primary" data-toggle="tab">RECENTLY ADDED</a></li>
                            <li><a href="#tab3primary" data-toggle="tab">DELETE</a></li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content" style="text-align:center">
                        <div class="tab-pane fade in active" id="tab1primary">
                            <div id="tab-content1" class="tab-content animated fadeIn">
						        <?php
						        $edm=mysql_query("select * from my_creations where user_email= '$user'");
							      echo "<table border='1'>
							            <tr>
							            <th style='text-align:center'>EDM NAME</th>
							            <th style='text-align:center'>DATE CREATED</th>
							            </tr>";
						        while($row = mysql_fetch_array($edm))
							        {
							            
							          echo "<tr>";
							          //echo "<td>".$row['user_subs']."</td>";
							          echo "<tr>";
							          echo "<td>" .$row['EDM_name'] ."</td>";
							          echo "<td>" . $row['date'] . "</td>";
							          echo "</tr>";
							        }
						          echo "</table>";
					                 
							  
						        ?>
						    </div>
                        </div>
                        <div class="tab-pane fade" id="tab2primary">
                        	<div id="tab-content2" class="tab-content animated fadeIn">
				            <div> 
				            <?php
				              $edm=mysql_query("select * from my_creations where user_email= '$user' ORDER BY date DESC");
				              	 echo "<table border='1'>
							            <tr>
							            <th style='text-align:center'>EDM NAME</th>
							            <th style='text-align:center'>DATE CREATED</th>
							            </tr>";
				   
				              while($row = mysql_fetch_array($edm))
				              {
				              	  echo "<tr>";
							          //echo "<td>".$row['user_subs']."</td>";
							          echo "<tr>";
							          echo "<td>" .$row['EDM_name'] ."</td>";
							          echo "<td>" . $row['date'] . "</td>";
							          echo "</tr>";
							  }
						          echo "</table>";
					                 
				            
				                  ?>
				           
				            </div>
				          </div>
                        </div>
                        <div class="tab-pane fade" id="tab3primary">
                        	<div id="tab-content3" class="tab-content animated fadeIn">
         					<?php
        					$edm=mysql_query("select * from my_creations where user_email= '$user' ORDER BY date ASC");
        					?>
				                    <table width="300" border="1 " cellspacing="1" cellpadding="0" >
				                    <tr>
				                    <td><form name="form2" method="post" action="profile3.php">
				                    <table width="500" border="0" cellpadding="3" cellspacing="1" >
				    
				                    <tr>

				                    <!-- <td align="center" bgcolor="#FFFFFF"> &nbsp;</td> -->
				              
				                      </tr>
				         
				                    <?php
				                    while($rows=mysql_fetch_array($edm))
				                    {
				                    ?>
				                    <tr>
				                    <td align="center" ><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $rows['id']; ?>"></td>
				                    <td bgcolor="#428bca" color="black"><?php echo $rows['EDM_name']; ?></td>
				                    </tr>
				                    <?php
				                    }
				                    ?>

				                    <tr>
				                      <td align="center" bgcolor="#FFFFFF"> &nbsp;</td>

				                    <td colspan="5" align="center" bgcolor="#666666"><input name="delete1" type="submit" id="delete1" value="Delete"></td>
				                    </tr>

				                    </table>				                 
				                    </form>
				                    </td>
				                    </tr>
				                    </table>

				                    <?php
				 

									if(isset($_POST['delete1'])) {
									 if (count($_POST['checkbox']) > 0) {
									   foreach ($_POST['checkbox'] as $del_id) 
									   {
									    $sql = "DELETE FROM `my_creations` WHERE id=' " . $del_id . " ' ";
									    $result = mysql_query($sql) or die(mysql_error()); 
									    // if(mysql_affected_rows($result) > 0) echo 'Selected data rows Deleted';
									   
									   }

									 }
									 else 
									 {
										$message8 = "Please Select Something to Delete";
    									echo "<script type='text/javascript'>alert('$message8');</script>";
									  
									 }
									 header("Location: profile3.php");

									}

									  
									 
									?> 
				          	</div>
                        </div>

                    </div>
                </div>
            </div>
		</div>
	</div>

<!-- Settings modal -->

	<div class="modal fade" id="setting" role="dialog">
    	<div class="modal-dialog">
	      <div class="modal-content">
	        <div class="modal-header" style="text-align:center;border-color:black">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Setting</h4>
	        </div>
	        <div class="modal-body">
	        	<div class="user_email">Email</div><div style="text-align:center"><?php echo $user_name_email;?></div><hr>
	        	<div class="user_name">Name<a style="float:right" id="e1"><i class="fa fa-edit fa-2x"></i></a>
	        		<div class="change_username">
	        			<form action="<?php echo $current_file; ?>" method="POST">
	        				<p>Current Name: 
	        				<?php
	        				if($check_login)
	        				{
	        					echo $user5;
	        				}
	        				?>
	        				</p>
	        				<input type="text" placeholder="New Name" name="new_name"/><br><br>
	        				<button>Submit</button>
	        				<button type="button" id="chng1">Cancel</button>
	        			</form>
	        		</div>
	        	</div><hr>
	        	<div class="user_password">Password<a style="float:right" id="e2"><i class="fa fa-edit fa-2x"></i></a>
	        		<div class="change_password">
	        			<form action="<?php echo $current_file; ?>" method="POST">
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
<!-- Settings modal end -->

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
      <form action="profile3.php" method="POST">
      <input type="text" class="code" id="customFieldNames" name="customFieldName" value="" placeholder="YouTube Channel Name" />    
      <button id="add-name" onclick="addname()" style="background:none;border:transparent"><i class="fa fa-plus-circle fa-2x"></i></button>
     
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
                    <td><form name="form1" method="post" action="profile3.php">
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
                    <?php
					    if(isset($_POST['delete']))
					    {
					    header("Location: profile3.php");
					    }
					?>
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
   
   }

 }
 else 
 {
 	$message7 = "Please Select Something to Delete";
    echo "<script type='text/javascript'>alert('$message7');</script>";
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
			$('.change_username').toggle();
		});
	});
	$(document).ready(function(){
		$('#chng1').click(function(){
			$('.change_username').toggle();
		});
	});
	$(document).ready(function(){
		$('#e2').click(function(){
			$('.change_password').toggle();
		});
	});
	$(document).ready(function(){
		$('#chng2').click(function(){
			$('.change_password').toggle();
		});
	});
	function reload_image()
	{
	   $("input[type='file']").trigger('click');
	   $("input[type='file']").change(function () {
	    $('#pic_sub').trigger('click');
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
  include 'home2.php';
}
?>