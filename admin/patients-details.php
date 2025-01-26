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
                <a href="../admin/patients-details.php"><li class="active">Patient Details</li></a>
                <a href="../admin/reports-of-test.php"><li>Reports of Tests/Vaccination</li></a>
                <a href="../admin/list-of-vaccine.php"><li>List of Vaccines</li></a>
                <a href="../admin/approval-for-hosp.php"><li>Approval from Hospitals</li></a>
                <a href="../admin/list-of-hosp.php"><li>List of hospitals</li></a>
                <a href="../admin/booking-details.php"><li>Booking Details</li></a>
            </ul>
        </div>

        <div class="main-content">
                <div class="container6">
                    <h1>Patients Approval Status</h1>
            
                    <!-- Approved Hospitals Table -->
                    <h2 style="color: rgb(0, 187, 255); margin-bottom:0.5em;">Approved Patients</h2>
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
                                        $approved_query = "SELECT * FROM users WHERE role = 'Patient' AND action = 'Approved' ";
                                        $approved_res = mysqli_query($conn,$approved_query);
                                        if($approved_res && mysqli_num_rows($approved_res)){
                                            while($approved_row = mysqli_fetch_assoc($approved_res)){
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
                                        }
                                        else{
                                            echo "<tr><td colspan='6'>No approved patients found</td>";
                                        }
                                ?>
                            </tbody>
                        </table>
                    </div>
            
                    <!-- Not Approved Hospitals Table -->
                    <h2 style="color: red; margin-bottom:0.5em;">Not Approved Patients</h2>
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
                                            $reject_query = "SELECT * FROM  users WHERE role = 'Patient' AND action = 'Reject' ";
                                            $reject_res = mysqli_query($conn,$reject_query);
                                            if($reject_res && mysqli_num_rows($reject_res)){
                                                while($reject_row = mysqli_fetch_assoc($reject_res)){
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
                                            else{
                                                echo "<tr><td colspan='6'>No rejected patients found</td>";
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
