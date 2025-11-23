<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register – RentEase</title>
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
            <h2>Create an Account</h2>
            
            <form method="post" action="successful.php">
                <input type="text" name="name" placeholder="Full Name" required>
                
                <input type="email" name="email" placeholder="Email Address" required>
                
                <input type="password" name="password" placeholder="Password" required minlength="6">
                
                <select name="role" required>
                    <option value="">Select Role</option>
                    <option value="User">User</option>
                    <option value="Owner">Owner / Landlord</option>
                </select>
                
                <button type="submit" class="btn full" style="margin-top: 1rem;">Register</button>
            </form>
            
            <p style="margin-top: 1.5rem; text-align: center;">
                Already have an account? <a href="login.php">Login here</a>
            </p>
        </div>
    </main>
</body>
</html>
