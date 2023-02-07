<?php
include "../scraper/pinterest/get_username.php";
include "../scraper/pinterest/get_followes.php";
include "../scraper/pinterest/get_userheader.php";

include "../get_webfixer/latest_webfixer.php";
include "../../../conn/conn.php";

$default_website = get_latest_webfixer($conn);
if(isset($_POST["link"])) {
    $fetch = "";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $video_link = $_POST["link"];
        $username = trim(get_username($video_link)[1], '/');

        if(get_userheader($username) != "no_headers") {

            $user_fullname = get_userheader($username)["name"];
            $user_profile_link = get_userheader($username)["profile_link"];
            $user_profile_pic = get_userheader($username)["profile_pic"];
            $user_bio = get_userheader($username)["bio"];

            $fetch = "success";
        }
        else {
            $user_fullname = "Failed to fetch";
            $user_profile_link = "Failed to fetch";
            $user_profile_pic = "Failed to fetch";
            $user_bio = "Failed to fetch";

            $fetch = "failed";
        }

        $user_followers = get_followers($username)[0];
        $user_following = get_followers($username)[1];

        ?>

<ol class="max-w-md space-y-1 text-gray-500 list-decimal list-inside dark:text-gray-400">

<?php 
if($fetch == "success") {

?>
    <li>
        <span class="font-semibold text-gray-900 dark:text-white">Full name:</span> <?php echo $user_fullname;?>
    </li>
    <li>
        <span class="font-semibold text-gray-900 dark:text-white"> Bio: </span>  <?php echo $user_bio;?>
    </li>
    <?php }?>
    <li>
        <span class="font-semibold text-gray-900 dark:text-white">Total followers: </span>  <?php echo $user_followers;?>
    </li>
    <li>
        <span class="font-semibold text-gray-900 dark:text-white">Total following:</span> <?php echo $user_following;?>
    </li>
    <?php if ($fetch == "success") {
                ?>
    <li>
        <span class="font-semibold text-gray-900 dark:text-white"> Profile Pic: </span>  <a href="<?php echo $user_profile_pic; ?>" class="text-blue-500 underline">Click here</a>
    </li>
    <li>
        <span class="font-semibold text-gray-900 dark:text-white"> Profile link: </span>  <a href="<?php echo $user_profile_link; ?>" class="text-blue-500 underline">Click here</a>
    </li>
    <?php }?>
</ol>



<?php
    }
    else {
        header("location: $default_website");
        exit();
    }    
}
else {
    header("location: $default_website");
    exit();
}

?>