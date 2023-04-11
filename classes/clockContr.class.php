<?php
class ClockController extends Employee{
        //properties
        private $eid;
        // private $intime;
        // private $outtime;

        //constructor
        public function __construct($eid){
            // $this->outtime= "";
            // $this->intime = $intime;
            $this->eid = $eid;
        }

        //method to clockin an employee
        public function clockinEmployee(){
            // if($this->emptyFormInput() == false){
            //     header("location: ../employeeManagementUI.php?error=emptyinput");
            //     exit();
            // } --> Check if user has already clocked in

            $this->clockin($this->eid);
        }

        //method to clockin an employee
        public function clockoutEmployee(){
            // if($this->emptyFormInput() == false){
            //     header("location: ../employeeManagementUI.php?error=emptyinput");
            //     exit();
            // } --> Check if user has already clocked out
            $this->clockout($this->eid);
        }
    }
?>