<?php
function yt_joined_date($channel) {
    $opts = [
        "http" => [
            "method" => "GET",
            "header" => "Accept-Language: en-US,en;q=0.8\r\n"
        ]
    ];
    $context = stream_context_create($opts);
    $data = file_get_contents("https://www.youtube.com/$channel/about", false, $context);
    preg_match('/var ytInitialData = (.+?);/', $data, $matches);
    $json = json_decode($matches[1], true);
    $get_about_array = count($json["contents"]["twoColumnBrowseResultsRenderer"]["tabs"]) - 2;

    $get_joined_date = ($json["contents"]["twoColumnBrowseResultsRenderer"]["tabs"][$get_about_array]["tabRenderer"]["content"]["sectionListRenderer"]["contents"][0]["itemSectionRenderer"]["contents"][0]["channelAboutFullMetadataRenderer"]["joinedDateText"]["runs"][1]["text"]);

    $joined_date = ["joined_date" => $get_joined_date];
    return $joined_date;
}
