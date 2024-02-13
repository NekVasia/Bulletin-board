<?php
require_once('class/Database.php');
require_once('class/ProductPreview.php');

if (!isset($_SESSION)) {
    session_start();
}

$productId = $_GET['productId'];

$inputData = file_get_contents('php://input');
$productData = json_decode($inputData, true);

if ($_SERVER["REQUEST_METHOD"] == "GET") { //Вывод списка товаров
    $productPreview = new ProductPreview();
    $productPreview->previewProduct($productId);
}