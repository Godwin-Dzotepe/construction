<?php
// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'adic_deluxe_db';

$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle discussion form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['discussion_submit'])) {
  $first_name = $conn->real_escape_string($_POST['discussion_first_name']);
  $last_name = $conn->real_escape_string($_POST['discussion_last_name']);
  $email = $conn->real_escape_string($_POST['discussion_email']);
  $phone = $conn->real_escape_string($_POST['discussion_phone']);
  $address = $conn->real_escape_string($_POST['discussion_address']);
  $subject = $conn->real_escape_string($_POST['discussion_subject']);
  $message = $conn->real_escape_string($_POST['discussion_message']);

  $sql = "INSERT INTO enquiries (first_name, last_name, email, phone, address, subject, message) 
      VALUES ('$first_name', '$last_name', '$email', '$phone', '$address', '$subject', '$message')";
  $conn->query($sql);
}

// Handle enquire form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enquire_submit'])) {
  $first_name = $conn->real_escape_string($_POST['enquire_first_name']);
  $last_name = $conn->real_escape_string($_POST['enquire_last_name']);
  $email = $conn->real_escape_string($_POST['enquire_email']);
  $message = $conn->real_escape_string($_POST['enquire_message']);

  $sql = "INSERT INTO contact_messages (first_name, last_name, email, message) 
      VALUES ('$first_name', '$last_name', '$email', '$message')";
  $conn->query($sql);
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ADIC DELUXE ENGINEERING.</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    /* NAVBAR STYLES */
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

    .menu-toggle {
      display: none;
      font-size: 24px;
      cursor: pointer;
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

    /* ENQUIRE FORM */
    .enquire-form-container {
      position: fixed;
      top: 0;
      right: -400px;
      width: 350px;
      height: 100%;
      background: white;
      box-shadow: -2px 0 5px rgba(0,0,0,0.3);
      padding: 30px 20px;
      transition: right 0.3s ease;
      z-index: 2000;
    }

    .enquire-form-container.show {
      right: 0;
    }

    .close-btn {
      font-size: 24px;
      cursor: pointer;
      position: absolute;
      top: 15px;
      right: 20px;
      color: #333;
    }

    .enquire-form h3 {
      margin-bottom: 20px;
      font-size: 22px;
      color: #a25e2a;
      text-align: center;
    }

    .enquire-form input,
    .enquire-form textarea {
      width: 100%;
      margin-bottom: 15px;
      padding: 12px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .enquire-form button {
      background: #a25e2a;
      color: white;
      font-size: 16px;
      padding: 12px;
      border: none;
      width: 100%;
      cursor: pointer;
      border-radius: 4px;
    }

    .enquire-form button:hover {
      background: #884d1f;
    }

    /* CONTACT SECTION */
    .contact-section {
      text-align: center;
      background-color: #f9f9f9;
    }

    .contact-header {
      padding: 60px 20px 30px;
      background-color: #fff;
    }

    .contact-header h2 {
      font-size: 36px;
      font-weight: bold;
      margin-bottom: 15px;
      color: #1d1b4c;
    }

    .contact-header p {
      font-size: 16px;
      color: #444;
      max-width: 700px;
      margin: 0 auto;
      line-height: 1.6;
    }

    .contact-bg {
      background-image: url('image/Gestão\ de\ Projetos\ de\ Construção_\ Tendências\ atuais\,\ ferramentas\ inovadoras\ e\ segredos\ para\ o\ suc___.jpeg');
      background-size: cover;
      background-position: center;
      height: 400px;
      width: 100%;
    }

    /* PROJECT DISCUSSION */
    .project-discussion {
      display: flex;
      flex-wrap: wrap;
      padding: 40px 20px;
      background-color: #312f2f;
    }

    .discussion-left {
      flex: 1;
      padding: 20px;
      margin-top: 8rem;
    }

    .discussion-left h2 {
      color: #fefeff;
      font-size: 28px;
      margin-bottom: 10px;
    }

    .discussion-left p {
      font-size: 16px;
      color: #c8c0c0;
      line-height: 1.5;
    }

    .discussion-right {
      flex: 1;
      padding: 30px 20px;
      border-radius: 8px;
    }

    .discussion-form {
      display: flex;
      flex-direction: column;
    }

    .discussion-form input,
    .discussion-form textarea {
      margin-bottom: 15px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 15px;
    }

    .discussion-form button {
      background-color: #a25e2a;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
    }

    .discussion-form button:hover {
      background-color: #884d1f;
    }

    /* GOOGLE MAP SECTION */
    .map-section {
      width: 100%;
    }

    

    /* RESPONSIVENESS */
    @media (max-width: 768px) {
      .nav-links {
        display: none;
        flex-direction: column;
        width: 100%;
      }

      .nav-links.show {
        display: flex;
        background-color: #f8f8f8;
        padding: 10px 0;
        border-top: 1px solid #ddd;
      }

      .menu-toggle {
        display: block;
      }

      .navbar {
        flex-direction: column;
        align-items: flex-start;
      }

      .social-enquire {
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
        gap: 10px;
      }

      .discussion-left, .discussion-right {
        flex: 100%;
      }

       .enquire-btn {
    display: none;
  }

  .enquire-form-container {
    display: none;
  }
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
    @media (max-width: 768px) {
      .enquire-btn {
        display: block;
      }

      .enquire-form-container {
        display: block;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar">
    <div class="logo-section">
      <img src="./image/WhatsApp_Image_2025-05-17_at_16.16.59_e38934c5-removebg-preview.png" alt="Logo" class="logo" />
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
    </ul>

    <div class="social-enquire">
      <div class="social-icons">
        <i class="fab fa-linkedin-in"></i>
        <i class="fab fa-facebook-f"></i>
        <i class="fab fa-instagram"></i>
      </div>
      <button class="enquire-btn" onclick="toggleForm()">Enquire <i class="fas fa-chevron-right"></i></button>
    </div>
  </nav>

  <!-- Contact Section -->
  <section class="contact-section">
    <div class="contact-header">
      <h2>Contact Us</h2>
      <p>We'd really like to hear from you, whatever we can help with, whether new enquiries, positive comments or constructive feedback.</p>
    </div>
    <div class="contact-bg"></div>
  </section>

  <!-- Discussion Section -->
  <section class="project-discussion">
   <div class="discussion-left">
  <h2>Start Your Dream Construction Project With Us</h2>
  <p>
    From planning to completion, we bring expertise, quality, and dedication to every step of your construction journey. Let's build something great together.
    <br><br>
    <strong>Email:</strong> <a href="mailto:Adicdeluxe.engineering@gmail.com">Adicdeluxe.engineering@gmail.com</a><br>
    <strong>Location:</strong> Spintex Road, Coastal Estate Junction, Off Okpoi Gonno<br>
    <strong>Phone:</strong> 📞 024 905 7710 / 020 962 0965
  </p>
</div>

    <div class="discussion-right">
      <form class="discussion-form" method="POST" action="">
      <input type="text" name="discussion_first_name" placeholder="First Name" required />
      <input type="text" name="discussion_last_name" placeholder="Last Name" required />
      <input type="email" name="discussion_email" placeholder="Email" required />
      <input type="tel" name="discussion_phone" placeholder="Phone" required />
      <input type="text" name="discussion_address" placeholder="Address" required />
      <input type="text" name="discussion_subject" placeholder="Subject" required />
      <textarea name="discussion_message" placeholder="Type your message here..." rows="5" required></textarea>
      <button type="submit" name="discussion_submit">Submit</button>
      </form>
    </div>
  </section>

  <!-- Google Map -->
  <section class="map-section">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.7524102467045!2d36.82194631613514!3d-1.2920653990787756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f10d4891f5e71%3A0x89e6e0bd8c740fd5!2sNairobi%20CBD!5e0!3m2!1sen!2ske!4v1689933232958!5m2!1sen!2ske"
      width="100%"
      height="400"
      style="border:0;"
      allowfullscreen=""
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </section>

  <!-- Enquire Form Sidebar -->
  <div class="enquire-form-container" id="formContainer">
    <span class="close-btn" onclick="toggleForm()">×</span>
    <form class="enquire-form" method="POST" action="">
      <h3>Contact Us</h3>
      <input type="text" name="enquire_first_name" placeholder="First Name" required />
      <input type="text" name="enquire_last_name" placeholder="Last Name" required />
      <input type="email" name="enquire_email" placeholder="Email" required />
      <textarea name="enquire_message" rows="5" placeholder="Write your message here..." required></textarea>
      <button type="submit" name="enquire_submit">Submit</button>
    </form>
  </div>

  </section>
    <section class="contact">
        <h2>Contact Us</h2>
        <p><strong>Get In Touch With Us!</strong></p>
        <p><a href="mailto:
  <section class="contact">
    <img src="./image/WhatsApp_Image_2025-05-17_at_16.16.59_e38934c5-removebg-preview.png" alt="Company Logo" class="logo" />
    <h2>ADIC DELUXE ENGINEERING</h2>
    <p><strong>Get In Touch With Us!</strong></p>
    <p><a href="mailto:Adicdeluxe.engineering@gmail.com">Adicdeluxe.engineering@gmail.com</a></p>
    <p>Spintex Road, Coastal Estate Junction, Off Okpoi Gonno</p>
    <p>📞 024 905 7710 / 020 962 0965</p>
  </section>

  <!-- Scripts -->
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
