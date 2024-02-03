<?php

require_once("Database.php");

class ShowPhone
{
    public function showPhone($productId)
    {
        echo $productId;
        $showPhone = Database::query("SELECT * FROM product LEFT JOIN users ON product.user_id = users.user_id WHERE product_id = '$productId'");
        if (!$showPhone) { // Успешный поиск телефона
            echo "Ошибка при выполнении поиска телефона";
            return;
        }
        if (!mysqli_num_rows($showPhone) > 0) { //Если телефон найден
            echo "Телефон не найден";
            return;
        }
        $phoneData = []; //Создал ассоциативный массив
        while ($row = Database::fetch($showPhone)) { //Прогнал полученные данные через цикл
            $phoneData[] = [ //Выбрал только нужные поля из полученных данных
                'phone' => $row['phone']
            ];
        }
        echo json_encode($phoneData); //Вывод полученных данных
    }
}