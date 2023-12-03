<?php

class UserUpdate
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function updateName($user_id, $name) {
        $query = "UPDATE users SET name = '[$name]' WHERE user_id = '$user_id'";
        $updateUser = mysqli_query($this->connection, $query);
        if ($updateUser) { // Успешное редактирование пользователя
            echo "Имя пользователя успешно обновлено";
        } else { // Ошибка при редактировании
            echo "Ошибка при обновлении имени пользователя";
        }
    }

    public function updateEmail($user_id, $email) {
        $query = "UPDATE users SET email = '[$email]' WHERE user_id = '$user_id'";
        $updateUser = mysqli_query($this->connection, $query);
        if ($updateUser) { // Успешное редактирование пользователя
            echo "Имя пользователя успешно обновлено";
        } else { // Ошибка при редактировании
            echo "Ошибка при обновлении имени пользователя";
        }
    }

    public function updatePassword($user_id, $password) {
        $query = "UPDATE users SET password = '[$password]' WHERE user_id = '[$user_id]'";
        $updateUser = mysqli_query($this->connection, $query);
        if ($updateUser) { // Успешное редактирование пользователя
            echo "Имя пользователя успешно обновлено";
        } else { // Ошибка при редактировании
            echo "Ошибка при обновлении имени пользователя";
        }
    }

    public function updatePhone($user_id, $phone) {
        $query = "UPDATE users SET phone = '[$phone]' WHERE user_id = '[$user_id]'";
        $updateUser = mysqli_query($this->connection, $query);
        if ($updateUser) { // Успешное редактирование пользователя
            echo "Имя пользователя успешно обновлено";
        } else { // Ошибка при редактировании
            echo "Ошибка при обновлении имени пользователя";
        }
    }
}