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
            function random_video_id($length = 10) {
                $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
            }
        for($i = 0; $i < count($suggested_video_links); $i++) {

?> <div class="max-w-sm h-fit bg-white border border-gray-200 rounded shadow dark:bg-gray-800 dark:border-gray-700">
  <div class="p-2">
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
    <div>
      <div class="flex justify-center items-center mb-4 rounded-full bg-gray-100 dark:bg-gray-900">
        <video class="w-full h-auto max-w-full border border-gray-200 rounded dark:border-gray-700" controls>
          <source src="<?php echo $suggested_video_links[$i]?>" type="video/mp4"> Your browser does not support the video.
        </video>
      </div>
    </div>
    </p>
    <a href="<?php echo $suggested_video_links[$i]?>" download="<?php echo random_video_id()?>_FIPY.mp4" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded hover:bg-blue-800  dark:bg-blue-600 dark:hover:bg-blue-700 "> Download 

<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-6 ml-2 -mr-1"  viewBox="0 0 24 24"><g fill='#FFFFFF'><path d="M19 10c-.8-.8-2.1-.8-2.8 0L14 12.1V4c0-1.1-.9-2-2-2s-2 .9-2 2v8.2L7.8 10c-.7-.8-2-.8-2.8 0-.8.8-.8 2 0 2.8l5.6 5.6c.4.4.9.6 1.4.6.5 0 1-.2 1.4-.6l5.5-5.5c.9-.8.9-2.1.1-2.9zM21 16c-.5 0-1 .5-1 1v3H4v-3c0-.5-.5-1-1-1s-1 .5-1 1v4c0 .5.5 1 1 1h18c.5 0 1-.5 1-1v-4c0-.5-.5-1-1-1z"></path></g></svg>

    </a>
  </div>
</div> <?php  
        }
    }
    else {
        ?> <h6 class="mt-5 tracking-tight text-red-600 font-semibold absolute w-full text-center md:-ml-4 mb-5"> Sorry no video is recomanded for this video. </h6> <?php 
    }
    }
}
?>