<?php 
    include 'includes/class-autoload.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Monitor Visitors</title>

        <link rel="stylesheet" href="css/monitorVisitors.css">
        <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
        <link rel="manifest" href="images/favicon/site.webmanifest">
        <!-- <script src="js/MVUI.js"></script> -->
    </head>

    <body>
        <header>
            <img id="image-mark" src="images/imageMark.png" alt="Tax Administration of Jamaica image mark">
            <hr>
            <h1>Monitor Visitors </h1>
            <div class="svg">
                <a href="managerDashboard.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
                </a>          
            </div>
        </header>
        
        <div class = "thebody">
            <main>
                <div class = searchContainer>
                    <div class="search-bar">
                        <svg aria-hidden="true" viewBox="0 0 24 24"> <!--Search icon svg-->
                            <path
                                d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"
                                />
                        </svg>
                        <input type ="search" id ="searchbar"  placeholder= "Search by ID number...">
                    </div>
                    <button id="searchBtn">Search</button>
                </div>
                <div class = "tableContainer">
                    <table style="border-collapse: collapse; width: 100%;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>ID Number</th>
                                <th>Visit Date</th>
                                <th>Floor</th>
                                <th>Status</th>
                                <th>Ticket</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $visitorInfo = new Visitor();
                                $result = $visitorInfo->index();
                                if($result){
                                    foreach($result as $row){
                                        ?>
                                            <tr>
                                                <td><?php echo $row['firstname'] . ' '. $row['lastname'] ?></td>
                                                <td><?php echo $row['id'] ?></td>
                                                <td><?php echo $row['created_at'] ?></td>
                                                <td><?php echo $row['floornum'] ?></td>
                                                <td id="status" >Inactive</td>

                                                <form action="includes/generateVisitorTicket.php"></form>
                                                <td><a id="view-ticket" href="">View Ticket</a></td>
                                            </tr>
                                        <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </body>
</html>
