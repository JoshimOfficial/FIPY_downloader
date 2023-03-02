<?php
   function insta_body($webfixer) {
      if(isset($_SESSION["INSTA_SESSION"]) && isset($_SESSION["REELS_LINK"]) && isset($_COOKIE["INSTA_SESSION"])) {

         include "./assets/files/insta/get_reels.php";
         include "./assets/files/insta/insta_reels_src.php";

         $cooke_session = $_COOKIE["INSTA_SESSION"];  
         $insta_session = $_SESSION["INSTA_SESSION"];
         $reel_origin_link = $_SESSION["REELS_LINK"];

         if($cooke_session === $insta_session) {
           
   ?>
<section class="overflow-x-hidden">
   <section class="bg-white dark:bg-gray-900">
      <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
         <h1 class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white uppercase">FIPY Downloader ~ Instagram</h1>
         <div class="flex flex-col justify-center items-center">
         <p class="hidden md:flex mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Download HD Instagram reels effortlessly with our user-friendly website. Simply paste the video link and get your video in just a few clicks. Enjoy your favorite content offline, without buffering or limited internet access.
         </div>
         <p class="md:hidden text-lg font-normal text-gray-500 lg:text-xl px-1 xl:px-48 dark:text-gray-400"> Download your favorite reels without buffering or limited internet access.

</p>
         <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
         </div>
         <form class="flex items-center" method="POST" action="./insta_handler.php">
            <label for="voice-search" class="sr-only">Search</label>
            <div class="relative w-full">
               <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                  </svg>
               </div>
               <input type="text" name="reeks_link" id="voice-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded md:h-12 focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="https://www.instagram.com/reel/Co6eG3QDUzZ/?utm_source=ig_web_copy_link" required>
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
</section>

<section class="bg-white dark:bg-gray-900 w-full h-full flex justify-center items-center">

<div class="text-gray-900 bg-gray-100 dark:bg-gray-800 md:h-fit md:w-1/3 md:p-28 dark:text-gray-100 flex justify-center items-center" bis_skin_checked="1">
           <div class="w-full h-full rounded p-5">
            <span class="text-gray-900 dark:text-gray-100">Reel URL: <?php echo $reel_origin_link;?></span> <br><br>
            <span class="text-gray-900 dark:text-gray-100">Download Link URL: <a href="insta_download.php" target="_blank" class="text-blue-600 underline" rel="noopener noreferrer">Click here</a></span>
           </div>
            </div>
</section>


<?php          
}
      }
      else {

      
      ?>
      
<section class="overflow-x-hidden">
   <section class="bg-white dark:bg-gray-900">
      <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
         <h1 class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white uppercase">FIPY Downloader ~ Instagram</h1>
         <div class="flex flex-col justify-center items-center">
         <p class="hidden md:flex mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Download HD Instagram reels effortlessly with our user-friendly website. Simply paste the video link and get your video in just a few clicks. Enjoy your favorite content offline, without buffering or limited internet access.
         </div>
         <p class="md:hidden text-lg font-normal text-gray-500 lg:text-xl px-1 xl:px-48 dark:text-gray-400"> Download your favorite reels without buffering or limited internet access.

</p>
         <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
         </div>
         <form class="flex items-center" method="POST" action="./insta_handler.php">
            <label for="voice-search" class="sr-only">Search</label>
            <div class="relative w-full">
               <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                  </svg>
               </div>
               <input type="text" name="reels_link" id="voice-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded md:h-12 focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="https://www.instagram.com/reel/Co6eG3QDUzZ/?utm_source=ig_web_copy_link" required>
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
      <h2 class="mt-5 text-2xl md:text-4xl tracking-tight font-extrabold text-gray-900 text-center dark:text-white">How to get a insta reels link?</h2>
      <div class="py-8 px-4 mx-auto w-screen sm:py-16 lg:px-6">
         <div class="w-full mb-8 lg:mb-16">
            <div class="w-full flex justify-around items-center">
               <div>
                  <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">To copy a insta reels link using a browser, follow these steps:</h2>
                  <ul class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400">
                     <li class="flex items-center">
                        <svg class="w-4 h-4 -mt-6 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Find the Reel that you want to share with your users on your Instagram feed or by searching for it using the search bar. <br> <br>
                     </li>
                     <li class="flex items-center">
                        <svg class="w-4 h-4 -mt-6 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Click on the Reel to open it and then click on the three-dot menu icon in the top right corner of the screen.<br> <br>
                     </li>
                     <li class="flex items-center">
                        <svg class="w-4 h-4 -mt-6 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        From the menu that appears, select "Copy Link" to copy the link of the Reel to your computer's clipboard.  <br> <br>
                     </li>
                     <li class="flex items-center">
                        <svg class="w-4 h-4 -mt-6 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Once you have copied the link, you can go to your website or platform and create a section or page for users to download Instagram Reels. <br> <br>
                     </li>
                     <li class="flex items-center">
                        <svg class="w-4 h-4 -mt-6 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Provide an option for users to paste the copied link of the Reel in a text field or search box on your website.<br> <br>
                     </li>
                     <li class="flex items-center">
                        <svg class="w-4 h-4 -mt-6 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        When you pastes the Reel link and submits it, our website should validate the link and start the download process. <br> <br>
                     </li>
                  </ul>
               </div>
               <img src="<?php echo $webfixer;?>/assets/imgs/tutorials/pc_copy_link_insta.png" class="hidden md:w-[850px] lg:flex lg:object-fit rounded"/>
            </div>
            <br>
            <br>
        </div>
      </div>
   </section>
</section>
      <?php
}}
   ?>