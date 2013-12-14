<?php
	session_start(); 

	// config and includes
   	$config = dirname(__FILE__) . '/config.php';
    require_once( "Hybrid/Auth.php" );
	
	
	try{
		// hybridauth EP

		$hybridauth = new Hybrid_Auth( $config );

		// automatically try to login with Twitter
		$twitter = $hybridauth->authenticate( "Twitter" );

		// return TRUE or False <= generally will be used to check if the user is connected to twitter before getting user profile, posting stuffs, etc..
		$is_user_logged_in = $twitter->isUserConnected();

		// get the user profile 
		$user_profile = $twitter->getUserProfile();

		// access user profile data
		echo "Ohai there! U are connected with: <b>{$twitter->id}</b><br />";
		echo "As: <b>{$user_profile->displayName}</b><br />";
		echo "And your provider user identifier is: <b>{$user_profile->identifier}</b><br />";  

		// or even inspect it
		echo "<pre>" . print_r( $user_profile, true ) . "</pre><br />";
		 // grab the user's friends list
  $user_contacts = $twitter->getUserContacts();
 print $user_contacts;
 print "try to get contacts";
  // iterate over the user friends list
  foreach( $user_contacts as $contact ){
     echo $contact->displayName . " " . $contact->profileURL ." " . "<img src='". $contact->photoURL ."'> " ."<hr />";
  }
		}
		catch( Exception $e ){  
		// In case we have errors 6 or 7, then we have to use Hybrid_Provider_Adapter::logout() to 
		// let hybridauth forget all about the user so we can try to authenticate again.

		// Display the recived error, 
		// to know more please refer to Exceptions handling section on the userguide
			print "exception " . $e->getCode();
		} 
	
	?>