<?php

namespace Src\OrderProduct\Domain;

use Src\Shared\Domain\ValueObjects\NumFloat;
use Src\Shared\Domain\ValueObjects\NumInteger;

class OrderProduct
{

    private NumInteger $idOrder;
    private NumInteger $idProduct;
    private NumInteger $quantity;
    private NumFloat $price;

    public function __construct(
        NumInteger          $idOrder,
        NumInteger          $idProduct,
        NumInteger          $quantity,
        NumFloat            $price
    )
    {
        $this->idOrder = $idOrder;
        $this->idProduct = $idProduct;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    /**
     * @return NumInteger
     */
    public function getIdOrder(): NumInteger
    {
        return $this->idOrder;
    }

    /**
     * @param NumInteger $idOrder
     */
    public function setIdOrder(NumInteger $idOrder): void
    {
        $this->idOrder = $idOrder;
    }

    /**
     * @return NumInteger
     */
    public function getIdProduct(): NumInteger
    {
        return $this->idProduct;
    }

    /**
     * @param NumInteger $idProduct
     */
    public function setIdProduct(NumInteger $idProduct): void
    {
        $this->idProduct = $idProduct;
    }

    /**
     * @return NumInteger
     */
    public function getQuantity(): NumInteger
    {
        return $this->quantity;
    }

    /**
     * @param NumInteger $quantity
     */
    public function setQuantity(NumInteger $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return NumFloat
     */
    public function getPrice(): NumFloat
    {
        return $this->price;
    }

    /**
     * @param NumFloat $price
     */
    public function setPrice(NumFloat $price): void
    {
        $this->price = $price;
    }

    public function toArray(): array
    {
        return[
            'id_order' => $this->idOrder,
            'id_product' => $this->idProduct,
            'quantity' => $this->quantity,
            'price' => $this->price
        ];
    }

}
