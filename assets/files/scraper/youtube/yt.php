<?php
function yt_download_link($yt_video_url) {

$url = "https://10downloader.com/download?v=$yt_video_url";

// Get the contents of the webpage
$html = file_get_contents($url);

// Use a regular expression to extract both tables with the class "downloadsTable"
preg_match_all('/<table.*?class="downloadsTable".*?>(.*?)<\/table>/s', $html, $table_matches);

// Check if any matches were found
if (count($table_matches[1]) > 0) {
    // Get the list of tables
    $tables = $table_matches[1];
    $i = 1;
    foreach ($tables as $table) {
        if ($i == 1) {
            echo "<h2 class='mt-5 mb-2 text-sm md:text-xl tracking-tight font-extrabold text-gray-900 dark:text-white'>Download Links 01 (With audio)</h2>";
        } else {
            echo "<h2 class='mt-5 mb-2 text-sm md:text-xl tracking-tight font-extrabold text-gray-900 dark:text-white'>Download Links 02 (Without audio)</h2>";
        }
        // Extract each row of information
        preg_match_all('/<tr.*?>(.*?)<\/tr>/s', $table, $row_matches);
        // Check if any matches were found
        if (count($row_matches[1]) > 0) {
            echo "<div class='relative overflow-x-auto shadow-md rounded'><table border='1' class='w-full text-sm text-left text-gray-500 dark:text-gray-400'>";
            echo " <thead class='text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400'><tr><th scope='col' class='px-6 py-3'>Quality</th><th scope='col' class='px-6 py-3'>Format</th><th scope='col' class='px-6 py-3'>Size</th><th scope='col' class='px-6 py-3'>Download</th></tr></thead>";
            // Loop through each row
            foreach ($row_matches[1] as $row) {
                echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>";
                // Extract the information from each cell
                preg_match_all('/<td.*?>(.*?)<\/td>/s', $row, $cell_matches);
                // Check if any matches were found
                if (count($cell_matches[1]) > 0) {
                    // Loop through each cell
                    $j = 0;
                    foreach ($cell_matches[1] as $cell) {
                        if ($j == 2 && trim($cell) == '') {
                            echo "<td class='px-6 py-4'>∞</td>";
                        } else {
                            echo "<td class='px-6 py-4'>".trim($cell)."</td>";
                        }
                        $j++;
                    }
                }
                echo "</tr>";
            }
            echo "</table></div>";
        } else {
            echo 'No rows found';
        }
        echo "<br><br>";
        $i++;
    }
} else {
    echo '<h2 class="mt-5 tracking-tight font-extrabold  text-center text-red-600">No video found!</h2>';
}
}
?>