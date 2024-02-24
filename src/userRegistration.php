<?php
require_once('class/Database.php');
require_once('class/User.php');

if (!isset($_SESSION)) {
    session_start();
}

$inputData = file_get_contents('php://input');
$userData = json_decode($inputData, true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $userData["name"] ?? '';
    $email = $userData["email"] ?? '';
    $password = md5($userData["password"]) ?? '';
    $phone = $userData["phone"] ?? '';

    $userRegistration = new User();
    $userRegistration->registration($name, $email, $password, $phone);
}
