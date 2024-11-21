<?php
class Validation {
    private $errors = []; // Array to store validation errors

    // Add an error to the errors array
    public function addError($inputName, $message) {
        $this->errors[$inputName] = $message;
    }

    // Check if an input is required (non-empty)
    public function required($input, $inputName) {
        if (empty($input)) {
            $this->addError($inputName, "$inputName is required");
        }
    }

    // Check if the input exceeds the maximum character limit
    public function max($input, $inputName, $maxValue) {
        if (strlen($input) > $maxValue) {
            $this->addError($inputName, "$inputName must be less than $maxValue characters");
        }
    }

    // Check if the input meets the minimum character requirement
    public function min($input, $inputName, $minValue) {
        if (strlen($input) < $minValue) {
            $this->addError($inputName, "$inputName must be greater than $minValue characters");
        }
    }

    // Validate email format using filter_var
    public function emailRule1($input, $inputName) {
        if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
            $this->addError($inputName, "Invalid email format");
        }
    }

    // Validate email format using a regex pattern
    public function emailRule2($input, $inputName) {
        $regex = "/^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/";
        if (!preg_match($regex, $input)) {
            $this->addError($inputName, "Invalid email format");
        }
    }

    // Check if the input is numeric
    public function numeric($input, $inputName) {
        if (!is_numeric($input)) {
            $this->addError($inputName, "$inputName must be numeric");
        }
    }

    // Check if the input is alphanumeric (letters and numbers only)
    public function alphaNumeric($input, $inputName) {
        $regex = "/^[a-zA-Z0-9]+$/";
        if (!preg_match($regex, $input)) {
            $this->addError($inputName, "$inputName must be alphanumeric");
        }
    }

    // Check if two inputs match (for confirmation fields)
    public function matchInput($input, $inputName, $matchedInput) {
        if ($input != $matchedInput) {
            $this->addError($inputName, "$inputName must match the confirmation input");
        }
    }

    // Check if the input matches a specific pattern
    public function matchPattern($input, $inputName, $pattern) {
        if (!preg_match($pattern, $input)) {
            $this->addError($inputName, "$inputName must match pattern");
        }
    }

    // Validate URL format
    public function url($input, $inputName) {
        if (!filter_var($input, FILTER_VALIDATE_URL)) {
            $this->addError($inputName, "Invalid URL format");
        }
    }

    // Retrieve all errors
    public function getErrors() {
        return $this->errors;
    }

    // Save errors to the session
    public function saveErrorsToSession() {
        $_SESSION['errors'] = $this->errors;
    }

    // Clear errors from the session
    public function clearErrorsFromSession() {
        unset($_SESSION['errors']);
    }

    // Get errors from the session
    public function getErrorsFromSession() {
        return isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
    }

    // Save a success message to the session
    public function saveSuccessMessage($message) {
        $_SESSION['success'] = $message;
    }

    // Clear the success message from the session
    public function clearSuccessMessage() {
        unset($_SESSION['success']);
    }

    // Retrieve the success message from the session
    public function getSuccessMessage() {
        return isset($_SESSION['success']) ? $_SESSION['success'] : '';
    }
}
?>
