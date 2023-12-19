<?php
require_once("Database.php");

class UserRegistration
{
    public function userRegistration($name, $email, $password, $phone)
    {
        $checkRegistration = Database::query("SELECT email FROM users WHERE email = '$email'");
        if (mysqli_num_rows($checkRegistration) == 1) {
            echo "Данный пользователь зарегистрирован!";
            return;
        }
        if (!empty($name) && !empty($email) && !empty($password) && !empty($phone)) {
            echo "Некорректные данные для регистрации пользователя!";
            return;
        }
        $registration = Database::query("INSERT INTO users (name, email, password, phone) VALUES ('$name', '$email', '$password', '$phone')");
        if ($registration) { // Успешная регистрация
            echo "Пользователь успешно зарегистрирован";
        } else { // Ошибка при регистрации
            echo "Ошибка при регистрации пользователя!";
        }
    }
}