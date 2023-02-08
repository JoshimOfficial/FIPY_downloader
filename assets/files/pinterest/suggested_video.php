<?php 
include "../scraper/pinterest/get_suggested_video.php";
include "../scraper/pinterest/get_username.php";

include "../get_webfixer/latest_webfixer.php";
include "../../../conn/conn.php";

$default_website = get_latest_webfixer($conn);
if (isset($_POST["link"])) {
    $fetch = "";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $link = $_POST["link"];
        $username = "";
        if(count(get_username($link)) > 2) {
            $username = trim(get_username($link)[2], '/');
        }
        else {

            $username = trim(get_username($link)[1], '/');
        }
        $suggested_video_links = suggested_video($username);
        if(count($suggested_video_links) > 0) {
        for($i = 0; $i < count($suggested_video_links); $i++) {

      
        
?>

          <div>
              <div class="flex justify-center items-center mb-4 rounded-full bg-gray-100 dark:bg-gray-900">
              <video class="w-full h-auto max-w-full border border-gray-200 rounded-lg dark:border-gray-700" controls>
                <source src="<?php echo $suggested_video_links[$i];?>" type="video/mp4">
                Your browser does not support the video.
              </video>
              </div>
          </div>

<?php  
        }
    }
    else {
        ?>
        <h6 class="mt-5 tracking-tight text-red-600 font-semibold absolute w-full text-center md:-ml-4 mb-5">
    Sorry no video is recomanded for this video.
  </h6>

        <?php 
    }
    }
}
?>