<?php
//Manages the functionality of login
namespace Ijdb\Controllers;

use \CSY2028\DatabaseTable;

class Login {
	private $validate;
	private $usersTable;

	public function __construct(\CSY2028\ValidateLogin $validate, DatabaseTable $usersTable) {
		$this->validate = $validate;
		$this->usersTable = $usersTable;
	}

	public function login() {
		$title = 'Log in';
		return ['template' => 'login.html.php', 
			'title' => $title,
			'variables' => [

			]
		];
	}

	public function processlogin() {
		if ($this->validate->login($_POST['email'], $_POST['password'])) {
			header('location: /login/success');
		}
		else {
			return ['template' => 'login.html.php',
					'title' => 'Log In',
					'variables' => [
							'error' => 'Invalid username/password.'
						]
					];
		}
	}

	public function success() {
		
		$user = $this->validate->getuser();
		$title = 'Login Successful';
		return ['template' => 'loginsuccess.html.php', 
				'title' => $title,
				'variables' => [
					'user' => $user,
				]
	
		];
	}

	public function error() {
		$title = 'You are not logged in';
		return ['template' => 'loginerror.html.php', 
		'title' => $title,
		'variables' => [

						]
	
				];
	}

	public function permissionerror() { 
		$title = 'Access Denied';

		return ['template' => 'permissionerror.html.php', 
		'title' => $title,
			'variables' => [

			]
	
		];
	}

	public function logout() {
		unset($_SESSION);
		session_destroy();
		$title = 'You are now logged out';
		return ['template' => 'logout.html.php', 
				'title' => $title,
				'variables' => [
					
					]
				];
	}
}
