<?php

if(isset($_POST["submit"])){
    if(isset($_POST['tajmember'])){
        // Getting the data from the login form
        $uid = $_POST["username"];
        $pwd = $_POST["password"];
        $member = $_POST['tajmember'];

        // Instantiating LoginController class
        include "../classes/dbh.class.php";
        include "../classes/login.class.php";
        include "../classes/loginContr.php";
        $login = new LoginController($uid, $pwd, $member);

        // Running error handlers and login
        $login->loginUser();

        //Returning to front page
        // header("location: ../index.php?error=none");

    }
    
}

?>