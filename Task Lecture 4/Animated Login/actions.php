<?php
require_once 'Session.php';
require_once 'Validation.php';

session_start(); 

$session = new Session();
$validation = new Validation();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    $username = $validation->sanitize($username);
    $email = $validation->sanitize($email);
    $password = $validation->sanitize($password);
    

    $validation->validateUsername($username);
    $validation->validateEmail($email);
    $validation->validatePassword($password);

    if ($validation->isValid()) {

        $session::set('success', 'Login Successful');

        $session::remove('errors');
        $session::remove('old');
        header('Location: index.php');
        exit;
    } else {

        $session::set('errors', $validation->getErrors());
        $session::set('old', ['username' => $username, 'email' => $email]);
        header('Location: index.php');
        exit;
    }
}
?>
