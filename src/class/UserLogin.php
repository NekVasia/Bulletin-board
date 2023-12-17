<?php
require_once("Database.php");

class UserLogin
{
    public function userLogin($email, $password)
    {
        $userLogin = Database::query("SELECT user_id, password FROM users WHERE email = '$email'");
        if ($userLogin) {
            if (mysqli_num_rows($userLogin) == 1) {
                $userData = mysqli_fetch_assoc($userLogin);
                $dataBasePassword = $userData['password']; //Вытаскиваем password из базы данных
                $id = $userData['user_id']; //Вытаскиваем id из базы данных
                if (password_verify($password, $dataBasePassword)) {
                    $_SESSION['loggedIn'] = true; //Устанавливаем авторизацию в сессии
                    $_SESSION['user_id'] = $id; //Устанавливаем id для сессии
                } else { //Если пароль неверный
                    echo "Неверный пароль";
                }
            } else { //Если пользователь не найден
                echo "Пользователь не найден";
            }
        } else { //Ошибка при выполнении поиска
            echo "Данный пользователь не зарегистрирован";
        }
    }
}