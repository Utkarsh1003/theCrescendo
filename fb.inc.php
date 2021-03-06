<?php
require 'connect.inc.php';
require 'core.inc.php';
// @session_start();
require_once __DIR__ . '/src/Facebook/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '1644383729133374',
  'app_secret' => '5a54d21eaaca757f84caa25d0186e636',
  'default_graph_version' => 'v2.4',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // optional
    
try {
    if (isset($_SESSION['facebook_access_token'])) {
        $accessToken = $_SESSION['facebook_access_token'];
    } else {
        $accessToken = $helper->getAccessToken();
    }
} catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();

    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
 }

if (isset($accessToken)) {
    if (isset($_SESSION['facebook_access_token'])) {
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    } else {
        // getting short-lived access token
        $_SESSION['facebook_access_token'] = (string) $accessToken;

        // OAuth 2.0 client handler
        $oAuth2Client = $fb->getOAuth2Client();

        // Exchanges a short-lived access token for a long-lived one
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);

        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;

        // setting default access token to be used in script
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }

    // redirect the user back to the same page if it has "code" GET variable
    if (isset($_GET['code'])) {
        header('Location:home2.php');
    }

    // getting basic info about user
    try {
        $profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
        $profile = $profile_request->getGraphNode()->asArray();
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        // redirecting user back to app login page
        header("Location: ./");
        exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
    // echo 'Logged in as ' .$profile;
    // printing $profile array on the screen which holds the basic info about user
    // header('Location: fb.php');
    // print_r($profile);
    $_SESSION['user_id']=$profile['email'];
    $fbquery = "INSERT INTO `login_info`(user_name,user_email) VALUES ('".mysql_real_escape_string($profile['name'])."','".mysql_real_escape_string($profile['email'])."')";
    $fbquery_run = mysql_query($fbquery);

    // Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
} else {
    // replace your website URL same as added in the developers.facebook.com/apps e.g. if you used http instead of https and you used non-www version or www version of your website then you must add the same here
    $loginUrl = $helper->getLoginUrl('http://localhost:8080/Home/fb.inc.php', $permissions);
}
?>