
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
  $email= "SELECT `user_email` FROM `login_info` WHERE `user_name`='".$_SESSION['user_id']."'";
           if($email_run = mysql_query($email))
            {
              $user = mysql_result($email_run, 0,`user_email`);
            }

?>






<!DOCTYPE html>
<html>
<head>

   <title>MyProfile</title>
     <!-- <link rel="stylesheet" href="C:/Users/ADMIN/Desktop/Minor Project/text/css"> -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style type="text/css">

HTML {
  height: 100%;
}
body {
  font-family: arial;
  font-size: 13px;
  position: relative;
  min-width: 1000px;
  width: 100%;
  height: 100%;
  background-image: url("home6.jpg");
    background-repeat: repeat-y;
}


h1
{
  font-style: italic; 
  font-weight: 40px;
  margin:0 0 0 0;
}
#header {

  min-width: 200px;
  width: 30%;
  position: absolute;
  top: 60px;
  left: 280px;
  right: 300px;
  background-color:none ;
  min-height: 200px; 
  height: 30%;
  font-size: 20px;
  color: #1B191B;;
  padding: 0 20px;
}

.wrapper:a{
  text-decoration: none;
}

#compose-button
{
  font-size: 20px;
}
#side {
  position: absolute;
  top: 275px;
  left: 22px;
  bottom: 0;
  padding : 8px;
  width: 200px;
  cursor: pointer;
  font-size: 20px;
  background-color: none;
  overflow: auto;
}
#content {
  position: absolute;
  min-width: 600px;
  width: 100  %;

  top: 250px;
  left: 190px;
  bottom: 0;
  right: 0;
  overflow: auto;
}

 .litem input[type=radio] {
          position: absolute;
          top: -9999px;
          left: -9999px;
      }

 .litem {
        min-width: 800px;
        width: 90%;
        float: none;
        list-style: none;
        position: relative;
        padding: 0;
        margin: 25px auto;
      }
      .litem li{
        float: left;
        font-size: 40px;
      }

      .litem label {
          display: block;
          padding: 10px 20px;
          border-radius: 5px 5px 0 0;
          color: black;
          box-shadow: 2px;  
          font-size: 30px;
          /*text-transform: uppercase;*/
          font-style:italic;
          font-weight: large;
          font-family: 'Lily Script One', helvetica;
          background:#4775FF;
          cursor: pointer;
          position: relative;
          top: 3px;
          -webkit-transition: all 0.2s ease-in-out;
          -moz-transition: all 0.2s ease-in-out;
          -o-transition: all 0.2s ease-in-out;
          transition: all 0.2s ease-in-out;
      }
      .litem label:hover {
        background: #BBD2FF;
        top: 0;
      }
       
        [id^=tab]:checked + label {
          /*background: #8e44ad;*/
          color: white;
          top: 0;
        }
         
        [id^=tab]:checked ~ [id^=tab-content] {
          /*background-color: #8e44ad;*/
            display: block;
        }

      .tab-content{
        z-index: 2;
        display: none;
        text-align: left;
        width: 100%;
        font-size: 25px;
        line-height: 150%;
        padding-top: 0px;
        /*background: #08C;*/
        padding: 15px;
        padding-right: 20px;
        color: white;
        font-style: italic; 
        position: absolute;
        top: 58px;
        left: 0;
        box-sizing: border-box;
        -webkit-animation-duration: 0.5s;
        -o-animation-duration: 0.5s;
        -moz-animation-duration: 0.5s;
        animation-duration: 0.5s;
      }

/*.litem li.selected {
  background: #FFF;
  color: #000;
}*/
#compose-button {
  width: 150px;
  margin-bottom: 2em;
}

#subs{
  display: block;
  margin-top: 20px;
}

subs:hover
{
  border-style: outset;
  background-color: #1B191B;
}
#cover
{
  min-width: 200px;
  width: 30%;
  position: absolute;
  top: 60px;
  left: 280px;
  right: 300px;
  background-color:none;
  min-height: 200px; 
  height: 30%;
  /*font-size: 20px;*/
  /*color: #1B191B;;*/
  padding: 0 20px;
}

#cover img{
  /*width: 400px;*/

  max-width: 600px;
  /*width: 30%;*/
  min-height: 200px;
  height:100%;
  /*margin-left: 200px;*/
}
#side_button{
  margin-top: 20px;
  text-decoration: none;
}
header{
  padding: 40px;
}

/*add name*/
#customFieldName
{
  width: 140px;
  height: 30px;
  /*float: right;*/
}
.creations_table
{
  width: 80px;

}
</style>
<script type="text/javascript">

var at=2;

function fun1()
{
$(document).ready(function(){
  $('#header').fadeOut(0);
});
}

  
$(document).ready(function(){
  // $("#addCF").click(function(){
  //   $("#customFields").append('<tr valign="top"><th scope="row"><label for="customFieldName">Custom Field</label></th><td><input type="text" class="code" id="customFieldName" name="customFieldName[]" value="" placeholder="Input Name" /> &nbsp; <a href="javascript:void(0);" id="remCF">Remove</a></td></tr>');
  //   $("#remCF").on('click',function(){
  //     $(this).parent().parent().remove();
  //   });
  // });

  $( "#delete" ).click(function() {
         window.location.reload();
});
}); 



// function delete_subs(){
//   // if (count($_POST['checkbox']) > 1) 
//   alert("Subscriptions Deleted!");

//   window.location.reload();
//   // window.location.reload();
// }


function addname()
{
  alert("Subscription Added!");
 <?php

if(isset($_POST['customFieldName']))
{
  $suser_name = $_POST['customFieldName'];
  
  $squery = "INSERT INTO `subscriptions`(user_email,user_subs) VALUES ('$user','".mysql_real_escape_string($suser_name)."')";
  $squery_run = mysql_query($squery);

}

?>
}




</script>
</head>
<body>
  <header><div id="logo"><a href="Home.php"><img src="1.jpg"></a></div></header>
  <div id="logo"><img src="C:/Users/HP/Desktop/1.jpg"></div>
<header>

  <div id="header">  
    <form action="MyProfile34.php" method="POST" enctype="multipart/form-data">
Choose:

<input type="file" name="image"><br><input type="submit" value="upload">
  </form>
</div>
</header>
<div id="side">
  <button class="btn btn-danger" id="compose-button"><a href="Home.php">HOME</a></button>
 <!--    <ul class="nav nav-list">
        
        <li class="active"><a href="Compose.html">COMPOSE</a></li>
        <li><a>SUBSCRIBERS</a></li>
        <li><a>MESSAGES</a></li>
        <li><a>SETTINGS</a></li>
        <li><?php echo '<a href="Logout.php">LOG OUT</a>' ?></li>
    </ul> -->
    <div class="wrapper">
      <button type="button" id="side_button" class="btn btn-success btn-lg sharp"><a href="Compose.php">Compose</a></button>
      <!-- <div class="newsfeed"><button type="button" class="btn btn-success btn-lg sharp"><a href="News.php">News</a></button></div> -->
       <!-- <button type="button" class="btn btn-success btn-lg sharp"><a href="MyProfile.php">MyProfile</a></button></div> -->
      <button type="button" id="side_button" class="btn btn-success btn-lg sharp" data-toggle="modal" data-target="#myModal"><a href="#">Subscriptions</a></button>
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Your Subscriptions</h4>
        </div>
        <div class="modal-body" background=:"red">
          <p id="subs"> 
  <!--                        <form class="searchform cf">
  <input type="text" placeholder="Is it me you’re looking for?">
  <button type="submit">Search</button></br>
</form>
 -->
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
        <!-- <div class="modal-footer"> -->
          <!-- <button type="button" id="apply" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
      </div>
      
    </div>
  </div>
  
      <button type="button" id="side_button" class="btn btn-success btn-lg sharp"><a href="#">Settings</a></button>
      <button type="button" id="side_button" class="btn btn-success btn-lg sharp"><a href="Logout.php">Logout</a></button>
    </div>
</div>
<div id="content">
  <ul class="litem">
        <li>
          <input type="radio" checked name="litem" id="tab1">
          <label for="tab1">MY CREATIONS</label>
          <div id="tab-content1" class="tab-content animated fadeIn">

<!-- 
            <table class="table table-striped" style="width:980px;">
        <tr>
            <th style="background-color:ORANGE">EDM NAME</th>
            <th style="background-color:ORANGE">DATE CREATED</th>
            <th style="background-color:ORANGE">SIZE</th>
            
        </tr> -->
        <?php
        $edm=mysql_query("select * from my_creations");

      echo "<table border='1'>
            <tr>
            <th>EDM NAME</th>
            <th >DATE CREATED</th>
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
       
   <!--  </table> -->


            
          </div>
        </li>
        <li>
          <input type="radio" name="litem" id="tab2">
          <label for="tab2">RECENTLY ADDED</label>
          <div id="tab-content2" class="tab-content animated fadeIn">
           <div> 
            <?php
        $edm=mysql_query("select * from my_creations ORDER BY date DESC");

   
        while($row = mysql_fetch_array($edm))
        {
            
          echo $row['EDM_name'] ;
          echo  $row['date']  ;
?>
<br>
<?php
            }

          // echo "</table>";
                 
  
        ?>
    </div>
          </div>
        </li>
        <li>
          <input type="radio" name="litem" id="tab3">
          <label for="tab3">DELETE</label>
          <div id="tab-content3" class="tab-content animated fadeIn">
         <?php
        $edm=mysql_query("select * from my_creations ORDER BY date ASC");
        ?>
                    <table width="300" border="1 " cellspacing="1" cellpadding="0" >
                    <tr>
                    <td><form name="form2" method="post" action="MyProfile34.php">
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
                    <td bgcolor="#4747d1" color="black"><?php echo $rows['EDM_name']; ?></td>
                    </tr>
                    <?php
                    }
                    ?>

                    <tr>
                      <td align="center" bgcolor="#FFFFFF"> &nbsp;</td>

                    <td colspan="5" align="center" bgcolor="#acacac"><input name="delete1" type="submit" id="delete1" value="Delete"></td>
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
     echo '<script >'
   , 'alert("Select Subsription");'
   , '</script>'
;
  
 }

}

  
 
?> 
          </div>
        </li>
         
</ul>
    
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
   if(!$insert=mysql_query("insert into userimage(user_email,name,image) values ('$user','$image_name ','$image')"))
    echo "Problem uploading image";
    else
   {
    $lastid= mysql_insert_id();
?>

  
  <div id="cover">
    <script>fun1();</script>
    <?php

   echo "<img src=homeimage.php?id=$lastid  />";
     }
}
}
?>


    
     </div>
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
