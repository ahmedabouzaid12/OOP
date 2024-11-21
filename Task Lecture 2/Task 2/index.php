<?php



// Create a Product object
require_once "./Product.php";
$product = new Product();
$product->name = "Gaming Laptop";
$product->price = 1500;
$product->description = "High-performance laptop for gaming and heavy tasks.";

// Upload an image
$imageStatus = $product->uploadImage("path/to/laptop_image.jpg");
echo $imageStatus . "<br>";

// Calculate and display the final price after discount
echo "Product Name: " . $product->name . "<br>";
echo "Description: " . $product->description . "<br>";
echo "Original Price: $" . $product->price . "<br>";
echo "Final Price after discount: $" . $product->calcPrice() . "<br>";



// Creating a new Book object
require_once "./Book.php";
$book = new Book();
$book->setPublisher("Publisher A");
$book->setPublisher("Publisher B");
$book->setPublisher("Publisher C");
$book->setPublisher("Publisher D");
$book->setPublisher("Publisher E");

// Displaying all publishers
$book->showAllPublishers(); 

// Choosing a random publisher
echo $book->choosePublisher(); // Output: Randomly chosen publisher from the list



// Creating a new BabyCar object
require_once "./BabyCar.php";
$babyCar = new BabyCar();
$babyCar->name = "Luxury Baby Car";
$babyCar->price = 100; // Base price for the product
$babyCar->age = 2;
$babyCar->weight = 15;

// Adding materials to the BabyCar
$babyCar->setMaterials("Plastic");
$babyCar->setMaterials("Metal Frame");
$babyCar->setMaterials("Soft Cushion");

// Displaying all materials
echo "Materials used in the baby car:<br>";
$babyCar->displayMaterials();

// Calculating and displaying the final price with the special tax
echo "Final Price: " . $babyCar->getFinalPrice() . " $";
