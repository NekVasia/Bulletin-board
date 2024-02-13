<?php

class Database
{

    private static $connection; //Создаем соединение в SQL
    public static function connect() {
        if (empty(self::$connection)) {
            self::$connection = mysqli_connect("localhost", "root", "", "bulletin-board");
        }
    }

    public static function query($sqlString) { //Взаимодействие с данными SQL
        self::connect();
        return mysqli_query(self::$connection, $sqlString);
    }

    public static function fetch($query) { //Вывод данных с SQL
        return mysqli_fetch_assoc($query);
    }
}