<?php

declare(strict_types=1);

require_once ('../src/dto/RegistrationDTO.php');

final class RegistrationValidator
{
    public function validate(RegistrationDTO $dto): bool
    {
        if ($dto->name === '') {
            return false;
        }
        if ($dto->email === '') {
            return false;
        }
        if ($dto->password === '') {
            return false;
        }
        if ($dto->phone === '') {
            return false;
        }
        return true;
    }
}