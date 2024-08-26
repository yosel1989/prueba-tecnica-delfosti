<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_vendor',
        'id_delivery',
        'date_delivery',
        'id_status',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id_vendor'       => 'integer',
            'id_delivery'     => 'integer',
            'date_delivery'   => 'string',
            'id_status'       => 'integer',
        ];
    }

    public function vendor(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\User', 'id', 'id_vendor');
    }

    public function delivery(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\User', 'id', 'id_delivery');
    }

    public function status(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\OrderStatus', 'id', 'id_status');
    }

    public function history()
    {
        return $this->hasMany('App\Models\OrderStatusHistory', 'id_order', 'id');
    }
}
