<?php 
//The main starting point for the website
//Starts the interface routes 
//Starts the entry point
require '../autoload.php';
$routes = new \Ijdb\Routes();
$entryPoint = new \CSY2028\EntryPoint($routes);
$entryPoint->run();
