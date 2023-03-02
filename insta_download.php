<?php 
if(isset($_COOKIE["LINK_ORIGIN"])) {
$reel_lik = $_COOKIE["LINK_ORIGIN"];
include "./assets/files/insta/insta_reels_src.php";
echo reel_src($reel_lik);
}
else {
    echo "Sorry video cannot be downloaded";
}
?>