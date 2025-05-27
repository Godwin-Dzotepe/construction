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

// Fetch data from contact_messages
$contact_sql = "SELECT * FROM contact_messages ORDER BY id DESC";
$contact_result = $conn->query($contact_sql);

// Fetch data from enquiries
$enquiry_sql = "SELECT * FROM enquiries ORDER BY id DESC";
$enquiry_result = $conn->query($enquiry_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard - Contact Messages & Enquiries</title>
  <style>
    /* Basic Reset */
    * {
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background: #f7f7f7;
      color: #333;
    }

    /* Navbar styles */
    .navbar {
      background-color: #a25e2a;
      padding: 12px 20px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .navbar ul {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      gap: 40px;
      flex-wrap: wrap;
    }

    .navbar ul li {
      display: inline;
    }

    .navbar ul li a {
      color: white;
      text-decoration: none;
      font-weight: 600;
      font-size: 1.1em;
      padding: 6px 10px;
      display: block;
      transition: background-color 0.3s ease, color 0.3s ease;
      border-radius: 4px;
    }

    .navbar ul li a:hover,
    .navbar ul li a:focus {
      background-color: #ffdb9e;
      color: #312f2f;
      outline: none;
    }

    /* Container */
    .container {
      max-width: 1200px;
      margin: 20px auto 60px auto;
      padding: 0 15px;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
      color: #a25e2a;
    }

    h2 {
      color: #312f2f;
      margin-bottom: 10px;
      border-bottom: 2px solid #a25e2a;
      padding-bottom: 5px;
    }

    /* Tables */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 50px;
      background: white;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    th, td {
      border: 1px solid #ddd;
      padding: 10px 15px;
      text-align: left;
      vertical-align: top;
      word-wrap: break-word;
    }

    th {
      background-color: #a25e2a;
      color: white;
      white-space: nowrap;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    /* Responsive typography for small devices */
    @media (max-width: 768px) {
      .navbar ul {
        gap: 20px;
      }
      .navbar ul li a {
        font-size: 1em;
        padding: 6px 8px;
      }
      h1 {
        font-size: 1.8em;
      }
      h2 {
        font-size: 1.4em;
      }
      table, th, td {
        font-size: 0.9em;
      }
    }

    /* Responsive navbar: stack menu vertically on small screens */
    @media (max-width: 480px) {
      .navbar ul {
        flex-direction: column;
        gap: 10px;
        align-items: center;
      }
      .navbar ul li {
        width: 100%;
        text-align: center;
      }
      .navbar ul li a {
        padding: 10px 0;
        font-size: 1.2em;
      }
      /* Make table horizontally scrollable on small screens */
      table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
      }
      th, td {
        white-space: normal;
      }
    }
  </style>
</head>
<body>

  <nav class="navbar" role="navigation" aria-label="Main Navigation">
    <ul>
      <li><a href="construction.php">Home</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="services.php">Service</a></li>
      <li><a href="portfolio.php">Portfolio</a></li>
    </ul>
  </nav>

  <div class="container">
    <h1>Admin Dashboard</h1>

    <section>
      <h2>Contact Messages</h2>
      <?php if ($contact_result && $contact_result->num_rows > 0): ?>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Message</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $contact_result->fetch_assoc()): ?>
            <tr>
              <td><?= htmlspecialchars($row['id']) ?></td>
              <td><?= htmlspecialchars($row['first_name']) ?></td>
              <td><?= htmlspecialchars($row['last_name']) ?></td>
              <td><?= htmlspecialchars($row['email']) ?></td>
              <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
      <?php else: ?>
        <p>No contact messages found.</p>
      <?php endif; ?>
    </section>

    <section>
      <h2>Enquiries</h2>
      <?php if ($enquiry_result && $enquiry_result->num_rows > 0): ?>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Subject</th>
            <th>Message</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $enquiry_result->fetch_assoc()): ?>
            <tr>
              <td><?= htmlspecialchars($row['id']) ?></td>
              <td><?= htmlspecialchars($row['first_name']) ?></td>
              <td><?= htmlspecialchars($row['last_name']) ?></td>
              <td><?= htmlspecialchars($row['email']) ?></td>
              <td><?= htmlspecialchars($row['phone']) ?></td>
              <td><?= htmlspecialchars($row['address']) ?></td>
              <td><?= htmlspecialchars($row['subject']) ?></td>
              <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
      <?php else: ?>
        <p>No enquiries found.</p>
      <?php endif; ?>
    </section>
  </div>

</body>
</html>
