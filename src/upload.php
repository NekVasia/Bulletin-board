<?php

require_once('class/Database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $image = "../images/" . $_FILES["image"]["name"];
}