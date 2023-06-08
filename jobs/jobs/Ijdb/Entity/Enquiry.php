<?php
//Create the entity Enquiry
namespace Ijdb\Entity;

use CSY2028\DatabaseTable;

class Enquiry {
	public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $telephone;
    public $description;
	private $enquirytable;
	private $usersTable;


	public function __construct(DatabaseTable $enquirytable, DatabaseTable $usersTable) {
		$this->usersTable = $usersTable;
		$this->enquirytable = $enquirytable;
	}

}
	