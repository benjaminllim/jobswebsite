<?php
//All the Database tables are declared
//All the controllers are declared
//Routes going to each controller and function 
//Permissions set for each route
//Check permission function checks the permissions of a user

namespace Ijdb;

class Routes implements \CSY2028\Routes {
	private $jobsTable;
	public $categoriesTable;
	public $usersTable;
	private $enquirytable;
	private $validate;


	public function __construct() {
		require '../Database.php';
	
		$this->jobsTable = new \CSY2028\DatabaseTable($pdo, 'job', 'id', '\Ijdb\Entity\Job', [&$this->jobsTable, &$this->categoriesTable]);
		$this->usersTable = new \CSY2028\DatabaseTable($pdo, 'users', 'id', '\Ijdb\Entity\User', [&$this->usersTable]);
		$this->categoriesTable = new \CSY2028\DatabaseTable($pdo, 'category', 'id', '\Ijdb\Entity\Category', [&$this->categoriesTable, &$this->jobsTable]);
		$this->enquirytable = new \CSY2028\DatabaseTable($pdo, 'enquiry', 'id', '\Ijdb\Entity\Enquiry', [&$this->enquirytable, &$this->usersTable]);
		$this->validate = new \CSY2028\ValidateLogin($this->usersTable, 'email', 'password', 'id');
	}
	public function getRoutes(): array {
		require '../Database.php';
		$usersTable = new \CSY2028\DatabaseTable($pdo, 'users', 'id');	
		$jobsTable = new \CSY2028\DatabaseTable($pdo, 'job', 'id');
		$categoriesTable = new \CSY2028\DatabaseTable($pdo, 'category','id');
		
		$jobcontroller = new \Ijdb\Controllers\Job($this->jobsTable, $this->categoriesTable, $this->usersTable, $this->validate);
		$categorycontroller = new \Ijdb\Controllers\Category($this->categoriesTable, $this->jobsTable, $this->usersTable, $this->validate);
		$logincontroller = new \Ijdb\Controllers\Login($this->validate, $this->usersTable);
		$registercontroller = new \Ijdb\Controllers\Register($this->usersTable);
		$usercontroller = new \Ijdb\Controllers\User($this->usersTable /*$this->categoriesTable, $this->jobsTable*/, $this->validate);
		$enquirycontroller = new \Ijdb\Controllers\Enquiry($this->enquirytable, $this->validate);

		$routes = [
			'' => [
				'GET' => [
					'controller' => $categorycontroller,
					'function' => 'home'
				]
			],
			'faq' => [
				'GET' => [
					'controller' => $jobcontroller,
					'function' => 'faq'
				]
			],
			'about' => [
				'GET' => [
					'controller' => $categorycontroller,
					'function' => 'about'
				]
			],
			'categorynav' => [
				'GET' => [
					'controller' => $categorycontroller,
					'function' => 'navlist'
				]
			],
			'categories' => [
				'GET' => [
					'controller' => $categorycontroller,
					'function' => 'list'
				],
				'login' => true,
				'permissions' => \Ijdb\Entity\User::VIEW_CATEGORIES
			],
			'category/edit' => [
				'POST' => [
					'controller' => $categorycontroller,
					'function' => 'saveedit'
				],
				'GET' => [
					'controller' => $categorycontroller,
					'function' => 'edit'
				],
				'login' => true,
				'permissions' => \Ijdb\Entity\User::EDIT_CATEGORIES,
				'permissions' => \Ijdb\Entity\User::ADD_CATEGORIES
			],
			'category/delete' => [
				'POST' => [
					'controller' => $categorycontroller,
					'function' => 'delete'
				],
				'login' => true,
				'permissions' => \Ijdb\Entity\User::DELETE_CATEGORIES
			],
			'jobs/location/sort' => [
				'POST' => [
					'controller' => $jobcontroller,
					'function' => 'sortjobsbylocation'
				]
			],
			'job/delete' => [
				'POST' => [
					'controller' => $jobcontroller,
					'function' => 'delete'
				],
				'login' => true,
				'permissions' => \Ijdb\Entity\User::DELETE_JOBS
			],
			'job/archive' => [
				'POST' => [
					'controller' => $jobcontroller,
					'function' => 'archive'
				],
				'login' => true,
				'permissions' => \Ijdb\Entity\User::DELETE_JOBS
			],
			'job/edit' => [
				'POST' => [
					'controller' => $jobcontroller,
					'function' => 'saveedit'
				],
				'GET' => [
					'controller' => $jobcontroller,
					'function' => 'edit'
				],
				'login' => true,
				'permissions' => \Ijdb\Entity\User::EDIT_JOBS,
				'permissions' => \Ijdb\Entity\User::ADD_JOBS
			],
			'jobs' => [
				'GET' => [
					'controller' => $jobcontroller,
					'function' => 'list'
				],
				'login' => true
			],
			'jobs/sort/category' => [
				'POST' => [
					'controller' => $jobcontroller,
					'function' => 'sortbycategory'
				],
				'login' => true
			],
			'login/error' => [
				'GET' => [
					'controller' => $logincontroller,
					'function' => 'error'
				]
			],
			'permissionerror' => [
				'GET' => [
					'controller' => $logincontroller,
					'function' => 'permissionerror'
				]
			],
			'login/success' => [
				'GET' => [
					'controller' => $logincontroller,
					'function' => 'success'
				],
				'login' => true
			],
			'logout' => [
				'GET' => [
					'controller' => $logincontroller,
					'function' => 'logout'
				]
			],
			'login' => [
				'GET' => [
					'controller' => $logincontroller,
					'function' => 'login'
				],
				'POST' => [
					'controller' => $logincontroller,
					'function' => 'processlogin'
				]
			],
			'register' => [
				'GET' => [
					'controller' => $registercontroller,
					'function' => 'registration'
				],
				'POST' => [
					'controller' => $registercontroller,
					'function' => 'register'
				]
			],
			'register/success' => [
				'GET' => [
					'controller' => $registercontroller,
					'function' => 'success'
				],
				'login' => true
			],
			'users/manage' => [
				'GET' => [
					'controller' => $usercontroller,
					'function' => 'list'
				],
				'login' => true,
				'permissions' => \Ijdb\Entity\User::VIEW_USERS
			],
			'user/edit' => [
				'GET' => [
					'controller' => $usercontroller,
					'function' => 'permissions'
				],
				'POST' => [
					'controller' => $usercontroller,
					'function' => 'savepermissions'
				],
				'login' => true,
				'permissions' => \Ijdb\Entity\User::EDIT_USERS_ACCESS
			],
			'user/delete' => [
				'POST' => [
					'controller' => $usercontroller,
					'function' => 'delete'
				],
				'login' => true,
				'permissions' => \Ijdb\Entity\User::DELETE_JOBS
			],
			'enquiries' => [
				'GET' => [
					'controller' => $enquirycontroller,
					'function' => 'list'
				],
				'POST' => [
					'controller' => $enquirycontroller,
					'function' => 'complete'
				],
				'login' => true,
				'permissions' => \Ijdb\Entity\User::VIEW_ENQUIRIES
			],
			'enquiry/details' => [
				'GET' => [
					'controller' => $enquirycontroller,
					'function' => 'details'
				],
				'POST' => [
					'controller' => $enquirycontroller,
					'function' => 'back'
				],
				'login' => true,
				'permissions' => \Ijdb\Entity\User::VIEW_ENQUIRIES
			],
			'enquiry/delete' => [
				'POST' => [
					'controller' => $enquirycontroller,
					'function' => 'delete'
				],
				'login' => true,
				'permissions' => \Ijdb\Entity\User::DELETE_ENQUIRIES
			],
			'enquiry/add' => [
				'GET' => [
					'controller' => $enquirycontroller,
					'function' => 'enquiryform'
				],
				'POST' => [
					'controller' => $enquirycontroller,
					'function' => 'add'
				],
		
			],
			
		];
	
		return $routes;
	}

	public function validate(): \CSY2028\ValidateLogin {
		return $this->validate;
		}
	
	public function checkpermission($permission): bool {
		$user = $this->validate->getuser();
		
		if ($user && $user->haspermission($permission)) {
			return true;
		} else {
			return false;
			}
		}
	
	
}

































































