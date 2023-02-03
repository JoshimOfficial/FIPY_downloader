<?php
    //get latest webfixer
 function get_latest_webfixer($conn){
    $get_webfixer = "SELECT * FROM `webfixer`";
    $get_webfixer_query = mysqli_query($conn, $get_webfixer);
    $latest_webfixer_url = "";

    if ($get_webfixer_query) {
        while ($webfixer_url = mysqli_fetch_assoc($get_webfixer_query)) {
            $latest_webfixer_url = $webfixer_url["url"];
        }
    }

    return $latest_webfixer_url;
}