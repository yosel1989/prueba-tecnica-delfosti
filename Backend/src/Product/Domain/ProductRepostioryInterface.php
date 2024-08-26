<?php

namespace Src\Product\Domain;

use Src\Shared\Domain\ValueObjects\NumInteger;

interface ProductRepostioryInterface
{
    /**
     * @param Product $product
     *
     */
    public function create(Product $product): void;

    /**
     * @param Product $product
     */
    public function update(Product $product): void;

    /**
     * @param NumInteger $idProduct
     */
    public function delete(NumInteger $idProduct): void;

    /**
     * @return array
     */
    public function list(): array;

}
