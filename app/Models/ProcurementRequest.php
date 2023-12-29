<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcurementRequest extends Model
{
    use HasFactory;

    protected $table = "procurement_requests";

    protected $guarded = [
        'id',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
    public function procurementRequestItems()
    {
        return $this->hasMany(ProcurementRequestItem::class, 'procurement_id', 'id');
    }
}
