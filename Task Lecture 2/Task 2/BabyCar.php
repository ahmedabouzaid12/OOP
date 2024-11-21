<?php
class BabyCar extends Product {
    public $age;
    public $weight;
    private $materials = [];
    private $special_tax = 11;

    // Method to add material to the materials list
    public function setMaterials($material) {
        $this->materials[] = $material;
    }

    // Method to display all materials in the list
    public function displayMaterials() {
        if (!empty($this->materials)) {
            foreach ($this->materials as $material) {
                echo $material . "<br>";
            }
        } else {
            echo "No materials available.";
        }
    }

    // Method to calculate the final price including special tax
    public function getFinalPrice() {
        // Ensure price is defined in the parent Product class
        return $this->price + $this->special_tax;
    }
}
