<?php require 'core.inc.php'; require 'connect.inc.php';
error_reporting(E_ERROR | E_PARSE);
if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
{

  $email= "SELECT `user_email` FROM `login_info` WHERE `user_email`='".$_SESSION['user_id']."'";
           if($email_run = mysql_query($email))
            {
              $user1 = mysql_result($email_run, 0,`user_email`);
            }
}
?>


<html>
<head>
  <title>asdasdasdads</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="p5.js"></script>
  <script src="p5.sound.js"></script>

  
<script type="text/javascript">

function name(){
var person = prompt("Please enter your name", "Harry Potter");
return person;
}
var mic, recorder, soundFile;

var state = 0; // mousePress will increment from Record, to Stop, to Play

function setup() {
  // createCanvas(200,200);
  // background(200);
  // fill(0);
  // text('record ', 40, 40);

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
  mic.stop();
   var person= name();
   // soundFile.play();
     if (person != null) {
    saveSound(soundFile, person+'.wav');
    window.location.href = "practise2.php?name=" + person; 

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
 
</head>

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
<body >
<button onclick="mp()"></button>
<button onclick="download()"></button>
</body>
</html>
