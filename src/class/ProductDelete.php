<?php
require_once ("Database.php");

class ProductDelete
{
    public function deleteProduct($productId) {
        $productDeleting = Database::query("DELETE FROM product WHERE product_id = '$productId'");
        if ($productDeleting) { // Успешно удалено
            echo "Товар успешно удален";
        } else { // Ошибка при удалении
            echo "Ошибка при удалении товара";
        }
    }
}