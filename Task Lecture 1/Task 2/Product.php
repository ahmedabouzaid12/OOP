<?php
class Product {
    var $name;
    var $price;
    var $brand;
    var $description1;
    var $description2;
    var $tax;

    function getName() {
        return "Product Name: " . $this->name;
    }

    function priceAfterDiscount($discount) {
        $discountAmount = $this->price * ($discount / 100);
        return $this->price - $discountAmount;
    }

    function getFinalPrice($discount) {
        $priceAfterDiscount = $this->priceAfterDiscount($discount);
        $taxAmount = $priceAfterDiscount * ($this->tax / 100);
        return $priceAfterDiscount + $taxAmount;        
    }
}