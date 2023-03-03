<?php
include "./conn/conn.php";
include "./assets/files/get_webfixer/latest_webfixer.php";
include "./assets/files/header/body_header.php";
include "./assets/files/footer/footer_main.php";
include "./assets/files/header/hero_section.php";
//Starting a session for scrape YouTube
session_start();
function generateRandomString($length = 50) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$_SESSION["user_session_id"] = md5(generateRandomString());
setcookie("_SESSION", md5($_SESSION["user_session_id"]), time() + 120, "/");

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>FIPY Downloader</title>
   <link rel="stylesheet" href="<?php echo get_latest_webfixer($conn)?>/tailwind.css"/>
   <link rel="shortcut icon" href="<?php echo get_latest_webfixer($conn)?>/assets/logo_fav/fav.svg" type="image/x-icon">

   <!--library css-->
   <link rel="stylesheet" href="<?php echo get_latest_webfixer($conn)?>/assets/lib/style.css"/>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
   <!-- dark and light mode theme check -->
   <script src="<?php echo get_latest_webfixer($conn)?>/theme.js"  ></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 overflow-x-hidden">

<!-- Header navbar designed started -->
<?php
body_header_navbar($conn,get_latest_webfixer($conn));
?>
<!-- Header navbar designed ended -->

<!-- Header hero section design started -->
<?php
   header_hero_section(get_latest_webfixer($conn));
?>
<!-- Header hero section design ended -->

<!-- Footer section design started -->
<?php echo footer(get_latest_webfixer($conn));?>
<!-- Footer section design ended -->


<script src="<?php echo get_latest_webfixer($conn)?>/main.js"  ></script>
   <!-- This js is a library section  -->
<script src="<?php echo get_latest_webfixer($conn)?>/assets/lib/main.js"></script>
   <!-- This js is a library section  -->
</body>
</html>