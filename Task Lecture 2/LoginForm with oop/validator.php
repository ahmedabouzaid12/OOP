<?php


session_start(); // Start the session to store errors and success messages
require_once "Validation.php"; // Include the Validation class for form validation

// Create an instance of the Validation class
$validator = new Validation();

// Initialize an empty array to store any validation errors
$errors = [];

// Check if the form is submitted via POST method
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Capture form inputs
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $url = $_POST['url'];
    
    // Perform validation for each field
    $validator->required($name, 'Username'); // Ensure the username is provided
    $validator->required($email, 'Email'); // Ensure the email is provided
    $validator->required($password, 'Password'); // Ensure the password is provided
    $validator->required($url, 'Linkedin Profile'); // Ensure the Linkedin URL is provided

    // Additional validation rules for username
    $validator->min($name, 'username', 3); // Username must be at least 3 characters long
    $validator->max($name, 'username', 50); // Username must not exceed 50 characters

    // Validate email format
    $validator->emailRule1($email, 'email');

    // Additional validation rules for password
    $validator->min($password, 'password', 6); // Password must be at least 6 characters long
    $validator->max($password, 'password', 30); // Password should not exceed 30 characters
    $validator->matchPattern($password, 'password', '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/'); // Password pattern with letters, numbers, and special characters

    // Validate the Linkedin URL format
    $validator->url($url, 'Linkedin Profile'); // Basic URL validation
    $validator->matchPattern($url, 'Linkedin Profile', '/^https:\/\/www\.linkedin\.com\/.*$/'); // Custom pattern for LinkedIn URL

    
    // Get the validation errors
    $errors = $validator->getErrors();
    // print_r($errors);
    // die;

    // If there are validation errors, save them to the session and redirect back to the form
    if (!empty($errors)) {
        $validator->saveErrorsToSession(); // Save errors in the session for displaying later
        header("Location: index.php"); // Redirect back to the form page
        exit(); // Stop further script execution
    }

    // If the form data is valid, save the success message and redirect to the form page
    $validator->saveSuccessMessage("Login Successful !"); // Save success message in the session
    header("Location: index.php"); // Redirect back to the form page
    exit(); // Stop further script execution
}

