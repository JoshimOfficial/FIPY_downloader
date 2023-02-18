<?php

require_once("inc/function.php");

// this is our index.php file

// we only call the function for any Instagram action.

// Now we need to understand how we can develop it well without Instagram notice.

 

$username = 'ENTER YOUR INSTAGRAM USERNAME';

$password = 'ENTER YOUR INSTAGRAM PASSWORD';

// If you hvar proxy you can add here.

$proxy = '';

$proxy = @$proxy ? $proxy : '';

 

// now we call the login function

$log = login($username, $password);

 

echo'<pre> login status ';

print_r($log);

echo'</pre>';

// If you get ok, that means you are login successfully.

 

// Get user post

// now we get any user datils which are not private on Instagram.

// currently we put out a username, but here we can put any Instagram username, we will see that after this

$user_details = user_post('ENTER USERNAME OF ANY USERS', $proxy);

 

// Here you will get array with details

echo'<pre> user_details';

print_r($user_details);

echo'</pre>';