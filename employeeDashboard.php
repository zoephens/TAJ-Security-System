<?php
    session_start();
    // include 'includes/class-autoload.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Employee Dashboard</title>

        <link rel="stylesheet" href="css/employeeDashboard.css">
        <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
        <link rel="manifest" href="images/favicon/site.webmanifest">
    </head>
    <body>
        <div class="thebody">
        <header>
            <img id="image-mark" src="images/imageMark.png" alt="Tax Administration of Jamaica image mark">
            <hr>
            <div class="headingtwo">
                <h1>Dashboard</h1> 
                <p>Employee</p>
            </div>
            <div class="svg">
                <a href="includes/logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
                </a>          
            </div>
        </header>
        </div>
    
    <main>
        <form action="includes/clock.php" method="post">
            <div class = "Buttons">
                <button type="submit" name="clockin" id="clockin">Clock-in</button>
                <button type = "submit" name="clockout" id="clockout">
                <svg xmlns="http://www.w3.org/2000/svg" id = "svg2" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                Clock-out</button>
            </div>
        </form>

        <?php 
        if(isset($_SESSION['status'])){?>
            <!-- add style -->
            <?php echo $_SESSION['status'];
            unset($_SESSION['status']);
            // unset($_SESSION['status']);
        }
        ?>

    </main>
    </body>
</html>