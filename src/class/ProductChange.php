<?php

require_once("Database.php");

class ProductChange
{
    public function changeProduct($productId, $title, $about, $sum, $image)
    {
        if (!empty($title)) {
            $queryField = "title = '$title'";
        }
        if (!empty($about)) {
            $queryField = $queryField . ", about = '$about'";
        }
        if (!empty($sum)) {
            $queryField = $queryField . ", sum = '$sum'";
        }
        if (!empty($image)) {
            $queryField = $queryField . ", image = '$image'";
        }
        $update = Database::query("UPDATE product SET $queryField WHERE product_id = $productId");
        $images = "D:/WORK/Bulletin-board/images/" . $_FILES["image"]["name"];

        move_uploaded_file($_FILES["image"]["tmp_name"], $images);

        if (!$update) { // Успешная регистрация
            echo json_encode(["code" => 0, "message" => "Ошибка при создании товара!"]);
            return;
        }
        echo json_encode(["code" => 1, "message" => "Товар успешно создан"]);
    }
}
