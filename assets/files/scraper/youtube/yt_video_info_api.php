<?php
include "../../../../conn/conn.php";
include "../../get_webfixer/latest_webfixer.php";
include "../youtube/yt_video_info.php";

$current_web_link = get_latest_webfixer($conn);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($_POST["vid_link"])) {
        $vid_link = $_POST["vid_link"];

        $info =  video_data($vid_link);
        echo json_encode($info);
    }


  } else {
    header("location: $current_web_link?bsic_vid");
  }