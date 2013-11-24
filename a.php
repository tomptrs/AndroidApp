<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Home Project ICT 4</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.0.2-dist\dist\css/bootstrap.css" rel="stylesheet">

  
  <link href="jumbotron.css" rel="stylesheet">

  
  </head>

  <body>

<?php
require "Monitoring.php";
$m = new Monitoring();			
			
print $m->GetData();
print "Hallo Tom Peeters.";
?>   
   
  </body>
</html>