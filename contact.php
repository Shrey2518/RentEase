<?php 
$prop = isset($_GET['prop']) ? htmlspecialchars($_GET['prop']) : 'Unknown Property';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Owner – RentEase</title>
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
            <h2>Contact Owner – <?= $prop ?></h2>
            
            <!-- just change action here -->
            <form method="post" action="message_success.php">
                <input type="hidden" name="property_id" value="<?= $id ?>">
                <input type="hidden" name="property_title" value="<?= $prop ?>">
                
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <input type="tel" name="phone" placeholder="Your Phone Number">
                <textarea name="message" placeholder="Your message to the property owner..." required></textarea>
                
                <button type="submit" class="btn full">Send Message</button>
            </form>
            
            <p style="margin-top: 1rem; text-align: center;">
                <a href="index.php">← Back to listings</a>
            </p>
        </div>
    </main>
</body>
</html>
