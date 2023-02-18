<?php
include("../../../conn/conn.php");
include("../scraper/youtube/get_channel.php");
include("../scraper/youtube/get_channel_subs.php");
include("../get_webfixer/latest_webfixer.php");

$current_web_link = get_latest_webfixer($conn);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   if(isset($_POST["vid_link"])) {
   $video_link = $_POST["vid_link"];
   
   $get_channel = yt_channel($video_link);
   $get_channel_sub = yt_subs($get_channel)["subs"];

   echo "Total channel subscibers :" . $get_channel_sub;
   }
  } else {
    header("location: $current_web_link");
  }
  

?>



















<?php
// Template
// include("../../../conn/conn.php");
// include("../scraper/youtube/get_channel.php");
// include("../scraper/youtube/get_channel_subs.php");
// include("../get_webfixer/latest_webfixer.php");

// $current_web_link = get_latest_webfixer($conn);
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
//   } else {
//     header("location: $current_web_link");
//   }
  

?>