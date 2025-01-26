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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient- Vaccine Test</title>
     <!-- css file -->
     <link rel="stylesheet" href="../style/parent.css">
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
                <a href="../patient/patient-profile.php"><li>My Profile</li></a>
                <a href="../patient/search-hospitals.php"><li class="active">Search for Hospitals</li></a>
                <a href="../patient/request-for-ct.php"><li>Requests for Vaccine Test</li></a>
                <a href="../patient/vaccination-reports.php"><li>Reports of Vaccination</li></a>
                <a href="../patient/book-oppointments.php"><li>Book Oppointment</li></a>
                <a href="../patient/vaccine-test-result.php"><li>Vaccine Test Results</li></a>
            </ul>
        </div>

        <div class="main-content" style="margin-bottom: 0px;">
            <div class="card">

                <div class="container3">
                    <div id="search-hosp">
                        <h1>Search Hospitals</h1>
                        <input type="search" id="search" name="search" class="form-control" placeholder="Search...">
                        <div id="results"></div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <footer>
        &copy; Vaccines All rights reserved.
    </footer>

    <script>
        $(document).ready(function() {
            //   serach value is null show all data
                $.ajax({
                url: "../patient/livesearch.php",
                type: "POST",
                data: { search: "" },
                success: function(data) {
                    $("#results").html(data);
                }
            });

            // live search
            $("#search").on("keyup", function() {
                let search_value = $(this).val().trim();

                $.ajax({
                url: "../patient/livesearch.php",
                type: "POST",
                data: { search: search_value },
                success: function(data) {
                    $("#results").html(data);
                }
                });
            });


            });
    </script>
</body>
</html>
