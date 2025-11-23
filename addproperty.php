<?php
$edit_mode   = isset($_GET['edit']);
$property_id = $edit_mode ? intval($_GET['edit']) : 0;
$page_title  = $edit_mode ? 'Edit Property' : 'Add Property';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $page_title ?> – RentEase</title>
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
            <h2><?= $page_title ?></h2>
            
            <!-- CHANGED: action now goes to property_success.php -->
            <form method="post" action="property_success.php">
                <?php if ($edit_mode): ?>
                    <input type="hidden" name="property_id" value="<?= $property_id ?>">
                <?php endif; ?>
                
                <input type="text" name="title" placeholder="Property Title" required>
                <input type="text" name="city" placeholder="City" required>
                <input type="number" name="rent" placeholder="Rent (₹)" min="1" required>
                <input type="text" name="image_url" placeholder="Image URL (optional)">
                <textarea name="description" placeholder="Property description..."></textarea>
                
                <button type="submit" class="btn full">
                    <?= $edit_mode ? 'Update Property' : 'Add Property' ?>
                </button>
            </form>
            
            <p style="margin-top: 1rem; text-align: center;">
                <a href="index.php">← Back to listings</a>
            </p>
        </div>
    </main>
</body>
</html>
