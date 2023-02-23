<?php
function yt_download_link($yt_video_url) {

$url = "https://10downloader.com/download?v=$yt_video_url";

// Get the contents of the webpage
$html = file_get_contents($url);

// Use a regular expression to extract both tables with the class "downloadsTable"
preg_match_all('/<table.*?class="downloadsTable".*?>(.*?)<\/table>/s', $html, $table_matches);

// Check if any matches were found
if (count($table_matches[1]) > 0) {

// Disable libxml errors and clear error buffer
libxml_use_internal_errors(true);
$dom = new DOMDocument();
$dom->loadHTML($html);
libxml_clear_errors();

// Create a DOMXPath object to query the document
$xpath = new DOMXPath($dom);

// Check if the "video-downloads" div exists
if ($xpath->query('//*[@id="video-downloads"]')->length > 0) {
  // Get the div element with id "video-downloads"
  $videoDownloadsDiv = $xpath->query('//*[@id="video-downloads"]')->item(0);

  // Get all the child elements of the "video-downloads" div
  $childElements = $videoDownloadsDiv->childNodes;

  // Print the HTML of the child elements
  foreach ($childElements as $element) {


// Get all the divs with class "download-type"
$downloadDivs = $dom->getElementsByTagName('div');
foreach ($downloadDivs as $div) {
    if ($div->getAttribute('class') === 'download-type') {
        // Get the first h3 tag inside the div, set its innerText and attributes
        $h3List = $div->getElementsByTagName('h3');
        if ($h3List->length >= 1) {
            $h3List[0]->setAttribute('class', 'mt-16 mb-2 text-sm md:text-xl tracking-tight font-extrabold text-gray-900 dark:text-white');
        }
        // Get the second h3 tag inside the div, set its innerText and attributes
        if ($h3List->length >= 2) {
            $h3List[1]->setAttribute('class', 'mt-16 mb-2 text-sm md:text-xl tracking-tight font-extrabold text-gray-900 dark:text-white');
        }
    }
}



$xpath = new DOMXPath($dom);

// Find the last th element under thead
$lastTh = $xpath->query('//thead/tr/th[last()]')->item(0);

// Set the text content of the last th element to "Download Links"
$lastTh->textContent = 'Download Links';


$tds = $xpath->query(".//tbody//td", $element);

// Loop through each td tag and set the innerText to 'X' if it's empty
foreach ($tds as $td) {
  if (empty(trim($td->textContent))) {
    $td->textContent = '∞';
  }
}

// Get the updated HTML content
$data = $dom->saveHTML($element);





// Get all the span elements with class "downloadInstruction"
$downloadInstructions = $dom->getElementsByTagName('span');
foreach ($downloadInstructions as $instruction) {
    if ($instruction->getAttribute('class') === 'downloadInstruction') {
        // Remove the span element
        $instruction->parentNode->removeChild($instruction);
    }
}



// Find all tables in the HTML string and add the specified attributes to their table, thead, th, tbody, tr, and td elements
$data = preg_replace_callback(
   '/<table\b[^>]*>(.*?)<\/table>/s',
   function ($matches) {
       $table = $matches[0];
       $table = preg_replace('/<table\b/', '<table border="1" class="w-full text-sm text-gray-500 dark:text-gray-400 text-center"', $table);
       $table = preg_replace_callback(
           '/<thead\b[^>]*>(.*?)<\/thead>/s',
           function ($matches) {
               $thead = $matches[0];
               $thead = preg_replace_callback(
                   '/<th\b[^>]*>(.*?)<\/th>/s',
                   function ($matches) {
                       $th = $matches[0];
                       return preg_replace('/<th\b/', '<th scope="col" class="px-6 py-3"', $th);
                   },
                   $thead
               );
               return preg_replace('/<thead\b/', '<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"', $thead);
           },
           $table
       );
       $table = preg_replace_callback(
           '/<tbody\b[^>]*>(.*?)<\/tbody>/s',
           function ($matches) {
               $tbody = $matches[0];
               $tbody = preg_replace('/<tr\b/', '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"', $tbody);
               $tbody = preg_replace('/<td\b/', '<td class="px-6 py-4"', $tbody);
               return $tbody;
           },
           $table
       );
       return '<div class="relative overflow-x-auto shadow-md rounded">' . $table . '</div>';
   },
   $data
);


// Output the final HTML
echo " <style> a.downloadBtn {color: #1d69ff; text-decoration: underline;} </style> <div class='p-3 md:w-1/2 m-auto'>". $data . "</div>";


   
   }
} else {
    echo '<h2 class="mt-5 tracking-tight font-extrabold  text-center text-red-600">
    No video found or music video cannot be downloaded!
    </h2>';
}


} else {
    echo '<h2 class="mt-5 tracking-tight font-extrabold  text-center text-red-600">
    No video found or music video cannot be downloaded!
    </h2>';
}
}
?>