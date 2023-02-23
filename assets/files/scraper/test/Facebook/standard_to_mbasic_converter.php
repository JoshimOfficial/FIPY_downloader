<?php 
function mbasic_url($url) {
    //Mbasic converter
        // Replace "www" with "mbasic"
        $mobile_url = str_replace("www", "mbasic", $url);
    
        // Remove "mbasic.facebook.com/lite/" if present
        $mobile_url = str_replace("mbasic.facebook.com/lite/", "mbasic.facebook.com/", $mobile_url);
    
         return  $mobile_url;
}
