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
        if ($creation) { // Успешная регистрация
            echo "Товар успешно создан";
        } else { // Ошибка при регистрации
            echo "Ошибка при создании товара";
        }
    }
}

