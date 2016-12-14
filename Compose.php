<?php
require 'core.inc.php';
require 'connect.inc.php';
require 'fb.inc.php';
error_reporting(E_ERROR | E_PARSE);
$check_login = 0;
if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{
    $check_login = 1;
    $gquery = "SELECT `user_name` FROM `login_info` WHERE `user_email`='".$_SESSION['user_id']."'";
    if($gquery_run = mysql_query($gquery))
    {
        $user = mysql_result($gquery_run, 0,`user_name`);
    }
    $email= "SELECT `user_email` FROM `login_info` WHERE `user_email`='".$_SESSION['user_id']."'";
           if($email_run = mysql_query($email))
            {
              $user1 = mysql_result($email_run, 0,`user_email`);
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
        <link href="edit.css" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" type="image/x-icon" href="img/icon.png" />
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!-- Fonts -->
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script> -->
    </head>
    <body class="navbar navbar-custom navbar-fixed-top" role="navigation" style="background-color:black">
    <!-- NAV-BAR -->

<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">

            <div class="collapse navbar-collapse navbar-main-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li class="page-scroll">
                        <a href="news7.php">News</a>
                    </li>
                    <li class="page-scroll">
                        <a href="trending.php">Trending</a>
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
<div id="buttn1" class="tap_button"><button type="button" class="btn btn-primary btn-lg outline">Select tone given below and tap from Q to P</button></div>
        <section>
            <div class="square11" id="sq11"></div>
            <div class="square12" id="sq12"></div>
            <div class="square13" id="sq13"></div>
            <div class="square14" id="sq14"></div>
            <div class="square15" id="sq15"></div>
            <div class="square16" id="sq16"></div>
            <div class="square17" id="sq17"></div>
            <div class="square18" id="sq18"></div>
            <div class="square19" id="sq19"></div>
            <div class="square110" id="sq110"></div>
            <div class="square111" id="sq111"></div>
            <div class="square112" id="sq112"></div>
            <div class="square113" id="sq113"></div>
            <div class="square114" id="sq114"></div>
            <div class="square115" id="sq115"></div>
            <div class="square116" id="sq116"></div>
            
            <div class="square21" id="sq21" name="sqw21"></div>
            <div class="square22" id="sq22"></div>
            <div class="square23" id="sq23"></div>
            <div class="square24" id="sq24"></div>
            <div class="square25" id="sq25"></div>
            <div class="square26" id="sq26"></div>
            <div class="square27" id="sq27"></div>
            <div class="square28" id="sq28"></div>
            <div class="square29" id="sq29"></div>
            <div class="square210" id="sq210"></div>
            <div class="square211" id="sq211"></div>
            <div class="square212" id="sq212"></div>
            <div class="square213" id="sq213"></div>
            <div class="square214" id="sq214"></div>
            <div class="square215" id="sq215"></div>
            <div class="square216" id="sq216"></div>

            <div class="square31" id="sq31"></div>
            <div class="square32" id="sq32"></div>
            <div class="square33" id="sq33"></div>
            <div class="square34" id="sq34"></div>
            <div class="square35" id="sq35"></div>
            <div class="square36" id="sq36"></div>
            <div class="square37" id="sq37"></div>
            <div class="square38" id="sq38"></div>
            <div class="square39" id="sq39"></div>
            <div class="square310" id="sq310"></div>
            <div class="square311" id="sq311"></div>
            <div class="square312" id="sq312"></div>
            <div class="square313" id="sq313"></div>
            <div class="square314" id="sq314"></div>
            <div class="square315" id="sq315"></div>
            <div class="square316" id="sq316"></div>

            <div class="square41" id="sq41"></div>
            <div class="square42" id="sq42"></div>
            <div class="square43" id="sq43"></div>
            <div class="square44" id="sq44"></div>
            <div class="square45" id="sq45"></div>
            <div class="square46" id="sq46"></div>
            <div class="square47" id="sq47"></div>
            <div class="square48" id="sq48"></div>
            <div class="square49" id="sq49"></div>
            <div class="square410" id="sq410"></div>
            <div class="square411" id="sq411"></div>
            <div class="square412" id="sq412"></div>
            <div class="square413" id="sq413"></div>
            <div class="square414" id="sq414"></div>
            <div class="square415" id="sq415"></div>
            <div class="square416" id="sq416"></div>

            <div class="square51" id="sq51"></div>
            <div class="square52" id="sq52"></div>
            <div class="square53" id="sq53"></div>
            <div class="square54" id="sq54"></div>
            <div class="square55" id="sq55"></div>
            <div class="square56" id="sq56"></div>
            <div class="square57" id="sq57"></div>
            <div class="square58" id="sq58"></div>
            <div class="square59" id="sq59"></div>
            <div class="square510" id="sq510"></div>
            <div class="square511" id="sq511"></div>
            <div class="square512" id="sq512"></div>
            <div class="square513" id="sq513"></div>
            <div class="square514" id="sq514"></div>
            <div class="square515" id="sq515"></div>
            <div class="square516" id="sq516"></div>

            <div class="square61" id="sq61"></div>
            <div class="square62" id="sq62"></div>
            <div class="square63" id="sq63"></div>
            <div class="square64" id="sq64"></div>
            <div class="square65" id="sq65"></div>
            <div class="square66" id="sq66"></div>
            <div class="square67" id="sq67"></div>
            <div class="square68" id="sq68"></div>
            <div class="square69" id="sq69"></div>
            <div class="square610" id="sq610"></div>
            <div class="square611" id="sq611"></div>
            <div class="square612" id="sq612"></div>
            <div class="square613" id="sq613"></div>
            <div class="square614" id="sq614"></div>
            <div class="square615" id="sq615"></div>
            <div class="square616" id="sq616"></div>

           

            <div class="circle1" id="c1" onclick="selectrhythm()"></div> 
            <div class="circle2" id="c2" onclick="selectchords()"></div> 
            <div class="circle3" id="c3" onclick="selectbass()"></div> 
            <div class="circle4" id="c4" onclick="selectdrums1()"></div> 
            <div class="circle5" id="c5" onclick="selectdrums2()"></div> 
            <div class="circle6" id="c6" onclick="selectdrums3()"></div> 
            <div class="circle7" id="c7" onclick="selectlead()"></div> 

            <div class="text1"><p style="color:white; text-shadow:0 0 15px #4D4DFF;">RYTHM</p></div>
            <div class="text2"><p style="color:white;text-shadow:0 0 15px #FF0000;">CHORDS</p></div>
            <div class="text3"><p style="color:white;text-shadow:0 0 15px #FFFF00;">BASS</p></div>
            <div class="text4"><p style="color:white;text-shadow:0 0 15px #F5CCB0;">DRUMS</p></div>
            <div class="text5"><p style="color:white;text-shadow:0 0 15px #F5CCB0;">DRUMS</p></div>
            <div class="text6"><p style="color:white;text-shadow:0 0 15px #F5CCB0;">DRUMS</p></div>
            <div class="text7"><p style="color:white;text-shadow:0 0 15px #7FFF00;">LEAD</p></div>


            <div class="play1" id="p1" onclick="prin()"><i class="fa fa-spinner fa-2x"></i></div> 
            <div class="play2" id="p2" onclick="prin2()"><i class="fa fa-spinner fa-2x"></i></div> 
            <div class="play3" id="p3" onclick="prin3()"><i class="fa fa-spinner fa-2x"></i></div> 
            <div class="play4" id="p4" onclick="prin4()"><i class="fa fa-spinner fa-2x"></i></div> 
            <div class="play5" id="p5" onclick="prin5()"><i class="fa fa-spinner fa-2x"></i></div> 
            <div class="play6" id="p6" onclick="prin6()"><i class="fa fa-spinner fa-2x"></i></div> 
            <div class="play7" id="p7" onclick="prin7()"><i class="fa fa-spinner fa-2x"></i></div>
            <button onclick="mp()" class="record_btn" style="background:none;border:transparent"><i class="fa fa-play fa-4x"></i></button>
            <button onclick="download()" class="download_btn" style="background:none;border:transparent"><i class="fa fa-download fa-4x"></i></button>

            <!-- Core JavaScript Files -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
            <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
            <script src="p5.js"></script>
            <script src="p5.sound.js"></script>

        
        <script type="text/javascript">
                
                var x=0,y=0;
                function RandomColor() {
                var colors = ['#FAEBD7', '#FF7F50', '#A9A9A9' , '#1E90FF','#FFFACD','#FF0000','#FFFF33','#6666CC','#99CCCC','#0066CC','#CCCCCC','#00FF00','#E0FFFF','#FFA07A','#B0C4DE','#3CB371','#FFDEAD','#FFA500','#87CEEB','#FF6347'];
                return colors[Math.floor(Math.random()*colors.length)];
                }

                
                function func1()
                {
                      var rcolor = RandomColor();
                    $(document).ready(function(){
                        $('#sq11 , #sq12 , #sq13 , #sq21 , #sq22 , #sq23, #sq24, #sq31 , #sq32, #sq33, #sq41 , #sq42, #sq51').css('background-color', rcolor);
                        $("#sq11 , #sq12 , #sq13 , #sq21 , #sq22 , #sq23, #sq24, #sq31 , #sq32, #sq33, #sq41 , #sq42, #sq51").fadeIn();
                        $("#sq24, #sq33, #sq42, #sq51").fadeOut(20);
                        $("#sq23, #sq32, #sq41").fadeOut(30);
                        $("#sq13 , #sq22, #sq31").fadeOut(40);
                        $("#sq11 , #sq12 , #sq21").fadeOut(50);
                        
                        
                    });
                }


                function func2()
                {
                     var rcolor = RandomColor();
                    $(document).ready(function(){
                        $('#sq14 , #sq15 , #sq16 , #sq17 , #sq25 , #sq26 , #sq27, #sq44, #sq35, #sq36, #sq37 ,#sq38,#sq45, #sq46, #sq47 ,#sq48,#sq55, #sq56, #sq57 ,#sq65').css('background-color', rcolor);
                        $("#sq14 , #sq15 , #sq16 , #sq17 , #sq25 , #sq26 , #sq27, #sq44, #sq35, #sq36, #sq37 ,#sq38,#sq45, #sq46, #sq47 ,#sq48,#sq55, #sq56, #sq57 ,#sq65").fadeIn();
                        $("#sq14 , #sq15 , #sq16 , #sq17").fadeOut(20);
                        $("#sq25 , #sq26 , #sq27").fadeOut(30);
                        $("#sq35, #sq36, #sq37 ,#sq38").fadeOut(40);
                        $("#sq44,#sq45, #sq46, #sq47 ,#sq48").fadeOut(50);
                        $("#sq55, #sq56, #sq57,#sq65").fadeOut(60);
                        //$("#sq17").fadeOut(700);
                    });
                }
            


                function func3()
                {
                    var rcolor = RandomColor();
                    $(document).ready(function(){
                        $('#sq17 , #sq18 , #sq19 , #sq110 , #sq111 , #sq26,#sq27 , #sq28 , #sq29 , #sq110 , #sq111 , #sq36,#sq37 , #sq38 , #sq39 , #sq48 , #sq49 , #sq410, #sq411 , #sq59 , #sq510').css('background-color', rcolor);
                        $("#sq17 , #sq18 , #sq19 , #sq110 , #sq111 , #sq26,#sq27 , #sq28 , #sq29 , #sq110 , #sq111 , #sq36,#sq37 , #sq38 , #sq39 , #sq48 , #sq49 , #sq410, #sq411 , #sq59 , #sq510").fadeIn();
                        $("#sq17 , #sq18 , #sq19 , #sq110 , #sq111").fadeOut(20);
                        $("#sq26,#sq27 , #sq28 , #sq29 , #sq110 , #sq211").fadeOut(30);
                        $("#sq36,#sq37 , #sq38 , #sq39").fadeOut(40);
                        $("#sq48 , #sq49 , #sq410, #sq411").fadeOut(50);
                        $("#sq59 , #sq510").fadeOut(60);
                        //$("#sq3").fadeOut(700);
                    });
                }



                function func4()
                {

                    var rcolor = RandomColor();
                    $(document).ready(function(){
                        $('#sq19 , #sq110 ,#sq111 , #sq112 , #sq113,#sq210 , #sq211 , #sq212 , #sq39 , #sq310 , #sq311,#sq312 , #sq313 , #sq314 , #sq411 , #sq412,#sq413,#sq410,#sq511,#sq510,#sq69,#sq610,#sq611').css('background-color', rcolor);
                        $("#sq19 , #sq110 , #sq111 , #sq112 , #sq113,#sq210 , #sq211,#sq212 ,#sq39 , #sq310 , #sq311,#sq312 , #sq313 , #sq314 , #sq411 , #sq412 , #sq413,#sq410 , #sq511 , #sq510 , #sq69 , #sq610 , #sq611").fadeIn();
                        $("#sq19 , #sq110 , #sq111 , #sq112 , #sq113").fadeOut(20);
                        $("#sq210 , #sq211,#sq212").fadeOut(30);
                        $("#sq39 , #sq310 , #sq311,#sq312 , #sq313 , #sq314").fadeOut(40);
                        $("#sq412 , #sq413,#sq410,#sq411").fadeOut(50);
                        $("#sq511 , #sq510").fadeOut(45);
                        $("#sq69 , #sq610 , #sq611").fadeOut(35);

                    });
                }


                function func5()
                {
                    var rcolor = RandomColor();
                    $(document).ready(function(){
                        $('#sq113 , #sq114 , #sq115 , #sq116 , #sq212 , #sq213,#sq214,#sq215 , #sq216 , #sq313 , #sq314 , #sq315,#sq414 , #sq415 , #sq416 , #sq515 , #sq616').css('background-color', rcolor);
                        $("#sq113 , #sq114 , #sq115 , #sq116 , #sq212 , #sq213,#sq214,#sq215 , #sq216 , #sq313 , #sq314 , #sq315,#sq414 , #sq415 , #sq416 , #sq515 , #sq616").fadeIn();
                        $("#sq113 , #sq114 , #sq115 , #sq116").fadeOut(10);
                        $("#sq212 , #sq213,#sq214,#sq215 , #sq216").fadeOut(25);
                        $("#sq313 , #sq314 , #sq315").fadeOut(30);
                        $("#sq414 , #sq415 , #sq416").fadeOut(40);
                        $("#sq515").fadeOut(45);
                        $("#sq616").fadeOut(50);
                    });
                }



                function func6()
                {
                     var rcolor = RandomColor();
                    $(document).ready(function(){
                        $('#sq61 , #sq62 , #sq63 , #sq64 , #sq65, #sq52,#sq53,#sq54,#sq41,#sq42,#sq43,#sq33,#sq34,#sq35,#sq21,#sq22,#sq12').css('background-color', rcolor);
                        $("#sq61 , #sq62 , #sq63 , #sq64 , #sq65, #sq52,#sq53,#sq54,#sq41,#sq42,#sq43,#sq33,#sq34,#sq35,#sq21,#sq22,#sq12").fadeIn();
                       
                        $("#sq61 , #sq62 , #sq63 , #sq64 , #sq65").fadeOut(10);
                        $("#sq52,#sq53,#sq54").fadeOut(20);
                        $("#sq41,#sq42,#sq43").fadeOut(30);
                        $("#sq33,#sq34,#sq35").fadeOut(40);
                        $("#sq21,#sq22").fadeOut(45);
                        $("#sq12").fadeOut(50);
                    });
                }    


                function func7()
                {

                     var rcolor = RandomColor();
                    $(document).ready(function(){
                        $('#sq64 , #sq65 , #sq66 , #sq53 , #sq54 , #sq55,#sq56 , #sq57 , #sq58 , #sq45 , #sq46 , #sq47, #sq32 , #sq33 , #sq34 , #sq23 , #sq12,#sq14').css('background-color', rcolor);
                        $("#sq64 , #sq65 , #sq66 , #sq53 , #sq54 , #sq55,#sq56 , #sq57 , #sq58 , #sq45 , #sq46 , #sq47, #sq32 , #sq33 , #sq34 , #sq23 , #sq12,#sq14").fadeIn();
                        
                        $("#sq64 , #sq65 , #sq66").fadeOut(10);
                        $("#sq53 , #sq54 , #sq55,#sq56 , #sq57 , #sq58").fadeOut(20);
                        $("#sq45 , #sq46 , #sq47").fadeOut(30);
                        $("#sq32 , #sq33 , #sq34").fadeOut(40);
                        $("#sq23").fadeOut(45);
                        $("#sq12,#sq14").fadeOut(50);
                    });
                }


                function func8()
                {

                    var rcolor = RandomColor();
                    $(document).ready(function(){
                        $('#sq66 , #sq67 , #sq68 , #sq55 , #sq56 , #sq57,#sq58 , #sq59 , #sq46 , #sq47 , #sq48 , #sq37,#sq38 , #sq39 , #sq25 , #sq26 , #sq27 , #sq28,#sq29 , #sq210 , #sq17 , #sq18').css('background-color', rcolor);
                        $("#sq66 , #sq67 , #sq68 , #sq55 , #sq56 , #sq57,#sq58 , #sq59 , #sq46 , #sq47 , #sq48 , #sq37,#sq38 , #sq39 , #sq25 , #sq26 , #sq27 , #sq28,#sq29 , #sq210 , #sq17 , #sq18").fadeIn();
                        
                        $("#sq66 , #sq67 , #sq68").fadeOut(10);
                        $("#sq55 , #sq56 , #sq57,#sq58 , #sq59").fadeOut(20);
                        $("#sq46 , #sq47 , #sq48").fadeOut(30);
                        $("#sq37,#sq38 , #sq39").fadeOut(40);
                        $("#sq25 , #sq26 , #sq27 , #sq28,#sq29 , #sq210").fadeOut(45);
                        $("#sq17 , #sq18").fadeOut(50);
                       // $("#sq8").fadeOut(700);
                    });
                }



                function func9()
                {
                    var rcolor = RandomColor();
                    $(document).ready(function(){
                        $('#sq69 , #sq610 , #sq611 , #sq612 , #sq613 , #sq614,#sq511 , #sq512 , #sq512 , #sq410 , #sq412 , #sq415,#sq312 , #sq313 , #sq314 , #sq29 , #sq211 , #sq212,#sq110 , #sq113').css('background-color', rcolor);
                        $("#sq69 , #sq610 , #sq611 , #sq612 , #sq613 , #sq614,#sq511 , #sq512 , #sq512 , #sq410 , #sq412 , #sq415,#sq312 , #sq313 , #sq314 , #sq29 , #sq211 , #sq212,#sq110 , #sq113").fadeIn();
                       
                        $("#sq69 , #sq610 , #sq611 , #sq612 , #sq613 , #sq614").fadeOut(10);
                        $("#sq511 , #sq512 , #sq512").fadeOut(20);
                        $("#sq410 , #sq412 , #sq415").fadeOut(30);
                        $("#sq312 , #sq313 , #sq314").fadeOut(40);
                        $("#sq29 , #sq211 , #sq212").fadeOut(45);
                        $("#sq110 , #sq113").fadeOut(50);

                        //$("#sq9").fadeOut(700);
                    });
                }


                function func10()
                {
                    var rcolor = RandomColor();
                    $(document).ready(function(){
                        $('#sq613 , #sq614 , #sq615 , #sq616 , #sq512 , #sq513,#sq514 , #sq515 , #sq413 , #sq414 , #sq314 , #sq315,#sq316 , #sq212 , #sq213 , #sq112').css('background-color', rcolor);
                        $("#sq613 , #sq614 , #sq615 , #sq616 , #sq512 , #sq513,#sq514 , #sq515 , #sq413 , #sq414 , #sq314 , #sq315,#sq316 , #sq212 , #sq213 , #sq112").fadeIn();
                       
                        $("#sq613 , #sq614 , #sq615 , #sq616").fadeOut(10);
                        $("#sq512 , #sq513,#sq514 , #sq515").fadeOut(20);
                        $("#sq413 , #sq414").fadeOut(30);
                        $("#sq314 , #sq315,#sq316").fadeOut(40);
                        $("#sq212 , #sq213").fadeOut(45);
                        $("#sq112").fadeOut(50);
                        //$("#sq10").fadeOut(700);
                    });
                }

        function music()
        {
            if(y==1)           
            {
            var snd1 = new Audio();
            var src1 = document.createElement("source");
            src1.type="audio/mpeg";
            src1.src="Music/Rhythm/00.mp3";
            snd1.appendChild(src1);
            snd1.play();
            }
            

            else if(y==2)
            {
            var snd2 = new Audio();
            var src2 = document.createElement("source");
            src2.type="audio/mpeg";
            src2.src="Music/Rhythm/01.mp3";
            snd2.appendChild(src2);
            snd2.play();
            }

            else if (y==3)
            {
             var snd3 = new Audio();
            var src3 = document.createElement("source");
            src3.type="audio/mpeg";
            src3.src="Music/Rhythm/02.mp3";
            snd3.appendChild(src3);
            snd3.play();
            }    

           
            else if(y==4)
            {            
            var snd4 = new Audio();
            var src4 = document.createElement("source");
            src4.type="audio/mpeg";
            src4.src="Music/Rhythm/03.mp3";
            snd4.appendChild(src4);
            snd4.play();
            }

            else if(y==5)
            {
            var snd5 = new Audio();
            var src5 = document.createElement("source");
            src5.type="audio/mpeg";
            src5.src="Music/Rhythm/04.mp3";
            snd5.appendChild(src5);
            snd5.play();
            }
           
            else if(y==6)
            {    
            var snd6 = new Audio();
            var src6 = document.createElement("source");
            src6.type="audio/mpeg";
            src6.src="Music/Rhythm/05.mp3";
            snd6.appendChild(src6);
            snd6.play();
            }

            else if(y==7)
            {    
            var snd7 = new Audio();
            var src7 = document.createElement("source");
            src7.type="audio/mpeg";
            src7.src="Music/Rhythm/06.mp3";
            snd7.appendChild(src7);
            snd7.play();
           
            }
            
            else if(y==8)
            {    
            var snd8 = new Audio();
            var src8 = document.createElement("source");
            src8.type="audio/mpeg";
            src8.src="Music/Rhythm/07.mp3";
            snd8.appendChild(src8);
            snd8.play();
            }
            else if(y==9)
            {
            var snd9 = new Audio();
            var src9 = document.createElement("source");
            src9.type="audio/mpeg";
            src9.src="Music/Rhythm/08.mp3";
            snd9.appendChild(src9);
            snd9.play();
            }

            else if(y==10)
            {
            var snd10 = new Audio();
            var src10 = document.createElement("source");
            src10.type="audio/mpeg";
            src10.src="Music/Rhythm/09.mp3";
            snd10.appendChild(src10);
            snd10.play();
            }

            
            else if(y==11)
            {
            var snd11 = new Audio();
            var src11 = document.createElement("source");
            src11.type="audio/mpeg";
            src11.src="Music/Chords/00.mp3";
            snd11.appendChild(src11);
            snd11.play();
            }


            else if(y==12)
            {
            var snd12 = new Audio();
            var src12 = document.createElement("source");
            src12.type="audio/mpeg";
            src12.src="Music/Chords/01.mp3";
            snd12.appendChild(src12);
            snd12.play();
            }

            
            else if(y==13)
            {
            var snd13 = new Audio();
            var src13 = document.createElement("source");
            src13.type="audio/mpeg";
            src13.src="Music/Chords/02.mp3";
            snd13.appendChild(src13);
            snd13.play();
            }


            else if(y==14)
            {
            var snd14 = new Audio();
            var src14 = document.createElement("source");
            src14.type="audio/mpeg";
            src14.src="Music/Chords/03.mp3";
            snd14.appendChild(src14);
            snd14.play();
            }



            else if(y==15)
            {
            var snd15 = new Audio();
            var src15 = document.createElement("source");
            src15.type="audio/mpeg";
            src15.src="Music/Chords/04.mp3";
            snd15.appendChild(src15);
            snd15.play();
            }


            else if(y==16)
            {
            var snd16 = new Audio();
            var src16 = document.createElement("source");
            src16.type="audio/mpeg";
            src16.src="Music/Chords/05.mp3";
            snd16.appendChild(src16);
            snd16.play();
            }



            else if(y==17)
            {
            var snd17 = new Audio();
            var src17 = document.createElement("source");
            src17.type="audio/mpeg";
            src17.src="Music/Chords/06.mp3";
            snd17.appendChild(src17);
            snd17.play();
            }


            else if(y==18)
            {
            var snd18 = new Audio();
            var src18 = document.createElement("source");
            src18.type="audio/mpeg";
            src18.src="Music/Chords/07.mp3";
            snd18.appendChild(src18);
            snd18.play();
            }



            else if(y==19)
            {
            var snd19 = new Audio();
            var src19 = document.createElement("source");
            src19.type="audio/mpeg";
            src19.src="Music/Chords/08.mp3";
            snd19.appendChild(src19);
            snd19.play();
            }

             else if(y==20)
            {
            var snd20 = new Audio();
            var src20 = document.createElement("source");
            src20.type="audio/mpeg";
            src20.src="Music/Chords/09.mp3";
            snd20.appendChild(src20);
            snd20.play();
            }


            else if(y==21)
            {
            var snd21 = new Audio();
            var src21 = document.createElement("source");
            src21.type="audio/mpeg";
            src21.src="Music/Bass/00.mp3";
            snd21.appendChild(src21);
            snd21.play();
            }

            else if(y==22)
            {
            var snd22 = new Audio();
            var src22 = document.createElement("source");
            src22.type="audio/mpeg";
            src22.src="Music/Bass/01.mp3";
            snd22.appendChild(src22);
            snd22.play();
            }


            else if(y==23)
            {
            var snd23 = new Audio();
            var src23 = document.createElement("source");
            src23.type="audio/mpeg";
            src23.src="Music/Bass/02.mp3";
            snd23.appendChild(src23);
            snd23.play();
            }

            else if(y==24)
            {
            var snd24 = new Audio();
            var src24 = document.createElement("source");
            src24.type="audio/mpeg";
            src24.src="Music/Bass/03.mp3";
            snd24.appendChild(src24);
            snd24.play();
            }

            else if(y==25)
            {
            var snd25 = new Audio();
            var src25 = document.createElement("source");
            src25.type="audio/mpeg";
            src25.src="Music/Bass/04.mp3";
            snd25.appendChild(src25);
            snd25.play();
            }

            else if(y==26)
            {
            var snd26 = new Audio();
            var src26 = document.createElement("source");
            src26.type="audio/mpeg";
            src26.src="Music/Bass/05.mp3";
            snd26.appendChild(src26);
            snd26.play();
            }
            else if(y==27)
            {
            var snd27 = new Audio();
            var src27 = document.createElement("source");
            src27.type="audio/mpeg";
            src27.src="Music/Bass/06.mp3";
            snd27.appendChild(src27);
            snd27.play();
            }
            else if(y==28)
            {
            var snd28 = new Audio();
            var src28 = document.createElement("source");
            src28.type="audio/mpeg";
            src28.src="Music/Bass/07.mp3";
            snd28.appendChild(src28);
            snd28.play();
            }
            else if(y==29)
            {
            var snd29 = new Audio();
            var src29 = document.createElement("source");
            src29.type="audio/mpeg";
            src29.src="Music/Bass/08.mp3";
            snd29.appendChild(src29);
            snd29.play();
            }

            else if(y==30)
            {
            var snd30 = new Audio();
            var src30 = document.createElement("source");
            src30.type="audio/mpeg";
            src30.src="Music/Bass/09.mp3";
            snd30.appendChild(src30);
            snd30.play();
            }


              else if(y==31)
            {
            var snd31 = new Audio();
            var src31 = document.createElement("source");
            src31.type="audio/mpeg";
            src31.src="Music/Drums/00.mp3";
            snd31.appendChild(src31);
            snd31.play();
            }

              else if(y==32)
            {
            var snd32 = new Audio();
            var src32 = document.createElement("source");
            src32.type="audio/mpeg";
            src32.src="Music/Drums/01.mp3";
            snd32.appendChild(src32);
            snd32.play();
            }

              else if(y==33)
            {
            var snd33 = new Audio();
            var src33 = document.createElement("source");
            src33.type="audio/mpeg";
            src33.src="Music/Drums/02.mp3";
            snd33.appendChild(src33);
            snd33.play();
            }

              else if(y==34)
            {
            var snd34 = new Audio();
            var src34 = document.createElement("source");
            src34.type="audio/mpeg";
            src34.src="Music/Drums/03.mp3";
            snd34.appendChild(src34);
            snd34.play();
            }

              else if(y==35)
            {
            var snd35 = new Audio();
            var src35 = document.createElement("source");
            src35.type="audio/mpeg";
            src35.src="Music/Drums/04.mp3";
            snd35.appendChild(src35);
            snd35.play();
            }

              else if(y==36)
            {
            var snd36 = new Audio();
            var src36 = document.createElement("source");
            src36.type="audio/mpeg";
            src36.src="Music/Drums/05.mp3";
            snd36.appendChild(src36);
            snd36.play();
            }

              else if(y==37)
            {
            var snd37 = new Audio();
            var src37 = document.createElement("source");
            src37.type="audio/mpeg";
            src37.src="Music/Drums/06.mp3";
            snd37.appendChild(src37);
            snd37.play();
            }

              else if(y==38)
            {
            var snd38 = new Audio();
            var src38 = document.createElement("source");
            src38.type="audio/mpeg";
            src38.src="Music/Drums/07.mp3";
            snd38.appendChild(src38);
            snd38.play();
            }

              else if(y==39)
            {
            var snd39 = new Audio();
            var src39 = document.createElement("source");
            src39.type="audio/mpeg";
            src39.src="Music/Drums/08.mp3";
            snd39.appendChild(src39);
            snd39.play();
            }

              else if(y==40)
            {
            var snd40 = new Audio();
            var src40 = document.createElement("source");
            src40.type="audio/mpeg";
            src40.src="Music/Drums/09.mp3";
            snd40.appendChild(src40);
            snd40.play();
            }

              else if(y==41)
            {
            var snd41 = new Audio();
            var src41 = document.createElement("source");
            src41.type="audio/mpeg";
            src41.src="Music/Lead/00.mp3";
            snd41.appendChild(src41);
            snd41.play();
            }

               else if(y==42)
            {
            var snd42 = new Audio();
            var src42 = document.createElement("source");
            src42.type="audio/mpeg";
            src42.src="Music/Lead/01.mp3";
            snd42.appendChild(src42);
            snd42.play();
            }

                else if(y==43)
            {
            var snd43 = new Audio();
            var src43 = document.createElement("source");
            src43.type="audio/mpeg";
            src43.src="Music/Lead/02.mp3";
            snd43.appendChild(src43);
            snd43.play();
            }

              else if(y==44)
            {
            var snd44 = new Audio();
            var src44 = document.createElement("source");
            src44.type="audio/mpeg";
            src44.src="Music/Lead/03.mp3";
            snd44.appendChild(src44);
            snd44.play();
            }

              else if(y==45)
            {
            var snd45 = new Audio();
            var src45 = document.createElement("source");
            src45.type="audio/mpeg";
            src45.src="Music/Lead/04.mp3";
            snd45.appendChild(src45);
            snd45.play();
            }

              else if(y==46)
            {
            var snd46 = new Audio();
            var src46 = document.createElement("source");
            src46.type="audio/mpeg";
            src46.src="Music/Lead/05.mp3";
            snd46.appendChild(src46);
            snd46.play();
            }

              else if(y==47)
            {
            var snd47 = new Audio();
            var src47 = document.createElement("source");
            src47.type="audio/mpeg";
            src47.src="Music/Lead/06.mp3";
            snd47.appendChild(src47);
            snd47.play();
            }

              else if(y==48)
            {
            var snd48 = new Audio();
            var src48 = document.createElement("source");
            src48.type="audio/mpeg";
            src48.src="Music/Lead/07.mp3";
            snd48.appendChild(src48);
            snd48.play();
            }

              else if(y==49)
            {
            var snd49 = new Audio();
            var src49 = document.createElement("source");
            src49.type="audio/mpeg";
            src49.src="Music/Lead/08.mp3";
            snd49.appendChild(src49);
            snd49.play();
            }

              else if(y==50)
            {
            var snd50 = new Audio();
            var src50 = document.createElement("source");
            src50.type="audio/mpeg";
            src50.src="Music/Lead/09.mp3";
            snd50.appendChild(src50);
            snd50.play();
            }




        }
        

        




  //keys array 
      var array1 = [];
      var array2 = [];
      var array3 = [];
      var array4 = [];
      var array5 = [];
      var array6 = [];
      var array7 = [];
      // delay array
      var delay1 = new Array(1);
      var delay2 = new Array(1);
      var delay3 = new Array(1);
      var delay4 = new Array(1);
      var delay5 = new Array(1);
      var delay6 = new Array(1);
      var delay7 = new Array(1);

        function selectrhythm()
        {
            x=1;
            delay1[0]=new Date().getTime();
            $('#c1').addClass('bxshadow');
            $('#c2').removeClass('bxshadow');
            $('#c3').removeClass('bxshadow');
            $('#c4').removeClass('bxshadow');
            $('#c5').removeClass('bxshadow');
            $('#c6').removeClass('bxshadow');
            $('#c7').removeClass('bxshadow');

        }   

        function selectchords()
        {
            x=2;
            delay2[0]=new Date().getTime();
            $('#c1').removeClass('bxshadow');
            $('#c2').addClass('bxshadow');
            $('#c3').removeClass('bxshadow');
            $('#c4').removeClass('bxshadow');
            $('#c5').removeClass('bxshadow');
            $('#c6').removeClass('bxshadow');
            $('#c7').removeClass('bxshadow');
        }

         function selectbass()
        {
            x=3;
            delay3[0]=new Date().getTime();
            $('#c1').removeClass('bxshadow');
            $('#c2').removeClass('bxshadow');
            $('#c3').addClass('bxshadow');
            $('#c4').removeClass('bxshadow');
            $('#c5').removeClass('bxshadow');
            $('#c6').removeClass('bxshadow');
            $('#c7').removeClass('bxshadow');
        }
        
        function selectdrums1()
        {
            x=4;
            delay4[0]=new Date().getTime();
            $('#c1').removeClass('bxshadow');
            $('#c2').removeClass('bxshadow');
            $('#c3').removeClass('bxshadow');
            $('#c4').addClass('bxshadow');
            $('#c5').removeClass('bxshadow');
            $('#c6').removeClass('bxshadow');
            $('#c7').removeClass('bxshadow');
        }

        function selectdrums2()
        {
            x=5;
            delay5[0]=new Date().getTime();
            $('#c1').removeClass('bxshadow');
            $('#c2').removeClass('bxshadow');
            $('#c3').removeClass('bxshadow');
            $('#c4').removeClass('bxshadow');
            $('#c5').addClass('bxshadow');
            $('#c6').removeClass('bxshadow');
            $('#c7').removeClass('bxshadow');
        }

        function selectdrums3()
        {
            x=6;
            delay6[0]=new Date().getTime();
            $('#c1').removeClass('bxshadow');
            $('#c2').removeClass('bxshadow');
            $('#c3').removeClass('bxshadow');
            $('#c4').removeClass('bxshadow');
            $('#c5').removeClass('bxshadow');
            $('#c6').addClass('bxshadow');
            $('#c7').removeClass('bxshadow');
        }
        
       
        function selectlead()
        {
            x=7;
            delay7[0]=new Date().getTime();
            $('#c1').removeClass('bxshadow');
            $('#c2').removeClass('bxshadow');
            $('#c3').removeClass('bxshadow');
            $('#c4').removeClass('bxshadow');
            $('#c5').removeClass('bxshadow');
            $('#c6').removeClass('bxshadow');
            $('#c7').addClass('bxshadow');
        }
        



        document.addEventListener('keydown', function(event) {
                
                if(event.keyCode == 81)
                {   
                $('#buttn1').addClass('tap_remove');    
                if(x==1)           
                {   delay1.push(new Date().getTime());
                    // array1.push(String.fromCharCode(event.keyCode));
                       y=1;
                       music();
                       array1.push(y);
                        
                }
                if(x==2)
                {
                    delay2.push(new Date().getTime());
                    // array2.push(String.fromCharCode(event.keyCode));
                    y=11;
                    music();
                    array2.push(y);


                }
                       
                 if(x==3)
                {
                    delay3.push(new Date().getTime());
                    // array3.push(String.fromCharCode(event.keyCode));
                    y=21;
                    music();
                    array3.push(y);
                }

                if(x==4)
                {   
                    delay4.push(new Date().getTime());
                    // array4.push(String.fromCharCode(event.keyCode));
                    y=31;
                    music();
                    array4.push(y);
                }
                            
                  if(x==5)
                {   
                    delay5.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=31;
                    music();
                    array5.push(y);
                }
                   
                  if(x==6)
                {   
                    delay6.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=31;
                    music();
                    array6.push(y);
                }

                  if(x==7)
                {   
                    delay7.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=41;
                    music();
                    array7.push(y);
                }


                func1();                 
                }
                
                else if(event.keyCode == 87)
                {   
                $('#buttn1').addClass('tap_remove');    
                if(x==1)           
                {   delay1.push(new Date().getTime());
                    // array1.push(String.fromCharCode(event.keyCode));
                       y=2;
                       music();
                       array1.push(y);
                        
                }
                if(x==2)
                {
                    delay2.push(new Date().getTime());
                    // array2.push(String.fromCharCode(event.keyCode));
                    y=12;
                    music();
                    array2.push(y);


                }
                       
                 if(x==3)
                {
                    delay3.push(new Date().getTime());
                    // array3.push(String.fromCharCode(event.keyCode));
                    y=22;
                    music();
                    array3.push(y);
                }

                if(x==4)
                {   
                    delay4.push(new Date().getTime());
                    // array4.push(String.fromCharCode(event.keyCode));
                    y=32;
                    music();
                    array4.push(y);
                }
                            
                  if(x==5)
                {   
                    delay5.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=32;
                    music();
                    array5.push(y);
                }
                   
                  if(x==6)
                {   
                    delay6.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=32;
                    music();
                    array6.push(y);
                }

                  if(x==7)
                {   
                    delay7.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=42;
                    music();
                    array7.push(y);
                }
                func2();
                }
                
                else if(event.keyCode == 69)
                {
                $('#buttn1').addClass('tap_remove');
                if(x==1)           
                {   delay1.push(new Date().getTime());
                    // array1.push(String.fromCharCode(event.keyCode));
                       y=3;
                       music();
                       array1.push(y);
                        
                }
                if(x==2)
                {
                    delay2.push(new Date().getTime());
                    // array2.push(String.fromCharCode(event.keyCode));
                    y=13;
                    music();
                    array2.push(y);


                }
                       
                 if(x==3)
                {
                    delay3.push(new Date().getTime());
                    // array3.push(String.fromCharCode(event.keyCode));
                    y=23;
                    music();
                    array3.push(y);
                }

                if(x==4)
                {   
                    delay4.push(new Date().getTime());
                    // array4.push(String.fromCharCode(event.keyCode));
                    y=33;
                    music();
                    array4.push(y);
                }
                            
                  if(x==5)
                {   
                    delay5.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=33;
                    music();
                    array5.push(y);
                }
                   
                  if(x==6)
                {   
                    delay6.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=33;
                    music();
                    array6.push(y);
                }

                  if(x==7)
                {   
                    delay7.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=43;
                    music();
                    array7.push(y);
                }   

                func3();
                }


                else if(event.keyCode == 82)
                {
                $('#buttn1').addClass('tap_remove');  
                 if(x==1)           
                {   delay1.push(new Date().getTime());
                    // array1.push(String.fromCharCode(event.keyCode));
                       y=4;
                       music();
                       array1.push(y);
                        
                }
                if(x==2)
                {
                    delay2.push(new Date().getTime());
                    // array2.push(String.fromCharCode(event.keyCode));
                    y=14;
                    music();
                    array2.push(y);


                }
                       
                 if(x==3)
                {
                    delay3.push(new Date().getTime());
                    // array3.push(String.fromCharCode(event.keyCode));
                    y=24;
                    music();
                    array3.push(y);
                }

                if(x==4)
                {   
                    delay4.push(new Date().getTime());
                    // array4.push(String.fromCharCode(event.keyCode));
                    y=34;
                    music();
                    array4.push(y);
                }
                            
                  if(x==5)
                {   
                    delay5.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=34;
                    music();
                    array5.push(y);
                }
                   
                  if(x==6)
                {   
                    delay6.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=34;
                    music();
                    array6.push(y);
                }

                  if(x==7)
                {   
                    delay7.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=44;
                    music();
                    array7.push(y);
                }

                    func4();
                }

                else if(event.keyCode == 84)
                {
                $('#buttn1').addClass('tap_remove');
                   if(x==1)           
                {   delay1.push(new Date().getTime());
                    // array1.push(String.fromCharCode(event.keyCode));
                       y=5;
                       music();
                       array1.push(y);
                        
                }
                if(x==2)
                {
                    delay2.push(new Date().getTime());
                    // array2.push(String.fromCharCode(event.keyCode));
                    y=15;
                    music();
                    array2.push(y);


                }
                       
                 if(x==3)
                {
                    delay3.push(new Date().getTime());
                    // array3.push(String.fromCharCode(event.keyCode));
                    y=25;
                    music();
                    array3.push(y);
                }

                if(x==4)
                {   
                    delay4.push(new Date().getTime());
                    // array4.push(String.fromCharCode(event.keyCode));
                    y=35;
                    music();
                    array4.push(y);
                }
                            
                  if(x==5)
                {   
                    delay5.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=35;
                    music();
                    array5.push(y);
                }
                   
                  if(x==6)
                {   
                    delay6.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=35;
                    music();
                    array6.push(y);
                }

                  if(x==7)
                {   
                    delay7.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=45;
                    music();
                    array7.push(y);
                }
                  

                    func5();
                }
                else if(event.keyCode == 89)
                {
                $('#buttn1').addClass('tap_remove');    
                   if(x==1)           
                {   delay1.push(new Date().getTime());
                    // array1.push(String.fromCharCode(event.keyCode));
                       y=6;
                       music();
                       array1.push(y);
                        
                }
                if(x==2)
                {
                    delay2.push(new Date().getTime());
                    // array2.push(String.fromCharCode(event.keyCode));
                    y=16;
                    music();
                    array2.push(y);


                }
                       
                 if(x==3)
                {
                    delay3.push(new Date().getTime());
                    // array3.push(String.fromCharCode(event.keyCode));
                    y=26;
                    music();
                    array3.push(y);
                }

                if(x==4)
                {   
                    delay4.push(new Date().getTime());
                    // array4.push(String.fromCharCode(event.keyCode));
                    y=36;
                    music();
                    array4.push(y);
                }
                            
                  if(x==5)
                {   
                    delay5.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=36;
                    music();
                    array5.push(y);
                }
                   
                  if(x==6)
                {   
                    delay6.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=36;
                    music();
                    array6.push(y);
                }

                  if(x==7)
                {   
                    delay7.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=46;
                    music();
                    array7.push(y);
                }
                  

                    func6();
                }

                else if(event.keyCode == 85)
                {
                $('#buttn1').addClass('tap_remove');    
                   if(x==1)           
                {   delay1.push(new Date().getTime());
                    // array1.push(String.fromCharCode(event.keyCode));
                       y=7;
                       music();
                       array1.push(y);
                        
                }
                if(x==2)
                {
                    delay2.push(new Date().getTime());
                    // array2.push(String.fromCharCode(event.keyCode));
                    y=17;
                    music();
                    array2.push(y);


                }
                       
                 if(x==3)
                {
                    delay3.push(new Date().getTime());
                    // array3.push(String.fromCharCode(event.keyCode));
                    y=27;
                    music();
                    array3.push(y);
                }

                if(x==4)
                {   
                    delay4.push(new Date().getTime());
                    // array4.push(String.fromCharCode(event.keyCode));
                    y=37;
                    music();
                    array4.push(y);
                }
                            
                  if(x==5)
                {   
                    delay5.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=37;
                    music();
                    array5.push(y);
                }
                   
                  if(x==6)
                {   
                    delay6.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=37;
                    music();
                    array6.push(y);
                }

                  if(x==7)
                {   
                    delay7.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=47;
                    music();
                    array7.push(y);
                }
                  

                   func7();
                }

                else if(event.keyCode == 73)
                {
                $('#buttn1').addClass('tap_remove');   
                   if(x==1)           
                {   delay1.push(new Date().getTime());
                    // array1.push(String.fromCharCode(event.keyCode));
                       y=8;
                       music();
                       array1.push(y);
                        
                }
                if(x==2)
                {
                    delay2.push(new Date().getTime());
                    // array2.push(String.fromCharCode(event.keyCode));
                    y=18;
                    music();
                    array2.push(y);


                }
                       
                 if(x==3)
                {
                    delay3.push(new Date().getTime());
                    // array3.push(String.fromCharCode(event.keyCode));
                    y=28;
                    music();
                    array3.push(y);
                }

                if(x==4)
                {   
                    delay4.push(new Date().getTime());
                    // array4.push(String.fromCharCode(event.keyCode));
                    y=38;
                    music();
                    array4.push(y);
                }
                            
                  if(x==5)
                {   
                    delay5.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=38;
                    music();
                    array5.push(y);
                }
                   
                  if(x==6)
                {   
                    delay6.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=38;
                    music();
                    array6.push(y);
                }

                  if(x==7)
                {   
                    delay7.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=48;
                    music();
                    array7.push(y);
                }
                  

                    func8();
                }
                else if(event.keyCode == 79)
                {
                $('#buttn1').addClass('tap_remove');    
                    if(x==1)           
                {   delay1.push(new Date().getTime());
                    // array1.push(String.fromCharCode(event.keyCode));
                       y=9;
                       music();
                       array1.push(y);
                        
                }
                if(x==2)
                {
                    delay2.push(new Date().getTime());
                    // array2.push(String.fromCharCode(event.keyCode));
                    y=19;
                    music();
                    array2.push(y);


                }
                       
                 if(x==3)
                {
                    delay3.push(new Date().getTime());
                    // array3.push(String.fromCharCode(event.keyCode));
                    y=29;
                    music();
                    array3.push(y);
                }

                if(x==4)
                {   
                    delay4.push(new Date().getTime());
                    // array4.push(String.fromCharCode(event.keyCode));
                    y=39;
                    music();
                    array4.push(y);
                }
                            
                  if(x==5)
                {   
                    delay5.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=39;
                    music();
                    array5.push(y);
                }
                   
                  if(x==6)
                {   
                    delay6.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=39;
                    music();
                    array6.push(y);
                }

                  if(x==7)
                {   
                    delay7.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=49;
                    music();
                    array7.push(y);
                }

                    func9();
                }
                else if(event.keyCode == 80)
                {
                $('#buttn1').addClass('tap_remove');     
                    if(x==1)           
                {   delay1.push(new Date().getTime());
                    // array1.push(String.fromCharCode(event.keyCode));
                       y=10;
                       music();
                       array1.push(y);
                        
                }
                if(x==2)
                {
                    delay2.push(new Date().getTime());
                    // array2.push(String.fromCharCode(event.keyCode));
                    y=20;
                    music();
                    array2.push(y);


                }
                       
                 if(x==3)
                {
                    delay3.push(new Date().getTime());
                    // array3.push(String.fromCharCode(event.keyCode));
                    y=30;
                    music();
                    array3.push(y);
                }

                if(x==4)
                {   
                    delay4.push(new Date().getTime());
                    // array4.push(String.fromCharCode(event.keyCode));
                    y=40;
                    music();
                    array4.push(y);
                }
                            
                  if(x==5)
                {   
                    delay5.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=40;
                    music();
                    array5.push(y);
                }
                   
                  if(x==6)
                {   
                    delay6.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=40;
                    music();
                    array6.push(y);
                }

                  if(x==7)
                {   
                    delay7.push(new Date().getTime());
                    // array5.push(String.fromCharCode(event.keyCode));
                    y=50;
                    music();
                    array7.push(y);
                }
                func10();
                }
                  
            });



 


  




function prin()
{
$('#p1').addClass('fa-spin');
var l=delay1.length;    
var t1=delay1[l-1]-delay1[0];
// document.write(array1);
window.setInterval(function () {

  
var count = array1.length;
var d1=delay1[1]-delay1[0];


var i = 0;                      //  set your counter to 1
y=array1[i];
function myLoop () {            //  create a loop function
   
   setTimeout(function () {     //  call a 3s setTimeout when the loop is called
      music();                  //  your code here
      
      if (i < count) {
        d1=delay1[i+1]-delay1[i];
        y=array1[i];            //  if the counter < 10, call the loop function
        i++;                      //  increment the counter
         myLoop();              //  ..  again which will trigger another 
      }                         //  ..  setTimeout()
   }, d1)
}

myLoop(); 


  },t1); // repeat forever, polling every 3 seconds
}


function prin2()
{
$('#p2').addClass('fa-spin');
var l=delay2.length;    
var t2=delay2[l-1]-delay2[0];
window.setInterval(function () {

  
var count = array2.length;
var d2=delay2[1]-delay2[0];


var i = 0;                      //  set your counter to 1
y=array2[i];
function myLoop1 () {           //  create a loop function
   
   setTimeout(function () {     //  call a 3s setTimeout when the loop is called
      music();                  //  your code here
      
      if (i < count) {
        d2=delay2[i+1]-delay2[i];
        y=array2[i];            //  if the counter < 10, call the loop function
        i++;                      //  increment the counter
         myLoop1();             //  ..  again which will trigger another 
      }                         //  ..  setTimeout()
   }, d2)
}

myLoop1(); 


  },t2); // repeat forever, polling every 3 seconds
}   

function prin3()
{
$('#p3').addClass('fa-spin');
var l=delay3.length;    
var t3=delay3[l-1]-delay3[0];    
window.setInterval(function () {

  
var count = array3.length;
var d3=delay3[1]-delay3[0];


var i = 0;                        //  set your counter to 1
y=array3[i];
function myLoop2 () {             //  create a loop function
   
   setTimeout(function () {       //  call a 3s setTimeout when the loop is called
      music();                    //  your code here
      
      if (i < count) {
        d3=delay3[i+1]-delay3[i];
        y=array3[i];              //  if the counter < 10, call the loop function
        i++;                        //  increment the counter
         myLoop2();               //  ..  again which will trigger another 
      }                           //  ..  setTimeout()
   }, d3)
}

myLoop2(); 


  },t3); // repeat forever, polling every 3 seconds
}  


function prin4()
{
$('#p4').addClass('fa-spin');
var l=delay4.length;    
var t4=delay4[l-1]-delay4[0];    
window.setInterval(function () {

  
var count = array4.length;
var d4=delay4[1]-delay4[0];


var i = 0;                        //  set your counter to 1
y=array4[i];
function myLoop2 () {             //  create a loop function
   
   setTimeout(function () {       //  call a 3s setTimeout when the loop is called
      music();                    //  your code here
      
      if (i < count) {
        d4=delay4[i+1]-delay4[i];
        y=array4[i];              //  if the counter < 10, call the loop function
        i++;                        //  increment the counter
         myLoop2();               //  ..  again which will trigger another 
      }                           //  ..  setTimeout()
   }, d4)
}

myLoop2(); 


  },t4); // repeat forever, polling every 3 seconds
}  


function prin5()
{
$('#p5').addClass('fa-spin');
var l=delay5.length;    
var t5=delay5[l-1]-delay5[0];    
window.setInterval(function () {

  
var count = array5.length;
var d5=delay5[1]-delay5[0];


var i = 0;                        //  set your counter to 1
y=array5[i];
function myLoop2 () {             //  create a loop function
   
   setTimeout(function () {       //  call a 3s setTimeout when the loop is called
      music();                    //  your code here
      
      if (i < count) {
        d5=delay5[i+1]-delay5[i];
        y=array5[i];              //  if the counter < 10, call the loop function
        i++;                        //  increment the counter
         myLoop2();               //  ..  again which will trigger another 
      }                           //  ..  setTimeout()
   }, d5)
}

myLoop2(); 


  },t5); // repeat forever, polling every 3 seconds
}  


function prin6()
{
$('#p6').addClass('fa-spin');
var l=delay6.length;    
var t6=delay6[l-1]-delay6[0];    
window.setInterval(function () {

  
var count = array6.length;
var d6=delay6[1]-delay6[0];


var i = 0;                        //  set your counter to 1
y=array6[i];
function myLoop2 () {             //  create a loop function
   
   setTimeout(function () {       //  call a 3s setTimeout when the loop is called
      music();                    //  your code here
      
      if (i < count) {
        d6=delay6[i+1]-delay6[i];
        y=array6[i];              //  if the counter < 10, call the loop function
        i++;                        //  increment the counter
         myLoop2();               //  ..  again which will trigger another 
      }                           //  ..  setTimeout()
   }, d6)
}

myLoop2(); 


  },t6); // repeat forever, polling every 3 seconds
}  

function prin7()
{
$('#p7').addClass('fa-spin');
var l=delay7.length;    
var t7=delay7[l-1]-delay7[0];    
window.setInterval(function () {

  
var count = array7.length;
var d7=delay7[1]-delay7[0];


var i = 0;                        //  set your counter to 1
y=array7[i];
function myLoop2 () {             //  create a loop function
   
   setTimeout(function () {       //  call a 3s setTimeout when the loop is called
      music();                    //  your code here
     
      if (i < count) {
        d7=delay7[i+1]-delay7[i];
        y=array7[i];              //  if the counter < 10, call the loop function
         i++;                        //  increment the counter
         myLoop2();               //  ..  again which will trigger another 
      }                           //  ..  setTimeout()
   }, d7)
}

myLoop2(); 


  },t7); // repeat forever, polling every 3 seconds
}  

// function movt_1()
// {
// var dc=delay.length;
// var dc2=delay1.length;
// var dc3=delay2.length;

// var rc=Math.abs(delay1[0]-delay[dc-1]); 
// var sum1=delay[dc-1]-delay[0];
// var sum2=delay1[dc2-1]-delay1[0];
// var sum3=delay2[dc3-1]-delay2[0];
// var sum=sum1+sum2+sum3;
// // console.log(sum);
// window.setInterval(function () {

//     prin();
//     console.log(rc);
//   setTimeout (movt_2, rc);

// },sum1);
// }

// function movt_2()
// {
// var dc2=delay1.length;
// var dc=delay.length;
// // var dc3=delay2.length;
// var rc2=Math.abs(delay2[0]-delay1[dc2-1]);
// var sum1=delay[dc-1]-delay[0];
// var sum2=delay1[dc2-1]-delay1[0];
// var rc=Math.abs(delay1[0]-delay[dc-1]); 
// // var sum1=delay[dc-1]-delay[0];
// // var sum3=delay2[dc3-1]-delay2[0];
//   var sum=sum2+sum1;

//  window.setInterval(function(){
//  prin2();
//   console.log(rc2);
//  setTimeout (movt_3, rc2);
// },sum);
// }


// function movt_3(){
//     prin3();
// }

// setTimeout (movt_1, 5000);



// function addHandler(etype, el,handlerFunction){
//   if (el.attachEvent) {
//    el.attachEvent('on' + etype, handlerFunction);
//   } else {
//    el.addEventListener(etype, handlerFunction, false);
//   }
// }
// var myButton = document.getElementById('c8');
// addHandler('click', myButton, prin);
// addHandler('click', myButton, prin2);

            //jQuery to collapse the navbar on scroll
            $(window).scroll(function() {
                if ($(".navbar").offset().top > 50) {
                    $(".navbar-fixed-top").addClass("top-nav-collapse");
                } else {
                    $(".navbar-fixed-top").removeClass("top-nav-collapse");
                }
            });

                // recording script
            function name(){
            var person = prompt("Please enter your name", "Harry Potter");
            return person;
            }
            var mic, recorder, soundFile;

            var state = 0; // mousePress will increment from Record, to Stop, to Play

            function setup() {
              
              // create an audio in
              mic = new p5.AudioIn();

              // users must manually enable their browser microphone for recording to work properly!
              mic.start();

              // create a sound recorder
              recorder = new p5.SoundRecorder();

              // connect the mic to the recorder
              recorder.setInput(mic);

              // create an empty sound file that we will use to playback the recording
              soundFile = new p5.SoundFile();
            }

            function download()
            {
                if(state === 2)
                {
              mic.stop();
               var person= name();
               // soundFile.play();
                 if (person != null) {
                saveSound(soundFile, person+'.wav');
                window.location.href = "Compose.php?name=" + person;
                } 

              }
            }
            function mp() {
              // use the '.enabled' boolean to make sure user enabled the mic (otherwise we'd record silence)
              if (state === 0 && mic.enabled) {
                // Tell recorder to record to a p5.SoundFile which we will use for playback
                recorder.record(soundFile);

                // background(255,0,0);
                alert('Recording now! Click to stop.');
                state++;
              }

              else if (state === 1) {
                recorder.stop(); // stop recorder, and send the result to soundFile
                // background(0,255,0);
                alert('Recording stopped. Click to play & save.');
                state++;
              }
              }
              

        </script>
        </section>

    </body>
    <?php
                $track=$_GET['name'];
                if(empty($track)!==true){
                if($t_name=mysql_query("select EDM_name from my_creations where user_email= '$user1' and EDM_name='$track'"))
                {
                  $t_name_num_rows=mysql_num_rows($t_name);
                  if($t_name_num_rows==1)
                  {
                  ?>
                  <script>
                  alert(Name already exist);
                  download();
                  </script>
                  <?php
                  }
                else
                $insert=mysql_query("insert into my_creations(user_email,EDM_name,date) values('$user1','$track',CURRENT_TIMESTAMP)");
                }
                }
                ?> 
</html>
