<?php
require_once('class/Database.php');
require_once('class/Product.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") { //Вывод списка товаров
    $productId = $_GET['productId'];

    $phoneShow = new Product();
    $phoneShow -> showPhone($productId);
}
