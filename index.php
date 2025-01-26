<!DOCTYPE html>
<html>

<head>

    <style>
      
.department_section .box {
    margin-bottom: 30px; 
}

.department_section .img-box img {
    width: 100%; 
    height: auto; 
    border-radius: 8px; 
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); 
    transition: transform 0.3s ease, box-shadow 0.3s ease; 
}

.department_section .box:hover .img-box img {
    transform: scale(1.05); 
    box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15); 
}


/* About Section */
.about_section {
  background-color: #f9f9f9; /* Light background color */
  padding: 50px 0;
  margin-bottom: 50px; /* Ensure margin at the bottom */
}

.about_section .container {
  max-width: 1200px;
  margin: 0 auto;
}

.row {
  display: flex;
  align-items: center; /* Vertically align the image and text */
  justify-content: space-between;
}

/* Image Box */
.img-box {
  width: 100%;
  height: auto;
  overflow: hidden;
}

.img-box img {
  width: 100%;
  height: auto;
  object-fit: cover; /* Ensure image covers the space */
  border-radius: 8px; /* Optional: rounded corners for the image */
}

/* Detail Box */
.detail-box {
  padding: 30px;
  text-align: left;
}

.heading_container h2 {
  font-size: 2.5rem;
  color: #2c3e50;
  margin-bottom: 20px;
  font-weight: bold;
}

.heading_container h2 span {
  color: #178066; /* Accent color for 'Us' */
}

.detail-box p {
  font-size: 1.1rem;
  color: #7f8c8d;
  line-height: 1.6;
  margin-bottom: 20px;
}

.detail-box a {
  color: #178066;
  text-decoration: none;
  font-weight: bold;
  transition: color 0.3s ease;
}

.detail-box a:hover {
  color: #145c4f;
}

/* Responsive Design */
@media (max-width: 768px) {
  .row {
    flex-direction: column; /* Stack the image and text on smaller screens */
    text-align: center;
  }

  .col-md-6 {
    width: 100%; /* Make sure both sections take up full width on smaller screens */
    margin-bottom: 20px;
  }

  .heading_container h2 {
    font-size: 2rem;
  }

  .detail-box p {
    font-size: 1rem;
  }
}

@media (max-width: 480px) {
  .heading_container h2 {
    font-size: 1.8rem;
  }

  .detail-box p {
    font-size: 0.9rem;
  }
}

/* General Section Styling */
.department_section {
  background-color: #f9f9f9; /* Light background for the section */
  padding: 50px 0;
}

.department_section .container {
  max-width: 1200px;
  margin: 0 auto;
}

/* Heading Styling */
.heading_container {
  text-align: center;
  margin-bottom: 40px;
}

.heading_center h2 {
  font-size: 2.5rem;
  color: #2c3e50;
  margin-bottom: 15px;
  font-weight: bold;
}

.heading_center p {
  font-size: 1.2rem;
  color: #7f8c8d;
  max-width: 700px;
  margin: 0 auto;
}

/* Service Boxes */
.service-box {
  background-color: white;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  margin-bottom: 30px;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  height: 100%;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.service-box:hover {
  transform: translateY(-10px);
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.img-box {
  width: 100%;
  height: 200px;
  overflow: hidden;
}

.img-box img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.service-box:hover .img-box img {
  transform: scale(1.1);
}

.detail-box {
  padding: 20px;
  text-align: center;
  flex-grow: 1; /* Ensure content grows to fill available space */
}

.detail-box h5 {
  font-size: 1.5rem;
  color: #178066;
  margin-bottom: 10px;
  font-weight: bold;
}

.detail-box p {
  font-size: 1rem;
  color: #7f8c8d;
  margin-bottom: 20px;
}

/* Button Styling */
.btn-box {
  margin-top: 40px;
  text-align: center;
}

.btn-box .btn {
  background-color: #178066;
  color: white;
  padding: 15px 30px;
  font-size: 1.2rem;
  border-radius: 4px;
  text-decoration: none;
  transition: background-color 0.3s ease;
}

.btn-box .btn:hover {
  background-color: #145c4f;
}

/* Responsive Design for Service Boxes */
@media (max-width: 768px) {
  .row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }

  .col-md-3 {
    width: 48%; /* Adjust to 2 items per row */
    margin-bottom: 20px;
  }

  .service-box {
    width: 100%; /* Ensure the box takes full width */
    margin-bottom: 20px;
  }

  .img-box {
    height: 180px; /* Adjust image height for better layout */
  }

  .detail-box {
    padding: 15px;
  }
}

@media (max-width: 480px) {
  .col-md-3 {
    width: 100%; /* Stack items on smaller screens */
  }

  .heading_center h2 {
    font-size: 2rem;
  }

  .heading_center p {
    font-size: 1rem;
  }

  .btn-box .btn {
    width: 100%;
  }
}

    </style>

  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> Vaccine </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>

  <div class="hero_area">

    <div class="hero_bg_box">
      <img src="images/hero-bg.png" alt="">
    </div>

    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
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
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <h1>
                      We Provide Best Vaccine
                    </h1>
                    <p>
                    Get vaccinated with ease through our user-friendly platform.
Book your appointment, track your progress, and stay informed.
Your health, our priority – making vaccination simple and accessible!
                    </p>
                    <div class="btn-box">
                      <a href="about.php" class="btn1">
                        Read More
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          

    </section>
    <!-- end slider section -->
  </div>


<!-- Department Section -->
<section class="department_section layout_padding">
  <div class="container">
    <!-- Heading -->
    <div class="heading_container heading_center">
      <h2>Our Vaccination Services</h2>
      <p>We provide reliable and effective vaccination services for various needs. Get protected today!</p>
    </div>

    <!-- Vaccination Boxes -->
    <div class="row">
      <div class="col-md-3">
        <div class="service-box">
          <div class="img-box">
            <img src="images/covid19.webp" alt="COVID-19 Vaccination" class="img-fluid">
          </div>
          <div class="detail-box">
            <h5>COVID-19 Vaccination</h5>
            <p>Protect yourself and others from COVID-19 with our authorized vaccines.</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="service-box">
          <div class="img-box">
            <img src="images/flu.jpg" alt="Flu Vaccination" class="img-fluid">
          </div>
          <div class="detail-box">
            <h5>Flu Vaccination</h5>
            <p>Stay safe from seasonal flu with our reliable flu vaccination services.</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="service-box">
          <div class="img-box">
            <img src="images/travel.jpg" alt="Travel Vaccination" class="img-fluid">
          </div>
          <div class="detail-box">
            <h5>Travel Vaccination</h5>
            <p>Ensure safe travels with vaccines for various destinations and diseases.</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="service-box">
          <div class="img-box">
            <img src="images/Child.jpg" alt="Child Vaccination" class="img-fluid">
          </div>
          <div class="detail-box">
            <h5>Child Vaccination</h5>
            <p>Keep your children safe with essential vaccinations recommended by health authorities.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- View All Services Button -->
    <div class="btn-box text-center">
      <a href="vaccine.php" class="btn btn-primary">View All Services</a>
    </div>
  </div>
</section>




<!-- about section -->

<section class="about_section layout_margin-bottom">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="img-box">
          <img src="images/covid19.webp" alt="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="detail-box">
          <div class="heading_container">
            <h2>
              About <span>Us</span>
            </h2>
          </div>
          <p>
          Welcome to Vaccine Mall, where we provide reliable and up-to-date vaccine information, services, and booking options. Our mission is to promote widespread immunization, making vaccines accessible and affordable to reduce preventable diseases. We offer a user-friendly platform for booking vaccinations, educational resources, and trusted partnerships with healthcare providers. Join us in creating a healthier future through vaccine awareness and accessibility.
          </p>
          <a href="">
            Read More
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- end about section -->

    <!-- hospital section -->

    <section class="doctor_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Hospital
        </h2>
        <p class="col-md-10 mx-auto px-0">
          Our Website Have Best Hospitals.
        </p>
      </div>
      <div class="row">
        <div class="col-sm-6 col-lg-4 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="images/d1.png" alt="hospital.php" style="

width: 400px;  
height: 200px; 
object-fit: cover;
">
            </div>
            <div class="detail-box">
              <div class="social_box">
                <a href="">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-youtube" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
              </div>
              <h5>
              Ziauddin Hospital
              </h5>
              <h6 class="">
                Hospital
              </h6>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="images/d2.jpeg" alt="hospital.php"  style="

width: 400px;  
height: 200px; 
object-fit: cover;

">
            </div>
            <div class="detail-box">
              <div class="social_box">
                <a href="">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-youtube" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
              </div>
              <h5>
              Saifee hospital
              </h5>
              <h6 class="">
                Hospital
              </h6>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="images/d3.jpeg" alt="hospital.php"  style="

width: 400px;  
height: 200px; 
object-fit: cover;

">
            </div>
            <div class="detail-box">
              <div class="social_box">
                <a href="">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-youtube" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
              </div>
              <h5>
              SHED hospital 
              </h5>
              <h6 class="">
                Hospital
              </h6>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="hospital.php">
          View All
        </a>
      </div>
    </div>
  </section>

  <!-- end doctor section -->

<!-- contact section -->
<section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Get In Touch
        </h2>
      </div>
      
       
          <div class="form_container contact-form">
            <form action="">
              <div class="form-row">
                <div class="col-lg-6">
                  <div>
                    <input type="text" placeholder="Your Name" />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div>
                    <input type="text" placeholder="Phone Number" />
                  </div>
                </div>
              </div>
              <div>
                <input type="email" placeholder="Email" />
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Message" />
              </div>
              <div class="btn_box">
                <button>
                  SEND
                </button>
              </div>
            </form>
          </div>
        
      
    </div>
  </section>

  <!-- client section -->

  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center ">
        <h2>
          Testimonial
        </h2>
      </div>
      <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="images/client.jpg" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <h6>
                        Muhammad Ibrahim 
                      </h6>
                    </div>
                    <p>
                    I had an excellent experience using this vaccination service website! The booking process was quick and easy, and I received timely updates throughout. It's reassuring to have such a seamless and reliable platform for something so important!
                    </p>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="images/t3.jpg" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <h6>
                        Ahmed Khan 
                      </h6>
                    </div>
                    <p>
                    The vaccination website made the entire process hassle-free! I was able to schedule my appointment effortlessly, and the staff kept me informed every step of the way. I feel confident and safe thanks to their efficient service!
                    </p>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-11 col-lg-10 mx-auto">
                <div class="box">
                  <div class="img-box">
                    <img src="images/t1.jpg" alt="" />
                  </div>
                  <div class="detail-box">
                    <div class="name">
                      <h6>
                       Daniyal Umair 
                      </h6>
                    </div>
                    <p>
                    The vaccination website was incredibly easy to navigate. I quickly booked my appointment and received all the information I needed. The process was smooth, and I felt well taken care of every step of the way!
                    </p>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn-container">
          <a class="carousel-control-prev" href="#carouselExample2Controls" role="button" data-slide="prev">
            <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExample2Controls" role="button" data-slide="next">
            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->

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

  <!-- jQery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>
</html>