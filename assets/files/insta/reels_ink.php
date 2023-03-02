<?php 
    // Set the URL of the video to download
$cdn_link = "https://download.snapinsta.io/ig/1677777133/df67eb73ac45dc409a5311be3d2fcc59b0d9146bb28ef870aaba82b9bb7ce9fe?file=aHR0cHM6Ly9zY29udGVudC5jZG5pbnN0YWdyYW0uY29tL3YvdDY2LjMwMTAwLTE2LzEwMDAwMDAwXzU1MzAwOTI0NTA0Mjk1NzNfMjYzMjc5NjgyNzI0NDc0MDUyNl9uLm1wND9fbmNfaHQ9c2NvbnRlbnQuY2RuaW5zdGFncmFtLmNvbSZfbmNfY2F0PTEwOSZfbmNfb2hjPWphMDNHM2FTcEtvQVg5cURpNUUmZWRtPUFQczE3Q1VCQUFBQSZjY2I9Ny01Jm9oPTAwX0FmQ2Qxdk9IOHg1QlM3M3oxd0hwVUd6ZEtqRHB5MG01SVhISElybzRFcEtLU0Emb2U9NjQwMjczNDMmX25jX3NpZD05NzhjYjkmbmFtZT1TbmFwSW5zdGEuaW8gLSAzMDQ3NTQxODI2Nzk5MDE0NTMxLm1wNA";

// Get the contents of the video
$video = file_get_contents($cdn_link);

// Set the file name to save the video
function randomFile_name($length = 100) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$file_name = randomFile_name().".mp4";

// Set headers to force download
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $file_name . '"');
header('Content-Length: ' . strlen($video));

// Output the video contents
echo $video;

?>