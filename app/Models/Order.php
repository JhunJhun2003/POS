<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'itemCode',
        'cashierid',
        'quantity',
        'orderDate',
        'commingDate'
    ];

     public function user()
    {
        return $this->belongsTo(User::class, 'cashierid' );
    }
}
