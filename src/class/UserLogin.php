<?php
require_once("Database.php");

class UserLogin
{
    public function userLogin($email, $password)
    {
        if (empty($email) || empty($password)) {
            echo json_encode(["code" => 0, "message" => "Не заполнены данные пользователя"]);
            return;
        }
        $userLogin = Database::query("SELECT user_id, password FROM users WHERE email = '$email'");
        if (!$userLogin) {
            echo json_encode(["code" => 0, "message" => "Данный пользователь не зарегистрирован!"]);
            return;
        }
        if (!mysqli_num_rows($userLogin) == 1) {
            echo json_encode(["code" => 0, "message" => "Пользователь не найден!"]);
            return;
        }
        $userData = Database::fetch($userLogin);
        $dataBasePassword = $userData['password']; //Вытаскиваем password из базы данных
        if ($password != $dataBasePassword) {
            echo json_encode(["code" => 0, "message" => "Неверный пароль!"]);
            return;
        }
        $id = $userData['user_id']; //Вытаскиваем id из базы данных
        $_SESSION['loggedIn'] = true; //Устанавливаем авторизацию в сессии
        $_SESSION['user_id'] = $id; //Устанавливаем id для сессии
        echo json_encode(["code" => 1, "message" => "Успешная авторизация"]);
    }
}
