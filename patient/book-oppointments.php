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

 <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $hosp_app = "SELECT * FROM users WHERE role = 'Hospital' AND id = '$id'";
        $hosp = true;
    }
    else {
        $hosp_app = "SELECT * FROM users WHERE role = 'Hospital' AND action = 'Approved'";     
        $hosp = false;
    }
    $hosp_res = mysqli_query($conn, $hosp_app);
 ?>


<!-- appointment form -->

<?php
          if(isset($_POST['appointment-button'])){
            $appoint_name = $_POST['appoint_name'];
            $appoint_fname = $_POST['appoint_fname'];
            $appoint_age = $_POST['appoint_age'];
            $appoint_number = $_POST['appoint_number'];
            $appoint_gender = $_POST['appoint_gender'];
            $appoint_hospname = $_POST['appoint_hospname'];
            $service_type = $_POST['service_type'];
            $user_id = $_SESSION['id'];

            $appoint_query = "INSERT INTO appointments VALUES (null,'$appoint_name', '$appoint_fname', '$appoint_age', '$appoint_number', '$appoint_gender', '$appoint_hospname', CURRENT_DATE,  '$service_type', $user_id)";
            
            $appoint_res = mysqli_query($conn,$appoint_query);

            if($appoint_res){
                echo "<script> alert('Appointment booked successfully')</script>";
            }
            else{
                echo "<script> alert('Appointment not booked ')</script>";
            }

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
    <a class="navbar-brand"     >
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
                <a href="../patient/vaccination-reports.php"><li >Reports of Vaccination</li></a>
                <a href="../patient/book-oppointments.php"><li class="active">Book Oppointment</li></a>
                <a href="../patient/vaccine-test-result.php"><li>Vaccine Test Results</li></a>
            </ul>
        </div>

        <div class="main-content">

                <div class="containerr">
                    <!-- book appointment form -->
                    <div class="appointment-section">
                        <h1>Book Hospital Appointment</h1>
                        <form class="appointment-form" method="post">
                            <input type="text" name="appoint_name" placeholder="Your Name" required>
                            <input type="text" name="appoint_fname" placeholder="Father Name" required>
                            <input type="number" name="appoint_age" placeholder="Age" required>
                            <input type="tel" name="appoint_number" placeholder="Phone Number" required>
                            <select name="appoint_gender" required>
                                <option value="" hidden>Select Your Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                           
                                <?php
                                if($hosp){
                                    $hosp_row = mysqli_fetch_assoc($hosp_res);
                                    echo " <input type='text' value='$hosp_row[name]' readonly name='appoint_hospname' required>
                                    ";
                                }
                                else{
                                    echo " <select name='appoint_hospname'  required>
                                      <option  hidden>Select Hospital</option>";
                                    while($hosp_row = mysqli_fetch_assoc($hosp_res)){
                                        echo "
                                        <option value='$hosp_row[name]'>$hosp_row[name]</option>
                                        ";
                                      }
                                }
                                ?>
                            </select>
                            <select name="service_type" required>
                                <option value="" hidden>Select Service</option>
                                <option value="COVID-19 Test">COVID-19 Test</option>
                                <option value="General Checkup">General Checkup</option>
                            </select>
                            <button type="submit" name="appointment-button">Book Appointment</button>
                        </form>
                    </div>

                    <!-- My Appointments Section -->

                    <div class="my-appointments-section">
                        <h1 style="margin-bottom:0.5em;">My Appointments</h1>
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
                                        $appoint_id = $_SESSION['id']; 
                                        $appoint_query = "SELECT * FROM appointments WHERE user_id = $appoint_id";
                                        $appoint_res = mysqli_query($conn, $appoint_query);
                                        
                                        if (mysqli_num_rows($appoint_res) > 0) {
                                            while ($appoint_row = mysqli_fetch_assoc($appoint_res)) {
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
                                        else {
                                            echo "<tr><td colspan='7'>No appointments booked</td></tr>";
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
