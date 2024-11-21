<?php
require_once "./Product.php";

$product1 = new Product();
$product2 = new Product();
$product3 = new Product();

$product1->name = "Laptop";
$product1->price = 1500.99;
$product1->brand = "TechBrand";
$product1->description1 = "A high-performance laptop with 16GB RAM and 1TB SSD. Perfect for work and entertainment.";
$product1->description2 = "Additional features and specs";
$product1->tax = 15;

$product2->name = "Smartphone";
$product2->price = 799.49;
$product2->brand = "MobileTech";
$product2->description1 = "Latest smartphone with excellent camera quality. Sleek design with long battery life.";
$product2->description2 = "Additional features and specs";
$product2->tax = 10;

$product3->name = "Headphones";
$product3->price = 199.99;
$product3->brand = "SoundPro"; 
$product3->description1 = "Noise-canceling headphones for immersive sound. Lightweight and comfortable for all-day use.";
$product3->description2 = "Additional features and specs";
$product3->tax = 5;

// Store products in an array
$products = [$product1, $product2, $product3];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Our Products</title>
</head>
<body>
    <main class="main flow">
        <h1 class="main__heading">Our Products</h1>
        <div class="main__cards cards">
            <div class="cards__inner">
                <?php foreach ($products as $product): ?>
                    <div class="cards__card card">
                        <h2 class="card__heading"><?= $product->name; ?></h2>
                        <p class="card__price">$<?= $product->price; ?></p>
                        <p class="card__brand">Brand: <?= $product->brand; ?></p>
                        <p class="card__description"><?= $product->description1; ?></p>
                        <ul role="list" class="card__bullets flow">
                            <li>Tax: <?php echo $product->tax; ?>%</li>
                            <li><?= $product->description2; ?></li>
                        </ul>
                        <a href="#<?php echo strtolower($product->name); ?>" class="card__cta cta">Learn More</a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="overlay cards__inner"></div>
        </div>
    </main>
    <script src="main.js"></script>
</body>
</html>
