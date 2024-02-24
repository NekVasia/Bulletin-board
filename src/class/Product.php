<?php
require_once("Database.php");

class Product
{
    public function creation($userId, $title, $about, $sum, $image)
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

    public function change($productId, $title, $about, $sum, $image)
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

    public function delete($productId) {
        $productDeleting = Database::query("DELETE FROM product WHERE product_id = '$productId'");
        if (!$productDeleting) { // Успешно удалено
            echo json_encode(["code" => 0, "message" => "Ошибка при удалении товара!"]);
            return;
        }
        echo json_encode(["code" => 1, "message" => "Товар успешно удален"]);
    }

    public function show()
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
        echo json_encode($productData); //Вывод полученных данных
    }

    public function showMy($userId)
    {
        $showMyProduct = Database::query("SELECT * FROM product LEFT JOIN users ON product.user_id = users.user_id WHERE product.user_id = '$userId'");
        if (!$showMyProduct) { // Успешный поиск списка товаров
            echo "Ошибка поиска товаров";
            return;
        }
        if (!mysqli_num_rows($showMyProduct) > 0) { //Если товары найдены
            echo json_encode(["code" => 1, "message" => "Нет товаров"]);
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

    public function showPhone($productId)
    {
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
                'phone' => $row['phone'],
                'id' => $row['product_id']
            ];
        }
        echo json_encode($phoneData); //Вывод полученных данных
    }
}
