<?php

namespace Src\Product\Domain;

use Src\Shared\Domain\ValueObjects\NumFloat;
use Src\Shared\Domain\ValueObjects\NumInteger;
use Src\Shared\Domain\ValueObjects\Text;

class Product
{
    private NumInteger $id;
    private Text $sku;
    private Text $name;
    private NumInteger $typeProductId;
    private Text $tags;
    private NumFloat $price;
    private NumInteger $unitMeasurementId;
    private NumInteger $stock;

    private Text $typeProduct;
    private Text $unitMeasurement;

    /**
     * @param NumInteger $id
     * @param Text $sku
     * @param Text $name
     * @param NumInteger $typeProductId
     * @param Text $tags
     * @param NumFloat $price
     * @param NumInteger $unitMeasurementId
     * @param NumInteger $stock
     */
    public function __construct(
        NumInteger          $id,
        Text                $sku,
        Text                $name,
        NumInteger          $typeProductId,
        Text                $tags,
        NumFloat            $price,
        NumInteger          $unitMeasurementId,
        NumInteger          $stock
    )
    {
        $this->id = $id;
        $this->sku = $sku;
        $this->name = $name;
        $this->typeProductId = $typeProductId;
        $this->tags = $tags;
        $this->price = $price;
        $this->unitMeasurementId = $unitMeasurementId;
        $this->stock = $stock;
    }

    /**
     * @return NumInteger
     */
    public function getId(): NumInteger
    {
        return $this->id;
    }

    /**
     * @param NumInteger $id
     */
    public function setId(NumInteger $id): void
    {
        $this->id = $id;
    }

    /**
     * @return Text
     */
    public function getSku(): Text
    {
        return $this->sku;
    }

    /**
     * @param Text $sku
     */
    public function setSku(Text $sku): void
    {
        $this->sku = $sku;
    }

    /**
     * @return Text
     */
    public function getName(): Text
    {
        return $this->name;
    }

    /**
     * @param Text $name
     */
    public function setName(Text $name): void
    {
        $this->name = $name;
    }

    /**
     * @return NumInteger
     */
    public function getTypeProductId(): NumInteger
    {
        return $this->typeProductId;
    }

    /**
     * @param NumInteger $typeId
     */
    public function setTypeProductId(NumInteger $typeProductId): void
    {
        $this->typeProductId = $typeProductId;
    }

    /**
     * @return Text
     */
    public function getTags(): Text
    {
        return $this->tags;
    }

    /**
     * @param Text $tags
     */
    public function setTags(Text $tags): void
    {
        $this->tags = $tags;
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

    /**
     * @return NumInteger
     */
    public function getUnitMeasurementId(): NumInteger
    {
        return $this->unitMeasurementId;
    }

    /**
     * @param NumInteger $unitMeasurementId
     */
    public function setUnitMeasurementId(NumInteger $unitMeasurementId): void
    {
        $this->unitMeasurementId = $unitMeasurementId;
    }

    /**
     * @return NumInteger
     */
    public function getStock(): NumInteger
    {
        return $this->stock;
    }

    /**
     * @param NumInteger $stock
     */
    public function setStock(NumInteger $stock): void
    {
        $this->stock = $stock;
    }

    /**
     * @return Text
     */
    public function getTypeProduct(): Text
    {
        return $this->typeProduct;
    }

    /**
     * @param Text $typeProduct
     */
    public function setTypeProduct(Text $typeProduct): void
    {
        $this->typeProduct = $typeProduct;
    }

    /**
     * @return Text
     */
    public function getUnitMeasurement(): Text
    {
        return $this->unitMeasurement;
    }

    /**
     * @param Text $unitMeasurement
     */
    public function setUnitMeasurement(Text $unitMeasurement): void
    {
        $this->unitMeasurement = $unitMeasurement;
    }




    public function toArray(): array{
        return [
            'id'                    => $this->id->value(),
            'sku'                   => $this->sku->value(),
            'name'                  => $this->name->value(),
            'type_product_id'       => $this->typeProductId->value(),
            'tags'                  => $this->tags->value(),
            'price'                 => $this->price->value(),
            'unit_measurement_id'   => $this->unitMeasurementId->value(),
            'stock'                 => $this->stock->value()
        ];
    }

    public function toArrayWithZeroId(): array{
        return [
            'id'                    => 0,
            'sku'                   => $this->sku->value(),
            'name'                  => $this->name->value(),
            'type_product_id'       => $this->typeProductId->value(),
            'tags'                  => $this->tags->value(),
            'price'                 => $this->price->value(),
            'unit_measurement_id'   => $this->unitMeasurementId->value(),
            'stock'                 => $this->stock->value()
        ];
    }

}
