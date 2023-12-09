<?php

class UserUpdate
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function updateName($userId, $name) {
        $query = "UPDATE users SET name = '$name' WHERE user_id = '$userId'";
        $updateUser = mysqli_query($this->connection, $query);
        if ($updateUser) { // Успешное редактирование пользователя
            echo "Имя пользователя успешно обновлено";
        } else { // Ошибка при редактировании
            echo "Ошибка при обновлении имени пользователя";
        }
    }

    public function updateEmail($userId, $email) {
        $query = "UPDATE users SET email = '$email' WHERE user_id = '$userId'";
        $updateUser = mysqli_query($this->connection, $query);
        if ($updateUser) { // Успешное редактирование пользователя
            echo "Имя пользователя успешно обновлено";
        } else { // Ошибка при редактировании
            echo "Ошибка при обновлении имени пользователя";
        }
    }

    public function updatePassword($userId, $password) {
        $query = "UPDATE users SET password = '$password' WHERE user_id = '[$userId]'";
        $updateUser = mysqli_query($this->connection, $query);
        if ($updateUser) { // Успешное редактирование пользователя
            echo "Имя пользователя успешно обновлено";
        } else { // Ошибка при редактировании
            echo "Ошибка при обновлении имени пользователя";
        }
    }

    public function updatePhone($userId, $phone) {
        $query = "UPDATE users SET phone = '$phone' WHERE user_id = '[$userId]'";
        $updateUser = mysqli_query($this->connection, $query);
        if ($updateUser) { // Успешное редактирование пользователя
            echo "Имя пользователя успешно обновлено";
        } else { // Ошибка при редактировании
            echo "Ошибка при обновлении имени пользователя";
        }
    }
}