<?php 
function get_followers($username) {
    

//Accessing the profile
$user_profile = file_get_contents("https://www.pinterest.com/$username");

$dom = new DOMDocument;
@$dom->loadHTML($user_profile);
$divs = $dom->getElementsByTagName('div');
$follower_following = array();

foreach($divs as $div){
    $class = $div->getAttribute('class');
    if($class == "tBJ dyH iFc sAJ O2T zDA IZT H2s"){
        array_push($follower_following, trim($div->nodeValue));
    }
}

    return $follower_following;

}