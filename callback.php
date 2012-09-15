<?php
/**
* Note, this lib will get out-dated fairlt soon, you always want to
* checkoout the lib from http://code.google.com/p/google-api-php-client/
* Their examples sucks but the lib is well written.
*/
require_once('src/apiClient.php');
require_once('src/contrib/apiOauth2Service.php');
 
$client = new apiClient();
 // Visit https://code.google.com/apis/console to generate your
// oauth2_client_id, oauth2_client_secret, and to register your oauth2_redirect_uri.
$client->setClientId('your client id');
$client->setClientSecret('your client secrect');
$client->setRedirectUri(YOUR_DOMAIN. '/callback.php'); //make sure this one matches your setting in google api console.
 
$oauth2 = new apiOauth2Service($client);

if (isset($_GET['code'])) {
    try{
      $client->authenticate($_GET['code']);
      $access_token = $client->getAccessToken();
      $client->setAccessToken($access_token);
       
      echo "<pre>";
      print_r($oauth2->userinfo->get());
      exit;
    }catch(Exception $e){
      print_r($e->getMessage());
      exit;
    }
}
?>
