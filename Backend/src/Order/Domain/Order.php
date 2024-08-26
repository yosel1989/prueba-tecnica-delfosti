<?php

namespace Src\Order\Domain;

use Src\OrderProduct\Domain\OrderProductList;
use Src\Shared\Domain\ValueObjects\NumFloat;
use Src\Shared\Domain\ValueObjects\NumInteger;
use Src\Shared\Domain\ValueObjects\Text;
use Src\User\Domain\User;

class Order
{
    private NumInteger $id;
    private NumInteger $idVendor;
    private NumInteger $idDelivery;
    private Text $dateDelivery;
    private NumInteger $idStatus;

    private OrderProductList $detail;

    private User $vendor;
    private ?User $delivery;
    private Text $status;
    private NumFloat $total;

    /**
     * @param NumInteger $id
     * @param NumInteger $idVendor
     * @param NumInteger $idDelivery
     * @param Text $dateDelivery
     * @param NumInteger $idStatus
     */
    public function __construct(NumInteger $id, NumInteger $idVendor,
                                NumInteger $idDelivery, Text $dateDelivery, NumInteger $idStatus)
    {
        $this->id = $id;
        $this->idVendor = $idVendor;
        $this->idDelivery = $idDelivery;
        $this->dateDelivery = $dateDelivery;
        $this->idStatus = $idStatus;
        $this->detail = new OrderProductList();
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
     * @return NumInteger
     */
    public function getIdVendor(): NumInteger
    {
        return $this->idVendor;
    }

    /**
     * @param NumInteger $idVendor
     */
    public function setIdVendor(NumInteger $idVendor): void
    {
        $this->idVendor = $idVendor;
    }

    /**
     * @return NumInteger
     */
    public function getIdDelivery(): NumInteger
    {
        return $this->idDelivery;
    }

    /**
     * @param NumInteger $idDelivery
     */
    public function setIdDelivery(NumInteger $idDelivery): void
    {
        $this->idDelivery = $idDelivery;
    }

    /**
     * @return Text
     */
    public function getDateDelivery(): Text
    {
        return $this->dateDelivery;
    }

    /**
     * @param Text $dateDelivery
     */
    public function setDateDelivery(Text $dateDelivery): void
    {
        $this->dateDelivery = $dateDelivery;
    }

    /**
     * @return NumInteger
     */
    public function getIdStatus(): NumInteger
    {
        return $this->idStatus;
    }

    /**
     * @param NumInteger $idStatus
     */
    public function setIdStatus(NumInteger $idStatus): void
    {
        $this->idStatus = $idStatus;
    }

    /**
     * @return OrderProductList
     */
    public function getDetail(): OrderProductList
    {
        return $this->detail;
    }

    /**
     * @param OrderProductList $detail
     */
    public function setDetail(OrderProductList $detail): void
    {
        $this->detail = $detail;
    }

    /**
     * @return User
     */
    public function getVendor(): User
    {
        return $this->vendor;
    }

    /**
     * @param User $vendor
     */
    public function setVendor(User $vendor): void
    {
        $this->vendor = $vendor;
    }

    /**
     * @return User|null
     */
    public function getDelivery(): ?User
    {
        return $this->delivery;
    }

    /**
     * @param User|null $delivery
     */
    public function setDelivery(?User $delivery): void
    {
        $this->delivery = $delivery;
    }

    /**
     * @return Text
     */
    public function getStatus(): Text
    {
        return $this->status;
    }

    /**
     * @param Text $status
     */
    public function setStatus(Text $status): void
    {
        $this->status = $status;
    }

    /**
     * @return NumFloat
     */
    public function getTotal(): NumFloat
    {
        return $this->total;
    }

    /**
     * @param NumFloat $total
     */
    public function setTotal(NumFloat $total): void
    {
        $this->total = $total;
    }






    public function toArray(): array
    {
        return [
            'id' => $this->id->value(),
            'id_vendor' => $this->idVendor->value(),
            'id_delivery' => $this->idDelivery->value(),
            'id_date_delivery' => $this->dateDelivery->value(),
            'id_status' => $this->idStatus->value(),
        ];
    }

}
