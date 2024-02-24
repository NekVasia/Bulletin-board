<?php
require_once('Library/Database.php');
require_once('Model/Product.php');

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $productId = $_GET['productId'];

    $productDelete = new Product();
    $productDelete->delete($productId);
}
