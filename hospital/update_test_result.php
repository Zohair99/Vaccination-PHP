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

<!-- update patient vaccination result -->
<?php
if (isset($_POST['submit_vaccination_status'])) {
    $vaccine_hosp = $_POST['vaccine_hosp'];
    $patient_name = $_POST['patient_name'];
    $patient_age = $_POST['patient_age'];
    $patient_gender = $_POST['patient_gender'];
    $patient_no = $_POST['patient_no'];
    $patient_blood_type = $_POST['patient_blood_type'];
    $vaccination_date = $_POST['vaccine_status_date'];
    $vaccine_name = $_POST['vaccine_name'];
    $vaccination_dose = $_POST['vaccination_dose'];
    $vaccination_status = $_POST['vaccination_status'];
    $patient_id = $_POST['patient_id'];

    $patient_check = "SELECT * FROM update_vaccine WHERE patient_id = '$patient_id'";
    $patient_res = mysqli_query($conn, $patient_check);

    if(mysqli_num_rows($patient_res)>0){
        echo "<script>alert('patient result is already created')</script>";
    }
    else{
        $insert_query = "INSERT INTO update_vaccine  VALUES (null, '$vaccine_hosp', '$patient_name', '$patient_age', '$patient_gender', '$patient_no', '$patient_blood_type', '$vaccination_date', '$vaccine_name', '$vaccination_dose', '$vaccination_status','$patient_id', null)";

        $up_vaccine = mysqli_query($conn, $insert_query);
        if ($up_vaccine) {
            echo "<script>alert('Vaccination Status Updated successfully!')</script>";
        } 
        else {
            echo "<script>alert('Vaccination Status Not Updated successfully!')</script>";
        }
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
    <link rel="stylesheet"  href="../style/hospital11.css">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                <a class="hide-show" href="../hospital/update_test_result.php"><li class='active'>Update Vaccine Test Result</li></a>
                <a class="hide-show" href="../hospital/update_vaccination_status.php"><li>Update Vaccination Status</li></a>
                <a class="hide-show" href="../hospital/hosp_booking_appointment.php"><li>Booking Appointment</li></a>
            </ul>
        </div>

        <div class="main-content">
                           <div class="appointment-section">
                                <h1>Update Vaccination Test Result</h1>
                                <form class="appointment-form" method="post">
                                    <input type="text" readonly name='vaccine_hosp' value='<?php echo $_SESSION['name']?>'>
                                    <select name="patient_name" id="patient_name" required>
                                    <option value="" hidden>Select patient Name</option>
                                        <?php
                                                $hospital_id = $_SESSION['id'];

                                                $patient_vaccine = "SELECT * FROM users WHERE role = 'Patient' AND action = 'Approved' AND selected_hosp_id = $hospital_id";
                                                $patient_vaccine_result = mysqli_query($conn, $patient_vaccine);

                                                if ($patient_vaccine_result && mysqli_num_rows($patient_vaccine_result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($patient_vaccine_result)) {
                                                        echo "<option value='$row[name]'>$row[name]</option>";
                                                    }
                                                }
                                                else {                                      
                                                    echo "<option disabled>No approved patients for vaccination reports</option>";
                                                }
                                        ?>
                                    </select>                           
                                    <input type="hidden"  id="patient_id" placeholder="patient id" name="patient_id"  required>
                                    <input type="number"  readonly id="patient_age" placeholder="patient age" name="patient_age"  required>
                                    <input readonly name="patient_gender" placeholder="patient gender"  id="patient_gender" required >
                                    <input readonly name="patient_no" placeholder="patient no"  id="patient_no" required >
                                    <input readonly name="patient_blood_type" placeholder="patient blood_type"  id="patient_blood_type" required >
                                    <input type="date" name="vaccine_status_date"  required >

                                    <select name="vaccine_name" required>
                                        <option value="" hidden>Select Vaccination name</option>
                                        <?php
                                         $vaccine_name_query = "SELECT * FROM vaccine WHERE action = 'available' ";
                                         $vaccine_name_res = mysqli_query($conn,$vaccine_name_query);
                                         if($vaccine_name_res){
                                            while($vaccine_name_row = mysqli_fetch_assoc($vaccine_name_res)){
                                             echo "<option value='$vaccine_name_row[vaccine_name]'>$vaccine_name_row[vaccine_name]</option>";
                                            }
                                         }
                                        ?>
                                    </select>
                                    
                                    <select name="vaccination_dose" required>
                                        <option value="" hidden>Select Vaccination Dose</option>
                                        <option value="1 Dose">1 Dose</option>
                                        <option value="2 Dose">2 Dose</option>
                                    </select>
                                    <select name="vaccination_status" required>
                                        <option value="" disabled selected>Select Vaccination Status</option>
                                        <option value="Not Vaccinated">Not Vaccinated</option>
                                        <option value="Partially Vaccinated">Partially Vaccinated</option>
                                        <option value="Fully Vaccinated">Fully Vaccinated</option>
                                    </select>

                                    <button type="submit" name="submit_vaccination_status">Update Vaccine Status</button>
                                </form>
                                <div id="update_response"></div>
                            </div>
        </div>

    </div>

    <footer>
        &copy; 2019 Covid-Test All rights reserved.
    </footer>


    <script>
         // patient detail data from selected field for vaccine update

         $(document).ready(function() {
        $('#patient_name').change(function() {
        var name = $(this).val();  // Get the selected patient's ID

        if (name) {
            $.ajax({
                url: '../hospital/updatevaccine.php', // PHP file to fetch patient data
                type: 'POST',
                data: {name: name},
                success: function(response) {
                    // Assuming response contains JSON data
                    var patientData = JSON.parse(response);
                    $('#patient_age').val(patientData.age); // Populate age input
                    $('#patient_gender').val(patientData.gender); // Populate gender select
                    $('#patient_no').val(patientData.phone);
                    $('#patient_blood_type').val(patientData.blood_type);
                    $('#patient_id').val(patientData.id);
                },
                error: function() {
                    $('#patient_data').html('Error fetching data.');
                }
            });
        } else {
            $('#patient_age').val(''); // Clear the input if no patient is selected
            $('#patient_gender').val('');
            $('#patient_no').val('');
            $('#patient_blood_type').val('');
            $('#patient_id').val('');

        }
    });
});
    </script>
</body>
</html>
