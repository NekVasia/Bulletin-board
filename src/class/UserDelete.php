<?php

class UserDelete
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function deleteUser($user_id) {
        $query = "DELETE FROM users WHERE user_id = '$user_id'";
        $accountDeleting = mysqli_query($this->connection, $query);
        if ($accountDeleting) { // Успешно удалено
            echo "Пользователь успешно удален";
        } else { // Ошибка при удалении
            echo "Ошибка при удалении пользователя";
        }
    }
}