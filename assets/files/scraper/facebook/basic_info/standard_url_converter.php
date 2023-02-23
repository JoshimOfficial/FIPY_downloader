<?php
ob_start();

function get_final_url($url, $cookies, $user_agent) {
    if (strpos($url, 'https://www.facebook.com') !== false && strpos($url, 'videos') !== false || strpos($url, 'https://www.facebook.com') !== false && strpos($url, 'reel') !== false) {
        $url = str_replace('https://www.facebook.com', 'https://mbasic.facebook.com', $url);
        return get_final_url($url, $cookies, $user_agent);
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
?>