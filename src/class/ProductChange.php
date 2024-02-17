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
            $imagePath = 'images/' . $image;
            $queryField = $queryField . ", image = '$imagePath'";
        }
        $update = Database::query("UPDATE product SET $queryField WHERE product_id = $productId");
        if ($image) {
            $images = "D:/WORK/Bulletin-board/images/" . $image;
            if (isset($_FILES["image"]["tmp_name"])) {
                move_uploaded_file($_FILES["image"]["tmp_name"], $images);
            }
        }

        if (!$update) { // Успешная регистрация
            echo json_encode(["code" => 0, "message" => "Ошибка при создании товара!"]);
            return;
        }
        echo json_encode(["code" => 1, "message" => "Товар успешно создан"]);
    }
}
