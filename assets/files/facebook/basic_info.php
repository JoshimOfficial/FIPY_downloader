<?php 
function basic_info($vid_link) {
    include "./assets/files/scraper/facebook/basic_info/basic_info.php";

    $video_link = vid_info($vid_link);
    $video_count = count(vid_info($vid_link));
    if($video_count < 1) {
      ?>

<div class="text-red-600 w-full text-center">Try with another video link or try a little bit later.</div>
         
        <?php
    }
    else { 
     $sd_vid_link= $video_link["links"]["Download Low Quality"];
     $hd_vid_link= $video_link["links"]["Download High Quality"];

     setcookie("sd_link", $sd_vid_link, time()+5, "/");
     setcookie("hd_link", $hd_vid_link, time()+5, "/");
    ?>
<section class="bg-white dark:bg-gray-900 ">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">

    <div class="my-10 lg:my-0 lg:col-span-5 lg:flex">
            
            <video class="w-full text-sm max-w-md border border-gray-200 rounded-lg dark:border-gray-700 h-fit" controls>
              <source src="<?php echo $video_link["links"]["Download High Quality"];?>" type="video/mp4">
              Your browser does not support the video tag.
            </video>
            
                    </div> 

        <div class="ml-auto my-10 lg:col-span-7 p-4 rounded  bg-gray-300 dark:bg-gray-800  w-auto md:w-[550px] h-[350px] animate-pulse text-opacity-0" id="basic_ajax">
            <div class="text-gray-900 dark:text-gray-100 h-full w-full flex justify-center items-center">
            Wait we are retrieving data for you.....
            </div>
        </div>  
    </div>
</section>

<script>
$.ajax({
  type: "POST",
  url: "./assets/files/facebook/basic_info_ajax.php",
  data: { vid_link: "<?php echo $_SESSION["mbasic_decode_url"]?>" },
  success: function(response) {
    $("#basic_ajax").html(response);
    $("#basic_ajax").removeClass("animate-pulse");
    $("#basic_ajax").removeClass("h-[350px]");
    $("#basic_ajax").addClass("h-fit");
  },
  error: function(xhr, status, error) {
    console.log(error);
  }
});


    </script>

    <?php
}
}
?>