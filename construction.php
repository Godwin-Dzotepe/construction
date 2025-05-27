<?php
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Database connection settings
  $servername = "localhost";
  $username = "root";
  $password = ""; // Change if you have a password set for root
  $dbname = "adic_deluxe_db";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Get and sanitize form data
  $first_name = $conn->real_escape_string($_POST['first_name']);
  $last_name = $conn->real_escape_string($_POST['last_name']);
  $email = $conn->real_escape_string($_POST['email']);
  $message = $conn->real_escape_string($_POST['message']);

  // Insert into database
  $sql = "INSERT INTO contact_messages (first_name, last_name, email, message) VALUES ('$first_name', '$last_name', '$email', '$message')";

  if ($conn->query($sql) === TRUE) {
    // Optional: show a success message or redirect
    echo "<script>alert('Thank you for contacting us!');</script>";
  } else {
    echo "<script>alert('Error: " . $conn->error . "');</script>";
  }

  $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ADIC Deluxe Engineering</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Arial', sans-serif;
      background-color: #f7f7f7;
      color: #222;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 30px;
      background-color: #f8f8f8;
      flex-wrap: wrap;
      position: relative;
    }

    .logo-section {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .logo {
      width: 60px;
    }

    .tagline h2 {
      font-size: 14px;
      color: #c24e3f;
    }

    .tagline span {
      font-size: 12px;
      color: green;
    }

    .nav-links {
      display: flex;
      list-style: none;
      gap: 20px;
      position: relative;
    }

    .nav-links li {
      position: relative;
    }

    .nav-links a {
      text-decoration: none;
      font-weight: bold;
      color: #000;
      font-size: 14px;
    }

    .nav-links li:hover .dropdown {
      display: block;
    }

    .dropdown {
      display: none;
      position: absolute;
      top: 100%;
      left: 0;
      background: white;
      box-shadow: 0 2px 5px rgba(0,0,0,0.2);
      min-width: 160px;
      z-index: 1000;
    }

    .dropdown a {
      display: block;
      padding: 10px;
      color: #000;
      white-space: nowrap;
    }

    .dropdown a:hover {
      background-color: #eee;
    }

    .social-enquire {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .social-icons i {
      font-size: 18px;
      color: gray;
      cursor: pointer;
    }

    .enquire-btn {
      background-color: #a25e2a;
      color: white;
      border: none;
      padding: 10px 20px;
      font-size: 14px;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 5px;
    }
    .enquire-form-container {
  position: fixed;
  top: 0;
  right: -100%;
  width: 350px;
  height: 100vh;
  background-color: #ffffff;
  box-shadow: -2px 0 8px rgba(0, 0, 0, 0.2);
  padding: 20px;
  box-sizing: border-box;
  z-index: 999;
  transition: right 0.4s ease-in-out;
  overflow-y: auto;
}

.enquire-form-container.active {
  right: 0;
}

.enquire-form-container .close-btn {
  font-size: 24px;
  font-weight: bold;
  color: #333;
  cursor: pointer;
  position: absolute;
  top: 15px;
  right: 20px;
}

.enquire-form-container form {
  margin-top: 40px;
  display: flex;
  flex-direction: column;
}

.enquire-form-container h3 {
  margin-bottom: 20px;
  color: #333;
  font-size: 22px;
  text-align: center;
}

.enquire-form-container input,
.enquire-form-container textarea {
  margin-bottom: 15px;
  padding: 12px;
  font-size: 14px;
  border: 1px solid #ccc;
  border-radius: 5px;
  outline: none;
  transition: border-color 0.3s;
}

.enquire-form-container input:focus,
.enquire-form-container textarea:focus {
  border-color: #007bff;
}

.enquire-form-container button {
  padding: 12px;
  font-size: 16px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.enquire-form-container button:hover {
  background-color: #0056b3;
}


/* Close Button */
.close-btn {
  font-size: 24px;
  font-weight: bold;
  color: #a25e2a;
  cursor: pointer;
  position: absolute;
  top: 15px;
  right: 20px;
}

.why-choose-us {
  background-color: #fff;
  padding: 40px 20px;
  text-align: center;
}

.why-choose-us h2 {
  color: #1d1b4c;
  font-size: 28px;
  margin-bottom: 30px;
}

.reasons-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 20px;
}

.reason-card {
  background-color: #f4f4f4;
  padding: 25px 15px;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  transition: transform 0.3s ease;
}

.reason-card:hover {
  transform: translateY(-5px);
}

.reason-card h3 {
  color: #a25e2a;
  margin-bottom: 10px;
  font-size: 20px;
}

.reason-card p {
  font-size: 15px;
  color: #444;
  line-height: 1.5;
}

.our-services-gallery {
  background-color: #fff;
  padding: 40px 20px;
  text-align: center;
}

.our-services-gallery h2 {
  color: #1d1b4c;
  font-size: 28px;
  margin-bottom: 30px;
}

.service-gallery-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
}

.gallery-item {
  background-color: #f4f4f4;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  transition: transform 0.3s ease;
}

.gallery-item:hover {
  transform: translateY(-5px);
}

.gallery-item img {
  width: 100%;
  height: 600px;
  object-fit: cover;
  border-radius: 8px;
}

.gallery-item p {
  margin-top: 12px;
  font-weight: bold;
  color: #a25e2a;
  font-size: 16px;
}



    .menu-toggle {
      display: none;
      font-size: 22px;
      cursor: pointer;
    }

    @media (max-width: 768px) {
      .nav-links {
        display: none;
        flex-direction: column;
        width: 100%;
        margin-top: 10px;
      }

      .nav-links.show {
        display: flex;
      }

      .menu-toggle {
        display: block;
        position: absolute;
        top: 15px;
        right: 20px;
      }

      .social-enquire {
        flex-direction: column;
        align-items: flex-start;
      }
    }

    .hero-header {
      position: relative;
      width: 100%;
      height: 100vh;
      overflow: hidden;
    }

    .hero-header .main-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .hero-header .animated-text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      color: white;
      animation: fadeIn 2s ease-in-out;
    }

    .hero-header .animated-text h1 {
      font-size: 3rem;
      text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
    }

    .hero-header .animated-text p {
      font-size: 1.5rem;
      text-shadow: 1px 1px 3px rgba(0,0,0,0.7);
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .services {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 1rem;
      padding: 20px;
      background-color: #1d1b4c;
      color: white;
    }

    .service-item {
      text-align: center;
    }

    .service-item img {
      width: 100%;
      height: 150px;
      object-fit: cover;
      border-radius: 8px;
    }

    .service-item p {
      margin-top: 8px;
      font-weight: bold;
    }

    .contact {
      background-color: white;
      padding: 20px;
      text-align: center;
    }

    .contact h2 {
      color: #1d1b4c;
    }

    .contact .logo {
      width: 80px;
      margin-bottom: 10px;
    }

    /* Side Form */
    .enquire-form-container {
      position: fixed;
      top: 0;
      right: -400px;
      width: 350px;
      height: 100%;
      background: white;
      box-shadow: -2px 0 5px rgba(0,0,0,0.3);
      padding: 20px;
      transition: right 0.3s ease;
      z-index: 2000;
    }

    .enquire-form-container.show {
      right: 0;
    }

    .enquire-form h3 {
      margin-bottom: 10px;
      color: #a25e2a;
    }

    .enquire-form input,
    .enquire-form textarea {
      width: 100%;
      margin-bottom: 10px;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .enquire-form button {
      background: #a25e2a;
      color: white;
      padding: 10px;
      border: none;
      width: 100%;
      cursor: pointer;
    }

    .enquire-form button:hover {
      background: #884d1f;
    }
  </style>
</head>
<body>

  <nav class="navbar">
    <div class="logo-section">
      <img src="./image/WhatsApp_Image_2025-05-17_at_16.16.59_e38934c5-removebg-preview.png" alt="Logo" class="logo"/>
      <div class="tagline">
        <h2>ADIC DELUXE ENGINEERING.</h2>
        <span>Building & Civil Engineering Contractors</span>
      </div>
    </div>

    <i class="fas fa-bars menu-toggle" onclick="toggleMenu()"></i>

    <ul class="nav-links" id="nav-links">
      <li><a href="construction.php">Home</a></li>
      <li>
        <a href="Installation_Expert.php">Services</a>
        </div>
      </li>
      <li><a href="portfolio.php">Portfolio</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="admin.php">admin</a></li>
    </ul>

    <div class="social-enquire">
      <div class="social-icons">
      <a href="https://wa.me/233240963964" target="_blank" rel="noopener"><i class="fab fa-whatsapp"></i></a>
      <a href="https://www.facebook.com/" target="_blank" rel="noopener"><i class="fab fa-facebook-f"></i></a>
      <a href="https://www.instagram.com/" target="_blank" rel="noopener"><i class="fab fa-instagram"></i></a>
      </div>
      <a href="#formContainer" class="enquire-btn" onclick="toggleForm(); return false;">Enquire <i class="fas fa-chevron-right"></i></a>
    </div>
  </nav>

  <header class="hero-header">
    <img src="./image/download (5).jpeg" alt="ADIC Deluxe Building" class="main-image" />
    <div class="animated-text">
      <h1>ADIC DELUXE ENGINEERING.</h1>
      <p>Building & Civil Engineering Contractors</p>
    </div>
  </header>

  <section class="services">
    <div class="service-item">
      <img src="./image/download (1).jpeg" alt="Structural Glass 1">
      <p>Structural glass</p>
    </div>
    <div class="service-item">
      <img src="./image/IMG-20250517-WA0083.jpg" alt="Aluminum Window">
      <p>Aluminum window</p>
    </div>
    <div class="service-item">
      <img src="./image/download (5).jpeg" alt="Structural Glass 2">
      <p>Structural glass</p>
    </div>
    <div class="service-item">
      <img src="./image/download (2).jpeg" alt="Shower Cubicle">
      <p>Shower cubicle</p>
    </div>
  </section>

  <section class="why-choose-us">
  <h2>Why Choose Us</h2>
  <div class="reasons-grid">
    <div class="reason-card">
      <h3>Flexibility</h3>
      <p>We tailor our services to meet your exact project requirements, timelines, and budgets with ease.</p>
    </div>
    <div class="reason-card">
      <h3>Free Consultations</h3>
      <p>Get expert advice at no cost before committing to your project. We're here to guide you every step.</p>
    </div>
    <div class="reason-card">
      <h3>Competitive Prices</h3>
      <p>We offer industry-leading services at rates that provide real value without compromising quality.</p>
    </div>
    <div class="reason-card">
      <h3>Excellent Quality</h3>
      <p>We deliver impeccable results using high-grade materials and experienced craftsmanship.</p>
    </div>
  </div>
</section>

<section class="our-services-gallery">
  <h2>Our Services</h2>
  <div class="service-gallery-grid">
    <div class="gallery-item">
      <img src="./image/Balcones.jpeg" alt="Stainless Balustrade" />
      <p>Stainless Balustrade</p>
    </div>
    <div class="gallery-item">
      <img src="./image/IMG-20250517-WA0082.jpg" alt="Installation Expert" />
      <p>Installation Expert</p>
    </div>
  </div>
</section>


  <section class="contact">
    <img src="./image/WhatsApp_Image_2025-05-17_at_16.16.59_e38934c5-removebg-preview.png" alt="Company Logo" class="logo" />
    <h2>ADIC DELUXE ENGINEERING</h2>
    <p><strong>Get In Touch With Us!</strong></p>
    <p><a href="mailto:Adicdeluxe.engineering@gmail.com">Adicdeluxe.engineering@gmail.com</a></p>
    <p>Spintex Road, Coastal Estate Junction, Off Okpoi Gonno</p>
    <p>📞 024 905 7710 / 020 962 0965</p>
  </section>

<!-- Side Contact Form -->
<div class="enquire-form-container" id="formContainer">
  <span class="close-btn" onclick="toggleForm()">×</span>
<form method="POST" action="">
  <h3>Contact Us</h3>
  <input type="text" name="first_name" placeholder="First Name" required />
  <input type="text" name="last_name" placeholder="Last Name" required />
  <input type="email" name="email" placeholder="Email" required />
  <textarea name="message" rows="5" placeholder="Write your message here..." required></textarea>
  <button type="submit">Submit</button>
</form>
</div>


  <script>
    function toggleMenu() {
      document.getElementById('nav-links').classList.toggle('show');
    }

    function toggleForm() {
      document.getElementById('formContainer').classList.toggle('show');
    }
  </script>
</body>
</html>



