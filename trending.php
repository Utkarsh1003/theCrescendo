<?php
require 'core.inc.php';
require 'connect.inc.php';
require 'fb.inc.php';
$check_login = 0;
if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{
    $check_login = 1;
    $gquery = "SELECT `user_name` FROM `login_info` WHERE `user_email`='".$_SESSION['user_id']."'";
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
	<title>theCrescendo</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="shortcut icon" type="image/x-icon" href="img/icon.png" />
  	<!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="trendingstyle.css" rel="stylesheet" type="text/css">
	<!-- Fonts -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom">



<!-- NAV-BAR -->

<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">

            <div class="collapse navbar-collapse navbar-main-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li class="page-scroll">
                        <a href="Compose.php">Compose</a>
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
				            echo '<a href="profile3.php">Welcome! '.$user.'</a>';

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

	<header>
		<br><br><br><br><br><br><br><br><br><br><br><br>
		<h1> TO KNOW WHAT'S TRENDING AROUND THE WORLD</h1>
		<h3>SCROLL DOWN</h3>
	</header>
	
 <div class="top_header">
 	<h1>THE WORLD LOVED...</h1>
 </div>

		<div class="top">
	        <div class="pan top_male">
	          <div class="front">
	            <div class="box1 tm">
	            	<br>
	            	<p>TOP MALE ARTIST</p>
	            	<br>
	            	<button type="button" id="bttn11" class="btn btn-primary btn-lg outline">VIEW THE TOP 5</button>
	            </div>
	          </div>
	          <div class="back">
	            <div class="box2">
	            	<br>
	            	<p>TOP MALE ARTIST</p>
	            	<p>TOP 5</p>
	            	<button type="button" id="bttn12" class="btn btn-primary btn-lg outline">CLOSE</button><br>
	            	<div class="position">
	            		<div class="position_box"><p>1</p></div>
	            		<div class="position_box"><p>2</p></div>
	            		<div class="position_box"><p>3</p></div>
	            		<div class="position_box"><p>4</p></div>
	            		<div class="position_box"><p>5</p></div>
	            	</div>
	            	<div class="list male">
	            		<?php
						include('simple_html_dom.php');
						$url = 'http://www.billboard.com/charts/year-end/2014/top-artists-male';
						$html = file_get_html($url);
						
						?>
						<div class="list_content"><?php echo $html->find('div.row-title',0)."<br>";echo $html->find('div.row-title',1)."<br>"; echo $html->find('div.row-title',2)."<br>"; echo $html->find('div.row-title',3)."<br>"; echo $html->find('div.row-title',4)."<br>"; ?></div>
																									
						<?php
						?>
					
	            		
	            	</div>
	            </div>
	          </div>
	        </div>
	        <div class="pan top_female">
	          <div class="front">
	            <div class="box1 tf">
	            	<br>
	            	<p>TOP FEMALE ARTIST</p>
	            	<br>
	            	<button type="button" id="bttn21" class="btn btn-primary btn-lg outline">VIEW THE TOP 5</button>
	            </div>
	          </div>
	          <div class="back">
	            <div class="box2">
	            	<br>
	            	<p>TOP FEMALE ARTIST</p>
	            	<p>TOP 5</p>
	            	<button type="button" id="bttn22" class="btn btn-primary btn-lg outline">CLOSE</button><br>
	            	<div class="position">
	            		<div class="position_box"><p>1</p></div>
	            		<div class="position_box"><p>2</p></div>
	            		<div class="position_box"><p>3</p></div>
	            		<div class="position_box"><p>4</p></div>
	            		<div class="position_box"><p>5</p></div>
	            	</div>
	            	<div class="list female">
	            		<?php
					
						$url = 'http://www.billboard.com/charts/year-end/2014/top-artists-female';
						$html = file_get_html($url);
						?>
	            		<div class="list_content"><?php echo $html->find('div.row-title',0)."<br>";echo $html->find('div.row-title',1)."<br>"; echo $html->find('div.row-title',2)."<br>"; echo $html->find('div.row-title',3)."<br>"; echo $html->find('div.row-title',4)."<br>"; ?></div>
	            		<?php
	            		?>

	            	</div>
	            </div>
	          </div>
	        </div>
	        <div class="pan top_album">
	          <div class="front">
	            <div class="box1 ta">
	            	<br>
	            	<p>TOP ALBUM</p>
	            	<br>
	            	<button type="button" id="bttn31" class="btn btn-primary btn-lg outline">VIEW THE TOP 5</button>
	            </div>
	          </div>
	          <div class="back">
	            <div class="box2">
	            	<br>
	            	<p>TOP ALBUM</p>
	            	<p>TOP 5</p>
	            	<button type="button" id="bttn32" class="btn btn-primary btn-lg outline">CLOSE</button><br>
	            	<div class="position">
	            		<div class="position_box"><p>1</p></div>
	            		<div class="position_box"><p>2</p></div>
	            		<div class="position_box"><p>3</p></div>
	            		<div class="position_box"><p>4</p></div>
	            		<div class="position_box"><p>5</p></div>
	            	</div>
	            	<div class="list">
	            			<?php

							$url = 'http://www.billboard.com/charts/greatest-billboard-200-albums';
							$html = file_get_html($url);?>
	            		<div class="list_content"><?php echo $html->find('div.row-title',0);echo $html->find('div.row-title',1); echo $html->find('div.row-title',2); echo $html->find('div.row-title',3); echo $html->find('div.row-title',4); ?></div>
	            		<?php
	            		?>
	            	


	            	</div>
	            </div>
	          </div>
	        </div>
      	</div>
    <div class="top_songs">
    	<div class="top_songs_header"><h1>TOP 10 SONGS</h1></div>
    	<div id="container">
		
		<ul id="results"></ul>
		</div>
    	<!-- <div class="top_3">
    		<div class="song3"><img src="top-male-artist.jpg"><div class="song3_cont"><p>1</p></div></div>
    		<div class="song3"><img src="top-female-artist.jpg"><div class="song3_cont"><p>2</p></div></div>
    		<div class="song3"><img src="top-album.jpg"><div class="song3_cont"><p>3</p></div></div>
    	</div>
    	<div class="top_4">
    		<div class="song4"><img src="top-male-artist.jpg" style="height:341px"><div class="song3_cont"><p>4</p></div></div>
    		<div class="song4"><img src="top-female-artist.jpg" style="height:341px"><div class="song3_cont"><p>5</p></div></div>
    		<div class="song4"><img src="top-album.jpg" style="height:341px"><div class="song3_cont"><p>6</p></div></div>
    		<div class="song4"><img src="top-male-artist.jpg" style="height:341px"><div class="song3_cont"><p>7</p></div></div>
    	</div>
    	<div class="last_3">
    		<div class="song8"><img src="top-male-artist.jpg" style="height:227px"><div class="song3_cont"><p>8</p></div></div>
    		<div class="song8"><img src="top-female-artist.jpg" style="height:227px"><div class="song3_cont"><p>9</p></div></div>
    		<div class="song8"><img src="top-album.jpg" style="height:227px"><div class="song3_cont"><p>10</p></div></div>
    	</div> -->
    </div>
<div class="season_header">
	<h1>BEST OF THE SEASON</h1>
</div>
<div class="season">
	<div class="winter">
		<div><h3>Winter</h3><br><p>Happy</p><p style="color:#666666">By Pharrell Williams</p><br><div class="season_img"><a href=""><img src="img/winter.jpg"></a></div></div>
	</div>
	<div class="spring">
		<div><h3>Spring</h3><br><p>All of Me</p><p style="color:#666666">By John Legend</p><br><div class="season_img"><a href=""><img src="img/spring.jpg"></a></div></div>
	</div>
	<div class="summer">
		<div><h3>Summer</h3><br><p>Rude</p><p style="color:#666666">By Magic!</p><br><div class="season_img"><a href=""><img src="img/summer.jpg"></a></div>
		</div></div>
	<div class="autumn">
		<div><h3>Autumn</h3><br><p>All About that Bass</p><p style="color:#666666">By Meghan Trainor</p><br><div class="season_img"><a href=""><img src="img/fall.jpg"></a></div></div>
	</div>
</div>
<div class="end">
	<h2>STAY TUNED WITH US FOR MORE LATEST TRENDING NEWS</h2>
</div>


	<!-- Core JavaScript Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

	 <script type="text/javascript">
	 		$(document).ready(function(){
		$('#bttn11').click(function(){
			$('.top_male').addClass('flip');
			$('.top_female').removeClass('flip');
			$('.top_album').removeClass('flip');
		});
		$('#bttn12').click(function(){
			$('.top_male').removeClass('flip');
		});
	});
	 			 		$(document).ready(function(){
		$('#bttn21').click(function(){
			$('.top_female').addClass('flip');
			$('.top_male').removeClass('flip');
			$('.top_album').removeClass('flip');
		});
		$('#bttn22').click(function(){
			$('.top_female').removeClass('flip');
		});
	});
	 			 			 		$(document).ready(function(){
		$('#bttn31').click(function(){
			$('.top_album').addClass('flip');
			$('.top_male').removeClass('flip');
			$('.top_female').removeClass('flip');
		});
		$('#bttn32').click(function(){
			$('.top_album').removeClass('flip');
		});
	});
	//jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});

// Youtube Video Script
	var video_cnt=0;		
	$(document).ready(function(){
		console.log("y");
			$.get(
				"https://www.googleapis.com/youtube/v3/channels",{
					part:'contentDetails',
					id: 'UC2xPTh718YXqrqm0qeedHxw',
					// forUsername:channelName,
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
					maxResults:10,
					playlistId:pid,
					key:'AIzaSyCtpbHWkAKjzWZkBC4doZqV0aG0VroZpQM'},
					function(data){
						var output;
						$.each(data.items,function(i,item){
							console.log(item);
							video_cnt++;
							videoTitle=item.snippet.title;
							videoId=item.snippet.resourceId.videoId;
							var li=document.createElement('li');
							$(li).appendTo("#results"); 
							var frame=document.createElement('iframe');
							var src="//www.youtube.com/embed/"+videoId;
							$(frame).attr('src',src);
							$(frame).attr('frameborder','0');
							var class_name=0;
							if(video_cnt<=3)
							{
								console.log("in if"+video_cnt);
								class_name=1;
								$(frame).addClass('width'+class_name);
							}
							else if(video_cnt>3 && video_cnt<=7){
								console.log("in else"+video_cnt);
								class_name=2;
								$(frame).addClass('width'+class_name);	
							}
							else{
								console.log("in else"+video_cnt);
								class_name=3;
								$(frame).addClass('width'+class_name);	
							}
							$(frame).appendTo(li);
							
							//output='<li><iframe src=\"//www.youtube.com/embed/'+videoId+'\" frameborder="1"  ></iframe></li>';
							//$('#results').append(output); 
						})
					}
				);
	}



	});

	 </script>
</body>
