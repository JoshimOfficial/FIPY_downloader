<?php 
function yt_channel_views($channel) {
    $data = file_get_contents("https://www.youtube.com/$channel/about");
    
    function nice_views($n) {
        // first strip any formatting;
        $n = (0+str_replace(",", "", $n));
    
        // is this a number?
        if (!is_numeric($n)) return false;
    
        // now filter it;
        if ($n > 1000000000000) return array("decimal" => round(($n/1000000000000), 2), "thousand" => round(($n/1000000000000), 2).'T');
        elseif ($n > 1000000000) return array("decimal" => round(($n/1000000000), 2), "thousand" => round(($n/1000000000), 2).'B');
        elseif ($n > 1000000) return array("decimal" => round(($n/1000000), 2), "thousand" => round(($n/1000000), 2).'M');
        elseif ($n > 1000) return array("decimal" => round(($n/1000), 2), "thousand" => round(($n/1000), 2).'K');
    
        return array("decimal" => $n, "thousand" => number_format($n));
    }
    
    preg_match('/var ytInitialData = (.+?);/', $data, $matches);
    $json = json_decode($matches[1], true);
    $get_about_array = count($json["contents"]["twoColumnBrowseResultsRenderer"]["tabs"]) - 2;
    
    $total_views =  ($json["contents"]["twoColumnBrowseResultsRenderer"]["tabs"][$get_about_array]["tabRenderer"]["content"]["sectionListRenderer"]["contents"][0]["itemSectionRenderer"]["contents"][0]["channelAboutFullMetadataRenderer"]["viewCountText"]["simpleText"]);
    preg_match_all('/\d+/', $total_views, $matches_views);
    $number_string = implode('', $matches_views[0]);
    $numbers = array($number_string);
    $total_views = nice_views($numbers[0]);
    return $total_views;
}