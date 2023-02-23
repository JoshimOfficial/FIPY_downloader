<?php 
ob_start();
function fb_cookie() {
$jsonStringCookie = '[
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
        "value": "0vObEhPQ6zaVqimn1.AWV5e7U_RKioGW1r_a_oItkCJnw.Bj8yTs.QY.AAA.0.0.Bj8yTs.AWUCG0w_Lv4",
        "domain": ".facebook.com",
        "hostOnly": false,
        "path": "/",
        "secure": true,
        "httpOnly": true,
        "sameSite": "no_restriction",
        "session": false,
        "firstPartyDomain": "",
        "partitionKey": null,
        "expirationDate": 1684655081,
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
        "expirationDate": 1708270154,
        "storeId": null
    },
    {
        "name": "xs",
        "value": "19%3AUbqfWjAdyyej5g%3A2%3A1675851303%3A-1%3A5351%3A%3AAcVD_vZMWhX9Z_PW2jfDBNbp8Fgprh1gi7bw8-6lezo",
        "domain": ".facebook.com",
        "hostOnly": false,
        "path": "/",
        "secure": true,
        "httpOnly": true,
        "sameSite": "no_restriction",
        "session": false,
        "firstPartyDomain": "",
        "partitionKey": null,
        "expirationDate": 1708415082,
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
        "expirationDate": 1708415082,
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
        "expirationDate": 1684328523,
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
        "value": "1920x506",
        "domain": ".facebook.com",
        "hostOnly": false,
        "path": "/",
        "secure": true,
        "httpOnly": false,
        "sameSite": "lax",
        "session": false,
        "firstPartyDomain": "",
        "partitionKey": null,
        "expirationDate": 1677485997,
        "storeId": null
    }
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