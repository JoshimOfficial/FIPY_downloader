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
                    
<div id="accordion-arrow-icon" class="mt-5 mb-2" data-accordion="open">
  <h2 id="accordion-arrow-icon-heading-2">
    <button type="button" class=" w-full flex items-center justify-between w-full p-3 font-medium text-left text-gray-500 border border-gray-200 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-arrow-icon-body-2" aria-expanded="false" aria-controls="accordion-arrow-icon-body-2">
      <h4 class="text-center w-full">More Info:</h4>
      <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z"></path></svg>
    </button>
  </h2>
  <div id="accordion-arrow-icon-body-2" class="hidden" aria-labelledby="accordion-arrow-icon-heading-2">
    <div class="p-5 font-light border w-full border-gray-200 dark:border-gray-700">

    <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Channel info:</h2>
    <div id="more_info">
    </div>
    </div>
  </div>
</div>
               </section>
    <?php
}
?>