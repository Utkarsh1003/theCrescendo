<?php
require 'core.inc.php';
require 'connect.inc.php';
require 'fb.inc.php';
$check_login = 0;
if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{
    $check_login = 1;
    $gquery = "SELECT `user_email` FROM `login_info` WHERE `user_email`='".$_SESSION['user_id']."'";
    if($gquery_run = mysql_query($gquery))
    {
        $user = mysql_result($gquery_run, 0,`user_email`);
    }
    $g2query = "SELECT `user_name` FROM `login_info` WHERE `user_email`='".$_SESSION['user_id']."'";
    if($g2query_run = mysql_query($g2query))
    {
        $user2 = mysql_result($g2query_run, 0,`user_name`);
    }
}
else
{
    $check_login = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SHIELD - Free Bootstrap 3 Theme">
    <meta name="author" content="Carlos Alvarez - Alvarez.is - blacktie.co">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>theCrescendo</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/icon.png" />
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main1.css" rel="stylesheet">
     <link href="assets/css/Tab.css" rel="stylesheet">
    <!-- <link href="assets/css/Tabs.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="assets/css/icomoon.css">
    <link href="assets/css/animate-custom.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<!-- <link href="trendingstyle.css" rel="stylesheet" type="text/css"> -->
	<!-- Fonts -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


    
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    
    <script src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/modernizr.custom.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		 	
  
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
      <style type="text/css">
    .main{
        margin-left: 40px;
    }
        .image
        {
            width: 20%;
            float: left;
            /*height: 150px;*/
            /*border-right:2px solid red;*/
        }
        .content1
        {

            width: 80%;
            float: left;
            font-size: 75%;
         /*border:2px solid red;*/
         vertical-align: middle;   /*height:130px;*/
        }
    </style>
  </head>

  <body data-spy="scroll" data-offset="0" data-target="#navbar-main">
  
<script type="text/javascript">
		function apivid(search_value,idp)
	{

 	// document.write(idp);
	var channelName=search_value;
	console.log(channelName);
		
	$(document).ready(function(){
			$.get(
				"https://www.googleapis.com/youtube/v3/channels",{
					part:'contentDetails',
					forUsername:channelName,
					key:'AIzaSyCtpbHWkAKjzWZkBC4doZqV0aG0VroZpQM'},
					function(data){
						$.each(data.items,function(i,item){
							console.log(item);
							pid=item.contentDetails.relatedPlaylists.uploads;
							getvids(pid);
							})
					}
				);

	function getvids(pid){

		$.get(
				"https://www.googleapis.com/youtube/v3/playlistItems",{
					part:'snippet',
					maxResults:12,
					playlistId:pid,
					key:'AIzaSyCtpbHWkAKjzWZkBC4doZqV0aG0VroZpQM'},
					function(data){
						var output;
						$.each(data.items,function(i,item){
							console.log(item);
							videoTitle=item.snippet.title;
							videoId=item.snippet.resourceId.videoId;
							video=videoId;
							output='<li><iframe src=\"//www.youtube.com/embed/'+videoId+'\" frameborder="1"></iframe></li>';
							var pid="#" + idp;
							$(pid).append(output); 
							})
					}
				);
	}



	});
}
	</script>	


  
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
                        <a href="blogtest.php">Blog</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right" style="margin-right:5px">
                	<li class="page-scroll"><a href="#asd">Subscriptions</a></li>
					<li class="page-scroll"> <a href="#news">News</a></li>
					<li class="page-scroll"> <a href="#concert">Concert</a></li>
			        <li>
			    	<?php
				        if($check_login)
				        {
				        	echo '<a href="profile3.php">Welcome! '.$user2.'</a>';
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

  
  
		

<style>

	li{
		display: inline-block;
	}
	</style>
	<script type="text/javascript">
	var video;
	
$(function () {
<?php
		$query="SELECT `user_subs` FROM `subscriptions` where `user_email` ='$user'";

		if($query_run=mysql_query($query)){
			while ($query_row =mysql_fetch_assoc($query_run)) {
				$sub =$query_row['user_subs'];
			
?>

var pass=<?php echo(json_encode($sub)); ?>;
			// apivid(pass);

	var nbrLiElem = ($('ul#myTab li').length); // Count how many <li> there are (minus 1 because one <li> is the "Add Tab" button)
		
		// Add a <li></li> line before the last-child
		// Including the complete structure: the li ID, the <a href=""></a> etc... check the Bootstrap togglable tabs structure
		$('ul#myTab li:last-child').after('<li id="li' + (nbrLiElem + 1) + '"><a href="#tab' + (nbrLiElem + 1) + '" style="text-decoration: none" role="tab" data-toggle="tab"><?php echo $sub; ?></a>');
		
		// Add a <div></div> markup after the last-child of the <div class="tab-content">
		$('div.tab_content div:last-child').after('<div class="tabs_item" id="tab' + (nbrLiElem + 1) + '"><ul id="result' + (nbrLiElem + 1) + '"></ul></div>');
		apivid(pass,"result" + (nbrLiElem + 1));
		nbrLiElem = nbrLiElem + 1; // 1 more element in the tab system
		$('#displayElem').html(nbrLiElem); // This line is not required (I just display, inside the <div id="messagesAlert"></div> markup, how many tabs there is)
	

<?php
			}
		}
		else{
			echo mysql_error();
		}

?>
});
 

	$(document).ready(function() { 

	(function ($) { 
		$('.tab ul.tabs').addClass('active').find('> li:eq(0)').addClass('current');
		
		$('.tab ul.tabs li a').click(function (g) { 
			var tab = $(this).closest('.tab'), 
				index = $(this).closest('li').index();
			
			tab.find('ul.tabs > li').removeClass('current');
			$(this).closest('li').addClass('current');
			
			tab.find('.tab_content').find('div.tabs_item').not('div.tabs_item:eq(' + index + ')').slideUp();
			tab.find('.tab_content').find('div.tabs_item:eq(' + index + ')').slideDown();
			
			g.preventDefault();
		} );
	})(jQuery);

});


	</script>

<div class="tab" id="asd">

			<ul class="tabs" id="myTab">
				<li><a href="#" style="text-decoration: none">Home</a></li>
			</ul> <!-- / tabs -->

			<div class="tab_content">

				<div class="tabs_item">
					<img src="img/subs.jpg">
					<!-- <h4>Tab 01 Neque ipsum dolor.</h4>
					<p>Consectetur adipisicing elit. Neque, repellat facilis totam ab eos distinctio sint atque maiores! Dignissimos, molestiae, rem accusantium iure vitae voluptatum voluptas repudiandae deserunt dolore quis! Quisquam mollitia eius sed.</p> -->
				</div> <!-- / tabs_item -->
				
			</div> <!-- / tab_content -->
		</div> <!-- / tab -->

<section class="section-divider textdivider divider1" style="background:url('img/cover2.jpg');" id="news">
			<div class="container">
				<h1>WHATS AROUND YOU</h1>
				<hr>
			</div><!-- container -->
		</section><!-- section -->
<div class="main" >
<div class="image">
<br>
<?php

error_reporting(E_ERROR | E_PARSE);
include_once('simple_html_dom.php');
$target_url="http://www.spin.com/news/";
$html = new simple_html_dom();
$html->load_file($target_url);


foreach($html->find('div[class=image-holder pull-left]') as $post)
{       
    $post->find('div[class=cat-overlay]',0)->outertext = '';
     foreach($post->find('img') as $link)
{
    ?>

<div style="height:140px"><img src="<?php echo $link->src;?>" style="height:125px;width:200px"></div>
<?php
}
    // echo $post."<br>";
}

?>
</div>
<div class="content1">
<?php

error_reporting(E_ERROR | E_PARSE);
// include_once('simple_html_dom.php');
$target_url="http://www.spin.com/news/";
$html = new simple_html_dom();
$html->load_file($target_url);


foreach($html->find('div[class=preview-holder pull-left]') as $post)
{       
    // $post->find('div[class=cat-overlay]',0)->outertext = '';
?>
<div style="height:141px"><?php echo $post."<br>"; ?></div>


<?php
}

?>
        </div>

    </div>
		
		
		<!-- ==== SECTION DIVIDER1 -->
		<section class="section-divider textdivider divider2" style="background:url('img/cover4.jpg');" id="concert">
			<div class="container">
				<h1>UPCOMING CONCERTS</h1>
				<hr>
				
			</div><!-- container -->
		</section><!-- section -->
		
		
		<!-- ==== SERVICES ==== -->
		<div class="container"  name="services">
			<br>
			<br>
			<div class="concert_main">
<?php
// include_once('simple_html_dom.php');
$target_url="http://in.bookmyshow.com/national-capital-region-ncr/events/music";
$html = new simple_html_dom();
$html->load_file($target_url);


foreach($html->find('div[class=ev-card]') as $post)
{		
	$post->find('div[class=buy-now]',0)->outertext = '';
	$post->find('div[class=pricing]',0)->outertext = '';
?>
				<div class="concert_box"><br><?php echo $post."<br/>"; ?></div>
<?php
}

?>				
			</div>
		</div><!-- container -->

		

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
		

	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/retina.js"></script>
	<script type="text/javascript" src="assets/js/tab.js"></script>
	<script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="assets/js/smoothscroll.js"></script>
	<script type="text/javascript" src="assets/js/jquery-func.js"></script>
	<!-- Core JavaScript Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <script type="text/javascript">
    	//jQuery for page scrolling feature - requires jQuery Easing plugin
		$(function() {
		    $('.page-scroll a').bind('click', function(event) {
		        var $anchor = $(this);
		        $('html, body').stop().animate({
		            scrollTop: $($anchor.attr('href')).offset().top
		        }, 1500, 'easeInOutExpo');
		        event.preventDefault();
		    });
		});
    </script>
  </body>
</html>
