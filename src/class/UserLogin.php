<?php
require_once("Database.php");

class UserLogin
{
    public function userLogin($email, $password)
    {
        if (!empty($email) && !empty($password)) {
            echo "Не заполнены данные пользователя!";
            return;
        }
        $userLogin = Database::query("SELECT user_id, password FROM users WHERE email = '$email'");
        if (!$userLogin) {
            echo "Данный пользователь не зарегистрирован!";
            return;
        }
        if (!mysqli_num_rows($userLogin) == 1) {
            echo "Пользователь не найден!";
            return;
        }
        $userData = mysqli_fetch_assoc($userLogin);
        $dataBasePassword = $userData['password']; //Вытаскиваем password из базы данных
        $id = $userData['user_id']; //Вытаскиваем id из базы данных
        if ($password === $dataBasePassword) {
            $_SESSION['loggedIn'] = true; //Устанавливаем авторизацию в сессии
            $_SESSION['user_id'] = $id; //Устанавливаем id для сессии
            echo "Успешная авторизация";
        } else { //Если пароль неверный
            echo "Неверный пароль!";
        }
    }
}
