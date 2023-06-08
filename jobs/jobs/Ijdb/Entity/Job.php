<?php
//Create the entity Job
namespace Ijdb\Entity;

use CSY2028\DatabaseTable;

class Job {
    public $id;
    public $title;
	public $salary;
	public $description;
    public $closingdate;
    public $categoryid;
	public $location;
	public $userid;
	private $jobsTable;
	private $categoriesTable;
	
	
	

	public function __construct(DatabaseTable $jobsTable, DatabaseTable $categoriesTable) {
		$this->jobsTable = $jobsTable;
		$this->categoriesTable = $categoriesTable;
	}

	public function getcategoryname() {
		return $this->categoriesTable->find('id', $this->categoryid)[0];
	}
	

	
}