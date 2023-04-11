<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>

        <link rel="stylesheet" href="css/managerDashboard.css">
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
                    <p>Manager</p>
                </div>
                <div class="svg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                    <a id="Logout" href="includes/logout.php">Logout</a>
                </div>
            </header>
        </div>
        <main>
            <br>
            <br>
            <p1>Hover and click to choose where to go next...</p1>
            <br>
            <br>
            <br>
            <a href="employeeManagementUI.php">Manage Employees</a>
            <br>
            <br>
            <a href="employeeLogReport.php">Generate Report</a>
            <br>
            <br>
            <a href="#" style="color: grey; opacity: 50%">Generate Access Code</a>
            <br>
            <br>
            <a href="monitorVisitorUI.php">Monitor Visitors</a>
        </main>
    </body>
</html>