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
?>

<h2 class="mt-5 text-2xl md:text-4xl tracking-tight font-extrabold text-gray-900 text-center dark:text-white">Pinterest Video Downloader:</h2>
<h6 class="mt-5  tracking-tight text-red-600 text-center ">
    Only pinterest.com domains are allowed!
  </h6>

<?php
      exit;
  }
  
  $data = file_get_contents($url);
    
    if(preg_match('/<script[^>]*data-test-id="video-snippet"[^>]*>(.*?)<\/script>/s', $data, $matches)) {

      $json_string = $matches[1];
      $json_data = json_decode($json_string, true);
      $video_title = $json_data["name"];
      $video_description = $json_data["description"];
      $video_caption = $json_data["caption"];
      $video_duration = $json_data["duration"];
      $video_thumbnai = $json_data["thumbnailUrl"];
      $video_upload_date = $json_data["uploadDate"];
      $video_url = $json_data['contentUrl'];

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

  function video_caption($string) {
    preg_match("/^\w{3} \d{2}, \d{4} - (.*) on Pinterest/", $string, $matches);
    return $matches[1];
}

function videos_description($string) {
    preg_match("/^(.*) - This Pin was created.*\.(.*)$/", $string, $matches);
    return $matches[2] . " ~ " . $matches[1];
  }

function download_file($url) {
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=" . basename($url));
    header("Content-Length: " . filesize($url));
  
    readfile($url);
    exit;
  }
  



    ?>

    <section class="bg-white dark:bg-gray-900">
      <h2 class="mt-5 text-2xl md:text-4xl tracking-tight font-extrabold text-gray-900 text-center dark:text-white">Pinterest Video Downloader:</h2>
      <div class="py-8 px-4 mx-auto w-screen sm:py-16 lg:px-6">
         <div class="w-full mb-8 lg:mb-16">
            <div class="w-full flex flex-col md:flex-row  justify-around">
               <img src="<?php echo $video_thumbnai;?>" class="md:w-96 lg:flex lg:object-fit rounded" style="width:450px;"/>

               <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5 md:mt-0">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Info
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Video Title:
                </th>
                <td class="px-6 py-4">
                    <?php echo $video_title;?>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                Video Description
                </th>
                <td class="px-6 py-4">
                <?php echo videos_description($video_description);?>
                </td>
            </tr>
            
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                Video Caption
                </th>
                <td class="px-6 py-4">
                <?php echo video_caption($video_caption);?>
                </td>
            </tr>
            
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                Video Duration
                </th>
                <td class="px-6 py-4">
                <?php echo extract_duration($video_duration);?>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  Video Upload Date
                </th>
                <td class="px-6 py-4">
                <?php echo format_datetime($video_upload_date);?>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                Download Link
                </th>
                <td class="px-6 py-4">
                <a href="<?php echo $video_url;?>" target="_blank" class="text-blue-500 underline">Fastest Server</a>
                </td>
            </tr>
            

        </tbody>
    </table>
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
