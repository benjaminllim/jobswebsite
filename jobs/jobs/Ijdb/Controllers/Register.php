<?php
//Manages the functionality of Register
namespace Ijdb\Controllers;
use \CSY2028\DatabaseTable;

class Register {
	private $usersTable;
	

	public function __construct(DatabaseTable $usersTable) {
		$this->usersTable = $usersTable;
		
	}

	public function registration() {
		$title = 'Register an account';

		return ['template' => 'register.html.php', 
				'title' => $title,
					'variables' => [

				]
			];
	}


	public function success() {
		$title = 'Registration Successful';

		return ['template' => 'registersuccess.html.php', 
				'title' => $title,
					'variables' => [
				]
			];
	}

	public function register() {
		$user = $_POST['user'];

		//Assume the data is valid to begin with
		$valid = true;
		$errors = [];

		//But if any of the fields have been left blank, set $valid to false
		

		if (empty($user['email'])) {
			$valid = false;
			$errors[] = 'Email cannot be blank';
		}
			else if (filter_var($user['email'], FILTER_VALIDATE_EMAIL) == false) {
				$valid = false;
				$errors[] = 'Invalid email address';
		}
		else { //if the email is not blank and valid:
			//convert the email to lowercase
			$user['email'] = strtolower($user['email']);

			//search for the lowercase version of `$author['email']`
			if (count($this->usersTable->find('email', $user['email'])) > 0) {
				$valid = false;
				$errors[] = 'That email address is already registered';
			}
		}

		if (empty($user['firstname'])) {
			$valid = false;
			$errors[] = 'First name cannot be blank';
		}

		if (empty($user['lastname'])) {
			$valid = false;
			$errors[] = 'Last name cannot be blank';
		}

		if (empty($user['password'])) {
			$valid = false;
			$errors[] = 'Password cannot be blank';
		}

		//If $valid is still true, no fields were blank and the data can be added
		if ($valid == true) {
			//Hash the password before saving it in the database
			$user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);

			//When submitted, the $author variable now contains a lowercase value for email
			//and a hashed password
			$this->usersTable->insert($user);

			header('Location: /register/success');
		}
		else {
			//If the data is not valid, show the form again
			return ['template' => 'register.html.php', 
				    'title' => 'Register an account',
				    'variables' => [
				    	'errors' => $errors,
				    	'user' => $user
				    ]
				   ]; 
		}
	}

	public function list() {
		$authors = $this->authorsTable->findAll();

		return ['template' => 'authorlist.html.php',
				'title' => 'Author List',
				'variables' => [
						'authors' => $authors
					]
				];
	}

	public function permissions() {

		$author = $this->authorsTable->findById($_GET['id']);

		$reflected = new \ReflectionClass('\Ijdb\Entity\Author');
		$constants = $reflected->getConstants();

		return ['template' => 'permissions.html.php',
				'title' => 'Edit Permissions',
				'variables' => [
						'author' => $author,
						'permissions' => $constants
					]
				];	
	}

	public function savePermissions() {
		$author = [
			'id' => $_GET['id'],
			'permissions' => array_sum($_POST['permissions'] ?? [])
		];

		$this->authorsTable->save($author);

		header('location: /author/list');
	}
}