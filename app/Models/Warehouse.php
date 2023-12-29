<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    
     protected $table = "warehouses";

     protected $guarded = [
        'id',
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'warehouse_id', 'id');
    }
}
