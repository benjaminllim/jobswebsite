<?php
//Manages the functionality of user
namespace Ijdb\Controllers;
use \CSY2028\DatabaseTable;
use \CSY2028\ValidateLogin;

class User {   
	
	private $usersTable;
    private $validate;

	public function __construct(DatabaseTable $usersTable, ValidateLogin $validate) {
        $this->usersTable = $usersTable;
     	$this->validate = $validate;
	}


	public function list() {
			
        $useredit = $this->validate->getuser();
		$users = $this->usersTable->findAll();
		
		$title = 'Manage Users';
		
			
		return ['template' => 'users.html.php',
		'title' => $title, 
		'variables' => [
            'users' => $users,
            'useredit' => $useredit
			]
		];


    }
    
    public function permissions() {

		$user = $this->usersTable->find('id', $_GET['id'])[0];
		$reflect = new \ReflectionClass('\Ijdb\Entity\User');
		$constants = $reflect->getconstants();
       
		return ['template' => 'userpermissions.html.php',
				'title' => 'Edit Permissions',
				'variables' => [
						'user' => $user,
						'permissions' => $constants
					]
				];	
    }
    
    public function savepermissions() {
		$user = [
			'id' => $_GET['id'],
			'permissions' => array_sum($_POST['permissions'] ?? [])
		];

		$this->usersTable->save($user);

		header('location: /users/manage');
	}
	
	public function delete() {
		$this->usersTable->delete($_POST['id']);

        header('location: /users/manage');
	}

	

}

  
