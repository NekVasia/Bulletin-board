<?php

require_once('class/Database.php');
require_once('class/ProductCreation.php');
require_once('class/ProductSearch.php');
require_once('class/ProductDelete.php');
require_once('class/ProductShow.php');
require_once('class/ProductChange.php');

if (!isset($_SESSION)) {
    session_start();
}

$userId = $_SESSION['user_id'];

$inputData = file_get_contents('php://input');
$productData = json_decode($inputData, true);

//REST API для таблицы product
if ($_SERVER["REQUEST_METHOD"] == "POST") { //Создание нового объявления
    $title = $_POST['title'];
    $about = $_POST['about'];
    $sum = $_POST['sum'];
    $image = "images/" . $_FILES["image"]["name"];

    $productCreation = new ProductCreation();
    $productCreation->productCreation($userId, $title, $about, $sum, $image);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") { //Вывод списка товаров
    $productSearch = new ProductShow();
    $productSearch->showProduct();
}

if ($_SERVER["REQUEST_METHOD"] == "PUT") { //Вывод списка товаров
    $putData = json_decode(file_get_contents("php://input"), true);
    echo json_encode($putData);

    $productId = $putData['productId'];
    $title = $putData['title'];
    $about = $putData['about'];
    $sum = $putData['sum'];
    $image = "images/" . $_FILES["image"]["name"];

    $productChange = new ProductChange();
    $productChange->changeProduct($productId, $title, $about, $sum, $image);
}

if ($_SERVER["REQUEST_METHOD"] == "DELETE") { // Удаление пользователя
    $productId = $_GET['productId']; //$productId = 2; Так работает

    $productDelete = new ProductDelete();
    $productDelete->deleteProduct($productId);
}
