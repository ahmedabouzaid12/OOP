<?php
session_start(); 

$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
$old = isset($_SESSION['old']) ? $_SESSION['old'] : [];

$success = isset($_SESSION['success']) ? $_SESSION['success'] : '';


unset($_SESSION['errors']);
unset($_SESSION['old']);
unset($_SESSION['success']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login Form</title>
</head>
<body>
    <form action="actions.php" method="POST">
        <div class="ring">
            <i style="--clr:#00ff0a;"></i>
            <i style="--clr:#ff0057;"></i>
            <i style="--clr:#fffd44;"></i>
            
            <div class="login">
                <h2>Login</h2>
                <?php if ($success): ?>
                    <p style="color: green;"><?php echo $success; ?></p>
                <?php endif; ?>

                <div class="inputBx">
                    <input name="username" placeholder="Username" value="<?php echo htmlspecialchars($old['username'] ?? ''); ?>">
                    <?php if (isset($errors['username'])): ?>
                        <p style="color: red;"><?php echo $errors['username']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="inputBx">
                    <input name="email" type="email" placeholder="Your Email" value="<?php echo htmlspecialchars($old['email'] ?? ''); ?>">
                    <?php if (isset($errors['email'])): ?>
                        <p style="color: red;"><?php echo $errors['email']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="inputBx">
                    <input name="password" type="password" placeholder="Password">
                    <?php if (isset($errors['password'])): ?>
                        <p style="color: red;"><?php echo $errors['password']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="inputBx">
                    <input type="submit" value="Sign up">
                </div>
            </div>
        </div>
    </form>
</body>
</html>
