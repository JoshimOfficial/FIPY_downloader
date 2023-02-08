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
    Only https://pinterest.com domains are allowed!
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
      $video_thumbnail = $json_data["thumbnailUrl"];
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

      $fetch_caption = "";
      if($video_description == $video_caption) {
        $fetch_caption = "No caption given by the user. ";
      }
      else {
        $fetch_caption = $video_caption;
      }

    ?>

    <section class="bg-white dark:bg-gray-900">
      <h2 class="mt-5 text-2xl md:text-4xl tracking-tight font-extrabold text-gray-900 text-center dark:text-white">Pinterest Video Downloader:</h2>
      <div class="py-8 px-4 mx-auto w-screen sm:py-16 lg:px-6">
         <div class="w-full mb-8 lg:mb-16">
            <div class="w-full flex flex-col md:flex-row  justify-around">

               
<video class="w-96 h-auto max-w-full border border-gray-200 rounded-lg dark:border-gray-700" poster="<?php echo $video_thumbnail?>" controls>
  <source src="<?php echo $video_url;?>" type="video/mp4">
  Your browser does not support the video tag.
</video>


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
                <?php echo $video_description;?>
                </td>
            </tr>
            
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                Video Caption
                </th>
                <td class="px-6 py-4">
                <?php echo $fetch_caption;?>
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
                <a href="<?php echo $video_url;?>" target="_blank" class="text-blue-500 underline" download>Fastest Server</a>
                </td>
            </tr>
            

        </tbody>
    </table>
    
    <div class="mt-5 md:mt-10">

    
<div id="accordion-arrow-icon" data-accordion="open">
  <h2 id="accordion-arrow-icon-heading-2">
    <button type="button" class=" w-full flex items-center justify-between w-full p-3 font-medium text-left text-gray-500 border border-gray-200 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-arrow-icon-body-2" aria-expanded="false" aria-controls="accordion-arrow-icon-body-2">
      <h4 class="text-center w-full">More Info:</h4>
      <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z"></path></svg>
    </button>
  </h2>
  <div id="accordion-arrow-icon-body-2" class="hidden" aria-labelledby="accordion-arrow-icon-heading-2">
    <div class="p-5 font-light border w-full border-gray-200 dark:border-gray-700">

    <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">User Info:</h2>
    <div id="more_info">
    <div class="skeleton-kszmgu8easc bg-gray-200 dark:bg-gray-800"></div>
    </div>
    </div>
  </div>
</div>


    </div>
</div>

            </div>
            <br>
        </div>
      </div>
   </section>
    
   <section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4  sm:py-16 lg:px-6">
  <h2 class="mt-5 text-2xl md:text-4xl tracking-tight font-extrabold text-gray-900 text-center dark:text-white mb-5">More video like this:</h2>
  <div class="space-y-3 md:grid md:grid-cols-4 md:gap-12 md:space-y-0" id="suggested_video">

  <div role="status" class="flex items-center justify-center h-56 max-w-sm bg-gray-300 rounded-lg animate-pulse dark:bg-gray-700">
    <svg class="w-12 h-12 text-gray-200 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 384 512"><path d="M361 215C375.3 223.8 384 239.3 384 256C384 272.7 375.3 288.2 361 296.1L73.03 472.1C58.21 482 39.66 482.4 24.52 473.9C9.377 465.4 0 449.4 0 432V80C0 62.64 9.377 46.63 24.52 38.13C39.66 29.64 58.21 29.99 73.03 39.04L361 215z"/></svg>
    <span class="sr-only">Loading...</span>
</div>


<div role="status" class="flex items-center justify-center h-56 max-w-sm bg-gray-300 rounded-lg animate-pulse dark:bg-gray-700">
    <svg class="w-12 h-12 text-gray-200 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 384 512"><path d="M361 215C375.3 223.8 384 239.3 384 256C384 272.7 375.3 288.2 361 296.1L73.03 472.1C58.21 482 39.66 482.4 24.52 473.9C9.377 465.4 0 449.4 0 432V80C0 62.64 9.377 46.63 24.52 38.13C39.66 29.64 58.21 29.99 73.03 39.04L361 215z"/></svg>
    <span class="sr-only">Loading...</span>
</div>


<div role="status" class="flex items-center justify-center h-56 max-w-sm bg-gray-300 rounded-lg animate-pulse dark:bg-gray-700">
    <svg class="w-12 h-12 text-gray-200 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 384 512"><path d="M361 215C375.3 223.8 384 239.3 384 256C384 272.7 375.3 288.2 361 296.1L73.03 472.1C58.21 482 39.66 482.4 24.52 473.9C9.377 465.4 0 449.4 0 432V80C0 62.64 9.377 46.63 24.52 38.13C39.66 29.64 58.21 29.99 73.03 39.04L361 215z"/></svg>
    <span class="sr-only">Loading...</span>
</div>


<div role="status" class="flex items-center justify-center h-56 max-w-sm bg-gray-300 rounded-lg animate-pulse dark:bg-gray-700">
    <svg class="w-12 h-12 text-gray-200 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 384 512"><path d="M361 215C375.3 223.8 384 239.3 384 256C384 272.7 375.3 288.2 361 296.1L73.03 472.1C58.21 482 39.66 482.4 24.52 473.9C9.377 465.4 0 449.4 0 432V80C0 62.64 9.377 46.63 24.52 38.13C39.66 29.64 58.21 29.99 73.03 39.04L361 215z"/></svg>
    <span class="sr-only">Loading...</span>
</div>

  </div>
  </div>
   </section>
    <?php
       }
       else {
          ?>
<h2 class="mt-5 text-2xl md:text-4xl tracking-tight font-extrabold text-gray-900 text-center dark:text-white">Pinterest Video Downloader:</h2>
<h6 class="mt-5  tracking-tight text-red-600 text-center ">
    No Pinterest Video Found!
  </h6>
          <?php 
       }
    }
}
