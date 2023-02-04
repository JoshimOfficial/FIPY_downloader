<?php
session_start();
ob_start();

header("Access-Control-Allow-Origin: *");
$url = 'https://www.youtube.com/watch?v=M4WwrBWXC7c';
$data = file_get_contents($url);
echo $data;