<?php
   function facebook_body($webfixer) {
      if(isset($_COOKIE["_SESSION_FB"], $_COOKIE["_FB_VID_LINK"]) && isset($_SESSION["fb_session"])) {
         
         include "./assets/files/facebook/basic_info.php";
         include "./assets/files/scraper/facebook/basic_info/cookies.php";
         include "./assets/files/scraper/facebook/basic_info/standard_url_converter.php";
         include "./assets/files/scraper/facebook/basic_info/standard_to_mbasic_converter.php";

         $fb_session_cookie = $_COOKIE["_SESSION_FB"];
         $fb_session = $_SESSION["fb_session"];
         $fb_vid_link = $_COOKIE["_FB_VID_LINK"];

         if($fb_session == $fb_session_cookie) {
            ?>
<section class="overflow-x-hidden">
   <section class="bg-white dark:bg-gray-900">
      <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
         <h1 class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white uppercase">FIPY Downloader ~ Facebook</h1>
         <div class="flex flex-col justify-center items-center">
         <p class="hidden md:flex mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Download qualityful Facebook videos effortlessly with our user-friendly website. Simply paste the video link and get your video in just a few clicks. Enjoy your favorite content offline, without buffering or limited internet access.
            </p>
            <div class="hidden md:flex text-center text-red-600 font-semibold text-sm">Currently `https://fb.watch/XXXXXX` URL is supported!</div>
         </div>
         <p class="md:hidden text-lg font-normal text-gray-500 lg:text-xl px-1 xl:px-48 dark:text-gray-400"> Enjoy your favorite content offline, without buffering or limited internet access.
         <div class="text-center mt-2 md:hidden text-red-600 font-semibold text-sm">Currently `https://fb.watch/XXXXXX` URL is supported!</div>

</p>
         <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
         </div>
         <form class="flex items-center" method="POST" action="./facebook_handler.php">
            <label for="voice-search" class="sr-only">Search</label>
            <div class="relative w-full">
               <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                  </svg>
               </div>
               <input type="text" name="facebook_link" id="voice-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded md:h-12 focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="https://fb.watch/iPfAGwPCx9/" value="<?php echo $fb_vid_link?>" required>
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
            echo basic_info($fb_vid_link, $webfixer);
         }
      }
      else {
   ?>
<section class="overflow-x-hidden">
   <section class="bg-white dark:bg-gray-900">
      <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
         <h1 class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white uppercase">FIPY Downloader ~ Facebook</h1>
         <div class="flex flex-col justify-center items-center">
         <p class="hidden md:flex mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Download qualityful Facebook videos effortlessly with our user-friendly website. Simply paste the video link and get your video in just a few clicks. Enjoy your favorite content offline, without buffering or limited internet access.
            </p>
            <div class="hidden md:flex text-center text-red-600 font-semibold text-sm">Currently `https://fb.watch/XXXXXX` URL is supported!</div>
         </div>
         <p class="md:hidden text-lg font-normal text-gray-500 lg:text-xl px-1 xl:px-48 dark:text-gray-400"> Enjoy your favorite content offline, without buffering or limited internet access.
         <div class="text-center mt-2 md:hidden text-red-600 font-semibold text-sm">Currently `https://fb.watch/XXXXXX` URL is supported!</div>

</p>
         <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
         </div>
         <form class="flex items-center" method="POST" action="./facebook_handler.php">
            <label for="voice-search" class="sr-only">Search</label>
            <div class="relative w-full">
               <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                  </svg>
               </div>
               <input type="text" name="facebook_link" id="voice-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded md:h-12 focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="https://fb.watch/iPfAGwPCx9/" required>
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

   <section class="bg-white dark:bg-gray-900">
      <h2 class="mt-5 text-2xl md:text-4xl tracking-tight font-extrabold text-gray-900 text-center dark:text-white">How to get a facebook video link?</h2>
      <div class="py-8 px-4 mx-auto w-screen sm:py-16 lg:px-6">
         <div class="w-full mb-8 lg:mb-16">
            <div class="w-full flex justify-around items-center">
               <div>
                  <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">To copy a Facebook video link using a browser, follow these steps:</h2>
                  <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400">
                     <li class="flex items-center">
                        <svg class="w-4 h-4 -mt-6 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Log in to your Facebook account on your desktop browser. <br> <br>
                     </li>
                     <li class="flex items-center">
                        <svg class="w-4 h-4 -mt-6 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Navigate to the video you want to download.<br> <br>
                     </li>
                     <li class="flex items-center">
                        <svg class="w-4 h-4 -mt-6 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Hover your mouse over the video until the options appear at the bottom right corner of the video  <br> <br>
                     </li>
                     <li class="flex items-center">
                        <svg class="w-4 h-4 -mt-6 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Click on the three-dot icon to open a menu of options. <br> <br>
                     </li>
                     <li class="flex items-center">
                        <svg class="w-4 h-4 -mt-6 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        In the menu, click on "Copy link."<br> <br>
                     </li>
                     <li class="flex items-center">
                        <svg class="w-4 h-4 -mt-6 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        The video link is now copied to your clipboard and can be pasted into our downloader website or any other download tool. <br> <br>
                     </li>
                  </ul>
               </div>
               <img src="<?php echo $webfixer;?>/assets/imgs/tutorials/pc_copy_link_facebook.png" class="hidden md:w-[850px] lg:flex lg:object-fit rounded"/>
            </div>
            <br>
            <br>
        </div>
      </div>
   </section>
</section>
<?php 
   }   
}
   ?>