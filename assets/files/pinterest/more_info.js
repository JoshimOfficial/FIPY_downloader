$( document ).ready(function() {
    var vid_link = $.cookie("_PINTEREST_VID_LINK");

    $.ajax({
        type: "POST",
        url: "./assets/files/pinterest/more_info.php",
        data: { link: vid_link },
        success: function(result) {
           $("#more_info").html(result);
        }
     });
     
});