<?php
require_once('Library/Database.php');
require_once('Model/User.php');

if (!isset($_SESSION)) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $email = $_GET["email"] ?? '';
    $password = md5($_GET["password"]) ?? '';

    $userLogin = new User();
    $userLogin->login($email, $password);
}