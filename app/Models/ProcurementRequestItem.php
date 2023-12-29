<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcurementRequestItem extends Model
{
    use HasFactory;

    protected $table = "procurement_request_items";

    protected $guarded = [
        'id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function procurement()
    {
        return $this->belongsTo(ProcurementRequest::class, 'procurement_id', 'id');
    }
}
