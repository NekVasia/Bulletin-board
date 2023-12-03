<?php

declare(strict_types=1);

namespace dto;
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