<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>

        <link rel="stylesheet" href="css/index.css">
        <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
        <link rel="manifest" href="images/favicon/site.webmanifest">
    </head>
    <body>
        <main>
            <!-----Intro----->
            <div class="container">
                <div class="login-screen">
                    <img id="logo" src="images/taj-logo.png" alt="Tax Administration of Jamaica logo">
                    <br>
                    <br>
                    <br>
                    <div class="intro">
                        <h5>Welcome...</h5>
                        <h2>Who will you be signing in as?</h>
                    </div>
                    <br>
                    <!-----Radio Buttons----->
                    <form action="includes/login.php" method="post">
                        <div class="radio-btns">
                            <input class="rad" type="radio" id="manager" value="manager" name="tajmember">
                            <label for="manager">Manager</label>

                            <input class="rad" type="radio" id="security" value="security" name="tajmember">
                            <label for="security">Security</label>

                            <input class="rad" type="radio" id="employee" value="employee" name="tajmember">
                            <label for="employee">Employee</label>
                        </div>

                        <br>

                        <!-----Login Form----->
                        <div class="login-panel">
                            <label>Username</label>
                            <input type="text" name="username" id="username" placeholder="Enter your username or ID">
                            <div class="username-msg"></div>

                            <label>Password</label>
                            <input type="password" name="password" id="password" placeholder="Enter your password">
                            <div class="password-msg"></div>
                        </div>

                        <button type="submit" name="submit" id="login">Login</button>
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>