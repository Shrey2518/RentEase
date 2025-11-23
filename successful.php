<?php
// successful.php – handle registration form and store into MySQL

// 1. Database connection (XAMPP defaults)
$host   = "localhost";
$user   = "root";
$pass   = "";
$dbname = "rentease_db";

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Only process POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form values
    $name     = trim($_POST['name'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $role     = $_POST['role'] ?? '';

    // Basic validation
    if ($name === '' || $email === '' || $password === '' || $role === '') {
        $error_message = "Please fill in all fields.";
        $success = false;
    } else {
        // Hash password before storing
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // 3. Insert into users table using prepared statement
        $stmt = $conn->prepare(
            "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)"
        );

        if (!$stmt) {
            $error_message = "Prepare failed: " . $conn->error;
            $success = false;
        } else {
            $stmt->bind_param("ssss", $name, $email, $password_hash, $role);

            if ($stmt->execute()) {
                $success = true;
            } else {
                // common issue: duplicate email (UNIQUE constraint)
                $error_message = "Could not save user: " . $stmt->error;
                $success = false;
            }

            $stmt->close();
        }
    }
} else {
    // If someone opens this file directly, send them back to register
    header("Location: register.php");
    exit;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration – RentEase</title>
    <link rel="stylesheet" href="rent.css">
</head>
<body>
    <header class="sitebar">
        <div class="brand">🏠 RentEase</div>
        <nav class="mainnav" aria-label="Main navigation">
            <a href="index.php" class="navlink">Home</a>
            <a href="addproperty.php" class="navlink">Post Property</a>
            <a href="register.php" class="navlink">Register</a>
            <a href="contact.php" class="navlink">Contact</a>
        </nav>
    </header>

    <main class="page">
        <div class="container">
            <?php if (!empty($success)): ?>
                <h2>Registration Successful ✅</h2>
                <p>Welcome, <strong><?= htmlspecialchars($name) ?></strong>! Your account has been created.</p>

                <p style="margin-top: 1.5rem;">
                    <a href="login.php" class="btn outline">Go to Login</a>
                </p>
            <?php else: ?>
                <h2>Registration Failed ❌</h2>
                <p><?= htmlspecialchars($error_message ?? 'Unknown error.') ?></p>

                <p style="margin-top: 1.5rem;">
                    <a href="register.php" class="btn outline">Back to Register</a>
                </p>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
