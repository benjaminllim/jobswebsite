<?php
require '../Database.php';
session_start();
require '../LoadTemplate.php';
require '../Functions.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

	$stmt = $pdo->prepare('DELETE FROM job WHERE id = :id');
	$stmt->execute(['id' => $_POST['id']]);


	header('location: jobs.php');
}


