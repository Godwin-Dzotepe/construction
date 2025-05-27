<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ADIC DELUXE ENGINEERING.</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f5f5f5;
      color: #333;
    }

    header {
      background: #2d3e50;
      color: white;
      padding: 2rem 1rem;
      text-align: center;
    }

    header h1 {
      margin-bottom: 0.5rem;
    }

    nav {
      background: #1f2c3a;
      padding: 1rem;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
      position: relative;
    }

    .menu-toggle {
      display: none;
      font-size: 1.5rem;
      color: white;
      background: none;
      border: none;
      position: absolute;
      left: 1rem;
    }

    .nav-links {
      list-style: none;
      display: flex;
      gap: 2rem;
      margin: 0;
      padding: 0;
      align-items: center;
      flex-wrap: wrap;
    }

    .nav-links li {
      position: relative;
    }

    .nav-links a {
      color: white;
      text-decoration: none;
      font-weight: 500;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      top: 100%;
      left: 0;
      background: #2d3e50;
      min-width: 200px;
      z-index: 1000;
      flex-direction: column;
      border-radius: 4px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    .dropdown-content a {
      padding: 0.7rem 1rem;
      color: white;
      text-decoration: none;
      display: block;
    }

    .dropdown:hover .dropdown-content {
      display: flex;
    }

    .container {
      max-width: 1200px;
      margin: 2rem auto;
      padding: 0 1rem;
    }

    .section-box {
      background: white;
      padding: 1.5rem;
      border-radius: 8px;
      margin-bottom: 2rem;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .section-box h2 {
      margin-top: 0;
      color: #2d3e50;
    }

    .gallery {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
      justify-content: center;
    }

    .gallery img {
      width: 100%;
      max-width: 320px;
      height: auto;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
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
      .menu-toggle {
        display: block;
      }

      .nav-links {
        flex-direction: column;
        display: none;
        width: 100%;
        background: #1f2c3a;
        margin-top: 1rem;
        text-align: center;
      }

      .nav-links.active {
        display: flex;
      }

      .nav-links li {
        padding: 0.7rem 0;
        border-top: 1px solid #444;
      }

      .dropdown-content {
        position: relative;
        box-shadow: none;
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
    }
  </style>
</head>
<body>

  <nav>
    <button class="menu-toggle" onclick="toggleMenu()">☰</button>
    <ul class="nav-links" id="navLinks">
      <li><a href="construction.php">Home</a></li>
      <li><a href="portfolio.php">Portfolio</a></li>
        </div>
      </li>
      <li><a href="contact.php">Contact</a></li>
    </ul>
  </nav>

  <header>
    <h1>ADIC DELUXE ENGINEERING.</h1>
    <p>Building & Civil Engineering Contractors</p>
  </header>

  <div class="container">
    <!-- Installation Expert Section -->
    <section id="installation" class="section-box">
      <h2>Installation Expert</h2>
      <p>
        Our Installation Experts specialize in precise and safe setup of mechanical, electrical, and structural systems. Whether it’s a new build or retrofit project, we guarantee efficiency, compliance, and quality you can trust.
      </p>
      <div class="gallery">
        <img src="./image/Solar Panel Cleaning 101.jpeg" alt="Installing structural steel railings">
        <img src="./image/Skylights & Metal Roofing_ Yes!.jpeg" alt="Expert team handling equipment installation">
        <img src="./image/Installera automatisk bevattning av gräsmattan - steg för steg.jpeg" alt="">
        <img src="./image/efd9784d-19fb-43f3-b253-1c186ceb0475.jpeg" alt="">
        <img src="./image/Expert Tips for an Easy Faucet Installation.jpeg" alt="">
      </div>
    </section>

    <!-- Stainless Balustrade Section -->
    <section id="balustrade" class="section-box">
      <h2>Stainless Balustrade</h2>
      <p>
        Our stainless steel balustrades are crafted for durability, elegance, and safety. Ideal for stairs, balconies, and outdoor railings, we combine form with function to enhance your space with modern aesthetics.
      </p>
      <div class="gallery">
        <img src="./image/Balcones.jpeg" alt="Modern stainless balustrade on balcony">
        <img src="./image/download (7).jpeg" alt="Curved staircase with stainless railings">
        <img src="./image/download (6).jpeg" alt="">
        <img src="./image/download (4).jpeg" alt="">
        <img src="./image/steel railing.jpeg" alt="">
      </div>
    </section>
  </div>

    <section class="contact">
    <img src="./image/WhatsApp_Image_2025-05-17_at_16.16.59_e38934c5-removebg-preview.png" alt="Company Logo" class="logo" />
    <h2>ADIC DELUXE ENGINEERING</h2>
    <p><strong>Get In Touch With Us!</strong></p>
    <p><a href="mailto:Adicdeluxe.engineering@gmail.com">Adicdeluxe.engineering@gmail.com</a></p>
    <p>Spintex Road, Coastal Estate Junction, Off Okpoi Gonno</p>
    <p>📞 024 905 7710 / 020 962 0965</p>
  </section>

  <script>
    function toggleMenu() {
      document.getElementById('navLinks').classList.toggle('active');
    }
  </script>

</body>
</html>
