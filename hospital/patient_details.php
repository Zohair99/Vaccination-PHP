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
    <style>
    
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital- Vaccine Test</title> 
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
                <a class="hide-show" href="../hospital/patient_details.php"><li class='active'>Patient Details</li></a>
                <a class="hide-show" href="../hospital/requests_patients.php"><li>Requests from Patients</li></a>
                <a class="hide-show" href="../hospital/update_test_result.php"><li>Update Vaccine Test Result</li></a>
                <a class="hide-show" href="../hospital/update_vaccination_status.php"><li>Update Vaccination Status</li></a>
                <a class="hide-show" href="../hospital/hosp_booking_appointment.php"><li>Booking Appointment</li></a>
            </ul>
        </div>

        <div class="main-content">
            <div class="container6">
                    <h1>Patients Approval Status</h1>
                    <!-- Approved patient Table -->
                    <h2 style="color: rgb(0, 234, 255); margin-bottom:0.5em;">Approved Patients</h2>
                    <div class="table-responsive approved-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Number</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                </tr>
                            </thead>
                            <tbody>                           
                                <?php
                                        $hospital_id = $_SESSION['id'];
                                        $approved_query = "SELECT * FROM users WHERE role = 'Patient' AND action = 'Approved' AND selected_hosp_id = $hospital_id";
                                        $approved_res = mysqli_query($conn, $approved_query);
                                        
                                        if (mysqli_num_rows($approved_res) > 0) {
                                            while ($approved_row = mysqli_fetch_assoc($approved_res)) {
                                                echo "
                                                <tr>
                                                    <td>$approved_row[name]</td>
                                                    <td>$approved_row[email]</td>
                                                    <td>$approved_row[address]</td>
                                                    <td>$approved_row[phone]</td>
                                                    <td>$approved_row[age]</td>
                                                    <td>$approved_row[gender]</td>
                                                </tr>
                                                ";
                                            }
                                        } else {
                                            echo "<tr><td colspan='6'>No approved patients found</td></tr>";
                                        }
                                        
                                ?>
                            </tbody>
                        </table>
                    </div>
            
                    <!-- Not Approved Hospitals Table -->
                    <h2 style="color: red; margin-top:0.5em; margin-bottom:0.5em;">Not Approved Patients</h2>
                    <div class="table-responsive not-approved-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Number</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $hospital_id = $_SESSION['id'];
                                        $reject_query = "SELECT * FROM users WHERE role = 'Patient' AND action = 'Reject' AND selected_hosp_id = $hospital_id";
                                        $reject_res = mysqli_query($conn, $reject_query);
                                        
                                        if (mysqli_num_rows($reject_res) > 0) {
                                            while ($reject_row = mysqli_fetch_assoc($reject_res)) {
                                                echo "
                                                <tr>
                                                    <td>$reject_row[name]</td>
                                                    <td>$reject_row[email]</td>
                                                    <td>$reject_row[address]</td>
                                                    <td>$reject_row[phone]</td>
                                                    <td>$reject_row[age]</td>
                                                    <td>$reject_row[gender]</td>
                                                </tr>
                                                ";
                                            }
                                        } 
                                        else {
                                            echo "<tr><td colspan='6'>No rejected patients found</td></tr>";
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
