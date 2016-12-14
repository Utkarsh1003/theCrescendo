
<?php
require 'core.inc.php';
require 'connect.inc.php';

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
  <title></title>

  <style type="text/css">

#cover img
{
  width: 200px;
  height:200px;
  padding-left: 20px;
  padding-top: 50px;

}
input[type=file]{ 
        color:transparent;
    }


  </style>

  

</head>
<body>
<div id="cover">
   <img src="profile.jpg" id="img_src" onload="this.onload=null; this.src=default1()"/>
</div>
<div id="profile">
<form action="profilepic_eg.php" method="POST" enctype="multipart/form-data">
<a href="#" onclick="reload_image()" />Browse</a>
<input type="file" name="image" id="fileID" style="opacity:0" ><br>
<input type="submit" value="upload" name="Submit" style="opacity:0"><br>

</form>
<?php
    if(isset($_POST['Submit']))
    {
    header("Location: profilepic_eg.php");
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
<!-- Core JavaScript Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<script type="text/javascript">
function reload_image()
{
   $("input[type='file']").trigger('click');
   $("input[type='file']").change(function () {
    $("input[type='submit']").trigger('click');
})
}


 var r=1;

    function default1(){
         if(<?php echo $c; ?> >0)
              return "<?php echo $user_picname;?>"
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
