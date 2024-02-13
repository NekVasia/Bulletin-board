<?php
require_once("Database.php");

class ProductDelete
{
    public function deleteProduct($productId) {
        $productDeleting = Database::query("DELETE FROM product WHERE product_id = '$productId'");
        if (!$productDeleting) { // Успешно удалено
            echo json_encode(["code" => 0, "message" => "Ошибка при удалении товара!"]);
            return;
        }
        echo json_encode(["code" => 1, "message" => "Товар успешно удален"]);
    }
}
