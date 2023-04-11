<?php
    class ManageEmployeeController extends manageEmployee{
        //properties
        private $eid;
        private $fname;
        private $lname;
        private $pos;
        private $floor;
        private $passw;

        //constructor
        public function __construct(string $fname, string $lname, string $pos, int $floornum, string $eid){
            $this->fname = $fname;
            $this->lname = $lname;
            $this->passw = "password123";
            $this->pos = $pos;
            $this->floor = $floornum;
            $this->eid = $eid;
        }

        //method to add an employee
        public function addEmployee(){
            if($this->emptyFormInput() == false){
                header("location: ../employeeManagementUI.php?error=emptyinput");
                exit();
            }
            $this->createEmployee($this->fname, $this->lname, $this->pos, $this->passw, $this->floor);
        }

        //method to delete an employee
        public function delEmployee(){
            if($this->emptyFormInput() == false){
                header("location: ../employeeManagementUI.html?error=emptyinput");
                exit();
            }
            $this->deleteEmployee($this->eid);
        }

        //method to edit an employee
        public function editEmployee(){
            if($this->emptyFormInput() == false){
                header("location: ../employeeManagementUI.php?error=emptyinput");
                exit();
            }
            $this->updateEmployee($this->fname, $this->lname, $this->pos, $this->floor, $this->eid);
        }

        //method to check if an input field is empty
        private function emptyInput(){
            if(empty($this->eid)){
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }

        private function emptyFormInput(){
            if(empty($this->fname)){
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }
    }
?>