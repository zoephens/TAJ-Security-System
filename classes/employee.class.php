<?php

class Employee extends Dbh {
    //method

    //method to get employees
    public function index(){
        $sql = "SELECT * FROM employees"; 
        $result = $this->connect()->query($sql);
        if($result->rowCount() > 0){
            return $result;
        } else{
            return false;
        }
    }

    //method to get an employees clock in times
    public function cindex(){
        $sql = "SELECT * FROM clock"; 
        $result = $this->connect()->query($sql);
        if($result->rowCount() > 0){
            return $result;
        } else{
            return false;
        }
    }

    //method to get an employee
    public function showEmployee($fname){
        $sql = "SELECT * FROM employees WHERE firstname = '$fname'"; 
        $result = $this->connect()->query($sql);
        if($result->rowCount() > 0){
            return $result;
        } else{
            return false;
        }
    }

    //method to get an employees clock-in time
    public function showEmployeeTime($fname) {
        $sql = "SELECT id FROM employees WHERE firstname = :fname"; 
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':fname', $fname);
        $stmt->execute();
        $eid = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($eid) {
            $eidval = $eid['id'];
    
            $sql = "SELECT * FROM clock WHERE employeeid = :eid"; 
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(':eid', $eidval);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            if (count($result) > 0) {
                return $result;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    //method to seatch for an employee
    public function searchEmployee($eid){
        $sql = "SELECT * FROM employees WHERE id = '$eid'"; 
        $result = $this->connect()->query($sql);
        if($result->rowCount() > 0){
            return $result;
        } else{
            return false;
        }
    }

    //method to clockin
    public function clockin($eid) {
        $sql = "INSERT INTO clock (employeeid) VALUES (:eid)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':eid', $eid);
        $stmt->execute();
    }
    

    //method to clockout
    public function clockout($eid) {
        $sql = "UPDATE clock SET clockout = NOW() WHERE employeeid = :eid ORDER BY id DESC LIMIT 1";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':eid', $eid);
        $stmt->execute();
    }
    
}

