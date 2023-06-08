<?php
//Manages the functionality of stuff related to Jobs
namespace Ijdb\Controllers;
use \CSY2028\DatabaseTable;
use \CSY2028\ValidateLogin;

class Job {
    private $jobsTable;
    private $categoriesTable;
    private $usersTable;
    private $validate;
  
    
    public function __construct(DatabaseTable $jobsTable, DatabaseTable $categoriesTable, DatabaseTable $usersTable, ValidateLogin $validate) {
        $this->jobsTable = $jobsTable;
        $this->categoriesTable = $categoriesTable;
        $this->usersTable = $usersTable;
        $this->validate = $validate;
		
        }
    
       public function list() {
        $title = 'Jobs list';
        $user = $this->validate->getuser();
        //$userid = $this->validate->getuserid();
       if ($user->haspermission(\Ijdb\Entity\User::FULL_ADMIN_ACCESS) ) {
            $jobs = $this->jobsTable->findAll();
        
       } else {
        $jobs = $this->jobsTable->find('userid', $_SESSION['id']);
        }
       
        $categories = $this->categoriesTable->findAll();                       
        return ['template' => 'jobs.html.php',
                'title' => $title,
                'variables' => [
                'jobs' => $jobs, 
                'categories' => $categories,
                'user' => $user     
                    ]
                ];
        
    
        }

                
        public function faq() {
            
            $title = 'Jos Jobs - FAQ';
        

            return ['template' => 'faq.html.php',
                     'title' => $title,   
                     'variables' => [
        
                     ]
                  ];
        }

        public function sortjobsbylocation() {         
        
            $title = 'Jobs in selected location';

            $location = $_POST['location'];
            $categories = $this->categoriesTable->findAll();
           if(isset($_POST['sortlocation'])) {
          
        
            $jobs = $this->jobsTable->find('location', $location);
         
            return ['template' => 'jobsbylocation.html.php',
            'title' => $title,
            'variables' => [
                'jobs' => $jobs,
                'categories' => $categories,
                'location' => $location
                
             ]
            ];
          
           }
           
        }

        public function sortbycategory() {
            $title = 'Jobs in selected category';
            
          
           if(isset($_POST['sortcategory'])) {

            $sort = $_POST['category'];
            $jobs = $this->jobsTable->find('categoryid', $sort);
         
            return ['template' => 'jobsbycategory.html.php',
                                    'title' => $title,
                                    'variables' => [
                                      'jobs' => $jobs         
                
                     ]
            ];
          
           }
        }

        public function archive() {
     
            
            if(isset($_POST['archive'])) {
                
          
           }

           header('location: /jobs');

        }

        public function delete() {

          
           $this->jobsTable->delete($_POST['id']);

            header('location: /jobs');

        }

        public function edit() {

            $title = 'Add/Edit Job';      
            $categories = $this->categoriesTable->dropdown('name', 'category');
            $locations = $this->jobsTable->dropdown('location', 'job');
            return ['template' => 'editjob.html.php',
                     'title' => $title,   
                    'variables' => [
                        'categories' => $categories,
                        'locations' => $locations
                    ]
                  ];
        }

        public function saveedit() {
            $show_date = DateTime::createFromFormat('d/m/Y', $dateInput)->format('Y-m-d');
            $title = 'Add/Edit Job';      
            $categories = $this->categoriesTable->dropdown('name', 'category');
            return ['template' => 'addjob.html.php',
                     'title' => $title,   
                    'variables' => [
                        'categories' => $categories
                    ]
                  ];
        }
        
        
}

