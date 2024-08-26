<?php

namespace Src\OrderHistory\Domain;

use Src\Shared\Domain\ValueObjects\NumInteger;
use Src\Shared\Domain\ValueObjects\Text;

class OrderHistory
{
    private NumInteger $idOrder;
    private NumInteger $idStatus;
    private Text $createdAt;
    private Text $status;


    /**
     * @param NumInteger $idOrder
     * @param NumInteger $idStatus
     * @param Text $createdAt
     */
    public function __construct(
        NumInteger          $idOrder,
        NumInteger          $idStatus,
        Text                $createdAt
    )
    {
        $this->idOrder = $idOrder;
        $this->idStatus = $idStatus;
        $this->createdAt = $createdAt;
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
     * @return Text
     */
    public function getCreatedAt(): Text
    {
        return $this->createdAt;
    }

    /**
     * @param Text $createdAt
     */
    public function setCreatedAt(Text $createdAt): void
    {
        $this->createdAt = $createdAt;
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



}
