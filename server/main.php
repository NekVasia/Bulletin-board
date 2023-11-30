<?php

//1. [Идет в зачет] Сделать REST API (по аналогии с разобранным на занятии)
//    для сущности пользователя (пять базовых методов) - идет в зачет.
//2. [Пойдет в зачет позже] Сделать основные методы REST API для нашей доски объявлений.
//Домашка по методам

$connection = mysqli_connect("localhost", "root", "", "bulletin-board");

if ($_SERVER["REQUEST_METHOD"] == "POST") { //Регистрация нового пользователя
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }
    if (isset($_POST['number'])) {
        $number = $_POST['number'];
    }
    if (empty($connection)) {
        $registration = mysqli_query($connection, "INSERT INTO users (name, email, password, number) VALUES ('$name', '$email', '$password', '$number')");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") { //Поиск пользователя
    if (isset($_GET['user_id'])) { //Поиск по id
        $user_id = $_GET['user_id'];
        $searchUser = mysqli_query($connection, "SELECT user_id, name, email, password, number, created_at FROM users WHERE user_id = '$user_id'");
    }
    if (isset($_GET['name'])) { //Поиск по name
        $name = $_GET['name'];
        $searchUser = mysqli_query($connection, "SELECT user_id, name, email, password, number, created_at FROM users WHERE name = '$name'");
    }
    if (isset($_GET['email'])) { //Поиск по email
        $email = $_GET['email'];
        $searchUser = mysqli_query($connection, "SELECT user_id, name, email, password, number, created_at FROM users WHERE email = '$email'");
    }
    if (mysqli_num_rows($searchUser) == 0) { //Ошибка поиска
        echo $searchError = "Пользователь не найден";
    }
    else { //Вывод всех пользователей
        $searchUser = mysqli_query($connection, "SELECT user_id, name, email, password, number, created_at FROM users");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "PUT") { //Редактирование записи пользователя
    if (isset($_GET['name'])) {
        $name = $_GET['name'];
        $searchUser = mysqli_query($connection, "SELECT user_id, name, email, password, number, created_at FROM users WHERE name = '$name'");
    }
}
