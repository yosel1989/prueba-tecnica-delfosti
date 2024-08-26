<?php

namespace Src\Shared\Domain\ValueObjects;

use Faker\Core\DateTime;

class GeneratorCode
{
    private string $value;

    public function __construct(int $length)
    {
        $this->value = $this->generate($length);
    }

    public function value(): string
    {
        return $this->value;
    }

    public function generate(int $length): string
    {
        $code = (new \DateTime('now'))->format('YmdHms');
        return substr($code, 0, $length);
    }

}
