<?php
session_start();

// DB connection
$host = 'localhost';
$db   = 'adic_deluxe_db';  // your DB name
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB connection failed: " . $e->getMessage());
}

$error = '';

// Process login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username && $password) {
        $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
        $stmt->execute([$username]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin) {
            // For plain text password comparison (not recommended for production)
            if ($password === $admin['password']) {
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_username'] = $username;
                header("Location: dashboard.php"); // Redirect to dashboard page after login
                exit;
            } else {
                $error = "Invalid username or password.";
            }
        } else {
            $error = "Invalid username or password.";
        }
    } else {
        $error = "Please enter username and password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0; padding: 0;
        }
        .login-container {
            max-width: 350px;
            margin: 60px auto;
            background: #fff;
            padding: 30px 24px 24px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 24px;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 12px;
            font-weight: 600;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px 8px;
            margin-top: 4px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
            box-sizing: border-box;
        }
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1em;
            cursor: pointer;
            transition: background 0.2s ease;
        }
        button[type="submit"]:hover {
            background: #0056b3;
        }
        .error-message {
            color: #d8000c;
            background: #ffd2d2;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 16px;
            text-align: center;
        }
        @media (max-width: 480px) {
            .login-container {
                margin: 24px 8px;
                padding: 18px 8px 16px 8px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <?php if ($error): ?>
            <div class="error-message"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input id="username" type="text" name="username" required autofocus>

            <label for="password">Password:</label>
            <input id="password" type="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
