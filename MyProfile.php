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
  min-width: 10 00px;
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
  background-color: #DCDCDC;
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
          background: #8e44ad;
          color: white;
          top: 0;
        }
         
        [id^=tab]:checked ~ [id^=tab-content] {
          background-color: #8e44ad;
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
        background: #08C;
        padding: 15px;
        color: white;
        font-style: italic; 
        position: absolute;
        top: 53px;
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
header{
  padding: 40px;
}
</style>
<script type="text/javascript">

function fun1()
{
$(document).ready(function(){
  $('#header').fadeOut(0);
});
}



</script>
</head>
<body>
  <header><div id="logo"><a href="Home.php"><img src="1.jpg"></a></div></header>
  <div id="logo"><img src="C:/Users/HP/Desktop/1.jpg"></div>
<header>

  <div id="header">  
    <form action="MyProfile.php" method="POST" enctype="multipart/form-data">
Choose:

<input type="file" name="image"><br><input type="submit" value="upload">
  </form>
</div>
</header>
<div id="side">
  <button class="btn btn-danger" id="compose-button"><a href="Home.php">HOME</a></button>
    <ul class="nav nav-list">
        
        <li class="active"><a href="Compose.html">COMPOSE</a></li>
        <li><a>SUBSCRIBERS</a></li>
        <li><a>MESSAGES</a></li>
        <li><a>SETTINGS</a></li>
        <li><?php echo '<a href="Logout.php">LOG OUT</a>' ?></li>
    </ul>
    
</div>
<div id="content">
  <ul class="litem">
        <li>
          <input type="radio" checked name="litem" id="tab1">
          <label for="tab1">MY CREATIONS</label>
          <div id="tab-content1" class="tab-content animated fadeIn">


            <table class="table table-striped" style="width:980px;">
        <tr>
            <th style="background-color:ORANGE">EDM NAME</th>
            <th style="background-color:ORANGE">DATE CREATED</th>
            <th style="background-color:ORANGE">SIZE</th>
            
        </tr>
        <tr class="success">
            <td>Avici</td>
            <td>20-05-2010</td>
            <td>4.20mb</td>
          
        </tr>
        <tr>
            <td>Entry Line 1</td>
            <td>Entry Line 2</td>
            <td>Entry Line 3</td>
            
        </tr>
        <tr>
            <td>Entry Line 1</td>
            <td>Entry Line 2</td>
            <td>Entry Line 3</td>
           
        </tr>
        <tr>
            <td>Entry Line 1</td>
            <td>Entry Line 2</td>
            <td>Entry Line 3</td>
            
        </tr>
      
       
    </table>


            
          </div>
        </li>
        <li>
          <input type="radio" name="litem" id="tab2">
          <label for="tab2">RECENTLY ADDED</label>
          <div id="tab-content2" class="tab-content animated fadeIn">
           <div> 
              <table class="table table-striped" style="width:980px;">
        <tr>
            <th style="background-color:ORANGE">EDM NAME</th>
            <th style="background-color:ORANGE">DATE CREATED</th>
            <th style="background-color:ORANGE">SIZE</th>
            
        </tr>
        <tr class="success">
            <td>Avici</td>
            <td>20-05-2010</td>
            <td>4.20mb</td>
          
        </tr>
        <tr>
            <td>Entry Line 1</td>
            <td>Entry Line 2</td>
            <td>Entry Line 3</td>
            
        </tr>
        <tr>
            <td>Entry Line 1</td>
            <td>Entry Line 2</td>
            <td>Entry Line 3</td>
           
        </tr>
        <tr>
            <td>Entry Line 1</td>
            <td>Entry Line 2</td>
            <td>Entry Line 3</td>
            
        </tr>
      
       
    </table>

    </div>
          </div>
        </li>
        <li>
          <input type="radio" name="litem" id="tab3">
          <label for="tab3">ADD/DELETE</label>
          <div id="tab-content3" class="tab-content animated fadeIn">
        

            <table class="table table-striped" style="width:980px;">
        <tr>
            <th style="background-color:ORANGE">EDM NAME</th>
            <th style="background-color:ORANGE">DATE CREATED</th>
            <th style="background-color:ORANGE">SIZE</th>
            
        </tr>
        <tr class="success">
            <td>Avici</td>
            <td>20-05-2010</td>
            <td>4.20mb</td>
          
        </tr>
        <tr class="success">
            <td>Entry Line 1</td>
            <td>Entry Line 2</td>
            <td>Entry Line 3</td>
            
        </tr>
        <tr class ="success">
            <td>Entry Line 1</td>
            <td>Entry Line 2</td>
            <td>Entry Line 3</td>
           
        </tr>
        <tr class="success">
            <td>Entry Line 1</td>
            <td>Entry Line 2</td>
            <td>Entry Line 3</td>
            
        </tr>
      
       
    </table>



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
  echo "thats not an image";
else
{
   if(!$insert=mysql_query("insert into userimage values ('','$image_name','$image')"))
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
