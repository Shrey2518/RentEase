<?php
$properties = [
    [
        "id" => 1,
        "title" => "1BHK Modern Apartment",
        "city" => "Bangalore",
        "rent" => 15000,
        "type" => "Apartment",
        "bedrooms" => 1,
        "bathrooms" => 1,
        "furnished" => true,
        "img" => "https://www.ecolifedevelopers.com/images/slider/4.jpg"
    ],
    [
        "id" => 2,
        "title" => "2BHK Family House",
        "city" => "Chennai",
        "rent" => 12000,
        "type" => "House",
        "bedrooms" => 2,
        "bathrooms" => 2,
        "furnished" => true,
        "img" => "https://images.unsplash.com/photo-1568605114967-8130f3a36994?auto=format&w=600&h=400&fit=crop&q=80"
    ],
    [
        "id" => 3,
        "title" => "Luxury 3BHK Villa",
        "city" => "Mumbai",
        "rent" => 30000,
        "type" => "Villa",
        "bedrooms" => 3,
        "bathrooms" => 3,
        "furnished" => true,
        "img" => "https://images.unsplash.com/photo-1507089947368-19c1da9775ae?auto=format&w=600&h=400&fit=crop&q=80"
    ],
    [
        "id" => 4,
        "title" => "Premium PG for Girls",
        "city" => "Bangalore",
        "rent" => 8000,
        "type" => "PG",
        "bedrooms" => 1,
        "bathrooms" => 1,
        "furnished" => true,
        "img" => "https://images.unsplash.com/photo-1586023492125-27b2c045efd7?auto=format&w=600&h=400&fit=crop&q=80"
    ],
    [
        "id" => 5,
        "title" => "Student Hostel Near College",
        "city" => "Delhi",
        "rent" => 5000,
        "type" => "Hostel",
        "bedrooms" => 1,
        "bathrooms" => 1,
        "furnished" => true,
        "img" => "https://content.jdmagicbox.com/comp/def_content/hostel-for-students/24c5c5ead5-hostel-for-students-2-qyhl6.jpg"
    ],
    [
        "id" => 6,
        "title" => "Studio Apartment",
        "city" => "Hyderabad",
        "rent" => 10000,
        "type" => "Apartment",
        "bedrooms" => 1,
        "bathrooms" => 1,
        "furnished" => false,
        "img" => "https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?auto=format&w=600&h=400&fit=crop&q=80"
    ],
    [
        "id" => 7,
        "title" => "3BHK Luxury Apartment",
        "city" => "Mumbai",
        "rent" => 25000,
        "type" => "Apartment",
        "bedrooms" => 3,
        "bathrooms" => 2,
        "furnished" => true,
        "img" => "https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&w=600&h=400&fit=crop&q=80"
    ],
    [
        "id" => 8,
        "title" => "Boys PG with Food",
        "city" => "Pune",
        "rent" => 7000,
        "type" => "PG",
        "bedrooms" => 1,
        "bathrooms" => 1,
        "furnished" => true,
        "img" => "https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?auto=format&w=600&h=400&fit=crop&q=80"
    ],
    [
        "id" => 9,
        "title" => "Working Women Hostel",
        "city" => "Bangalore",
        "rent" => 9000,
        "type" => "Hostel",
        "bedrooms" => 1,
        "bathrooms" => 1,
        "furnished" => true,
        "img" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSYMm2EpQmv5umv40U85sD8ZmMqAEhjMX5U9g&s"
    ],
    [
        "id" => 10,
        "title" => "2BHK Semi-Furnished",
        "city" => "Chennai",
        "rent" => 14000,
        "type" => "Apartment",
        "bedrooms" => 2,
        "bathrooms" => 2,
        "furnished" => false,
        "img" => "https://images.unsplash.com/photo-1592595896616-c37162298647?auto=format&w=600&h=400&fit=crop&q=80"
    ]
];

$filter_city      = isset($_GET['city']) ? trim($_GET['city']) : '';
$filter_price     = isset($_GET['price']) ? (int)$_GET['price'] : 0;
$filter_type      = isset($_GET['type']) ? trim($_GET['type']) : '';
$filter_bedrooms  = isset($_GET['bedrooms']) ? (int)$_GET['bedrooms'] : 0;

$filtered_properties = array_filter($properties, function($property) use ($filter_city, $filter_price, $filter_type, $filter_bedrooms) {
    if ($filter_city     && $property['city']      !== $filter_city)     return false;
    if ($filter_price    && $property['rent']      >   $filter_price)    return false;
    if ($filter_type     && $property['type']      !== $filter_type)     return false;
    if ($filter_bedrooms && $property['bedrooms']  !=  $filter_bedrooms) return false;
    return true;
});
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>RentEase - Find Your Perfect Rental</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="rent.css">

    <!-- Layout fix: title on first row, filters on second row -->
    <style>
        .filter-row {
            display: block;          /* stack children: title then form */
        }

        .filter-title {
            margin-bottom: 1.5rem;
        }

        .filter-form {
            width: 100%;
        }

        /* filters all in one row */
        .filter-grid {
            display: flex;
            flex-wrap: nowrap;
            gap: 1rem;
            align-items: flex-end;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            min-width: 160px;
        }

        .filter-group:last-child .filter-btn {
            width: auto;
            white-space: nowrap;
        }

        @media (max-width: 768px) {
            .filter-grid {
                flex-wrap: wrap;  /* wrap on small screens */
            }
        }
    </style>
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
        <section class="filter-section">
            <div class="filter-row">
                <!-- ROW 1 -->
                <h2 class="filter-title">Find Your Perfect Rental</h2>

                <!-- ROW 2 -->
                <form method="GET" class="filter-form" aria-label="Filter properties">
                    <div class="filter-grid">
                        <div class="filter-group">
                            <label for="city">City</label>
                            <select name="city" id="city">
                                <option value="">All Cities</option>
                                <option value="Bangalore" <?= $filter_city == 'Bangalore' ? 'selected' : '' ?>>Bangalore</option>
                                <option value="Chennai"   <?= $filter_city == 'Chennai'   ? 'selected' : '' ?>>Chennai</option>
                                <option value="Mumbai"    <?= $filter_city == 'Mumbai'    ? 'selected' : '' ?>>Mumbai</option>
                                <option value="Delhi"     <?= $filter_city == 'Delhi'     ? 'selected' : '' ?>>Delhi</option>
                                <option value="Hyderabad" <?= $filter_city == 'Hyderabad' ? 'selected' : '' ?>>Hyderabad</option>
                                <option value="Pune"      <?= $filter_city == 'Pune'      ? 'selected' : '' ?>>Pune</option>
                            </select>
                        </div>

                        <div class="filter-group">
                            <label for="type">Property Type</label>
                            <select name="type" id="type">
                                <option value="">All Types</option>
                                <option value="Apartment" <?= $filter_type == 'Apartment' ? 'selected' : '' ?>>Apartment</option>
                                <option value="House"     <?= $filter_type == 'House'     ? 'selected' : '' ?>>House</option>
                                <option value="Villa"     <?= $filter_type == 'Villa'     ? 'selected' : '' ?>>Villa</option>
                                <option value="PG"        <?= $filter_type == 'PG'        ? 'selected' : '' ?>>PG</option>
                                <option value="Hostel"    <?= $filter_type == 'Hostel'    ? 'selected' : '' ?>>Hostel</option>
                            </select>
                        </div>

                        <div class="filter-group">
                            <label for="price">Max Budget</label>
                            <select name="price" id="price">
                                <option value="0">Any Budget</option>
                                <option value="5000"  <?= $filter_price == 5000  ? 'selected' : '' ?>>Below 5,000</option>
                                <option value="10000" <?= $filter_price == 10000 ? 'selected' : '' ?>>Below 10,000</option>
                                <option value="15000" <?= $filter_price == 15000 ? 'selected' : '' ?>>Below 15,000</option>
                                <option value="20000" <?= $filter_price == 20000 ? 'selected' : '' ?>>Below 20,000</option>
                                <option value="30000" <?= $filter_price == 30000 ? 'selected' : '' ?>>Below 30,000</option>
                            </select>
                        </div>

                        <div class="filter-group">
                            <label for="bedrooms">Bedrooms</label>
                            <select name="bedrooms" id="bedrooms">
                                <option value="0">Any</option>
                                <option value="1" <?= $filter_bedrooms == 1 ? 'selected' : '' ?>>1 BHK</option>
                                <option value="2" <?= $filter_bedrooms == 2 ? 'selected' : '' ?>>2 BHK</option>
                                <option value="3" <?= $filter_bedrooms == 3 ? 'selected' : '' ?>>3 BHK</option>
                            </select>
                        </div>

                        <div class="filter-group">
                            <label>&nbsp;</label>
                            <button type="submit" class="filter-btn">Apply Filters</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <section class="listing-grid" aria-live="polite">
            <?php if (count($filtered_properties) > 0): ?>
                <?php foreach($filtered_properties as $property): ?>
                    <article class="card listing">
                        <div class="img-wrap">
                            <img src="<?= htmlspecialchars($property['img']) ?>" 
                                 alt="<?= htmlspecialchars($property['title']) ?>" 
                                 loading="lazy"
                                 onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDAwIiBoZWlnaHQ9IjMwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZjBmMGYwIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZm9udC1zaXplPSIxNCIgZmlsbD0iIzk5OSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPkltYWdlIE5vdCBBdmFpbGFibGU8L3RleHQ+PC9zdmc+'">
                        </div>

                        <div class="card-body">
                            <span class="property-type"><?= htmlspecialchars($property['type']) ?></span>
                            <h3><?= htmlspecialchars($property['title']) ?></h3>
                            <p class="meta">
                                <span>₹<?= number_format($property['rent']) ?></span>
                                <span class="sep">/</span>
                                <span class="duration">month</span>
                            </p>
                            <p class="city">📍 <?= htmlspecialchars($property['city']) ?></p>
                            
                            <div class="property-features">
                                <?php if (in_array($property['type'], ['Apartment', 'House', 'Villa'])): ?>
                                    <span class="feature">🛏️ <?= $property['bedrooms'] ?> BHK</span>
                                    <span class="feature">🚿 <?= $property['bathrooms'] ?> Bath</span>
                                    <span class="feature"><?= $property['furnished'] ? '🪑 Furnished' : '📦 Semi-Furnished' ?></span>
                                <?php else: ?>
                                    <span class="feature">✅ Food Included</span>
                                    <span class="feature">🔒 Security</span>
                                    <span class="feature">🧼 Cleaning</span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="card-footer">
                            <a class="btn full" href="contact.php?prop=<?= urlencode($property['title']) ?>&id=<?= $property['id'] ?>">
                                Contact Owner
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-properties">
                    <h3>No properties found</h3>
                    <p>Try adjusting your filters or <a href="index.php">clear all filters</a> to see more properties.</p>
                </div>
            <?php endif; ?>
        </section>

        <footer class="sitefooter">
            <p>© <?= date('Y') ?> RentEase • Find your perfect home without brokerage fees</p>
        </footer>
    </main>
</body>
</html>
