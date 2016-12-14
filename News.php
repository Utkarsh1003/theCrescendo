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
$to_crawl="https://in.yahoo.com/?p=us";
$c=array();

function get_links($url) {
	require 'connect.inc.php';
	global $c;
	$input=@file_get_contents($url);
	$regexp="<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>";
	preg_match_all("/$regexp/siU", $input, $matches);
	$base_url=parse_url($url, PHP_URL_HOST);
	// echo "<pre";
	// print_r($matches);
	// echo "</pre>";
	$l =$matches[2];

	foreach($l as $link){
		
		if(strpos($link,"#")){
			$link=substr($link,0,strpos($link, "#"));
		}

		if(substr($link,0,1)=="."){
			$link=substr($link,1);
		}

		if(substr($link,0,7)=="http://"){
			$link=$link;
		}
		else if(substr($link,0,8)=="https://"){
			$link=$link;
		}
		else if(substr($link,0,2)=="//"){
			$link=substr($link,2);
		}

		else if(substr($link,0,1)=="#"){
			$link=$url;
		}

		else if(substr($link,0,7)=="mailto:"){
			$link="[".$link."]";
		}
		else
		{
			if(substr($link,0,1)!="/"){
				$link=$base_url."/".$link;
			}
			else{
				$link=$base_url.$link;			}
		}


		if(substr($link,0,7)!="http://" && substr($link,0,8)!="https://" && substr($link,0,1)!="["){
			if(substr($url,0,8)=="https://"){
				$link="https://".$link;
			}
			else{
			$link="http://".$link;
			}
		}

// $id= addslashes($_REQUEST['id']);
	$insert=mysql_query("insert into crawl values ('','','$link')");
		//echo $link."<br />";
		// if(!in_array($link, $c)){
		// 	array_push($c, $link);
		// }
	}
}

get_links($to_crawl);

?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
	<title>Minor project</title>
	<link rel="stylesheet" href="newscss.css"/>
<!--    <link href='http://fonts.googleapis.com/css?family=News+Cycle:400,700' rel='stylesheet' type='text/css'>
<link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css"> -->

	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 50%;
      margin: auto;
  }
  </style>
  <style type="text/css">
html,body{
	min-width: 700px;
	min-height: 400px;
	font-family: Impact;
	width: 100%;
	height:100%;
	background-image: url("home6.jpg");
	//background-repeat: repeat-x;
	//background-image-width:1920px; 
	background-repeat:repeat-y;
	padding-left: 0px;
	padding: 0;
 /* margin: 0;
  font-family: Roboto;
  background-color: #eee;*/
	/*background-color: red;*/
}
header{
	padding: 40px;
}
.search{
	/*float: right;*/
	position: absolute;
	margin-left: 900px;
	display: inline-block;
}



#news
{	
	margin-top: 70px;
	margin-left: 150px;
	min-width: 500px;
	width: 75%;
	min-height: 580px;
	height: 60%;
    background-color: white;
}


#news li
{
	display: inline;
	font-style: italic;
	font-size: 20px;
	margin-left: 100px;
	border: 3px solid #a1a1a1;
    padding: 20px 50px; 
    background: #dddddd;
    width: 300px;
    border-radius: 40px;
}
#bar
{
	float: right;
}

#news li:hover{
background: #FFFFAC
}

a{
	text-decoration: none;
	color: #000080	;	
}



a
{
	text-decoration: none;
	color: #111b47;
}

a:hover
{
	border-bottom: 1px dashed #ED971F;
	color: #ED971F;
}





#slider
{
	margin: auto;
	margin-left: 100px;
	overflow: hidden;
	padding: 20px;
	border: 1px solid rgba(0, 0, 0, 0.15);
	margin-top: 80px;
	border-radius: 10px;
	box-shadow: 2px 2px 14px rgba(0, 0, 0, 0.25);
	position: relative;
	width: 740px;
	height: 100%;
}


.conc{
position: absolute;
margin-left: 900px;
margin-top: -380px;
overflow: hidden;
	padding: 20px;
	border: 1px solid rgba(0, 0, 0, 0.15);
	/*margin-top: 50px;*/
	border-radius: 10px;
	box-shadow: 2px 2px 14px rgba(0, 0, 0, 0.25);
	/*position: relative;*/
	width: 400px;
	/*height: 400px;*/
	
}
.conc h4
{

 	color: #0A7FAD;
  text-shadow: -1px 0px 0px rgba(0, 0, 0, 0.50);
  font-size: 50px;


}

textarea{
		transition: left .3s linear;
	-moz-transition: left .3s linear;
	-o-transition: left .3s linear;
	-webkit-transition: left .3s linear;
	margin-left: -25px;
  font-family: century gothic;
}

.slider-container
{
	margin: 0 auto;
	padding: 0;
	width: 850px;
  min-height: 180px;
  border-bottom: 1px solid #ccc;
  height: auto;
}

.slider-container h4
{
 	color: #0A7FAD;
  text-shadow: -1px 0px 0px rgba(0, 0, 0, 0.50);
  font-size: 50px;
}


  </style>
</head>
<body>
<header>
  <div id="logo"><a href="Home.php"><img src="1.jpg"></a></div>
<div class="search"><h4 style="color:white;"> Search:  <input type="textbox" id="text"/></h4></div>
</header>
<!-- <input type="textbox" id="text"/> -->
<section>	
<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="home1.jpg" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <h3>Chania</h3>
          <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
        </div>
      </div>

      <div class="item">
        <img src="home2.jpg" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <h3>Chania</h3>
          <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
        </div>
      </div>
    
      <div class="item">
        <img src="home3.jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <h3>Flowers</h3>
          <p>Beatiful flowers in Kolymbari, Crete.</p>
        </div>
      </div>

      <div class="item">
        <img src="home4.jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <h3>Flowers</h3>
          <p>Beatiful flowers in Kolymbari, Crete.</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<!-- 
<div id="feedbox"  grid_8>
<ul id="news" >
<li><a href="#">Trending News</a></li>
<li><a href="#">Latest Concerts</a></li>
</ul>
</div>
 -->
</section>
<div id="slider">

  <div class="slider-container">
    <h4>NEWS</h4>
    <textarea readonly rows="7" cols="100">
  

     </textarea>
       	<?php $query="select `link` from `crawl` where `id`=51";
    	if($query_run=mysql_query($query))
    	{
    		$l = mysql_result($query_run, 0,`link`);

    	}
?><a href="<?php echo $l;?>">asd</a>
    <textarea readonly rows="7" cols="100">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</textarea>
    <textarea readonly rows="7" cols="100">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</textarea>
    <textarea readonly rows="7" cols="100">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</textarea>
    <textarea readonly rows="7" cols="100">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</textarea>
    <textarea readonly rows="7" cols="100">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</textarea>
    <textarea readonly rows="7" cols="100">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</textarea>
    <textarea readonly rows="7" cols="100">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</textarea>
    <textarea readonly rows="7" cols="100">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</textarea>
    <textarea readonly rows="7" cols="100">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</textarea>
  </div>

</div>

<div class="conc">
<h4>CONCERT</h4>
<textarea readonly rows="3" cols="50">AVICI</textarea>
</div>  


</body>
</html>
<?php
}
else
{
	include 'Login.inc.php';
}
?>