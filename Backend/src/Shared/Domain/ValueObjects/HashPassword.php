<?php

namespace Src\Shared\Domain\ValueObjects;

use Illuminate\Support\Facades\Hash;

class HashPassword
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $this->hash($value);
    }

    public function value(): string
    {
        return $this->value;
    }

    public function hash(string $value): string
    {
        return Hash::make($value);
    }

}
