<?php
  include '../pages/connect.php';
  session_start();

  ?>
<?php

// Clear form inputs
if (isset($_SESSION['name'])) {
    $email = "";
   $pass = ""; 
}


// Arrays for validations
$email = $pass = "";
$errors = [
    'email' => '',
    'pass' => '',
];


  if($_SERVER["REQUEST_METHOD"]=="POST"){

        $email = $_POST['email'];
        $pass = $_POST['pass'];

      
        

        // ---------- admin validation start----------
        $adminquery = "SELECT * FROM admin WHERE admin_email = '$email'";
        $admin_res = mysqli_query($conn, $adminquery);

        if($admin_res && mysqli_num_rows($admin_res) > 0){

            $admin_row = mysqli_fetch_assoc($admin_res);
            
            if($admin_row['admin_pass'] == $pass){

                  $_SESSION["admin_name"] = $admin_row['admin_name'];
                  $email = $pass = "";
                  header('location:../admin/maindashboard.php');
                  exit();
            }
            else{
                  $errors['pass'] = "incorrect password";
            }

        }

// ***********************************************************************************

        // ---------- users validation start----------
      else{
          $user_query = "SELECT * FROM users WHERE email = '$email'";
          $user_res = mysqli_query($conn, $user_query);

          if ($user_res && mysqli_num_rows($user_res) > 0) {

                $user_row = mysqli_fetch_array($user_res);
                
                    // pass verify from database 
                  if (password_verify($pass, $user_row[3])) {
                      $_SESSION["id"] = $user_row[0];
                      $_SESSION["name"] = $user_row[1];
                      $_SESSION["email"] = $user_row[2];
                      $_SESSION["number"] = $user_row[5];
                      $_SESSION["address"] = $user_row[7];
                      $_SESSION['user_role'] = $user_row[6];
                      $_SESSION['action'] = $user_row[13];
                      $_SESSION['hospital_approval'] = $user_row[14];
                      $_SESSION['profile'] = $user_row[11];

                     // role based for hospital
                      if ($user_row[6] == "Hospital") {
                            $email = $pass = "";
                          header('location:../hospital/patientRegister_vaccines.php');
                      }
                     // role based for patient
                       else if ($user_row[6] == "Patient") {
                          $email = $pass = "";
                          header('location:../patient/request-for-ct.php');
                      }
                      exit();
                  }
                  else {
                    // if pass is inccorect
                      $errors['pass'] = "incorrect password";
                  }
          }
          else{
            // if email is not exist in database
              $errors['email'] = "incorrect email";
          }

      }  
      
      
      // if input field is empty show errors
      if(empty($email)){
        $errors['email'] = "Enter your valid email";
      }
      if(empty($pass)){
        $errors['pass'] = "Enter your valid Password";
      }
  }
?>
                        
<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
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

/* Login Outer */
.login-outer {
  
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

/* Form container */
.form-container {
    background-color: white;
    padding: 30px;
    width: 100%;
    max-width: 400px;
    border-radius: 18px;
    box-shadow: 0 0 15px rgba(4, 125, 128, 0.1);
}

h2 {
    text-align: center;
    font-size: 2rem;
    margin-bottom: 20px;
    color:rgb(0, 0, 0);
}

/* Input field and labels */
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
    border-color:rgb(23, 128, 102);
    outline: none;
}

.input-label {
    position: absolute;
    top: 50%;
    left: 10px;
    transform: translateY(-50%);
    font-size: 1rem;
    color:rgb(23, 128, 102);
    transition: all 0.3s ease;
}

.input-outer input:focus + .input-label,
.input-outer input:not(:placeholder-shown) + .input-label {
    top: -10px;
    font-size: 0.9rem;
    color:rgb(23, 128, 102);
}

/* Error messages */
.error {
    color: #e74c3c;
    font-size: 0.9rem;
    margin-top: 5px;
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
    border: 2px solid #178066; 
    color: #178066; 

}

/* Switch form text */
.switch-form {
    text-align: center;
    margin-top: 20px;
}

.switch-form p {
    font-weight: bold;
}

.switch-form a {
    color:rgb(24, 122, 100);
    text-decoration: none;
}

.switch-form a:hover {
    text-decoration: underline;
}

/* Responsive Design */
@media (max-width: 480px) {
    .form-container {
        padding: 20px;
    }

    h2 {
        font-size: 1.8rem;
    }

    .input-outer input, button {
        font-size: 1rem;
    }
}

    </style>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Vaccination</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>
  <body>

  <div class="header">
  <a class="navbar-brand" >
  <span id="1">
         <h1> Vaccine  </h1>
            </span>
          </a>

          <button type="button" onclick="window.location.href='../index.php'" class="mt-3"> Back To Home </button>
    

<!-- login outer -->
   <div class="login-outer">

    <div class="login-img">
    <img src="../assets/main.jpg" height="350px" width="auto" alt="">
    </div>

    <!-- form start -->
    <div class="form-container">
      <form method = "post">
        <h2>Login</h2>

        <div class="input-outer">
          <input type="email" class="input-field" id="form2Example1" name="email" value="<?php echo $email ?>" />
          <label for="Name" class="input-label">Email</label>
          <p id="emailerror" class="error"><?php echo $errors['email']; ?></p>
        </div>

        <div class="input-outer">
            <input type="password" class="input-field" id="form2Example2" name="pass" value="<?php echo $pass ?>" />
            <label for="Name" class="input-label">Password</label>
            <p id="passerror" class="error"><?php echo $errors['pass']; ?></p>
        </div>
        
        <!-- <div class="check-outer">
              <input id="checkbox" type="checkbox" name="remember" /> <span style="margin-bottom:6px;">Remember Me</span>
        </div> -->

        <button  type="submit" id="login-btn" class="mt-2">Login</button>
       
        <div class="switch-form">
            <p style="font-weight: bold; border-top: 1px solid black; padding-top: 1em;">Don't have an account? <a href="../pages/signup.php" style="text-decoration: underline;">Register</a></p>
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
            inputLabel.style.top = '1px';
          } else {
          inputLabel.style.top = '20px';
          }
        });
      
        if (inputField.value !== '') {
          inputLabel.style.top = '1px';
        } else {
          inputLabel.style.top = '20px';
        }
      });
      
      
      
          </script>
  </body>
</html>
