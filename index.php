<?php

// Include Config
require('config.php');
require('classes/Bootstrap.php');
require('classes/Controller.php');

//Include all controllers
require('controllers/home.php');
require('controllers/users.php');
require('controllers/shares.php');

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();

if($controller){
  $controller->executeAction();
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Main page mvc</title>
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <h1>Welcome to the mvc</h1>


    <script type="text/javascript" src="assets/js/app.js">

    </script>
  </body>
</html>
