<?php
//Starting a session for scrape YouTube
session_start();
include "./conn/conn.php";
include "./assets/files/get_webfixer/latest_webfixer.php";
include "./assets/files/header/body_header.php";
include "./assets/files/footer/footer_main.php";
include "./assets/files/pinterest/body_section.php";
include "./assets/files/scraper/pinterest/get_video_size.php";
$current_url = get_latest_webfixer($conn);
$_SESSION["pinterest_location"] = "$current_url/pinterest.php";
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
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <!--library css-->
   <link rel="stylesheet" href="<?php echo get_latest_webfixer($conn)?>/assets/lib/style.css"/>
   
   <!-- dark and light mode theme check -->
   <script src="<?php echo get_latest_webfixer($conn)?>/theme.js"  ></script>

   <style>
      .skeleton-kszmgu8easc:empty {height: 170px; border-radius: 0px 0px 0px 0px; background-image: linear-gradient( 100deg, rgba(255,255,255, 0), rgba(255,255,255, 0.5) 50%, rgba(255,255,255, 0) 80% ),linear-gradient( #cccccc 20px, transparent 0 ),radial-gradient( circle 14px at 14px 14px, #cccccc 13px, transparent 14px ),linear-gradient( #cccccc 20px, transparent 0 ),radial-gradient( circle 14px at 14px 14px, #cccccc 13px, transparent 14px ),linear-gradient( #cccccc 20px, transparent 0 ),radial-gradient( circle 14px at 14px 14px, #cccccc 13px, transparent 14px );background-repeat: repeat-y;background-size: 50px 170px,300px 170px,28px 170px,300px 170px,28px 170px,300px 170px,28px 170px;background-position: -20% 0,left 70px top 125px,left 20px top 120px,left 70px top 75px,left 20px top 70px,left 70px top 25px,left 20px top 20px;animation: shineForSkeleton-kszmgu8easc 2s infinite;}@keyframes shineForSkeleton-kszmgu8easc {to {background-position: 120% 0,left 70px top 125px,left 20px top 120px,left 70px top 75px,left 20px top 70px,left 70px top 25px,left 20px top 20px;}}
   </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 overflow-x-hidden">

<!-- Header navbar designed started -->
<?php
body_header_navbar($conn,get_latest_webfixer($conn));
?>
<!-- Header navbar designed ended -->

<!-- Header hero section design started -->
<?php
   pinterest_body(get_latest_webfixer($conn));
?>
<!-- Header hero section design ended -->

<!-- Footer section design started -->
<?php echo footer(get_latest_webfixer($conn));?>
<!-- Footer section design ended -->


<script src="<?php echo get_latest_webfixer($conn)?>/assets/files/pinterest/more_info.js"  ></script>

<script src="<?php echo get_latest_webfixer($conn)?>/main.js"  ></script>
<script src="<?php echo get_latest_webfixer($conn)?>/assets/lib/jquery-cookie/src/jquery.cookie.js"  ></script>
   <!-- This js is a library section  -->
<script src="<?php echo get_latest_webfixer($conn)?>/assets/lib/main.js"></script>
   <!-- This js is a library section  -->
</body>
</html>