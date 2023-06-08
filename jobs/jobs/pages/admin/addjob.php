<?php 
require '../Database.php';
session_start();
require '../LoadTemplate.php';
require '../Functions.php';

$title = 'Jos Jobs - Add Job';

//$output = loadTemplate('../templates/home.html.php', []);
$output = require  '../templates/addjob.html.php';
require  '../templates/layout.html.php';




<ul><?php foreach($categories as $category) {?>		
	<h1><?=$category->name?> Jobs</h1>
	<?php } ?>

	<ul class="listing">
	<ul><?php foreach($categories as $category) {?>		
	<p>Sort <?=$category->name?> jobs by location</p>
	<?php } ?>