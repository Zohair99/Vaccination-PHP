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

<?php
// Assuming you have established a connection to the database
if (isset($_POST['name'])) {
    $user_id = $_POST['name'];
    // $hospital_id = $_SESSION['id'];

    $patient_vaccine = "SELECT * FROM users WHERE role = 'Patient' AND name = '$user_id' ";
    $patient_vaccine = mysqli_query($conn, $patient_vaccine);

    if ($patient_vaccine && mysqli_num_rows($patient_vaccine) > 0) {
        $row = mysqli_fetch_assoc($patient_vaccine);
        // Return JSON data
        echo json_encode($row);
    } else {
        echo json_encode([]); // Return an empty array if no data found
    }
}
?>

