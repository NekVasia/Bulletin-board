<?php

class POST {
    public function registration ($name, $email, $password, $number) {
        Connect::query("INSERT INTO users (name, email, password, number) VALUES ('$name', '$email', '$password', '$number')");
    }
}