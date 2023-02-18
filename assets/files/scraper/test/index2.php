<?php
if(isset($_REQUEST["id"])) {
    $id = "https://mbasic.facebook.com/" . $_REQUEST["id"];

    $ch = curl_init($id);
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
}

?>