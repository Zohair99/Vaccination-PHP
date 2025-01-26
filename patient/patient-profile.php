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

<!-- update patient profile  -->
<?php
      $email_upd = $_SESSION['email'];
      $query = "SELECT * FROM users WHERE email = '$email_upd' ";
      $con_query = mysqli_query($conn,$query);
      $upd_res = mysqli_fetch_array($con_query);

        if(isset($_POST['update-profile'])){
                $id = $_POST['id'];
                $update_name = $_POST['update_name'];
                $update_number = $_POST['update_number'];
                $update_address = $_POST['update_address'];
                $update_age = $_POST['update_age'];
                $update_gender = $_POST['update_gender'];
                $update_blood_type = $_POST['update_blood_type'];

                if (isset($_FILES['profile']['name']) && $_FILES['profile']['name']  !== "") {
                    $profile = $_FILES['profile']['name'];
                    $profile_tmp = $_FILES['profile']['tmp_name'];
                    $path = "uploads/" . $profile;
                    move_uploaded_file($profile_tmp,$path);
                }
                else {
                    $path = $upd_res[11];
                }   
        
                $update_profile = "UPDATE users SET name='$update_name', phone='$update_number', address = '$update_address', age = '$update_age', gender = '$update_gender', blood_type = '$update_blood_type', profile = '$path' WHERE id = $id ";
                $update_profile_res = mysqli_query($conn,$update_profile);

                if ($update_profile_res) {
                    $_SESSION['profile'] = $path;
                    header('location:../patient/patient-profile.php'); 
                    exit;
                }
                else {
                    echo "Error updating record: " . mysqli_error($con);
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
                <a href="../patient/patient-profile.php"><li class="active">My Profile</li></a>
                <a href="../patient/search-hospitals.php"><li>Search for Hospitals</li></a>
                <a href="../patient/request-for-ct.php"><li>Requests for Vaccine Test</li></a>
                <a href="../patient/vaccination-reports.php"><li>Reports of Vaccination</li></a>
                <a href="../patient/book-oppointments.php"><li>Book Oppointment</li></a>
                <a href="../patient/vaccine-test-result.php"><li>Vaccine Test Results</li></a>
            </ul>
        </div>

        <div class="main-content">

                <div class="profile-container">
                    <div class="profile-header">
                            <!-- profile img div -->
                            <div class="profile-image">
                                <?php
                                  if($_SESSION['profile'] !== null){
                                   echo " <img src=' $_SESSION[profile]'>";
                                  }
                                  else{
                                    echo "<img src='../assets/noprf.webp'>";
                                  }

                                ?>
                                <button class="add-image-button" id="updateimageBtn">+</button>
                            </div>

                            <a href="">
                                <button type="submit" class='appointment-btn' id="updateProfileBtn" >Update Profile</button>
                            </a>
                    </div>
                </div>

                <div class="profile-container" >            
                    <!-- profile detials  -->
                    <div class="profile-details">
                        <h2><?php echo $upd_res[1]?></h2>
                        <p><span class="label">Email:</span><?php echo $upd_res[2]?></p>
                        <p><span class="label">Phone:</span> <?php echo $upd_res[5]?></p>
                        <p><span class="label">Address:</span> <?php echo $upd_res[7]?></p>
                        <p><span class="label">Age:</span> <?php echo $upd_res[8]?></p>
                        <p><span class="label">Gender:</span> <?php echo $upd_res[9]?></p>
                    </div>                        
                </div>

                <div class="profile-container">
                    <?php
                        $patient_id = $_SESSION['id'];
                        $vaccine_query = "SELECT * FROM update_vaccine WHERE patient_id = $patient_id";
                        $vaccine_res = mysqli_query($conn, $vaccine_query);
                    ?>

                    <div class="medical-info">
                        <h3>Medical Information</h3>
                        <?php

                        if($vaccine_res && mysqli_num_rows($vaccine_res)){
                            $vaccine_row = mysqli_fetch_assoc($vaccine_res);
                            $vaccine_status = !is_null($vaccine_row['vaccine_status']) ? $vaccine_row['vaccine_status'] : "Medical info not available";
                            $vaccine_name = !is_null($vaccine_row['vaccine_name']) ? $vaccine_row['vaccine_name'] : "Medical info not available";
                            $vaccine_dose = !is_null($vaccine_row['vaccine_dose']) ? $vaccine_row['vaccine_dose'] : "Medical info not available";
                            $vaccine_result = !is_null($vaccine_row['vaccine_result']) ? $vaccine_row['vaccine_result'] : "Result not available";
                            $blood_type = isset($upd_res[10]) ? $upd_res[10] : "Medical info not available";
                        echo "
                             <p><span class='label'> Vaccination Status:</span> $vaccine_status ($vaccine_name)</p>
                             <p><span class='label'>Vaccine Dose:</span> $vaccine_dose</p>
                             <p><span class='label'>Vaccine Result:</span> $vaccine_result</p>
                             <p><span class='label'>Blood Type:</span> $blood_type</p>
                            ";
                        }
                        else{
                            echo "
                            <p><span class='label'>Vaccination Status:</span> Medical info not available</p>
                            <p><span class='label'>Vaccine Dose:</span>  Medical info not available</p>
                            <p><span class='label'>Vaccine Result:</span>  Medical info not available</p>
                            <p><span class='label'>Blood Type:</span> Medical info not available </p>
                            ";
                        }
                           
                             
                        ?>
                    </div>
                </div>


                <!-- Modal for Updating Profile -->
                <div id="updateProfileModal" class="modal">
                    <div class="modal-content">
                        <span class="close" id="closeModal">&times;</span>
                        <h2>Update Profile</h2>
                        <form method="post" enctype="multipart/form-data">
                            <input type='hidden' name='id' value='<?php echo$upd_res[0]?>'>
                            <input type="file" name="profile" value='<?php echo $upd_res[11]?>'>
                                <input type="text"   name="update_name" value="<?php echo$upd_res[1]?>" placeholder="Update Name" required>
                                <input type="text" disabled  name="update_name" value="<?php echo$upd_res[2]?>" placeholder="Update Name" required>
                                <input type="tel"  name="update_number" value="<?php echo$upd_res[5]?>" placeholder="Update Name" required>
                                <input type="text" name="update_address" value="<?php echo $upd_res[7]?>" placeholder="Update Address" >
                                <input type="number" name="update_age" value="<?php echo $upd_res[8]?>" placeholder="Update Age" >
                            <select name="update_gender" id="">
                                <option hidden value="<?php echo $upd_res[9]?>"><?php echo $upd_res[9]?></option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                                <input type="text" value="<?php echo $upd_res[10]?>" name="update_blood_type" placeholder="Update Blood Type" >
                                <button type="submit" name="update-profile">Save Changes</button>
                        </form>
                    </div>
                </div>

        </div>

    </div>

    <footer>
        &copy; Vaccines All rights reserved.
    </footer>

    <script>
        // Modal for updating profile
        var modal = document.getElementById('updateProfileModal');
            var openbtn = document.getElementById('updateProfileBtn');
            var closeBtn = document.getElementById('closeModal');
            var imgbtn = document.getElementById('updateimageBtn');

            // Open modal when 'Update Profile' button is clicked
            openbtn.onclick = function(event) {
                // Prevent any default behavior (important to avoid triggering other events)
                event.preventDefault(); 
                modal.style.display = 'block';
            }

            imgbtn.onclick = function(event) {
                // Prevent any default behavior (important to avoid triggering other events)
                event.preventDefault(); 
                modal.style.display = 'block';
            }
            // Close modal when 'X' button is clicked
            closeBtn.onclick = function() {
                modal.style.display = 'none';
            }

            // Close modal if clicked outside of the modal
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            }

            // Ensure that clicking on modal content doesn't close the modal
            modal.querySelector('.modal-content').onclick = function(event) {
                event.stopPropagation();
            }

    </script>
</body>
</html>
