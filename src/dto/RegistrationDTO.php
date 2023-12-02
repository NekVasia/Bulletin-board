<?php

declare(strict_types=1);

final class RegistrationDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $phone,
    )
    {
    }
}