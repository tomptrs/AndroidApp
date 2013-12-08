<?php 

session_start();

echo "Login to your Twitter Account";

include 'lib/EpiCurl.php';
include 'lib/EpiOAuth.php';
include 'lib/EpiTwitter.php';
include 'lib/secret.php';




  		echo "<div style='width:200px;margin-top:200px;margin-left:auto;margin-right:auto'>";
        echo "<a href='$url'>Sign In with Twitter</a>";
        echo "</div>";
    

	
	  echo "<div style='margin-top:100px;'>";
	  echo "<p>";
	  echo "<center>";
	  echo "<a href='http://www.1stwebdesigner.com/tutorials/how-to-update-twitter-using-php-and-twitter-api/'>Back to Tutorial</a>";
	  echo "</center>";
	  echo "</p>";
	  echo "</div>";

?> 