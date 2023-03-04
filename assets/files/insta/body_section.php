<?php
   function insta_body($webfixer) {
      if(isset($_SESSION["INSTA_SESSION"]) && isset($_SESSION["REELS_LINK"]) && isset($_COOKIE["INSTA_SESSION"])) {

         include "./assets/files/insta/get_reels.php";
         include "./assets/files/insta/insta_reels_src.php";

         $cooke_session = $_COOKIE["INSTA_SESSION"];  
         $insta_session = $_SESSION["INSTA_SESSION"];
         $reel_origin_link = $_SESSION["REELS_LINK"];

         if($cooke_session === $insta_session) {

            $url = 'https://snapinsta.io/api/ajaxSearch/instagram';
            $data = array(
                'q' => $reel_origin_link,
                'vt' => 'facebook'
            );
            
            $ch = curl_init($url);
            
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_USERAGENT, ' Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36');
            
            $response = curl_exec($ch);
            
            curl_close($ch);
            $array_reels = json_decode(($response),true);
            
            
            if (array_key_exists('data', $array_reels)) {
                $html = $array_reels['data'];
                $dom = new DOMDocument();
                $dom->loadHTML($html, LIBXML_NOERROR | LIBXML_NOWARNING);
                $xpath = new DOMXPath($dom);
                $a_tags = $xpath->query('//a');
                if ($a_tags->length > 0) {
                    $first_a_tag = $a_tags->item(0);
                    $href_value = $first_a_tag->getAttribute('href');
                    
                        // Set the URL of the video to download
            $cdn_link = $href_value;
                }
                 }
           
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
               <input type="text" name="reeks_link" id="voice-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded md:h-12 focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="https://www.instagram.com/reel/Co6eG3QDUzZ/?utm_source=ig_web_copy_link" required value="<?php echo $reel_origin_link?>">
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

<section class="bg-white dark:bg-gray-900">
    <div class="grid max-w-screen-xl px-5 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
        <video class="w-full text-sm max-w-md border border-gray-200 rounded-lg dark:border-gray-700 h-fit" controls>
              <source src="<?php echo $cdn_link;?>" type="video/mp4">
              Your browser does not support the video tag.
            </video>
        </div>
        <div class="lg:mt-0 lg:col-span-5 flex flex-col bg-gray-200 dark:bg-gray-800 rounded h-fit w-fit md:p-5 p-2 font-normal text-gray-600 dark:text-gray-300">
           <span class="my-2">Reels link: <?php echo $reel_origin_link?></span>
           <span class="my-2">Reels valid: <span class="font-bold">
            <?php 
            if (strpos($reel_origin_link, 'https://www.instagram.com/p/') !== false || strpos($reel_origin_link, 'https://www.instagram.com/reel/') !== false || strpos($reel_origin_link, 'https://www.instagram.com/reels/') !== false){
               echo '<span class="text-green-500">true</span>';
            ?>
           </span></span>
           <span class="my-2">Download Links: <a href="./insta_download.php" class="ml-2 bg-blue-600 text-white px-4 py-2 rounded font-bold">HD Download</a></span>
           
           <?php 
                      } else {
                        echo '<span class="text-red-600">false</span>';
                    }
           ?>
           
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