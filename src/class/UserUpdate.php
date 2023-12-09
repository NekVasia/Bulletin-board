<?php
require_once ("Database.php");

class UserUpdate
{
    public function updateName($userId, $name) {
        $updateUser = Database::query("UPDATE users SET name = '$name' WHERE user_id = '$userId'");
        if ($updateUser) { // Успешное редактирование пользователя
            echo "Имя пользователя успешно обновлено";
        } else { // Ошибка при редактировании
            echo "Ошибка при обновлении имени пользователя";
        }
    }

    public function updateEmail($userId, $email) {
        $updateUser = Database::query("UPDATE users SET email = '$email' WHERE user_id = '$userId'");
        if ($updateUser) { // Успешное редактирование пользователя
            echo "Имя пользователя успешно обновлено";
        } else { // Ошибка при редактировании
            echo "Ошибка при обновлении имени пользователя";
        }
    }

    public function updatePassword($userId, $password) {
        $updateUser = Database::query("UPDATE users SET password = '$password' WHERE user_id = '[$userId]'");
        if ($updateUser) { // Успешное редактирование пользователя
            echo "Имя пользователя успешно обновлено";
        } else { // Ошибка при редактировании
            echo "Ошибка при обновлении имени пользователя";
        }
    }

    public function updatePhone($userId, $phone) {
        $updateUser = Database::query("UPDATE users SET phone = '$phone' WHERE user_id = '[$userId]'");
        if ($updateUser) { // Успешное редактирование пользователя
            echo "Имя пользователя успешно обновлено";
        } else { // Ошибка при редактировании
            echo "Ошибка при обновлении имени пользователя";
        }
    }
}