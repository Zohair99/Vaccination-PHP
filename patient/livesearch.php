<?php
 include '../pages/connect.php';
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
    <div class="cards-container">
         <?php

            $selected_value = $_POST['search'];

            if (!empty($selected_value)) {
                $query = "SELECT * FROM users WHERE role = 'hospital' AND action = 'Approved' AND name LIKE '$selected_value%'";
            }
            else {
                $query = "SELECT * FROM users WHERE role = 'hospital' AND action = 'Approved'";
            }

            $query_res = mysqli_query($conn,$query);

            if (mysqli_num_rows($query_res) > 0) {
                while($query_row = mysqli_fetch_assoc($query_res)){
                    $id = $query_row['id'];
                    echo "
                    <div class='card2'>
                        <h2>$query_row[name]</h2>
                        <p><strong>Address:</strong> $query_row[address]</p>
                        <p><strong>Contact:</strong> $query_row[phone]</p>
                        <div class='book-appoint'>
                        <a href='../patient/book-oppointments.php?id=$id'>
                            <button data-section='hire' class='appointment-btn'>
                                Book Appointment
                            </button>
                            </a>
                        </div>
                    </div> ";
                }
            }
            else {
                echo "<p>No hospitals found matching your search.</p>";
            }
        ?>
    </div>



</body>

</html>