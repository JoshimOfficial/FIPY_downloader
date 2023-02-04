<?php
function get_vid() {
if(isset($_COOKIE["_PINTEREST_VID_LINK"])) {
    $vid_url = $_COOKIE["_PINTEREST_VID_LINK"];

    $url = "$vid_url";
    function is_valid_url($url) {
      return filter_var($url, FILTER_VALIDATE_URL) !== false;
  }
  $url = $vid_url;

  if (!is_valid_url($url)) {
      echo "Invalid URL";
      exit;
  }
  
  $data = file_get_contents($url);
    
    if(preg_match('/<script[^>]*data-test-id="video-snippet"[^>]*>(.*?)<\/script>/s', $data, $matches)) {

      $json_string = $matches[1];
      $json_data = json_decode($json_string, true);
      $video_url = $json_data['contentUrl'];
      $video_duration = $json_data["duration"];
      $video_caption = $json_data["caption"];
      $video_upload_date = $json_data["uploadDate"];
      $video_thumbnai = $json_data["thumbnailUrl"];
      $video_description = $json_data["description"];
      $video_title = $json_data["name"];

      function extract_duration($string) {
         preg_match_all('/\d+/', $string, $matches);
         $seconds = implode('', $matches[0]);
         $minutes = floor($seconds / 60);
         $remaining_seconds = $seconds % 60;
         return $minutes . ' Mins ' . $remaining_seconds . ' Secs';
     }
     
     function format_datetime($string) {
      $datetime = new DateTime($string);
      return $datetime->format('d-m-Y \a\t g:iA');
  }
    ?>

    <section class="bg-white dark:bg-gray-900">
      <h2 class="mt-5 text-2xl md:text-4xl tracking-tight font-extrabold text-gray-900 text-center dark:text-white">Pinterest Video Downloader:</h2>
      <div class="py-8 px-4 mx-auto w-screen sm:py-16 lg:px-6">
         <div class="w-full mb-8 lg:mb-16">
            <div class="w-full flex flex-col md:flex-row  justify-around items-center">
               <img src="<?php echo $video_thumbnai;?>" class="md:w-96 lg:flex lg:object-fit rounded" style="width:450px;"/>
               <div class="md:my-0 my-5">
                  <h2 class="mb-5 text-lg font-semibold text-gray-900 dark:text-white">This Pinterest Video Information:</h2>
                  <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400">
                     <li class="flex items-center font-semibold text-gray-900 dark:text-white">
                        Video Title: <?php echo $video_title;?><br> <br>
                     </li>
                     <li class="flex items-center font-semibold text-gray-900 dark:text-white">
                        Video Caption: <?php echo $video_caption;?><br> <br>
                     </li>
                     <li class="flex items-center font-semibold text-gray-900 dark:text-white">
                        Video Description: <?php echo $video_description?><br> <br>
                     </li>
                     <li class="flex items-center font-semibold text-gray-900 dark:text-white">
                        Video Duration: <?php echo extract_duration($video_duration);?><br> <br>
                     </li>
                     <li class="flex items-center font-semibold text-gray-900 dark:text-white">
                        Video Upload Date: <?php echo format_datetime($video_upload_date);?><br> <br>
                     </li>
                     <li class="flex items-center font-semibold text-gray-900 dark:text-white">
                        Video Download Link:
                        
                        <a href="<?php echo $video_url?>" class=" ml-5 relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                        <span class="relative px-3 py-2 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                              Fast Download
                        </span>
                        </a>
                        <br> <br>
                     </li>
                  </ul>
               </div>
            </div>
            <br>
        </div>
      </div>
   </section>
    
    <?php
       }
       else {
          echo "data not found!";
       }
    }
}
