<?php
require_once ("Database.php");

class UserLogin
{
    public function userLogin($email, $password) {
        $userLogin = Database::query("SELECT email FROM users WHERE email = '$email'");
        $userPassword = Database::query("SELECT password FROM users WHERE password = '$password'");
        if ($userLogin !== $userPassword) { //Лошин и пароль соответствуют (херня какая-то)
            if (mysqli_num_rows($userLogin) == 1) {
                $userData = mysqli_fetch_assoc($userLogin);
                echo json_encode($userData); //Вывод полученных данных
            } else { //Если пользователь не найден
                echo "Пользователь найден";
            }
        } else { //Ошибка при выполнении поиска
            echo "Данный пользователь не зарегистрировался";
        }
    }
}