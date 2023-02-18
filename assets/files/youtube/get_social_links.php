<?php 
function yt_social_link($channel) {

    $data = file_get_contents("https://www.youtube.com/$channel/about");
    preg_match('/var ytInitialData = (.+?);/', $data, $matches);
    $json = json_decode($matches[1], true);

    if ($json && isset($json["contents"]["twoColumnBrowseResultsRenderer"]["tabs"])) {
        $tabs = $json["contents"]["twoColumnBrowseResultsRenderer"]["tabs"];

        $last_tab_index = count($tabs) - 1;
        $about_tab_index = $last_tab_index - 1;

        $tab = $tabs[$about_tab_index]["tabRenderer"]["content"]["sectionListRenderer"]["contents"][0]["itemSectionRenderer"]["contents"][0]["channelAboutFullMetadataRenderer"];

        $channel_social_links = [];
        if (isset($tab["primaryLinks"])) {
            $links = $tab["primaryLinks"];
            $link_count = count($links);
            for ($i = 0; $i < $link_count; $i++) {
                $link = $links[$i];
                $channel_social_links[] = [
                    "titles" => $link["title"]["simpleText"],
                    "title_links" => $link["navigationEndpoint"]["commandMetadata"]["webCommandMetadata"]["url"]
                ];
            }
        }
        return $channel_social_links;
    } else {
        $channel_social_links = ["social_links"]; // couldn't find the channel;
        return $channel_social_links;
    }
}



//Call like this:

// if(count(yt_social_link($channel)) !== 0) {
//     if (yt_social_link($channel)[0] !="social_links") {
   
//         $total_count = count(yt_social_link($channel));
    
//     for($i = 0; $i < $total_count; $i ++) {
//         $title =  yt_social_link($channel)[$i]["titles"];
//         $link = yt_social_link($channel)[$i]["title_links"];
    
//         echo $title . "<br>";
//         echo "link => " . $link . "<br>". "<br>";
//     }
    
//         }
//         else {
//             echo "There are an unspected error occured and we are chasing them. Please hold on untill the developers fix this.";
//         }
    
// }
// else {
//     echo "No social link was found for this channel!";
// }