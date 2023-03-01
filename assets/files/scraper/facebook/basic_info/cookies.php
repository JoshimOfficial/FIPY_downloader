<?php 
function fb_cookie() {
$jsonStringCookie = '
[
    {
        "name": "datr",
        "value": "R3TjYwz6cO2TbLn70YjhxD8J",
        "domain": ".facebook.com",
        "hostOnly": false,
        "path": "/",
        "secure": true,
        "httpOnly": true,
        "sameSite": "no_restriction",
        "session": false,
        "firstPartyDomain": "",
        "partitionKey": null,
        "expirationDate": 1738922827,
        "storeId": null
    },
    {
        "name": "fr",
        "value": "0YIsN1xr2wetyEKqA.AWUfS-bSqLNhfclcAjkW7mkoe9M.Bj-7-Z.QY.AAA.0.0.Bj-8DR.AWWkLos12dA",
        "domain": ".facebook.com",
        "hostOnly": false,
        "path": "/",
        "secure": true,
        "httpOnly": true,
        "sameSite": "no_restriction",
        "session": false,
        "firstPartyDomain": "",
        "partitionKey": null,
        "expirationDate": 1685219279,
        "storeId": null
    },
    {
        "name": "i_user",
        "value": "100063453534211",
        "domain": ".facebook.com",
        "hostOnly": false,
        "path": "/",
        "secure": true,
        "httpOnly": false,
        "sameSite": "no_restriction",
        "session": false,
        "firstPartyDomain": "",
        "partitionKey": null,
        "expirationDate": 1708549379,
        "storeId": null
    },
    {
        "name": "xs",
        "value": "19%3AUbqfWjAdyyej5g%3A2%3A1675851303%3A-1%3A5351%3A%3AAcUlvmEYQykDhZSLkm5efvpd6L2FYiq-mdXuYwkq2dw",
        "domain": ".facebook.com",
        "hostOnly": false,
        "path": "/",
        "secure": true,
        "httpOnly": true,
        "sameSite": "no_restriction",
        "session": false,
        "firstPartyDomain": "",
        "partitionKey": null,
        "expirationDate": 1708978967,
        "storeId": null
    },
    {
        "name": "locale",
        "value": "en_US",
        "domain": ".facebook.com",
        "hostOnly": false,
        "path": "/",
        "secure": true,
        "httpOnly": false,
        "sameSite": "no_restriction",
        "session": false,
        "firstPartyDomain": "",
        "partitionKey": null,
        "expirationDate": 1676455627,
        "storeId": null
    },
    {
        "name": "m_pixel_ratio",
        "value": "Infinity",
        "domain": ".facebook.com",
        "hostOnly": false,
        "path": "/",
        "secure": true,
        "httpOnly": false,
        "sameSite": "no_restriction",
        "session": true,
        "firstPartyDomain": "",
        "partitionKey": null,
        "storeId": null
    },
    {
        "name": "c_user",
        "value": "100045943637678",
        "domain": ".facebook.com",
        "hostOnly": false,
        "path": "/",
        "secure": true,
        "httpOnly": false,
        "sameSite": "no_restriction",
        "session": false,
        "firstPartyDomain": "",
        "partitionKey": null,
        "expirationDate": 1708978967,
        "storeId": null
    },
    {
        "name": "m_page_voice",
        "value": "100063453534211",
        "domain": ".facebook.com",
        "hostOnly": false,
        "path": "/",
        "secure": true,
        "httpOnly": true,
        "sameSite": "no_restriction",
        "session": false,
        "firstPartyDomain": "",
        "partitionKey": null,
        "expirationDate": 1684789388,
        "storeId": null
    },
    {
        "name": "sb",
        "value": "R3TjY7zDHRJdVGYC-aeJb5bS",
        "domain": ".facebook.com",
        "hostOnly": false,
        "path": "/",
        "secure": true,
        "httpOnly": true,
        "sameSite": "no_restriction",
        "session": false,
        "firstPartyDomain": "",
        "partitionKey": null,
        "expirationDate": 1738923304,
        "storeId": null
    },
    {
        "name": "wd",
        "value": "1920x1080",
        "domain": ".facebook.com",
        "hostOnly": false,
        "path": "/",
        "secure": true,
        "httpOnly": false,
        "sameSite": "no_restriction",
        "session": true,
        "firstPartyDomain": "",
        "partitionKey": null,
        "storeId": null
    },
    {
        "name": "x-referer",
        "value": "eyJyIjoiLyIsImgiOiIvIiwicyI6InRvdWNoIn0%3D",
        "domain": ".facebook.com",
        "hostOnly": false,
        "path": "/",
        "secure": true,
        "httpOnly": false,
        "sameSite": "no_restriction",
        "session": true,
        "firstPartyDomain": "",
        "partitionKey": null,
        "storeId": null
    }
]
';

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