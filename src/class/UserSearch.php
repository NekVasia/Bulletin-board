<?php

class UserSearch
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function searchById($userId) {
        $query = "SELECT user_id, name, email, password, phone, created_at FROM users WHERE user_id = '$userId'";
        $searchUser = mysqli_query($this->connection, $query);
        if ($searchUser) { // Успешный поиск пользователя
            if (mysqli_num_rows($searchUser) == 1) { //Если пользователь найден
                $userData = mysqli_fetch_assoc($searchUser); //Возвращаем данные пользователя в формате JSON
                echo json_encode($userData); //Вывод полученных данных
            } else { //Если пользователь не найден
                echo "Пользователь с id = $userId не найден";
            }
        } else { //Если ошибка при выполнении поиска
            echo "Ошибка при выполнении поиска пользователя";
        }
    }

    public function searchByName($name) {
        $query = "SELECT user_id, name, email, password, phone, created_at FROM users WHERE name = '$name'";
        $searchUser = mysqli_query($this->connection, $query);
        if ($searchUser) { // Успешный поиск пользователей
            if (mysqli_num_rows($searchUser) > 0) { //Если пользователи найдены
                $userData = mysqli_fetch_assoc($searchUser); //Возвращаем данные пользователей в формате JSON
                echo json_encode($userData); //Вывод подученных данных
            } else { //Если пользователи не найдены
                echo "Пользователь с именем $name не найден";
            }
        } else { //Если ошибка при выполнении поиска
            echo "Ошибка при выполнении поиска пользователей";
        }
    }

    public function searchByEmail($email) {
        $query = "SELECT user_id, name, email, password, phone, created_at FROM users WHERE email = '$email'";
        $searchUser = mysqli_query($this->connection, $query);
        if ($searchUser) { // Успешный поиск пользователей
            if (mysqli_num_rows($searchUser) > 0) { //Если пользователь найден
                $userData = mysqli_fetch_assoc($searchUser); //Возвращаем данные пользователей в формате JSON
                echo json_encode($userData); //Вывод подученных данных
            } else { //Если пользователь не найден
                echo "Пользователь с почтой $email не найден";
            }
        } else { //Если ошибка при выполнении поиска
            echo "Ошибка при выполнении поиска пользователей";
        }
    }
}