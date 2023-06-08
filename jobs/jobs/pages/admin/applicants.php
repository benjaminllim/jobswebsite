<?php 
require '../Database.php';
session_start();
require '../LoadTemplate.php';
require '../Functions.php';

$title = 'Jos Jobs - Applicants';

//$output = loadTemplate('../templates/home.html.php', []);
$output = require  '../templates/applicants.html.php';
require  '../templates/layout.html.php';






