<?php
class Book extends Product {
    // Properties
    private $publishers = [];
    public $writer;
    public $color;
    public $supplier;

    // Method to add a publisher to the publishers list
    public function setPublisher($publisher) {
        $this->publishers[] = $publisher;
    }

    // Method to show all publishers as a list
    public function showAllPublishers() {
        if (!empty($this->publishers)) {
            // Loop through the publishers and output each one
            foreach ($this->publishers as $publisher) {
                echo $publisher . "<br>";
            }
        } else {
            echo "No publishers available.";
        }
    }

    // Method to randomly choose a publisher from the list
    public function choosePublisher() {
        if (!empty($this->publishers)) {
            // Select a random key from the publishers array
            $publisher_rand = array_rand($this->publishers);
            return $this->publishers[$publisher_rand];
        } else {
            return "No publishers available.";
        }
    }
}
