<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'orders_items';
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];

    // Hubungan: Item ini merujuk ke produk yang mana
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}