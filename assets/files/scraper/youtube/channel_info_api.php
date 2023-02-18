<?php 
include "../../../../conn/conn.php";
include "../../get_webfixer/latest_webfixer.php";
include "./get_channel.php";
include "./get_channel_subs.php";
include "./get_channel_views.php";
include "./get_country.php";
include "./get_description.php";
include "./get_joined_date.php";

$current_web_link = get_latest_webfixer($conn);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($_POST["vid_url"])) {
        $vid_url = $_POST["vid_url"];
        $channel = yt_channel($vid_url)[0];

?>

<ol class="max-w-full space-y-1 text-gray-500 list-decimal list-inside dark:text-gray-400">
<li>
   <span>Channel Name:
</span> <span class="font-semibold text-red-600"> Wait for next update.</span>
</li>
<li>
   <span>Total Subs:
</span> <span class="font-semibold text-gray-900 dark:text-white"> <?php echo yt_subs($channel)["subs"];?></span>
</li>
<li> 
  <span>Total Views:</span>
<span class="font-semibold text-gray-900 dark:text-white"> <?php echo yt_channel_views($channel)["thousand"];?></span>
</li>
<li>
  <span>Channel Country: </span>
<span class="font-semibold text-gray-900 dark:text-white"> <?php echo yt_country($channel)["country"];?></span>
</li>
<li>
  <span>Channel Joined: </span>
<span class="font-semibold text-gray-900 dark:text-white"> <?php echo yt_joined_date($channel)["joined_date"];?>
</span>
</li>
<br>
<li>
  <span class="font-semibold text-gray-900 dark:text-white">Channel Description: </span>
<span> <?php echo yt_description($channel)["decription"];?></span>
</li>
<br>
</ol>


<?php
    }


  } else {
    header("location: $current_web_link?bsic_vid");
  }
?>