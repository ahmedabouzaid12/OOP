<?php

class Product{
    public $name ;
    public $price;
    public $description;
    public $image;
    private $discount = 0; // Default discount percentage


        // Method to upload an image for the product
    public function uploadImage($imagePath) {
        // Check if the file exists in the specified path
        if (file_exists($imagePath)) {
            // Assuming the image is successfully uploaded
            $this->image = $imagePath;
            return "Image uploaded successfully.";
        } else {
            return "Image upload failed. File does not exist.";
        }
    }

    // Method to calculate the final price after applying discount
    public function calcPrice() {
        // Calculate price after discount
        $finalPrice = $this->price - ($this->price * $this->discount / 100);
        return $finalPrice;
    }

}