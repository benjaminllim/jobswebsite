<?php
//Create the entity Category
namespace Ijdb\Entity;

use CSY2028\DatabaseTable;

class Category {
	public $id;
	public $name;
	private $categoriesTable;
	private $jobsTable;


	public function __construct(DatabaseTable $categoriesTable, DatabaseTable $jobsTable) {
		$this->jobsTable = $jobsTable;
		$this->categoriesTable = $categoriesTable;
	}




	
}