<?php
session_start();
require '../LoadTemplate.php';
require '../Database.php';
require '../Functions.php';

$title = 'Jos Jobs - Apply';

//$output = loadTemplate('../templates/home.html.php', []);
$output = require  '../templates/apply.html.php';
require  '../templates/layout.html.php';





	


