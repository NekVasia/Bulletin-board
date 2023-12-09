<?php
require_once("Database.php");

class UserRegistration
{
    public function userRegistration($name, $email, $password, $phone)
    {
        if (!empty($name) && !empty($email) && !empty($password) && !empty($phone)) {
            $registration = Database::query("INSERT INTO users (name, email, password, phone) VALUES ('$name', '$email', '$password', '$phone')");
            if ($registration) { // Успешная регистрация
                echo "Пользователь успешно зарегистрирован";
            } else { // Ошибка при регистрации
                echo "Ошибка при регистрации пользователя";
            }
        } else {
            echo "Некорректные данные для регистрации пользователя";
        }
    }
}