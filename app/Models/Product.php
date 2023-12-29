<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

     protected $table = "products";

    protected $guarded = [
        'id',
    ];

    public function transaction()
    {
        return $this->hasMany(TransactionItem::class, 'product_id', 'id');
    }
    public function procurementRequestItem()
    {
        return $this->hasMany(ProcurementRequestItem::class, 'product_id', 'id');
    }
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id', 'id');
    }
}
