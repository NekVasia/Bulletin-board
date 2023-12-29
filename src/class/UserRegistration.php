<?php
require_once("Database.php");

class UserRegistration
{
    public function userRegistration($name, $email, $password, $phone)
    {
        $checkRegistration = Database::query("SELECT email FROM users WHERE email = '$email'");
        if (mysqli_num_rows($checkRegistration) == 1) {
            echo json_encode(["code" => 0, "message" => "Данный пользователь зарегистрирован!"]);
            return;
        }
        if (!empty($name) && !empty($email) && !empty($password) && !empty($phone)) {
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