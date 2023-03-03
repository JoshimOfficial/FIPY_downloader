<?php
include "./conn/conn.php";
include "./assets/files/get_webfixer/latest_webfixer.php";
include "./assets/files/header/body_header.php";
include "./assets/files/footer/footer_main.php";
include "./assets/files/header/hero_section.php";
//Starting a session for scrape YouTube
session_start();
function generateRandomString($length = 50) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$_SESSION["user_session_id"] = md5(generateRandomString());
setcookie("_SESSION", md5($_SESSION["user_session_id"]), time() + 120, "/");

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>FIPY Downloader</title>
   <link rel="stylesheet" href="<?php echo get_latest_webfixer($conn)?>/tailwind.css"/>
   <link rel="shortcut icon" href="<?php echo get_latest_webfixer($conn)?>/assets/logo_fav/fav.svg" type="image/x-icon">

   <!--library css-->
   <link rel="stylesheet" href="<?php echo get_latest_webfixer($conn)?>/assets/lib/style.css"/>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
   <!-- dark and light mode theme check -->
   <script src="<?php echo get_latest_webfixer($conn)?>/theme.js"  ></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 overflow-x-hidden">

<!-- Header navbar designed started -->
<?php
body_header_navbar($conn,get_latest_webfixer($conn));
?>
<!-- Header navbar designed ended -->

<!-- Header hero section design started -->
<?php
   header_hero_section(get_latest_webfixer($conn));
?>

<!-- <section class="md:w-1/2 p-2 flex flex-col justify-center m-auto">

<div class="my-7">
<h2 class="text-gray-900 dark:text-gray-100 font-bold my-2 md:text-xl">
      Download (with audio)
   </h2>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                Quality
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                    Format
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                    Size
                    </div>
                </th>              
               
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                    Download
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Apple MacBook Pro 17"
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>

            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Microsoft Surface Pro
                </th>
                <td class="px-6 py-4">
                    White
                </td>
                <td class="px-6 py-4">
                    Laptop PC
                </td>
                <td class="px-6 py-4">
                    $1999
                </td>

            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Magic Mouse 2
                </th>
                <td class="px-6 py-4">
                    Black
                </td>
                <td class="px-6 py-4">
                    Accessories
                </td>
                <td class="px-6 py-4">
                    $99
                </td>

            </tr>
        </tbody>
    </table>
</div>
</div>





<div class="my-7">
<h2 class="text-gray-900 dark:text-gray-100 font-bold my-2 md:text-xl">
      Download (without audio)
   </h2>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                Quality
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                    Format
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                    Size
                    </div>
                </th>              
               
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                    Download
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Apple MacBook Pro 17"
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>

            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Microsoft Surface Pro
                </th>
                <td class="px-6 py-4">
                    White
                </td>
                <td class="px-6 py-4">
                    Laptop PC
                </td>
                <td class="px-6 py-4">
                    $1999
                </td>

            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Magic Mouse 2
                </th>
                <td class="px-6 py-4">
                    Black
                </td>
                <td class="px-6 py-4">
                    Accessories
                </td>
                <td class="px-6 py-4">
                    $99
                </td>

            </tr>
        </tbody>
    </table>
</div>
</div>






<div class="my-7">
<h2 class="text-gray-900 dark:text-gray-100 font-bold my-2 md:text-xl">
      Download (audio only)
   </h2>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                Quality
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                    Format
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                    Size
                    </div>
                </th>              
               
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                    Download
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Apple MacBook Pro 17"
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>

            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Microsoft Surface Pro
                </th>
                <td class="px-6 py-4">
                    White
                </td>
                <td class="px-6 py-4">
                    Laptop PC
                </td>
                <td class="px-6 py-4">
                    $1999
                </td>

            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Magic Mouse 2
                </th>
                <td class="px-6 py-4">
                    Black
                </td>
                <td class="px-6 py-4">
                    Accessories
                </td>
                <td class="px-6 py-4">
                    $99
                </td>

            </tr>
        </tbody>
    </table>
</div>
</div>


</section> -->
<!-- Header hero section design ended -->

<!-- Footer section design started -->
<?php echo footer(get_latest_webfixer($conn));?>
<!-- Footer section design ended -->


<script src="<?php echo get_latest_webfixer($conn)?>/main.js"  ></script>
   <!-- This js is a library section  -->
<script src="<?php echo get_latest_webfixer($conn)?>/assets/lib/main.js"></script>
   <!-- This js is a library section  -->
</body>
</html>