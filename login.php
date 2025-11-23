<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login – RentEase</title>
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
            <h2>Login to Your Account</h2>
            
            <!-- when Login is clicked, redirect to index.php (you can change this later) -->
            <form method="post" action="index.php">
                <input type="text" name="login_id" placeholder="Login ID or Email" required>
                
                <input type="password" name="password" placeholder="Password" required>
                
                <button type="submit" class="btn full" style="margin-top: 1rem;">Login</button>
            </form>
            
            <p style="margin-top: 1.5rem; text-align: center;">
                Don’t have an account? <a href="register.php">Register here</a>
            </p>
        </div>
    </main>
</body>
</html>
