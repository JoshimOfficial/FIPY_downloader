<?php 
session_start();
include("./assets/files/get_webfixer/latest_webfixer.php");
include("./conn/conn.php");
$home_page = get_latest_webfixer($conn);

if(isset($_POST["reels_link"], $_POST["current_url"], $_POST["submit"])) {
    $reels_link = $_POST["reels_link"];
    $current_url = $_POST["current_url"];

function insta_session($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return md5($randomString);
}
$insta_session = insta_session();

$_SESSION["INSTA_SESSION"] = $insta_session;
$_SESSION["REELS_LINK"] = $reels_link;

setcookie("INSTA_SESSION", $insta_session, time()+5, "/");
setcookie("LINK_ORIGIN", $reels_link, time()+5, "/");

header("location: $current_url");
}
else {
    header("location: $home_page?handler=errorInsta");
    exit();
}