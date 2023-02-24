<?php 
ob_start();
function fb_cookie() {
$jsonStringCookie = '[
    Insert your json cookies here.
]';

$cookies = array();
$jsonArray = json_decode($jsonStringCookie, true);
foreach ($jsonArray as $cookie) {
    $cookieStr = $cookie['name'] . '=' . $cookie['value'];
    if (!empty($cookie['domain'])) {
        $cookieStr .= '; Domain=' . $cookie['domain'];
    }
    if (!empty($cookie['path'])) {
        $cookieStr .= '; Path=' . $cookie['path'];
    }
    if (!empty($cookie['expires'])) {
        $cookieStr .= '; Expires=' . date('D, d M Y H:i:s T', $cookie['expires']);
    }
    if (!empty($cookie['secure'])) {
        $cookieStr .= '; Secure';
    }
    if (!empty($cookie['httpOnly'])) {
        $cookieStr .= '; HttpOnly';
    }
    $cookies[] = $cookieStr;
}

return $cookies;
}