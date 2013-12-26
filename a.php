

<?php

require "Monitoring.php";
$m = new Monitoring();			
			
header('Content-Type: application/json');
//$json = array();
$str = $m->GetData();

print $str;

//TRY TO SEND JSON DATA!

?>   
   

   