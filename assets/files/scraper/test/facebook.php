<?php
session_start();
ob_start();

$cookie = "datr=XsjWYztAUQ2Go4c1V5pABtw2; xs=12%3A0xIlnYcX3zztxA%3A2%3A1675020440%3A-1%3A5351%3A%3AAcVDLzSC1FgPA31idbpK0oNzS0mGwLeFv_eRq9w_rMY; m_pixel_ratio=1; c_user=100045943637678; sb=XsjWYyY_PW4TWk162dqRfaa0; wd=1903x955; m_page_voice=100045943637678";

$ch = curl_init("https://mbasic.facebook.com/JoshimOfficiall.acc?v=timeline");
curl_setopt($ch, CURLOPT_COOKIE, $cookie);
curl_setopt( $ch, CURLOPT_POST, false );
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
curl_setopt( $ch, CURLOPT_HEADER, false );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$data = curl_exec( $ch );
echo $data;
