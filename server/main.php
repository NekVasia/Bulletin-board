<?php

//1. [Идет в зачет] Сделать REST API (по аналогии с разобранным на занятии)
//    для сущности пользователя (пять базовых методов) - идет в зачет.
//2. [Пойдет в зачет позже] Сделать основные методы REST API для нашей доски объявлений.
//Домашка по методам

$connection = mysqli_connect("localhost", "root", "", "bulletin-board");

if ($_SERVER["REQUEST_METHOD"] == "POST") { //Регистрация нового пользователя
    $name = $_POST['name'] ?? ''; //Значение устанавливается в том случае, если поле было передано через $_POST
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $number = $_POST['number'] ?? '';
    if (!empty($connection)) {
        $query = "INSERT INTO users (name, email, password, number) VALUES ('$name', '$email', '$password', '$number')";
        $registration = mysqli_query($connection, $query);
        if ($registration) { //Успешная регистрация
            echo "Пользователь успешно зарегистрирован";
        } else { //Ошибка при регистрации
            echo "Ошибка при регистрации пользователя";
        }
    }
}




if ($_SERVER["REQUEST_METHOD"] == "GET") { //Поиск пользователя
    if (isset($_GET['user_id'])) { //Поиск по id
        $user_id = $_GET['user_id'];
        $query = "SELECT user_id, name, email, password, number, created_at FROM users WHERE user_id = '$user_id'";
        $searchUser = mysqli_query($connection, $query);
        if ($searchUser) { // Успешный поиск пользователя
            if (mysqli_num_rows($searchUser) == 1) { //Если пользователь найден
                $userData = mysqli_fetch_assoc($searchUser); //Возвращаем данные пользователя в формате JSON
                echo json_encode($userData); //Вывод полученных данных
            } else { //Если пользователь не найден
                echo "Пользователь с id = $user_id не найден";
            }
        } else { //Если ошибка при выполнении поиска
            echo "Ошибка при выполнении поиска пользователя";
        }
    }

    if (isset($_GET['name'])) { //Поиск по name
        $name = $_GET['name'];
        $query = "SELECT user_id, name, email, password, number, created_at FROM users WHERE name = '$name'";
        $searchUser = mysqli_query($connection, $query);
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

    if (isset($_GET['email'])) { //Поиск по email
        $email = $_GET['email'];
        $query = "SELECT user_id, name, email, password, number, created_at FROM users WHERE email = '$email'";
        $searchUser = mysqli_query($connection, $query);
        if ($searchUser) { // Успешный поиск пользователей
            if (mysqli_num_rows($searchUser) == 1) { //Если пользователь найден
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




$inputData = file_get_contents('php://input');
$userData = json_decode($inputData, true);

if ($_SERVER["REQUEST_METHOD"] == "PUT") { //Редактирование записи пользователя
    if (isset($_PUT['name'])) { //Редактирование имени пользователя
        $name = $_PUT['name'];
        $user_id = $userData['user_id'];
        $query = "UPDATE users SET name = [$name] WHERE user_id = '$user_id'";
        $updateUser = mysqli_query($connection, $query);
        if ($updateUser) { // Успешное редактирование пользователя
            echo "Имя пользователя успешно обновлено";
        } else { // Ошибка при редактировании
            echo "Ошибка при обновлении имени пользователя";
        }
    }

    if (isset($_PUT['email'])) { //Редактирование почты пользователя
        $email = $_PUT['email'];
        $user_id = $userData['user_id'];
        $query = "UPDATE users SET email = [$email] WHERE user_id = '$user_id'";
        $updateUser = mysqli_query($connection, $query);
        if ($updateUser) { // Успешное редактирование пользователя
            echo "Имя пользователя успешно обновлено";
        } else { // Ошибка при редактировании
            echo "Ошибка при обновлении имени пользователя";
        }
    }

    if (isset($_PUT['password'])) { //Редактирование пароля пользователя
        $password = $_PUT['password'];
        $user_id = $userData['user_id'];
        $query = "UPDATE users SET password = [$password] WHERE user_id = '$user_id'";
        $updateUser = mysqli_query($connection, $query);
        if ($updateUser) { // Успешное редактирование пользователя
            echo "Имя пользователя успешно обновлено";
        } else { // Ошибка при редактировании
            echo "Ошибка при обновлении имени пользователя";
        }
    }

    if (isset($_PUT['number'])) { //Редактирование почты пользователя
        $number = $_PUT['number'];
        $user_id = $userData['user_id'];
        $query = "UPDATE users SET number = [$number] WHERE user_id = '$user_id'";
        $updateUser = mysqli_query($connection, $query);
        if ($updateUser) { // Успешное редактирование пользователя
            echo "Имя пользователя успешно обновлено";
        } else { // Ошибка при редактировании
            echo "Ошибка при обновлении имени пользователя";
        }
    }
}




$inputData = file_get_contents('php://input');
$userData = json_decode($inputData, true);

if ($_SERVER["REQUEST_METHOD"] == "DELETE") { // Удаление пользователя
    $user_id = $userData['user_id'];
    if (!empty($connection)) {
        $query = "DELETE FROM users WHERE user_id = '$user_id'";
        $accountDeleting = mysqli_query($connection, $query);
        if ($accountDeleting) { // Успешно удалено
            echo "Пользователь успешно удален";
        } else { // Ошибка при удалении
            echo "Ошибка при удалении пользователя";
        }
    }
}