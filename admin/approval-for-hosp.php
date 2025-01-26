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

    <!-- update accept or reject hospitals -->
    <?php
    if (isset($_POST['update_action'])) {
    $id = $_POST['id'];
    $action = $_POST['action'];
    $update_action = "UPDATE users SET action='$action' WHERE id = $id ";

    $update_query = mysqli_query($conn, $update_action);

        if ($update_query) {
            header('location:../admin/approval-for-hosp.php'); 
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
                    <a href="../admin/list-of-vaccine.php"><li >List of Vaccines</li></a>
                    <a href="../admin/approval-for-hosp.php"><li class="active">Approval from Hospitals</li></a>
                    <a href="../admin/list-of-hosp.php"><li>List of hospitals</li></a>
                    <a href="../admin/booking-details.php"><li>Booking Details</li></a>
                </ul>
            </div>

            <div class="main-content">
            <div class="container5">
                        <h1>Approval Hospital Login</h1>
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Hospital Name</th>
                                        <th>Hospital Email</th>
                                        <th>Hospital Address</th>
                                        <th>Hospital Number</th>
                                        <th>Hospital Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $hosp_query = "SELECT * FROM users WHERE role = 'Hospital' ";
                                    $hospital_res = mysqli_query($conn,$hosp_query);
                                    if($hospital_res && mysqli_num_rows($hospital_res)){
                                        while($hosp_row = mysqli_fetch_assoc($hospital_res)){
                                            $id = $hosp_row['id'];
                                            echo "
                                            <tr>
                                            <td>$hosp_row[name]</td>
                                            <td>$hosp_row[email]</td>
                                            <td>$hosp_row[address]</td>
                                            <td>$hosp_row[phone]</td>
                                            <td>$hosp_row[hosp_type]</td>
                                            <td>
                                            <form method='post'>
                                            <input type='hidden' name='id' value='$id'>
                                                <select name='action' id='select-action' required>
                                                <option value='' hidden>Approved/Reject</option>
                                                <option value='Approved' ".($hosp_row['action'] == 'Approved' ? 'selected' : '').">Approved</option>
                                                <option value='Reject' ".($hosp_row['action'] == 'Reject' ? 'selected' : '').">Reject</option>
                                                </select>
                                            <button type='submit' class ='btn-action' name='update_action' >
                                            update
                                            </button>
                                            </form>
                                            </td>
        
                                        </tr>";
                                        }
                                    }
                                    else{
                                        echo "<tr><td colspan='6'>No approved patients found</td>";
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
