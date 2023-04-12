<?php

    session_start();

    // Linking classes
    include "../classes/dbh.class.php";
    include "../classes/employee.class.php";
    include "../classes/clockContr.class.php";

    //if clockin do:
    if(isset($_POST['clockin'])){
        try{ 
            //send data to the database
            $clockin = new ClockController;
            $clockin->clockinEmployee();

            //Returning page to user
            $_SESSION['status'] = "You Are Clocked In!";

            
            header("location: ../employeeDashboard.php?error=none");
            exit();
        }
        catch(Exception $e){
            $_SESSION['status'] = "Something Went Wrong: " . $e->getMessage();
            header("location: ../employeeDashboard.php?error=none");
            exit();
        }
    }
    else{
        $_SESSION['status'] = "User Already Clocked In!";
        header("location: ../employeeDashboard.php?error=none");
        exit();
    }


    //if clockout do:
    if(isset($_POST['clockout'])){
        try{
            $eid = $_SESSION['id'];

            //send data to the database
            $clockout = new ClockController($eid);
            $clockin->clockoutEmployee();

            //Returning page to user
            $_SESSION['status'] = "You Are Clocked Out!";
            header("location: ../employeeDashboard.php?error=none");
            exit();
        }
        catch(Exception $e){
            $_SESSION['status'] = "Something Went Wrong: " . $e->getMessage();
            header("location: ../employeeDashboard.php?error=none");
            exit();
        }
    }
    else{
        $_SESSION['status'] = "Something Went Wrong!";
        header("location: ../employeeDashboard.php?error=none");
        exit();
    }
