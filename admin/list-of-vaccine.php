<?php
  include '../pages/connect.php';
session_start();

?>

<?php
  if (!isset($_SESSION['admin_name']) || $_SESSION['admin_name'] !== 'admin')  {
    header("Location:../pages/login.php"); 
    exit;
}
?>

<!-- add vaccines  -->
<?php
if(isset($_POST['add-vaccine-btn'])){
  $vaccine_name = $_POST['vaccine_name'];
  $Manufacturer = $_POST['manufacturer'];
  $vaccine_date = $_POST['vaccine_date'];
  $dose = $_POST['dose'];
  $approved = $_POST['approved'];
   
  $vaccine_query = "INSERT INTO vaccine VALUES (null, '$vaccine_name', '$Manufacturer', '$vaccine_date', '$dose', '$approved', null)";

  $vaccine_res = mysqli_query($conn,$vaccine_query);

  if($vaccine_res){
    echo "<script>alert('vaccine added')</script>";
  }
  else{
    echo "something wrong";
  }

 }
?>

<!-- update available or unavailable vaccines -->
<?php
if (isset($_POST['update_action'])) {
   $id = $_POST['id'];
   $action = $_POST['action'];
   $update_action = "UPDATE vaccine SET action='$action' WHERE id = $id ";

   $update_query = mysqli_query($conn, $update_action);

    if ($update_query) {
        header('location:../admin/list-of-vaccine.php'); 
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
    <title>Admin- Vaccine Test</title>
     <!-- css file -->
    <link rel="stylesheet" href="../style/admin.css">
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
                <a href="../admin/maindashboard.php"><li>Main Dashboard</li></a>
                <a href="../admin/patients-details.php"><li>Patient Details</li></a>
                <a href="../admin/reports-of-test.php"><li>Reports of Tests/Vaccination</li></a>
                <a href="../admin/list-of-vaccine.php"><li class="active">List of Vaccines</li></a>
                <a href="../admin/approval-for-hosp.php"><li>Approval from Hospitals</li></a>
                <a href="../admin/list-of-hosp.php"><li>List of hospitals</li></a>
                <a href="../admin/booking-details.php"><li>Booking Details</li></a>
            </ul>
        </div>

        <div class="main-content">
                    <div class="container7">
                            <div class="card">
                                <h1>Add New Vaccines</h1>
                                <form id="booking-form" method="post">
                                    <input type="text"  name="vaccine_name" placeholder="Vaccine Name" required>
                                    <input type="text"  name="manufacturer" placeholder="Manufacturer" required>
                                    <input type="date" name="vaccine_date" placeholder="Enter date" required>

                                    <select id="service-type" name="dose" required>
                                        <option value="" hidden>Dose Required</option>
                                        <option value="dose-1">1 dose</option>
                                        <option value="dose-2">2 dose</option>
                                    </select>
                                    
                                    <select  name="approved" required>
                                        <option value="" hidden>Approval status</option>
                                        <option value="Approved by WHO">Approved by WHO</option>
                                        <option value="Not Approved by WHO">Not Approved by WHO</option>
                                    </select>
                                    
                                    <button type="submit" name="add-vaccine-btn">Add</button>
                                </form>
                            </div>
                            <h1>List of COVID-19 Vaccines</h1>
                            <div class="table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Vaccine Name</th>
                                            <th>Manufacturer</th>
                                            <th>Date</th>
                                            <th>Doses Required</th>
                                            <th>Approval Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                           $vaccine_show = "SELECT * FROM vaccine";
                                           $vaccine_show_res = mysqli_query($conn,$vaccine_show);
                                           while($vaccine_show_row = mysqli_fetch_assoc($vaccine_show_res)){
                                            $id = $vaccine_show_row['id'];
                                             echo "
                                            <tr>
                                               <td>$vaccine_show_row[vaccine_name]</td>
                                               <td>$vaccine_show_row[manufacturer]</td>
                                               <td>$vaccine_show_row[added_date]</td>
                                               <td>$vaccine_show_row[dose]</td>
                                               <td>$vaccine_show_row[approved]</td>
                                               <td>
                                                    <form method='post'>
                                                        <input type='hidden' name='id' value='$id'>
                                                        <select name='action' id='select-action' required>
                                                            <option value='' hidden>Available/Unavailable</option>
                                                            <option value='available' ".($vaccine_show_row['action'] == 'available' ? 'selected' : '').">Available</option>
                                                            <option value='unavailable' ".($vaccine_show_row['action'] == 'unavailable' ? 'selected' : '').">Unavailable</option>
                                                        </select>
                                                        <button type='submit' class ='btn-action' name='update_action' >
                                                            update
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                               ";
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
