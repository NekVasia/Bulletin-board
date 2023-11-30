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
