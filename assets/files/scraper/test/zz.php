<?php

function get_final_urlzz($url, $cookies, $user_agent) {
    if (strpos($url, 'https://www.facebook.com') !== false && strpos($url, 'videos') !== false) {
        $url = str_replace('https://www.facebook.com', 'https://mbasic.facebook.com', $url);
        return $url;
    }
    else {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    // Set cookies
    if (!empty($cookies)) {
        curl_setopt($ch, CURLOPT_COOKIE, implode('; ', $cookies));
    }

    // Set user agent
    if (!empty($user_agent)) {
        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
    }

    $response = curl_exec($ch);
    $final_url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);

    curl_close($ch);
    return $final_url;
}
}

echo get_final_urlzz("https://www.facebook.com/100013309145141/videos/821140405702211/", "x","x");

?>

https%3A%2F%2Fmbasic.facebook.com%2F100014671837706%2Fvideos%2F1017301882223359%2F //www found
https%3A%2F%2Fmbasic.facebook.com%2F100014671837706%2Fvideos%2F1017301882223359%2F //mbasic found
https%3A%2F%2Fmbasic.facebook.com%2F100014671837706%2Fvideos%2F1017301882223359%2F

<div class="f bj" title="You’re Temporarily Blocked" bis_skin_checked="1"><h2>You’re Temporarily Blocked</h2></div>