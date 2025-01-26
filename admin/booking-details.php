<?php
  include '../pages/connect.php';
session_start();

?>

<?php
  if (!isset($_SESSION['admin_name']) || $_SESSION['admin_name'] !== 'admin')  {
    header("Location:../pages/login.php"); 
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin- Vaccine Test</title>
     <!-- css file -->
    <link rel="stylesheet" href="../style/admin.css">
</head>

<body>
    <!-- Same header as above -->
    <div class="header" style="display: flex; flex-direction: row; justify-content: space-between;">
    <a class="navbar-brand" >
  <span id="1">
         <h1> Vaccine  </h1>
            </span>
          </a>

        <span>
        <span>
            <a href="../pages/logout.php" style="text-decoration: none;">
                <button id="logout">Logout
                    <img src="../assets/icons8-logout-100.png" alt="" width="25px" height="25px">
                </button>
            </a>
        </span>
    </div>

    <div class="container" style="display: flex;">
        <div class="sidebar">
            <ul>
                <a href="../admin/maindashboard.php"><li>Main Dashboard</li></a>
                <a href="../admin/patients-details.php"><li>Patient Details</li></a>
                <a href="../admin/reports-of-test.php"><li>Reports of Tests/Vaccination</li></a>
                <a href="../admin/list-of-vaccine.php"><li>List of Vaccines</li></a>
                <a href="../admin/approval-for-hosp.php"><li>Approval from Hospitals</li></a>
                <a href="../admin/list-of-hosp.php"><li>List of hospitals</li></a>
                <a href="../admin/booking-details.php"><li class="active">Booking Details</li></a>
            </ul>
        </div>

        <div class="main-content">
                <div class="container7">
                    <h1>Booking details of Patients</h1> 
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Hospital Name</th>
                                    <th>Patient Name</th>
                                    <th>Father Name</th>
                                    <th>Patient Number</th>
                                    <th>Service Type</th>
                                    <th>Booked Date</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $appoint_query = "SELECT * FROM appointments";
                                    $appoint_res = mysqli_query($conn,$appoint_query);
                                    if($appoint_res && mysqli_num_rows($appoint_res)){
                                        while($appoint_row = mysqli_fetch_assoc($appoint_res)){
                                            echo "
                                                <tr>
                                                    <td>$appoint_row[appoint_hosp_name]</td>
                                                    <td>$appoint_row[appoint_name]</td>
                                                    <td>$appoint_row[appoint_fname]</td>
                                                    <td>$appoint_row[appoint_number]</td>
                                                    <td>$appoint_row[service_type]</td>
                                                    <td>$appoint_row[appointment_date]</td>
                                                    <td>$appoint_row[appoint_age]</td>
                                                    <td>$appoint_row[appoint_gender]</td>
                                                </tr>   
                                            ";
                                        }
                                    }
                                    else{
                                        echo "<tr> <td colspan='8'>No appointments found</td>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
        
    </div>

    <footer>
        &copy;  Vaccines All rights reserved.
    </footer>
</body>
</html>
