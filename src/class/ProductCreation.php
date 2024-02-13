<?php
require_once("Database.php");

class ProductCreation
{
    public function productCreation($userId, $title, $about, $sum, $image)
    {
        if (!empty($userId)) {
            $queryField = "user_id";
            $queryValue = "'$userId'";
        }
        if (!empty($title)) {
            $queryField = $queryField . ", title";
            $queryValue = $queryValue . ", '$title'";
        }
        if (!empty($about)) {
            $queryField = $queryField . ", about";
            $queryValue = $queryValue . ", '$about'";
        }
        if (!empty($sum)) {
            $queryField = $queryField . ", sum";
            $queryValue = $queryValue . ", '$sum'";
        }
        if (!empty($image)) {
            $queryField = $queryField . ", image";
            $queryValue = $queryValue . ", '$image'";
        }
        $creation = Database::query("INSERT INTO product ($queryField) VALUES ($queryValue)");
        $images = "D:/WORK/Bulletin-board/images/" . $_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"], $images);
        if (!$creation) { // Успешная регистрация
            echo json_encode(["code" => 0, "message" => "Ошибка при создании товара!"]);
            return;
        }
        echo json_encode(["code" => 1, "message" => "Товар успешно создан"]);
    }
}

