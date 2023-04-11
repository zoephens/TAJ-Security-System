<?php
    class manageEmployee extends Dbh{
        //method to create an employee
        protected function createEmployee($fname, $lname, $pos, $passw, $floor){
            $stmt = $this->connect()->query("INSERT INTO employees (firstname, lastname, passw, floornum, position) VALUES ('$fname', '$lname', '$passw', $floor, '$pos')");
        }

        //method to delete an employee
        protected function deleteEmployee($eid){
            $stmt = $this->connect()->query("DELETE FROM employees WHERE id = '$eid' LIMIT 1");
        }

        //method to edit an employee
        protected function updateEmployee($fname, $lname, $pos, $floor, $eid){
            $stmt = $this->connect()->query("UPDATE employees SET firstname = '$fname', lastname = '$lname', position = '$pos', floornum = '$floor' WHERE id = '$eid'");
        }
    }