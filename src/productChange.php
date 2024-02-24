<?php
require_once('class/Database.php');
require_once('class/Product.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST['productId'] ?? null;
    $title = $_POST['title'] ?? null;
    $about = $_POST['about'] ?? null;
    $sum = $_POST['sum'] ?? null;
    $image = null;
    if (isset($_FILES["image"]["name"])) {
        $image = $_FILES["image"]["name"];
    }

    $productChange = new Product();
    $productChange->change($productId, $title, $about, $sum, $image);
}