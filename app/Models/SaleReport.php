<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleReport extends Model
{
    protected $table = 'salereport';
    protected $fillable = [
        'sale_date',
        'bill_no',
        'cashier_id',
        'total_amount'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'cashier_id');
    }
}
