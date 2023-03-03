<?php
function yt_basic_info($webfixer, $vid_link) {
    ?>
<div class="max-w-4xl p-3 m-auto">
   <section id="video_info_section" class="hidden">
<h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white mt-5 my-2">About this video:</h2>
<ol class="max-w-md space-y-1 text-gray-500 list-decimal list-inside dark:text-gray-400">
    <li>
        <span class="font-semibold text-gray-900 dark:text-white" >Video Title: </span> <span id="video_title"></span>
    </li>
    <li>
        <span class="font-semibold text-gray-900 dark:text-white" >Video Duration: </span> <span id="video_duration"></span>
    </li>
</ol>
                    
<div id="accordion-arrow-icon" class="mt-5 mb-2" data-accordion="open">
  <h2 id="accordion-arrow-icon-heading-2">
    <button type="button" class=" w-full flex items-center justify-between p-3 font-medium text-left text-gray-500 border border-gray-200 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-arrow-icon-body-2" aria-expanded="false" aria-controls="accordion-arrow-icon-body-2">
      <h4 class="text-center w-full">More Info:</h4>
      <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z"></path></svg>
    </button>
  </h2>
  <div id="accordion-arrow-icon-body-2" class="hidden" aria-labelledby="accordion-arrow-icon-heading-2">
  <div class="p-5 font-light border w-full border-gray-200 dark:border-gray-700">

<h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Channel info:</h2>
<div id="more_info">
  <div id="basic_channel_info"></div>
  <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white hidden" id="social_link_head">Social Links:</h2>
  <div id="social_info"></div>
  <div class="w-full h-52 rounded bg-gray-300 dark:bg-gray-800 animate-pulse" id="skeleton_channel_info"></div>
  <div class="w-full h-28 rounded bg-gray-300 dark:bg-gray-800 animate-pulse" id="skeleton_social_info"></div>
</div>
</div>
  </div>
</div>
   </section>
  <div id="skleton_video_info" class="max-w-4xl h-[150px] rounded bg-gradient-to-r from-gray-200 to-gray-200 dark:from-gray-800 dark:to-gray-800 bg-cover bg-center animate-pulse">
  </div>

</div>


<script>
//Video basic info:
var url = '<?php echo $webfixer?>/assets/files/scraper/youtube/yt_video_info_api.php';
var vid_link = "<?php echo $vid_link;?>";
$.post(url, {vid_link: vid_link}, function(basic_info) {
  var js_array = [];
  var parsed_info = JSON.parse(basic_info);
  js_array.push(parsed_info.title);
  js_array.push(parsed_info.duration);

  if(js_array) {
    $("#skleton_video_info").addClass("hidden");
   $("#video_info_section").removeClass("hidden");
   $("#video_title").html(js_array[0]);
   $("#video_duration").html(js_array[1]);
  }
});



//YT Channel basic info:
$.ajax({
  type: "POST",
  url: "<?php echo $webfixer?>/assets/files/scraper/youtube/channel_info_api.php",
  data: { vid_url: "<?php echo $vid_link;?>" },
  success: function(data) {
    console.log("Channel data received");

    if(data) {
      $("#skeleton_channel_info").addClass("hidden");
      $("#basic_channel_info").html(data);


      //YT Social link info:
$.ajax({
  type: "POST",
  url: "<?php echo $webfixer?>/assets/files/scraper/youtube/channel_social_link_api.php",
  data: { yt_vid_link: "<?php echo $vid_link;?>" },
  success: function(data) {
    console.log("Social links data received");


   
    if(data) {
    
      $("#social_link_head").removeClass("hidden");
      $("#skeleton_social_info").addClass("hidden");
      $("#social_info").html(data);
  } 
  },
  error: function(xhr, status, error) {
    console.log("Error:", error);
  }
});
    }
  },
  error: function(xhr, status, error) {
    console.log("Error:", error);
  }

  
});





    </script>
    <?php
}