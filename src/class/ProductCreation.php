<?php

class ProductCreation
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function productCreation($title, $about, $sum, $image)
    {
        if (!empty($this->connection)) {
            $query = "INSERT INTO users (title, about, sum, image) VALUES ('$title', '$about', '$sum', '$image')";
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