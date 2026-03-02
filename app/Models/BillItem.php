<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillItem extends Model
{
    protected $table = 'billitem'; // Specify the table name if it doesn't follow Laravel's naming convention

    protected $fillable = [
        'bill_id',
        'item_id',
        'quantity',
        'amount',
    ];

    public function bill()
    {
        return $this->belongsTo(Bill::class, 'bill_id');
    }

    public function item()
    {
        return $this->belongsTo(Inventory::class, 'item_id');
    }
}
