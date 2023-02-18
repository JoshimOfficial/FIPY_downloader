<?php 
function yt_thumbnail($webfixer, $vid_link) {
    ?>
<div class="thumbnail max-w-4xl p-3 m-auto">
    <img id="thumbnail_cover" src="" class="rounded"/>
  <div class="thumbnail_cover_parent thumbnail_skeleton max-w-4xl  h-[270px] md:h-[550px] rounded bg-gradient-to-r from-gray-200 to-gray-200 dark:from-gray-800 dark:to-gray-800 bg-cover bg-center animate-pulse">
  </div>

</div>

<script>
var url = '<?php echo $webfixer?>/assets/files/scraper/youtube/get_thumb_api.php';
var vid_link = "<?php echo $vid_link;?>"; 
$.post(url, {vid_link: vid_link}, function(response) {
    let img_thumbnail = response;

    if(response) {
        let select_thumbnail = document.querySelector("#thumbnail_cover");
        select_thumbnail.src = img_thumbnail;

        let thumbnail_cover_parent = document.querySelector(".thumbnail_cover_parent");
        thumbnail_cover_parent.classList.add("hidden");
    }
});


    </script>
    <?php 
}

?>