<?php
  include '../pages/connect.php';
session_start();

?>

<?php
  if (!isset($_SESSION['admin_name']) || $_SESSION['admin_name'] !== 'admin')  {
    header("Location:../pages/login.php"); 
    exit;
}
?><!DOCTYPE html>
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
                <a href="../admin/reports-of-test.php"><li class="active">Reports of Tests/Vaccination</li></a>
                <a href="../admin/list-of-vaccine.php"><li>List of Vaccines</li></a>
                <a href="../admin/approval-for-hosp.php"><li>Approval from Hospitals</li></a>
                <a href="../admin/list-of-hosp.php"><li>List of hospitals</li></a>
                <a href="../admin/booking-details.php"><li>Booking Details</li></a>
            </ul>
        </div>

        <div class="main-content" style="margin-bottom:0px;">
        <div class="card">
                    <div class="container3">
                        <h1>Test and Vaccination Reports</h1>
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                       <th>Hospital Name</th>
                                       <th>Patient Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Phone no</th>
                                        <th>Blood Type</th>
                                        <th>Vaccine Name</th>
                                        <th>Vaccine Date</th>
                                        <th>Vaccine Dose</th>
                                        <th>Vaccine Status</th>
                                        <th>Vaccine Result</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $vaccine_upd = "SELECT * FROM update_vaccine";
                                        $vaccine_res = mysqli_query($conn, $vaccine_upd);

                                            if(mysqli_num_rows($vaccine_res) > 0) {
                                            while ($vaccine_row = mysqli_fetch_assoc($vaccine_res)) {
                                                echo "
                                                    <tr>
                                                        <td>$vaccine_row[vaccine_hosp]</td>
                                                        <td>$vaccine_row[patient_name]</td>
                                                        <td>$vaccine_row[patient_age]</td>
                                                        <td>$vaccine_row[patient_gender]</td>
                                                        <td>$vaccine_row[patient_no]</td>
                                                        <td>$vaccine_row[patient_blood_type]</td>
                                                        <td>$vaccine_row[vaccine_name]</td>
                                                        <td>$vaccine_row[vaccine_date]</td>
                                                        <td>$vaccine_row[vaccine_dose]</td>
                                                        <td>$vaccine_row[vaccine_status]</td>
                                                        <td>$vaccine_row[vaccine_result]</td>

                                                    </tr>
                                                ";
                                            }
                                            }
                                            else {
                                                echo "<tr><td colspan='7'>No patients test result found</td></tr>";
                                            }
                                    ?>                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <footer>
        &copy;  Vaccines All rights reserved.
    </footer>
</body>
</html>
