<?php

//require_once ('class/Connect.php');
require_once ('class/UserRegistration.php');
require_once ('class/UserSearch.php');
require_once ('class/UserUpdate.php');
require_once ('class/UserDelete.php');

$connection = mysqli_connect("localhost", "root", "", "bulletin-board");
if (!$connection) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

$inputData = file_get_contents('php://input');
$userData = json_decode($inputData, true);



//REST API для таблицы users
if ($_SERVER["REQUEST_METHOD"] == "POST") { //Регистрация нового пользователя
    $name = $_POST['name'] ?? ''; //Значение устанавливается в том случае, если поле было передано через $_POST
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $phone = $_POST['phone'] ?? '';

    $userRegistration = new UserRegistration($connection);
    $userRegistration->userRegistration($name, $email, $password, $phone);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") { //Поиск пользователя
    $userSearch = new UserSearch($connection);

    if (isset($_GET['user_id'])) { //Поиск по id
        $user_id = $_GET['user_id'];
        $userSearch->searchById($user_id);
    }
    if (isset($_GET['name'])) { //Поиск по name
        $name = $_GET['name'];
        $userSearch->searchByName($name);
    }
    if (isset($_GET['email'])) { //Поиск по email
        $email = $_GET['email'];
        $userSearch->searchByEmail($email);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "PUT") { //Редактирование записи пользователя
    $userUpdate = new UserUpdate($connection);
    $user_id = $userData['user_id'];

    if (isset($_PUT['name'])) { //Редактирование имени пользователя
        $name = $_PUT['name'];
        $userUpdate->updateName($user_id, $name);
    }
    if (isset($_PUT['email'])) { //Редактирование почты пользователя
        $email = $_PUT['email'];
        $userUpdate->updateEmail($user_id, $email);
    }
    if (isset($_PUT['password'])) { //Редактирование пароля пользователя
        $password = $_PUT['password'];
        $userUpdate->updatePassword($user_id, $password);
    }
    if (isset($_PUT['phone'])) { //Редактирование почты пользователя
        $phone = $_PUT['phone'];
        $userUpdate->updatePhone($user_id, $phone);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "DELETE") { // Удаление пользователя
    $user_id = $userData['user_id']; //$user_id = 13; Так работает
    $userDelete = new UserDelete($connection);
    $userDelete->deleteUser($user_id);
}
