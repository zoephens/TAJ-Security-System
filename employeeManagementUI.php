<?php
    session_start();
    include 'includes/class-autoload.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Employee Management</title>

        <link rel="stylesheet" href="css/employeeManagementUI.css">
        <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
        <link rel="manifest" href="images/favicon/site.webmanifest">
        <script src="https://kit.fontawesome.com/6b465b3e69.js" crossorigin="anonymous"></script>
        <script src="js/manageEmployee.js"></script>

    </head>
    <body>
        
        <!------------------------------------------Header----------------------------------------->
        <header>
            <img id="image-mark" src="images/imageMark.png" alt="Tax Administration of Jamaica image mark">
            <hr>
            <div class="headingtwo">
                <h1>Employee Management </h1>
                </div>
            <div class="svg">
                <a href="managerDashboard.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
                </a>          
            </div>
        </header>
        <!-----------------------------------------Search Bar---------------------------------------->
        <div class="thebody">
            <main>
                <form action="" method="post">
                    <div class = searchContainer>
                        <div class="search-bar">
                            <svg aria-hidden="true" viewBox="0 0 24 24"> <!--Search icon svg-->
                                <path
                                    d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"
                                />
                            </svg>
                            <input type ="search" id ="search" name="id" placeholder="Search by Employee ID..." required>
                            <button type="submit" name="searchBtn" id ="searchBtn" class="search-button">Search</button>
                        </div>

                        <!---------------------------------The Actual Body------------------------------------------>
                        <?php 
                        if(isset($_SESSION['status'])){?>
                            <!-- add style -->
                            <?php echo $_SESSION['status'];?>

                            <?php unset($_SESSION['status']);
                        }
                        ?>
                        <p>Employee Information</p>
                        <hr id="line" >
                        <br>
                    </div>
                </form>

                <?php
                $employee = new Employee();

                if(isset($_POST['searchBtn'])){
                    $eid = $_POST['id'];
                    $result = $employee->searchEmployee($eid);

                    if($result){
                        foreach($result as $row){
                        ?>
                            <!------The table info------>
                            <form action="includes/manageEmployee.php" method="post">
                                <div class="EmployeeInfo"> 
                                    <div class="emp-info"> <!--Put employee stuff in a div-->
                                        <label for="first-name">First Name:</label>
                                        <input type="text" id="first-name" name="first-name" value="<?php echo $row['firstname'] ?>">
                                        <!-- <p class="errormessage1"></p><br> -->

                                        <label for="Last-name">Last Name:</label>
                                        <input type="text" id="last-name" name="last-name" value="<?php echo $row['lastname'] ?>">
                                        <!-- <p class="errormessage2"></p><br> -->

                                        <label for="position">Position:</label>
                                        <div class="select">
                                            <select id="Position" name="position">
                                                <option value="Option"><strong><?php echo $row['position'] ?></strong></option>
                                                <option value="Auditor"><strong>Auditor</strong></option>
                                                <option value="CSR"><strong>Customer Service Representative</strong></option>
                                                <option value="DEC"><strong>Data Entry Clerk</strong></option>
                                                <option value="Tax Collector"><strong>Tax Collector</strong></option>
                                            </select>
                                        </div>
                                        <!-- <p class="errormessage3"></p><br> -->
                                        
                                        <label for="employeeID">Employee ID:</label>
                                        <input type="text" id="employeeID" name="employeeID" value="<?php echo $row['id'] ?>" readonly>
                                        <!-- <p class="errormessage4"></p><br> -->

                                        <label for="Floor #">Floor #: </label>
                                        <input type="number" id="floor" name="floor" min="1" max="6" value="<?php echo $row['floornum'] ?>" required>
                                        <!-- <p class="errormessage5"></p><br> -->
                                    </div>
                                    <!------The buttons------>
                                    <div class="btns">
                                        <button class="delete-button" name="del">Delete Employee</button>
                                        <button type="submit" name="add" class="add-button">Add Employee</button>
                                        <button class="edit-button" name="edit">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                        }
                    }
                }
                else{
                    ?>
                    <!------The table info------>
                    <form action="includes/manageEmployee.php" method="post">
                            <div class="EmployeeInfo"> 
                                <div class="emp-info">
                                    <label for="first-name">First Name:</label>
                                    <input type="text" id="first-name" name="first-name"  required>

                                    <label for="Last-name">Last Name:</label>
                                    <input type="text" id="last-name" name="last-name" required>

                                    <label for="position">Position:</label>
                                    <div class="select">
                                        <select id="Position" name="position"  required>
                                            <option value="Option"></option>
                                            <option value="Auditor"><strong>Auditor</strong></option>
                                            <option value="CSR"><strong>Customer Service Representative</strong></option>
                                            <option value="DEC"><strong>Data Entry Cleck</strong></option>
                                            <option value="Tax Collector"><strong>Tax Collector</strong></option>
                                        </select>
                                    </div>
                                    
                                    <label for="employeeID">Employee ID:</label>
                                    <input type="text" id="employeeID" name="employeeID" readonly>


                                    <label for="Floor #">Floor #: </label>
                                    <input type="number" id="floor" name="floor" min="1" max="6" required>
                                </div>
                                <!------The buttons------>
                                <div class="btns">
                                    <button type="submit" class="delete-button" name="del">Delete Employee</button>
                                    <button type="submit" class="add-button" name="add">Add Employee</button>
                                    <button type="submit" class="edit-button" name="edit">Save Changes</button>
                                </div>
                            </div>
                        </form><?php
                }
                ?>
            </main>
        </div>
    </body>

</html>