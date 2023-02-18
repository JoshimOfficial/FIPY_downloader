<?php
session_start();
ob_start();
include "./assets/files/get_webfixer/latest_webfixer.php";
include "./conn/conn.php";
if(isset($_REQUEST["yt_link"]) && isset($_REQUEST["submit"]) && isset($_COOKIE["_SESSION"]) && isset($_SESSION["user_session_id"]) && isset($_REQUEST["current_url"])) {

    $cookie_session = $_COOKIE["_SESSION"];
    $session_id = $_SESSION["user_session_id"];

    if($cookie_session == md5($session_id)) {
        $yt_link = $_REQUEST["yt_link"];
        $came_from = $_REQUEST["current_url"];

        $_SESSION["requsted_video"] = $yt_link;
        $_SESSION["user_request"] = "true";
        setcookie("_REQUESTED", "true", time() + 5);
        setcookie("_VID", $yt_link, time() + 5);
        header("location: $came_from");
        exit;
    }


}
else {
    $get_root_link = get_latest_webfixer($conn);
    $_SESSION["user_request"] = "false";
    header("location: $get_root_link/index.php?access=dined");

}
?>