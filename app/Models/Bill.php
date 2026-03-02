<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills'; // Specify the table name if it doesn't follow Laravel's naming convention

    protected $fillable = [
        'bill_date',
        'bill_number',
        'cashier_id',
        'total_amount',
        'cash_bill',
        'profit',
    ];

    public function cashier()
    {
        return $this->belongsTo(User::class, 'cashier_id');
    }

    public function billItems()
    {
        return $this->hasMany(BillItem::class, 'bill_id');
    }
}
