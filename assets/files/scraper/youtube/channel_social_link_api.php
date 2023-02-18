<?php 
include "../../../../conn/conn.php";
include "../../get_webfixer/latest_webfixer.php";
include "./get_channel.php";
include "./get_social_links.php";

$current_web_link = get_latest_webfixer($conn);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($_POST["yt_vid_link"])) {
        $yt_vid_link = $_POST["yt_vid_link"];
  
        $channel = yt_channel($yt_vid_link)[0];

        if(count(yt_social_link($channel)) !== 0) {
            if (yt_social_link($channel)[0] !="social_links") {
           
                $total_count = count(yt_social_link($channel));
            
            for($i = 0; $i < $total_count; $i ++) {
                $title =  yt_social_link($channel)[$i]["titles"];
                $link = yt_social_link($channel)[$i]["title_links"];
                ?>
<ol class="max-w-full space-y-1 text-gray-500 list-inside dark:text-gray-400">
<li>
   <span class="font-semibold text-gray-900 dark:text-white"><?php echo $title;?>
</span> <span>=> <a href="<?php echo $link;?>" target="_blank" class="text-blue-600 font-semibold underline">Click here.</a></span>
</li>
</ol>

<?php
            }
            
                }
                else {
                    echo "There are an unexpected error occured and we are chasing them. Please hold on untill the developers fix this.";
                }
            
        }
        else {
            ?>
            <span class="text-gray-500 dark:text-gray-400">No social link was found for this channel!</span>
            <?php
        }
    }


  } else {
    header("location: $current_web_link?bsic_vid");
  }
?>
