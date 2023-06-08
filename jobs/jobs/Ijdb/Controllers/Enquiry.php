<?php
//Manages the functionality of stuff related to enquiry
namespace Ijdb\Controllers;
use \CSY2028\DatabaseTable;
use \CSY2028\ValidateLogin;

class Enquiry {
    
    private $enquirytable;
    private $validate;
  
    public function __construct(DatabaseTable $enquirytable, ValidateLogin $validate) {
        $this->enquirytable = $enquirytable;
        $this->validate = $validate;
		
    }
    
    public function list() {
        
        $title = 'Enquiries';
        $enquiries = $this->enquirytable->findAll();
        $user = $this->validate->getuser();
                           
        return ['template' => 'enquiries.html.php',
                'title' => $title,
                'variables' => [
                    'enquiries' => $enquiries, 
                    'user' => $user       
                    ]
                ];
    }

    public function details() {
        $title ='Enquiry';
        $enquiry = $this->enquirytable->find('id', $_GET['id'])[0];

        return ['template' => 'enquirydetails.html.php',
                'title' => $title,   
                'variables' => [
                    'enquiry' => $enquiry
                    ]
                ];
    }
        
    public function delete() {

        $this->enquirytable->delete($_POST['id']);

        header('location: /enquiries');

    }

    public function enquiryform() {


        $title = 'Send Enquiry';      
        
        return ['template' => 'sendenquiry.html.php',
                'title' => $title,   
                'variables' => [
                    ]
                ];
    }

    public function add() {
        
        $enquiry = $_POST['enquiry'];

        $this->enquirytable->insert($enquiry);

        header('location: /enquiry/add');

        
    }

    public function back() {
        header('location: /enquiries');
    }
    
    public function complete() {
        $complete = $_POST['completed'];

        header('location: /enquiries');
    }
        
}

