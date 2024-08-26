<?php

namespace Src\Shared\Domain\ValueObjects;

class Text
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string{
        return $this->value;
    }

    public function withCommaToArray(): array{
        return explode(',', $this->value);
    }

}
