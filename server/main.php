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
    if (!empty($connection)) {
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

$inputData = file_get_contents('php://input');
$userData = json_decode($inputData, true);

if ($_SERVER["REQUEST_METHOD"] == "PUT") { //Редактирование записи пользователя
    if (isset($_PUT['name'])) { //Редактирование имени пользователя
        $name = $_PUT['name'];
        $user_id = $userData['user_id'];
        $query = "UPDATE users SET name = [$name] WHERE user_id = '$user_id'";
        $updateUser = mysqli_query($connection, $query);
        if ($updateUser) { // Успешное редактирование пользователя
            echo "Имя пользователя успешно обновлено";
        } else { // Ошибка при редактировании
            echo "Ошибка при обновлении имени пользователя";
        }
    }
    if (isset($_PUT['email'])) { //Редактирование почты пользователя
        $email = $_PUT['email'];
        $user_id = $userData['user_id'];
        $query = "UPDATE users SET email = [$email] WHERE user_id = '$user_id'";
        $updateUser = mysqli_query($connection, $query);
        if ($updateUser) { // Успешное редактирование пользователя
            echo "Имя пользователя успешно обновлено";
        } else { // Ошибка при редактировании
            echo "Ошибка при обновлении имени пользователя";
        }
    }
    if (isset($_PUT['password'])) { //Редактирование пароля пользователя
        $password = $_PUT['password'];
        $user_id = $userData['user_id'];
        $query = "UPDATE users SET password = [$password] WHERE user_id = '$user_id'";
        $updateUser = mysqli_query($connection, $query);
        if ($updateUser) { // Успешное редактирование пользователя
            echo "Имя пользователя успешно обновлено";
        } else { // Ошибка при редактировании
            echo "Ошибка при обновлении имени пользователя";
        }
    }
    if (isset($_PUT['number'])) { //Редактирование почты пользователя
        $number = $_PUT['number'];
        $user_id = $userData['user_id'];
        $query = "UPDATE users SET number = [$number] WHERE user_id = '$user_id'";
        $updateUser = mysqli_query($connection, $query);
        if ($updateUser) { // Успешное редактирование пользователя
            echo "Имя пользователя успешно обновлено";
        } else { // Ошибка при редактировании
            echo "Ошибка при обновлении имени пользователя";
        }
    }
}



$inputData = file_get_contents('php://input');
$userData = json_decode($inputData, true);

if ($_SERVER["REQUEST_METHOD"] == "DELETE") { // Удаление пользователя
    $user_id = $userData['user_id'];
    if (!empty($connection)) {
        $query = "DELETE FROM users WHERE user_id = '$user_id'";
        $accountDeleting = mysqli_query($connection, $query);
        if ($accountDeleting) { // Успешно удалено
            echo "Пользователь успешно удален";
        } else { // Ошибка при удалении
            echo "Ошибка при удалении пользователя";
        }
    }
}