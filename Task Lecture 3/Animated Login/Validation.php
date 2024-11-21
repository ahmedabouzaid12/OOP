<?php
class Validation {
    private $errors = [];

    public function sanitize($data) {
        return htmlspecialchars(trim($data));
    }

    public function validateUsername($username) {
        if (empty($username)) {
            $this->errors['username'] = 'Username is required';
        } elseif (strlen($username) < 3) {
            $this->errors['username'] = 'username must be at least 3 characters';
        }
    }

    public function validateEmail($email) {
        if (empty($email)) {
            $this->errors['email'] = 'Email is required';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Invalid email format';
        }
    }

    public function validatePassword($password) {
        if (empty($password)) {
            $this->errors['password'] = 'Password is required';
        } elseif (strlen($password) < 6) {
            $this->errors['password'] = 'Password must be at least 6 characters';
        }
    }

    public function getErrors() {
        return $this->errors;
    }

    public function isValid() {
        return empty($this->errors);
    }
}
?>
