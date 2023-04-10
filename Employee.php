<?php

class Employee extends EmployeeDB {
    //method
    public function index(){
        $sql = "SELECT * FROM employees"; 
        $result = $this->connect()->query($sql);
        if($result->rowCount() > 0){
            return $result;
        } else{
            return false;
        }
    }

}

