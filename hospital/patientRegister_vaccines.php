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

<!-- hospital aprroval request for admin -->
<?php
    $email_check = $_SESSION['email'];
    $hosp_check = "SELECT * FROM users WHERE email = '$email_check' ";
    $hosp_check_res = mysqli_query($conn, $hosp_check);
    $hosp_check_row  = mysqli_fetch_assoc($hosp_check_res);
    
    if(isset($_POST['hospital-approval-btn'])){
    $hosp_address = $_POST['hosp_address'];
    $hosp_type = $_POST['hosp_type'];
        
        $hosp_query = "UPDATE users SET address='$hosp_address', hosp_type='$hosp_type' WHERE email='$email_check'";

        $hosp_res = mysqli_query($conn,$hosp_query);

        if($hosp_res){
            $_SESSION['address'] = $hosp_address;
             echo "<script>alert('hospital register request submited')</script>";
        }
        else{
                echo "something wrong";
        }

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
                <a href="../hospital/patientRegister_vaccines.php"><li class='active'>Register for Vaccines</li></a>
                <a class="hide-show" href="../hospital/patient_details.php"><li>Patient Details</li></a>
                <a class="hide-show" href="../hospital/requests_patients.php"><li>Requests from Patients</li></a>
                <a class="hide-show" href="../hospital/update_test_result.php"><li>Update Vaccine Test Result</li></a>
                <a class="hide-show" href="../hospital/update_vaccination_status.php"><li>Update Vaccination Status</li></a>
                <a class="hide-show" href="../hospital/hosp_booking_appointment.php"><li>Booking Appointment</li></a>
            </ul>
        </div>

            <!-- hospital request is reject or null other tabs is hide -->
            <?php
                if($_SESSION['action'] == null || $_SESSION['action'] == 'Reject' ){
                    echo "
                     <style>
                    .hide-show{
                        pointer-events: none;
                    }
                  </style>";
                }
                else{
                    echo "
                     <style>
                    .hide-show{
                        pointer-events: auto;
                    }
                  </style>";
                }
            ?>

        <div class="main-content">
            <!-- add inside this div everthing -->

            <h1>Register for Vaccines</h1>
            <div class="card" id="form-hide">
                <!-- request for admin form start -->
                <form id="booking-form" method="post">
                    <input type="text" disabled value="<?php echo "$hosp_check_row[name]"?>"  name="hosp_name" placeholder="Enter Your Hospital Name" required>
                    <input type="email" disabled value="<?php echo "$hosp_check_row[email]"?>"  name="hosp_email" placeholder="Enter Your Hospital email" required>
                    <input type="text" value="<?php echo "$hosp_check_row[phone]"?>"  name="hosp_number" placeholder="Enter Your Hospital Number" required>
                    <input type="text" name="hosp_address"  placeholder="Enter Your Hospital address" required>
                    <select id="service-type" name="hosp_type" required>
                        <option value="" hidden>Select Hospital Type</option>
                        <option value="Government">Government</option>
                        <option value="Private">Private</option>
                    </select>
                    <button type="submit" name="hospital-approval-btn">Register</button>
                </form>
            </div>
                    <!-- approval form hide - show by session -->
                    <?php
                        if($_SESSION["address"]  !== null){
                            echo "
                            <style>
                            #form-hide{
                                display: none;
                            }
                        </style>";
                        }
                        else{
                            echo "
                            <style>
                            #form-hide{
                                display: block;
                            }
                        </style>";
                        }
                    ?>
            <!-- approved/reject message -->
                    <div class="card">
                        <h2>Approval Request</h2>
                        <?php
                            if($_SESSION['action'] == null){
                            echo " <p>Will be displayed soon if approved or reject. </p>";
                            }
                            else{
                                echo "Your Hospital was"." ". $_SESSION['action']." " . "by Admin";
                            }
                        ?>     
                    </div>
                
            <!-- Add your registration form here -->
        </div>
    </div>

    <footer>
        &copy;  Vaccines All rights reserved.
    </footer>
</body>
</html>
