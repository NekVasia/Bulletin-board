<?php

class ProductCreation
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function productCreation($userId, $title, $about, $sum, $image)
    {
        if (!empty($this->connection)) {
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
            echo "$queryField и $queryValue";
            $query = "INSERT INTO product ($queryField) VALUES ($queryValue)";
            $creation = mysqli_query($this->connection, $query);
            if ($creation) { // Успешная регистрация
                echo "Товар успешно создан";
            } else { // Ошибка при регистрации
                echo "Ошибка при создании товара";
            }
        } else {
            echo "Некорректные данные для создания товара";
        }
    }

}