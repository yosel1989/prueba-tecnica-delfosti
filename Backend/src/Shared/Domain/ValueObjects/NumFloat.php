<?php

namespace Src\Shared\Domain\ValueObjects;

class NumFloat
{
    private float $value;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function value(): float{
        return $this->value;
    }

}
