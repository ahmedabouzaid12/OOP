<?php
class Employee {
    var $name;
    var $email;
    var $salary;
    var $is_manager = false;
    var $address;

    function checkFromManager() {
        return $this->is_manager ? "Manager" : "Not Manager";
    }

    function managerTextColor() {
        return $this->is_manager ? "text-success" : "text-danger";
    }

    function checkSalary() {
        return floatval($this->salary) > 9000 ? "primary" : "warning";
    }
}