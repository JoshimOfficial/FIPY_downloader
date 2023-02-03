<?php
include "./conn/conn.php";
include "./assets/files/header/body_header.php";
include "./assets/files/get_webfixer/latest_webfixer.php";

?>
<!DOCTYPE html>
<html>
    <head>

   <title>FIP Downloader ~ Webfixer</title>
   <link rel="stylesheet" href="./tailwind.css"/>
   <link rel="shortcut icon" href="./assets/logo_fav/fav.svg" type="image/x-icon">

   <!-- This css is a library  -->
   <link rel="stylesheet" href="./assets/lib/style.css"/>

    </head>
    <body>
        
<!-- Header navbar designed started -->
<?php
body_header_navbar(get_latest_webfixer($conn));
?>
<!-- Header navbar designed ended -->

<form class="flex justify-center items-center h-screen">
<div class="mb-6 p-3 md:max-w-2xl md:flex-col">
<div>
<label for="webfixer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your URL</label>
<input type="text" name="webfixer_url" id="webfixer" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="https://url.com" required>
<p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Note: Do not chage anything if its unnessery!

</div>
  <button type="submit" class="text-white mt-1 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="submit">Submit</button>

</form>


<script src="./assets/lib/main.js"></script>
    </body>
</html>
  
<?php 
if(isset($_REQUEST["submit"]) && isset($_REQUEST["webfixer_url"])) {
    $url = $_REQUEST["webfixer_url"];

    date_default_timezone_set("Asia/Dhaka");
    $current_date = date("Y-m-d");
    $current_time = date("H:i:sa");

    
    $webfixer_insert = "INSERT INTO `webfixer` (`url`, `created_date`, `created_time`) VALUES ('$url', '$current_date', '$current_time');";
    $webfixer_query = mysqli_query($conn, $webfixer_insert);

    if($webfixer_query) {
        setcookie("_REFRESH", "true", time()+3, "/");
        $get_cookie = $_COOKIE["_REFRESH"];

        $latest_webfixer_url = "";

        //get latest webfixer
        $get_webfixer = "SELECT * FROM `webfixer`";
        $get_webfixer_query = mysqli_query($conn, $get_webfixer);

        if($get_webfixer_query) {
            while ($webfixer_url = mysqli_fetch_assoc($get_webfixer_query)) {
                $latest_webfixer_url = $webfixer_url["url"];
            }
            header("location: $latest_webfixer_url/webfixer.php?changes=success");

        }
    }
    
}
?>