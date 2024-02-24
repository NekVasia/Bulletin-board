<?php
require_once('class/Database.php');
require_once('class/Product.php');

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $productId = $_GET['productId'];

    $productDelete = new Product();
    $productDelete->delete($productId);
}
