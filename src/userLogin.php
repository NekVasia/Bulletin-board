<?php
require_once('class/Database.php');
require_once('class/User.php');

if (!isset($_SESSION)) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "GET") { //Авторизация пользователя
    $email = $_GET["email"] ?? '';
    $password = md5($_GET["password"]) ?? '';

    $userLogin = new User();
    $userLogin->login($email, $password);
}