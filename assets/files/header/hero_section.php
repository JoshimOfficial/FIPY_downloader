<?php 
   function header_hero_section($webfixer) {
      include "./assets/files/scraper/youtube/yt.php";
   ?>
<section class="overflow-x-hidden">
   <section class="bg-white dark:bg-gray-900">
      <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
         <h1 class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white uppercase">FIPY Downloader ~ YouTube</h1>
         <p class="hidden md:flex mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Our website allows users to download videos from a variety of sources, including YouTube. Simply search for the video you wish to download and follow the prompts to save it to your device. Enjoy!</p>
         <p class="md:hidden text-lg font-normal text-gray-500 lg:text-xl px-1 xl:px-48 dark:text-gray-400">Our website allows users to download videos from YouTube using mobile. Enjoy it.</p>
         <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
         </div>
         <form class="flex items-center" method="POST" action="./yt.php">
            <label for="voice-search" class="sr-only">Search</label>
            <div class="relative w-full">
               <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                  </svg>
               </div>
               <input type="text" name="yt_link" id="voice-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded md:h-12 focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="https://www.youtube.com/watch?v=S19UcWdOA-I" required>
            </div>
            <input type="hidden" name="current_url" value="<?php $current_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
               echo $current_url;
               ?>" />
            <button type="submit" name="submit" class="inline-flex items-center py-2.5 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
               <svg aria-hidden="true" class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
               </svg>
               Search
            </button>
         </form>
      </div>
   </section>
   <?php 
      if(isset($_SESSION["user_request"]) && isset($_COOKIE["_REQUESTED"])) {
          $cookies_request = $_COOKIE["_REQUESTED"];
          $session_link_request = $_SESSION["user_request"];
      
          if($cookies_request == $session_link_request) {
              ?>
   <h2 class="mt-5 text-2xl md:text-4xl tracking-tight font-extrabold text-gray-900 text-center dark:text-white">Video Download</h2>
   <?php
      $link = $_SESSION["requsted_video"];
      ?>
   <div class="p-3 md:w-1/2 m-auto">
      <style>
         a.downloadBtn.popbtn {
         color: #1d69ff;
         text-decoration: underline;
         }
      </style>
      <?php  
         echo yt_download_link($link);
         ?>
   </div>
   <?php 
   ?>
   <?php
      }
      }
      else {
      ?>
   <section class="bg-white dark:bg-gray-900">
      <h2 class="mt-5 text-2xl md:text-4xl tracking-tight font-extrabold text-gray-900 text-center dark:text-white">How to get a video link?</h2>
      <div class="py-8 px-4 mx-auto w-screen sm:py-16 lg:px-6">
         <div class="w-full mb-8 lg:mb-16">
            <div class="w-full flex justify-around items-center">
               <div>
                  <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">To copy a YouTube video link using a browser:</h2>
                  <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400">
                     <li class="flex items-center">
                        <svg class="w-4 h-4 -mt-6 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Open the video in your web browser. <br> <br>
                     </li>
                     <li class="flex items-center">
                        <svg class="w-4 h-4 -mt-6 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Look for the address bar at the top of the browser window.<br> <br>
                     </li>
                     <li class="flex items-center">
                        <svg class="w-4 h-4 -mt-6 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Select the entire URL (web address) in the address bar.  <br> <br>
                     </li>
                     <li class="flex items-center">
                        <svg class="w-4 h-4 -mt-6 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Right-click on the selected URL and choose "Copy" from the context menu. <br> <br>
                     </li>
                     <li class="flex items-center">
                        <svg class="w-4 h-4 -mt-6 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        The link is now copied to your clipboard and can be pasted into a message, email, or another application by using the "Paste" command (Ctrl+V on Windows, Command+V on Mac). <br> <br>
                     </li>
                  </ul>
               </div>
               <img src="<?php echo $webfixer;?>/assets/imgs/tutorials/pc_copy_link_youtube.png" class="hidden md:w-[850px] lg:flex lg:object-fit rounded"/>
            </div>
            <br>
            <br>
            <br class="hidden md:flex">
            <br class="hidden md:flex">
            <br class="hidden md:flex">
            <br class="hidden md:flex">
            <div class="w-full flex justify-around items-center">
               <div>
                  <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">To copy a YouTube video link from a mobile device:</h2>
                  <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400">
                     <li class="flex items-center">
                        <svg class="w-4 h-4 -mt-6 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Open the YouTube app on your smartphone.
                        <br> <br>
                     </li>
                     <li class="flex items-center">
                        <svg class="w-4 h-4 -mt-6 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Find the video that you want to copy the link for.
                        <br> <br>
                     </li>
                     <li class="flex items-center">
                        <svg class="w-4 h-4 -mt-6 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Tap on the "Share" button located below the video player.
                        <br> <br>
                     </li>
                     <li class="flex items-center">
                        <svg class="w-4 h-4 -mt-6 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        A list of options will appear, tap on "Copy link".<br> <br>
                     </li>
                     <li class="flex items-center">
                        <svg class="w-4 h-4 -mt-6 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        The link will now be copied to your device's clipboard and you can paste it into a message, email, or any other app by holding down on a text field and selecting "Paste".<br> <br>
                     </li>
                  </ul>
               </div>
               <img src="<?php echo $webfixer;?>/assets/imgs/tutorials/mobile_copy_link_youtube.png" class="hidden lg:flex w-96 rounded"/>
            </div>
         </div>
      </div>
   </section>
   <?php 
      }
      ?>
</section>
<?php 
   }
   ?>