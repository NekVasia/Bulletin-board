<?php
require_once('class/Database.php');
require_once('class/Product.php');

if (!isset($_SESSION)) {
    session_start();
}

$userId = $_SESSION['user_id'];

$inputData = file_get_contents('php://input');
$productData = json_decode($inputData, true);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $productShow = new Product();
    $productShow -> showMy($userId);
}
