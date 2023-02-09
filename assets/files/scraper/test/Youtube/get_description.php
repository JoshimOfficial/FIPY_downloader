<?php 
function description($channel) {
    $data = file_get_contents("https://www.youtube.com/$channel/about");

preg_match('/var ytInitialData = (.+?);/', $data, $matches);
$json = json_decode($matches[1], true);
$get_about_array = count($json["contents"]["twoColumnBrowseResultsRenderer"]["tabs"]) - 2;

return ($json["contents"]["twoColumnBrowseResultsRenderer"]["tabs"][$get_about_array]["tabRenderer"]["content"]["sectionListRenderer"]["contents"][0]["itemSectionRenderer"]["contents"][0]["channelAboutFullMetadataRenderer"]["description"]["simpleText"]);
}

?>