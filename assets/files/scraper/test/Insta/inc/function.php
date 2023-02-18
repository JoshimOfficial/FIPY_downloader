<?php

//  the proxy is providing to you different server request header by one single server. one time multi request without any security problem, but it too much costly to buy.

// Here we don't need to use it because Instagram provide to you 200 request daily without change any IP

 

function login($user, $pass, $proxy=null){

    $username = $user;

    $password = $pass;

 

    if($proxy != ''){

        $explode = explode(':', $proxy);

        $proxy_username = $explode[0];

        $proxy_port = $explode[2];

        $explode_ = explode('@', $explode[1]);

        $proxy_password = $explode_[0];

        $proxy_id = $explode_[1];

    

        $proxyUsername = $proxy_username;

        $proxyPassword = $proxy_password;

    }

    // this is for request header 

    $useragent = "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/50.0.2661.102 Chrome/50.0.2661.102 Safari/537.36";

    $cookie = $username.".txt";

 

    // this code is only for a cookie because we will need it after getting response header

    $file_location = dirname(__FILE__)."/cookie";

    array_map('unlink', array_filter( 

        (array) array_merge(glob($file_location."/*"))));

 

    //  this is our curl request url

    $url="https://www.instagram.com/accounts/login/?force_classic_login";

    $ch  = curl_init();

    $arrSetHeaders = array(

        "User-Agent: $useragent",

        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3',

        'Accept-Language: en-US,en;q=0.5',

        'Accept-Encoding: deflate, br',

        'Connection: keep-alive',

        'cache-control: max-age=0',

    );

    

    curl_setopt($ch, CURLOPT_HTTPHEADER, $arrSetHeaders);

    curl_setopt($ch, CURLOPT_URL, $url);

 

    // this code make cookie at our local folder

    curl_setopt($ch, CURLOPT_COOKIEJAR, $file_location."/".$cookie);

    curl_setopt($ch, CURLOPT_COOKIEFILE, $file_location."/".$cookie);

 

    curl_setopt($ch, CURLOPT_USERAGENT, $useragent);

    if($proxy != ''){

        curl_setopt($ch, CURLOPT_PROXY,$proxy_id);

        curl_setopt($ch, CURLOPT_PROXYPORT,$proxy_port);

        curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$proxyUsername:$proxyPassword");

        curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL,1);

    }

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($ch, CURLOPT_HEADER, 1);

    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $page = curl_exec($ch);

    curl_close($ch);

 

    // this is the main thing to the proper login

    // try to find the actual login form

    if (!preg_match('/<form data-encrypt method="POST" id="login-form" class="adjacent".*?<\/form>/is', $page, $form)) {

        die('Failed to find log in form!');

    }

    $form = $form[0];

 

    // find the action of the login form

    if (!preg_match('/action="([^"]+)"/i', $form, $action)) {

        die('Failed to find login form url');

    }

    

    $url2 = $action[1]; // this is our new post url

    // find all hidden fields which we need to send with our login, this includes security tokens

    $count = preg_match_all('/<input type="hidden"\s*name="([^"]*)"\s*value="([^"]*)"/i', $form, $hiddenFields);

    

    $postFields = array();

    

    // turn the hidden fields into an array

    for ($i = 0; $i < $count; ++$i) {

        $postFields[$hiddenFields[1][$i]] = $hiddenFields[2][$i];

    }

    

    // add our login values

    $postFields['username'] = $username;

    $postFields['password'] = $password;

    $post = '';

 

    // here we make the query to send instagram server for login reqponse header

    // convert to string, this won't work as an array, form will not accept multipart/form-data, only application/x-www-form-urlencoded

    foreach($postFields as $key => $value) {

        $post .= $key . '=' . urlencode($value) . '&';

    }

 

    $post = substr($post, 0, -1); 

    preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $page, $matches);

    $cookieFileContent = '';

    foreach($matches[1] as $item) 

    {

        $cookieFileContent .= "$item; ";

    }

    

    $cookieFileContent = rtrim($cookieFileContent, '; ');

    $cookieFileContent = str_replace('sessionid=; ', '', $cookieFileContent);

    $oldContent = file_get_contents($file_location."/".$cookie);

    $oldContArr = explode("\n", $oldContent);

    

    if(count($oldContArr))

    {

        foreach($oldContArr as $k => $line)

        {

            if(strstr($line, '# '))

            {

                unset($oldContArr[$k]);

            }

        }

        $newContent = implode("\n", $oldContArr);

        $newContent = trim($newContent, "\n");

    

        // this code store the required update cookie details on file

        file_put_contents(

            $file_location."/".$cookie,

            $newContent

        );    

    }

 

    // Now we have all things which are needed to do login, therefore we can send the second request for login with cookie data, csrftoken.

    $arrSetHeaders = array(

        'origin: https://www.instagram.com',

        'authority: www.instagram.com',

        'upgrade-insecure-requests: 1',

        'Host: www.instagram.com',

        "User-Agent: $useragent",

        'content-type: application/x-www-form-urlencoded',

        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',

        'Accept-Language: en-US,en;q=0.5',

        'Accept-Encoding: deflate, br',

        "Referer: $url",

        "Cookie: $cookieFileContent",

        'Connection: keep-alive',

        'cache-control: max-age=0',

    );

    

    $ch  = curl_init();

    curl_setopt($ch, CURLOPT_COOKIEJAR, $file_location."/".$cookie);

    curl_setopt($ch, CURLOPT_COOKIEFILE, $file_location."/".$cookie);

    curl_setopt($ch, CURLOPT_USERAGENT, $useragent);

    if($proxy != ''){

    curl_setopt($ch, CURLOPT_PROXY,$proxy_id);

    curl_setopt($ch, CURLOPT_PROXYPORT,$proxy_port);

    curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$proxyUsername:$proxyPassword");

    curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL,1);

    }

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($ch, CURLOPT_HEADER, 1);

    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    curl_setopt($ch, CURLOPT_HTTPHEADER, $arrSetHeaders);

    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_REFERER, $url);

    curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

    sleep(0.1);

    $page = curl_exec($ch);

        

    preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $page, $matches);

    $cookies = array();

    foreach($matches[1] as $item) {

        parse_str($item, $cookie1);

        $cookies = array_merge($cookies, $cookie1);

    }

   

    // "rollout_hash":"

    $rollout_ = explode('"rollout_hash":"', $page);

 

    if(sizeof($rollout_) > 1){

        $rollout_hash = explode('",',$rollout_[1]);

        $roll_out_hash = $rollout_hash[0];

    

        // get csrftoken

        $set_cookie = explode('set-cookie: csrftoken=', $page);

        $get_cookie_val = explode(';', $set_cookie[1]);

        $csrftoken = $get_cookie_val[0];

        $get_cookie_val2 = explode(';', $set_cookie[2]);

        $csrftoken2 = $get_cookie_val2[0];

    

        // get session

        $set_session = explode('set-cookie: sessionid=', $page);

        $get_session_val = explode(';', $set_session[1]);

        $session = $get_session_val[0];

        curl_close($ch);

 

        // this code unlick cookie file which is genrating in this duration, becuase of our security

        array_map('unlink', array_filter( 

            (array) array_merge(glob($file_location."/*"))));

        return 'ok';

    } else {

        array_map('unlink', array_filter( 

            (array) array_merge(glob($file_location."/*"))));

        return 'wrong attempted'; 

    }

}

//  now we successfully login into instagram

 

// this function get data of pages which are open as json source format

function curl_load_general($url, $proxy=null, $arrSetHeaders=null, $data=null){

    if($proxy != ''){

        $explode = explode(':', $proxy);

        $proxy_username = $explode[0];

        $proxy_port = $explode[2];

        $explode_ = explode('@', $explode[1]);

        $proxy_password = $explode_[0];

        $proxy_id = $explode_[1];

 

        $proxyUsername = $proxy_username;

        $proxyPassword = $proxy_password;

    }

 

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($ch, CURLOPT_TIMEOUT, 35);

    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 35);

    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    curl_setopt($ch, CURLOPT_URL, $url);

    $response = curl_exec($ch);

 

    $shards = explode('window._sharedData = ', $response);

    $insta_json = explode(';</script>', $shards[1]);

    $insta_array = json_decode($insta_json[0], TRUE);

    

    curl_close($ch);

    return $insta_array;

}

 

function user_post($user_name, $proxy=null){

    // get users' page details such as users' posts and users' title detail (follower, following etc..)

    $url = 'https://www.instagram.com/'.$user_name.'/';

 

    // this funtion is for curl request

    $results_array= curl_load_general($url, $proxy); // this return a json of resquest urls' page

    // echo'<pre>';

    // print_r($results_array);

    // echo'</pre>';

    

    $limit = 15; // provide the limit thats important because one page only give some images then load more have to be clicked

    $user_post_array =array();

    $user_detail_array =array();

 

    if (!empty($results_array)) {

        for ($i=$limit; $i >= 0; $i--) {

            if(array_key_exists($i,$results_array['entry_data']['ProfilePage'][0]["graphql"]["user"]["edge_owner_to_timeline_media"]["edges"])){

                $latest_array = $results_array['entry_data']['ProfilePage'][0]["graphql"]["user"]["edge_owner_to_timeline_media"]["edges"][$i]["node"];

                $shortcode = $latest_array['shortcode'];

                $timestamp = $latest_array['taken_at_timestamp'];

                $video = $latest_array['is_video'];

                $media_type = ($video == '1' ? '2' : '1');

                $likes = $latest_array['edge_liked_by']['count'];

                $comments = $latest_array['edge_media_to_comment']['count'];

                $views = @$latest_array['video_view_count'];

                $post_url = $latest_array['display_url'];

                if($latest_array['is_video'] == '1'){

                    $status = $latest_array['video_view_count'];

                } else {

                    $status = '';

                }

                // $link = "https://www.instagram.com/p/".$latest_array['shortcode']."/";

 

                $user_post_array['user_post_detail'][] = array('pk'=>$latest_array['id'],

                                            'code'=>$shortcode,

                                            'timestamp'=>$timestamp,

                                            'media_type'=>$media_type,

                                            'like_count'=>$likes,

                                            'comment_count'=>$comments,

                                            'views'=>@$status,

                                            'taken_at'=>$latest_array['taken_at_timestamp'],

                                            'caption'=>@$latest_array['edge_media_to_caption']['edges'][0]['node']['text'],

                                            'post_img'=>$post_url,

                                            'user_pk'=>$results_array['entry_data']['ProfilePage'][0]["graphql"]["user"]['id'],

                                            'is_private'=>$results_array['entry_data']['ProfilePage'][0]["graphql"]["user"]['is_private'],

                                            'username'=>$results_array['entry_data']['ProfilePage'][0]["graphql"]["user"]['username'],

                                            'full_name'=>$results_array['entry_data']['ProfilePage'][0]["graphql"]["user"]['full_name'],

                                            'profile_pic_url'=>$results_array['entry_data']['ProfilePage'][0]["graphql"]["user"]['profile_pic_url'],

                                        );

 

                $user_detail_array['user_detail'] = array('id'=> $results_array['entry_data']['ProfilePage'][0]["graphql"]["user"]["id"],

                                            'full_name'=> $results_array['entry_data']['ProfilePage'][0]["graphql"]["user"]["full_name"],

                                            'username'=> $results_array['entry_data']['ProfilePage'][0]["graphql"]["user"]["username"],

                                            'bio'=> $results_array['entry_data']['ProfilePage'][0]["graphql"]["user"]["biography"],

                                            'profile_pic_url'=>$results_array['entry_data']['ProfilePage'][0]["graphql"]["user"]['profile_pic_url'],

                                            'is_private'=> $results_array['entry_data']['ProfilePage'][0]["graphql"]["user"]["is_private"],

                                            'followers'=> $results_array['entry_data']['ProfilePage'][0]["graphql"]["user"]["edge_followed_by"]["count"],

                                            'following'=> $results_array['entry_data']['ProfilePage'][0]["graphql"]["user"]["edge_follow"]["count"],

                                            'post'=> $results_array['entry_data']['ProfilePage'][0]["graphql"]["user"]["edge_owner_to_timeline_media"]['count'] 

                                        );                        

            }

        }

    }

    return array_merge($user_detail_array, $user_post_array);

}

?>