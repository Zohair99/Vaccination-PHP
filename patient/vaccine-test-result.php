<?php
  include '../pages/connect.php';
  session_start();
?>

<?php
  if (!isset($_SESSION['name']) || $_SESSION['user_role'] !== 'Patient')  {
    header("Location:../pages/login.php"); 
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient- Vaccine Test</title>
     <!-- css file -->
     <link rel="stylesheet" href="../style/parent.css">

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
                <a href="../patient/patient-profile.php"><li>My Profile</li></a>
                <a href="../patient/search-hospitals.php"><li>Search for Hospitals</li></a>
                <a href="../patient/request-for-ct.php"><li>Requests for Vaccine Test</li></a>
                <a href="../patient/vaccination-reports.php"><li>Reports of Vaccination</li></a>
                <a href="../patient/book-oppointments.php"><li>Book Oppointment</li></a>
                <a href="../patient/vaccine-test-result.php"><li class="active">Vaccine Test Results</li></a>
            </ul>
        </div>

        <div class="main-content">
                        <div class="container7">
                            <h1>View Results</h1>
                            <div class="table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                        <th>Hospital Name</th>
                                        <th>Patient Name</th>
                                            <th>Vaccine Name</th>
                                            <th>Vaccine Dose</th>
                                            <th>Vaccine Status</th>
                                            <th>Vaccine Result</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                            $patient_id =  $_SESSION['id'];
                                            $vaccine_result = "SELECT * FROM update_vaccine WHERE patient_id = $patient_id ";                                        
                                            $vaccine_result_res = mysqli_query($conn,$vaccine_result);
                                        if(mysqli_num_rows($vaccine_result_res) > 0) {
                                            while ($vaccine_result_row = mysqli_fetch_assoc($vaccine_result_res)) {
                                                echo "
                                                    <tr>
                                                        <td>$vaccine_result_row[vaccine_hosp]</td>
                                                        <td>$vaccine_result_row[patient_name]</td>
                                                        <td>$vaccine_result_row[vaccine_name]</td>
                                                        <td>$vaccine_result_row[vaccine_dose]</td>
                                                        <td>$vaccine_result_row[vaccine_status]</td>
                                                        <td>
                                                             ";
                                                            ?>
                                                            <?php
                                                                if (is_null($vaccine_result_row['vaccine_result'])) {
                                                                    echo "Result not available"; 
                                                                } else {
                                                                    echo $vaccine_result_row['vaccine_result'];
                                                                }
                                                            ?>
                                                        <?php

                                                        echo"
                                                        </td>
                                                    </tr>
                                                ";
                                            }
                                        }
                                        else {
                                            echo "<tr><td colspan='11'>No Vaccination test results available yet.</td></tr>";
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
