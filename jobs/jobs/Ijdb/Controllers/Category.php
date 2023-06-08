<?php
//Manages the functionality of stuff related to categories
namespace Ijdb\Controllers;
use \CSY2028\DatabaseTable;
use \CSY2028\ValidateLogin;

class Category {   
	private $categoriesTable;
	private $jobsTable;
	private $usersTable;
    private $validate;

	public function __construct(DatabaseTable $categoriesTable, DatabaseTable $jobsTable, DatabaseTable $usersTable, ValidateLogin $validate) {
		$this->jobsTable = $jobsTable;
        $this->categoriesTable = $categoriesTable;
        $this->usersTable = $usersTable;
        $this->validate = $validate;
	}

	//Lists categories in navigation bar and displays the page for each one
	public function navlist() {
		
		if (isset($_GET['id'])) {
			$categoryname = $this->categoriesTable->find('id', $_GET['id'])[0];
			$jobs = $this->jobsTable->find('categoryid', $_GET['id']);
			
		}
		
	  	$locations = $this->jobsTable->dropdown('location', 'job');
		$categories = $this->categoriesTable->findAll();
		
		$title = 'Jos Jobs - '. $categoryname->name;
		
			
		return ['template' => 'jobcategory.html.php',
		'title' => $title, 
		'variables' => [
			'categoryname' => $categoryname,
			'jobs' => $jobs,
			'locations' => $locations,
			'categories' => $categories
			]
		];


		
	}

	//Lists categories in the categories page
	public function list() {
			
	   
		$categories = $this->categoriesTable->findAll();
		
		$title = 'All categories';
		//Calls the getuser function in the validate login class to get user's email for permission check

		$user = $this->validate->getuser();
			
		return ['template' => 'categories.html.php',
		'title' => $title, 
		'variables' => [
			'categories' => $categories,
			'user' => $user
			]
		];


		
	}

	public function home() {
		
		$title = 'Jos Jobs - Home';
		$jobs = $this->jobsTable->findAll('closingdate', '10');
		//date_format($jobs, 'd/m/Y H:i:s');
        $categories = $this->categoriesTable->findAll();
		return ['template' => 'home.html.php',
		'title' => $title,
        'variables' => [
			'categories' => $categories,
			'jobs' => $jobs
        	]
        ];

        
	}


	public function about() {
		$title = 'Jos Jobs - About';
		$categories = $this->categoriesTable->findAll();
		
		return ['template' => 'home.html.php',
		'title' => $title, 
        'variables' => [
        	'categories' => $categories
        	]
        ];
	}

	
    public function edit() {
		
		if (isset($_GET['id'])) {
			$category = $this->categoriesTable->find('id', $_GET['id']);
		}

		$title = 'Edit Category';

		return ['template' => 'editcategory.html.php',
				'title' => $title,
				'variables' => [
					'category' => $category ?? null
				]
		];
	}

	public function saveedit() {
		$category = $_POST['category'];

		$this->categoriesTable->save($category);

		header('location: /categories');
	}
	
	public function delete() {

		$this->categoriesTable->delete($_POST['id']);

		header('location: /categories');

	}



}

  
