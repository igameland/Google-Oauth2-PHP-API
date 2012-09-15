<?php
/**
* Note, this lib will get out-dated fairlt soon, you always want to
* checkoout the lib from http://code.google.com/p/google-api-php-client/
* Their examples sucks but the lib is well written.
* 
* I will try my best to make it up-to-date.. if you are running to any issues..
* you can email me at 
*/
require_once('src/apiClient.php');
         
$client = new apiClient();

 // Visit https://code.google.com/apis/console to generate your
// oauth2_client_id, oauth2_client_secret, and to register your oauth2_redirect_uri.
$client->setClientId('your client id');
$client->setClientSecret('your client secrect');
$client->setRedirectUri(YOUR_DOMAIN. '/callback.php'); //make sure this one matches your setting in google api console.
$client->setScopes(array('profile', 'email')); //depending on your need.. i just need profile and email

$authUrl = $client->createAuthUrl();

//normally you want to redirect, that's why this script is called redirect..
//but i know you would like to debug at this point so..  
echo $authUrl;
?>
