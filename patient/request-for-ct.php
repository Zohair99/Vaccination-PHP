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

<!-- patient request approval for hospital -->
<?php

    $email_check = $_SESSION['email'];

    $patient_check = "SELECT * FROM users WHERE email = '$email_check' ";
    $patient_check_res = mysqli_query($conn, $patient_check);
    $patient_check_row  = mysqli_fetch_assoc($patient_check_res);
 
    if(isset($_POST['pateint-approvel-btn'])){
    $patient_address = $_POST['patient_address'];
    $patient_age = $_POST['patient_age'];
    $patient_gender = $_POST['patient_gender'];
    $selected_hosp = $_POST['selected_hosp'];


            $patient_query = "UPDATE users SET address='$patient_address', age='$patient_age', gender='$patient_gender', selected_hosp_id='$selected_hosp' WHERE email='$email_check'";

            $patient_res = mysqli_query($conn,$patient_query);


            if($patient_res){
                $_SESSION['address'] = $patient_address;
                echo "<script>alert('Pateint  request submited')</script>";
            }
            else{
                echo "something wrong";
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
                <a class="hide-show" href="../patient/patient-profile.php"><li>My Profile</li></a>
                <a class="hide-show" href="../patient/search-hospitals.php"><li>Search for Hospitals</li></a>
                <a  href="../patient/request-for-ct.php"><li class="active">Requests for Vaccine Test</li></a>
                <a class="hide-show" href="../patient/vaccination-reports.php"><li>Reports of Vaccination</li></a>
                <a class="hide-show" href="../patient/book-oppointments.php"><li>Book Oppointment</li></a>
                <a class="hide-show" href="../patient/vaccine-test-result.php"><li>Vaccine Test Results</li></a>
            </ul>
        </div>

            <!-- patient request is reject or null other tabs is hide -->
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

        <div class="main-content" style="margin-bottom: 0px;">

                <div class="card" id="form-hide">
                    <h1>Request for Vaccines Approval</h1>
                    <form id="booking-form" method="post">
                        <input type="text" disabled value="<?php echo $patient_check_row['name'] ?>"  name="name" placeholder="Enter Your  Name" required>
                        <input type="email" disabled value="<?php echo $patient_check_row['email'] ?>"  name="email" placeholder="Enter Your email" required>
                        <input type="text" value="<?php echo $patient_check_row['phone'] ?>"  name="number" placeholder="Enter Your Number" required>
                        <input type="text" name="patient_address" placeholder="Enter Your address" required>
                        <select  name="selected_hosp" required>
                        <option value="" hidden>Select Hospital</option>
                            <?php
                            $hosp_app = "SELECT * FROM users WHERE role = 'Hospital' AND action = 'Approved' ";
                            $hosp_res = mysqli_query($conn,$hosp_app);
                            while($hosp_row = mysqli_fetch_assoc($hosp_res)){
                                echo "
                                <option value='$hosp_row[id]'>$hosp_row[name]</option>
                                ";
                            }
                            ?>
                        </select>
                        <input type="number"  name="patient_age" placeholder="Enter Your age" required>
                        <select  name="patient_gender" required>
                            <option value="" hidden>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <button type="submit" name="pateint-approvel-btn">Register</button>
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

                <!-- response from hospital approve or reject -->
                <?php
                    $patient_id = $_SESSION['id'];

                    $patient_register = "SELECT * FROM users WHERE role = 'Patient' AND id = $patient_id";
                    $patient_register_res = mysqli_query($conn, $patient_register);

                    if($patient_register_res && mysqli_num_rows($patient_register_res) > 0){

                        $patient_register_row = mysqli_fetch_assoc($patient_register_res);

                        $hosp_id = $patient_register_row['selected_hosp_id'];

                        if(!empty($hosp_id)){

                            $hosp_query = "SELECT * FROM users WHERE role = 'Hospital' AND id = $hosp_id";
                            $hosp_query_res = mysqli_query($conn, $hosp_query);

                            if($hosp_query_res && mysqli_num_rows($hosp_query_res) > 0){
                                $hosp_query_row = mysqli_fetch_assoc($hosp_query_res);
                            }
                            else {
                                $hosp_query_row['name'] = "Hospital not found."; 
                            }
                        }
                        else {
                            $hosp_query_row['name'] = "No hospital assigned.";
                        }
                    }
                    else {
                        echo "Patient not found.";
                    }      
                  
                ?>
                <div class="card">
                    <h1>Approval Request</h1>
                    <?php
                        if($_SESSION['action'] == null){
                        echo " <p>Will be displayed soon if approve or reject. </p>";
                        }
                        else{
                            echo "Your vaccination"." ". $_SESSION['action']." "."by"." ". $hosp_query_row['name'];
                        }
                    ?>                       
                </div>

        </div>
  
        
    </div>

    <footer>
        &copy;  Vaccines All rights reserved.
    </footer>
</body>
</html>
