<?php 
function vid_info_component($title, $thumbnail, $duration, $vid_link) {
    ?>
              <section class="p-3 md:w-1/2 m-auto">
            <img src="<?php echo $thumbnail;?>" class="rounded"/>

            
<h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white mt-5 my-2">About this video:</h2>
<ol class="max-w-md space-y-1 text-gray-500 list-decimal list-inside dark:text-gray-400">
    <li>
        <span class="font-semibold text-gray-900 dark:text-white">Video Title: </span><?php echo $title;?>
    </li>
    <li>
        <span class="font-semibold text-gray-900 dark:text-white">Video Duration: </span><?php echo $duration;?>
    </li>
    <li>
        <span class="font-semibold text-gray-900 dark:text-white">Thumbnail: </span> <a href="<?php echo $thumbnail;?>" target="_blank" class="text-blue-600 underline">Click here</a>
    </li> 
    <li>
        <span class="font-semibold text-gray-900 dark:text-white">Original YouTube link: </span> <a href="<?php echo $vid_link?>" target="_blank" class="text-blue-600 underline">Click here</a>
    </li> 
</ol>
               </section>
    <?php
}

?>