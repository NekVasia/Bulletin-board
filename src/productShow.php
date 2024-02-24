<?php
require_once('class/Database.php');
require_once('class/Product.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $productSearch = new Product();
    $productSearch->show();
}