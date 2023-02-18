<?php
function yt_country($channel) {
    $opts = array(
        'http' => array(
        'method' => "GET",
        'header' => "Accept-Language: en-US,en;q=0.8\r\n"
        )
        );
        
        $context = stream_context_create($opts);
        
        $data = file_get_contents("https://www.youtube.com/$channel/about", false, $context);
        
        preg_match('/var ytInitialData = (.+?);/', $data, $matches);
        $channel_country = [];
            $json = json_decode($matches[1], true);
            if($json["contents"]["twoColumnBrowseResultsRenderer"]["tabs"]){
                $get_location_array = count($json["contents"]["twoColumnBrowseResultsRenderer"]["tabs"])-2;
                
                if(isset($json["contents"]["twoColumnBrowseResultsRenderer"]["tabs"][$get_location_array]["tabRenderer"]["content"]["sectionListRenderer"]["contents"][0]["itemSectionRenderer"]["contents"][0]["channelAboutFullMetadataRenderer"]["country"]["simpleText"])) {
    
                    $channel_country = ["country" => $json["contents"]["twoColumnBrowseResultsRenderer"]["tabs"][$get_location_array]["tabRenderer"]["content"]["sectionListRenderer"]["contents"][0]["itemSectionRenderer"]["contents"][0]["channelAboutFullMetadataRenderer"]["country"]["simpleText"]];
    
                    return $channel_country;
                }
                else {
                    $channel_country = ["country" => "No country added by the user."];
                    return  $channel_country;
                }
                
            }
}