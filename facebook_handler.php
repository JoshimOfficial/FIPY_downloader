<?php 
session_start();
include("./assets/files/get_webfixer/latest_webfixer.php");
include("./conn/conn.php");
$home_page = get_latest_webfixer($conn);

if(isset($_POST["facebook_link"], $_POST["current_url"], $_POST["submit"])) {
    $vid_link = $_POST["facebook_link"];
    $current_url = $_POST["current_url"];

function fb_session($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return md5($randomString);
}
function comes_form($url) {
    $parsedUrl = parse_url($url);
    $newUrl = $parsedUrl['scheme'] . '://' . $parsedUrl['host'] . $parsedUrl['path'];
    return $newUrl;
}

$create_session = fb_session();
$comes_form_url = comes_form($current_url);

    $_SESSION["fb_session"] = $create_session;
    setcookie("fb_link_origin", $vid_link, time()+50, "/");
    setcookie("_FB_VID_LINK",$vid_link, time()+5, "/");
    setcookie("_SESSION_FB", $create_session, time()+5, "/");
    setcookie("_SESSION_FBx", $create_session, time()+5, "/");

    header("location: $comes_form_url?access=true");

}
else {
    header("location: $home_page?handler=errorFB");
    exit();
}