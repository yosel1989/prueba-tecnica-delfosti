<?php

namespace App\Enums;

enum OrderStatusEnum: int
{
    case PorAtender = 1;
    case EnProceso  = 2;
    case EnDelivery = 3;
    case Recibido   = 4;
}
