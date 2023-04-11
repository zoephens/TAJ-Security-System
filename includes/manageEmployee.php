<?php

    session_start();

    // Linking classes
    include "../classes/dbh.class.php";
    include "../classes/manageEmployee.class.php";
    include "../classes/manageEmployeeContr.class.php";

    //if add do:
    if(isset($_POST['add'])){
        if(!$_POST['employeeID']){
            try{
                // Getting the data from the form
                $fname = sanitizeData($_POST['first-name']);
                $lname = sanitizeData($_POST['last-name']);
                $pos = sanitizeData($_POST['position']);
                $floornum = sanitizeData($_POST['floor']);
    
                //send data to the database
                $employeeManager = new ManageEmployeeController($fname, $lname, $pos, (int)$floornum, "");
                $employeeManager->addEmployee();
    
                //Returning page to user
                $_SESSION['status'] = "Employee Added Successfully!";
                header("location: ../employeeManagementUI.php?error=none");
                exit();
            }
            catch(TypeError $e){
                $_SESSION['status'] = "Something Went Wrong: " . $e->getMessage();
                header("location: ../employeeManagementUI.php?error=none");
                exit();
            }
        }
        else{
            $_SESSION['status'] = "User Already Exist!";
            header("location: ../employeeManagementUI.php?error=none");
            exit();
        }
        
    }

    //if edit do: search then overwrite
    if(isset($_POST['edit'])){
        if($_POST['employeeID']){
            try{
                // Getting the data from the form
                $fname = sanitizeData($_POST['first-name']);
                $lname = sanitizeData($_POST['last-name']);
                $pos = sanitizeData($_POST['position']);
                $floornum = sanitizeData($_POST['floor']);
                $eid = sanitizeData($_POST['employeeID']); 
    
                //send data to the database
                $employeeManager = new ManageEmployeeController($fname, $lname, $pos, (int)$floornum, $eid);
                $employeeManager->editEmployee();
    
                //Returning page to user
                $_SESSION['status'] = "Employee Edited Successfully!";
                header("location: ../employeeManagementUI.php?error=none");
                exit();
            }
            catch(TypeError $e){
                echo "D: " . $e->getMessage();
            }
        }
        else{
            $_SESSION['status'] = "User Does Not Exist!";
            header("location: ../employeeManagementUI.php?error=none");
            exit();
        } 
    }

    //if delete do:
    if(isset($_POST['del'])){
        try{
            // Getting the data from the form
            $fname = sanitizeData($_POST['first-name']);
            $lname = sanitizeData($_POST['last-name']);
            $pos = sanitizeData($_POST['position']);
            $floornum = sanitizeData($_POST['floor']);
            $eid = sanitizeData($_POST['employeeID']); 

            //send data to the database
            $employeeManager = new ManageEmployeeController($fname, $lname, $pos, (int)$floornum, $eid);
            $employeeManager->delEmployee();

            //Returning page to user
            $_SESSION['status'] = "Employee Deleted Successfully!";
            header("location: ../employeeManagementUI.php?error=none");
            exit();
        }
        catch(TypeError $e){
            echo "D: " . $e->getMessage();
        }
    }

    function sanitizeData($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=strip_tags($data);
        $data=htmlspecialchars($data);
        return $data;
    }


    //if edit do:
    //$employee = new Employee($fname, $lname, $pos, (int)$floornum);

    //Query the employee table in the database
    // $employeeManager = new ManageEmployeeController($eid);
    // $employeeManager->searchEmployee();
    
    //Returning data to user
    // header("location: ../manageEmployeeUI.php?error=none");
    //show the data to the user -view
?>
