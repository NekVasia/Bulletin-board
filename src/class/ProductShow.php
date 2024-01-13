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
        $productData = []; //Создал ассоциативный массив
        while ($row = Database::fetch($searchProduct)) { //Прогнал полученные данные через цикл
            $productData[] = [ //Выбрал только нужные поля из полученных данных
                'user_id' => $row['user_id'],
                'image' => $row['image'],
                'phone' => $row['phone'],
                'title' => $row['title'],
                'about' => $row['about'],
                'name' => $row['name'],
                'sum' => $row['sum'],
            ];
        }
        echo json_encode($productData); //Вывод полученных данных
    }
}