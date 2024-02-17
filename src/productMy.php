<?php

require_once('class/Database.php');
require_once('class/ProductShowMy.php');
require_once('class/ProductChange.php');

if (!isset($_SESSION)) {
    session_start();
}

$userId = $_SESSION['user_id'];

$inputData = file_get_contents('php://input');
$productData = json_decode($inputData, true);

if ($_SERVER["REQUEST_METHOD"] == "GET") { //Вывод списка товаров
    $productShow = new ProductShowMy();
    $productShow -> showMyProduct($userId);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") { //Создание нового объявления
    $productId = $_POST['productId'] ?? null;
    $title = $_POST['title'] ?? null;
    $about = $_POST['about'] ?? null;
    $sum = $_POST['sum'] ?? null;
    $image = null;
    if (isset($_FILES["image"]["name"])) {
        $image = $_FILES["image"]["name"];
    }

    $productChange = new ProductChange();
    $productChange->changeProduct($productId, $title, $about, $sum, $image);
}