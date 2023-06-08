<?php
namespace CSY2028;
//Validates the logins
class ValidateLogin {
	private $users;
	private $usersTable;
	private $emailcheck;
	private $idcheck;
	private $passwordcheck;
	

	public function __construct(DatabaseTable $usersTable, $emailcheck, $passwordcheck, $idcheck) {
		session_start();
		$this->usersTable = $usersTable;
		$this->emailcheck = $emailcheck;
		$this->idcheck = $idcheck;
		$this->passwordcheck = $passwordcheck;
	
	}

	public function login($email, $password) {
		$user = $this->usersTable->find($this->emailcheck, strtolower($email));

		if (!empty($user) && password_verify($password, $user[0]->{$this->passwordcheck})) {
			session_regenerate_id();
			$_SESSION['email'] = $email;
			$_SESSION['firstname'] = $firstname;
			$_SESSION['id'] = $userid;
 			$_SESSION['password'] = $user[0]->{$this->passwordcheck};
			return true;
		}
		else {
			return false;
		}
	}

	public function isloggedin() { 
	

		if (empty($_SESSION['email'])) {
			return false;
		}
		
		$user = $this->usersTable->find($this->emailcheck, strtolower($_SESSION['email']));

		if (!empty($user) && $user[0]->{$this->passwordcheck} === $_SESSION['password']) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function getuser() {
		if ($this->isloggedin()) {
			return $this->usersTable->find($this->emailcheck, strtolower($_SESSION['email']))[0];
		}
		else {
			return false;
		}
	}

	public function getuserid() {
		if ($this->isloggedin()) {
			return $this->usersTable->find($this->idcheck, $_SESSION['id']);
		}
		else {
			return false;
		}
	}
		
		
	

}