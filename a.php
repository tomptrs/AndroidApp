

<?php

require "Monitoring.php";
$m = new Monitoring();			
			
header('Content-Type: application/json');
//$json = array();
echo $m->GetData();


//TRY TO SEND JSON DATA!

?>   
   

   