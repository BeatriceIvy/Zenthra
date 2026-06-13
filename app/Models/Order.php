<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'order_number', 'total_price', 'status', 'shipping_address', 'phone_number'];

    // Hubungan: Satu order memiliki banyak item produk yang dibeli
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Hubungan: Order ini milik siapa
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}