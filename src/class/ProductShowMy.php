<?php
require_once("Database.php");


class ProductShowMy
{
    public function showMyProduct($userId)
    {
        $showMyProduct = Database::query("SELECT * FROM product LEFT JOIN users ON product.user_id = users.user_id WHERE product.user_id = '$userId'");
        if (!$showMyProduct) { // Успешный поиск списка товаров
            echo "Ошибка при выполнении поиска товара";
            return;
        }
        if (!mysqli_num_rows($showMyProduct) > 0) { //Если товары найдены
            echo "Товар не найден";
            return;
        }
        $productDataMy = []; //Создал ассоциативный массив
        while ($row = Database::fetch($showMyProduct)) { //Прогнал полученные данные через цикл
            $productDataMy[] = [ //Выбрал только нужные поля из полученных данных
                'product_id' => $row['product_id'],
                'user_id' => $row['user_id'],
                'image' => $row['image'],
                'phone' => $row['phone'],
                'title' => $row['title'],
                'about' => $row['about'],
                'name' => $row['name'],
                'sum' => $row['sum'],
            ];
        }
        echo json_encode($productDataMy); //Вывод полученных данных
    }
}