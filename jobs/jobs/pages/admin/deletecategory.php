<?php 
require '../Database.php';
require '../LoadTemplate.php';
require '../Functions.php';

$title = 'Jos Jobs - Delete category';

//$output = loadTemplate('../templates/home.html.php', []);
$output = require  '../templates/deletecategory.html.php';
require  '../templates/layout.html.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

	$stmt = $pdo->prepare('DELETE FROM category WHERE id = :id');
	$stmt->execute(['id' => $_POST['id']]);


	header('location: categories.php');
}


