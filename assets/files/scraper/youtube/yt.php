<?php
function yt_download_link($yt_video_url) {

    // Set the URL and payload
$url = 'https://save-from.net/api/convert';
$payload = json_encode(array(
    'url' => $yt_video_url
));

// Initialize cURL
$ch = curl_init();

// Set the cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($payload)
));
curl_setopt($ch, CURLOPT_USERAGENT, ' Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36');

// Execute the cURL request
$response = curl_exec($ch);

// Close cURL
curl_close($ch);

$links_as_array = json_decode($response,true);

$total_links = count($links_as_array["url"]);
    ?>
    <section class="md:w-1/2 p-2 flex flex-col justify-center m-auto">


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

            <?php 
        for($i = $total_links-1; $i > -1; $i--) {

if($links_as_array["url"][$i]["quality"] && $links_as_array["url"][$i]["name"] && $links_as_array["url"][$i]["url"]) {

    if((count($links_as_array["url"][$i]["attr"]) < 1 || strlen($links_as_array["url"][$i]["attr"]["class"]) < 1) && $links_as_array["url"][$i]["name"] === "MP4") {



?>
                 <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php 
                        echo $links_as_array["url"][$i]["quality"];
                        ?>
                    </th>
                    <td class="px-6 py-4">
                        <?php 
                        echo $links_as_array["url"][$i]["name"];
                        ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php 
                        if(array_key_exists("filesize",$links_as_array["url"][$i])) {
                            $total_mb = ($links_as_array["url"][$i]["filesize"])/1000000;

                            echo number_format($total_mb,2) . " MB";
                        }
                        else {
                            echo "∞";
                        }
                        ?>
                    </td>
                    <td class="px-6 py-4">
                    <?php 
                        if(array_key_exists("url",$links_as_array["url"][$i])) {
                            ?>
                            
                            <a href="<?php echo $links_as_array["url"][$i]["url"];?>" class="text-blue-600 underline">Download</a>
                        
                        
                        <?php
                        }
                        else {
                            echo "Failed to generate download link.";
                        }
                        ?>
                    </td>
    
                </tr>
                <?php 
                
            } 
        }
    }
        ?>
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
            <?php 
        for($i = $total_links-1; $i > -1; $i--) {

if($links_as_array["url"][$i]["quality"] && $links_as_array["url"][$i]["name"] && $links_as_array["url"][$i]["url"]) {

    if((count($links_as_array["url"][$i]["attr"]) < 1 || strlen($links_as_array["url"][$i]["attr"]["class"]) > 1) && $links_as_array["url"][$i]["name"] === "MP4") {



?>
                 <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php 
                        echo $links_as_array["url"][$i]["quality"];
                        ?>
                    </th>
                    <td class="px-6 py-4">
                        <?php 
                        echo $links_as_array["url"][$i]["name"];
                        ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php 
                        if(array_key_exists("filesize",$links_as_array["url"][$i])) {
                            $total_mb = ($links_as_array["url"][$i]["filesize"])/1000000;

                            echo number_format($total_mb,2) . " MB";
                        }
                        else {
                            echo "∞";
                        }
                        ?>
                    </td>
                    <td class="px-6 py-4">
                    <?php 
                        if(array_key_exists("url",$links_as_array["url"][$i])) {
                            ?>
                            
                            <a href="<?php echo $links_as_array["url"][$i]["url"];?>" class="text-blue-600 underline">Download</a>
                        
                        
                        <?php
                        }
                        else {
                            echo "Failed to generate download link.";
                        }
                        ?>
                    </td>
    
                </tr>
                <?php 
                
            } 
        }
    }
        ?>
            </tbody>
        </table>
    </div>
    </div>










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

            <?php 
        for($i = $total_links-1; $i > -1; $i--) {

if($links_as_array["url"][$i]["quality"] && $links_as_array["url"][$i]["name"] && $links_as_array["url"][$i]["url"]) {

    if((count($links_as_array["url"][$i]["attr"]) < 1 || strlen($links_as_array["url"][$i]["attr"]["class"]) < 1) && $links_as_array["url"][$i]["name"] === "Audio OPUS") {



?>
                 <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php 
                        echo $links_as_array["url"][$i]["quality"];
                        ?>
                    </th>
                    <td class="px-6 py-4">
                        <?php 
                        echo $links_as_array["url"][$i]["name"];
                        ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php 
                        if(array_key_exists("filesize",$links_as_array["url"][$i])) {
                            $total_mb = ($links_as_array["url"][$i]["filesize"])/1000000;

                            echo number_format($total_mb,2) . " MB";
                        }
                        else {
                            echo "∞";
                        }
                        ?>
                    </td>
                    <td class="px-6 py-4">
                    <?php 
                        if(array_key_exists("url",$links_as_array["url"][$i])) {
                            ?>
                            
                            <a href="<?php echo $links_as_array["url"][$i]["url"];?>" class="text-blue-600 underline">Download</a>
                        
                        
                        <?php
                        }
                        else {
                            echo "Failed to generate download link.";
                        }
                        ?>
                    </td>
    
                </tr>
                <?php 
                
            } 
        }
    }
        ?>
            </tbody>
        </table>
    </div>
    </div>
    





    
    </section>


<?php
}
?>