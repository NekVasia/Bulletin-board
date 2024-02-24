<?php
require_once('Library/Database.php');
require_once('Model/Product.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $productSearch = new Product();
    $productSearch->show();
}