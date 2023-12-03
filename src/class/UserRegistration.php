<?php

class UserRegistration
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function userRegistration($name, $email, $password, $phone)
    {
        if (!empty($this->connection)) {
            if (!empty($name) && !empty($email) && !empty($password) && !empty($phone)) {
                $query = "INSERT INTO users (name, email, password, phone) VALUES ('$name', '$email', '$password', '$phone')";
                $registration = mysqli_query($this->connection, $query);
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
}