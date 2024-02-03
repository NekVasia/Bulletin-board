<?php

require_once('class/Database.php');
require_once('class/ShowPhone.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") { //Вывод списка товаров
    $productId = $_GET['productId'];
    //echo $productId;

    $phoneShow = new ShowPhone();
    $phoneShow -> showPhone($productId);
}
