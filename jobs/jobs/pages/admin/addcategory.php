<?php 
require '../Database.php';
session_start();
require '../LoadTemplate.php';
require '../Functions.php';

$title = 'Jos Jobs - Add Category';

//$output = loadTemplate('../templates/ho me.html.php', []);
$output = require  '../templates/addcategory.html.php';
require  '../templates/layout.html.php';


