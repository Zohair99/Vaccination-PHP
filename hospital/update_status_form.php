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
<!-- get data from id -->
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $upd_query = "SELECT * FROM update_vaccine WHERE id = $id ";
    $upd_res = mysqli_query($conn,$upd_query);
    $upd_row = mysqli_fetch_assoc($upd_res);
}

?>

<!-- update vaccine status -->
<?php
    if (isset($_POST['update_vaccine_result'])) {
    $vaccination_dose = $_POST['vaccination_dose'];
    $vaccination_status = $_POST['vaccination_status'];
    $vaccination_result = $_POST['vaccination_result'];

    $vaccine_result_query = "UPDATE update_vaccine SET vaccine_dose='$vaccination_dose', vaccine_status='$vaccination_status', vaccine_result = '$vaccination_result' WHERE id = $id ";

    $vaccine_result_res = mysqli_query($conn, $vaccine_result_query);

        if ($vaccine_result_res) {
            header('location:../hospital/update_vaccination_status.php'); 
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital- Vaccine Test</title>
     <!-- css file -->
    <link rel="stylesheet" href="../styling/hospital.css">

</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital- Covid Test</title>
    <link rel="stylesheet"  href="../style/hospital11.css">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- Same header as above -->
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
                <a style='pointer-events: none;' href="../hospital/patientRegister_vaccines.php"><li>Register for Vaccines</li></a>
                <a style='pointer-events: none;' class="hide-show" href="../hospital/patient_details.php"><li>Patient Details</li></a>
                <a style='pointer-events: none;' class="hide-show" href="../hospital/requests_patients.php"><li>Requests from Patients</li></a>
                <a style='pointer-events: none;' class="hide-show" href="../hospital/update_test_result.php"><li>Update Vaccine Test Result</li></a>
                <a style='pointer-events: none;' class="hide-show" href="../hospital/update_vaccination_status.php"><li>Update Vaccination Status</li></a>
                <a style='pointer-events: none;' class="hide-show" href="../hospital/hosp_booking_appointment.php"><li>Booking Appointment</li></a>
            </ul>
        </div>

        <div class="main-content">
        <div class="appointment-section">
                                <h1>Update vaccination Status</h1>
                                <form class="appointment-form" method="post">
                                    <input type="text" placeholder="Hosp Name" readonly name='vaccine_hosp' value='<?php echo $upd_row['vaccine_hosp']?>'>
                                    <input type="text" placeholder="Patient Name" readonly name='patient_name' value='<?php echo $upd_row['patient_name']?>'>                       
                                    <input type="number" value='<?php echo $upd_row['patient_age']?>'  readonly id="patient_age" placeholder="patient age" name="patient_age"  required>
                                    <input readonly value='<?php echo $upd_row['patient_gender']?>' name="patient_gender" placeholder="patient gender"  id="patient_gender" required >
                                    <input readonly name="patient_no" value='<?php echo $upd_row['patient_no']?>' placeholder="patient no"  id="patient_no" required >
                                    <input readonly  value='<?php echo $upd_row['patient_blood_type']?>' name="patient_blood_type" placeholder="patient blood_type"  id="patient_blood_type" required >
                                    <input type="date" value='<?php echo $upd_row['vaccine_date']?>' name="vaccine_status_date"  required >
                                    <input type="text" value='<?php echo $upd_row['vaccine_name']?>' placeholder="Vaccination Name" name="vaccination_name" readonly value=''>
                                    <select  name="vaccination_dose" required>
                                        <option value='<?php echo $upd_row['vaccine_dose']?>'hidden><?php echo $upd_row['vaccine_dose']?></option>
                                        <option value="1 Dose">1 Dose</option>
                                        <option value="2 Dose">2 Dose</option>
                                    </select>
                                    <select name="vaccination_status" required>
                                        <option value="<?php echo $upd_row['vaccine_status']?>" hidden><?php echo $upd_row['vaccine_status']?></option>
                                        <option value="Not Vaccinated">Not Vaccinated</option>
                                        <option value="Partially Vaccinated">Partially Vaccinated</option>
                                        <option value="Fully Vaccinated">Fully Vaccinated</option>
                                    </select>
                                    <select name="vaccination_result" required>
                                        <option hidden><?php echo isset($upd_row['vaccine_result']) ? $upd_row['vaccine_result'] : "Update Result"; ?></option>
                                        <option value="negative">Negative</option>
                                        <option value="positive">Positive</option>
                                    </select>

                                    <button type="submit" name="update_vaccine_result">Update Vaccine Result</button>
                                </form>
                </div>       
        </div>

    </div>

    <footer>
        &copy;  Vaccines All rights reserved.
    </footer>
</body>
</html>