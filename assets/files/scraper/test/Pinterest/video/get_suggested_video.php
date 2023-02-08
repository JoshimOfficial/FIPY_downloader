<?php 
function suggested_video($username) {
$data = file_get_contents("https://www.pinterest.com/$username");

preg_match_all("/https:\/\/v\.pinimg\.com\/videos\/[^\"\']+\.mp4/", $data, $matches);
$mp4_links = $matches[0];

$new_array = array();
foreach ($mp4_links as $link) {
    $parts = explode('/', $link);
    $key = $parts[7] . '/' . $parts[8];
    if (!isset($new_array[$key])) {
        $new_array[$key] = $link;
    }
}

echo "Total suggested video found: " . count(array_values($new_array));


for($i = 0; $i < count(array_values($new_array)); $i++) {
    ?>

<br>
<br>
<br>

<video width="400" controls>
  <source src="<?php echo array_values($new_array)[$i]?>" type="video/mp4">
  <source src="mov_bbb.ogg" type="video/ogg">
  Your browser does not support HTML video.
</video>

    <?php 
}
}
    ?>