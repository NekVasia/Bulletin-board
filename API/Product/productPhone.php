<?php
require_once('Library/Database.php');
require_once('Model/Product.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") { //Вывод списка товаров
    $productId = $_GET['productId'];

    $phoneShow = new Product();
    $phoneShow -> showPhone($productId);
}
