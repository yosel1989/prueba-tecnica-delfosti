<?php

namespace Src\Shared\Domain\ValueObjects;

class NumInteger
{
    private ?int $value;

    public function __construct(?int $value)
    {
        $this->value = $value;
    }

    public function value(): ?int
    {
        return $this->value;
    }

}
