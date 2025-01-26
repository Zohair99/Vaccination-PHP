<?php
  include '../pages/connect.php';
?>
<?php
// arrays for validation
$name = $email = $pass = $c_pass = $phone = $role = "";
$errors = [
    'name' => '',
    'email' => '',
    'pass' => '',
    'c_pass' => '',
    'phone' => ''
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $c_pass = $_POST['c_pass'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];
    $hashpass = password_hash($pass,PASSWORD_DEFAULT);
    $hashc_pass = password_hash($c_pass,PASSWORD_DEFAULT);

    // Regular expressions
    $name_regex = "/^[a-zA-Z\s]+$/";
    $email_regex = "/^[a-z0-9]+@[a-z]+\.[a-z]{2,4}$/";
    $password_regex = "/^[a-zA-Z][a-zA-Z0-9!@#$%^&*()\-+=~`{}\[\]:;\"'<>,.?\/\\|]{7,}$/";
    $phone_regex = "/^(?:\+\d{12}|\d{11})$/";


    // Validation
    if(empty($name)){
        $errors['name'] = "Name is Required";
    }
    else if(!preg_match($name_regex, $name)) {
        $errors['name'] = "Must start with Letters";
    }

    if(empty($email)){
        $errors['email'] = "Email is Required";
    }
    else if(!preg_match($email_regex, $email)) {
        $errors['email'] = "Enter a valid email";
    }

    if(empty($pass)){
        $errors['pass'] = "pass is Required";
    }
    else if(!preg_match($password_regex, $pass)) {
        $errors['pass'] = "start with a letter must be 8+ characters";
    }
    
    if(empty($c_pass)){
        $errors['c_pass'] = "Confirm pass is Required";
    }
    else if($pass !== $c_pass) {
        $errors['c_pass'] = "Confirm password do not match.";
    }

    if(empty($phone)){
        $errors['phone'] = "Phone No is Required";
    }
    else if(!preg_match($phone_regex, $phone)) {
        $errors['phone'] = "Phone number must be 11 digits";
    }

    // if error is not 
    if (!array_filter($errors)) { 

        $query = "SELECT * FROM users WHERE email = '$email'";
        $res = mysqli_query($conn, $query);
         
        
        if (mysqli_num_rows($res) > 0) {
            $errors['email'] = "Email already exists.";
        } 
        else {
            $insert_query = "INSERT INTO users VALUES (null, '$name', '$email', '$hashpass', '$hashc_pass', '$phone', '$role', null, null, null, null, null,null, null,null)";

            $connect_insertquery = mysqli_query($conn, $insert_query);

            if ($connect_insertquery) {
                $name = $email = $pass = $c_pass = $phone = $role = "";
                header('location:../pages/login.php');

            } 
            else {
                echo "Data not inserted";
            }
        }
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* Header section */
        .header {
    text-align: center;
    background-color: #178066;
    padding: 20px;
    color: white;
}
.header_section{
    background-color:#178066;
}

.header h1 {
    color: white;
    margin: 0;
    font-size: 3rem;
}

/* Outer container for form */
.outer-div {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    flex-direction: column;
    background-color: #ecf0f1;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Form container styling */
.form-container {
    background-color: #fff;
    padding: 30px;
    width: 100%;
    max-width: 400px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}

/* Form title */
h2 {
    text-align: center;
    font-size: 2rem;
    margin-bottom: 20px;
    color: #2c3e50;
}

/* Label and input fields */
.input-outer {
    position: relative;
    margin-bottom: 20px;
}

.input-outer input {
    width: 100%;
    padding: 10px;
    font-size: 1rem;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f9f9f9;
    transition: border 0.3s ease;
}

.input-outer input:focus {
    border-color: #178066;
    outline: none;
}

.input-outer input:focus + .input-label,
.input-outer input:not(:placeholder-shown) + .input-label {
    top: -10px;
    font-size: 0.9rem;
    color: #178066;
}

/* Input labels */
.input-label {
    position: absolute;
    top: 50%;
    left: 10px;
    transform: translateY(-50%);
    font-size: 1rem;
    color: #7f8c8d;
    transition: all 0.3s ease;
}

/* Error messages */
.error {
    color: #e74c3c;
    font-size: 0.9rem;
    margin-top: 5px;
}

/* Select dropdown */
select {
    width: 100%;
    padding: 10px;
    font-size: 1rem;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f9f9f9;
    margin-bottom: 20px;
}

select:focus {
    border-color: #178066;
}

/* Submit button */
button {
    width: 100%;
    padding: 10px;
    font-size: 1.2rem;
    background-color: #178066;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color:rgb(255, 255, 255);
    color:#178066;
    border: 2px solid #178066; 
}

/* Already have an account link */
.switch-form {
    text-align: center;
    margin-top: 20px;
}

.switch-form p {
    font-weight: bold;
}

.switch-form a {
    color:rgb(52, 197, 219);
    text-decoration: none;
}

.switch-form a:hover {
    text-decoration: underline;
}

/* Media Queries for responsiveness */
@media (max-width: 480px) {
    .outer-div {
        padding: 10px;
    }

    .form-container {
        padding: 20px;
    }

    h2 {
        font-size: 1.8rem;
    }

    .input-outer input, select, button {
        font-size: 1rem;
    }

    button {
        font-size: 1.1rem;
    }
}


    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Vaccination</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body>

<div class="header">
<a class="navbar-brand">
<span id="1">
         <h1> Vaccine  </h1>
            </span>
          </a>

          <button type="button" onclick="window.location.href='../index.php'" class="mt-3"> Back To Home </button>

    <!-- signup outer -->
    <div class="outer-div ">

        <div class="inner-img">
            <img src="../assets/main.jpg" height="350px" width="auto" alt="">
        </div>

        <!-- form start -->
        <div class="form-container">
            <form method="post">
                <h2>Signup</h2>

                <div class="input-outer">
                    <input type="text" class="input-field" id="fullname" name="name" value="<?php echo htmlspecialchars($name); ?>" />
                    <label for="fullname" class="input-label">Hospital/Patient Name</label>
                    <p id="nameerror" class="error"><?php echo $errors['name']; ?></p>
                </div>
                
                <div class="input-outer">
                    <input type="text" id="email" class="input-field" name="email" value="<?php echo htmlspecialchars($email); ?>" />
                    <label for="email" class="input-label">Email</label>
                    <p id="emailerror" class="error"><?php echo $errors['email']; ?></p>
                </div>

                <div class="input-outer">
                    <input type="password" id="pass" class="input-field" name="pass" value="<?php echo htmlspecialchars($pass);?>" />
                    <label for="pass" class="input-label">Password</label>
                    <p id="passerror" class="error"><?php echo $errors['pass']; ?></p>
                </div>

                <div class="input-outer">
                    <input type="password" id="c_pass" class="input-field" name="c_pass" value="<?php echo htmlspecialchars($c_pass);?>" />
                    <label for="c_pass" class="input-label">Confirm Password</label>
                    <p id="cpasserror" class="error"><?php echo $errors['c_pass']; ?></p>
                </div>


                <div class="input-outer">
                    <input type="text" id="phoneNumber" class="input-field" name="phone" value="<?php echo htmlspecialchars($phone); ?>" />
                    <label for="phoneNumber" class="input-label">Phone Number</label>
                    <p id="phoneerror" class="error"><?php echo $errors['phone']; ?></p>
                </div>

                <div>
                    <select id="role" name="role" style="width: 100%; margin-top: 0.5em;" required>
                        <option value="" hidden>Select Role Hospital/Patient</option>
                        <option value="Hospital" <?php echo $role == 'Hospital' ? 'selected' : ''; ?>>Hospital</option>
                        <option value="Patient" <?php echo $role == 'Patient' ? 'selected' : ''; ?>>Patient</option>
                    </select>
                </div>


                <button type="submit" id="signup-btn" class="mt-3">Sign Up</button>

                <div class="switch-form">
                    <p style="font-weight: bold; padding-top: 0em;" id="already">Already have an account? <a href="../pages/login.php" style="text-decoration: underline;">Login here</a></p>
                </div>
            </form>
        </div>
    </div>

    <script>
        let inputFields = document.querySelectorAll('.input-field');
        let inputLabels = document.querySelectorAll('.input-label');

        inputFields.forEach((inputField, index) => {
            let inputLabel = inputLabels[index];

            inputField.addEventListener('input', () => {
                if (inputField.value !== '') {
                    inputLabel.style.top = '-3px';
                } else {
                    inputLabel.style.top = '20px';
                }
            });

            if (inputField.value !== '') {
                inputLabel.style.top = '-3px';
            } else {
                inputLabel.style.top = '20px';
            }
        });
    </script>
</body>
</html>
