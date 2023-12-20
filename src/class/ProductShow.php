<?php
require_once("Database.php");

class ProductShow
{
    public function showProduct()
    {
        $searchProduct = Database::query("SELECT * FROM product LEFT JOIN users ON product.user_id = users.user_id");
        if (!$searchProduct) { // Успешный поиск списка товаров
            echo "Ошибка при выполнении поиска товара";
            return;
        }
        if (!mysqli_num_rows($searchProduct) > 0) { //Если товары найдены
            echo "Товар не найден";
            return;
        }
        $productData = mysqli_fetch_assoc($searchProduct); //Возвращаем список товаров в формате JSON
        echo json_encode($productData); //Вывод полученных данных
    }
}