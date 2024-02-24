<?php
require_once('Library/Database.php');

class User
{
    public function login($email, $password)
    {
        if (empty($email) || empty($password)) {
            echo json_encode(["code" => 0, "message" => "Не заполнены данные пользователя"]);
            return;
        }
        $userLogin = Database::query("SELECT user_id, password FROM users WHERE email = '$email'");
        if (!$userLogin) {
            echo json_encode(["code" => 0, "message" => "Данный пользователь не зарегистрирован!"]);
            return;
        }
        if (!mysqli_num_rows($userLogin) == 1) {
            echo json_encode(["code" => 0, "message" => "Пользователь не найден!"]);
            return;
        }
        $userData = Database::fetch($userLogin);
        $dataBasePassword = $userData['password']; //Вытаскиваем password из базы данных
        if ($password != $dataBasePassword) {
            echo json_encode(["code" => 0, "message" => "Неверный пароль!"]);
            return;
        }
        $userId = $userData['user_id']; //Вытаскиваем id из базы данных
        $_SESSION['loggedIn'] = true; //Устанавливаем авторизацию в сессии
        $_SESSION['user_id'] = $userId; //Устанавливаем id для сессии
        echo json_encode(["code" => 1, "message" => "Успешная авторизация"]);
    }

    public function registration($name, $email, $password, $phone)
    {
        $checkRegistration = Database::query("SELECT email FROM users WHERE email = '$email'");
        if (mysqli_num_rows($checkRegistration) == 1) {
            echo json_encode(["code" => 0, "message" => "Данный пользователь зарегистрирован!"]);
            return;
        }
        if (empty($name) && empty($email) && empty($password) && empty($phone)) {
            echo json_encode(["code" => 0, "message" => "Некорректные данные для регистрации пользователя!"]);
            return;
        }
        $registration = Database::query("INSERT INTO users (name, email, password, phone) VALUES ('$name', '$email', '$password', '$phone')");
        if ($registration) { // Успешная регистрация
            echo json_encode(["code" => 1, "message" => "Пользователь успешно зарегистрирован"]);
        } else { // Ошибка при регистрации
            echo json_encode(["code" => 0, "message" => "Ошибка при регистрации пользователя!"]);
        }
    }
}

