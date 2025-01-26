<?php
  include '../pages/connect.php';
  session_start();
?>

<?php
  if (!isset($_SESSION['name']) || $_SESSION['user_role'] !== 'Hospital')  {
    header("Location:../pages/login.php"); 
    exit;
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital - Vaccine Test</title>
    <link rel="stylesheet"  href="../style/hospital11.css">
    <style>
       
    </style>
</head>

<body>
    <div class="header">
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

    <div class="container">
        <div class="sidebar">
            <ul>
                <li style='pointer-events: none;'><strong><?php echo $_SESSION["name"];?></strong></li>
                <a href="../hospital/patientRegister_vaccines.php"><li>Register for Vaccines</li></a>
                <a class="hide-show" href="../hospital/patient_details.php"><li>Patient Details</li></a>
                <a class="hide-show" href="../hospital/requests_patients.php"><li>Requests from Patients</li></a>
                <a class="hide-show" href="../hospital/update_test_result.php"><li>Update Vaccine Test Result</li></a>
                <a class="hide-show" href="../hospital/update_vaccination_status.php"><li>Update Vaccination Status</li></a>
                <a class="hide-show" href="../hospital/hosp_booking_appointment.php"><li class='active'>Booking Appointment</li></a>
            </ul>
        </div>

        <div class="main-content">
            <div class="container2">
                <h1>Patient Appointment</h1>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
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
                                $hospital_name = $_SESSION['name'];
                                $apoint_query = "SELECT * FROM appointments WHERE appoint_hosp_name = '$hospital_name'";
                                $appoint_res = mysqli_query($conn, $apoint_query);
                                if (mysqli_num_rows($appoint_res) > 0) {
                                    while ($appoint_row = mysqli_fetch_assoc($appoint_res)) {
                                        echo "<tr>
                                            <td>$appoint_row[appoint_name]</td>
                                            <td>$appoint_row[appoint_fname]</td>
                                            <td>$appoint_row[appoint_number]</td>
                                            <td>$appoint_row[service_type]</td>
                                            <td>$appoint_row[appointment_date]</td>
                                            <td>$appoint_row[appoint_age]</td>
                                            <td>$appoint_row[appoint_gender]</td>
                                        </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7'>No appointments found</td></tr>";
                                }
                            ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <footer>
        &copy; Vaccines All rights reserved.
    </footer>
</body>
</html>
