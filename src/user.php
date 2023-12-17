<?php

require_once('class/Database.php');
require_once('class/UserRegistration.php');
require_once('class/UserSearch.php');
require_once('class/UserUpdate.php');
require_once('class/UserDelete.php');
require_once('class/UserLogin.php');


$inputData = file_get_contents('php://input');
$userData = json_decode($inputData, true);

//$userData = ["Данные переданы" => true];
//echo json_encode($userData);


//REST API для таблицы users
if ($_SERVER["REQUEST_METHOD"] == "POST") { //Регистрация нового пользователя
    $name = $userData["name"] ?? ''; //Значение устанавливается в том случае, если поле было передано через $_POST
    $email = $userData["email"] ?? '';
    $password = $userData["password"] ?? '';
    $phone = $userData["phone"] ?? '';
    echo "$name, $email, $phone, $password";


    $userRegistration = new UserRegistration();
    $userRegistration->userRegistration($name, $email, $password, $phone);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") { //Авторизация пользователя
    $email = $userData["email"] ?? '';
    $password = $userData["password"] ?? '';

    $userLogin = new UserLogin();
    $userLogin->userLogin($email, $password);

}

if ($_SERVER["REQUEST_METHOD"] == "GET") { //Поиск пользователя
    $userSearch = new UserSearch();

    if (isset($_GET['user_id'])) { //Поиск по id
        $userId = $_GET['user_id'];
        $userSearch->searchById($userId);
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
    $userUpdate = new UserUpdate();
    if (!isset($userData['user_id'])) {
        echo "Не передан 'user_id'";
        return;
    }
    $userId = $userData['user_id'];

    if (isset($userData['name'])) { //Редактирование имени пользователя
        $name = $userData['name'];
        $userUpdate->updateName($userId, $name);
    }
    if (isset($userData['email'])) { //Редактирование почты пользователя
        $email = $userData['email'];
        $userUpdate->updateEmail($userId, $email);
    }
    if (isset($userData['password'])) { //Редактирование пароля пользователя
        $password = $userData['password'];
        $userUpdate->updatePassword($userId, $password);
    }
    if (isset($userData['phone'])) { //Редактирование почты пользователя
        $phone = $userData['phone'];
        $userUpdate->updatePhone($userId, $phone);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "DELETE") { // Удаление пользователя
    $userId = $userData['user_id']; //$user_id = 13; Так работает

    $userDelete = new UserDelete();
    $userDelete->deleteUser($userId);
}
