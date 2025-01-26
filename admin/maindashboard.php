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

<!-- hosp counts -->
<?php
$hosp_count = "SELECT COUNT(id) AS Hosp_count FROM users WHERE role = 'hospital'";
$hosp_count_res = mysqli_query($conn,$hosp_count);
$hosp_count_row = mysqli_fetch_assoc($hosp_count_res);
?>

<!-- patients counts -->
<?php
$patient_count = "SELECT COUNT(id) AS patient_count FROM users WHERE role = 'patient'";
$patient_count_res = mysqli_query($conn,$patient_count);
$patient_count_row = mysqli_fetch_assoc($patient_count_res);
?>

<!-- appointments counts -->
<?php
$appoint_count = "SELECT COUNT(id) AS appoint_count FROM appointments";
$appoint_count_res = mysqli_query($conn,$appoint_count);
$appoint_count_row = mysqli_fetch_assoc($appoint_count_res);
?>

<!-- vaccine counts -->
<?php
$vaccine_count = "SELECT COUNT(id) AS vaccine_count FROM vaccine";
$vaccine_count_res = mysqli_query($conn,$vaccine_count);
$vaccine_count_row = mysqli_fetch_assoc($vaccine_count_res);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- css file -->
    <link rel="stylesheet" href="../style/admin.css">
    <title>Admin- Vaccine Test</title>
</head>

<body>
    <!-- Header -->
    <div class="header">
    <a class="navbar-brand" >
  <span id="1">
         <h1> Vaccine  </h1>
            </span>
          </a>

        <span>
            <a href="../pages/logout.php" style="text-decoration: none;">
                <button id="logout">Logout
                    <img src="../assets/icons8-logout-100.png" alt="Logout Icon" width="25px" height="25px">
                </button>
            </a>
        </span>
    </div>

    <!-- Main Content -->
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <ul>
                <a href="../admin/maindashboard.php"><li class="active">Main Dashboard</li></a>
                <a href="../admin/patients-details.php"><li>Patient Details</li></a>
                <a href="../admin/reports-of-test.php"><li>Reports of Tests/Vaccination</li></a>
                <a href="../admin/list-of-vaccine.php"><li>List of Vaccines</li></a>
                <a href="../admin/approval-for-hosp.php"><li>Approval from Hospitals</li></a>
                <a href="../admin/list-of-hosp.php"><li>List of hospitals</li></a>
                <a href="../admin/booking-details.php"><li>Booking Details</li></a>
            </ul>
        </div>

        <!-- Main Dashboard Content -->
        <div class="main-content">
            <div class="main-dashboard">
                <!-- Card 1: Patients -->
                <div class="card-dash">
                    <div class="icon">👥</div>
                    <h3>Patients</h3>
                    <div class="number" id="patients-number">0</div>
                    <p>Number of patients registered</p>
                </div>

                <!-- Card 2: Hospitals -->
                <div class="card-dash">
                    <div class="icon">🏥</div>
                    <h3>Hospitals</h3>
                    <div class="number" id="hospitals-number">0</div>
                    <p>Number of hospitals connected</p>
                </div>

                <!-- Card 3: Vaccines -->
                <div class="card-dash">
                    <div class="icon">💉</div>
                    <h3>Vaccines</h3>
                    <div class="number" id="vaccines-number">0</div>
                    <p>Vaccines administered</p>
                </div>

                <!-- Card 4: Bookings -->
                <div class="card-dash">
                    <div class="icon">📅</div>
                    <h3>Bookings</h3>
                    <div class="number" id="bookings-number">0</div>
                    <p>Appointments booked</p>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer -->
    <footer>
        &copy;  Vaccines All rights reserved.
    </footer>

    <!-- Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- JavaScript for Number Animation -->
    <script>
        function animateValue(id, start, end, duration) {

            if (end === 0) {
            document.getElementById(id).innerHTML = 0;
            return;
        }
            let range = end - start;
            let current = start;
            let increment = end > start ? 1 : -1;
            let stepTime = Math.abs(Math.floor(duration / range));
            let obj = document.getElementById(id);

            let timer = setInterval(function() {
                current += increment;
                obj.innerHTML = current;
                if (current === end) {
                    clearInterval(timer);
                }
            }, stepTime);
        }

        // Faster and smoother number animation 
        animateValue("patients-number", 0, <?php echo $patient_count_row['patient_count']; ?>, 1000); 
        animateValue("hospitals-number", 0, <?php echo $hosp_count_row['Hosp_count']; ?>, 1000);  
        animateValue("vaccines-number", 0, <?php echo $vaccine_count_row['vaccine_count']; ?>, 1000);  
        animateValue("bookings-number", 0, <?php echo $appoint_count_row['appoint_count']; ?>, 1000);
    </script>

</body>

</html>
