<?php

print "hallo";

require_once( "Hybrid/Auth.php" );
 $config   = dirname(__FILE__) . 'Hybrid/config.php';

 print $config;
 
$hybridauth = new Hybrid_Auth( $config );

// hybridauth will try to authenticate the user, then return an instance of Twitter adapter
$twitter_adapter = $hybridauth->authenticate( "Twitter" );  
 
// get the user profile 
$twitter_user_profile = $twitter_adapter->getUserProfile();
print $hybridauth;
print $twitter_user_profile;

?>
