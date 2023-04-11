<?php 
  include 'includes/class-autoload.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Employee Log Report</title>

      <link rel="stylesheet" href="css/employeeLogReport.css">
      <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
      <link rel="manifest" href="images/favicon/site.webmanifest">
  </head>
  <body>
      <header>
          <img id="image-mark" src="images/imageMark.png" alt="Tax Administration of Jamaica image mark">
          <hr>
            <h1>Generate Employee Log Report </h1>
          <div class="svg">
              <a href="managerDashboard.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
              </svg>
              </a>          
          </div>
      </header>
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
                      <input type ="search" id ="searchbar" name="name"  placeholder="Search by First Name...">
                      <button type="submit" name="searchBtn" id ="searchBtn" class="search-button">Search Employee</button>
                    </div>
              </div>
            </form>

            <?php
            if(isset($_POST['searchBtn'])){
              $empFname = $_POST['name'];
              ?>
              <div class="table1">
                <table style="border-collapse: collapse; width: 100%;">
                  <thead>
                    <tr>
                      <th>Employee</th>
                      <th>ID Number</th>
                      <th>Position</th>
                      <th>Floor</th>
                      <th>Date</th>
                      <th>Clock-in Time</th>
                      <th>Clock-out Time</th>
                      <th>Hours</th>
                      <th>Activity</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $employeeName = new Employee();

                    $result = $employeeName->showEmployee($empFname);
                    $cresult = $employeeName->showEmployeeTime($empFname);

                    if ($result && $cresult){
                      
                      foreach($cresult as $row2){
                        foreach($result as $row){
                        ?>
                          <tr>
                            <td><?php echo $row['firstname'] . ' '. $row['lastname'] ?></td>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['position'] ?></td>
                            <td><?php echo $row['floornum'] ?></td>

                            <td><?php echo $row2['created_at'] ?></td>
                            <td><?php echo $row2['clockin'] ?></td>
                            <td><?php echo $row2['clockout'] ?></td>
                            <td><?php echo $row2['hoursworked'] ?></td>
                            <td><p>Inactive</p></td>
                          </tr>
                        <?php
                        }
                      }
                    }
                  ?>
                  </tbody>
                </table>
              </div><?php
            }   
            else{?>
              <div class="table1">
                  <table style="border-collapse: collapse; width: 100%;">
                    <thead>
                      <tr>
                        <th>Employee</th>
                        <th>ID Number</th>
                        <th>Position</th>
                        <th>Floor</th>
                        <th>Date</th>
                        <th>Clock-in Time</th>
                        <th>Clock-out Time</th>
                        <th>Hours</th>
                        <th>Activity</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $employeeName = new Employee();
                        $result = $employeeName->index();
                        $cresult = $employeeName->cindex();

                        if ($result && $cresult){
                          
                          foreach($cresult as $row2){
                            foreach($result as $row){
                            ?>
                              <tr>
                                <td><?php echo $row['firstname'] . ' '. $row['lastname'] ?></td>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['position'] ?></td>
                                <td><?php echo $row['floornum'] ?></td>

                                <td><?php echo $row2['created_at'] ?></td>
                                <td><?php echo $row2['clockin'] ?></td>
                                <td><?php echo $row2['clockout'] ?></td>
                                <td><?php echo $row2['hoursworked'] ?></td>
                                <td><p>Inactive</p></td>
                              </tr>
                            <?php
                            }
                          }
                        }
                        else {
                          echo "Employee Not Found";
                        }  
                      ?>
                    </tbody>
                  </table>
                </div><?php
              }?>
        </main>
    </div>
  </body>
</html>