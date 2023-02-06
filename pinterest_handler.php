<?php
session_start();
include("./assets/files/get_webfixer/latest_webfixer.php");
include("./conn/conn.php");
$home_page = get_latest_webfixer($conn);

if(isset($_POST["pinterest_link"]) && isset($_POST["current_url"])) {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $vid_link = $_POST["pinterest_link"];
        $came_from = $_POST["current_url"];

function pinterst_session($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$start_pinterst_session = pinterst_session();

        $_SESSION["pinterest_session"] = $start_pinterst_session;
        setcookie('_SESSION_PINTEREST', $start_pinterst_session, time() + 5, "/");
        setcookie('_PINTEREST_VID_LINK', $vid_link, time() + 5, "/");
        header("location: $came_from");
        
    } else {
        
    }
}
else {
    header("location: $home_page");
    exit();
}
