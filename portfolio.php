<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>My Portfolio</title>
  <style>
    body {
      font-family: 'Segoe UI', Arial, sans-serif;
      margin: 0;
      background: #f4f4f4;
      color: #222;
    }
    header {
      background: #2d3e50;
      color: #fff;
      padding: 2rem 1rem;
      text-align: center;
    }
    header h1 {
      margin: 0 0 0.5rem 0;
      font-size: 2.5rem;
    }
    header p {
      margin: 0;
      font-size: 1.2rem;
    }
    nav {
      background: #1f2c3a;
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 1rem;
    }
    .nav-links {
      display: flex;
      gap: 1.5rem;
      list-style: none;
    }
    .nav-links a {
      color: #fff;
      text-decoration: none;
      font-weight: 500;
    }
    .dropdown {
      position: relative;
    }
    .dropdown-content {
      display: none;
      position: absolute;
      background: #2d3e50;
      top: 100%;
      left: 0;
      min-width: 200px;
      z-index: 1000;
      flex-direction: column;
    }
    .dropdown-content a {
      padding: 0.5rem 1rem;
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
    .about {
      background: #fff;
      padding: 1.5rem;
      border-radius: 8px;
      margin-bottom: 2rem;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    .portfolio-grid {
      display: flex;
      flex-wrap: wrap;
      gap: 1.5rem;
      justify-content: center;
    }
    .portfolio-item {
      background: #fff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(0,0,0,0.07);
      transition: transform 0.2s;
      width: 280px;
      flex-shrink: 0;
    }
    .portfolio-item:hover {
      transform: translateY(-5px) scale(1.02);
    }
    .portfolio-item img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      display: block;
    }
    .portfolio-item .info {
      padding: 1rem;
    }
    .portfolio-item .info h3 {
      margin: 0 0 0.5rem 0;
      font-size: 1.1rem;
    }
    .portfolio-item .info p {
      margin: 0;
      font-size: 0.95rem;
      color: #555;
    }
    @media (max-width: 600px) {
      .portfolio-item {
        width: 100%;
      }
    }
  </style>
</head>
<body>

  <nav>
    <ul class="nav-links" id="navLinks">
      <li><a href="construction.php">Home</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li class="dropdown">
        <a href="Installation_Expert.php">Services ▾</a>
        </div>
      </li>
    </ul>
  </nav>

  <header>
    <h1>ADIC DELUXE ENGINEERING.</h1>
    <p>Building & Civil Engineering Contractors</p>
  </header>

  <div class="container">
    <section class="about">
      <h2>About Me</h2>
      <p>
        We are experienced Building & Civil Engineering Contractors, dedicated to delivering quality construction solutions for residential, commercial, and infrastructure projects. Our team ensures every project is completed safely, efficiently, and to the highest standards.
      </p>
    </section>

    <section>
      <h2>My Work</h2>
      <div class="portfolio-grid">

        <!-- Portfolio Items -->
        <div class="portfolio-item">
          <img src="./image/IMG-20250518-WA0070.jpg" alt="Efficient use of modern construction equipment on-site">
          <div class="info">
            <h3>Heavy Equipment</h3>
            <p class="image-desc"></p>
          </div>
        </div>

        <div class="portfolio-item">
          <img src="./image/steel railing.jpeg" alt="Steel framework and railing installation in progress">
          <div class="info">
            <h3>Steel Framework</h3>
            <p class="image-desc"></p>
          </div>
        </div>

        <div class="portfolio-item">
          <img src="./image/IMG-20250517-WA0083.jpg" alt="Stockyard filled with construction materials like sand, gravel, and cement">
          <div class="info">
            <h3>Material Yard</h3>
            <p class="image-desc"></p>
          </div>
        </div>

        <div class="portfolio-item">
          <img src="./image/IMG-20250517-WA0084.jpg" alt="Ongoing infrastructure construction site with foundation and structure">
          <div class="info">
            <h3>Infrastructure Project</h3>
            <p class="image-desc"></p>
          </div>
        </div>

        <div class="portfolio-item">
          <img src="./image/IMG-20250517-WA0085.jpg" alt="Road construction underway with heavy machinery and site leveling">
          <div class="info">
            <h3>Roadwork</h3>
            <p class="image-desc"></p>
          </div>
        </div>

        <div class="portfolio-item">
          <img src="./image/WhatsApp Image 2025-05-17 at 19.13.28_0d2818a9.jpg" alt="Newly completed building structure ready for occupancy">
          <div class="info">
            <h3>Finished Building</h3>
            <p class="image-desc"></p>
          </div>
        </div>

        <div class="portfolio-item">
          <img src="./image/IMG-20250517-WA0086.jpg" alt="Multi-level building construction in progress with workers on site">
          <div class="info">
            <h3>Building Construction</h3>
            <p class="image-desc"></p>
          </div>
        </div>

        <div class="portfolio-item">
          <img src="./image/IMG-20250517-WA0077.jpg" alt="Excavation for foundation work with heavy equipment">
          <div class="info">
            <h3>Excavation Project</h3>
            <p class="image-desc"></p>
          </div>
        </div>

        <div class="portfolio-item">
          <img src="./image/IMG-20250517-WA0078.jpg" alt="Concrete foundation being laid for a new structure">
          <div class="info">
            <h3>Foundation Work</h3>
            <p class="image-desc"></p>
          </div>
        </div>

        <div class="portfolio-item">
          <img src="./image/steel railing.jpeg" alt="Installation of stainless steel railings for safety and aesthetics">
          <div class="info">
            <h3>Steel Railing</h3>
            <p class="image-desc"></p>
          </div>
        </div>

        <div class="portfolio-item">
          <img src="./image/IMG-20250517-WA0080.jpg" alt="Interior and exterior walls under plastering stage">
          <div class="info">
            <h3>Plastering Stage</h3>
            <p class="image-desc"></p>
          </div>
        </div>

        <div class="portfolio-item">
          <img src="./image/IMG-20250517-WA0081.jpg" alt="Final touch-ups and detailing before handover">
          <div class="info">
            <h3>Final Touches</h3>
            <p class="image-desc"></p>
          </div>
        </div>

        <div class="portfolio-item">
          <img src="./image/IMG-20250517-WA0082.jpg" alt="Modern apartment building completed and painted">
          <div class="info">
            <h3>Completed Apartment</h3>
            <p class="image-desc"></p>
          </div>
        </div>

        <div class="portfolio-item">
          <img src="./image/WhatsApp Image 2025-05-17 at 19.18.52_bdc5d95d.jpg" alt="Residential house with landscaping and exterior finishes">
          <div class="info">
            <h3>Residential House</h3>
            <p class="image-desc"></p>
          </div>
        </div>

        <div class="portfolio-item">
          <img src="./image/Skylights & Metal Roofing_ Yes!.jpeg" alt="Construction equipment on a roof project with skylights">
          <div class="info">
            <h3>Machinery in Use</h3>
            <p class="image-desc"></p>
          </div>
        </div>

        <div class="portfolio-item">
          <img src="./image/STAINLESS STEEL RAILING BALUSTRADE AND STAIRS DESIGN.jpeg" alt="Training or demonstration area for staircase railing installation">
          <div class="info">
            <h3>Construction Workshop</h3>
            <p class="image-desc"></p>
          </div>
        </div>

      </div>
    </section>
  </div>

  <script>
    // Dynamically fill in image descriptions from alt attributes
    document.querySelectorAll('.portfolio-item').forEach(item => {
      const img = item.querySelector('img');
      const desc = item.querySelector('.image-desc');
      if (img && desc) {
        desc.textContent = img.alt;
      }
    });
  </script>

</body>
</html>
