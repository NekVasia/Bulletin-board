<?php

class ProductSearch
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function searchProduct($userId) {
        $query = "SELECT product_id, title, about, sum, image FROM product WHERE user_id = '$userId'";
        $searchProduct = mysqli_query($this->connection, $query);
        if ($searchProduct) { // Успешный поиск списка продуктов
            if (mysqli_num_rows($searchProduct) > 1) { //Если мои товары найдены
                $userData = mysqli_fetch_assoc($searchProduct); //Возвращаем список товаров в формате JSON
                echo json_encode($userData); //Вывод полученных данных
            } else { //Если товар не найден
                echo "Товар не найден";
            }
        } else { //Если ошибка при выполнении поиска
            echo "Ошибка при выполнении поиска товара";
        }
    }
}