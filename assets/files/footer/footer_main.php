<?php 
function footer($webfixer) {
?>
<footer class="p-4 bg-white rounded-lg shadow md:px-6 md:py-8 mt-5 dark:bg-gray-900">
    <div class="sm:flex sm:items-center sm:justify-between">
        <a href="<?php echo $webfixer;?>" class="flex items-center mb-4 sm:mb-0">
            <img src="<?php echo $webfixer;?>/assets/logo_fav/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">FIPY Downloader</span>
        </a>
        <ul class="flex flex-wrap items-center mb-6 text-sm text-gray-500 sm:mb-0 dark:text-gray-400">
            <li>
                <a href="<?php echo $webfixer;?>/about.php" class="mr-4 hover:underline md:mr-6 ">About</a>
            </li>
            <li>
                <a href="<?php echo $webfixer;?>/privecy-policy.php" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
            </li>
            <li>
                <a href="<?php echo $webfixer?>/contact.php" class="hover:underline">Contact</a>
            </li>
        </ul>
    </div>
    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
    <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">©<a href="<?php echo $webfixer;?>" class="hover:underline">FIPY Downloader</a>. All Rights Reserved.
    </span>
</footer>
<?php 
}
?>