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
    <title>Hospital- Vaccine Test</title>
     <!-- css file -->
    <link rel="stylesheet"  href="../style/hospital11.css">
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
                <li style='pointer-events: none;'><strong><?php echo $_SESSION["name"];?></strong></li>
                <a href="../hospital/patientRegister_vaccines.php"><li>Register for Vaccines</li></a>
                <a class="hide-show" href="../hospital/patient_details.php"><li>Patient Details</li></a>
                <a class="hide-show" href="../hospital/requests_patients.php"><li>Requests from Patients</li></a>
                <a class="hide-show" href="../hospital/update_test_result.php"><li>Update Vaccine Test Result</li></a>
                <a class="hide-show" href="../hospital/update_vaccination_status.php"><li class='active'>Update Vaccination Status</li></a>
                <a class="hide-show" href="../hospital/hosp_booking_appointment.php"><li>Booking Appointment</li></a>
            </ul>
        </div>

        <div class="main-content">
                <div class="appointment-section">
                    <h1>Update Vaccination Status</h1>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
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
                                        <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                                $hospital_name = $_SESSION['name'];

                                $vaccine_upd = "SELECT * FROM update_vaccine WHERE vaccine_hosp = '$hospital_name' ";
                                $vaccine_res = mysqli_query($conn, $vaccine_upd);

                                if (mysqli_num_rows($vaccine_res) > 0) {

                                    while ($vaccine_row = mysqli_fetch_assoc($vaccine_res)) {
                                        $id = $vaccine_row['id'];
                                        echo "
                                        <tr>
                                            <td>$vaccine_row[patient_name]</td>
                                            <td>$vaccine_row[patient_age]</td>
                                            <td>$vaccine_row[patient_gender]</td>
                                            <td>$vaccine_row[patient_no]</td>
                                            <td>$vaccine_row[patient_blood_type]</td>
                                            <td>$vaccine_row[vaccine_name]</td>
                                            <td>$vaccine_row[vaccine_date]</td>
                                            <td>$vaccine_row[vaccine_dose]</td>
                                            <td>$vaccine_row[vaccine_status]</td>
                                            <td>
                                            ";
                                            ?>
                                            <?php
                                                if (is_null($vaccine_row['vaccine_result'])) {
                                                    echo "Result not available"; 
                                                } else {
                                                    echo $vaccine_row['vaccine_result'];
                                                }
                                            ?>
                                            <?php

                                            echo"
                                            </td>
                                            <td>
                                                <a href='../hospital/update_status_form.php?id=$id'> 
                                                <button class='btn-action'>Update</button>
                                                </a>                                           
                                            </td>
                                        </tr>";
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

    <footer>
        &copy;  Vaccines All rights reserved.
    </footer>
</body>
</html>
