<?php 
require '../Database.php';
session_start();
require '../LoadTemplate.php';
require '../Functions.php';

$title = 'Jos Jobs - Edit Category';

//$output = loadTemplate('../templates/home.html.php', []);
$output = require  '../templates/editcategory.html.php';
require  '../templates/layout.html.php';


