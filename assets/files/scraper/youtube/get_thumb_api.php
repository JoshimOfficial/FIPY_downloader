<?php
include("../../../../conn/conn.php");
include("../../scraper/youtube/get_thumb.php");
include("../../get_webfixer/latest_webfixer.php");

$current_web_link = get_latest_webfixer($conn);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($_POST["vid_link"])) {
        $vid_link = $_POST["vid_link"];

        echo yt_thumb($vid_link)["thumbnail"];
    }


  } else {
    header("location: $current_web_link?thumb");
  }
  
