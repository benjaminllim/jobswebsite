<?php
//Create the entity User
namespace Ijdb\Entity;

use CSY2028\DatabaseTable;


class User {

	const REMOVE_ACCESS = 0;
	const VIEW_ENQUIRIES = 1;
	const DELETE_ENQUIRIES = 2;
	const ADD_JOBS = 4;
	const EDIT_JOBS = 8;
	const DELETE_JOBS = 16;
	const VIEW_CATEGORIES = 32;
	const ADD_CATEGORIES = 64;
	const EDIT_CATEGORIES = 128;
	const DELETE_CATEGORIES = 256;
	const VIEW_USERS = 512;
	const EDIT_USERS_ACCESS = 1024;
	const DELETE_USERS = 2048;
    const FULL_ADMIN_ACCESS = 4096;

	public $id;
	public $firstname;
	public $lastname;
	public $email;
	public $password;
	private $usersTable;


	public function __construct(DatabaseTable $usersTable) {
		$this->usersTable = $usersTable;
		
	}

	public function haspermission($permission) {
		return $this->permissions & $permission;  
	}

	public function getuserid() {
		return $this->usersTable->find('id', $_GET['userid']);
	}
}