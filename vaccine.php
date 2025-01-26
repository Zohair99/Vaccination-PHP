<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/png">

  <title>Orthoc</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--font awesome style-->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <style>
    /* Centering About Section */
    .about-section {
      text-align: center;
      padding: 50px 20px;
      background: #178066;
    
    }

    .about-section h1 {
      font-size: 2.5rem;
      margin-bottom: 20px;
    }

    .about-section p {
      font-size: 1.1rem;
      color: white;
    }

    /* Flexbox Layout for Cards */
    .row {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      margin-top: 40px;
    }

    .column {
      flex: 1 1 calc(33.33% - 20px);
      margin: 10px;
      box-sizing: border-box;
    }

    .card {
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s;
    }

    .card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .container {
      padding: 20px;
      text-align: center;
    }

    .container h2 {
      font-size: 1.5rem;
      margin-bottom: 10px;
    }

    .container .title {
      font-size: 1.1rem;
      color: #777;
      margin-bottom: 10px;
    }

    .container p {
      font-size: 1rem;
      color: white;
    }

    .card:hover {
      transform: translateY(-10px);
    }
    

    /* Make it responsive */
    @media (max-width: 768px) {
      .column {
        flex: 1 1 calc(50% - 20px);
      }
    }

    @media (max-width: 480px) {
      .column {
        flex: 1 1 100%;
      }
    }
  </style>
</head>

<body class="sub_page">

  <div class="hero_area">
    <div class="hero_bg_box">
      <img src="images/hero-bg.png" alt="Hero Background">
    </div>

    <!-- Header section starts -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.php">
            <span>
              Vaccine
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php"> About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="vaccine.php">Vaccine</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="hospital.php">hospital</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../project/pages/signup.php">Register up</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../project/pages/login.php">login</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
  </div>

  <!-- About Section -->
  <div class="about-section">
    <h1>About Us</h1>
    <p>We are dedicated to providing the best vaccines and healthcare services to our community.</p>
    <p>Resize the browser window to see that this page is responsive.</p>
  </div>

  <h2 style="text-align:center">Our Vaccine Team</h2>
  <div class="row">
    <!-- Card 1 -->
    <div class="column">
      <div class="card">
        <img src="images/IMG-20241222-WA0003.jpg" alt="Jane Doe" />
        <div class="container">
          <h2>Vaccination</h2>
          <p class="title">Necessary to be Save!</p>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="column">
      <div class="card">
        <img src="images/IMG-20241222-WA0001.jpg" alt="Mike Ross" />
        <div class="container">
          <h2>RSV Vaccine</h2>
          <p class="title">It Prevant  lower respiratory.</p>
        </div>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="column">
      <div class="card">
        <img src="images/IMG-20241222-WA0002.jpg" alt="John Doe" />
        <div class="container">
          <h2>Our Services</h2>
          <p class="title">Vaccines save lives; fear endangers them.</p>
        </div>
      </div>
    </div>
  </div>
  

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 footer_col">
          <div class="footer_contact">
            <h4>
              Reach at..
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Easy To Acces
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +92 1234567890
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  vaccine@gmail.com
                </span>
              </a>
            </div>
          </div>
          <div class="footer_social">
            <a href="">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer_col">
          <div class="footer_detail">
            <h4>
              About
            </h4>
            <p>
            Be a hero, protect your community – get vaccinated.
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-2 mx-auto footer_col">
          <div class="footer_link_box">
            <h4>
              Links
            </h4>
            <div class="footer_links">
              <a class="active" href="index.php">
                Home
              </a>
              <a class="" href="about.php">
                About
              </a>
              <a class="" href="vaccine.php">
                Vaccine
              </a>
              <a class="" href="hospital.php">
                Hospital
              </a>
              <a class="" href="contact.php">
                Contact Us
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer_col ">
          <h4>
            Newsletter
          </h4>
          <form action="#">
            <input type="email" placeholder="Enter email" />
            <button type="submit">
              Subscribe
            </button>
          </form>
        </div>
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> 
          <a href="hospital.php">HOSPITAL DETAILS<br><br></a>
            &copy; <span id="displayYear"></span> 
            <a href="vaccine.php">VACCINATION INFO</a>
        </p>
       
      </div>  
    </div>
  </footer>
  <!-- footer section -->
  <!-- JS -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
</body>

</html>
