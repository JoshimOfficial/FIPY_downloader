<?php 
include "../get_webfixer/latest_webfixer.php";
include "../../../conn/conn.php";
include "../scraper/facebook/vid_uploader.php";
include "../scraper/facebook/basic_info/cookies.php";
include "../scraper/facebook/basic_info/standard_url_converter.php";
include "../scraper/facebook/basic_info/standard_to_mbasic_converter.php";


//video body part section
include "../scraper/facebook/get_description.php";
include "../scraper/facebook/get_pub_date.php";
include "../scraper/facebook/get_likes.php";
include "../scraper/facebook/get_comments.php";
include "../scraper/facebook/basic_info/basic_info.php";


$vid_current_url = $_COOKIE["fb_link_origin"];

$cookies = fb_cookie();

$default_website = get_latest_webfixer($conn);
if (isset($_POST["vid_link"])) {
    $vid_link = $_POST["vid_link"];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $video_download = vid_info($vid_link);
        
?>
<h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Basic Video Info:</h2>
<ol class="max-w-md space-y-1 text-gray-500 list-decimal list-inside dark:text-gray-400">
    <li style="margin-top: 16px;">
        <span class="font-semibold text-gray-900 dark:text-white">Uploaded by: </span> <span class="text-blue-500 underline font-semibold"><?php echo vid_uploader($vid_link, $cookies);?></span>
    </li>
    <li style="margin-top: 16px;">
        <span class="font-semibold text-gray-900 dark:text-white">Video description: </span> <span> <?php echo fb_description($vid_current_url);?></span>
    </li>    
    <li style="margin-top: 16px;">
        <span class="font-semibold text-gray-900 dark:text-white">Video publish date: </span> <span><?php echo fb_vid_pub_date($vid_current_url);?></span>
    </li>    
    <li style="margin-top: 16px;">
        <span class="font-semibold text-gray-900 dark:text-white">Total reactions:  </span> <span><?php echo fb_vid_likes($vid_current_url);?></span>
    </li>    
    <li style="margin-top: 16px;">
        <span class="font-semibold text-gray-900 dark:text-white">Total comments: </span> <span><?php echo fb_vid_comments($vid_current_url)?></span>
    </li>
</ol>

<hr class="w-full h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

<h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Links:</h2>

<ol class="max-w-md space-y-1 text-gray-500 list-decimal list-inside dark:text-gray-400">
<?php 
        if (isset($_COOKIE["hd_link"]) && $_COOKIE["sd_link"]) {
            $sd_link = $_COOKIE["sd_link"];
            $hd_link = $_COOKIE["hd_link"];
        ?>
<li style="margin-top: 16px;">
        <span class="font-semibold text-gray-900 dark:text-white">Link: </span> 
        <a href="<?php echo $sd_link;?>" class="bg-blue-600 px-4 py-2 rounded text-center text-white ml-5 text-sm">SD Download</a>
        <a href="<?php echo $hd_link;?>" class="bg-blue-600 px-4 py-2 rounded text-center text-white ml-5 text-sm">HD Download</a>
        <?php
         }
         ?>
    </li>
    </ol>
    <?php 
    
}
else {
    header("location: $default_website?fb_basic_ajax=error");
    exit();
}
}
else {
    header("location: $default_website?fb_basic_ajax=error");
    exit();
}

?>