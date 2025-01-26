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

<!-- update accept or reject patient -->
<?php
    if (isset($_POST['update_action'])) {
    $id = $_POST['id'];
    $action = $_POST['action'];
    $update_action = "UPDATE users SET action='$action' WHERE id = $id ";

    $update_query = mysqli_query($conn, $update_action);

        if ($update_query) {
            header('location:../hospital/requests_patients.php'); 
            exit;
        }
        else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
<link rel="stylesheet"  href="../style/hospital11.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital- Vaccine Test</title>
    
</head>

<body>
<div class="header" style="display: flex; flex-direction: row; justify-content: space-between;">    <a class="navbar-brand" >
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
                <a class="hide-show" href="../hospital/requests_patients.php"><li class='active'>Requests from Patients</li></a>
                <a class="hide-show" href="../hospital/update_test_result.php"><li>Update Vaccine Test Result</li></a>
                <a class="hide-show" href="../hospital/update_vaccination_status.php"><li>Update Vaccination Status</li></a>
                <a class="hide-show" href="../hospital/hosp_booking_appointment.php"><li>Booking Appointment</li></a>
            </ul>
        </div>

            <div class="main-content">
               <div class="container2">
                    <h1>Vaccination Requets</h1>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Addres</th>
                                    <th>Number</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    $hospital_id = $_SESSION['id'];

                                    $patient_query = "SELECT * FROM users WHERE role = 'Patient' AND selected_hosp_id = $hospital_id";
                                    $patient_res = mysqli_query($conn, $patient_query);

                                    if (mysqli_num_rows($patient_res) > 0) {
                                        while ($patient_row = mysqli_fetch_assoc($patient_res)) {
                                            $id = $patient_row['id'];
                                            echo "
                                            <tr>
                                                <td>$patient_row[name]</td>
                                                <td>$patient_row[email]</td>
                                                <td>$patient_row[address]</td>
                                                <td>$patient_row[phone]</td>
                                                <td>$patient_row[age]</td>
                                                <td>$patient_row[gender]</td>
                                                <td>
                                                    <form method='post'>
                                                        <input type='hidden' name='id' value='$id'>
                                                        <select name='action' id='select-action' required>
                                                            <option value='' hidden>Approved/Reject</option>
                                                            <option value='Approved' ".($patient_row['action'] == 'Approved' ? 'selected' : '').">Approved</option>
                                                            <option value='Reject' ".($patient_row['action'] == 'Reject' ? 'selected' : '').">Reject</option>
                                                        </select>
                                                        <button type='submit' class='btn-action' name='update_action'>Update</button>
                                                    </form>
                                                </td>
                                            </tr>";
                                        }
                                    }
                                    else {
                                        echo "<tr><td colspan='7'>No patients request found</td></tr>";
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
