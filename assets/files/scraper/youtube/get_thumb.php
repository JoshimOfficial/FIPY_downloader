<?php
    function yt_thumb($vid_link) {

        $html = file_get_contents("https://10downloader.com/download?v=$vid_link");
        $doc = new DOMDocument();
        @$doc->loadHTML($html);
        
        $xpath = new DOMXPath($doc);
        
        $img_src = $xpath->evaluate("string(//div[@class='info col-md-4']/img/@src)");
        
        $data = array(
          'thumbnail' => $img_src,
        );
        
          return $data;
        }
