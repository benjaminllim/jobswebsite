<?php 
require '../Database.php';
session_start();
require '../LoadTemplate.php';
require '../Functions.php';

$title = 'Jos Jobs - Job list';

update($pdo, 'job', $criteria);
//$output = loadTemplate('../templates/home.html.php', []);
$output = require  '../templates/jobs.html.php';
require  '../templates/layout.html.php';
require '.../pages/'.$_GET['page'] . '.php';




