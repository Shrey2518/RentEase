<?php
$title       = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : 'the property';
$city        = isset($_POST['city']) ? htmlspecialchars($_POST['city']) : '';
$rent        = isset($_POST['rent']) ? htmlspecialchars($_POST['rent']) : '';
$description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';
$edit_mode   = isset($_POST['property_id']) && $_POST['property_id'] !== '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Property Saved – RentEase</title>
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
        <h2>
            <?php if ($edit_mode): ?>
                Property Updated Successfully ✅
            <?php else: ?>
                Property Added Successfully ✅
            <?php endif; ?>
        </h2>

        <p>Your property <strong><?php echo $title; ?></strong> has been saved.</p>

        <?php if ($city !== '' || $rent !== ''): ?>
            <p>
                <?php if ($city !== ''): ?>
                    Location: <strong><?php echo $city; ?></strong><br>
                <?php endif; ?>
                <?php if ($rent !== ''): ?>
                    Rent: <strong>₹<?php echo $rent; ?></strong>
                <?php endif; ?>
            </p>
        <?php endif; ?>

        <?php if ($description !== ''): ?>
            <p style="margin-top:1rem; max-width:600px; margin-left:auto; margin-right:auto;">
                <em><?php echo $description; ?></em>
            </p>
        <?php endif; ?>

        <p style="margin-top: 1.5rem;">
            <a href="index.php">← Back to listings</a> |
            <a href="addproperty.php">Add another property</a>
        </p>
    </div>
</main>
</body>
</html>
