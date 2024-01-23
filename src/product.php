<?php

require_once('class/Database.php');
require_once('class/ProductCreation.php');
require_once('class/ProductSearch.php');
require_once('class/ProductDelete.php');
require_once('class/ProductShow.php');
require_once('class/ProductShowMy.php');

if (!isset($_SESSION)) {
    session_start();
}

$userId = $_SESSION['user_id'];

$inputData = file_get_contents('php://input');
$productData = json_decode($inputData, true);


//REST API для таблицы product
if ($_SERVER["REQUEST_METHOD"] == "POST") { //Создание нового объявления
    $title = $productData['title'];
    $about = $productData['about'];
    $sum = $productData['sum'];
    $image = $productData['image'];

    $productCreation = new ProductCreation();
    $productCreation->productCreation($userId, $title, $about, $sum, $image);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") { //Вывод списка товаров
    $productSearch = new ProductShow();
    $productSearch->showProduct();
}

//if ($_SERVER["REQUEST_METHOD"] == "GET") { //Вывод моего списка товаров
//    $productSearch = new ProductShowMy();
//    $productSearch->showMyProduct($userId);
//}


//if ($_SERVER["REQUEST_METHOD"] == "GET") { //Вывод списка товара
//    $productSearch = new ProductSearch();
//
//    if (isset($_GET['user_id'])) { //Поиск по id
//        $userId = 30; //$userData['user_id'];
//        $productSearch->searchProduct($userId);
//    }
//}

if ($_SERVER["REQUEST_METHOD"] == "DELETE") { // Удаление пользователя
    $productId = $_GET['product_id']; //$productId = 2; Так работает

    $productDelete = new ProductDelete();
    $productDelete->deleteProduct($productId);
}
