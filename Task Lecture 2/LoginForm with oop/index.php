<?php
session_start(); // Start the session to manage validation messages
require_once "Validation.php"; // Include the Validation class

$validator = new Validation(); // Create an instance of the Validation class
$errors = $validator->getErrorsFromSession(); // Retrieve validation errors from session
$validator->clearErrorsFromSession(); // Clear errors from the session after retrieving

$successMessage = $validator->getSuccessMessage(); // Retrieve success message if it exists
$validator->clearSuccessMessage(); // Clear the success message from the session after retrieving
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> <!-- Link to external CSS file -->
    <script defer src="main.js"></script> <!-- Link to external JavaScript file -->
    <title>Login by OOP</title>
</head>
<style>
/* Style for input placeholders when there's an error */
input.error::placeholder {
  color: red;
}

/* Add red border for input fields with errors */
input.error {
  border: 1px solid red;
}

/* Style for success message with a modern, floating animation */
.success {
    position: fixed;
    bottom: 2%; 
    left: 50%;
    transform: translateX(-50%);
    background: linear-gradient(145deg, #38ef7d, #11998e); 
    color: #fff;
    padding: 6px 20px;
    border-radius: 20px;
    font-size: 10px;
    font-weight: bold;
    text-align: center;
    /* box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3), 0 0 10px #38ef7d, 0 0 20px #11998e; */
    animation: slideUp 1s ease-out, glow 1.5s infinite alternate;
    width: auto;
    min-width: 120px;
    max-width: 80%;
}

/* Sliding up animation for the success message */
@keyframes slideUp {
    0% {
        transform: translateX(-50%) translateY(30px);
        opacity: 0;
    }
    100% {
        transform: translateX(-50%) translateY(0);
        opacity: 1;
    }
}

/* Glowing effect for the success message */
@keyframes glow {
    0% {
        box-shadow: 0 0 2px #38ef7d, 0 0 5px #11998e;
    }
    100% {
        box-shadow: 0 0 3px #38ef7d, 0 0 8px #11998e;
    }

}
</style>
<body>
  <!-- Main form that sends data to validator.php via POST method -->
  <form action="./validator.php" method="POST">
    <div class="container">
        <div class="card">
          <h1 class="login-heading">Login</h1> <!-- Form title -->

          <!-- Display success message if available -->
          <?php if ($successMessage): ?>
            <p class="success"><?= $successMessage ?></p>
          <?php endif; ?>

          <!-- Input fields with error indicators -->
          <div class="input-wrapper">
            <!-- Username input field with dynamic error class and placeholder -->
            <input class="username-input <?= isset($errors['Username']) ? 'error' : '' ?>" 
                   name="username" 
                   placeholder="<?= isset($errors['Username']) ? $errors['Username'] : 'Username' ?>"
                   value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>">

            <!-- Email input field with dynamic error class and placeholder -->
            <input class="email-input <?= isset($errors['Email']) ? 'error' : '' ?>" 
                   name="email" 
                   placeholder="<?= isset($errors['Email']) ? $errors['Email'] : 'Email' ?>"
                   value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">

            <!-- Password input field with dynamic error class and placeholder -->
            <input class="password-input <?= isset($errors['Password']) ? 'error' : '' ?>" 
                   name="password"
                   type="password"  
                   placeholder="<?= isset($errors['Password']) ? $errors['Password'] : 'Password' ?>"
                   value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">

            <!-- LinkedIn profile input field with dynamic error class and placeholder -->
            <input class="link-input <?= isset($errors['Linkedin Profile']) ? 'error' : '' ?>" 
                   name="url"
                   type="url"  
                   placeholder="<?= isset($errors['Linkedin Profile']) ? $errors['Linkedin Profile'] : 'Linkedin Profile' ?>"
                   value="<?= isset($_POST['url']) ? $_POST['url'] : '' ?>">
          </div>

          <!-- Login button -->
          <div class="container-button">
            <button class="btn" type="submit"><a>Login</button>
          </div>

          <!-- Display success message again after the button to maintain visibility on all screens -->
          <?php if ($successMessage): ?>
              <p class="success"><?= $successMessage ?></p>
          <?php endif; ?>
        </div>
    </div>
  </form>

  <!-- Google Fonts preconnect and font loading -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

  <!-- Vanilla Tilt effect library for animations -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.0/vanilla-tilt.min.js"></script>
</body>
</html> 
