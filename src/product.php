<?php

require_once('class/Database.php');
require_once('class/ProductCreation.php');
require_once('class/ProductSearch.php');
require_once('class/ProductDelete.php');
require_once('class/ProductShow.php');


$inputData = file_get_contents('php://input');
$userData = json_decode($inputData, true);

//$response = ["Данные переданы" => true];
//echo json_encode($response);


//REST API для таблицы product
if ($_SERVER["REQUEST_METHOD"] == "POST") { //Создание нового объявления
    $userId = 1; //$userData['user_id'];
    $title = $_POST['title'];
    $about = $_POST['about'];
    $sum = $_POST['sum'];
    $image = $_POST['image'];

    $productCreation = new ProductCreation();
    $productCreation->productCreation($userId, $title, $about, $sum, $image);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") { //Вывод списка товаров
    $productSearch = new ProductShow();
    $productSearch->showProduct();
}

//if ($_SERVER["REQUEST_METHOD"] == "GET") { //Вывод списка товара
//    $productSearch = new ProductSearch();
//
//    if (isset($_GET['user_id'])) { //Поиск по id
//        $userId = 30; //$userData['user_id'];
//        $productSearch->searchProduct($userId);
//    }
//}
//
//if ($_SERVER["REQUEST_METHOD"] == "DELETE") { // Удаление пользователя
//    $productId = $userData['product_id']; //$productId = 2; Так работает
//
//    $productDelete = new ProductDelete();
//    $productDelete->deleteProduct($productId);
//}
