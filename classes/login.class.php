<?php
    class Login extends Dbh{

        //setup getEmployee/getmanager/getSecurity functions
        //or let getUser accept 3 variables that can be checked
        //to log in the respective user
        
        //method to get a user
        protected function getUser($uid, $pwd, $member){

            if($member === "employee"){
                $stmt = $this->connect()->prepare('SELECT passw FROM employees WHERE id = ?;');
            }
            elseif($member === "manager"){
                $stmt = $this->connect()->prepare('SELECT passw FROM managers WHERE username = ?;');
            }
            elseif($member === "security"){
                $stmt = $this->connect()->prepare('SELECT passw FROM securityguards WHERE username = ?;');
            }
            else{
                header("location: ../index.php?error=incorrectcredentials");
                exit();
            }

            //prevents sql injection
            if(!$stmt->execute(array($uid))){
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }
            
            $dbpwd = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dbpwd =  $dbpwd[0]["passw"];
            // $checkPwd = password_verify($pwd, $dbpwd[0]["passw"]); need to hash passw and retry but for no :D
            // echo $dbpwd[0]["passw"];

            if (!$dbpwd === $pwd){
                $stmt = null;
                header("location: ../index.php?error=wrongpassword");
                exit();
            }
            elseif($dbpwd === $pwd && $member === "employee"){
                $stmt = $this->connect()->prepare('SELECT * FROM employees WHERE id = ? AND passw = ?;');
                
                if(!$stmt->execute(array($uid, $pwd))){
                    $stmt = null;
                    header("location: ../index.php?error=stmtfailed");
                    exit();
                }

                if($stmt->rowCount() == 0){
                    $stmt = null;
                    header("location: ../index.php?error=employeenotfound");
                    exit();
                }

                $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $eid = $user[0]['id'];
                
                $stmt2 = $this->connect()->prepare('SELECT * FROM clock WHERE employeeid = ?');

                if($stmt2->execute(array($eid)) && $stmt2->rowCount() == 0){
                    $stmt2 = null;
                    $id = $_POST['username'];
                    // echo $id;
                    $date = date('d-m-y');
                    $time = date('h:i:s');  

                    $stmt2 = $this->connect()->query("INSERT INTO clock (employeeid, created_at, clockin, clockout, hoursworked) VALUES ('$id', '$date', '$time', '$time', 0)");
            
                    $stmt2 = null;
                    header("location: ../employeeDashboard.php");
                }
                else{
                    $stmt2 = null;
                    header("location: ../employeeDashboard.php");
                    exit();
                }
                // session_start();
                // $SESSION["eid"] = $user[0]["id"];

                // Get the current date
                // $currentDate = date('Y-m-d');
                // $stmt = $this->connect()->query('INSERT INTO clock (employeeid) VALUES ("$uid");');

                // $SESSION["password"] = $user[0]["passw"];
                // header("location: ../employeeDashboard.php");
            }
            elseif($dbpwd === $pwd && $member === "manager"){
                $stmt = $this->connect()->prepare('SELECT * FROM managers WHERE username = ? AND passw = ?;');
                
                if(!$stmt->execute(array($uid, $pwd))){
                    $stmt = null;
                    header("location: ../index.php?error=stmtfailed");
                    exit();
                }

                if($stmt->rowCount() == 0){
                    $stmt = null;
                    header("location: ../index.php?error=managernotfound");
                    exit();
                }

                $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

                session_start();
                $SESSION["username"] = $user[0]["username"];
                $SESSION["password"] = $user[0]["passw"];
                header("location: ../managerDashboard.php");
            }
            elseif($dbpwd === $pwd && $member === "security"){
                $stmt = $this->connect()->prepare('SELECT * FROM securityguards WHERE username = ? AND passw = ?;');
                
                if(!$stmt->execute(array($uid, $pwd))){
                    $stmt = null;
                    header("location: ../index.php?error=stmtfailed");
                    exit();
                }

                if($stmt->rowCount() == 0){
                    $stmt = null;
                    header("location: ../index.php?error=securitynotfound");
                    exit();
                }

                $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

                session_start();
                $SESSION["username"] = $user[0]["username"];
                $SESSION["password"] = $user[0]["passw"];
                header("location: ../securityDashboard.html");
            }

            $stmt = null;
        }
    }
?>