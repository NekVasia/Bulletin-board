<?php
require_once ("Database.php");

class UserDelete
{
    public function deleteUser($userId) {
        $accountDeleting = Database::query("DELETE FROM users WHERE user_id = '$userId'");
        if ($accountDeleting) { // Успешно удалено
            echo "Пользователь успешно удален";
        } else { // Ошибка при удалении
            echo "Ошибка при удалении пользователя";
        }
    }
}