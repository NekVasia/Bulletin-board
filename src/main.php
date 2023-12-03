<?php

//require_once('../src/dto/RegistrationDTO.php');
//require_once('../src/validator/RegistrationValidator.php');


//if ($_SERVER["REQUEST_METHOD"] == "POST") { //Регистрация нового пользователя
//    $dto = new RegistrationDTO(
//        name: $_POST['name'] ?? '', //Значение устанавливается в том случае, если поле было передано через $_POST
//        email: $_POST['email'] ?? '',
//        password: $_POST['password'] ?? '',
//        phone: $_POST['phone'] ?? '',
//    );
//    $validator = new RegistrationValidator();
//    if ($validator->validate($dto)) {
//        $query = "INSERT INTO users (name, email, password, phone) VALUES ($dto->name, $dto->email, $dto->password, $dto->phone)";
//        $registration = mysqli_query($connection, $query);
//        if ($registration) { //Успешная регистрация
//            echo "Пользователь успешно зарегистрирован";
//        } else { //Ошибка при регистрации
//            echo "Ошибка при регистрации пользователя";
//        }
//    }
//}