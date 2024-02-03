<?php

require_once('class/Database.php');
//require_once('class/Upload.php');

$image = "../images/" . $_FILES["image"]["name"];

if (move_uploaded_file($_FILES["image"]["tmp_name"], $image)) {
    echo "Файл загружен";
    Database::query("INSERT INTO products (image) VALUES ('$image')");
} else {
    echo "Не удалось загрузить файл";
}
