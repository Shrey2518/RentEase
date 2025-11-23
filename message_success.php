<?php
// Get property title from form (optional – just for display)
$prop = isset($_POST['property_title']) ? htmlspecialchars($_POST['property_title']) : 'the property';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Message Sent – RentEase</title>
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
    <div class="container" style="text-align:center;">
        <h2>Message Sent Successfully ✅</h2>
        <p>Your message about <strong><?php echo $prop; ?></strong> has been sent.</p>
        <p>The owner will contact you soon.</p>

        <p style="margin-top: 1.5rem;">
            <a href="index.php">← Back to listings</a>
        </p>
    </div>
</main>
</body>
</html>
