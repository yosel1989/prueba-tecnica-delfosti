<?php

namespace Src\Order\Infrastructure;

use App\Enums\OrderStatusEnum;
use App\Models\Order as ModelsOrder;
use App\Models\OrderStatusHistory;
use Src\Order\Domain\Order;
use Src\Order\Domain\OrderRepositoryInterface;
use Src\Shared\Domain\ValueObjects\NumInteger;
use Src\Shared\Domain\ValueObjects\Text;

class OrderRepositoryEloquent implements OrderRepositoryInterface
{

    public function create(Order $Order): Order
    {
        $model = ModelsOrder::create([
            'id_vendor'         => $Order->getIdVendor()->value(),
            'date_delivery'     => $Order->getDateDelivery()->value(),
            'id_status'         => OrderStatusEnum::PorAtender->value
        ]);

        return new Order(
            new NumInteger($model->id),
            new NumInteger($model->id_vendor),
            new NumInteger($model->id_delivery),
            new Text($model->date_delivery),
            new NumInteger($model->id_status)
        );
    }

    public function list(): array
    {
        return ModelsOrder::all()->toArray();
    }

    public function updateStatusProgress(NumInteger $idOrder): void
    {
        $model = ModelsOrder::findOrFail($idOrder->value());
        if($model->id_status === OrderStatusEnum::EnProceso->value){
            return;
        }
        if($model->id_status > OrderStatusEnum::EnProceso->value){
            throw new \Exception('No se puede cambiar a un estado inferior');
        }

        OrderStatusHistory::create([
            'id_order' => $model->id,
            'id_status' => OrderStatusEnum::EnProceso->value,
        ]);

        $model->update([
           'id_status' =>  OrderStatusEnum::EnProceso->value
        ]);
    }

    /**
     * @param NumInteger $idOrder
     */
    public function updateStatusDelivery(NumInteger $idOrder): void
    {
        $model = ModelsOrder::findOrFail($idOrder->value());
        if($model->id_status === OrderStatusEnum::EnDelivery->value){
            return;
        }
        if($model->id_status > OrderStatusEnum::EnDelivery->value){
            throw new \Exception('No se puede cambiar a un estado inferior');
        }

        OrderStatusHistory::create([
            'id_order' => $model->id,
            'id_status' => OrderStatusEnum::EnDelivery->value,
        ]);

        $model->update([
            'id_status' =>  OrderStatusEnum::EnDelivery->value
        ]);
    }

    /**
     * @param NumInteger $idOrder
     */
    public function updateStatusReceived(NumInteger $idOrder): void
    {
        $model = ModelsOrder::findOrFail($idOrder->value());
        if($model->id_status === OrderStatusEnum::Recibido->value){
            return;
        }
        if($model->id_status > OrderStatusEnum::Recibido->value){
            throw new \Exception('No se puede cambiar a un estado inferior');
        }
        OrderStatusHistory::create([
            'id_order' => $model->id,
            'id_status' => OrderStatusEnum::Recibido->value,
        ]);
        $model->update([
            'id_status' =>  OrderStatusEnum::Recibido->value
        ]);
    }
}
