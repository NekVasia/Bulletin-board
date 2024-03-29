<?php
require_once('Library/Database.php');
require_once('Model/Product.php');

if (!isset($_SESSION)) {
    session_start();
}

$userId = $_SESSION['user_id'];

$inputData = file_get_contents('php://input');
$productData = json_decode($inputData, true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $about = $_POST['about'];
    $sum = $_POST['sum'];
    $image = "Image/Product/" . $_FILES["image"]["name"];

    $productCreation = new Product();
    $productCreation->creation($userId, $title, $about, $sum, $image);
}
