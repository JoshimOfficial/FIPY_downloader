<?php
include("./Youtube/get_channel.php");
include("./Youtube/get_description.php");
include("./Youtube/get_channel_views.php");
include("./Youtube/get_joined_date.php");
include("./Youtube/get_social_links.php");
include("./Youtube/get_channel_subs.php");
// include("./Youtube/get_country.php");

// $channel = yt_channel("https://www.youtube.com/watch?v=_-vsHpF4sZo")[0];

// echo "Total Subs: " . yt_subs($channel)["subs"] . "<br>". "<br>";
// echo "Total Views: " . yt_channel_views($channel)["thousand"] . "<br>". "<br>";
// echo "Channel Country: " . yt_country($channel)["country"] . "<br>". "<br>";
// echo "Channel Description: " . yt_description($channel)["decription"] . "<br>". "<br>";
// echo "Channel Joined: " . yt_joined_date($channel)["joined_date"] . "<br>". "<br>";

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
$ch = curl_init("https://mbasic.facebook.com/watch");
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$cookies = array(
    'datr=R3TjYwz6cO2TbLn70YjhxD8J',
    'fr=0NmP8yuQW27zvGtxu.AWV7AoFUER3d8T8FZ4f8Rc_YPcs.Bj7jZV.QY.AAA.0.0.Bj7jZV.AWUK9onMWJc',
    'i_user=100063453534211',
    'xs=19%3AUbqfWjAdyyej5g%3A2%3A1675851303%3A-1%3A5351%3A%3AAcV8uNKUYcQS25KB5xlrBZKCUENnbQUxJMY0Zn5khn8',
    'locale=en_US',
    'c_user=100045943637678',
    'm_page_voice=100063453534211',
    'sb=R3TjY7zDHRJdVGYC-aeJb5bS',
    'wd=1920x955'
);
curl_setopt($ch, CURLOPT_COOKIE, implode('; ', $cookies));
$data = curl_exec($ch);


echo $data;

$pattern = '/video_redirect\/\?src=https%3A%2F%2Fscontent[^"]+/';
preg_match_all($pattern, $data, $matches);
$urls = $matches[0];
echo "<pre>";
print_r($urls);
echo "</pre>";